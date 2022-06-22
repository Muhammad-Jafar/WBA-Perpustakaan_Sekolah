<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	private $m_laporan;

	function __construct() {
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

	public function list_skbp_ajax() {
		json_dump(function() {
			$result= $this->m_laporan->tabel_cetak_sk();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) {
				$value->no=$i;
				$new_arr[]=$value;
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	public function laporan_ajax() {
		json_dump(function() {
			$result= $this->m_laporan->laporan_list_ajax ( $this->m_laporan->tabel_laporan() );
			return array('data' => $result);
		});
	}

	//fungsi cetak laporan dalam bentuk tabel
	public function sk_laporan() {
		$data = array('title' 			  => 'Data Laporan Perpustakaan',
					  'teks_pelajaran'	  => $this->m_laporan-> pinjam_buku_tp(),
					  'non_teks_pelajaran'=> $this->m_laporan-> pinjam_buku_ntp() );

		$this->load->view('SK_Laporan', $data);
	}

	function get_nama_siswa(){
        if (isset($_GET['term'])) {
            $result = $this->m_laporan->search_nama_siswa($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
				$arr_result[] = array ( 'label' => $row->nama_anggota,
										'id_anggota' => $row->id_anggota,
										'nomor_induk' => $row->nomor_induk,
										'kelas' => $row->kelas, 
										'jurusan' => $row->jurusan );
                echo json_encode($arr_result);
            }
        }
    }

	public function buat_sk() { 
		if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
			$id_anggota = $this->security->xss_clean( $this->input->post('id_anggota'));
			$kode_sk = $this->security->xss_clean( $this->input->post('kode_sk'));

			$this->form_validation->set_rules('id_anggota', 'ID anggota', 'required');
			$this->form_validation->set_rules('kode_sk', 'kode sk', 'required');

			if (!$this-> form_validation->run()) {
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect(base_url('laporan/buat_sk'));
			}

			$this->m_laporan->buat_sk( $id_anggota, $kode_sk );
			redirect(base_url('laporan/buat_sk'));
		}

		$data = generate_page ('Buat SK Bebas Pustaka untuk Anggota Perpustakaan', 'laporan/buat_sk','Admin');
		$data_content['title_page'] = 'Buat SK Bebas Pustaka';
		$data_content['kode_sk'] = $this->m_laporan->kodeSK();
		$data['content'] = $this->load->view('partial/SK/buat_sk', $data_content, true);
		$this->load->view('V_Dashboard', $data);
	}

	public function print()
	{
		if( empty($this->uri->segment('3'))) {
			redirect( base_url('laporan/buat_sk') );
		}

		$id=$this->uri->segment('3');
		$data['dl'] = false;
		$data['id'] = $id;
		$data['data'] = $this->m_laporan->get_data_skbp($id);

		$data['nama_siswa'] = $data['data']->nama_anggota;
		$data['kode_sk'] = $data['data']->kode_sk;
		$data['nipd'] = $data['data']->nomor_induk;
		$data['kelas'] = $data['data']->kelas;
		$data['jurusan'] = $data['data']->jurusan;
		if( $_SERVER['REQUEST_METHOD'] == 'GET') {
			if( isset($_GET['dl']) ) {
				$data['dl'] = true;
				header("Content-type: application/vnd.ms-word");
				header("Content-Disposition: attachment; filename=SkBAAK-{$data['type_id']}-{$id}.doc");
			}
		}
		$data['tgl_terbit'] = date_format( date_create($data['data']->tgl_terbit), 'd M Y');
		$this->load->view('SK_Bebas_Pustaka', $data);
	}
}