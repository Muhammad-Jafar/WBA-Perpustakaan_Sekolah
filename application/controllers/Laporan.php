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


	public function sk_laporan(){
		$data = array('title' 		=> 'Data Laporan Perpustakaan',
					'teks_pelajaran'=> $this->m_laporan-> pinjam_buku_tp(),
					'non_teks_pelajaran'=> $this->m_laporan-> pinjam_buku_ntp() );

		$this->load->view('SK_Laporan', $data);
	}

	public function sk_bebas_pustaka() {
		if( empty($this->uri->segment('3'))) {
			redirect( base_url('/dashboard') );
		}

		$id=$this->uri->segment('3');
		$data['dl'] = false;
		$data['id'] = $id;
		$data['user_name'] = $this->session->userdata('user_name');
		$data['data'] = $this->m_datasiswa->get_data_izin($id);

		$data['nama_izin'] = $data['data']->nama_izin;
		$data['type'] = $data['data']->type;
		switch ($data['type']) {
			case 'cuti':
					$data['type_id'] = '001';
				break;
			case 'sekolah':
					$data['type_id'] = '002';
				break;
			case 'seminar':
					$data['type_id'] = '003';
				break;
		}
		if( $_SERVER['REQUEST_METHOD'] == 'GET') {
			if( isset($_GET['dl']) ) {
				$data['dl'] = true;
				header("Content-type: application/vnd.ms-word");
				header("Content-Disposition: attachment; filename=SkBAAK-{$data['type_id']}-{$id}.doc");
			}
		}
		
		$data['tempat_lahir'] = strtoupper($data['data']->tempat_lahir);
		$data['tanggal_lahir'] = date_format( date_create($data['data']->tanggal_lahir), 'd M Y');
		$data['alamat'] = $data['data']->alamat;
		$data['nama'] = explode(' ', $data['data']->nama)[0];
		$diff  = date_diff( date_create($data['data']->tglawal), date_create($data['data']->tglakhir) );
		$data['selama'] = $diff->format('%d hari');
		$data['tglawal'] = date_format( date_create($data['data']->tglawal), 'd M Y');
		$data['tglakhir'] = date_format( date_create($data['data']->tglakhir), 'd M Y');
		$this->load->view('Surat_Keterangan_New', $data);
	}
}