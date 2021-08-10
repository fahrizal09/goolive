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
                        <h2 style="color: #1E7BCB;"> Laporan Penjualan Barang</h2><br>
                        <form action="<?= base_url() ?>Admin/Laporan/laporan_penjualan" method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" name="tahun" id="sel_tahun" required>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control" name="bulan" id="sel_bulan">
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
                                            Tanggal Checkout
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
                    'url': '<?= base_url() ?>Admin/Laporan/penjualanList',
                    'data': function(data) {
                        data.searchBulan = $('#sel_bulan').val();
                        data.searchTahun = $('#sel_tahun').val();
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
                        data: 'tgl_masuk_barang'
                    },
                    {
                        data: 'harga_beli'
                    },
                    {
                        
                        data: 'stok_barang'
                    }
                ]
            });

            $('#sel_bulan,#sel_tahun').change(function() {
                userDataTable.draw();
            });
            $('#searchName').keyup(function() {
                userDataTable.draw();
            });
        });
    </script>