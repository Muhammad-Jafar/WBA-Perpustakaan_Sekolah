<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Katalog extends CI_Model { 
    
	public function show_katalog() {
		$q=$this->db->select( 'b.id_buku, b.judul_buku, b.pengarang, b.qt, 
							  k.jenis_buku, 
							  kb.kategori_buku ')
			-> from ('buku as b')
			-> join ('jenis_buku as k', 'k.id_jenis_buku = b.id_jenis_buku', 'LEFT')
			-> join ('kategori_buku as kb', 'kb.id_kategori_buku = b.id_kategori_buku', 'LEFT')
			-> get();
		return $q-> result();
	}


}