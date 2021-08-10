<?php 

class M_faq extends CI_Model {

    function tampil_faq(){
      $query = $this->db->query("SELECT * FROM faq");
      return $query->result();
    }
  function save(){
$query=$this->db->query("INSERT INTO faq (id_faq,nama,kritik)VALUES('$id_faq','$nama','$kritik')");
        return $query;
}
}
?>