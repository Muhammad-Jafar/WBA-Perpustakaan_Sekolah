<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

    private $m_admin;

    function __construct() {
		parent::__construct();
		$this->load->model('M_Admin');
		$this->m_admin = $this->M_Admin;

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

    public function index() {
        $data = generate_page('Administator', 'administrator', 'Admin');
        $data_content['title_page'] = 'Data Administrator / Pengelola';
		$data['content'] = $this->load->view('partial/Administrator/V_Administrator', $data_content, true);
		$this->load->view('V_Dashboard', $data);
    }

    public function admin_list_ajax() {
        json_dump( function() {
            $result = $this->m_admin->list_admin();
            $new_arr = array();
            $i = 1;
            foreach ($result as $key => $value) {
                $value-> no = $i;
                $new_arr[] = $value;
                $i++;
            }
            return array('data' => $new_arr);
        });
    }

    public function add_new() {

    }

    public function delete() {

    }

    public function edit() {
        
    }
}