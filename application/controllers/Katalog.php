<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends CI_Controller {

	private $m_katalog;

	function __construct() {
		parent::__construct();
		$this->load->model('M_Katalog');
		$this->m_katalog = $this->M_Katalog;
		if ( $this->session->userdata('user_type') == 'siswa') {
			$this->user_type = 'Siswa';
			is_siswa(function () {
				redirect( base_url('katalog') );
			});
		}
	}

	public function index() {   
        $data = generate_page('Katalog Buku', 'katalog', 'Siswa');
		$data_content['title_page'] = 'Katalog Buku Perpustakaan Sekolah';
		$data['content'] = $this->load->view('partial/Dashboard/Siswa', $data_content, true);
		$this->load->view('V_Dashboard', $data);
	}

    public function show_buku_ajax() {
		json_dump(function() {
			$result= $this->m_katalog->show_katalog();
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
