<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_Buku extends CI_Controller {

	private $m_manajemenbuku;

	function __construct() {
		parent::__construct();
		$this->load->model('M_ManajemenBuku');
		$this->m_manajemenbuku = $this->M_ManajemenBuku;
		if ( $this->session->userdata('user_type') != 'admin' ) {
			$this->user_type = 'Admin';

			isnt_admin(function() {
				redirect( base_url('auth/login') );
			});
		}
	}

	public function index() {
		redirect( base_url('dashboard') );
	}

	public function data_buku() {
		$data = generate_page('Data Buku', 'manajemen_buku/data_buku', 'Admin');
		$data_content['title_page'] = 'Data Buku';
		$data['content'] = $this->load->view('partial/ManajemenBuku/V_DataBuku_Read', $data_content, true);
		$this->load->view('V_Dashboard', $data);
	}

	public function data_buku_ajax() {
		json_dump(function() {
			$result= $this->m_manajemenbuku->list_buku();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) {
				$value->no=$i;
				$new_arr[]=$value;
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	public function klasifikasi_buku() {
		$data = generate_page('Data Buku', 'manajemen_buku/klasifikasi_buku', 'Admin');
		$data_content['title_page'] = 'Data Klasifikasi Buku';
		$data['content'] = $this->load->view('partial/ManajemenBuku/V_KlasifikasiBuku_Read', $data_content, true);
		$this->load->view('V_Dashboard', $data);
	}

	public function klasifikasi_buku_ajax() {
		json_dump(function() {
			$result= $this->m_manajemenbuku->klasifikasi_buku();
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
