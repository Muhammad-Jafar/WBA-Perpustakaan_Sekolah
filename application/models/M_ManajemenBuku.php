<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ManajemenBuku extends CI_Model {

	public function list_buku() {
		$q=$this->db->select('*')-> from ('buku as b')
								 -> join ('jenis_buku as k', 'k.id_jenis_buku = b.id_jenis_buku', 'LEFT')
								 -> get();
						return $q-> result();
	}

	
	public function klasifikasi_buku() {
		$q=$this->db->select('*')->get('jenis_buku');
		return $q->result();
	}

	// JENIS BUKU =================================================================
	public function cek_id_jenis_buku() {
		$q = $this->db->query('SELECT COUNT(*) FROM jenis_buku');
		return $q->row_array()['COUNT(*)'];
	}

	public function jenis_buku_add_new( $jenis_buku ) {
		$d_t_d = array( 'jenis_buku' => $jenis_buku);
		$this->db->insert('jenis_buku', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data jenis buku berhasil ditambahkan');
	}

	public function jenis_buku_delete($id){
		$this->db->delete('jenis_buku', array('id_Jenis_buku' => $id));
	}

	public function jenis_buku_update($id, $jenis_buku){
		$d_t_d = array( 'jenis_buku' => $jenis_buku );
		$this->db->where('id_jenis_buku', $id)->update('jenis_buku', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data jenis buku berhasil diubah');
	}

	public function get_data_jenis_buku($id){
		$q=$this->db->select('*')->from('jenis_buku')->where('id_jenis_buku', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/manajemen_buku/klasifikasi_buku') );
		}
		return $q->row();
	}
	// JENIS BUKU =================================================================

	
	// DATA BUKU =================================================================
	public function get_data_klasifikasi_buku() {
		$q=$this->db->select('*')->get('jenis_buku');
		return $q->result();
	}

	public function data_buku_add_new( $id_jenis_buku, $kode_buku, $judul_buku, $pengarang, $penerbit,
									   $tahun_terbit, $jumlah_halaman, $qt ) {
		$d_t_d = array( 'id_jenis_buku'	=> $id_jenis_buku,
						'judul_buku' 	=> $judul_buku,
						'kode_buku'		=> $kode_buku,
						'pengarang' 	=> $pengarang,
						'penerbit' 		=> $penerbit,
						'tahun_terbit' 	=> $tahun_terbit,
						'jumlah_halaman'=> $jumlah_halaman,
						'qt' 			=> $qt );
		$this->db->insert('buku', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Buku baru berhasil ditambahkan');
	}

	public function data_buku_delete($id){
		$this->db->delete('buku', array('id_buku' => $id));
	}

	public function data_buku_update( $id, $id_jenis_buku,$kode_buku, $judul_buku, $pengarang, $penerbit,
									  $tahun_terbit, $jumlah_halaman, $qt ) {
		$d_t_d = array( 'id_jenis_buku'	=> $id_jenis_buku,
						'judul_buku' 	=> $judul_buku,
						'kode_buku' 	=> $kode_buku,
						'pengarang' 	=> $pengarang,
						'penerbit' 		=> $penerbit,
						'tahun_terbit' 	=> $tahun_terbit,
						'jumlah_halaman'=> $jumlah_halaman,
						'qt' 			=> $qt );

		$this->db->where('id_buku', $id )->update('buku', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data buku berhasil diperbarui');
	}

	public function get_data__buku($id){
		$q=$this->db->select('*')->from('buku')->where('id_buku', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/manajemen_buku/data_buku') );
		}
		return $q->row();
	}
	// DATA BUKU =================================================================

}
