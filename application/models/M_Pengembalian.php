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

    public function data_pengembalian() {
        $q = $this->db->select(' t.tgl_pinjam, t.tgl_kembali, t.denda,
                                 s.nama_siswa, s.kelas, s.jurusan,
                                 b.judul_buku')
                      ->from ('transaksi as t')
                      ->join ('siswa as s', 's.id_siswa = t.id_siswa', 'LEFT')
                      ->join ('buku as b', 'b.id_buku = t.id_buku', 'LEFT')
                      ->get();
        return $q->result();
    }

}