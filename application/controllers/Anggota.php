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
					$nama_siswa = $this->security->xss_clean( $this->input->post('nama_siswa'));
					$nis = $this->security->xss_clean( $this->input->post('nis'));
					$kelas = $this->security->xss_clean( $this->input->post('kelas'));
					$jurusan = $this->security->xss_clean( $this->input->post('jurusan'));
		
					$this->form_validation->set_rules('nama_siswa', 'Nama siswa', 'required', array( 'required' => 'Nama siswa harus diisi'));
					$this->form_validation->set_rules('nis', 'Nis siswa', 'required|is_unique[siswa.nis]', 
														array('required'  => 'NIS harus diisi',
															  'is_unique' => 'NIS sudah ada, data salah diisi'));
					$this->form_validation->set_rules('kelas', 'Kelas siswa', 'required', array('required' => 'Kelas siswa harus diisi'));
					$this->form_validation->set_rules('jurusan', 'Jurusan siswa', 'required', array('required' => 'Jurusan siswa harus diisi'));
		
					if (!$this-> form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('anggota/add_new/' . $name));
					}
		
					$this->m_anggota->siswa_add_new( $nama_siswa, $nis, $kelas, $jurusan );
					redirect(base_url('anggota/siswa'));
				}
		
				$data = generate_page ('Data Anggota Perpustakaan', 'anggota/add_new/' . $name, 'Admin');
				$data_content['title_page'] = 'Tambah data anggota';
				$data['content'] = $this->load->view('partial/DataAnggota/V_DataSiswa_Create', $data_content, true);
				$this->load->view('V_Dashboard', $data);
			break;

			case 'guru' :
				if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$nama_guru = $this->security->xss_clean( $this->input->post('nama_guru'));
					$nipd = $this->security->xss_clean( $this->input->post('nipd'));
					$kelas_ajar = $this->security->xss_clean( $this->input->post('kelas_ajar'));
					$jurusan_ajar = $this->security->xss_clean( $this->input->post('jurusan_ajar'));
		
					$this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required', array( 'required' => 'Nama siswa harus diisi'));
					$this->form_validation->set_rules('nipd', 'Nipd guru', 'required|is_unique[guru.nipd]', 
														array('required'  => 'NIPD harus diisi',
															  'is_unique' => 'NIPD sudah ada, data salah diisi'));
					$this->form_validation->set_rules('kelas_ajar', 'Kelas ajar', 'required', array('required' => 'Kelas ajar guru harus diisi'));
					$this->form_validation->set_rules('jurusan_ajar', 'Jurusan ajar', 'required', array('required' => 'Jurusan ajar guru harus diisi'));
		
					if (!$this-> form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('anggota/add_new/' . $name));
					}
		
					$this->m_anggota->guru_add_new( $nama_guru, $nipd, $kelas_ajar, $jurusan_ajar );
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
				$this->m_anggota->siswa_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data anggota berhasil dihapus');
				redirect( base_url('anggota/siswa') );
			break;

			case 'guru' :
				$this->m_anggota->guru_delete($id);
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
					$id = $this->security->xss_clean( $this->input->post('id_siswa'));
					$nama_siswa = $this->security->xss_clean( $this->input->post('nama_siswa'));
					$nis = $this->security->xss_clean( $this->input->post('nis'));
					$kelas = $this->security->xss_clean( $this->input->post('kelas'));
					$jurusan = $this->security->xss_clean( $this->input->post('jurusan'));
		
					$this->form_validation->set_rules('id_siswa', 'ID', 'required');
					$this->form_validation->set_rules('nama_siswa', 'Nama siswa', 'required', array( 'required' => 'Nama siswa harus diisi'));
					$this->form_validation->set_rules('nis', 'Nis siswa', 'required', array('required'  => 'NIS harus diisi'));
					$this->form_validation->set_rules('kelas', 'Kelas siswa', 'required', array('required' => 'Kelas siswa harus diisi'));
					$this->form_validation->set_rules('jurusan', 'Jurusan siswa', 'required', array('required' => 'Jurusan siswa harus diisi'));
		
					if (!$this-> form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('anggota/edit/' . $name . '/' . $id));
					}
		
					$this->m_anggota->siswa_update( $id, $nama_siswa, $nis, $kelas, $jurusan );
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
					$id = $this->security->xss_clean( $this->input->post('id_guru'));
					$nama_guru = $this->security->xss_clean( $this->input->post('nama_guru'));
					$nipd = $this->security->xss_clean( $this->input->post('nipd'));
					$kelas_ajar = $this->security->xss_clean( $this->input->post('kelas_ajar'));
					$jurusan_ajar = $this->security->xss_clean( $this->input->post('jurusan_ajar'));
		
					$this->form_validation->set_rules('id_guru', 'ID', 'required');
					$this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required', array( 'required' => 'Nama guru harus diisi'));
					$this->form_validation->set_rules('nipd', 'Nipd guru', 'required',array('required'  => 'NIPD harus diisi'));
					$this->form_validation->set_rules('kelas_ajar', 'Kelas ajar', 'required', array('required' => 'Kelas ajar guru harus diisi'));
					$this->form_validation->set_rules('jurusan_ajar', 'Jurusan ajar', 'required', array('required' => 'Jurusan ajar guru harus diisi'));
		
					if (!$this-> form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('anggota/edit/' . $name . '/' . $id));
					}
		
					$this->m_anggota->guru_update( $id, $nama_guru, $nipd, $kelas_ajar, $jurusan_ajar );
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
