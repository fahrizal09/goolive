
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="container">
	<div class="row">
		<div class="col-sm-12 col-sm-offset-1" style="background-color: white;padding:20px;">
            <h2 class="text-gray">Voucher</h2><br><br>
            <?php foreach($voucher2 as $a) { ?>
			<form action="<?php echo base_url('Owner_controller/A_voucher/ubahvoucher/'.$a->id_voucher); ?>" method="post" enctype="multipart/form-data">
				<div class="form-group col-md-12">
                    Kode Voucher :
					<input type="hidden" name="id_voucher" value="<?= $this->uri->segment(4) ?>" class="form-control" required="required" placeholder="kode">
					<input type="text" name="kode_voucher" value="<?php echo $a->kode_voucher; ?>" class="form-control" required="required" placeholder="kode">
				</div>
				
				<div class="form-group col-md-3">
					Nama Voucher:
					<input type="text" name="nama_voucher" value="<?php echo $a->nama_voucher; ?>" class="form-control" required="required" placeholder="nama voucher">
				</div> 
				<div class="form-group col-md-3">
					Tanggal awal:
					<input type="date" name="tgl_awal" value="<?php echo $a->tgl_awal; ?>" class="form-control" required="required" placeholder="tanggal awak">
				</div> 
				<div class="form-group col-md-3">
					Tanggal Akhir:
					<input type="date" name="tgl_akhir" value="<?php echo $a->tgl_akhir; ?>" class="form-control" required="required" placeholder="tanggal akhir">
				</div> 
				<div class="form-group col-md-3">
					Total Voucher:
					<input   name="total_voucher" min="1" value="<?php echo $a->total_voucher; ?>" class="form-control" required="required" placeholder="total voucher">
				</div>
                <div class="form-group col-md-3">
					Minimum Belanja:
					<input   name="minimum_belanja" min="1" value="<?php echo $a->minimum_belanja; ?>" class="form-control" required="required" placeholder="minimum belanja">
				</div>
				<div class="form-group col-md-12">
					Keterangan:
					<textarea name="keterangan"  required="required" class="form-control" rows="8" placeholder="Keterangan"><?php echo $a->kode_voucher; ?></textarea>
				
				</div>        
				<div class="form-group col-md-12">
				<input type="submit" name="submit" class="btn btn-primary" value="Submit">
					<a href="##"><button type="button" value="batal" class="btn btn-primary">Batal</button></a>
				</div>
				</form>
		</div>
			<?php } ?>
	</div>
</div>
</div>
</div>