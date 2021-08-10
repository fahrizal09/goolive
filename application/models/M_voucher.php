<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_voucher extends CI_Model {
  
	private $_table = "voucher";
	public $id_voucher;
	public $kode_voucher;
	public $nama_voucher;
	public $tgl_awal;
	public $tgl_akhir;
	public $total_voucher;
	public $minimum_belanja;
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
  // Fungsi untuk menampilkan semua data gambar
  function tambahvoucher($kodevoucher,$namavoucher,$tglawal,$tglakhir,$totalvoucher,$minimumbelanja,$keterangan){
    $hasil=$this->db->query("INSERT INTO voucher(kode_voucher,nama_voucher,tgl_awal,tgl_akhir,total_voucher,minimum_belanja,keterangan) VALUES ('$kodevoucher','$namavoucher','$tglawal','$tglakhir','$totalvoucher','$minimumbelanja','$keterangan')");
    return $hasil;
  }
  
  function tampilvoucher(){
    $query = $this->db->query("SELECT * FROM voucher");
    return $query->result();
  }
  function tampilvoucher2($id_voucher){
    $query = $this->db->query("SELECT * FROM voucher WHERE id_voucher='$id_voucher'");
    return $query->result();
  }
  function hapusvoucher($id_voucher){
    $query = $this->db->query("DELETE FROM `voucher` WHERE id_voucher='$id_voucher'");
}
function updatevoucher($id_voucher){
  $post = $this->input->post();
  $this->kode_voucher =$post['kode_voucher'];
  $this->nama_voucher = $post['nama_voucher'];
  $this->tgl_awal = $post['tgl_awal'];
  $this->tgl_akhir = $post['tgl_akhir'];
  $this->total_voucher = $post['total_voucher'];
  $this->minimum_belanja = $post['minimum_belanja'];
  $this->keterangan = $post['keterangan'];
  $this->db->update($this->_table, $this, array("id_voucher" => $id_voucher));
}
}
?>