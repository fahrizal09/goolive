<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row col-md-12">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-book text-danger icon-lg"></i>
              </div>
              <div class="float-right">
                <h4 class="mb-0 text-right">Jurnal Umum</h4>
                <div class="fluid-container">
                  </h4>
                </div>
              </div>
            </div>
            <a class="btn btn-danger" href="<?= base_url() ?>Admin/Laporan/jurnal" style="float: right; font-size:12px;">Lihat</a>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-receipt text-warning icon-lg"></i>
              </div>
              <div class="float-right">
                <h4 class="mb-0 text-right">Neraca Saldo</h4>
                <div class="fluid-container">
                  <h3 class="font-weight-medium text-right mb-0"></h3>
                </div>
              </div>
            </div>
            <a class="btn btn-warning" href="<?= base_url() ?>Admin/Laporan/neraca_saldo" style="float: right; font-size:12px;">Lihat</a>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-book-multiple text-info icon-lg"></i>
              </div>
              <div class="float-right">
                <h4 class="mb-0 text-right">Buku Besar</h4>
                <div class="fluid-container">
                  <hp class="font-weight-medium text-right mb-0"></hp>
                </div>
              </div>
            </div>
            <a class="btn btn-info" href="<?= base_url() ?>Admin/Laporan/buku_besar" style="float: right; font-size:12px;">Lihat</a>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-scale-balance text-success icon-lg"></i>
              </div>
              <div class="float-right">
                <h4 class="mb-0 text-right">Laba Rugi</h4>
                <div class="fluid-container">
                  <h3 class="font-weight-medium text-right mb-0"></h3>
                </div>
              </div>
            </div>
            <a class="btn btn-success" href="<?= base_url() ?>Admin/Laporan/laba_rugi" style="float: right; font-size:12px;">Lihat</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row col-md-12 ">
      <div class="col-lg-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h2 style="color: #1E7BCB;">Data Akun</h2><br>
            <?php echo $this->session->flashdata('sukses'); ?>
            <div class="col-md-4">
              <button data-toggle="modal" data-target="#modalAkun" class="btn btn-success" type="submit">Tambah Akun</button>
            </div>
            <div class="table-responsive"><br>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>
                      No
                    </th>
                    <th>
                      Id Reff
                    </th>
                    <th>
                      Nama Reff
                    </th>
                    <th>
                      Keterangan Reff
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($akun as $a) { ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $a->no_reff ?></td>
                      <td><?= $a->nama_reff ?></td>
                      <td><?= $a->keterangan_reff ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="<?= base_url() ?>Admin/Admin/tambahAkun">
            <div class="modal-body">
              <label>Id Reff</label>
              <input name="no_reff" required class="form-control">
              <label>Nama Reff</label>
              <input name="nama_reff" required class="form-control">
              <label>Keterangan Reff</label>
              <textarea name="keterangan_reff" required class="form-control"></textarea>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Tambah</button>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- content-wrapper ends -->
<script type="text/javascript">
  var rupiah = document.getElementById('rupiah');
  rupiah.addEventListener('keyup', function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, 'Rp. ');
  });

  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split = number_string.split(','),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
</script>

<!-- Pop up -->
<script type="text/javascript">
  function confirm_alert(node) {
    return confirm("Apakah anda yakin ingin mengganti status menjadi terbayar?");
  }
</script>