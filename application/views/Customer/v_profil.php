<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('Customer/v_style_head') ?>

<body id="default_theme" class="it_serv_shopping_cart shopping-cart">
    <?php $this->load->view('Customer/v_header') ?>
    <!-- end loader -->
    <!-- header -->

    <!-- end header -->
    <!-- inner page banner -->
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Contact</h1>
                                <ol class="breadcrumb">
                                    <li><a href="index.html">Home</a></li>
                                    <li class="active">Contact</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->
    <div class="section padding_layout_1">
        <div class="container">
            <?php
            $id = $this->session->userdata('id_customer');
            $nama = $this->session->userdata('nama');
            if ($id == null) { ?>
                <a href="<?= base_url('Customer/Customer/') ?> " class="button">
                    Login dulu ya!
                </a>
            <?php } else { ?>
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="full">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="main_heading text_align_center">
                                        <h2>Profil Anda</h2>
                                    </div>
                                </div>
                                <div class="contact_information">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                                        <div class="information_bottom text_align_center">
                                            <div class="icon_bottom"> <i class="fa fa-road" aria-hidden="true"></i> </div>
                                            <div class="info_cont">
                                                <h4>Alamat/Kode Pos</h4>
                                                <p><?= $user->alamat ?>(<?= $user->kode_pos ?>)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                                        <div class="information_bottom text_align_center">
                                            <div class="icon_bottom"> <i class="fa fa-user" aria-hidden="true"></i> </div>
                                            <div class="info_cont">
                                                <h4><?= $user->nama ?></h4>
                                                <p>
                                                    <?= $user->no_hp ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                                        <div class="information_bottom text_align_center">
                                            <div class="icon_bottom"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
                                            <div class="info_cont">
                                                <h4><?= $user->email ?></h4>
                                                <p>24/7 online support</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
    <!-- footer -->
    <?php $this->load->view('Customer/v_footer') ?>
    <!-- end footer -->
    <?php $this->load->view('Customer/v_style_foot') ?>
</body>

</html>