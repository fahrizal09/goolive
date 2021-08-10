<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('M_profil');
		$this->load->model('Admin_models/MA_transaksi');
		$this->load->model('M_faq');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') != "admin"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Admin/Login')."';
            </script>";//Url tujuan
		}
	}

	public function index(){
		$data['customer'] = $this->M_profil->customer();
		$this->load->view('element/Header');
		$this->load->view('Admin/v_customer', $data);
		$this->load->view('element/Footer');
	}

	public function hapusCus(){
		$id = $this->uri->segment(4);
		$this->M_profil->hapusCus($id);
		redirect('Admin/Customer');
	}
}