<?php

// Copas library PBL sebelumnya
class Auth_Library
{
	protected $CI;
	public function __construct()
	{
		$this->CI =& get_instance();
	}
	function must_admin()
	{
		$userdata = $this->CI->session->get_userdata();
		if (!isset($userdata['logged_in']) || $userdata['role'] != "admin") {
			redirect(base_url('/login?r=' . $this->CI->uri->uri_string()));
			exit();
		}
	}
	function must_login()
	{
		if ($this->CI->session->userdata('logged_in') !== true) {
			redirect(base_url('/login?r=' . $this->CI->uri->uri_string()));
			exit();
		}
	}
}


