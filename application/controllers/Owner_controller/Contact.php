<!-- <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{
    function __construct(){
		parent::__construct();		
		$this->load->model('M_produk');
		$this->load->model('M_profil');
		$this->load->model('M_pesanan');
		$this->load->library('upload');
		$this->load->helper(array('url'));
		// if($this->session->userdata('status') != "login"){
		// 	echo "<script>
        //         alert('Anda harus login terlebih dahulu');
        //         window.location.href = '".base_url('Login')."';
        //     </script>";//Url tujuan
		// }
		
	}


	 public function index() {
        
       $data['kategori'] = $this->M_produk->tampil_kategori();
		// $data['produk'] = $this->M_produk->tampil_produk3();
		// $data['produk2'] = $this->M_produk->tampil_produk4();
		// $data['produk3'] = $this->M_produk->tampil_produk5();
        $this->load->view('mebel/contact', $data);
	}

	
}
?>
 -->