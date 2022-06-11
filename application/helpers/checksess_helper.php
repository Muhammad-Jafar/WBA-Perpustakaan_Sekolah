<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( !function_exists('isnt_admin') ) {
	
	function isnt_admin($callback) {
		$ci =& get_instance();
		if ( $ci->session->userdata('user_type') !== 'admin')
		{
			$callback();
		}
	}

}

if( !function_exists('isnt_siswa') ) {
	
	function isnt_siswa($callback) {
		$ci =& get_instance();
		if ( $ci->session->userdata('user_type') !== 'siswa')
		{
			$callback();
		}
	}

}

if( !function_exists('isnt_kepsek') ) {
	
	function isnt_kepsek($callback) {
		$ci =& get_instance();
		if ( $ci->session->userdata('user_type') !== 'kepsek')
		{
			$callback();
		}
	}

}