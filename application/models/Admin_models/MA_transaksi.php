<?php

class MA_transaksi extends CI_Model
{
	function tampil_pesan()
	{
		$query = $this->db->query("SELECT * FROM pesan JOIN pengiriman ON pesan.pengiriman_id_kirim=pengiriman.id_kirim  ORDER BY id_pesan DESC");
		return $query->result();
	}
	function tampil_pesanid($kodepesan)
	{
		$query = $this->db->query("SELECT * FROM pesan JOIN pengiriman ON pesan.pengiriman_id_kirim=pengiriman.id_kirim  WHERE id_pesan='$kodepesan' ORDER BY id_pesan DESC");
		return $query->result();
	}
	function tampil_pengiriman($idkirim)
	{
		$query = $this->db->query("SELECT * FROM pengiriman WHERE id_kirim='$idkirim'");
		return $query->result();
	}

	function kirim($idkirim)
	{
		$query = $this->db->query("SELECT * FROM pengiriman JOIN pesan ON pesan.pengiriman_id_kirim=pengiriman.id_kirim  WHERE id_kostumer_id='$idkirim'");
		return $query->result();
	}

	function totalPemasukan()
	{
		$query = $this->db->query("SELECT SUM(total_pesan) AS totalMasuk FROM pemesanan");
		return $query->result();
	}

	function updatestatus($idpesan, $status)
	{
		$query = $this->db->query("UPDATE `pesan` SET `status`='$status' WHERE id_pesan='$idpesan'");
	}

	function updatestok($idpesan)
	{
		$query = $this->db->query("UPDATE `produk` INNER JOIN keranjang ON produk.id_produk=keranjang.produk_id_produk INNER JOIN pesan ON pesan.id_pesan=keranjang.pesan_id_pesan SET produk.stok = produk.stok-keranjang.jumlah WHERE pesan.id_pesan='$idpesan'");
	}

	function user($iduser)
	{
		$query = $this->db->query("SELECT * FROM kostumer WHERE id_kostumer='$iduser'");
		return $query->result();
	}

	function invoice($idpesan2, $iduser)
	{
		$query = $this->db->query("SELECT * FROM keranjang JOIN produk ON produk.id_produk=keranjang.produk_id_produk JOIN pesan ON keranjang.pesan_id_pesan=pesan.id_pesan  WHERE pesan_id_pesan='$idpesan2' AND keranjang.id_kostumer_id='$iduser'");
		return $query->result();
	}
}
