<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('Customer/v_style_head') ?>

<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page">
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
                                <h1 class="page-title">Checkout</h1>
                                <ol class="breadcrumb">
                                    <li><a href="index.html">Home</a></li>
                                    <li class="active">Checkout</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->
    <div class="section padding_layout_1 checkout_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="full">

                        <div id="login" class="collapse">
                            <div class="login-form-checkout">
                                <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                <form action="#">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label for="username">Username or email <span class="required">*</span></label>
                                                <input class="input-text" name="username" id="username" required="" type="text">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label for="password">Password <span class="required">*</span></label>
                                                <input class="input-text" name="password" id="password" required="" type="password">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 btn-login">
                                                <button class="bt_main">Login</button>
                                                <span class="remeber">
                                                    <input type="checkbox">
                                                    Remember me</span> </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div id="cupon" class="collapse">
                            <div class="coupen-form">
                                <form action="#">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input class="input-text" name="coupon" placeholder="Coupon code" id="coupon" required="" type="text">
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <button class="bt_main">Login</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form method="post" action="<?= base_url() ?>Customer/Shop/bayar" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout-form">
                            <form action="#">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-field">
                                                <input name="id_cus" type="hidden" value="<?= $user->id_cus ?>">
                                                <label>Nama <span class="red">*</span></label>
                                                <input readonly name="nama" value="<?= $user->nama ?>" type="text">
                                                <input readonly name="total_bayar" value="<?= $total->total ?>" type="hidden">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-field">
                                                <label>Alamat Pengiriman <span class="red">*</span></label>
                                                <textarea name="alamat_pengiriman" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-field">
                                                <label>Kode pos <span class="red">*</span></label>
                                                <input readonly value="<?= $user->kode_pos ?>" name="pz" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-field">
                                                <label>No hp <span class="red">*</span></label>
                                                <input readonly value="<?= $user->no_hp ?>" name="ph" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-field">
                                                <label>Email address <span class="red">*</span></label>
                                                <input readonly value="<?= $user->email ?>" name="em" type="email">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="shopping-cart-cart">
                            <table>
                                <tbody>
                                    <tr class="head-table">
                                        <td>
                                            <h5>Keranjang Total</h5>
                                        </td>
                                        <td class="text-right"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3 class="mt-5">Total bayar:</h3>
                                        </td>
                                        <td class="text-right">
                                            <h4 class="mt-5">Rp.<?= number_format($total->total, 0, ',', '.') ?></h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="padding: 25px;">
                            <label class="mt-5" style=" color:red;">Cara Pembayaran <span class="red">*</span></label>
                            <label>- Mentransfer total yang harus dibayar pada no rekening di bawah</label>
                            <label>- Mengupload bukti pembayaran</label>
                            <label>- Pihak kami akan memverifikasi bukti pembayaran</label>
                            <label>- Jika valid barang akan dikirim sesuai alamat yang dicantumkan</label>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="payment-form">
                            <div class="col-xs-12 col-md-12">
                                <!-- CREDIT CARD FORM STARTS HERE -->
                                <div class="panel panel-default credit-card-box">
                                    <div class="panel-heading display-table">
                                        <div class="display-tr">
                                            <h3 class="panel-title display-td">Detail Pembayaran</h3>
                                            <div class="display-td"> <img class=" pull-right" src="<?= base_url() ?>assets/customer/images/it_service/accepted.png" alt="#"> </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row" id="payment-form">
                                            <div class="col-md-12">
                                                <div class="form-field">
                                                    <label>No Rekening</label>
                                                    <div class="form-field cardNumber">
                                                        <input name="cardNumber" value="0700 000 899 992" readonly required="" type="tel">
                                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-7">
                                                <div class="form-field">
                                                    <label><span class="hidden-xs">Tanggal Konfirmasi</span></label>
                                                    <input readonly name="tanggal_checkout" value="<?= $waktu ?>" placeholder="MM / YY" required="" type="tel">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-md-5 pull-right">
                                                <div class="form-field">
                                                    <label>BANK</label>
                                                    <select name="bank">
                                                        <option value="BRI">BRI</option>
                                                        <option value="BNI">BNI</option>
                                                        <option value="BCA">BCA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="form-field">
                                                    <label>Upload Bukti Transfer</label>
                                                    <input type="file" name="bukti_transfer" required="" type="text">
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-md-12 payment-bt">
                                                <div class="center">
                                                    <button class="bt_main" type="submit">Checkout</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- CREDIT CARD FORM ENDS HERE -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- section -->
    <!-- end section -->
    <!-- footer -->
    <?php $this->load->view('Customer/v_footer') ?>
    <?php $this->load->view('Customer/v_style_foot') ?>
</body>

</html>