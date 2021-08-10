<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class O_Komentar extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('Owner_models/MO_transaksi');
		$this->load->model('M_komentar');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') != "admin"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Owner_controller/A_login')."';
            </script>";//Url tujuan
		}
		
	}

	public function index(){
		
		$data['komentar'] = $this->M_komentar->komentar_list($id_produk);
		$this->load->view('element/Owner/Header_owner');
		$this->load->view('Owner_view/komentar',$data);
		$this->load->view('element/Owner/Footer_owner');
	}

} 
?>