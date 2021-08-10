<!DOCTYPE html>
<html lang="en">
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
                                <h1 class="page-title">Keranjang Pembelian</h1>
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
                        <form action="<?= base_url('Customer/Shop/update_cart') ?>" method="post">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Pupuk</th>
                                        <th>Jumlah</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Total</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($keranjang as $k) { ?>
                                        <tr>
                                            <td class="col-sm-8 col-md-6">
                                                <div class="media"> <a class="thumbnail pull-left" href="#"> <img class="media-object" style="width: 125px;height: 150px;" src="<?= base_url('./assets/images/' . $k->gambar) ?>" alt="#"></a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><a href="#"><?= $k->nama_barang ?></a></h4>
                                                        <span>Status: </span><span class="text-success"><?= $k->stok_barang ?> Stok</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <input type="hidden" name="id_pemesanan[]" value=<?= $k->id_pemesanan ?>>
                                            <td class="col-sm-1 col-md-1" style="text-align: center; ">
                                                <input class="form-control" style="width:50px;" name="jumlah_barang[]" value="<?= $k->jumlah_barang ?>">
                                                <input class="form-control" type="hidden" style="width:50px;" name="sub_total[]" value="<?= $k->sub_total ?>">
                                                <input class="form-control" type="hidden" style="width:50px;" name="harga_barang[]" value="<?= $k->harga_barang ?>">
                                            </td>
                                            <td class="col-sm-1 col-md-1 text-center">
                                                <p class="price_table">Rp.<?= number_format($k->harga_barang, 0, ',', '.')  ?></p>
                                            </td>
                                            <td class="col-sm-1 col-md-1 text-center">
                                                <p class="price_table">Rp.<?= number_format($k->sub_total, 0, ',', '.') ?></p>
                                            </td>
                                            <td class="col-sm-1 col-md-1"><button data-toggle="modal" data-target="#modalRemove<?= $k->id_pemesanan ?>" type="button" class="bt_main"><i class="fa fa-trash"></i> Remove</button></td>
                                        </tr>
                                    <?php } ?>


                                </tbody>
                            </table>
                            <table class="table">
                                <tbody>
                                    <tr class="cart-form">
                                        <td class="actions">
                                            <button class="button" name="update_cart" value="Perbarui Keranjang" type="submit">Perbarui Keranjang</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
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
                                        <h4>Rp . <?= number_format($total->total, 0, ',', '.') ?></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a class="button center" href="<?= base_url() ?>Customer/Shop/checkout" style="color: white;">Checkout</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    foreach ($keranjang as $k) {


    ?>
        <div class="modal fade" id="modalRemove<?= $k->id_pemesanan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Hapus barang dari keranjang?
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-danger" href="<?= base_url('Customer/Produk/hapus_produk/' . $k->id_pemesanan) ?>">Hapus</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- footer -->
    <?php $this->load->view('Customer/v_footer') ?>
    <!-- end footer -->
    <?php $this->load->view('Customer/v_style_foot') ?>
</body>

</html>