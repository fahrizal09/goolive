<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Toko Pupuk</title>
    <link rel="icon" href="<?= base_url() ?>assets/customer/images/fevicon/fevicon.png" type="image/gif" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/studio/img/logo2.png">

    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/all.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/invoice.css'); ?>" rel="stylesheet">

</head>

<body>
    <div class="container-fluid invoice-container">

        <div class="row invoice-header">
            <div class="invoice-col">

            </div>

            <div class="invoice-col text-center">
                <div class="invoice-status">
                    <!-- <span class="paid">Paid</span> -->


                </div>
            </div>
        </div>



        <h1 style="text-align: center;">Laba Rugi Bulan <?= bulan($bulan)  ?></h1><br>
        <hr>
        <br />

        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #2980b9; ">
                <h3 class="panel-title" style="color: white;"><strong>Laba Rugi</strong></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td><strong>Kode</strong></td>
                                <td><strong>Keterangan</strong></td>
                                <td width="20%" class="text-center"><strong>Total</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="background-color: #2980b9; color:aliceblue;" colspan="4">Pendapatan</td>
                            </tr>
                            <?php foreach ($jurnal as $j) { ?>
                                <tr>
                                    <td></td>
                                    <td><?= $j->nama_reff ?></td>
                                    <td>Rp. <?= number_format($j->total)  ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td></td>
                                <td>Harga Poko Penjualan</td>
                                <td>Rp. <?= number_format($pengeluaran->total) ?></td>
                            </tr>

                            <tr>
                                <td class="total-row text-right"></td>
                                <td class="total-row text-right"><strong>Total</strong></td>
                                <td class="total-row text-center">Rp .<?= number_format($total1->total + $penjualan->total - $pengeluaran->total)  ?></td>
                            </tr>
                            <tr>
                                <td style="background-color: #2980b9; color:aliceblue;" colspan="4">Pengeluaran</td>
                            </tr>
                            <?php
                            foreach ($biaya as $j) {
                            ?>
                                <tr>
                                    <td></td>
                                    <td><?= $j->nama_reff ?></td>
                                    <td>Rp. <?= number_format($j->total) ?></td>
                                </tr>
                            <?php } ?>

                            <tr>
                                <td class="total-row text-right"></td>
                                <td class="total-row text-right"><strong>Total</strong></td>
                                <td class="total-row text-center">Rp .<?= number_format($total2->total)  ?></td>
                            </tr>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="panel panel-info">
            <div class="panel-heading" style="background-color: white;">
                <h3 class="panel-title"><strong>Catatan</strong></h3>
            </div>

            <!-- memberikan keterangan untuk yang di proses dan terbayar -->
            <div class="panel-body">
                <?php
                if ($total1->total >   ($total2->total + $penjualan->total)) {
                ?>
                    <p><b> Status : Untung</b></p>
                    <p style=" float:right"><b>Laba bersih : Rp.<?= number_format($total1->total - ($total2->total + $penjualan->total) - $pengeluaran->total)  ?></b></p>
                <?php } else  if ($total1->total == ($total2->total + $penjualan->total)) {  ?>
                    <p><b> Status : Seimbang</b></p>
                    <p style=" float:right"><b>Laba bersih : Rp.<?= number_format($total1->total  - ($total2->total + $penjualan->total) - $pengeluaran->total)  ?></b></p>
                <?php } else { ?>
                    <p><b> Status : Rugi</b></p>
                    <p style=" float:right"><b>Laba bersih : Rp.<?= number_format($total1->total  - ($total2->total + $penjualan->total) - $pengeluaran->total)  ?></b></p>
                <?php } ?>
            </div>
        </div>

        <div class="pull-right btn-group btn-group-sm hidden-print">
            <a href="javascript:window.print()" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            <!-- <a href="dl.php?type=i&amp;id=763834" class="btn btn-default"><i class="fa fa-download"></i> Download</a> -->
        </div>
    </div>
</body>

</html>