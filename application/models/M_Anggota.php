<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Anggota extends CI_Model {

    public function list_siswa() {
        $q = $this->db->select('*')->from('anggota')->where('kategori_anggota', 'siswa')->get();
        return $q->result();
    }

	public function list_guru() {
        $q = $this->db->select('*')->from('anggota')->where('kategori_anggota', 'guru')->get();
        return $q->result();
    }

	public function get_data_siswa($id){
		$q=$this->db->select('*')->from('anggota')->where('id_anggota', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/anggota/siswa') );
		}
		return $q->row();
	}

	public function get_data_guru($id){
		$q=$this->db->select('*')->from('anggota')->where('id_anggota', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/anggota/guru') );
		}
		return $q->row();
	}

    public function anggota_add_new( $nama_anggota, $kategori_anggota, $nomor_induk, $kelas, $jurusan ) {
        $d_t_d = array( 'nama_anggota'	  => $nama_anggota,
						'kategori_anggota'=> $kategori_anggota,
						'nomor_induk' 	  => $nomor_induk,
						'kelas' 	  	  => $kelas,
						'jurusan' 	  	  => $jurusan );
                        
		$this->db->insert('anggota', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data anggota baru berhasil ditambahkan');
    }

    public function anggota_delete($id){
		$this->db->delete('anggota', array('id_anggota' => $id));
	}

    public function anggota_update( $id, $nama_anggota, $nomor_induk,  $kelas, $jurusan ) {
        $d_t_d = array( 'nama_anggota'	  => $nama_anggota,
						'nomor_induk' 	  => $nomor_induk,
						'kelas' 	  	  => $kelas,
						'jurusan' 	  	  => $jurusan );

		$this->db->where('id_anggota', $id)->update('anggota', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data anggota baru berhasil diperbarui');
    }
}
