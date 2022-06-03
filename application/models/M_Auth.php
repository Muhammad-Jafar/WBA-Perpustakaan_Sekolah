<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model {

	private function loginAdmin($email, $password) {
		// $q=$this->db->select('*')->where(array('usename' => $email, 'password' => md5($password)))->get('admin');
		$q=$this->db->select('*')->where(array('username' => $email, 'password' => $password))->get('admin');
		return $q;
	}

	public function doLogin($email, $password) {
		$cek_login_admin = $this->loginAdmin($email, $password);
	
		if( $cek_login_admin->num_rows() ) {
			$d = $cek_login_admin->row();
			$this->session->set_userdata('is_logged_in', 'login');
			$this->session->set_userdata('user_type', $d->level_user);
			$this->session->set_userdata('user_id', $d->id_admin);
			$this->session->set_userdata('user_name', $d->nama_admin);
			$this->session->set_userdata('user_username', $d->username);
			// $this->session->set_userdata('user_avatar', uploads_url('avatar/' . $d->avatar));
			
			redirect( base_url('dashboard') );
		}

		else {
			$this->session->set_flashdata('msg_alert', 'Username atau password anda salah!');
			redirect( base_url('auth/login') );
		}
	}
}

/* End of file auth.php */
/* Location: ./application/models/M_Auth.php */