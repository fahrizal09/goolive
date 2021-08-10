<title>Admin Toko Pupuk</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- site icons -->
<link rel="icon" href="<?= base_url() ?>assets/customer/images/fevicon/fevicon.png" type="image/gif" />
<link href="<?= base_url() ?>assets/admin/css/style_cetak.css" rel="stylesheet">
<h4 style="text-align: center;">Laporan Pembelian Barang ke <?= $total->nama_suplier ?> </h4><br>
<div class="">
    <table class="table table-bordered">
        <thead style="font-size: 12px;">
            <tr>
                <th>
                    No.
                </th>
                <th>
                    Id Barang
                </th>
                <th>
                    Nama Barang
                </th>
                <th>
                    Harga
                </th>
                <th>
                    Jumlah Beli
                </th>
                <th>
                    Tanggal Beli
                </th>
                <th>
                    Suplier
                </th>
            </tr>
        </thead>
        <tbody style="font-size: 12px;">
            <?php
            $i = 1;
            foreach ($list as $l) { ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $l->id_barang ?></td>
                    <td><?= $l->nama_barang ?></td>
                    <td>Rp.<?= number_format($l->harga_beli, 0, ',', '.')  ?></td>
                    <td><?= $l->stok_barang ?> Pcs</td>
                    <td><?= $l->tgl_masuk_barang ?></td>
                    <td><?= $l->nama_suplier ?></td>


                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div>
        <p style="float: right; color:brown; font-size:18px;">Total : Rp. <?= number_format($total->total, 0, ',', '.')  ?></p>
    </div>
</div>
<script>
    window.print();
</script>