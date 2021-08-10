<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
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
                            <?php
                            $this->db->order_by('no_reff', 'DESC');
                            $reff = $this->db->get('akun')->row();
                            $str = str_split($reff->no_reff);
                            ?>
                            <label>Id Reff</label>
                            <input name="no_reff" readonly class="form-control" value="r<?= $str[1] + 1 ?>">
                            <label>Nama Reff</label>
                            <input name="nama_reff" class="form-control">
                            <label>Keterangan Reff</label>
                            <textarea name="keterangan_reff" class="form-control"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Tambah</button>

                        </div>
                    </form>
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