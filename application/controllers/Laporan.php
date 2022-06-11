<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	private $m_laporan;

	function __construct() 
	{
		parent::__construct();
		$this->load->model('M_Laporan');
		$this->m_laporan = $this->M_Laporan;
		if ( $this->session->userdata('user_type') == 'admin' ) {
			$this->user_type = 'Admin';

			isnt_admin(function() {
				redirect( base_url('auth/login') );
			});
		} elseif ( $this->session->userdata('user_type') == 'kepsek') {
			$this->user_type = 'Kepsek';
		}
	}

	public function index() {

		$data = generate_page('Data Laporan', 'laporan', $this->user_type);
		$data_content['title_page'] = 'Laporan Perpustakaan';
		$data['content'] = $this->load->view('V_Laporan', $data_content, true);
		$this->load->view('V_Dashboard', $data);
	}

	public function laporan_ajax() {
		json_dump(function() {
			$result= $this->m_laporan->laporan_list_ajax ( $this->m_laporan->tabel_laporan() );
			return array('data' => $result);
		});
	}

}