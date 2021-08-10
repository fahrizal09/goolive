<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h2 style="color: #1E7BCB;"> Tambah Jurnal Umum</h2><br>
                        <form action="<?= base_url() ?>Admin/Laporan/tambahJurnal" method="POST">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Tanggal </label>
                                    <input class="form-control" id="datepicker" required name="tgl_transaksi" type="date">
                                </div>
                            </div>

                            <div class="row mb-4">

                                <div class="col">
                                    <label for="no_reff">Nama Akun</label>
                                    <select id="jenis_saldo" required class="form-control" name="no_reff">
                                        <option>--Pilih Akun--</option>
                                        <?php

                                        $data = $this->db->get('akun')->result();
                                        foreach ($data as $d) {

                                        ?>
                                            <option value="<?= $d->no_reff ?>"><?= $d->nama_reff ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="jenis_saldo">Jenis Saldo</label>

                                    <select class="form-control" required name="jenis_saldo" id="akun">
                                        <option>--Pilih Jenis Saldo--</option>
                                        <?php
                                        $data =  $this->db->get('jenis_saldo')->result();
                                        foreach ($data as $d) {
                                        ?>
                                            <option value="<?= $d->id_jenis ?>"> <?= $d->nama_saldo ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="col">
                                    <label for="saldo">Saldo</label>
                                    <input required class="form-control" name="saldo">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-success" type="submit">Tambah Jurnal</button>
                            </div>
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
            return confirm("Apakah anda yakin ingin menghapus kategori?");
        }
    </script>