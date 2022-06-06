<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Laporan extends CI_Model {

    public function list_siswa() {
        $s = $this->db->select('*')->get('siswa');
        return $s->result();
    }

    public function list_buku() {
        $b = $this->db->select('*')->get('buku');
        return $b->result();
    }

    public function list_jenis_buku() {
        $jb = $this->db->select('*')->get('jenis_buku');
        return $jb->result();
    }

    public function data_transaksi() {
        $t = $this->db->select('')
                      
                      ->get();
    }
}