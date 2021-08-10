<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_bukti extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('Admin_models/MA_bukti');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') != "admin"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Owner_controller/A_login')."';
            </script>";//Url tujuan
		}
	}

	function index(){
		$data['bukti'] = $this->MA_bukti->tampil_bukti();
		$this->load->view('element/Owner/Header_owner');
		$this->load->view('Owner_view/VA_bukti',$data);
		$this->load->view('element/Owner/Footer_owner');
	}

	public function hapus_bukti(){
		$id_bayar = $this->uri->segment(4);
		$this->MA_bukti->hapus_bukti($id_bayar);
		redirect('Owner_controller/A_bukti');
	}
} 
?>