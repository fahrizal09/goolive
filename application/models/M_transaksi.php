<?php

class M_transaksi extends CI_Model
{
	function tampil_pesan($iduser)
	{
		$query = $this->db->query("SELECT * FROM pesan JOIN pengiriman ON pesan.pengiriman_id_kirim=pengiriman.id_kirim WHERE id_kostumer_id='$iduser' ORDER BY id_pesan DESC");
		return $query->result();
	}
	function tampil_pesan2()
	{
		$query = $this->db->query("SELECT * FROM `pemesanan` JOIN konfirmasi_pemesanan ON pemesanan.id_trans=konfirmasi_pemesanan.id_trans JOIN customer ON pemesanan.id_cus=customer.id_cus JOIN barang ON pemesanan.id_barang=barang.id_barang");
		return $query->result();
	}
	function tampil_pesan12($idpesan)
	{
		$query = $this->db->query("SELECT * FROM `pemesanan` JOIN konfirmasi_pemesanan ON pemesanan.id_trans=konfirmasi_pemesanan.id_trans JOIN customer ON pemesanan.id_cus=customer.id_cus JOIN barang ON pemesanan.id_barang=barang.id_barang WHERE pemesanan.id_trans='$idpesan'");
		return $query->result();
	}
	function tampil_keranjang($iduser, $keranjang)
	{
		$query = $this->db->query("SELECT * FROM `pesan` JOIN keranjang ON pesan.id_pesan=keranjang.pesan_id_pesan JOIN produk ON produk.id_produk=keranjang.produk_id_produk WHERE pesan.id_kostumer_id='$iduser' AND pesan_id_pesan='$keranjang'");
		return $query->result();
	}
	function user($iduser)
	{
		$query = $this->db->query("SELECT * FROM kostumer WHERE id_kostumer='$iduser'");
		return $query->result();
	}
	function tampil_pengiriman($idkirim)
	{
		$query = $this->db->query("SELECT * FROM pengiriman WHERE id_kirim='$idkirim'");
		return $query->result();
	}
	function invoice($idpesan2, $iduser)
	{
		$query = $this->db->query("SELECT * FROM keranjang JOIN produk ON produk.id_produk=keranjang.produk_id_produk JOIN pesan ON keranjang.pesan_id_pesan=pesan.id_pesan WHERE pesan_id_pesan='$idpesan2' AND keranjang.id_kostumer_id='$iduser'");
		return $query->result();
	}
	function updatestatus($idpesan, $status)
	{
		// $query = $this->db->query("UPDATE `konfirmasi_pemesanan` JOIN pemesanan ON pemesanan.id_trans=konfirmasi_pemesanan.id_trans SET konfirmasi_pemesanan.status_pembayaran='$status' WHERE pemesanan.id_pemesanan='$idpesan'");
		$this->db->set('status_pembayaran', $status);
		// $this->db->set('jurnal', "Ya");
		$this->db->where('id_trans', $idpesan);
		$this->db->update('konfirmasi_pemesanan');

		$this->db->set('status', $status);
		$this->db->where('id_trans', $idpesan);
		$this->db->update('pemesanan');
	}
	function updatestatus2($idpesan, $statuspesan)
	{
		$query = $this->db->query("UPDATE `pemesanan` JOIN konfirmasi_pemesanan ON pemesanan.id_trans=konfirmasi_pemesanan.id_trans SET pemesanan.status='$statuspesan' WHERE pemesanan.id_trans='$idpesan'");
	}
	function updatestok($idpesan)
	{
		$query = $this->db->query("UPDATE `barang` INNER JOIN pemesanan ON pemesanan.id_barang=barang.id_barang SET barang.stok_barang=barang.stok_barang-pemesanan.jumlah_barang WHERE pemesanan.id_trans='$idpesan'");
	}

	// function invoice2($id,$idpesan2,$iduser){
	// 	$query = $this->db->query("SELECT * FROM keranjang JOIN produk ON produk.id_produk=keranjang.produk_id_produk JOIN pesan ON keranjang.pesan_id_pesan=pesan.id_pesan JOIN user ON keranjang.user_id_user=user.id_user WHERE pesan_id_pesan='$idpesan2' AND produk_id_produk='$id' AND keranjang.user_id_user='$iduser'");
	// 	return $query->result();
	// }
	function totalPemasukan()
	{
		$this->db->select('SUM(total_bayar) as totalMasuk ');
		$this->db->where('status_pembayaran', 'Sudah Bayar');
		$this->db->where('jurnal', 'Belum');
		$query = $this->db->get(' konfirmasi_pemesanan ');
		return $query->row();
	}
}
