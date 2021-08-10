<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                 <h2 style="color: #1E7BCB;">Voucher</h2><br>
                  <div class="table-responsive">
                      <a style="margin-bottom: 10px;" href="<?= base_url('Owner_controller/A_voucher/addvoucher'); ?>" class="btn btn-success">Tambah Voucher</a>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #Kode Voucher
                          </th>
                          <th>
                            <center>Nama Voucher</center>
                          </th>
                          <th>
                            <center>Periode Voucher</center>
                          </th>
                          <th>
                            <center>Total voucher</center>
                          </th>
                          <th>
                            <center>Minimum Belanja</center>
                          </th>
                          <th>
                            <center>Aksi</center>
                          </th>
                        
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($voucher as $f) {?>
                        <tr>
                          <td class="font-weight-medium">
                            <?php echo $f->kode_voucher; ?>
                          </td>
                          <td>
                            <?php echo $f->nama_voucher; ?>
                          </td>
                          <td>
                            <?php echo $f->tgl_awal; ?> sampai <?php echo $f->tgl_akhir; ?>
                          </td>
                          <td>
                            <?php echo $f->total_voucher; ?>
                          </td>
                          <td>
                            <?php echo $f->minimum_belanja; ?>
                          </td>
                          <td>
                            <a href="<?= base_url('Owner_controller/A_voucher/hapusvoucher/'.$f->id_voucher); ?>" class="btn btn-danger">Hapus</a>
                            <a href="<?= base_url('Owner_controller/A_voucher/editvoucher/'.$f->id_voucher); ?>" class="btn btn-warning">Edit</a>
                          </td>
                     
                           
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
        
