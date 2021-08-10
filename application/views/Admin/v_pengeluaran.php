<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h2 style="color: #1E7BCB;"> Pengeluaran </h2><br>
                        <form action="<?php echo base_url('Admin/Barang/tambahkategori'); ?>" id="main-contact-form" class="contact-form row" name="contact-form" method="post" enctype="multipart/form-data">
                        </form><br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            #Id Suplier
                                        </th>
                                        <th>
                                            Tanggal Transaksi
                                        </th>
                                        <th>
                                            Nama Suplier
                                        </th>
                                        <th>
                                            Total Pembayaran
                                        </th>
                                        <th>

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($hasil as $a) { ?>
                                        <tr>
                                            <td class="font-weight-medium">
                                                <?php echo $a->id_suplier; ?>
                                            </td>
                                            <td class="font-weight-medium">
                                                <?php echo $a->tgl_masuk_barang; ?>
                                            </td>
                                            <td class="font-weight-medium">
                                                <?php echo $a->nama_suplier; ?>
                                            </td>
                                            <td>
                                                Rp . <?= number_format($a->total, 0, ',', '.'); ?>
                                            </td>
                                            <td>
                                                <center><a href="<?php echo base_url('Admin/Laporan/'); ?>"><button type="button" class="btn btn-success"><i class="menu-icon mdi mdi-eye"></i> Lihat</button></a></center>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- content-wrapper ends -->

    <!-- Pop up -->
    <script type="text/javascript">
        function confirm_alert(node) {
            return confirm("Apakah anda yakin ingin menghapus kategori?");
        }
    </script>