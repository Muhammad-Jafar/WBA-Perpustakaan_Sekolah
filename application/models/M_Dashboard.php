<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model {

	//===================== CARD DASHBOARD ADMIN ==========================

	public function jumlah_admin() {
		$q=$this->db->query('SELECT COUNT(*) FROM admin'); //TOTAL ADMIN
		return $q->row_array()['COUNT(*)'];
	}

	public function jumlah_buku() {
		$q = $this->db->query('SELECT COUNT(*) FROM buku'); // TOTAL BUKU
		return $q->row_array()['COUNT(*)'];
	}

	public function jumlah_anggota() {
		$q=$this->db->query('SELECT COUNT(*) FROM anggota'); //TOTAL ADMIN
		return $q->row_array()['COUNT(*)'];
	}

	public function total_buku_dipinjam() {
		$q = $this->db->query("SELECT ( SELECT COUNT(*) FROM transaksi AS t LEFT JOIN anggota AS a ON a.id_anggota = t.id_anggota WHERE t.status ='dipinjam') AS PINJAM "); // TOTAL BUKU YANG DI PINJAM
		return $q->row_array()['PINJAM'];
	}

	public function total_buku_dikembalikan() {
		$q = $this->db->query("SELECT ( SELECT COUNT(*) FROM transaksi AS t LEFT JOIN anggota AS a ON a.id_anggota = t.id_anggota WHERE status ='dikembalikan') AS KEMBALIKAN "); // TOTAL BUKU YANG DI KEMBALIKAN
		return $q->row_array()['KEMBALIKAN'];
	}
}
