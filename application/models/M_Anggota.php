<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Anggota extends CI_Model {

    public function list_siswa() {
        $q = $this->db->select('*')->get('siswa');
        return $q->result();
    }

	public function get_data_siswa($id){
		$q=$this->db->select('*')->from('siswa')->where('id_siswa', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/anggota/siswa') );
		}
		return $q->row();
	}

    public function siswa_add_new( $nama_siswa, $nis, $kelas, $jurusan ) {
        $d_t_d = array( 'nama_siswa' => $nama_siswa,
						'nis' 	     => $nis,
						'kelas' 	 => $kelas,
						'jurusan' 	 => $jurusan);
                        
		$this->db->insert('siswa', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data anggota baru berhasil ditambahkan');
    }

    public function siswa_delete($id){
		$this->db->delete('siswa', array('id_siswa' => $id));
	}

    public function siswa_update( $id, $nama_siswa, $nis, $kelas, $jurusan ) {
        $d_t_d = array( 'nama_siswa' => $nama_siswa,
						'nis' 	     => $nis,
						'kelas' 	 => $kelas,
						'jurusan' 	 => $jurusan );

		$this->db->where('id_siswa', $id)->update('siswa', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data anggota baru berhasil diperbarui');
    }

	public function list_guru() {
        $q = $this->db->select('*')->get('guru');
        return $q->result();
    }

	public function get_data_guru($id){
		$q=$this->db->select('*')->from('guru')->where('id_guru', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/anggota/guru') );
		}
		return $q->row();
	}

	public function guru_add_new( $nama_guru, $nipd, $kelas_ajar, $jurusan_ajar ) {
        $d_t_d = array( 'nama_guru'   => $nama_guru,
						'nipd' 	      => $nipd,
						'kelas_ajar'  => $kelas_ajar,
						'jurusan_ajar'=> $jurusan_ajar);
                        
		$this->db->insert('guru', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data anggota baru berhasil ditambahkan');
    }

    public function guru_delete($id){
		$this->db->delete('guru', array('id_guru' => $id));
	}

    public function guru_update( $id, $nama_guru, $nipd, $kelas_ajar, $jurusan_ajar ) {
        $d_t_d = array( 'nama_guru'   => $nama_guru,
						'nipd' 	      => $nipd,
						'kelas_ajar'  => $kelas_ajar,
						'jurusan_ajar'=> $jurusan_ajar);

		$this->db->where('id_guru', $id)->update('guru', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data anggota baru berhasil diperbarui');
    }
}