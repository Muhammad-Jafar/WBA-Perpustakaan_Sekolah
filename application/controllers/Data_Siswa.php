<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Siswa extends CI_Controller {

	private $m_datasiswa;

	function __construct() {
		parent::__construct();
		$this->load->model('M_DataSiswa');
		$this->m_datasiswa = $this->M_DataSiswa;
		if ( $this->session->userdata('user_type') != 'admin' ) {
			$this->user_type = 'Admin';

			isnt_admin(function() {
				redirect( base_url('auth/login') );
			});
		}
	}

	public function index() {
		$data = generate_page('Data Siswa', 'data_siswa', 'Admin');
		$data_content['title_page'] = 'Data Anggota Perpustakaan';
		$data['content'] = $this->load->view('partial/DataSiswa/V_DataSiswa_Read', $data_content, true);
		$this->load->view('V_Dashboard', $data);
	}

	public function data_siswa_ajax() {
		json_dump(function() {
			$result= $this->m_datasiswa->list_siswa();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) {
				$value->no=$i;
				$new_arr[]=$value;
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	public function add_new() {
		if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
			$level_user = $this->security->xss_clean( $this->input->post('level_user'));
			$nama_siswa = $this->security->xss_clean( $this->input->post('nama_siswa'));
			$nis = $this->security->xss_clean( $this->input->post('nis'));
			$kelas = $this->security->xss_clean( $this->input->post('kelas'));
			$jurusan = $this->security->xss_clean( $this->input->post('jurusan'));

			$this->form_validation->set_rules('level_user', 'Jenis user', 'required');
			$this->form_validation->set_rules('nama_siswa', 'Nama siswa', 'required', array( 'required' => 'Nama siswa harus diisi'));
			$this->form_validation->set_rules('nis', 'Nis siswa', 'required|is_unique[siswa.nis]', 
												array('required'  => 'NIS harus diisi',
													  'is_unique' => 'NIS sudah ada, data salah diisi'));
			$this->form_validation->set_rules('kelas', 'Kelas siswa', 'required', array('required' => 'Kelas siswa harus diisi'));
			$this->form_validation->set_rules('jurusan', 'Jurusan siswa', 'required', array('required' => 'Jurusan siswa harus diisi'));

			if (!$this-> form_validation->run()) {
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect(base_url('data_siswa/add_new'));
			}

			$this->m_datasiswa->data_siswa_add_new( $level_user, $nama_siswa, $nis, $kelas, $jurusan );
			redirect(base_url('data_siswa'));
		}

		$data = generate_page ('Data Anggota Perpustakaan', 'data_siswa/add_new', 'Admin');
		$data_content['title_page'] = 'Tambah data anggota';
		$data['content'] = $this->load->view('partial/DataSiswa/V_DataSiswa_Create', $data_content, true);
		$this->load->view('V_Dashboard', $data);
	}

	public function delete($id) {
		$this->m_datasiswa->data_siswa_delete($id);
		$this->session->set_flashdata('msg_alert', 'Data anggota berhasil dihapus');
		redirect( base_url('data_siswa') );
	}

	public function edit($id) {
		if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
			$id = $this->security->xss_clean( $this->input->post('id_siswa'));
			$nama_siswa = $this->security->xss_clean( $this->input->post('nama_siswa'));
			$nis = $this->security->xss_clean( $this->input->post('nis'));
			$kelas = $this->security->xss_clean( $this->input->post('kelas'));
			$jurusan = $this->security->xss_clean( $this->input->post('jurusan'));

			$this->form_validation->set_rules('id_siswa', 'ID', 'required');
			$this->form_validation->set_rules('nama_siswa', 'Nama siswa', 'required', array( 'required' => 'Nama siswa harus diisi'));
			$this->form_validation->set_rules('nis', 'Nis siswa', 'required|is_unique[siswa.nis]', 
												array('required'  => 'NIS harus diisi',
													  'is_unique' => 'NIS sudah ada'));
			$this->form_validation->set_rules('kelas', 'Kelas siswa', 'required', array('required' => 'Kelas siswa harus diisi'));
			$this->form_validation->set_rules('jurusan', 'Jurusan siswa', 'required', array('required' => 'Jurusan siswa harus diisi'));

			if (!$this-> form_validation->run()) {
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect(base_url('data_siswa/edit/' . $id));
			}

			$this->m_datasiswa->data_siswa_update( $id, $nama_siswa, $nis, $kelas, $jurusan );
			redirect(base_url('data_siswa'));
		}

		$data = generate_page ('Data Anggota Perpustakaan', 'data_siswa/edit/' . $id, 'Admin');
		$data_content['title_page'] = 'Perbarui data anggota';
		$data_content['data_siswa'] = $this->m_datasiswa->get_data_siswa($id);
		$data['content'] = $this->load->view('partial/DataSiswa/V_DataSiswa_Edit', $data_content, true);
		$this->load->view('V_Dashboard', $data);
	}
}
