<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_voucher extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_voucher');
		$this->load->library('upload');
		$this->load->helper(array('url','form'));
		if($this->session->userdata('status') != "admin"){
			echo "<script>
                alert('Anda sudah login');
                window.location.href = '".base_url('Owner_controller/A_login')."';
            </script>";//Url tujuan
		}
	}


	public function index()
	{
		$data['voucher'] = $this->M_voucher->tampilvoucher();
		$this->load->view('element/Owner/Header_owner');
		$this->load->view('Owner_view/voucher',$data);
		$this->load->view('element/Owner/Footer_owner');
	}

	public function addvoucher(){
		$this->load->view('element/Owner/Header_owner');
		$this->load->view('Owner_view/VA_voucher');
		$this->load->view('element/Owner/Footer_owner');
	}
	public function editvoucher($id_voucher){
		$data['voucher2'] = $this->M_voucher->tampilvoucher2($id_voucher); 
		$this->load->view('element/Owner/Header_owner');
		$this->load->view('Owner_view/editvoucher',$data);
		$this->load->view('element/Owner/Footer_owner');
	}

	public function tambahvoucher()
	{
		$kodevoucher = $this->input->post('kode_voucher');
		$namavoucher = $this->input->post('nama_voucher');
		$tglawal = $this->input->post('tgl_awal');
		$tglakhir = $this->input->post('tgl_akhir');
		$totalvoucher = $this->input->post('total_voucher');
		$minimumbelanja = $this->input->post('minimum_belanja');
		$keterangan = $this->input->post('keterangan');
		$this->M_voucher->tambahvoucher($kodevoucher, $namavoucher, $tglawal, $tglakhir, $totalvoucher, $minimumbelanja, $keterangan);
		echo "<script>
	                alert('Tambah berhasil');
	                window.location.href = '" . base_url('Owner_controller/A_voucher') . "';
	            </script>"; //Url tujuan
	}
	public function ubahvoucher($id_voucher)
	{

		if ($this->input->post('submit')) {
            $this->M_voucher->updatevoucher($id_voucher);
            echo "<script>
	                alert('Edit produk berhasil');	
	                window.location.href = '".base_url('Owner_controller/A_voucher')."';
				</script>";//Url tujuan
        }
	}

	public function hapusvoucher($id_voucher)
	{
		$this->M_voucher->hapusvoucher($id_voucher);
		echo "<script>
		alert('Hapus berhasil');
		window.location.href = '" . base_url('Owner_controller/A_voucher') . "';
	</script>"; //Url tujuan
	}
}
