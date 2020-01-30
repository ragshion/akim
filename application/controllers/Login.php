<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('login');
	}

	function cek_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array (
			'username' => $username,
			'password' => sha1($password)
		);

		$cek = $this->db->where($where)->get('user')->row_array();
		if($cek){
			$data_session = array (
				'username' => $username,
				'status' => 'login',
				'nama' => $cek['nama'],
				'id_user' => $cek['id']
			);
			$this->session->set_userdata($data_session);
			redirect('');
		}else{
			$this->session->set_flashdata("alert","$(document).Toasts('create', {
				class: 'bg-maroon', 
				title: 'Error',
				subtitle: 'Login Gagal!',
				body: 'Username atau Password yang anda masukan salah!'
			  })"
			);
			redirect('login');
		}
	}

	function logout(){
		
		$this->session->sess_destroy();
		redirect('');
	}
}
