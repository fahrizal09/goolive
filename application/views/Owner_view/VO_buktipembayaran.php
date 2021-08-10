<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 style="color: #1E7BCB;">Bukti Transfer</h2><br>

                  <?php foreach($bayar as $a) : ?>

                    <h1><?php echo $a->kode_pesan ?></h1>
                    

                    <div class="row">
  <div class="col-md-6">
<table class="table">

   
      <tr><th>ID bayar</th>
        <td><?php echo $a->id_bayar ?></td>
      </tr>
      <tr><th>Nama Pemilik</th>
        <td><?php echo $a->nama_pemilik ?></td>
      </tr>
      <tr><th>BANK</th>
        <td><?php echo $a->bank ?></td>
      </tr>
      
    </table>  

     <div>
       <img style="margin-bottom: 50px;" height="700px" width="500px" src="<?php echo base_url('./assets/images/'.$a->bukti_pembayaran); ?>">
     </div>
  





                  <?php endforeach; ?>
                  <br><br>
                
        <!-- content-wrapper ends -->
</div>
</div>
</div>
</div>