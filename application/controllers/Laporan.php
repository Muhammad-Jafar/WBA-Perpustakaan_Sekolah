<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	private $m_laporan;

	function __construct() 
	{
		parent::__construct();
		$this->load->model('M_Laporan');
		$this->m_laporan = $this->M_Laporan;
		if ( $this->session->userdata('user_type') != 'admin' ) {
			$this->user_type = 'Admin';

			isnt_admin(function() {
				redirect( base_url('auth/login') );
			});
		}
	}

	public function index() 
	{
		$data = generate_page('Data Laporan', 'laporan', 'Admin');
		$data_content['title_page'] = 'Laporan Perpustakaan';
		$data['content'] = $this->load->view('V_Laporan', $data_content, true);
		$this->load->view('V_Dashboard', $data);
	}

	public function laporan_ajax() {
		json_dump(function() {
			$result= $this->m_laporan->tabel_laporan();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) {
				$value->no=$i;
				$new_arr[]=$value;
				$i++;
			}
			return array('data' => $new_arr);
		});
	}
}