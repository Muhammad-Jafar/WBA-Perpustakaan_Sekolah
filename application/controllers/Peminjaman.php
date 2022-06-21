<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    private $m_peminjaman;

	function __construct() {
		parent::__construct();
		$this->load->model('M_Peminjaman');
		$this->m_peminjaman = $this->M_Peminjaman;
		if ( $this->session->userdata('user_type') != 'admin' ) {
			$this->user_type = 'Admin';

			isnt_admin(function() {
				redirect( base_url('auth/login') );
			});
		}
    }

    public function index() {
        redirect( base_url('dashboard'));
    }

	public function siswa() {
		$data = generate_page('Data Peminjaman Siswa', 'peminjaman/siswa', 'Admin');
		$data_content['title_page'] = 'Data Peminjaman Siswa';
		$data['content'] = $this->load->view('partial/Peminjaman/V_PeminjamanSiswa_Read', $data_content, true);
		$this->load->view('V_Dashboard', $data);
	}

    public function peminjaman_siswa_ajax() {
		json_dump(function() {
			$result= $this->m_peminjaman->data_pinjam_list_ajax ( $this->m_peminjaman->data_peminjaman_siswa() );
			return array('data' => $result);
		});
	}

	public function guru() {
		$data = generate_page('Data Peminjaman Guru', 'peminjaman/guru', 'Admin');
		$data_content['title_page'] = 'Data Peminjaman Guru';
		$data['content'] = $this->load->view('partial/Peminjaman/V_PeminjamanGuru_Read', $data_content, true);
		$this->load->view('V_Dashboard', $data);
	}

    public function peminjaman_guru_ajax() {
		json_dump(function() {
			$result= $this->m_peminjaman->data_pinjam_list_ajax ( $this->m_peminjaman->data_peminjaman_guru() );
			return array('data' => $result);
		});
	}

	function get_nama_siswa(){
        if (isset($_GET['term'])) {
            $result = $this->m_peminjaman->search_nama_siswa($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
				$arr_result[] = array ( 'nama_anggota' => $row->id_anggota, 'label' => $row->nama_anggota );
                echo json_encode($arr_result);
            }
        }
    }

	function get_nama_guru(){
        if (isset($_GET['term'])) {
            $result = $this->m_peminjaman->search_nama_guru($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
				$arr_result[] = array ( 'nama_anggota' => $row->id_anggota, 'label' => $row->nama_anggota );
                echo json_encode($arr_result);
            }
        }
    }

	function get_judul_buku(){
        if (isset($_GET['term'])) {
            $result = $this->m_peminjaman->search_judul_buku($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array ( 'judul_buku' => $row->id_buku, 'label' => $row->judul_buku);
                echo json_encode($arr_result);
            }
        }
    }

    public function add_new() {
		if (empty( $this->uri->segment('3'))) {
			redirect ( base_url('peminjaman') );
		}
		$name = $this->uri->segment('3');

		switch ($name) {
			case 'siswa' :
				if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id_anggota = $this->security->xss_clean( $this->input->post('id_anggota'));
					$kode_pinjam = $this->security->xss_clean( $this->input->post('kode_pinjam'));
					$id_buku = $this->security->xss_clean( $this->input->post('id_buku'));
					$qt_pinjam = $this->security->xss_clean( $this->input->post('qt_pinjam'));
					$tgl_pinjam = $this->security->xss_clean( $this->input->post('tgl_pinjam'));
					$tgl_kembali = $this->security->xss_clean( $this->input->post('tgl_kembali'));
		
					$this->form_validation->set_rules('id_anggota', 'ID anggota', 'required', array( 'required' => 'Nama anggota harus diisi'));
					$this->form_validation->set_rules('kode_pinjam', 'Kode pinjam', 'required', array( 'required' => 'Kode pinjam harus diisi'));
					$this->form_validation->set_rules('qt_pinjam', 'jumlah pinjam', 'required', array( 'required' => 'jumlah pinjam harus diisi'));
					$this->form_validation->set_rules('id_buku', 'judul buku', 'required', array('required' => 'Judul buku tidak boleh kosong !'));
					$this->form_validation->set_rules('tgl_pinjam', 'tanggal pinjam', 'required', array('required' => 'Tanggal pinjam buku tidak boleh kosong !'));
					$this->form_validation->set_rules('tgl_kembali', 'tanggal kembali', 'required', array('required' => 'Tanggal kembali buku tidak boleh kosong !'));
		
					if (!$this-> form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('peminjaman/add_new/siswa'));
					}
		
					$this->m_peminjaman->peminjaman_add_new( $id_anggota, $kode_pinjam, $id_buku, $qt_pinjam, $tgl_pinjam, $tgl_kembali);
					$this->m_peminjaman->minstok($id_anggota, $id_buku, $tgl_kembali );
					redirect(base_url('peminjaman/siswa'));
				}
		
				$data = generate_page ('Data Peminjaman Buku Perpustakaan', 'peminjaman/add_new/' . $name, 'Admin');
				$data_content['title_page'] = 'Tambah peminjaman buku untuk siswa';
				$data_content['list_peminjam'] = $this->m_peminjaman->list_peminjam_siswa();
				$data_content['list_buku'] = $this->m_peminjaman->list_buku();
				$data_content['buat_kode'] = $this->m_peminjaman->buatkodepinjam();
				$data['content'] = $this->load->view('partial/Peminjaman/V_PeminjamanSiswa_Create', $data_content, true);  
				$this->load->view('V_Dashboard', $data);
			break;

			case 'guru' :
				if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id_anggota = $this->security->xss_clean( $this->input->post('id_anggota'));
					$kode_pinjam = $this->security->xss_clean( $this->input->post('kode_pinjam'));
					$id_buku = $this->security->xss_clean( $this->input->post('id_buku'));
					$qt_pinjam = $this->security->xss_clean( $this->input->post('qt_pinjam'));
					$tgl_pinjam = $this->security->xss_clean( $this->input->post('tgl_pinjam'));
					$tgl_kembali = $this->security->xss_clean( $this->input->post('tgl_kembali'));
		
					$this->form_validation->set_rules('id_anggota', 'ID anggota', 'required', array( 'required' => 'Nama anggota harus diisi'));
					$this->form_validation->set_rules('kode_pinjam', 'Kode pinjam', 'required', array( 'required' => 'Kode pinjam harus diisi'));
					$this->form_validation->set_rules('qt_pinjam', 'jumlah pinjam', 'required', array( 'required' => 'jumlah pinjam harus diisi'));
					$this->form_validation->set_rules('id_buku', 'judul buku', 'required', array('required' => 'Judul buku tidak boleh kosong !'));
					$this->form_validation->set_rules('tgl_pinjam', 'tanggal pinjam', 'required', array('required' => 'Tanggal pinjam buku tidak boleh kosong !'));
					$this->form_validation->set_rules('tgl_kembali', 'tanggal kembali', 'required', array('required' => 'Tanggal kembali buku tidak boleh kosong !'));
		
					if (!$this-> form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('peminjaman/add_new/guru'));
					}
		
					$this->m_peminjaman->peminjaman_add_new( $id_anggota, $kode_pinjam, $id_buku, $qt_pinjam, $tgl_pinjam, $tgl_kembali);
					$this->m_peminjaman->minstok($id_anggota, $id_buku, $tgl_kembali );
					redirect(base_url('peminjaman/guru'));
				}
		
				$data = generate_page ('Data Peminjaman Buku Perpustakaan', 'peminjaman/add_new/' . $name, 'Admin');
				$data_content['title_page'] = 'Tambah peminjaman buku untuk guru';
				$data_content['list_peminjam'] = $this->m_peminjaman->list_peminjam_guru();
				$data_content['list_buku'] = $this->m_peminjaman->list_buku();
				$data_content['buat_kode'] = $this->m_peminjaman->buatkodepinjam();
				$data['content'] = $this->load->view('partial/Peminjaman/V_PeminjamanGuru_Create', $data_content, true);  
				$this->load->view('V_Dashboard', $data);
			break;
		}
    }

    public function kembalikan_siswa($id_transaksi ) {
		$this->m_peminjaman->kembalikan_buku($id_transaksi);
		$this->session->set_flashdata('msg_alert', 'Peminjaman telah selesai');
		redirect( base_url('peminjaman/siswa') );
	}

	public function kembalikan_guru($id_transaksi ) {
		$this->m_peminjaman->kembalikan_buku($id_transaksi);
		$this->session->set_flashdata('msg_alert', 'Peminjaman telah selesai');
		redirect( base_url('peminjaman/guru') );
	}
}