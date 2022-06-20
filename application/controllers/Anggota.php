<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	private $m_anggota;

	function __construct() {
		parent::__construct();
		$this->load->model('M_Anggota');
		$this->m_anggota = $this->M_Anggota;
		if ( $this->session->userdata('user_type') != 'admin' ) {
			$this->user_type = 'Admin';

			isnt_admin(function() {
				redirect( base_url('auth/login') );
			});
		}
	}

	public function index() {
		redirect(base_url('anggota'));
	}

	public function siswa() {
		$data = generate_page('Data Siswa', 'anggota/siswa', 'Admin');
		$data_content['title_page'] = 'Data Anggota Perpustakaan';
		$data['content'] = $this->load->view('partial/DataAnggota/V_DataSiswa_Read', $data_content, true);
		$this->load->view('V_Dashboard', $data);
	}

	public function data_siswa_ajax() {
		json_dump(function() {
			$result= $this->m_anggota->list_siswa();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) {
				$value->no=$i;
				$new_arr[]=$value;
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	public function guru() {
		$data = generate_page('Data Siswa', 'anggota/guru', 'Admin');
		$data_content['title_page'] = 'Data Anggota Perpustakaan';
		$data['content'] = $this->load->view('partial/DataAnggota/V_DataGuru_Read', $data_content, true);
		$this->load->view('V_Dashboard', $data);
	}

	public function data_guru_ajax() {
		json_dump(function() {
			$result= $this->m_anggota->list_guru();
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
		if (empty( $this->uri->segment('3'))) {
			redirect ( base_url('anggota') );
		}
		$name = $this->uri->segment('3');

		switch ($name) {
			case 'siswa' :
				if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$nama_anggota = $this->security->xss_clean( $this->input->post('nama_anggota'));
					$kategori_anggota = $this->security->xss_clean( $this->input->post('kategori_anggota'));
					$nomor_induk = $this->security->xss_clean( $this->input->post('nomor_induk'));
					$kelas = $this->security->xss_clean( $this->input->post('kelas'));
					$jurusan = $this->security->xss_clean( $this->input->post('jurusan'));
		
					$this->form_validation->set_rules('nama_anggota', 'Nama', 'required', array( 'required' => 'Nama siswa harus diisi'));
					$this->form_validation->set_rules('kategori_anggota', 'kategori anggota', 'required');
					$this->form_validation->set_rules('nomor_induk', 'Nomor induk', 'required|is_unique[anggota.nomor_induk]', 
														array('required'  => 'Nomor induk harus diisi',
															  'is_unique' => 'Nomor induk sudah ada, data salah diisi'));
					$this->form_validation->set_rules('kelas', 'Kelas', 'required', array('required' => 'Kelas siswa harus diisi'));
					$this->form_validation->set_rules('jurusan', 'Jurusan', 'required', array('required' => 'Jurusan siswa harus diisi'));
		
					if (!$this-> form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('anggota/add_new/' . $name));
					}
		
					$this->m_anggota->anggota_add_new( $nama_anggota, $kategori_anggota, $nomor_induk, $kelas, $jurusan );
					redirect(base_url('anggota/siswa'));
				}
		
				$data = generate_page ('Data Anggota Perpustakaan', 'anggota/add_new/' . $name, 'Admin');
				$data_content['title_page'] = 'Tambah data anggota untuk siswa';
				$data['content'] = $this->load->view('partial/DataAnggota/V_DataSiswa_Create', $data_content, true);
				$this->load->view('V_Dashboard', $data);
			break;

			case 'guru' :
				if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$nama_anggota = $this->security->xss_clean( $this->input->post('nama_anggota'));
					$kategori_anggota = $this->security->xss_clean( $this->input->post('kategori_anggota'));
					$nomor_induk = $this->security->xss_clean( $this->input->post('nomor_induk'));
					$kelas = $this->security->xss_clean( $this->input->post('kelas'));
					$jurusan = $this->security->xss_clean( $this->input->post('jurusan'));
		
					$this->form_validation->set_rules('nama_anggota', 'Nama', 'required', array( 'required' => 'Nama guru harus diisi'));
					$this->form_validation->set_rules('kategori_anggota', 'kategori anggota', 'required');
					$this->form_validation->set_rules('nomor_induk', 'Nomor induk', 'required|is_unique[anggota.nomor_induk]', 
														array('required'  => 'Nomor induk harus diisi',
															  'is_unique' => 'Nomor induk sudah ada, data salah diisi'));
					$this->form_validation->set_rules('kelas', 'Kelas', 'required', array('required' => 'Kelas ajar guru harus diisi'));
					$this->form_validation->set_rules('jurusan', 'Jurusan', 'required', array('required' => 'Jurusan ajar guru harus diisi'));
		
					if (!$this-> form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('anggota/add_new/' . $name));
					}
		
					$this->m_anggota->anggota_add_new( $nama_anggota, $kategori_anggota, $nomor_induk, $kelas, $jurusan );
					redirect(base_url('anggota/guru'));
				}
		
				$data = generate_page ('Data Anggota Perpustakaan', 'anggota/add_new/' . $name, 'Admin');
				$data_content['title_page'] = 'Tambah data anggota';
				$data['content'] = $this->load->view('partial/DataAnggota/V_DataGuru_Create', $data_content, true);
				$this->load->view('V_Dashboard', $data);
		}
		
	}

	public function delete() {
		if( empty($this->uri->segment('3'))) {
			redirect( base_url('/anggota') );
		}

		if( empty($this->uri->segment('4'))) {
			redirect( base_url('/anggota') );
		}
		$name=$this->uri->segment('3');
		$id=$this->uri->segment('4');

		switch($name) {
			case 'siswa' :
				$this->m_anggota->anggota_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data anggota berhasil dihapus');
				redirect( base_url('anggota/siswa') );
			break;

			case 'guru' :
				$this->m_anggota->anggota_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data anggota berhasil dihapus');
				redirect( base_url('anggota/guru') );
			break;
		}
	
	}

	public function edit() {
		if( empty($this->uri->segment('3'))) {
			redirect( base_url('/anggota') );
		}

		if( empty($this->uri->segment('4'))) {
			redirect( base_url('/anggota') );
		}

		$name = $this->uri->segment('3');
		$id = $this->uri->segment('4');

		switch($name) {
			case 'siswa' :
				if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id = $this->security->xss_clean( $this->input->post('id_anggota'));
					$nama_anggota = $this->security->xss_clean( $this->input->post('nama_anggota'));
					$nomor_induk = $this->security->xss_clean( $this->input->post('nomor_induk'));
					$kelas = $this->security->xss_clean( $this->input->post('kelas'));
					$jurusan = $this->security->xss_clean( $this->input->post('jurusan'));
		
					$this->form_validation->set_rules('nama_anggota', 'Nama', 'required', array( 'required' => 'Nama siswa harus diisi'));
					$this->form_validation->set_rules('nomor_induk', 'Nomor induk', 'required', array('required'  => 'Nomor induk harus diisi'));
					$this->form_validation->set_rules('kelas', 'Kelas', 'required', array('required' => 'Kelas siswa harus diisi'));
					$this->form_validation->set_rules('jurusan', 'Jurusan', 'required', array('required' => 'Jurusan siswa harus diisi'));
		
					if (!$this-> form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('anggota/edit/' . $name . '/' . $id));
					}
		
					$this->m_anggota->anggota_update( $id, $nama_anggota, $nomor_induk, $kelas, $jurusan );
					redirect(base_url('anggota/siswa'));
				}
		
				$data = generate_page ('Data Anggota Perpustakaan', 'anggota/edit/' . $name . '/' . $id, 'Admin');
				$data_content['title_page'] = 'Perbarui data anggota';
				$data_content['data_siswa'] = $this->m_anggota->get_data_siswa($id);
				$data['content'] = $this->load->view('partial/DataAnggota/V_DataSiswa_Edit', $data_content, true);
				$this->load->view('V_Dashboard', $data);
			break;

			case 'guru' :
				if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id = $this->security->xss_clean( $this->input->post('id_anggota'));
					$nama_anggota = $this->security->xss_clean( $this->input->post('nama_anggota'));
					$nomor_induk = $this->security->xss_clean( $this->input->post('nomor_induk'));
					$kelas = $this->security->xss_clean( $this->input->post('kelas'));
					$jurusan = $this->security->xss_clean( $this->input->post('jurusan'));
		
					$this->form_validation->set_rules('nama_anggota', 'Nama', 'required', array( 'required' => 'Nama siswa harus diisi'));
					$this->form_validation->set_rules('nomor_induk', 'Nomor induk', 'required', array('required'  => 'Nomor induk harus diisi'));
					$this->form_validation->set_rules('kelas', 'Kelas', 'required', array('required' => 'Kelas siswa harus diisi'));
					$this->form_validation->set_rules('jurusan', 'Jurusan', 'required', array('required' => 'Jurusan siswa harus diisi'));
		
					if (!$this-> form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('anggota/edit/' . $name . '/' . $id));
					}
		
					$this->m_anggota->anggota_update( $id, $nama_anggota, $nomor_induk, $kelas, $jurusan );
					redirect(base_url('anggota/guru'));
				}
		
				$data = generate_page ('Data Anggota Perpustakaan', 'anggota/edit/' . $name . '/' . $id, 'Admin');
				$data_content['title_page'] = 'Perbarui data anggota';
				$data_content['data_guru'] = $this->m_anggota->get_data_guru($id);
				$data['content'] = $this->load->view('partial/DataAnggota/V_DataGuru_Edit', $data_content, true);
				$this->load->view('V_Dashboard', $data);
			break;
		}
	}
}
