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
        $data = generate_page('Data Peminjaman', 'peminjaman', 'Admin');
		$data_content['title_page'] = 'Data Peminjaman Buku';
		$data['content'] = $this->load->view('partial/Peminjaman/V_Peminjaman_Read', $data_content, true);
		$this->load->view('V_Dashboard', $data);
    }

    public function data_peminjaman_ajax() {
		json_dump(function() {
			$result= $this->m_peminjaman->data_pinjam_list_ajax ( $this->m_peminjaman->data_peminjaman() );
			return array('data' => $result);
		});
	}

    public function peminjam_ajax($type) 
	{
		$this->c_type=$type;
		json_dump(function() {
			$result=$this->m_datakeluhan->get_keluhan($this->c_type);
			return $result;
		});
	}

    public function add_new() {
        if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
			$id_siswa = $this->security->xss_clean( $this->input->post('id_siswa'));
			$id_buku = $this->security->xss_clean( $this->input->post('id_buku'));
			$tgl_pinjam = date('d/m/y');

			$this->form_validation->set_rules('id_siswa', 'ID siswa', 'required', array( 'required' => 'Nama siswa harus diisi'));
			$this->form_validation->set_rules('id_buku', 'judul buku', 'required', array('required' => 'Judul buku tidak boleh kosong !'));

			if (!$this-> form_validation->run()) {
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect(base_url('peminjaman/add_new'));
			}

			$this->m_peminjaman->peminjaman_add_new( $id_siswa, $id_buku, $tgl_pinjam);
			redirect(base_url('peminjaman'));
		}

		$data = generate_page ('Data Peminjaman Buku Perpustakaan', 'peminjaman/add_new', 'Admin');
		$data_content['title_page'] = 'Tambah peminjaman buku';
        $data_content['list_siswa'] = $this->m_peminjaman->list_peminjam();
        $data_content['list_buku'] = $this->m_peminjaman->list_buku();
		$data['content'] = $this->load->view('partial/Peminjaman/V_Peminjaman_Create', $data_content, true);
		$this->load->view('V_Dashboard', $data);
    }

    public function accept($id_transaksi) {
		$this->m_ki->accept_izin($id_transaksi);
		$this->session->set_flashdata('msg_alert', 'Peminjaman telah selesai');
		redirect( base_url('peminjaman') );
	}

	public function add($id_transaksi) {
		$this->m_ki->reject_izin($id_transaksi);
		$this->session->set_flashdata('msg_alert', 'Peminjaman ditambah');
		redirect( base_url('peminjaman') );
	}

}