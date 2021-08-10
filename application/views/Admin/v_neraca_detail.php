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
                        <h2 style="color: #1E7BCB;"> Neraca Saldo</h2><br>
                        <?php echo $this->session->flashdata('sukses'); ?>
                        <form action="<?= base_url() ?>Admin/Laporan/laporan_suplier" method="POST">
                            <div class="row">
                            </div>
                        </form>
                        <div class="form-group col-md-12">
                            <!-- Name -->
                            <div class="col-md-2 ">
                                <h4></h4><br>

                            </div>
                        </div><br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id='nilai'>
                                <thead>
                                    <tr>
                                        <th>
                                            No Akun
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($jurnal as $j) {
                                    ?>
                                        <tr>
                                            <td><?= $j->no_reff ?></td>
                                            <td><?= $j->nama_reff ?></td>
                                            <?php
                                            $this->db->select('SUM(saldo) as total');
                                            $this->db->where('jenis_saldo', '1');
                                            $this->db->where('no_reff', $j->no_reff);
                                            $debit = $this->db->get('transaksi')->row();

                                            $this->db->select('SUM(saldo) as total');
                                            $this->db->where('jenis_saldo', '2');
                                            $this->db->where('no_reff', $j->no_reff);
                                            $kredit = $this->db->get('transaksi')->row();

                                            $total = $debit->total - $kredit->total;
                                            $total2 = $kredit->total;
                                            if ($debit->total > $kredit->total) {
                                            ?>
                                                <td><?= $total ?></td>
                                                <td>0</td>
                                            <?php } else { ?>
                                                <td>0</td>
                                                <td><?= $total2 ?></td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>




                                </tbody>

                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td colspan="3" class="text-center"><b>Jumlah Total</b></td>
                                        <td><b>
                                                <span id="hasil"></span>
                                        </td> </b>
                                        <td><b>
                                                <span id="hasil2"></span>
                                        </td> </b>

                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <td style="background-color: #1E7BCB;"><b>
                                            <p style="text-align: center; color:aliceblue" id="hasil3"></p>
                                    </td> </b>
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

    <script>
        var table = document.getElementById("nilai"),
            sumHsl = 0,
            sumHs2 = 0;
        for (var t = 1; t < table.rows.length; t++) {
            sumHsl = sumHsl + parseInt(table.rows[t].cells[2].innerHTML);
            sumHs2 = sumHs2 + parseInt(table.rows[t].cells[3].innerHTML);

        }
        if (sumHsl = sumHs2) {
            document.getElementById("hasil3").innerHTML = "SEIMBANG";
        } else {
            document.getElementById("hasil3").innerHTML = "TIDAK SEIMBANG";
        }
        document.getElementById("hasil").innerHTML = "Rp. " + sumHsl;
        document.getElementById("hasil2").innerHTML = "Rp. " + sumHs2;
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            // Format mata uang.
            $('.uang').mask('000.000.000', {
                reverse: true
            });

        })
    </script>
    <script type="text/javascript">
        function confirm_alert(node) {
            return confirm("Apakah anda yakin ingin menghapus kategori?");
        }
    </script>
    <!-- Script -->