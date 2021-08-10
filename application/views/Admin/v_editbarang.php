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
            <h2 class="text-gray">Edit barang</h2><br>
            <?php foreach ($barang2 as $c) { ?>
              <form action="<?php echo base_url('Admin/Barang/editBarang/' . $c->id_barang); ?>" id="main-contact-form" class="contact-form row" name="contact-form" method="post" enctype="multipart/form-data">
                <div class="form-group col-md-12">
                  Nama barang :
                  <input type="hidden" name="id_barang" class="form-control" required="required" value="<?php echo $c->id_barang; ?>">
                  <input type="text" name="nama_barang" class="form-control" required="required" value="<?php echo $c->nama_barang; ?>">
                </div>
                <div class="form-group col-md-12">
                  Harga barang:
                  <input type="number" name="harga_barang" min="1" class="form-control" required="required" value="<?php echo $c->harga_barang; ?>">
                </div>
                <div class="form-group col-md-12">
                  Stok barang:
                  <input type="number" name="stok_barang" min="1" class="form-control" required="required" value="<?php echo $c->stok_barang; ?>">
                </div>
                <div class="form-group col-md-12">
                  Tanggal Masuk barang:
                  <input type="date" name="tgl_masuk_barang" min="1" class="form-control" required="required" value="<?php echo $c->tgl_masuk_barang; ?>">
                </div>
                <div class="form-group col-md-12">
                  Gambar barang: <br>
                  <img style="margin-bottom: 10px;" height="100px" width="100px" src="<?php echo base_url('./assets/images/' . $c->gambar); ?>">
                  <input type="file" name="gambar" placeholder="Upload gambar" style="padding-right:1px;">
                  <input type="hidden" name="oldfoto" required="required" value="<?php echo $c->gambar; ?>" style="padding-right:1px;">
                </div>
              <div class="form-group col-md-12">
                Kategori :
                <select name="id_kategori_barang" class="form-control" required="required">
                  <?php foreach ($kategori as $a) { ?>
                    <?php
                    if ($a->id_kategori == $c->id_kategori_barang) {
                      echo  "<option value='" . $a->id_kategori . "' selected>" . $a->nama_kategori_brg . "</option>";
                    }
                    echo "<option value='" . $a->id_kategori . "'>" . $a->nama_kategori_brg . "</option>"; ?>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-12">
                Suplier :
                <select name="id_suplier" class="form-control" required="required">
                  <?php foreach ($suplier as $aw) { ?>
                    <?php
                    if ($wa->id_suplier == $c->id_suplier) {
                      echo  "<option value='" . $aw->id_suplier . "' selected>" . $aw->nama_suplier . "</option>";
                    }
                    echo "<option value='" . $aw->id_suplier . "'>" . $aw->nama_suplier . "</option>"; ?>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-12">
                  Keterangan:
                  <input type="text" name="keterangan" min="1" class="form-control" required="required" value="<?php echo $c->keterangan; ?>">
                </div>
                <div class="form-group col-md-12">
                  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                  <a href="<?php echo base_url('Admin/Barang'); ?>"><button type="button" value="batal" class="btn btn-primary">Batal</button></a>
                </div>
                <?php } ?>
              </form>
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
