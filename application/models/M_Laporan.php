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

    public function tabel_cetak_sk() {
		$q = $this->db->select(' bp.id_laporan, bp.kode_sk, bp.id_anggota, bp.tgl_terbit,
                                 a.nama_anggota, a.nomor_induk, a.kelas, a.jurusan' )
                                 ->from ('sk_bp as bp')
                                 ->join ('anggota as a', 'a.id_anggota = bp.id_anggota', 'LEFT')
                                 ->get();
		return $q->result();
	}

    public function get_data_skbp($id) {
        $q = $this->db->select('*')->from('sk_bp as sk')->join('anggota as a', 'a.id_anggota = sk.id_anggota', 'LEFT')->where('id_laporan', $id)->limit(1)->get();
        if ( $q->num_rows() < 1 ) {
            redirect( base_url('laporan/buat_sk') );
        }
        return $q->row();
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

	//buat kode SK bebas pustaka otomatis generate
	function KodeSK() {
        $this->db->select('RIGHT(sk_bp.kode_sk,4) as kodesk', false);
        $this->db->order_by("kodesk", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('sk_bp');

        // CEK JIKA DATA ADA
        if( $query->num_rows() <> 0 ) {
            $data  = $query->row();
            $kode  = intval($data->kodesk) + 1;
        } 
		else { $kode  = 1; }

        $lastKode = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $tahun    = date("Y");
        $SK       = "SK";
		$BP		  = "Bebas Pustaka";
        $newKode  = $SK."/".$BP."/".$tahun."/".$lastKode;

        return $newKode;
   }

   //fungsi auto show data by search char with ajax
	function search_nama_siswa($nama_anggota) {
        $this->db->like('nama_anggota', $nama_anggota , 'both');
		$this->db->where('kategori_anggota', 'siswa');
        $this->db->order_by('nama_anggota', 'ASC');
        $this->db->limit(10);
		return $this->db->get('anggota')->result();
    }

	public function buat_sk( $id_anggota, $kode_sk ) {
		$d_t_d = array( 'kode_sk' 	=> $kode_sk, 
						'id_anggota' => $id_anggota );	
		$this->db->insert('sk_bp', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Berhasil membuat SK Bebas Pustaka');
	}

}
