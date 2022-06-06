<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Peminjaman extends CI_Model {

    public function list_peminjam() {
        $q = $this->db->select('*')->get('siswa');
        return $q->result();
    }

    public function list_buku() {
        $q = $this->db->select('*')->get('buku');
        return $q->result();
    }

	public function list_transaksi() {
		$q = $this->db->select('*')->get('transaksi');
	}

    public function data_peminjaman() {
        $q = $this->db->select(' t.tgl_pinjam,
                                 s.nama_siswa, s.kelas, s.jurusan,
                                 b.judul_buku')
                      ->from ('transaksi as t')
                      ->join ('siswa as s', 's.id_siswa = t.id_siswa', 'LEFT')
                      ->join ('buku as b', 'b.id_buku = t.id_buku', 'LEFT')
                      ->get();
        return $q->result();
    }

    public function data_pinjam_list_ajax($json) {
		$new_arr=array();$i=1;
		foreach ($json as $key => $value) {
			$value->no=$i;
			switch ($value->status) {
				case 'approved':
					$label = 'success';
					break;
				case 'add':
					$label = 'warning';
					break;
			};
			$diff  = date_diff( date_create($value->tgl_pinjam), date_create($value->tgl_kembali) );
			$value->lama_pinjam = $diff->format('%d hari');
			$value->tgl_pinjam = date_format( date_create($value->tgl_pinjam), 'd/m/Y');
			$value->tgl_kembali = date_format( date_create($value->tgl_kembali), 'd/m/Y');
			$value->status = '<label class="badge badge-'.$label.' text-uppercase">'.$value->status.'</label>';
			$new_arr[]=$value;
			$i++;
		}
		return $new_arr;
	}

	public function peminjaman_add_new( $id_siswa, $id_buku, $tgl_pinjam) {
		$d_t_d = array( 'id_siswa' => $id_siswa,
						'id_buku' 	 => $id_buku,
						'tgl_pinjam' => $tgl_pinjam );
		
		$this->db->insert('transaksi', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Transaksi peminjam baru berhasil ditambahkan');
	}
	
}
