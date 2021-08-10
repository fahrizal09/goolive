<?php

class M_profil extends CI_Model
{
	function admin()
	{

		$query = $this->db->query("SELECT * FROM admin");
		return $query->result();
	}
	function customer()
	{
		$query = $this->db->query("SELECT * FROM customer");
		return $query->result();
	}

	function hapusCus($id){
		$query = $this->db->query("DELETE FROM customer WHERE id_cus='$id'");
	}
	function update_user($iduser, $nama, $email, $pass, $telp, $alamat, $kodepos, $level)
	{
		$query = $this->db->query("UPDATE `user` SET `password`='$pass',`nama_user`='$nama',`no_telp`='$telp',`alamat`='$alamat',`kode_pos`='$kodepos',`email`='$email',`level_id_level`='$level' WHERE id_user='$iduser'");
	}

	function voucher($kodevoucher)
	{
		$query = $this->db->query("SELECT * FROM voucher WHERE kode_voucher='$kodevoucher'");
		return $query->result();
	}
}
