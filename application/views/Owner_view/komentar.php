<!-- Pagination css bootstrap -->
<link rel="icon" href="<?= base_url() ?>vendor/mebel/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/mebel/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/mebel/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/mebel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/mebel/css/lightslider.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/mebel/css/nice-select.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/mebel/css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/mebel/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/mebel/css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/mebel/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/mebel/css/slick.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/mebel/css/price_rangs.css">
    <!-- style CSS -->
<style type="text/css">.pagination{display:inline-block;padding-left:0;margin:20px 0;border-radius:4px}.pagination>li{display:inline}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.428571429;text-decoration:none;background-color:#fff;border:1px solid #ddd}.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-bottom-left-radius:4px;border-top-left-radius:4px}.pagination>li:last-child>a,.pagination>li:last-child>span{border-top-right-radius:4px;border-bottom-right-radius:4px}.pagination>li>a:hover,.pagination>li>span:hover,.pagination>li>a:focus,.pagination>li>span:focus{background-color:#eee}.pagination>.active>a,.pagination>.active>span,.pagination>.active>a:hover,.pagination>.active>span:hover,.pagination>.active>a:focus,.pagination>.active>span:focus{z-index:2;color:#fff;cursor:default;background-color:#428bca;border-color:#428bca}.pagination>.disabled>span,.pagination>.disabled>span:hover,.pagination>.disabled>span:focus,.pagination>.disabled>a,.pagination>.disabled>a:hover,.pagination>.disabled>a:focus{color:#999;cursor:not-allowed;background-color:#fff;border-color:#ddd}.pagination-lg>li>a,.pagination-lg>li>span{padding:10px 16px;font-size:18px}.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span{border-bottom-left-radius:6px;border-top-left-radius:6px}.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span{border-top-right-radius:6px;border-bottom-right-radius:6px}.pagination-sm>li>a,.pagination-sm>li>span{padding:5px 10px;font-size:12px}.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{border-bottom-left-radius:3px;border-top-left-radius:3px}.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{border-top-right-radius:3px;border-bottom-right-radius:3px}.pager{padding-left:0;margin:20px 0;text-align:center;list-style:none}.pager:before,.pager:after{display:table;content:" "}.pager:after{clear:both}.pager:before,.pager:after{display:table;content:" "}.pager:after{clear:both}.pager li{display:inline}.pager li>a,.pager li>span{display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px}.pager li>a:hover,.pager li>a:focus{text-decoration:none;background-color:#eee}.pager .next>a,.pager .next>span{float:right}.pager .previous>a,.pager .previous>span{float:left}.pager .disabled>a,.pager .disabled>a:hover,.pager .disabled>a:focus,.pager .disabled>span{color:#999;cursor:not-allowed;background-color:#fff}.label{display:inline;padding:.2em .6em .3em;font-size:75%;font-weight:bold;line-height:1;color:#fff;text-align:center;white-space:nowrap;vertical-align:baseline;border-radius:.25em}.label[href]:hover,.label[href]:focus{color:#fff;text-decoration:none;cursor:pointer}</style>
    <link rel="stylesheet" href="<?= base_url() ?>vendor/mebel/css/style.css">

