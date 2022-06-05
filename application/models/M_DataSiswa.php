<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_DataSiswa extends CI_Model {

    public function list_siswa() {
        $q = $this->db->select('*')->get('siswa');
        return $q->result();
    }

	public function get_data_siswa($id){
		$q=$this->db->select('*')->from('siswa')->where('id_siswa', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_siswa') );
		}
		return $q->row();
	}

    public function data_siswa_add_new( $level_user, $nama_siswa, $nis, $kelas, $jurusan ) {
        $d_t_d = array( 'level_user' => $level_user,
						'nama_siswa' => $nama_siswa,
						'nis' 	     => $nis,
						'kelas' 	 => $kelas,
						'jurusan' 	 => $jurusan);
                        
		$this->db->insert('siswa', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data anggota baru berhasil ditambahkan');
    }

    public function data_siswa_delete($id){
		$this->db->delete('siswa', array('id_siswa' => $id));
	}

    public function data_siswa_update( $id, $nama_siswa, $nis, $kelas, $jurusan ) {
        $d_t_d = array( 'nama_siswa' => $nama_siswa,
						'nis' 	     => $nis,
						'kelas' 	 => $kelas,
						'jurusan' 	 => $jurusan );

		$this->db->where('id_siswa', $id)->update('siswa', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data anggota baru berhasil diperbarui');
    }
}