<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_profil');
		$this->load->model('Admin_models/MA_transaksi');
		$this->load->model('M_faq');
		$this->load->helper(array('url'));
		if ($this->session->userdata('status') != "admin") {
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '" . base_url('Admin/Login') . "';
            </script>"; //Url tujuan
		}
	}

	public function index()
	{
		$id = $this->session->userdata('iduseradmin');
		$this->db->where('id_admin !=', $id);
		$data['admin'] = $this->db->get('admin')->result();
		$this->load->view('element/Header');
		$this->load->view('Admin/v_admin', $data);
		$this->load->view('element/Footer');
	}

	public function akun()
	{


		$data['akun'] = $this->db->get('akun')->result();
		$this->load->view('element/Header');
		$this->load->view('Admin/v_akun', $data);
		$this->load->view('element/Footer');
	}
	public function tambahAkun()
	{

		$post = $this->input->post();
		$this->no_reff = $post['no_reff'];
		$this->nama_reff = $post['nama_reff'];
		$this->keterangan_reff = $post['keterangan_reff'];
		$this->id_admin = $this->session->userdata('iduseradmin');
		$data = $this->db->insert('akun', $this);
		if ($data) {
			$this->no_reff = $post['no_reff'];
			redirect('Admin/Laporan/akuntansi');
		}
	}
}
