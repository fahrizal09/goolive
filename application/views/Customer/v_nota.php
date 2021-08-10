
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STUDIO FOTO - Bukti pemesanan</title>

    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/all.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/invoice.css'); ?>" rel="stylesheet">

</head>
<body>  
<div class="container-fluid invoice-container">
<?php foreach($pemesanan as $p) { ?>
    <div class="row invoice-header">
        <div class="invoice-col">
        <?php echo $p->id_trans ?>
        </div>
        <div class="invoice-col text-center">
             <div class="invoice-status">
                <!-- <span class="paid">Paid</span> -->
                
                <span class="paid"> Rp <?php $format_indonesia = number_format ($p->total_bayar, 0, ',', '.');
                                     echo $format_indonesia; ?></span>
               
            </div>
        </div>
    </div><hr>
        
    <div class="row">
       
        <div class="invoice-col">
            <strong>Ditujukan kepada:</strong>
            <address class="small-text">                    
                <?php echo $p->alamat_pengiriman; ?><br />
                <?php echo $p->no_hp; ?><br />
               
            </address>
        </div>
    </div>

    <br />
    <div class="panel panel-info">
        <div class="panel-heading" style="background-color: white;">
            <h3 class="panel-title"><strong>Catatan</strong></h3>
        </div>
        
        <!-- memberikan keterangan untuk yang di proses dan terbayar -->
        <div class="panel-body">
        Pemesanan yang sudah dilakukan tidak bisa dibatalkan atau di uangkan kembali.
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #2980b9;">
            <h3 class="panel-title" style="color: white;"><strong>Pemesanan Anda</strong></h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <td><strong>Detail Pemesanan</strong></td>
                            <td><strong>Jumlah</strong></td>
                            <td width="20%" class="text-center"><strong>Total bayar</strong></td>
                        </tr>
                    </thead>
                    <tr>
                            <td><?php echo $p->nama_barang; ?></td>
                            <td><?php echo $p->jumlah_barang; ?></td>
                            <td class="text-center">Rp <?php $format_indonesia = number_format ($p->total_bayar, 0, ',', '.');
                                     echo $format_indonesia; ?></td>
                        </tr>
                    <tbody>    
                    <?php } ?>
    </div>
    <p style="color: orange;">*Terimakasih atas Pemesanan Anda.</p>
        </div>
    </div>
    


</div>
        <div class="pull-right btn-group btn-group-sm hidden-print">
            <a href="javascript:window.print()" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            <!-- <a href="dl.php?type=i&amp;id=763834" class="btn btn-default"><i class="fa fa-download"></i> Download</a> -->
        </div>
</body>
</html>