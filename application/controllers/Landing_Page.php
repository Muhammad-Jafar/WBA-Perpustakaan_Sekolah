<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_page extends CI_Controller {

	function __construct() {
		parent::__construct();
		if ($this->session->user_type == 'admin' || $this->session->user_type == 'siswa') {
			is_login(function() {
				$this->session->sess_destroy();
				redirect('landing_page');
			});
		}	
	}

	public function index() 
	{	
		$this->load->view('landing_page');
	}

	public function siswa() {
		$this->load->view('katalog');
	}

	public function admin() {
		$this->load->view('auth/login');
	}
}