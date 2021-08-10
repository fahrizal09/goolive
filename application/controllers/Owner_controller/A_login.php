<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('M_login');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') == "admin"){
			echo "<script>
                alert('Anda sudah login');
                window.location.href = '".base_url('Owner_controller/Beranda')."';
            </script>";//Url tujuan
		}
	}
	function index(){
		$this->load->view('Owner_view/VA_login');
	}
	function aksi_login(){
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		foreach($this->M_login->iduser($username) as $row){
			$iduser=$row->id_user;
			$namauser = $row->nama_user;
		}
		$where = array(
			'email' => $username,
			'password' => $password
			);
		$cek = $this->M_login->cek_login("user",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'emailadmin' => $username,
				'iduseradmin' => $iduser,
				'namaadmin' => $namauser,
				'status' => 'admin',
				);
 
			$this->session->set_userdata($data_session);
			$this->M_login->hapusanorderlama();
 
			redirect('Owner_controller/Beranda');
		}else{
			echo "<script>
                alert('Username dan password salah');
                window.location.href = '".base_url('Owner_controller/A_login')."';
            </script>";//Url tujuan
		}
	}
} 
?>