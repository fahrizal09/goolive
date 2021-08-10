<!DOCTYPE html>
<html lang="en">
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-Bjo1CY7d8pmYDxbY"></script>
<?php $this->load->view('Customer/v_style_head') ?>

<body id="default_theme" class="it_serv_shopping_cart shopping-cart">
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
                                <h1 class="page-title">Pesanan Anda</h1>
                                <ol class="breadcrumb">
                                    <li><a href="index.html">Beranda</a></li>
                                    <li class="active">Shopping Cart</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->
    <div class="section padding_layout_1 Shopping_cart_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="product-table">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Data Pemesan</th>
                                    <th class="text-center">Jumlah Beli</th>
                                    <th class="text-center">Total Bayar</th>
                                    <th> Checkout</th>
                                    <!-- <th> Qr Code</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bayar as $t) {
                                ?>
                                    <tr>
                                        <td class="col-sm-8 col-md-6">
                                            <div class="media"> <a class="thumbnail pull-left" href="#"> </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="#"><?= $t->nama_barang ?></a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-1 col-md-1" style="text-align: center">
                                            <p class="price_table"><?= $t->jumlah_barang ?></p>
                                        </td>
                                        <td class="col-sm-1 col-md-1 text-center">
                                            <p class="price_table">Rp.<?= number_format($t->sub_total, 0, ',', '.')  ?></p>
                                        </td>

                                        <td class="col-sm-1 col-md-1">
                                            <p class="price_table" style="font-size: 10px;"><?= $t->tanggal_checkout ?></p>
                                        </td>
                                        <!-- 
                                        <td class="col-sm-1 col-md-1">
                                      
                                            <?php
                                            $kode = $qrcode;
                                            require_once('assets/phpqrcode/qrlib.php');
                                            QRcode::png($kode, "kode.png", "H", 2.2);
                                            ?>
                                            <img src="<?= base_url() ?>kode.png" alt="">

                                        </td> -->

                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>

                    </div>
                    <div class="shopping-cart-cart">
                        <table>
                            <tbody>
                                <tr class="head-table">
                                    <td>
                                        <h5>Cart Totals</h5>
                                    </td>
                                    <td class="text-right"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>Total</h3>
                                    </td>
                                    <td class="text-right">
                                        <h4>Rp . <?= number_format($total->total_bayar, 0, ',', '.') ?></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <a class="button center" href="" type="button" data-toggle="modal" data-target="#modalBayar<?= $t->id_trans ?> ">Bayar Sekarang</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php foreach ($trans as $k) {
    ?>
        <div class="modal fade" id="modalBayar<?= $k->id_trans ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="post" action="<?= base_url() ?>Customer/Shop/update_pembayaran" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div>
                                <p style="font-style: bold; color:red;"> Total : Rp.<?= number_format($k->total_bayar, 0, ',', '.')  ?></p>
                            </div>
                            <div class="form-field">
                                <label>Upload Bukti Transfer</label>
                                <input name="id_cus" value="<?= $k->id_cus ?>" type="hidden">
                                <input name="id_trans" value="<?= $k->id_trans ?>" type="hidden">
                                <input type="file" name="bukti_transfer" required="" type="text">
                            </div>
                            <div>
                                <p class="price_table" style="font-size:;">Scan untuk pembayaran lewat gopay</p>
                                <?php
                                $kode = $qrcode;
                                require_once('assets/phpqrcode/qrlib.php');
                                QRcode::png($kode, "kode.png", "H", 2.2);
                                ?>
                                <img class="" src="<?= base_url() ?>kode.png" alt="">
                            </div>
                            <div class="mt-3">
                                <p style="font-style: bold; color:red;"> * Transaksi akan di batalkan jika selama 7 hari setelah checkout belum melakukan transaksi</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="button" type="submit">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- footer -->
    <?php $this->load->view('Customer/v_footer') ?>
    <!-- end footer -->
    <?php $this->load->view('Customer/v_style_foot') ?>
    <!-- <script type="text/javascript">
        $('#pay-button').click(function(event) {
            event.preventDefault();
            $(this).attr("disabled", "disabled");

            $.ajax({
                url: '<?= site_url() ?>Customer/Shop/token/<?= $t->id_trans ?>',
                cache: false,

                success: function(data) {
                    //location = data;

                    console.log('token = ' + data);

                    var resultType = document.getElementById('result-type');
                    var resultData = document.getElementById('result-data');

                    function changeResult(type, data) {
                        $("#result-type").val(type);
                        $("#result-data").val(JSON.stringify(data));
                        //resultType.innerHTML = type;
                        //resultData.innerHTML = JSON.stringify(data);
                    }


                    snap.pay(data, {

                        onSuccess: function(result) {
                            changeResult('success', result);
                            console.log(result.status_message);
                            console.log(result);
                            $("#payment-form").submit();
                        },
                        onPending: function(result) {
                            changeResult('pending', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        },
                        onError: function(result) {
                            changeResult('error', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        }
                    });
                }
            });
        });
    </script> -->
</body>

</html>