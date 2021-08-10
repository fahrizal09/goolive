<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 style="color: #1E7BCB;">Detail Pesanan</h2><br>

                
                    

                    <div class="row">
  <div class="col-md-12">
<table class="table">

<?php foreach($pesanan as $a) { ?>
   
      <tr><th>Id pesanan</th>
        <td> <?= $a->id_pesan ?> </td>
      </tr>
      <tr><th>Jenis Pesanan</th>
        <td><?= $a->nama_kategori ?> </td>
      </tr>
      <tr><th>Kode Produk</th>
        <td><?= $a->id_produk ?></td>
      </tr>
       <tr><th>Jumlah</th>
        <td><?= $a->jumlah ?></td>
      </tr>
      <tr><th>Total</th>
        <td><?= $a->total_pesan ?></td>
      </tr>
       <tr><th>Gambar</th>  </tr>
       
       
      </table>  
      <div class="centered">
        <td><img style="margin-right: 20px;" height="250px" width="250px" src="<?php echo base_url('./assets/images/samping2/'.$a->gambar2); ?>" /></td>
        <td><img style="margin-right: 20px;" height="250px" width="250px" src="<?php echo base_url('./assets/images/depan/'.$a->gambar); ?>" /></td>
        <td><img height="250px" width="250px" src="<?php echo base_url('./assets/images/samping3/'.$a->gambar3); ?>" /></td>
        
      </div>
    <?php }?>
  





                 
                  <br><br>
                
        <!-- content-wrapper ends -->
</div>
</div>
</div>
</div>