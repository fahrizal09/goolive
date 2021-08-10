<?php
class M_komentar extends CI_Model{
 
    function komentar_list($id_produk){
        $hasil=$this->db->query("SELECT * FROM `komentar` JOIN kostumer ON komentar.id_kostumer_id=kostumer.id_kostumer WHERE komentar.id_produk_id='$id_produk' limit 5");
        return $hasil->result();
    }
    function testimoni_list($id_produk){
        $hasil=$this->db->query("SELECT * FROM `testimoni` JOIN kostumer ON testimoni.id_kostumer_id=kostumer.id_kostumer WHERE testimoni.id_produk_id='$id_produk'");
        return $hasil->result();
    }
 
    function simpan_komentar($kobar,$nabar,$harga){
        $hasil=$this->db->query("INSERT INTO tbl_barang (barang_kode,barang_nama,barang_harga)VALUES('$kobar','$nabar','$harga')");
        return $hasil;
    }
 
    function get_komentar_by_kode($kobar){
        $hsl=$this->db->query("SELECT * FROM komentar WHERE id_komentar='$kobar'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'barang_kode' => $data->barang_kode,
                    'barang_nama' => $data->barang_nama,
                    'barang_harga' => $data->barang_harga,
                    );
            }
        }
        return $hasil;
    }
 
    function update_barang($kobar,$nabar,$harga){
        $hasil=$this->db->query("UPDATE tbl_barang SET barang_nama='$nabar',barang_harga='$harga' WHERE barang_kode='$kobar'");
        return $hasil;
    }
 
    function hapus_barang($kobar){
        $hasil=$this->db->query("DELETE FROM tbl_barang WHERE barang_kode='$kobar'");
        return $hasil;
    }
     
}