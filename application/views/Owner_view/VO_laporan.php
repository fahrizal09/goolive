<!-- partial -->
      <div class="main-panel" id="print">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                	<div style="text-align:justify;">
                	
                		<!-- <img src="<?php echo base_url('assets/images/Emarket2.png'); ?>" style="float:right; margin:0 20px 4px 0; width:10%" /> -->
                		
                		<h3>Laporan Penjualan<br>
					  	<p>Jl. MAnggar No.71 68172 Jember</p>
					  	
					</div>
					  <hr><br>

					  <p>Perihal : Laporan penjualan<br>Tanggal : <?php 
					  date_default_timezone_set('Asia/Jakarta');
					  echo date('d-m-Y'); ?></p>
					  <br>
					  <div style="float: right;padding-left: 100px;">
					  	<form action="<?php echo base_url('Owner_controller/O_laporan/sort'); ?>" method="post">
					  		Sort by :
						  <select name="bulan" style="height: 30px;" required="required">
						  	<option value="">-Pilih Bulan-</option>
						  	<option value="13">All</option>
						  	<option value="01">Januari</option>
						  	<option value="02">Februari</option>
						  	<option value="03">Maret</option>
						  	<option value="04">April</option>
						  	<option value="05">Mei</option>
						  	<option value="06">Juni</option>
						  	<option value="07">Juli</option>
						  	<option value="08">Agustus</option>
						  	<option value="09">September</option>
						  	<option value="10">Oktober</option>
						  	<option value="11">November</option>
						  	<option value="12">Desember</option>
						  </select> 
						  <input type="submit" value="Sort">
						 </form><br>
					  </div>            
					  <table class="table table-striped">
					    <thead >
					      <tr>
					        <th>Kode Pesan</th>
					        <th>Nama pembeli</th>
					        <th>Tanggal pesan</th>
					        <th>Status</th>
					        <th>Total harga</th>
					      </tr>
					    </thead>
					    <tbody>
					    <?php foreach($pesan as $a){ ?>
					      <tr>
					        <td><?php echo $a->id_pesan; ?></td>
					        <td><?php echo $a->nama_pengirim; ?></td>
					        <td><?php echo $a->tanggal_pesan; ?></td>
					        <td><?php echo $a->status; ?></td>
					        <td>Rp <?php $format_indonesia = number_format ($a->total_pesan, 0, ',', '.');
                          echo $format_indonesia; ?></td>
					      </tr>
					     <?php } ?>
					    </tbody>
					  </table><br>
					  <button style="float: right;margin-right: 30px; " onclick="printContent('print')">Print</button>
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

<script>
	function printContent(el){
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById(el).innerHTML;
		document.body.innerHTML = printcontent;
		window.print();
		document.body.innerHTML = restorepage;
	}
	</script>