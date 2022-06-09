<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pengembalian extends CI_Model {

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

    public function data_pengembalian() {
        $q = $this->db->select(' t.id_transaksi, t.kode_pinjam, t.tgl_pinjam, t.tgl_kembali, 
								 t.id_siswa, t.id_buku, t.status, t.denda, t.tgl_dikembalikan,
                                 s.nama_siswa,
                                 b.judul_buku')
                      ->from ('transaksi as t')
                      ->join ('siswa as s', 's.id_siswa = t.id_siswa', 'LEFT')
                      ->join ('buku as b', 'b.id_buku = t.id_buku', 'LEFT')
					  ->where('status', 'dikembalikan')
                      ->get();
        return $q->result();
    }

    public function data_kembalikan_list_ajax($json) {
		$new_arr=array();$i=1;
		foreach ($json as $key => $value) {
			$value->no=$i;
			switch ($value->status) {
				case 'dipinjam':
					$label = 'warning';
				break;
				case 'dikembalikan':
					$label = 'success';
				break;
				case 'telat':
					$label = 'danger';
				break;
			};

			$diff  = date_diff( date_create($value->tgl_pinjam), date_create($value->tgl_kembali) );
			$value->lama_pinjam = $diff->format('%d hari'); // hitung hari di tabel

			
			$tgl_kembali = new DateTime( $value->tgl_kembali); // hitung hari telat kembalikan
			$tgl_sekarang = new DateTime();
			$selisih = $tgl_sekarang->diff($tgl_kembali)->format("%a");

			if ($tgl_kembali >= $tgl_sekarang OR $selisih == 0) {
				$value->denda = "<span class='badge badge-success'>Tidak kena denda</span>";
			} else {
				$value->denda ="Telat <b style = 'color: red;'>".$selisih."</b> Hari <br>
				<span class='badge badge-danger'> Denda perhari = Rp.500</span>";
			}

			$value->tgl_pinjam = date_format( date_create($value->tgl_pinjam), 'd-m-Y');
			$value->tgl_kembali = date_format( date_create($value->tgl_kembali), 'd-m-Y');
			$value->status = '<label class="badge badge-'.$label.' text-uppercase">'.$value->status.'</label>';
			$new_arr[]=$value;
			$i++;
		}
		return $new_arr;
	}
}