<?php
$aa=$cselesai->row_array(); 
$bb=$cmenunggu->row_array(); 
$dd=$ckonfirm->row_array(); 
$ee=$ctop->row_array(); 
?>
<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-12">
      <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12 text-danger">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-clock-o text-danger"></i></div>
          <div class="count"><?php echo $bb['cmenunggu']; ?></div>
          <h3>Menunggu </h3>
          <p>Pembayaran</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12 text-info">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-cart-arrow-down text-info"></i></div>
          <div class="count"><?php echo $dd['ckonf']; ?></div>
          <h3>Membutuhkan</h3>
          <p>Konfirmasi</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12 text-success">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-check text-success"></i></div>
          <div class="count"><?php echo $aa['cselesai']; ?></div>
          <h3>Transaksi</h3>
          <p>Selesai</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="col-md-6">
        <div class="x_panel">
          <div class="x_title">
            <h2>Top Transaksi</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <?php  foreach ($ctop->result_array() as $i) :  ?>
              <article class="media event">
                 <a class="pull-left border-aero profile_thumb img-responsive">
                  <img src="<?php echo base_url().'assets/images/'.$i['user_foto'];?>"  class="img-circle" style="width:45px">
                  <i class="fa fa-user aero"></i>
                </a>
                <div class="media-body">
                  <a class="title" href="#"><?php echo $i['user_username']; ?></a>
                  <p>(Total Transaksi)</p>
                  <p><?php echo $i['cuser']."x Transaksi"; ?></p>
                </div>
              </article>
            <?php endforeach;?>

          </div>
        </div>
      </div>


      <div class="col-md-6">
        <div class="x_panel">
          <div class="x_title">
            <h2>Top Price</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <?php  foreach ($cbiaya->result_array() as $i) :  ?>
              <article class="media event">
                <a class="pull-left border-aero profile_thumb img-responsive">
                  <img src="<?php echo base_url().'assets/images/'.$i['user_foto'];?>"  class="img-circle" style="width:45px">
                  <i class="fa fa-user aero"></i>
                </a>
              <div class="media-body">
                <a class="title" href="#"><?php echo $i['user_username']; ?></a>
                <p><?php echo "(Total Biaya)<br>Rp. ".number_format($i['sumbiaya']); ?></p>
              </div>
            </article>
          <?php endforeach;?>

        </div>
      </div>
    </div>



  </div>

</div>
</div>
