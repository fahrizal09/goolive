<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url'));
    }

    public function index()
    {
        $this->db->join('kategori_barang', 'kategori_barang.id_kategori=barang.id_kategori_barang');
        $this->db->order_by('id_barang', 'DESC');
        $this->db->limit(6);
        $data['produk'] = $this->db->get('barang')->result();
        $this->load->view('Customer/v_beranda', $data);
    }
}
