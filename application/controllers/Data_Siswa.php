<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Izin extends CI_Controller {

	private $m_datasiswa;

	function __construct() {
		parent::__construct();
		$this->load->model('M_DataSiswa');
		$this->m_datasiswa = $this->M_DatSiswa;
		
		isnt_admin(function() {
			redirect( base_url('auth/login') );
		});
	}

	public function index() {

	}

}
