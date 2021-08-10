<style>
  /* The Modal (background) */
.modal {
  
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<!-- fungsi input hanya admin -->
<script>
  function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
  }
</script>

<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="container">
	<div class="row">
		<div class="col-sm-12 col-sm-offset-1" style="background-color: white;padding:20px;">
            <h2 class="text-gray">Tambah Produk</h2><br><br>
            <?= form_open_multipart('Produk/insert_produk'); ?>
			
				<div class="form-group col-md-12">
					Nama produk :
					<input type="text" name="nama_produk" class="form-control" required="required" placeholder="Nama produk anda">
				</div>
				<?php foreach($kategori as $a){?> 
				<input type="hidden" name="id_kategori" value="<?php echo $a->id_kategori; ?>">
				<?php } ?>
				<div class="form-group col-md-12">
					Kategori :
					<select name="kategori" class="form-control">
						<?php foreach($kategori as $a){?>
						<?php echo "<option>".$a->nama_kategori."</option>"; ?>
						<?php } ?>
					</select>
				</div> 
				<div class="form-group col-md-3">
					Stok produk:
					<input onkeypress="return hanyaAngka(event)" maxlength="4" name="stok" min="1" class="form-control" required="required" placeholder="Stok produk">
				</div> 
				<div class="form-group col-md-3">
					Harga produk:
					<input onkeypress="return hanyaAngka(event)" maxlength="7" name="harga" min="1" class="form-control" required="required" placeholder="Harga produk">
				</div>
				<div class="form-group col-md-3">
					Panjang produk:
					<input onkeypress="return hanyaAngka(event)" maxlength="7" name="panjang" min="1" class="form-control" required="required" placeholder="Panjang produk">
				</div>
				<div class="form-group col-md-3">
					Lebar produk:
					<input onkeypress="return hanyaAngka(event)" maxlength="7" name="lebar" min="1" class="form-control" required="required" placeholder="Lebar produk">
				</div>
				<div class="form-group col-md-3">
					Tinggi produk:
					<input onkeypress="return hanyaAngka(event)" maxlength="7" name="tinggi" min="1" class="form-control" required="required" placeholder="Tinggi produk">
				</div>
				
				<div class="form-group col-md-12">
					Upload gambar Depan :<br><br>
					<input type="file" name="filefoto"  required="required" placeholder="Upload gambar" style="padding-right:1px;">
                </div> 
				<div class="form-group col-md-6">
					Upload gambar Samping 1 :<br><br>
					<input type="file" name="filefoto2"  required="required" placeholder="Upload gambar" style="padding-right:1px;">
                </div> 
				<div class="form-group col-md-6">
					Upload gambar Samping 2 :<br><br>
					<input type="file" name="filefoto3"  required="required" placeholder="Upload gambar" style="padding-right:1px;">
                </div> 
                
				<div class="form-group col-md-12">
					Keterangan produk:
					<textarea name="keterangan" required="required" class="form-control" rows="8" placeholder="Keterangan produk"></textarea>
					<!-- <input type="textarea" name="keterangan" class="form-control" required="required" placeholder="Keterangan produk"> -->
				</div>        
				<div class="form-group col-md-12">
					<input type="submit" name="submit" class="btn btn-primary" value="Submit">
					<a href="<?php echo base_url('Produk'); ?>"><button type="button" value="batal" class="btn btn-primary">Batal</button></a>
				</div>
			<?php form_close(); ?>
		</div>
	</div>
</div>
</div>
</div>
<!-- content-wrapper ends -->

<!-- Pop up -->
<script type="text/javascript">
  function confirm_alert(node) {
      return confirm("Apakah anda yakin ingin menghapus produk?");
  }
</script>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
