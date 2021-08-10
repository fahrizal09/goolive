<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('Customer/v_style_head') ?>
<link rel='stylesheet' href='<?= base_url() ?>assets/customer/css/hizoom.css'>

<body id="default_theme" class="it_shop_detail">
    <!-- loader -->
    <?php $this->load->view('Customer/v_header') ?>
    <!-- end header -->
    <!-- inner page banner -->
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Shop Detail</h1>
                                <ol class="breadcrumb">
                                    <li><a href="index.html">Home</a></li>
                                    <li class="active">Shop Detail</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->
    <!-- section -->
    <div class="section padding_layout_1 product_detail">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="product_detail_feature_img hizoom hi2">
                                <div class='hizoom hi2'> <img src="<?= base_url('./assets/images/' . $detail->gambar) ?>" alt=" #" /> </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 product_detail_side detail_style1">
                            <div class="product-heading">
                                <h2><?= $detail->nama_barang ?></h2>
                            </div>
                            <div class="product-detail-side"><span class="new-price">Rp<?= number_format($detail->harga_barang, 0, ',', '.') ?></span> <span class="review"></span> </div>
                            <div class="detail-contant">
                                <p><?= $detail->keterangan ?> <br>
                                    <span class="stock"><?= $detail->stok_barang ?> Pcs</span> </p>
                                <form class="cart" method="post" action="<?= base_url() ?>Customer/Shop/tambah_keranjang">
                                    <div class="quantity">
                                        <input name="id_barang" value="<?= $detail->id_barang ?>" type="hidden">
                                        <input name="id_cus" value="<?= $this->session->userdata('id_customer') ?>" type="hidden">
                                        <input name="tgl_pemesanan" type="hidden" value="<?= $waktu ?>">
                                        <input name="sub_total" type="hidden" value="<?= $detail->harga_barang ?>">
                                        <input step="1" min="1" max="<?= $detail->stok_barang ?>" name="jumlah_barang" value="1" title="Qty" class="input-text qty text" size="4" type="number">
                                    </div>
                                    <button type="submit" class="btn sqaure_bt">+ Keranjang</button>
                                </form>
                            </div>
                            <div class="share-post"> <a href="#" class="share-text">Share</a>
                                <ul class="social_icons">
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="full">
                                <div class="main_heading text_align_left" style="margin-bottom: 35px;">
                                    <h3>Produk yang berkaitan</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($produk as $p) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                                <div class="product_list">
                                    <div class="product_img"> <img class="img-responsive" src="<?= base_url('./assets/images/' . $p->gambar) ?>" alt=""> </div>
                                    <div class="product_detail_btm">
                                        <div class="center">
                                            <h4><a href="<?= base_url('Customer/Produk/detail_produk/' . $p->id_barang) ?>"><?= $p->nama_barang ?></a></h4>
                                        </div>

                                        <div class="product_price">
                                            <p><span class="new_price">Rp. <?= number_format($p->harga_barang, 0, ',', '.') ?></span></p>

                                        </div>
                                        <div style="margin-top:10px;" class="center">
                                            <p style="text-align: center; font-size:12px;"><span>Stok : <?= $p->stok_barang ?> pcs</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="side_bar">
                        <!-- <div class="side_bar_blog">
                            <h4>SEARCH</h4>
                            <div class="side_bar_search">
                                <div class="input-group stylish-input-group">
                                    <input class="form-control" placeholder="Search" type="text">
                                    <span class="input-group-addon">
                                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </span> </div>
                            </div>
                        </div> -->
                        <div class="side_bar_blog">
                            <h4>Kategori Pupuk</h4>
                            <div class="categary">
                                <ul>
                                    <?php
                                    $data = $this->db->get('kategori_barang')->result();
                                    foreach ($data as $d) { ?>
                                        <li><a href="<?= base_url("Customer/Produk/kategori/$d->id_kategori") ?>"><i class="fa fa-angle-right"></i><?= $d->nama_kategori_brg ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->

    <!-- footer -->
    <?php $this->load->view('Customer/v_footer') ?>
    <!-- end footer -->
    <!-- js section -->
    <?php $this->load->view('Customer/v_style_foot') ?>
    <script src='<?= base_url() ?>assets/customer/js/hizoom.js'></script>
    <script>
        $('.hi1').hiZoom({
            width: 300,
            position: 'right'
        });
        $('.hi2').hiZoom({
            width: 400,
            position: 'right'
        });
    </script>
</body>

</html>