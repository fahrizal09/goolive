<!-- <div class="bg_load"> <img class="loader_animation" src="<?= base_url() ?>assets/customer/images/loaders/loader_1.png" alt="#" /> </div> -->
<header id="default_header" class="header_style_1">
    <!-- header top -->
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="full">
                        <div class="topbar-left">
                            <ul class="list-inline">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 right_section_header_top">
                    <div class="float-left">
                        <div class="social_icon">
                            <ul class="list-inline">
                                <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook" target="_blank"></a></li>
                                <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+" target="_blank"></a></li>
                                <li><a class="fa fa-twitter" href="https://twitter.com" title="Twitter" target="_blank"></a></li>
                                <li><a class="fa fa-linkedin" href="https://www.linkedin.com" title="LinkedIn" target="_blank"></a></li>
                                <li><a class="fa fa-instagram" href="https://www.instagram.com" title="Instagram" target="_blank"></a></li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    $id_cus = $this->session->userdata('id_customer');
                    if (!$id_cus) {
                        $chart = "0";
                    } else {
                        $this->db->select('COUNT(id_barang) as total_barang');
                        $this->db->where('id_cus', $id_cus);
                        $this->db->where('status', "Belum Checkout");
                        $jumlah = $this->db->get('pemesanan')->row_array();
                        if ($jumlah > 0) {
                            $chart = $jumlah['total_barang'];
                        } else {
                            $chart = "0";
                        }
                    }

                    ?>
                    <div class="float-right">
                        <div class="make_appo"> <a class="btn white_btn" href="<?= base_url() ?>Customer/Shop/keranjang"><span>
                                    <i class="fa  fa-shopping-cart" style="width: 20px; height:50px;"></i></span>Keranjang (<?= $chart ?>)</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header top -->
    <!-- header bottom -->
    <div class="header_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <!-- logo start -->
                    <div class="logo"> <a href="it_home.html"><img src="<?= base_url() ?>assets/customer/images/logos/logos1.png" alt="logo" /></a> </div>
                    <!-- logo end -->
                </div>
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <!-- menu start -->
                    <div class="menu_side">
                        <div id="navbar_menu">
                            <ul class="first-ul">
                                <li> <a class="active" href="<?= base_url() ?>Customer/Beranda">Beranda</a>
                                </li>
                                <li> <a>Proyek</a>
                                    <ul>
                                        <?php
                                        $data = $this->db->get('kategori_barang')->result();
                                        foreach ($data as $d) { ?>
                                            <li><a href="<?= base_url("Customer/Produk/kategori/$d->id_kategori") ?>"><?= $d->nama_kategori_brg ?></a></li>
                                        <?php } ?>

                                    </ul>
                                </li>
                                <li> <a>Produk Welijo</a>
                                    <ul>
                                        <?php
                                        $data = $this->db->get('kategori_barang')->result();
                                        foreach ($data as $d) { ?>
                                            <li><a href="<?= base_url("Customer/Produk/kategori/$d->id_kategori") ?>"><?= $d->nama_kategori_brg ?></a></li>
                                        <?php } ?>

                                    </ul>
                                </li>
                                <li> <a>Pembelian</a>
                                    <ul>
                                        <li><a href="<?= base_url() ?>Customer/Shop/checkout">Checkout</a></li>
                                        <li><a href="<?= base_url() ?>Customer/Shop/pesanan">Pesanan</a></li>
                                    </ul>
                                </li>
                                <li> <a href="<?= base_url() ?>Customer/Customer/profil">Akun</a>
                                    <ul>
                                        <li>
                                            <?php
                                            $id = $this->session->userdata('id_customer');
                                            $nama = $this->session->userdata('nama');
                                            if ($id == null) { ?>
                                                <a href="<?= base_url('Customer/Customer/') ?>">
                                                    Login dulu ya!
                                                </a>
                                            <?php } else { ?>
                                                <a href="<?= base_url('Customer/Customer/logout/') ?>">
                                                    Logout
                                                </a>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="search_icon">
                            <ul>
                                <li><a href="#" data-toggle="modal" data-target="#search_bar"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                            </ul>
                        </div> -->
                    </div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
    <!-- header bottom end -->
</header>