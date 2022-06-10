<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Peminjaman extends CI_Model {

    public function data_peminjaman() {
        $q = $this->db->select(' t.id_transaksi, t.kode_pinjam, t.tgl_pinjam, t.tgl_kembali, 
								 t.id_siswa, t.id_buku, t.status, t.denda,
                                 s.nama_siswa,
                                 b.judul_buku')
                      ->from ('transaksi as t')
                      ->join ('siswa as s', 's.id_siswa = t.id_siswa', 'LEFT')
                      ->join ('buku as b', 'b.id_buku = t.id_buku', 'LEFT')
					  ->where('status', 'dipinjam')
                      ->get();
        return $q->result();
    }

    public function data_pinjam_list_ajax($json) {
		$new_arr=array();$i=1;
		foreach ($json as $key => $value) {
			$value->no=$i;
			switch ($value->status) {
				case 'dipinjam':
					$label = 'warning';
				break;
				// case 'telat':
				// 	$label = 'danger';
				// break;
			};

			$diff  = date_diff( date_create($value->tgl_pinjam), date_create($value->tgl_kembali) );
			$value->lama_pinjam = $diff->format('%d hari'); // hitung hari di tabel

			
			$tgl_kembali = new DateTime( $value->tgl_kembali); // hitung hari telat kembalikan
			$tgl_sekarang = new DateTime();
			$selisih = $tgl_sekarang->diff($tgl_kembali)->format("%a");
			$hargadenda = 500;
			$total_denda = $selisih * $hargadenda;

			if ($tgl_kembali >= $tgl_sekarang OR $selisih == 0) {
				$value->denda = "<span class='badge badge-success' style=font-size:13px; >Tidak kena denda</span>";
			} else {
				$value->denda ="Telat <b style = 'color: red;font-size:13px;' >".$selisih."</b> Hari <br>
				<span class='badge badge-danger' style=font-size:13px; > Denda perhari = Rp.500</span>";
				// $value->denda = $total_denda;
			}

			$value->tgl_pinjam = date_format( date_create($value->tgl_pinjam), 'd-m-Y');
			$value->tgl_kembali = date_format( date_create($value->tgl_kembali), 'd-m-Y');
			$value->status = '<label class="badge badge-'.$label.' text-uppercase" style=font-size:13px;>'.$value->status.'</label>';
			$new_arr[]=$value;
			$i++;
		}
		return $new_arr;
	}


	//fungsi auto show data by search char with ajax
	function search_nama_siswa($nama_siswa) {
        $this->db->like('nama_siswa', $nama_siswa , 'both');
        $this->db->order_by('nama_siswa', 'ASC');
        $this->db->limit(10);
		return $this->db->get('siswa')->result();
    }

	function search_judul_buku($judul_buku) {
        $this->db->like('judul_buku', $judul_buku , 'both');
        $this->db->order_by('judul_buku', 'ASC');
        $this->db->limit(10);
        return $this->db->get('buku')->result();
    }

	public function peminjaman_add_new( $id_siswa, $kode_pinjam, $status, $id_buku, $tgl_pinjam, $tgl_kembali) {
		$d_t_d = array( 'id_siswa'   => $id_siswa,
						'kode_pinjam'=> $kode_pinjam,
						'status'	 => $status,
						'id_buku' 	 => $id_buku,
						'tgl_pinjam' => $tgl_pinjam,
						'tgl_kembali' => $tgl_kembali );
		
		$this->db->insert('transaksi', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Transaksi peminjam baru berhasil ditambahkan');
	}
	
	//buat kode peminjaman otomatis generate
	public function buatkodepinjam() {
		$this->db->select('RIGHT(transaksi.kode_pinjam, 4) as kodepinjam', FALSE);
		$this->db->order_by('kodepinjam','DESC');    
		$this->db->limit(1);    

		$query = $this->db->get('transaksi');
			if($query->num_rows() > 0){      
				 $data = $query->row();
				 $kode = intval($data->kodepinjam) + 1; 
			}
			else{      
				 $kode = 1;  
			}
		$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
		$kodetampil = "PJ-". $batas;
		return $kodetampil;  
	}
	
	public function kembalikan_buku($id_transaksi) {
		$q = array ( 'status' => 'dikembalikan',
					 'denda' => 'denda',
					 'tgl_dikembalikan' => date('Y-m-d') //set tanggal sekarang saat dikembalikan buku
					);
		$this->db->where('id_transaksi', $id_transaksi)->update('transaksi', $q);
	}
}
