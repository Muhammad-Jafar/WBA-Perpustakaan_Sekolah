<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

    private $m_pengembalian;

	function __construct() {
		parent::__construct();
		$this->load->model('M_Pengembalian');
		$this->m_pengembalian = $this->M_Pengembalian;
		if ( $this->session->userdata('user_type') != 'admin' ) {
			$this->user_type = 'Admin';

			isnt_admin(function() {
				redirect( base_url('auth/login') );
			});
		}
    }

    public function index() {
        $data = generate_page('Data Pengembalian', 'pengembalian', 'Admin');
		$data_content['title_page'] = 'Data Pengembalian Buku';
		$data['content'] = $this->load->view('partial/Pengembalian/V_Pengembalian_Read', $data_content, true);
		$this->load->view('V_Dashboard', $data);
        
    }

	public function data_pengembalian_ajax() {
		json_dump(function() {
			$result= $this->m_pengembalian->data_kembalikan_list_ajax ( $this->m_pengembalian->data_pengembalian() );
			return array('data' => $result);
		});
	}

}