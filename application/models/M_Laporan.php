<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Laporan extends CI_Model {

    public function tabel_laporan() {
        $q = $this->db->select(' t.id_transaksi, t.kode_pinjam, t.tgl_pinjam, t.tgl_kembali, 
                                t.id_siswa, t.id_buku, t.denda, t.tgl_dikembalikan,
                                s.nama_siswa,
                                b.judul_buku, b.id_jenis_buku,
                                jb.jenis_buku')
        ->from ('transaksi as t')
        ->join ('siswa as s', 's.id_siswa = t.id_siswa', 'LEFT')
        ->join ('buku as b', 'b.id_buku = t.id_buku', 'LEFT')
        ->join ('jenis_buku as jb', 'jb.id_jenis_buku = b.id_jenis_buku', 'LEFT')
        ->get();
        return $q->result();
    }
}