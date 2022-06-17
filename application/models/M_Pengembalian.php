<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pengembalian extends CI_Model {

    public function data_pengembalian() {
        $q = $this->db->select(' t.id_transaksi, t.kode_pinjam, t.tgl_pinjam, t.tgl_kembali, 
								 t.id_siswa, t.id_buku, t.status, t.tgl_dikembalikan,
                                 s.nama_siswa,
                                 b.judul_buku, d.denda, d.telat')
                      ->from ('transaksi as t')
                      ->join ('anggota as s', 's.id_siswa = t.id_siswa', 'LEFT')
                      ->join ('buku as b', 'b.id_buku = t.id_buku', 'LEFT')
					  ->join ('denda as d', 'd.id_transaksi = t.id_transaksi', 'LEFT')
					  ->where('status', 'dikembalikan')
                      ->get();
        return $q->result();
    }

    public function data_kembalikan_list_ajax($json) {
		$new_arr=array();$i=1;
		foreach ($json as $key => $value) {
			$value->no=$i;

			$value->tgl_pinjam = date_format( date_create($value->tgl_pinjam), 'd-m-Y');
			$value->tgl_kembali = date_format( date_create($value->tgl_kembali), 'd-m-Y');
			$value->tgl_dikembalikan = date_format( date_create($value->tgl_dikembalikan), 'd-m-Y');

			$telat = $value->telat;
			if ($telat <= 0) {
				$value->telat = "Telat <b style = 'color: green; font-size:15px;'>".$telat."</b> Hari";
			} else {
				$value->telat = "Telat <b style = 'color: red;font-size:15px;'>".$telat."</b> Hari";
			}
			
			$denda = $value->denda;
			if ($denda <= 0) {
				$value->denda = "<span class='badge badge-success' style= 'font-size:14px; font-weight:normal;'> Tidak kena denda";
			} else {
				$value->denda = "<span class='badge badge-danger' style= 'font-size:14px; font-weight:normal;'> Denda Rp.".$denda;
			}
			$new_arr[]=$value;
			$i++;
		}
		return $new_arr;
	}
}