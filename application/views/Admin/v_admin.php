<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h2 style="color: #1E7BCB;">Daftar Admin</h2><br>
            <div class="table-responsive"><br>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>
                      #Id User
                    </th>
                    <th>
                      Username
                    </th>
                    <th>
                      Aksi
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($admin as $a) { ?>
                    <tr>
                      <td class="font-weight-medium">
                        <?php echo $a->id_admin; ?>
                      </td>
                      <td>
                        <?php echo $a->username; ?>
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