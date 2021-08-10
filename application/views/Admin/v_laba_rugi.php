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
                        <h2 style="color: #1E7BCB;"> Laba Rugi</h2><br>
                        <?php echo $this->session->flashdata('sukses'); ?>
                        <div class="col-md-12 row">
                            <form class="col-md-4" action="<?= base_url() ?>Admin/Laporan/laporan_suplier" method="POST">
                                <div class="">
                                    <select class="form-control" name="nama_suplier" id="sel_tahun">
                                        <!--<option value=''>-- Pilih Tahun --</option>-->
                                        <!-- <option value="0">Semua Suplier</option> -->
                                        <?php
                                        foreach ($jurnal as $j) {
                                            $bulan = date('m', strtotime($j->tgl_transaksi));
                                            $tahun = date('Y', strtotime($j->tgl_transaksi));
                                        ?>
                                            <option value="<?= $tahun ?>"> <?= $tahun ?> </option><?php } ?>
                                    </select>
                                </div>
                            </form>

                        </div>


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
                                            No
                                        </th>
                                        <th>
                                            Bulan dan Tahun
                                        </th>
                                        <th>
                                            Action
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
                    'url': '<?= base_url() ?>Admin/Laporan/labaList',
                    'data': function(data) {
                        data.searchTahun = $('#sel_tahun').val();
                        // data.searchBulan = $('#sel_bulan').val();
                        console.log(data);
                    }

                },
                'columns': [{
                        data: 'no'
                    },
                    {
                        data: 'bulan'
                    },
                    {
                        data: 'action'
                    }
                ]
            });

            $('#sel_tahun').change(function() {
                userDataTable.draw();
            });
            $('#searchName').keyup(function() {
                userDataTable.draw();
            });
        });
    </script>