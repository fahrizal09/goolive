<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_pesanan extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('Admin_models/MA_pesan');
		$this->load->model('M_pesanan');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') != "admin"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Owner_controller/A_login')."';
            </script>";//Url tujuan
		}
	}

	function index($id_pesan)
	{
		$data['pesanan'] = $this->M_pesanan->getpesan($id_pesan);
		$this->load->view('element/Owner/Header_owner');
		$this->load->view('Owner_view/pesanan', $data);
		$this->load->view('element/Owner/Footer_owner');
	}

	
} 
?>