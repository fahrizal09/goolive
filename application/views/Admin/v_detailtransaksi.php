<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h2 style="color: #1E7BCB;">Detail Pesanan</h2><br>




            <div class="row">
              <div class="col-md-12">
                <table class="table">

                  <tr>
                    <th>Id trans</th>
                    <td> <?= $pesan2->id_trans ?> </td>
                  </tr>
                  <tr>
                    <th>Nama Pemesan</th>
                    <td><?= $pesan2->nama ?> </td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td><?= $pesan2->alamat_pengiriman ?></td>
                  </tr>
                  <tr>
                    <th>Status Pembayaran</th>
                    <td><?= $pesan2->status_pembayaran ?></td>
                  </tr>
                  <tr>
                    <th>Gambar</th>
                    <td><a target="_blank" href="<?php echo base_url('./assets/images/' . $pesan2->bukti_transfer); ?>"><img style="width: 200px; height:200px;" src="<?php echo base_url('./upload/' . $pesan2->bukti_transfer); ?>"></a></td>
                  </tr>


                </table>






                <br><br>

                <!-- content-wrapper ends -->
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>
                      #Id Barang
                    </th>
                    <th>
                      Nama Barang
                    </th>
                    <th>

                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pesanan as $a) { ?>
                    <tr>
                      <td class="font-weight-medium">
                        <?php echo $a->id_barang; ?>
                      </td>
                      <td>
                        <?php echo $a->nama_barang; ?>
                      </td>
                      <td>
                        <center><a onclick="return confirm_alert(this);" href="<?php echo base_url('Admin/Barang/hapuskategori/' . $a->id_trans); ?>"><button type="button" class="btn btn-danger"><i class="menu-icon mdi mdi-delete"></i> Hapus</button></a></center>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>