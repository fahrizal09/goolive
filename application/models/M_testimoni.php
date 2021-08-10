<?php 

class M_testimoni extends CI_Model {

    function tampil_testi(){
      $query = $this->db->query("SELECT * FROM testimoni");
      return $query->result();
    }
  
}
?>