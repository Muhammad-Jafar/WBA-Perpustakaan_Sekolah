<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_Buku extends CI_Controller {

	private $m_manajemenbuku;

	function __construct() {
		parent::__construct();
		$this->load->model('M_ManajemenBuku');
		$this->m_manajemenbuku = $this->M_ManajemenBuku;
		if ( $this->session->userdata('user_type') != 'admin' ) {
			$this->user_type = 'Admin';

			isnt_admin(function() {
				redirect( base_url('auth/login') );
			});
		}
	}

	public function index() {
		redirect( base_url('dashboard') );
	}

	public function data_buku() {
		$data = generate_page('Data Buku', 'manajemen_buku/data_buku', 'Admin');
		$data_content['title_page'] = 'Data Buku';
		$data['content'] = $this->load->view('partial/ManajemenBuku/V_DataBuku_Read', $data_content, true);
		$this->load->view('V_Dashboard', $data);
	}

	public function data_buku_ajax() {
		json_dump(function() {
			$result= $this->m_manajemenbuku->list_buku();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) {
				$value->no=$i;
				$new_arr[]=$value;
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	public function jenis_buku() {
		$data = generate_page('Data Buku', 'manajemen_buku/jenis_buku', 'Admin');
		$data_content['title_page'] = 'Data Klasifikasi Buku';
		$data['content'] = $this->load->view('partial/ManajemenBuku/V_KlasifikasiBuku_Read', $data_content, true);
		$this->load->view('V_Dashboard', $data);
	}

	public function jenis_buku_ajax() {
		json_dump(function() {
			$result= $this->m_manajemenbuku->klasifikasi_buku();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) {
				$value->no=$i;
				$new_arr[]=$value;
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	public function cek_jenis_buku() {

		// $this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['jenis_buku'] =  $this->db->query("SELECT * FROM jenis_buku ORDER BY id_jenis_buku DESC");


		if(!empty($this->input->get('id_jenis_buku'))) {
			$id = $this->input->get('id_jenis_buku');
			$count = $this->M_Admin->CountTableId('jenis_buku','id_jenis_buku',$id);
			if($count > 0)
			{			
				$this->data['jenis_buku'] = $this->db->query("SELECT *FROM jenis_buku WHERE id_jenis_buku='$id'")->row();
			}else{
				echo '<script>alert("KATEGORI TIDAK DITEMUKAN");window.location="'.base_url('data/kategori').'"</script>';
			}
		}
	}
	
	//FUNGSI MENAMBAH DATA
	public function add_new() {
		if ( empty( $this->uri->segment('3'))) {
			redirect (base_url() );
		}
		$name = $this->uri->segment('3');

		switch ($name) {
			case 'jenis_buku' :
				if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$jenis_buku = $this->security->xss_clean( $this->input->post('jenis_buku'));
					$this->form_validation->set_rules('jenis_buku', 'Klasifikasi Buku', 'required|is_unique[jenis_buku.jenis_buku]',
													 	array( 'required' => 'Data tidak boleh kosong !',
														 	   'is_unique'=> 'Data sudah ada' ));

					if (!$this-> form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('manajemen_buku/'. $name));
					}

					$this->m_manajemenbuku->jenis_buku_add_new( $jenis_buku);
					redirect(base_url('manajemen_buku/' . $name));
				}

				$data = generate_page ('Tambah data jenis buku', 'manajemen_buku/add_new/' . $name, 'Admin');
				$data_content['title_page'] = 'Tambah data jenis buku';
				$data['content'] = $this->load->view('partial/ManajemenBuku/V_KlasifikasiBuku_Read', $data_content, true);
				$this->load->view('V_Dashboard', $data);
			break;

			case 'data_buku' : 
				if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id_jenis_buku = $this->security->xss_clean( $this->input->post('id_jenis_buku'));
					$judul_buku = $this->security->xss_clean( $this->input->post('judul_buku'));
					$pengarang = $this->security->xss_clean( $this->input->post('pengarang'));
					$penerbit = $this->security->xss_clean( $this->input->post('penerbit'));
					$tahun_terbit = $this->security->xss_clean( $this->input->post('tahun_terbit'));
					$jumlah_halaman = $this->security->xss_clean( $this->input->post('jumlah_halaman'));
					$qt = $this->security->xss_clean( $this->input->post('qt'));

					$this->form_validation->set_rules('id_jenis_buku', 'jenis buku', 'required');
					$this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required|is_unique[jenis_buku.jenis_buku]',
													 	array( 'required' => 'Data tidak boleh kosong !',
														 	   'is_unique'=> 'Judul sudah ada' ));
					$this->form_validation->set_rules('pengarang', 'pengarang buku', 'required', 
														array('required' => 'Pengarang / penulis harus diisi'));
					$this->form_validation->set_rules('penerbit', 'penerbit buku', 'required', 
														array('required' => 'Penerbit harus diisi'));
					$this->form_validation->set_rules('tahun_terbit', 'tahun terbit buku', 'required|max_length[4]', 
														array('required' => 'Tahun terbit harus diisi',
															  'max_length' => 'Penulisan tahun terbit salah'));
					$this->form_validation->set_rules('jumlah_halaman', 'halaman buku', 'required|max_length[4]', 
														array('required'   => 'Jumlah halaman harus diisi',
															  'max_length' => 'Halaman terlalu banyak'));
					$this->form_validation->set_rules('qt', 'stok buku', 'required|max_length[3]', 
														array('required' => 'Stok buku harus diisi',
															  'max_length' => 'Stok buku salah diisi'));

					if (!$this-> form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('manajemen_buku/add_new/'. $name));
					}

					$this->m_manajemenbuku->data_buku_add_new( $id_jenis_buku, $judul_buku, $pengarang, $penerbit,
															   $tahun_terbit, $jumlah_halaman, $qt );
					redirect(base_url('manajemen_buku/'. $name));
				}

				$data = generate_page ('Tambah data buku', 'manajemen_buku/add_new/data_buku', 'Admin');
				$data_content['title_page'] = 'Tambah data buku';
				$data_content['klasifikasi_buku'] = $this->m_manajemenbuku->get_data_klasifikasi_buku();
				$data['content'] = $this->load->view('partial/ManajemenBuku/V_DataBuku_Create', $data_content, true);
				$this->load->view('V_Dashboard', $data);
			break;
		}
	}

	//FUNGSI MENGHAPUS DATA
	public function delete() {
		if( empty($this->uri->segment('3'))) {
			redirect( base_url('/dashboard') );
		}

		if( empty($this->uri->segment('4'))) {
			redirect( base_url('/dashboard') );
		}

		$name=$this->uri->segment('3');
		$id=$this->uri->segment('4');

		switch($name) {
			case 'jenis_buku':
				$this->m_manajemenbuku->jenis_buku_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data jenis buku berhasil dihapus');
				redirect( base_url('manajemen_buku/jenis_buku') );
			break;
			case 'data_buku':
				$this->m_manajemenbuku->data_buku_delete($id);
				$this->session->set_flashdata('msg_alert', 'Sebuah buku berhasil dihapus');
				redirect( base_url('manajemen_buku/data_buku') );
			break;
			default:
				redirect( base_url() );
				break;
		}
	}
	//FUNGSI MENGHAPUS DATA

	//FUNSI MEMPERBARUI DATA
	public function edit() {
		if( empty($this->uri->segment('3'))) {
			redirect( base_url() );
		}

		if( empty($this->uri->segment('4'))) {
			redirect( base_url() );
		}

		$name=$this->uri->segment('3');
		$id=$this->uri->segment('4');

		switch ($name) {
			case 'jenis_buku' :
				if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id = $this->security->xss_clean( $this->input->post('id_jenis_buku'));
					$jenis_buku = $this->security->xss_clean( $this->input->post('jenis_buku'));
					$this->form_validation->set_rules('id_jenis_buku', 'ID', 'required');
					$this->form_validation->set_rules('jenis_buku', 'Klasifikasi Buku', 'required|is_unique[jenis_buku.jenis_buku]',
													 	array( 'required' => 'Data tidak boleh kosong !',
														 	   'is_unique'=> 'Data sudah ada' ));

					if (!$this-> form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('manajemen_buku/'. $name . '/' . $id) );
					}

					$this->m_manajemenbuku->jenis_buku_update( $id, $jenis_buku);
					redirect(base_url('manajemen_buku/' . $name));
				}

				$data = generate_page ('Ubah data jenis buku', 'manajemen_buku/edit/'. $name . '/' . $id, 'Admin');
				$data_content['title_page'] = 'Ubah data jenis buku';
				$data_content['jenis_buku'] = $this->m_manajemenbuku->get_data_jenis_buku($id);
				$data['content'] = $this->load->view('partial/ManajemenBuku/V_KlasifikasiBuku_Read', $data_content, true);
				$this->load->view('V_Dashboard', $data);
			break;

			case 'data_buku' : 
				if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id = $this->security->xss_clean( $this->input->post('id_buku'));
					$id_jenis_buku = $this->security->xss_clean( $this->input->post('id_jenis_buku'));
					$judul_buku = $this->security->xss_clean( $this->input->post('judul_buku'));
					$pengarang = $this->security->xss_clean( $this->input->post('pengarang'));
					$penerbit = $this->security->xss_clean( $this->input->post('penerbit'));
					$tahun_terbit = $this->security->xss_clean( $this->input->post('tahun_terbit'));
					$jumlah_halaman = $this->security->xss_clean( $this->input->post('jumlah_halaman'));
					$qt = $this->security->xss_clean( $this->input->post('qt'));

					$this->form_validation->set_rules('id_buku', 'ID buku', 'required');
					$this->form_validation->set_rules('id_jenis_buku', 'jenis buku', 'required');
					$this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required|is_unique[jenis_buku.jenis_buku]',
													 	array( 'required' => 'Data tidak boleh kosong !',
														 	   'is_unique'=> 'Judul sudah ada' ));
					$this->form_validation->set_rules('pengarang', 'pengarang buku', 'required', 
														array('required' => 'Pengarang / penulis harus diisi'));
					$this->form_validation->set_rules('penerbit', 'penerbit buku', 'required', 
														array('required' => 'Penerbit harus diisi'));
					$this->form_validation->set_rules('tahun_terbit', 'tahun terbit buku', 'required|max_length[4]', 
														array('required' => 'Tahun terbit harus diisi',
															  'max_length' => 'Penulisan tahun terbit salah'));
					$this->form_validation->set_rules('jumlah_halaman', 'halaman buku', 'required|max_length[4]', 
														array('required'   => 'Jumlah halaman harus diisi',
															  'max_length' => 'Halaman terlalu banyak'));
					$this->form_validation->set_rules('qt', 'stok buku', 'required|max_length[3]', 
														array('required' => 'Stok buku harus diisi',
															  'max_length' => 'Stok buku salah diisi'));

					if (!$this-> form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('manajemen_buku/edit/'. $name . '/' . $id) );
					}

					$this->m_manajemenbuku->data_buku_update( $id, $id_jenis_buku, $judul_buku, $pengarang, $penerbit,
															   $tahun_terbit, $jumlah_halaman, $qt );
					redirect(base_url('manajemen_buku/'. $name));
				}

				$data = generate_page ('Ubah data buku', 'manajemen_buku/edit/' . $name . '/' . $id, 'Admin');
				$data_content['title_page'] = 'Ubah data buku';
				$data_content['data_buku'] = $this->m_manajemenbuku->get_data__buku($id);
				$data_content['jenis_buku'] = $this->m_manajemenbuku->klasifikasi_buku();
				$data['content'] = $this->load->view('partial/ManajemenBuku/V_DataBuku_Edit', $data_content, true);
				$this->load->view('V_Dashboard', $data);
			break;
		}
	}
	//FUNSI MEMPERBARUI DATA
}

