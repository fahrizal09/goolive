<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('Customer/v_style_head') ?>

<body id="default_theme" class="it_shop_list">
    <!-- loader -->

    <!-- end loader -->
    <!-- header -->
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
                                <h1 class="page-title"><?= $nama->nama_kategori_brg ?></h1>
                                <ol class="breadcrumb">
                                    <li><a href="index.html">Beranda</a></li>
                                    <li class="active">Produk Pupuk</li>
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
    <div class="section padding_layout_1 product_list_main">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <?php foreach ($pupuk as $p) { ?>
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
    <!-- End Model search bar -->
    <?php $this->load->view('Customer/v_footer') ?>
    <?php $this->load->view('Customer/v_style_foot') ?>
</body>

</html>