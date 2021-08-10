<style>
  /* The Modal (background) */
  .modal {}

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
            <h2 class="text-gray">Edit Produk</h2><br>
            <?php foreach ($produk2 as $c) { ?>
              <form action="<?php echo base_url('Produk/editProduk/' . $c->id_produk); ?>" id="main-contact-form" class="contact-form row" name="contact-form" method="post" enctype="multipart/form-data">
                <div class="form-group col-md-12">
                  Nama produk :
                  <input type="hidden" name="id_produk" class="form-control" required="required" value="<?php echo $c->id_produk; ?>">
                  <input type="text" name="nama_produk" class="form-control" required="required" value="<?php echo $c->nama_produk; ?>">
                </div>
              <?php } ?>
              <?php foreach ($kategori as $a) { ?>
                <input type="hidden" name="id_kategori" value="<?php echo $a->id_kategori; ?>">
              <?php } ?>
              <div class="form-group col-md-12">
                Kategori :
                <select name="kategori" class="form-control" required="required">
                  <!-- <option disabled>Pilih Pangkat</option>
          <option <?php if ($gtk->pajago_gtk == '1a') echo "selected" ?> value="1a">Gol. 1A</option>
            <option></option> -->
                  <?php foreach ($kategori as $a) { ?>
                    <?php
                    if ($a->id_kategori == $c->kategori_id_kategori) {
                      echo  "<option value='" . $a->id_kategori . "' selected>" . $a->nama_kategori . "</option>";
                    }
                    echo "<option value='" . $a->id_kategori . "'>" . $a->nama_kategori . "</option>"; ?>
                  <?php } ?>
                </select>
              </div>
              <?php foreach ($produk2 as $c) { ?>
                <div class="form-group col-md-12">
                  Stok produk:
                  <input type="number" name="stok" min="1" class="form-control" required="required" value="<?php echo $c->stok; ?>">
                </div>
                <div class="form-group col-md-12">
                  Harga produk:
                  <input type="number" name="harga" min="1" class="form-control" required="required" value="<?php echo $c->harga; ?>">
                </div>
                <div class="form-group col-md-12">
                  Panjang produk:
                  <input type="number" name="panjang" min="1" class="form-control" required="required" value="<?php echo $c->panjang; ?>">
                </div>
                <div class="form-group col-md-12">
                  Lebar produk:
                  <input type="number" name="lebar" min="1" class="form-control" required="required" value="<?php echo $c->lebar; ?>">
                </div>
                <div class="form-group col-md-12">
                  Tinggi produk:
                  <input type="number" name="tinggi" min="1" class="form-control" required="required" value="<?php echo $c->tinggi; ?>">
                </div>
                <div class="form-group col-md-12">
                  Gambar produk: <br>
                  <img style="margin-bottom: 10px;" height="100px" width="100px" src="<?php echo base_url('./assets/images/depan/' . $c->gambar); ?>">
                  <input type="file" name="filefoto" placeholder="Upload gambar" style="padding-right:1px;">
                  <input type="hidden" name="oldfoto" required="required" value="<?php echo $c->gambar; ?>" style="padding-right:1px;">
                </div>
                <div class="form-group col-md-12">
                  Gambar produk: <br>
                  <img style="margin-bottom: 10px;" height="100px" width="100px" src="<?php echo base_url('./assets/images/samping2/' . $c->gambar2); ?>">
                  <input type="file" name="filefoto2" placeholder="Upload gambar" style="padding-right:1px;">
                  <input type="hidden" name="oldfoto2" required="required" value="<?php echo $c->gambar2; ?>" style="padding-right:1px;">
                </div>
                <div class="form-group col-md-12">
                  Gambar produk: <br>
                  <img style="margin-bottom: 10px;" height="100px" width="100px" src="<?php echo base_url('./assets/images/samping3/' . $c->gambar3); ?>">
                  <input type="file" name="filefoto3" placeholder="Upload gambar" style="padding-right:1px;">
                  <input type="hidden" name="oldfoto3" required="required" value="<?php echo $c->gambar3; ?>" style="padding-right:1px;">
                </div>

                <div class="form-group col-md-12">
                  Keterangan produk:
                  <textarea name="keterangan" required="required" class="form-control" rows="8"><?php echo $c->keterangan; ?></textarea>
                  <!-- <input type="textarea" name="keterangan" class="form-control" required="required" placeholder="Keterangan produk"> -->
                </div>
                <div class="form-group col-md-12">
                  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                  <a href="<?php echo base_url('Owner_controller/O_produk'); ?>"><button type="button" value="batal" class="btn btn-primary">Batal</button></a>
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