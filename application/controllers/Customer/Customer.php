<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url'));
    }

    public function index()
    {

        $this->load->view('Customer/v_login');
    }

    public function register()
    {
        $this->load->view('Customer/v_daftar');
    }

    public function verify($token = null)
    {
        // $this->db->where('token', $token);
        $data = $this->db->get('customer')->row();
        if ($data > 0) {
            redirect('Customer/Beranda');
        }
    }

    public function daftar()
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->kode_pos = $post["kode_pos"];
        $this->no_hp = $post["no_hp"];
        $this->email = $post["email"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $data = $this->db->insert('customer', $this);
        if ($data) {
            $this->session->set_flashdata(
                'daftar',
                '<div class="alert alert-success" >
                    <p> Yeay, pendaftaran berhasil!!!</p>
                </div>'
            );
        }
        redirect('Customer/Customer/index');

        // $token = $this->token = md5(time() . $post["nama"]);
        // $data = $this->db->insert('customer', $this);
        // if ($data) {
        //     $to = $post["email"];
        //     $subject = "Email Verification Toko Pupuk";
        //     $message = "<a href='http://localhost/tokopupuk/Customer/Customer/verify/ $token'> Register </a>";
        //     $headers = "MINE-Version: 1.0" . "\r\n";
        //     $headers .= 'From: Fahrizal Azi <fahrizalazi1@gmail.com>' . "\r\n";
        //     $headers .= "Content-type:text/html;charest=UTF-8" . "\r\n";

        //     mail($to, $subject, $message, $headers);
        //     echo "Verif Dikirim ke Email";
        // }
    }

    public function cek_login()
    {
        $post = $this->input->post();
        $u = $this->username = $post["username"];
        $p = $this->password = $post["password"];

        $this->db->where('username', $u);
        $this->db->where('password', $p);
        $data = $this->db->get('customer')->row_array();

        if ($data > 0) {
            $data_session = array(
                'id_customer' => $data['id_cus'],
                'nama' => $data['nama'],
                'status' => "login"
            );

            // $this->db->query('DELETE FROM konfirmasi_pemesanan where status WHERE DATEDIFF(CURDATE(), tanggal_checkout) > 7');

            $this->session->set_userdata($data_session);
            redirect('Customer/Beranda/');
        } else {
            $this->session->set_flashdata(
                'gagal',
                '<div class="alert alert-danger" >
                    <p> Aduh, username atau password salah!!!</p>
                </div>'
            );
            redirect('Customer/Customer/index');
        }
    }
    function logout()
    {
        $this->session->sess_destroy();

        redirect('Customer/Customer');
    }
    public function profil()
    {
        $id = $this->session->userdata('id_customer');
        $this->db->where('id_cus', $id);
        $data['user'] = $this->db->get('customer')->row();
        $this->load->view('Customer/v_profil', $data);
    }
}
