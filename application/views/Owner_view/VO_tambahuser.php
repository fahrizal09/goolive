      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 style="color: #1E7BCB;">Tambah Admin</h4><br>
                  <form action="<?php echo base_url('Owner_controller/O_user/insertpegawai'); ?>" method="post">
                    <input style="width: 50%;" class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required="required"><br>
                    <input style="width: 50%;" class="form-control" type="email" name="email" placeholder="Email" required="required"><br>
                    <input style="width: 50%;" class="form-control" type="password" name="password" placeholder="Password" required="required"><br>
                    <input style="width: 50%;" class="form-control" maxlength="13" onkeypress="return hanyaAngka(event)" name="telp" placeholder="Nomor Telepon" required="required"><br>
                    <input style="width: 50%;" class="form-control" type="text" name="alamat" placeholder="Alamat" required="required"><br>
                    <input style="width: 50%;" class="form-control" maxlength="6" onkeypress="return hanyaAngka(event)" name="kodepos" placeholder="Kode Pos" required="required"><br>  

                    <button type="submit" class="btn btn-success">Simpan</button>
                  </form>
                  
                  <!-- fungsi inputan hanya angka -->
                  <script>
		                function hanyaAngka(evt) {
		                 var charCode = (evt.which) ? evt.which : event.keyCode
		                   if (charCode > 31 && (charCode < 48 || charCode > 57))
                        return false;
                        return true;
                      }
                    </script>
                  
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- content-wrapper ends -->
