<?php 
 
class M_pemesanan extends CI_Model{
	function tampil_pesan($idpesan){
		$query = $this->db->query("SELECT * FROM pemesanan JOIN konfirmasi_pemesanan ON pemesanan.id_trans=konfirmasi_pemesanan.id_trans JOIN barang ON pemesanan.id_barang=barang.id_barang JOIN customer ON pemesanan.id_cus=customer.id_cus WHERE pemesanan.id_trans='$idpesan'");
		return $query->result();
    }
}