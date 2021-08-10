<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MA_pesan extends CI_Model {

    function tampil_pesanan(){
      $query = $this->db->query("SELECT * FROM keranjang");
      return $query->result();
    }
    function getpesan($id_pesan){
      $query = $this->db->query("SELECT * FROM keranjang JOIN pesan ON keranjang.pesan_id_pesan=pesan.id_pesan WHERE keranjang.pesan_id_pesan='$id_pesan'");
      return $query->result();
    }
   
    
}
?>
