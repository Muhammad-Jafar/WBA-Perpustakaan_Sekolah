<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $m_dashboard;

	function __construct() {
		parent::__construct();
		$this->load->model('M_Dashboard');
		$this->m_dashboard = $this->M_Dashboard;

		isnt_admin(function() { 
			//cek sesi, bila bukan admin akan redirect ke login untuk login terlebih dahulu
			redirect( base_url('auth/login') );
		});
	}

	public function index() 
	{
		$data = generate_page('Dashboard', 'dashboard', 'Admin');
				$data_content['jumlah_buku'] = $this->m_dashboard->jumlah_buku();
				// $data_content['total_dataizin'] = $this->m_dashboard->total_dataizin();
				// $data_content['total_izinterkonfirmasi'] = $this->m_dashboard->total_izinterkonfirmasi();

				$data['content'] = $this->load->view('partial/Dashboard/Admin', $data_content, true);
				$this->load->view('V_Dashboard', $data);
	}

}
