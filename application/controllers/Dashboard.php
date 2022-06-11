<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $m_dashboard;

	function __construct() {
		parent::__construct();
		$this->load->model('M_Dashboard');
		$this->m_dashboard = $this->M_Dashboard;

		isnt_login(function() { 
			//cek sesi, bila bukan admin akan redirect ke login untuk login terlebih dahulu
			redirect( base_url('auth/login') );
		});

		if( $this->session->userdata ('user_type') == 'admin' ) {
			$this->user_type = 'Admin';
		} elseif ( $this->session->userdata ('user_type') == 'kepsek') {
			$this->user_type = 'Kepsek';
		}
	}

	public function index()  {
		switch ($this->session->userdata ('user_type') ) {
			case 'kepsek':
				$data = generate_page('Dashboard', 'dashboard', 'Kepsek');
				$data_content['jumlah_buku'] = $this->m_dashboard->jumlah_buku();
				$data_content['jumlah_buku'] = $this->m_dashboard->jumlah_buku();
				$data_content['buku_dipinjam'] = $this->m_dashboard->total_buku_dipinjam();
				$data_content['buku_dikembalikan'] = $this->m_dashboard->total_buku_dikembalikan();
				$data['content'] = $this->load->view('partial/Dashboard/Kepsek', $data_content, true);
				$this->load->view('V_Dashboard', $data);
			break;

			case 'admin':
				$data = generate_page('Dashboard', 'dashboard', 'Admin');
				$data_content['jumlah_buku'] = $this->m_dashboard->jumlah_buku();
				$data_content['buku_dipinjam'] = $this->m_dashboard->total_buku_dipinjam();
				$data_content['buku_dikembalikan'] = $this->m_dashboard->total_buku_dikembalikan();
				$data['content'] = $this->load->view('partial/Dashboard/Admin', $data_content, true);
				$this->load->view('V_Dashboard', $data);
			break;
		}
	}
}
