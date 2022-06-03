<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( !function_exists('isnt_admin') ) {
	
	function isnt_admin($callback) {
		$ci =& get_instance();
		if ( $ci->session->userdata('user_type') !== 'admin') // 1 = admin
		{
			$callback();
		}
	}

}

if( !function_exists('is_siswa') ) {
	
	function is_siswa($callback) {
		$ci =& get_instance();
		if ( $ci->session->userdata('user_type') !== 'siswa') // 2 = siswa
		{
			$callback();
		}
	}

}