<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                 <h2 style="color: #1E7BCB;">TESTIMONI</h2><br>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            ID FAQ
                          </th>
                          <th>
                            <center>Nama Customer</center>
                          </th>
                          <th>
                            <center>Gambar</center>
                          </th>
                          <th>
                            <center>Keterangan</center>
                          </th>
                          <th>
                            <center>Produk</center>
                          </th>
                          <th>
                            <center>Date</center>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($testi as $t) {?>
                        <tr>
                          <td class="font-weight-medium">
                            <?php echo $t->id_testimoni; ?>
                          </td>
                          <td>
                            <?php echo $t->id_kostumer_id; ?>
                          </td>
                          <td>
                            <a target="_blank" href="<?php echo base_url('/assets/images/'.$t->gambar); ?>"><img src="<?php echo base_url('/assets/images/'.$t->gambar); ?>"></a>
                          </td>
                          <td>
                            <?php echo $t->keterangan; ?>
                          </td>
                          <td>
                            <?php echo $t->id_produk_id; ?>
                          </td>
                          <td>
                            <?php echo $t->date; ?>
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
        
