<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET,OPTIONS');
class Shop extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('midtrans');
        $params = array('server_key' => 'SB-Mid-server-WX1PQxO-YHpSp8XsCPE0co2N', 'production' => false);
        $this->midtrans->config($params);
        $this->load->model('M_pemesanan');
        // $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->view('Customer/v_shop');
    }
    public function keranjang()
    {
        $id_cus = $this->session->userdata('id_customer');
        $this->db->join('barang', 'barang.id_barang=pemesanan.id_barang');
        $this->db->where('id_cus', $id_cus);
        $this->db->where('status', "Belum Checkout");
        $data['keranjang'] = $this->db->get('pemesanan')->result();

        $this->db->select('SUM(sub_total) as total');
        $this->db->where('status', "Belum Checkout");
        $this->db->where('id_cus', $id_cus);
        $data['total'] = $this->db->get('pemesanan')->row();
        $this->load->view('Customer/v_keranjang', $data);
    }

    public function pesanan()
    {

        $id_cus = $this->session->userdata('id_customer');
        $this->db->where('id_cus', $id_cus);
        $data['trans'] = $this->db->get('konfirmasi_pemesanan')->result();
        $this->load->view('Customer/v_pesanan', $data);
    }
    public function checkout()
    {
        $waktu = date('Y-m-d');
        $data['waktu'] = formatHariTanggal($waktu);

        $id_cus = $this->session->userdata('id_customer');
        $this->db->select('SUM(sub_total) as total');
        $this->db->where('id_cus', $id_cus);
        $this->db->where('status', "Belum Checkout");
        $data['total'] = $this->db->get('pemesanan')->row();


        $this->db->where('id_cus', $id_cus);
        $this->db->get('pemesanan');

        $this->db->where('id_cus', $id_cus);
        $data['user'] = $this->db->get('customer')->row();
        if (!$id_cus) {
            redirect('Customer/Customer');
        } else {
            $this->load->view('Customer/v_konfirmasi', $data);
        }
    }
    public function tambah_keranjang()
    {
        $status = $this->session->userdata('id_customer');
        if (!$status) {
            $this->session->set_flashdata(
                'login',
                '<div class="alert alert-success" >
                    <p> Sory, login dulu yaaa!!!</p>
                </div>'
            );
            $this->session->unset_userdata('username');
            redirect('Customer/Customer');
        } else {


            $post = $this->input->post();
            $id_cus = $this->id_cus = $post["id_cus"];
            $id_barang = $this->id_barang = $post["id_barang"];
            $jumlah =  $this->jumlah_barang = $post["jumlah_barang"];
            $total = $this->sub_total = $post["sub_total"] * $post["jumlah_barang"];
            $this->tgl_pemesanan = $post["tgl_pemesanan"];
            $this->status = "Belum Checkout";


            $this->db->where('status', "Belum Checkout");
            $this->db->where('id_cus', $id_cus);
            $this->db->where('id_barang', $id_barang);
            $cek = $this->db->get('pemesanan')->row_array();
            if ($cek) {
                $this->db->set('jumlah_barang', $cek['jumlah_barang'] + $jumlah);
                $this->db->set('sub_total', $cek['sub_total'] + $total);
                $this->db->where('id_cus', $id_cus);
                $this->db->where('id_barang', $id_barang);
                $this->db->update('pemesanan');
                redirect('Customer/Shop/keranjang');
            } else {
                $data = $this->db->insert('pemesanan', $this);
                redirect('Customer/Shop/keranjang');
            }
        }
    }

    public function bayar()
    {


        $id = $this->session->userdata('id_customer');
        $post = $this->input->post();
        $id_cus = $this->id_cus = $post["id_cus"];
        $this->tanggal_checkout = $post["tanggal_checkout"];
        $this->bank = $post["bank"];
        $id_trans = $this->id_trans = md5(time() . $id);
        $this->alamat_pengiriman = $post["alamat_pengiriman"];
        $this->status_pembayaran = "Belum Bayar";
        $this->total_bayar = $post["total_bayar"];
        $this->bukti_transfer = "Belum Bayar";
        $this->jurnal = "Belum";
        $data = $this->db->insert('konfirmasi_pemesanan', $this);
        if ($data) {

            $this->db->set('status', "Sudah Checkout");
            $this->db->set('id_trans', $id_trans);
            $this->db->where('id_cus', $id_cus);
            $this->db->where('status', "Belum Checkout");
            $this->db->update('pemesanan');

            redirect('Customer/Shop/pesanan');
        }
    }
    public function update_pembayaran()
    {
        $post = $this->input->post();
        $id_cus = $this->id_cus = $post["id_cus"];
        $id_trans = $this->id_trans = $post["id_trans"];
        $this->status_pembayaran = "Belum Dikonfirmasi";
        $this->bukti_transfer = $this->_uploadImage();

        $this->db->where('id_cus', $id_cus);
        $this->db->where('id_trans', $id_trans);
        $data = $this->db->update('konfirmasi_pemesanan', $this);
        if ($data) {
            redirect('Customer/Shop/pesanan');
        }
    }
    //$this->_uploadImage()

    private function _uploadImage()
    {
        $config['upload_path']          =  './upload/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['overwrite']            = true;
        $config['max_size']             = 5048; // 1MB
        $config['overwrite']            = true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_transfer')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            return $this->upload->data('file_name');
        }
    }

    public function update_cart()
    {
        $id_cus = $this->session->userdata('id_customer');
        $post = $this->input->post();
        $id_pemesanan = $post["id_pemesanan"];
        $result = array();

        foreach ($id_pemesanan as $key => $val) {

            $result[] = array(
                "id_pemesanan" => $id_pemesanan[$key],
                "jumlah_barang"  => $_POST['jumlah_barang'][$key],
                "sub_total"  => $_POST['jumlah_barang'][$key] * $_POST['harga_barang'][$key]

            );
        }
        $this->db->update_batch('pemesanan', $result, 'id_pemesanan');
        redirect('Customer/Shop/keranjang');
    }
    public function nota()
    {
        $idpesan = $this->uri->segment(4);
        $data['pemesanan'] = $this->M_pemesanan->tampil_pesan($idpesan);
        $this->load->view('Customer/v_nota', $data);
    }
    public function pembayaran()
    {
        $id = $this->session->userdata('id_customer');

        $idpesan = $this->uri->segment(4);
        $this->db->join('barang', 'barang.id_barang=pemesanan.id_barang');
        $this->db->join('konfirmasi_pemesanan', 'pemesanan.id_trans=konfirmasi_pemesanan.id_trans');
        $this->db->where('pemesanan.id_trans', $idpesan);
        $data['bayar'] = $this->db->get('pemesanan')->result();


        $this->db->join('barang', 'barang.id_barang=pemesanan.id_barang');
        $this->db->join('konfirmasi_pemesanan', 'pemesanan.id_trans=konfirmasi_pemesanan.id_trans');
        $this->db->where('pemesanan.id_trans', $idpesan);
        $this->db->where('pemesanan.id_cus', $id);
        $data['trans'] = $this->db->get('pemesanan')->result();


        $this->db->join('barang', 'barang.id_barang=pemesanan.id_barang');
        $this->db->join('konfirmasi_pemesanan', 'pemesanan.id_trans=konfirmasi_pemesanan.id_trans');
        $this->db->where('pemesanan.id_trans', $idpesan);
        $this->db->where('pemesanan.id_cus', $id);
        $code = $this->db->get('pemesanan')->row();

        $apiKey = 'yFBmaAV7CTBFinWj8d0AwC4TfUVGJmyAn4frdqQo';
        $privateKey = 'ACOsY-XRNyb-g5dXE-F3u0C-iPRKx';
        $merchantCode = 'T0592';
        $merchantRef = 'INV55567';
        $amount = $code->sub_total;

        $output = [
            'method'            => 'QRIS',
            'merchant_ref'      => $merchantRef,
            'amount'            => $amount,
            'customer_name'     => 'Nama Pelanggan',
            'customer_email'    => 'emailpelanggan@domain.com',
            'customer_phone'    => '081234567890',
            'order_items'       => [
                [
                    'sku'       => 'PRODUK1',
                    'name'      => 'Nama Produk 1',
                    'price'     => $amount,
                    'quantity'  => 1
                ]
            ],
            'callback_url'      => 'http://localhost/gateways/index2.php',
            'return_url'        => 'http://localhost/gateways/index2.php',
            'expired_time'      => (time() + (24 * 60 * 60)), // 24 jam
            'signature'         => hash_hmac('sha256', $merchantCode . $merchantRef . $amount, $privateKey)
        ];


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT     => true,
            CURLOPT_URL               => "https://payment.tripay.co.id/api/transaction/create",
            CURLOPT_RETURNTRANSFER    => true,
            CURLOPT_HEADER            => false,
            CURLOPT_HTTPHEADER        => array(
                "Authorization: Bearer " . $apiKey
            ),
            CURLOPT_FAILONERROR       => false,
            CURLOPT_POST              => true,
            CURLOPT_POSTFIELDS        => http_build_query($output)
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);


        //mengubah data json menjadi data array asosiatif
        $result = json_decode($response, true);

        $data['qrcode'] = $result['data']['qr_string'];

        $this->db->where('konfirmasi_pemesanan.id_trans', $idpesan);
        $data['total'] = $this->db->get('konfirmasi_pemesanan', $data)->row();
        $this->load->view('Customer/v_bayar', $data);
    }
    public function qrcode()
    {
    }

    // public function token($id_trans = null)
    // {

    //     $this->db->where('id_trans', $id_trans);
    //     $row = $this->db->get('konfirmasi_pemesanan')->row();

    //     // Required
    //     $transaction_details = array(
    //         'order_id' => rand(),
    //         'gross_amount' => $row->total_bayar, // no decimal allowed for creditcard
    //     );

    //     // Optional
    //     // $item1_details = array(
    //     //     'id' => 'a1',
    //     //     'price' => 18000,
    //     //     'quantity' => 3,
    //     //     'name' => "Apple"
    //     // );

    //     // // Optional
    //     // $item2_details = array(
    //     //     'id' => 'a2',
    //     //     'price' => 20000,
    //     //     'quantity' => 2,
    //     //     'name' => "Orange"
    //     // );

    //     // // Optional
    //     // $item_details = array($item1_details, $item2_details);

    //     // // Optional
    //     // $billing_address = array(
    //     //     'first_name'    => "Andri",
    //     //     'last_name'     => "Litani",
    //     //     'address'       => "Mangga 20",
    //     //     'city'          => "Jakarta",
    //     //     'postal_code'   => "16602",
    //     //     'phone'         => "081122334455",
    //     //     'country_code'  => 'IDN'
    //     // );

    //     // // Optional
    //     // $shipping_address = array(
    //     //     'first_name'    => "Obet",
    //     //     'last_name'     => "Supriadi",
    //     //     'address'       => "Manggis 90",
    //     //     'city'          => "Jakarta",
    //     //     'postal_code'   => "16601",
    //     //     'phone'         => "08113366345",
    //     //     'country_code'  => 'IDN'
    //     // );

    //     // // Optional
    //     // $customer_details = array(
    //     //     'first_name'    => "Andri",
    //     //     'last_name'     => "Litani",
    //     //     'email'         => "andri@litani.com",
    //     //     'phone'         => "081122334455",
    //     //     'billing_address'  => $billing_address,
    //     //     'shipping_address' => $shipping_address
    //     // );

    //     // Data yang akan dikirim untuk request redirect_url.
    //     $credit_card['secure'] = true;
    //     //ser save_card true to enable oneclick or 2click
    //     $credit_card['save_card'] = true;

    //     $time = time();
    //     $custom_expiry = array(
    //         'start_time' => date("Y-m-d H:i:s O", $time),
    //         'unit' => 'minute',
    //         'duration'  => 2
    //     );

    //     $enabled_payments = array('gopay');
    //     $gopay = array(

    //         'enable_callback' => true,
    //         'callback_url' => "http://gopay.com"
    //     );



    //     $transaction_data = array(
    //         'transaction_details' => $transaction_details,
    //         // 'item_details'       => $item_details,
    //         // 'customer_details'   => $customer_details,
    //         'credit_card'        => $credit_card,
    //         'expiry'             => $custom_expiry,
    //         'enabled_payments' => $enabled_payments,
    //         'gopay' => $gopay,

    //     );

    //     error_log(json_encode($transaction_data));
    //     $snapToken = $this->midtrans->getSnapToken($transaction_data);
    //     error_log($snapToken);
    //     echo $snapToken;
    // }

    // public function finish()
    // {
    //     $result = json_decode($this->input->post('result_data'));
    //     echo 'RESULT <br><pre>';
    //     var_dump($result);
    //     echo '</pre>';
    // }
}
