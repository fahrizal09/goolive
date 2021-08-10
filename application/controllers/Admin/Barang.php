<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_barang');
		$this->load->model('M_komentar');
		$this->load->library('upload');
		$this->load->helper(array('url', 'form'));
		if ($this->session->userdata('status') != "admin") {
			echo "<script>
		        alert('Anda sudah login');
		        window.location.href = '" . base_url('Admin/Login') . "';
		    </script>"; //Url tujuan
		}
	}

	public function index()
	{
		$data['kategori'] = $this->M_barang->tampil_kategori();
		$data['barang'] = $this->M_barang->tampil_barang();
		//$data['barang'] = $this->M_keranjang->tampil_barang();
		$this->load->view('element/Header');
		$this->load->view('Admin/v_barang', $data);
		$this->load->view('element/Footer');
	}
	public function tambah_barang()
	{
		$data['kategori'] = $this->M_barang->tampil_kategori();
		$data['suplier'] = $this->M_barang->tampil_suplier();
		$data['barang'] = $this->M_barang->tampil_barang();
		$this->load->view('element/Header');
		$this->load->view('Admin/v_tambahbarang', $data);
		$this->load->view('element/Footer');
	}
	public function tambahstok()
	{
		$id_barang = $this->input->post('id_barang');
		$tambahstok = $this->input->post('tambahstok');

		$cek = $this->db->query("SELECT * FROM barang WHERE id_barang='$id_barang'")->num_rows();
		if ($cek >= 1) {
			$this->db->query("UPDATE `barang` SET `stok_barang`=stok_barang+'$tambahstok' WHERE id_barang='$id_barang'");
			echo "<script>
                alert('Stok berhasil ditambahkan');
                window.location.href = '" . base_url('Admin/Barang') . "';
            </script>";
		} else {
			echo "<script>
                alert('Id produk tidak ditemukan!');
                window.location.href = '" . base_url('Admin/Barang') . "';
            </script>";
		}
	}
	public function insert_barang()
	{
		$idbarang = $this->M_barang->get_idbarang();
		$namabarang = $this->input->post('nama_barang');
		$harga = $this->input->post('harga_barang');
		$harga_beli = $this->input->post('harga_beli');
		$tglmasuk = $this->input->post('tgl_masuk_barang');
		$stok = $this->input->post('stok_barang');
		$gambar = $this->_uploadImage();
		$kategori = $this->input->post('kategori');
		foreach ($this->M_barang->namakat($kategori) as $row) {
			$idkat = $row->id_kategori;
		}
		$suplier = $this->input->post('suplier');
		foreach ($this->M_barang->namasup($suplier) as $row) {
			$idsup = $row->id_suplier;
		}
		$keterangan = $this->input->post('keterangan');

		$bayar = $stok * $harga_beli;

		$this->db->select('SUM(saldo) as total');
		$this->db->where('no_reff', '111');
		$adm = $this->db->get('transaksi')->row_array();

		if ($bayar > $adm['total']) {
			$this->session->set_flashdata(
				'gagal',
				'<div class="alert alert-danger" >
                    <p> Uang kas anda tidak cukup!!!</p>
                </div>'
			);
			redirect('Admin/Barang/tambah_barang');
		} else {

			$this->db->set('saldo', $adm['total'] - $bayar);
			$this->db->where('no_reff', '111');
			$adm = $this->db->update('transaksi');
			$this->M_barang->tambah_barang($idbarang, $namabarang, $harga, $harga_beli, formatHariTanggal($tglmasuk), $stok, $gambar, $idkat, $idsup, $keterangan);
			echo "<script>
	                alert('Upload berhasil');
	                window.location.href = '" . base_url('Admin/Barang') . "';
	            </script>"; //Url tujuan
		}
	}


	function hapus_barang($id_barang)
	{
		//	$id_produk= $this->uri->segment(3);
		$this->M_barang->deleteBarang($id_barang);
		redirect('Admin/Barang');
	}

	function update_barang()
	{
		$id_barang = $this->uri->segment(4);
		$data['kategori'] = $this->M_barang->tampil_kategori();
		$data['suplier'] = $this->M_barang->tampil_suplier();
		$data['barang'] = $this->M_barang->tampil_barang();
		$data['barang2'] = $this->M_barang->tampil_barang2($id_barang);

		$this->load->view('element/Header');
		$this->load->view('Admin/v_editbarang', $data);
		$this->load->view('element/Footer');
	}

	public function editBarang($id_barang = null)
	{
		if ($this->input->post('submit')) {
			$this->M_barang->updateBarang($id_barang);
			echo "<script>
	                alert('Edit barang berhasil');	
	                window.location.href = '" . base_url('Admin/Barang') . "';
				</script>"; //Url tujuan
		}
	}

	public function kategori()
	{
		$data['kategori'] = $this->M_barang->tampil_kategori2();
		$this->load->view('element/Header');
		$this->load->view('Admin/v_kategori', $data);
		$this->load->view('element/Footer');
	}

	public function tambahkategori()
	{
		$idkate = $this->M_barang->get_idkategori();
		$nama_kate = $this->input->post('nama_kategori');
		$cek = $this->db->query("SELECT * FROM kategori_barang WHERE nama_kategori_brg='$nama_kate'")->num_rows();
		if ($cek >= 1) {
			echo "<script>
                alert('Nama kategori sudah ada');
                window.location.href = '" . base_url('Admin/Barang/kategori') . "';
            </script>"; //Url tujuan
		} elseif ($cek == 0) {
			$this->M_barang->tambah_kategori($idkate, $nama_kate);
			echo "<script>
                alert('Kategori berhasil ditambahkan');
                window.location.href = '" . base_url('Admin/Barang/kategori') . "';
            </script>"; //Url tujuan
		}
		redirect('Admin/Barang/kategori');
	}
	public function hapuskategori()
	{
		$id_kategori = $this->uri->segment(4);
		$this->M_barang->hapus_kate($id_kategori);
		redirect('Admin/Barang/kategori');
	}
	public function editkategori()
	{
	}

	public function suplier()
	{
		$data['suplier'] = $this->M_barang->tampil_suplier2();
		$this->load->view('element/Header');
		$this->load->view('Admin/v_suplier', $data);
		$this->load->view('element/Footer');
	}
	public function tambahsuplier()
	{
		$id_suplier = $this->M_barang->get_idsuplier();
		$nama_sup = $this->input->post('nama_suplier');
		$cek = $this->db->query("SELECT * FROM suplier WHERE nama_suplier='$nama_sup'")->num_rows();
		if ($cek >= 1) {
			echo "<script>
                alert('Nama kategori sudah ada');
                window.location.href = '" . base_url('Admin/Barang/suplier') . "';
            </script>"; //Url tujuan
		} elseif ($cek == 0) {
			$this->M_barang->tambah_suplier($id_suplier, $nama_sup);
			echo "<script>
                alert('Kategori berhasil ditambahkan');
                window.location.href = '" . base_url('Admin/Barang/suplier') . "';
            </script>"; //Url tujuan
		}
		redirect('Admin/Barang/suplier');
	}
	public function hapussuplier()
	{
		$id_suplier = $this->uri->segment(4);
		$this->M_barang->hapus_sup($id_suplier);
		redirect('Admin/Barang/suplier');
	}
	public function editsuplier()
	{
	}

	private function _uploadImage()
	{
		$config['upload_path']          =  './assets/images';
		$config['allowed_types']        = 'gif|jpg|png|JPG';
		$config['max_size']             = 9048;
		$config['overwrite']            = true;
		$config['file_name']            = $_FILES['gambar']['name'];
		// 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')) {
			return $this->upload->data("file_name");
		}

		return "camera.jpg";
	}
}