<!-- menampilkan data user -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                 <h2 style="color: #1E7BCB;">Komentar</h2><br>
                 <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <div class="row">
            <div class="col-lg-12">
              <div class="comment_list"  >
              <?php 
     foreach($komentar as $a) : ?>
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img src="<?= base_url() ?>vendor/mebel/img/product/single-product/review-1.png" alt="" />
                    </div>
                    <div class="media-body" id="show">
                      <h4><?php echo $a->nama_kostumer ?></h4>
                      <h5><?php echo $a->date ?></h5>
                      <a class="reply_btn" data-toggle="modal" data-target="#modal-edit<?= $a->id_komentar; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">Balas Komentar</a>
                    </div>
                  </div>
                  <p>
                  <?php echo $a->komentar ?>
                  </p>
                </div>
                <?php
                $komen_id=$a->id_komentar;
                $query= $this->db->query("SELECT * FROM komentar  WHERE komen_status='$komen_id'")->result();
               
                 foreach($query as $balas) : ?>
                <div class="review_item reply">
                  <div class="media">
                    <div class="d-flex">
                      <img src="<?= base_url() ?>vendor/mebel/img/product/single-product/review-2.png" alt="" />
                    </div>
                    <div class="media-body">
                      <h4><?php 
                      $id=$balas->id_kostumer_id; 
                      $query2= $this->db->query("SELECT * FROM kostumer  WHERE id_kostumer='$id'")->num_rows();
                      $query3= $this->db->query("SELECT * FROM kostumer  WHERE id_kostumer='$id'")->result();
                      if($query2 === 0){
                          echo "Admin Lumintu Mebel";
                      }else{
                        foreach($query3 as $a){
                          echo $a->nama_kostumer;
                        }
                      }
                       ?></h4>
                      <h5><?php echo $balas->date; ?></h5>
                    </div>
                  </div>
                  <p>
                    <?php echo $balas->komentar ?>
                  </p>
                </div>
          <?php endforeach; ?>
        <?php endforeach; ?>
        <?php $no=0; foreach($komentar as $row): $no++; ?>
                <div class="row">
                 <div id="modal-edit<?=$row->id_komentar;?>" class="modal fade">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Balas Komentar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                           
                            <div class="modal-body">
                                <form action="<?php echo base_url('Dashboard/simpan_komentar') ?>" method="post" enctype="multipart/form-data">
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                        <input type="hidden" style="border-radius: 10px;" name="komen_status" class="form-control" id="id_login" value="<?php echo $row->id_komentar; ?>" placeholder="Nama Penanggung Jawab" required>
                                        <input type="hidden" style="border-radius: 10px;" name="id_produk_id" class="form-control" id="id_gtk" value="<?php echo $row->id_produk_id;  ?>" placeholder="Nama Penanggung Jawab" required>
                                        <input type="hidden" style="border-radius: 10px;" name="id_kostumer_id" class="form-control" id="id_gtk" value="0" placeholder="Nama Penanggung Jawab" required>
                                        <input type="hidden" style="border-radius: 10px;" name="date" class="form-control" id="id_gtk" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y H:i:s') ?>" placeholder="Nama Penanggung Jawab" required>
                                            
                                            <textarea  name="komentar" class="form-control"></textarea>
                                        </div>
                                    </div>
                                  
                                   
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" value="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
           
            </div>
          </div>
                </div>
              </div>
            </div>
          </div>


        </div>
        <script src="<?= base_url() ?>vendor/mebel/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="<?= base_url() ?>vendor/mebel/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="<?= base_url() ?>vendor/mebel/js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="<?= base_url() ?>vendor/mebel/js/jquery.magnific-popup.js"></script>
    <script src="<?= base_url() ?>vendor/mebel/js/lightslider.min.js"></script>
    <!-- swiper js -->
    <script src="<?= base_url() ?>vendor/mebel/js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="<?= base_url() ?>vendor/mebel/js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="<?= base_url() ?>vendor/mebel/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>vendor/mebel/js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="<?= base_url() ?>vendor/mebel/js/slick.min.js"></script>
    <script src="<?= base_url() ?>vendor/mebel/js/swiper.jquery.js"></script>
    <script src="<?= base_url() ?>vendor/mebel/js/jquery.counterup.min.js"></script>
    <script src="<?= base_url() ?>vendor/mebel/js/waypoints.min.js"></script>
    <script src="<?= base_url() ?>vendor/mebel/js/contact.js"></script>
    <script src="<?= base_url() ?>vendor/mebel/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?= base_url() ?>vendor/mebel/js/jquery.form.js"></script>
    <script src="<?= base_url() ?>vendor/mebel/js/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>vendor/mebel/js/stellar.js"></script>
    <script src="<?= base_url() ?>vendor/mebel/js/mail-script.js"></script>
    <script src="<?= base_url() ?>vendor/mebel/js/price_rangs.js"></script>
  <!-- custom js -->
  <script src="<?= base_url() ?>vendor/mebel/js/theme.js"></script>
  <script src="<?= base_url() ?>vendor/mebel/js/custom.js"></script>
        <!-- content-wrapper ends -->
