<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MA_bukti extends CI_Model {

    function tampil_bukti(){
      $query = $this->db->query("SELECT * FROM bayar");
      return $query->result();
    }
    function getbukti($id_pesan){
      $query = $this->db->query("SELECT * FROM bayar JOIN pesan ON bayar.kode_pesan=pesan.id_pesan WHERE bayar.kode_pesan='$id_pesan'");
      return $query->result();
    }
    function hapus_bukti($id_bayar){
      $query = $this->db->query("DELETE FROM `bayar` WHERE id_bayar='$id_bayar'");
    }
    
}
?>
