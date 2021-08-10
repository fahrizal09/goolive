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
                        <h2 style="color: #1E7BCB;"> Laporan Pembelian Barang</h2><br>
                        <form action="<?= base_url() ?>Admin/Laporan/laporan_suplier" method="POST">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <select class="form-control" name="nama_suplier" id="sel_tahun">
                                        <!--<option value=''>-- Pilih Tahun --</option>-->
                                        <!-- <option value="0">Semua Suplier</option> -->
                                        <?php
                                        $nama = $this->db->get('suplier')->result();
                                        foreach ($nama as $r) { ?>
                                            <option value="<?= $r->nama_suplier ?>"> <?= $r->nama_suplier ?> </option><?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <select class="form-control" name="bulan" id="sel_bulan">
                                        <option value="0">Pilih Bulan</option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-success" type="submit">Cetak</button>
                                </div>
                            </div>
                        </form>
                        <div class="form-group col-md-12">
                            <!-- Name -->
                            <div class="col-md-2 ">
                                <h4></h4><br>

                            </div>
                        </div><br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id='userTable'>
                                <thead>
                                    <tr>
                                        <th>
                                            #Id Barang
                                        </th>
                                        <th>
                                            Nama Barang
                                        </th>
                                        <th>
                                            Suplier
                                        </th>
                                        <th>
                                            Tanggal Beli
                                        </th>
                                        <th>
                                            Jumlah Beli
                                            </th>
                                            <th>
                                                Harga
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

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
            return confirm("Apakah anda yakin ingin menghapus kategori?");
        }
    </script>
    <!-- Script -->
    <script type="text/javascript">
        $(document).ready(function() {
            var userDataTable = $('#userTable').DataTable({
                //   'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                //'searching': false, // Remove default Search Control
                'ajax': {
                    'url': '<?= base_url() ?>Admin/Laporan/barangList',
                    'data': function(data) {
                        data.searchNama = $('#sel_tahun').val();
                        data.searchBulan = $('#sel_bulan').val();
                        console.log(data);
                    }

                },
                'columns': [{
                        data: 'id_barang'
                    },
                    {
                        data: 'nama_barang'
                    },
                    {
                        data: 'nama_suplier'
                    },
                    {
                        data: 'tgl_masuk_barang'
                    },
                    {
                        data: 'stok_barang'
                    },
                    {
                        data: 'harga_beli'
                    }
                ]
            });

            $('#sel_tahun,#sel_bulan').change(function() {
                userDataTable.draw();
            });
            $('#searchName').keyup(function() {
                userDataTable.draw();
            });
        });
    </script>