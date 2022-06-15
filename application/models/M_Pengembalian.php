<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pengembalian extends CI_Model {

    public function data_pengembalian() {
        $q = $this->db->select(' t.id_transaksi, t.kode_pinjam, t.tgl_pinjam, t.tgl_kembali, 
								 t.id_siswa, t.id_buku, t.status, t.tgl_dikembalikan,
                                 s.nama_siswa,
                                 b.judul_buku, d.denda')
                      ->from ('transaksi as t')
                      ->join ('siswa as s', 's.id_siswa = t.id_siswa', 'LEFT')
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

			$tgl_kembali = new DateTime( $value->tgl_kembali); // hitung hari telat kembalikan
			$tgl_sekarang = new DateTime();
			$tgl_dikembalikan = new DateTime( $value->tgl_dikembalikan);
			$kembalikan = $tgl_dikembalikan->diff($tgl_kembali)->format("%a");
			$total_denda = $kembalikan * 500;

			if ( $value->status == 'dikembalikan' && $tgl_kembali >= $tgl_sekarang && $tgl_dikembalikan <= $tgl_kembali ) {
				$value->denda = "<span class='badge badge-success' style=font-size:13px; >Tidak kena denda</span>";
			} elseif ($value->status == 'dikembalikan') {
				$value->denda ="Telat <b style = 'color: red;font-size:15px;'>".$kembalikan."</b> Hari <br>
				<span class='badge badge-danger'style=font-size:13px;> Denda Rp.".$total_denda;
			} elseif ($value->status == 'dipinjam') {
				$value->denda = "<span class='badge badge-success' style=font-size:13px; >Tidak kena denda</span>";
			}

			switch ($value->denda) {
				case 'dikembalikan':
					$label = 'success';
				break;
				case 'telat':
					$label = 'danger';
				break;
			};

			$diff  = date_diff( date_create($value->tgl_pinjam), $tgl_sekarang );
			$value->lama_pinjam = $diff->format('%d hari'); // hitung hari di tabel

			$value->tgl_pinjam = date_format( date_create($value->tgl_pinjam), 'd-m-Y');
			$value->tgl_kembali = date_format( date_create($value->tgl_kembali), 'd-m-Y');
			$value->tgl_dikembalikan = date_format( date_create($value->tgl_dikembalikan), 'd-m-Y');
			$new_arr[]=$value;
			$i++;
		}
		return $new_arr;
	}
}