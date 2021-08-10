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
                        <h2 style="color: #1E7BCB;"> Buku Besar</h2><br>
                        <?php echo $this->session->flashdata('sukses'); ?>
                        <div class="col-md-12 row">
                            <form class="col-md-4" action="<?= base_url() ?>Admin/Laporan/laporan_suplier" method="POST">
                                <div class="">
                                    <select class="form-control" name="nama_suplier" id="sel_reff">
                                        <?php
                                        $this->db->group_by('akun.no_reff');
                                        $this->db->join('transaksi', 'transaksi.no_reff=akun.no_reff', 'right');
                                        $data = $this->db->get('akun')->result();
                                        foreach ($data as $j) {

                                        ?>
                                            <option value="<?= $j->no_reff ?>"> <?= $j->nama_reff ?> </option><?php } ?>
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
                                            Nama Akun
                                        </th>
                                        <th>
                                            Debit
                                        </th>
                                        <th>
                                            Kredit
                                        </th>
                                        <th>
                                            Total
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

    <script type="text/javascript">
        $(document).ready(function() {
            var userDataTable = $('#userTable').DataTable({
                //   'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                //'searching': false, // Remove default Search Control
                'ajax': {
                    'url': '<?= base_url() ?>Admin/Laporan/reffList',
                    'data': function(data) {
                        data.searchReff = $('#sel_reff').val();
                        // data.searchBulan = $('#sel_bulan').val();
                        console.log(data);
                    }

                },
                'columns': [{
                        data: 'no'
                    },
                    {
                        data: 'keterangan'
                    },
                    {
                        data: 'debit'
                    },
                    {
                        data: 'kredit'
                    },
                    {
                        data: 'total'
                    }

                ]
            });


            $('#sel_reff').change(function() {
                userDataTable.draw();
            });
            $('#searchName').keyup(function() {
                userDataTable.draw();
            });
        });
    </script>