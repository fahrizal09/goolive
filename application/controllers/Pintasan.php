<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pintasan extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->helper(array('url'));

	}
 
	public function index(){
		redirect('Customer/Beranda');
	}
	public function Admin(){
		redirect('Admin/Beranda');
	}
	
}
?>