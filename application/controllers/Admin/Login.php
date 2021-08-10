<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('M_login');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') == "admin"){
			echo "<script>
                alert('Anda sudah login');
                window.location.href = '".base_url('Admin/Beranda')."';
            </script>";//Url tujuan
		}
	}
	function index(){
		$this->load->view('Admin/v_login');
	}
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		foreach($this->M_login->iduser($username) as $row){
			$iduser=$row->id_admin;
			$username = $row->username;
		}
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->M_login->cek_login("admin",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'username' => $username,
				'iduseradmin' => $iduser,
				'status' => 'admin',
				);
			$this->session->set_userdata($data_session);
 
			redirect('Admin/Beranda');
		}else{
			echo "<script>
                alert('Username dan password salah');
                window.location.href = '".base_url('Admin/Login')."';
            </script>";//Url tujuan
		}
	}

}
