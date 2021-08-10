<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_barang extends CI_Model
{


	private $bra = "BRA";
	private $_table = "barang";
	public $id_barang;
	public $nama_barang;
	public $harga_barang;
	public $tgl_masuk_barang;
	public $stok_barang;
	public $gambar = "camera.jpg";
	public $id_kategori_barang;
	public $id_suplier;
	public $keterangan;
	function __construct()
	{
		parent::__construct();
	}

	public function rules()
	{
		return [
			[
				'field' => 'nik',
				'label' => 'NIK',
				'rules' => 'required | numeric'
			],
			[
				'field' => 'nip',
				'label' => 'NIP',
				'rules' => 'required | numeric'
			],
			[
				'field' => 'nama',
				'label' => 'Nama',
				'rules' => 'required'
			]
		];
	}

	function tampil_kategori()
	{
		return $this->db->get('kategori_barang')->result();
	}
	function tampil_suplier()
	{
		return $this->db->get('suplier')->result();
	}
	function tampil_barang()
	{
		$query = $this->db->query("SELECT * FROM barang JOIN kategori_barang ON barang.id_kategori_barang=kategori_barang.id_kategori JOIN suplier ON barang.id_suplier=suplier.id_suplier ORDER BY id_barang DESC");
		return $query->result();
	}
	function tampil_barang2($id_barang)
	{
		$query = $this->db->query("SELECT * FROM barang JOIN kategori_barang ON barang.id_kategori_barang=kategori_barang.id_kategori JOIN suplier ON barang.id_suplier=suplier.id_suplier WHERE id_barang='$id_barang'");
		return $query->result();
	}
	function katprod($idk)
	{
		$query = $this->db->query("SELECT * FROM barang JOIN kategori_barang ON barang.id_kategori_barang=kategori_barang.id_kategori WHERE kategori_barang.id_barang='$idk'");
		return $query->result();
	}
	function katprod2()
	{
		$query = $this->db->query("SELECT * FROM barang JOIN kategori_barang ON barang.id_kategori_barang=kategori_barang.id_kategori");
		return $query->result();
	}
	function tampil_detailbarang($id_barang)
	{
		$query = $this->db->query("SELECT * FROM barang JOIN kategori_barang ON barang.id_kategori_barang=kategori_barang.id_kategori WHERE id_barang='$id_barang'");
		return $query->result();
	}

	function tambah_barang($idbarang, $namabarang, $harga, $harga_beli, $tglmasuk, $stok, $gambar, $idkat, $idsup, $keterangan)
	{
		$query = $this->db->query("INSERT INTO `barang`(`id_barang`, `nama_barang`, `harga_barang`,`harga_beli`, `tgl_masuk_barang`, `stok_barang`, `gambar`, `id_kategori_barang`, `id_suplier`, `keterangan`) VALUES ('$idbarang','$namabarang','$harga','$harga_beli','$tglmasuk','$stok','$gambar','$idkat','$idsup','$keterangan')");
	}
	function get_idbarang()
	{
		$this->db->select('RIGHT(barang.id_barang,4) as kode', FALSE);
		$this->db->order_by('id_barang', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('barang');
		if ($query->num_rows() <> 0) {

			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "AP" . $kodemax;
		return $kodejadi;
	}
	function hapus_barang($id_barang)
	{
		$query = $this->db->query("DELETE FROM `barang` WHERE id_barang='$id_barang'");
	}
	
	function namakat($kategori)
	{
		$query = $this->db->query("SELECT * FROM kategori_barang WHERE nama_kategori_brg='$kategori'");
		return $query->result();
	}
	function namasup($suplier)
	{
		$query = $this->db->query("SELECT * FROM suplier WHERE nama_suplier='$suplier'");
		return $query->result();
	}

	public function get_current_page_records($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->order_by("id_barang", "DESC");
		$query = $this->db->get("barang");


		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}

			return $data;
		}

		return false;
	}

	public function get_total()
	{
		return $this->db->count_all("barang");
	}

	function mcron($datenow)
	{
		$query = $this->db->query("SELECT * FROM produk JOIN keranjang ON keranjang.produk_id_produk=produk.id_produk JOIN `pesan` ON pesan.id_pesan=keranjang.pesan_id_pesan WHERE '$datenow'>pesan.jatuh_tempo  AND pesan.status='Proses'");
		return $query->result();
	}

	function tampil_produk3()
	{
		$query = $this->db->query("SELECT * FROM produk JOIN kategori ON `kategori`.`id_kategori`=`produk`.`kategori_id_kategori` WHERE nama_kategori='BRA' ORDER BY `id_produk` DESC");
		return $query->result();
	}
	function tampil_produk4()
	{
		$query = $this->db->query("SELECT * FROM produk JOIN kategori ON `kategori`.`id_kategori`=`produk`.`kategori_id_kategori` WHERE nama_kategori='Tas' ORDER BY `id_produk` DESC");
		return $query->result();
	}

	function tampil_produk5()
	{
		$query = $this->db->query("SELECT * FROM produk JOIN kategori ON `kategori`.`id_kategori`=`produk`.`kategori_id_kategori` WHERE nama_kategori='Pernak Pernik' ORDER BY `id_produk` DESC");
		return $query->result();
	}

	public function find($id_produk)
	{
		$result = $this->db->where('id_produk', $id_produk)
			->limit(1)
			->get('produk');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}
	function updateBarang($id_barang)
	{
		$post = $this->input->post();
		$this->id_barang = $post['id_barang'];;
		$this->nama_barang = $post['nama_barang'];
		$this->harga_barang = $post['harga_barang'];
		$this->stok_barang = $post['stok_barang'];
		$this->stok_barang = $post['stok_barang'];
		$this->tgl_masuk_barang = $post['tgl_masuk_barang'];
		if (!empty($_FILES["gambar"]["name"])) {
			if ($post["oldfoto"] != 'camera.jpg') {
			}
			unlink(FCPATH . 'assets/images/' . $post['oldfoto']);
			$this->gambar = $this->_uploadImage();
		} else {
			$this->gambar = $post["oldfoto"];
		}
		$this->id_kategori_barang = $post['id_kategori_barang'];
		$this->id_suplier = $post['id_suplier'];
		$this->keterangan = $post['keterangan'];
		$this->db->update($this->_table, $this, array("id_barang" => $id_barang));
	}

	public function getById($id_barang)
	{
		return $this->db->get_where($this->_table, ["id_barang" => $id_barang])->row();
	}

	function deleteBarang($id_barang)
	{
		$this->_deleteImage($id_barang);
		return $this->db->delete($this->_table, array("id_barang" => $id_barang));
	}
	private function _deleteImage($id_barang)
	{
		$product = $this->getById($id_barang);
		if ($product->gambar != "camera.jpg") {
			$filename = explode(".", $product->gambar)[0];
			return array_map('unlink', glob(FCPATH . "assets/images/$filename.*"));
		}
	}

	private function _uploadImage()
	{
		$config['upload_path']          =  './assets/images/';
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


	function tambah_kategori($idkate, $nama_kate)
	{
		$query = $this->db->query("INSERT INTO `kategori_barang`(`id_kategori`, `nama_kategori_brg`) VALUES ('$idkate','$nama_kate')");
	}
	function get_idkategori()
	{
		$this->db->select('RIGHT(kategori_barang.id_kategori,4) as kode', FALSE);
		$this->db->order_by('id_kategori', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('kategori_barang');
		if ($query->num_rows() <> 0) {

			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "KG" . $kodemax;
		return $kodejadi;
	}
	function tampil_kategori2()
	{
		$query = $this->db->query("SELECT * FROM kategori_barang ORDER BY id_kategori DESC");
		return $query->result();
	}
	function hapus_kate($id_kategori)
	{
		$query = $this->db->query("DELETE FROM `kategori_barang` WHERE id_kategori='$id_kategori'");
	}

	function tambah_suplier($id_suplier, $nama_sup)
	{
		$query = $this->db->query("INSERT INTO `suplier`(`id_suplier`, `nama_suplier`) VALUES ('$id_suplier','$nama_sup')");
	}
	function get_idsuplier()
	{
		$this->db->select('RIGHT(suplier.id_suplier,4) as kode', FALSE);
		$this->db->order_by('id_suplier', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('suplier');
		if ($query->num_rows() <> 0) {

			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "SP" . $kodemax;
		return $kodejadi;
	}
	function tampil_suplier2()
	{
		$query = $this->db->query("SELECT * FROM suplier ORDER BY id_suplier DESC");
		return $query->result();
	}
	function hapus_sup($id_suplier)
	{
		$query = $this->db->query("DELETE FROM `suplier` WHERE id_suplier='$id_suplier'");
	}
}
