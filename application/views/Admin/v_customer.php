<div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 style="color: #1E7BCB;">Daftar Customer</h2><br>

                  <div class="table-responsive"><br>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #Id Customer
                          </th>
                          <th>
                            Nama Customer
                          </th>
                          <th>
                            Alamat
                          </th>
                          <th>
                            Kode Pos
                          </th>
                          <th>
                            No telp
                          </th>
                          <th>
                            Email
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($customer as $a) {?>
                        <tr>
                          <td class="font-weight-medium">
                            <?php echo $a->id_cus; ?>
                          </td>
                          <td>
                            <?php echo $a->nama; ?>
                          </td>
                          <td>
                            <?php echo $a->alamat; ?>
                          </td>
                          <td>
                            <?php echo $a->kode_pos; ?>
                          </td>
                          <td>
                            <?php echo $a->no_hp; ?>
                          </td>
                          <td>
                            <?php echo $a->email; ?>
                          </td>
                          <td>
                            <center>
                              <a onclick="return confirm_alert(this);" href="<?php echo base_url('Admin/Customer/hapusCus/'.$a->id_cus); ?>"><button type="button" class="btn btn-danger"><i class="menu-icon mdi mdi-delete"></i> Hapus</button></a>
                            </center>

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
      return confirm("Apakah anda yakin ingin menghapus user?");
  }
</script>