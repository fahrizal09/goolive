<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_testimoni extends CI_Controller{
    function __construct(){
		parent::__construct();		
		$this->load->model('M_produk');
		$this->load->model('M_profil');
		$this->load->model('M_pesanan');
		$this->load->model('M_testimoni');
		$this->load->library('upload');
		$this->load->helper(array('url'));
		// if($this->session->userdata('status') != "login"){
		// 	echo "<script>
        //         alert('Anda harus login terlebih dahulu');
        //         window.location.href = '".base_url('Login')."';
        //     </script>";//Url tujuan
		// }
		
	}


	public function index(){
		$data['testi'] = $this->M_testimoni->tampil_testi();
		$this->load->view('element/Owner/Header_owner');
		$this->load->view('Owner_view/testimoni',$data);
		$this->load->view('element/Owner/Footer_owner');
	
	}

	
}
?>
