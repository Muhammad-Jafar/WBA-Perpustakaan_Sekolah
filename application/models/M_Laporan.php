<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Laporan extends CI_Model {

    public function tabel_laporan() {
        $q = $this->db->select(' t.id_transaksi, t.kode_pinjam, t.tgl_pinjam, t.tgl_kembali, 
                                t.id_anggota, t.id_buku, t.tgl_dikembalikan, t.status,
                                a.nama_anggota, a.kategori_anggota,
                                b.judul_buku,
								d.denda')
        ->from ('transaksi as t')
        ->join ('anggota as a', 'a.id_anggota = t.id_anggota', 'LEFT')
        ->join ('buku as b', 'b.id_buku = t.id_buku', 'LEFT')
		->join ('denda as d', 'd.id_transaksi = t.id_transaksi', 'LEFT')
        ->get();
        return $q->result();
    }

    public function laporan_list_ajax($json) {
		$new_arr=array();$i=1;
		foreach ($json as $key => $value) {
			$value->no=$i;

			$tgl_sekarang = new DateTime();
			$value->tgl_pinjam = date_format( date_create($value->tgl_pinjam), 'd-m-Y');
			$value->tgl_kembali = date_format( date_create($value->tgl_kembali), 'd-m-Y');
			$value->tgl_dikembalikan = date_format( date_create($value->tgl_dikembalikan), 'd-m-Y');
			
			// status pinjam
            if ($value->status == 'dipinjam' && $value->tgl_kembali > $tgl_sekarang) {
                $value->tgl_dikembalikan = "<span class='badge badge-danger' style= 'font-size:14px; font-weight:normal; '>Belum dikembalikan</span>";
            } 
            else if ( $value->status == 'dipinjam' && $value->tgl_kembali <= $tgl_sekarang ) {
                    $value->tgl_dikembalikan = "<span class='badge badge-warning' style= 'font-size:14px; font-weight:normal; '>Masih dipinjam</span>";
            }

			$denda = $value->denda;
			if ($denda <= 0) {
				$value->denda = "<span class='badge badge-success' style= 'font-size:14px; font-weight:normal;'>Rp." . $denda;
			} else {
				$value->denda = "<span class='badge badge-danger' style= 'font-size:14px; font-weight:normal;'>Rp.".$denda;
			}

			$new_arr[]=$value;
			$i++;
		}
		return $new_arr;
	}

	// BAGIAN CETAK LAPORAN DAN EKSPOR KE EXCEL
	public function pinjam_buku_tp() {
        $q = $this->db->select('t.tgl_pinjam, t.tgl_kembali, t.id_anggota, t.id_buku, t.status,
                                a.nama_anggota, a.nomor_induk, a.kategori_anggota,
								b.judul_buku, b.kategori_buku,
                                jb.jenis_buku,
								d.telat, d.denda')
        ->from ('transaksi as t')
        ->join ('anggota as a', 'a.id_anggota = t.id_anggota', 'LEFT')
        ->join ('buku as b', 'b.id_buku = t.id_buku', 'LEFT')
		->join ('jenis_buku as jb', 'jb.id_jenis_buku = b.id_jenis_buku', 'LEFT')
		->join ('denda as d', 'd.id_transaksi = t.id_transaksi', 'LEFT')
		->where ('b.kategori_buku', 'Teks-pelajaran')
        ->get();
        return $q->result();
    }

	public function pinjam_buku_ntp() {
        $q = $this->db->select('t.tgl_pinjam, t.tgl_kembali, t.id_anggota, t.id_buku, t.status,
								a.nama_anggota, a.nomor_induk, a.kategori_anggota,
								b.judul_buku, b.kategori_buku,
								jb.jenis_buku,
								d.telat, d.denda')
        ->from ('transaksi as t')
		->join ('anggota as a', 'a.id_anggota = t.id_anggota', 'LEFT')
        ->join ('buku as b', 'b.id_buku = t.id_buku', 'LEFT')
		->join ('jenis_buku as jb', 'jb.id_jenis_buku = b.id_jenis_buku', 'LEFT')
		->join ('denda as d', 'd.id_transaksi = t.id_transaksi', 'LEFT')
		->where ('b.kategori_buku', 'Non Teks-pelajaran')
        ->get();
        return $q->result();
    }
}
