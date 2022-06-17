<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

    public function list_admin() {
        $q = $this->db->select('*')->get('admin');
        return $q->result();
    }

    public function get_data_admin($id_admin) {
        $q = $this->db->select('*')->from('admin')->where('id_admin', $id_admin)->limit(1)->get();
        if ($q->num_rows() < 1) {
            redirect ( base_url('/administrator/edit/'));
        }
        return $q->row();
    }

    public function admin_add_new($level_user, $nama_admin, $username, $password, $avatar=0) {
        $d_t_d = array( 'level_user' => $level_user, 
                        'nama_admin' => $nama_admin,
                        'username' => $username,
                        'password' => md5($password),
                        'avatar' => $avatar);
       if ( empty($avatar)) {
        $d_t_d['avatar'] = 'avatar.png';
       }
       $this->db->insert('admin', $d_t_d);
       $this->session->set_flashdata('msg_alert', 'Admin baru berhasil ditambahkan');
    }

    public function admin_delete($id) {
        $this->db->delete('admin', array('id_admin' => $id));
    }

    public function admin_update($id_admin, $level_user, $nama_admin, $username, $password, $avatar) {
        $d_t_d = array( 'id_admin'  => $id_admin,
                        'level_user' => $level_user, 
                        'nama_admin' => $nama_admin,
                        'username' => $username,
                        'password' => md5($password),
                        'avatar' => $avatar);

        if ( !empty($password)) { $d_t_d['password'] = md5($password); }
        if ( !empty($avatar)) { $d_t_d['avatar'] = $avatar; }

        $this->db->where('id_admin', $id_admin)->update('admin', $d_t_d);
        $this->session->set_flashdata('msg_alert', 'Data admin berhasil diperbarui');
    }
}