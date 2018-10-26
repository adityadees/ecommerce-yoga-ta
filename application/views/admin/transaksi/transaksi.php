  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><i class="fa fa-bars"></i> Transaksi <small>Data Transaksi</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Transaksi</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Transaksi Progress</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Kode</th>
                          <th>User</th>
                          <th>Biaya</th>
                          <th>Pesan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no=0;
                        foreach ($data->result_array() as $i) :
                         $no++;
                         ?>
                         <tr>
                          <td><a href="<?php echo base_url()?>invoice/<?php echo $i['cart_kode']; ?>"><?php echo $i['cart_kode']; ?></a></td>
                          <td><?php echo $i['user_username']; ?></td>
                          <td><?php echo "Rp. ".number_format($i['pemesanan_total']); ?></td>
                          <td><?php echo $i['pemesanan_status']; ?></td>
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                  <div class="col-md-6">
                    <h3>Menunggu Konfirmasi</h3>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Kode</th>
                          <th>User</th>
                          <th class="text-center">File</th>
                          <th class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no=0;
                        foreach ($conf->result_array() as $i) :
                         $no++;
                         ?>
                         <tr>
                          <td><?php echo $i['cart_kode']; ?></td>
                          <td><?php echo $i['user_username']; ?></td>
                          <td class="text-center"> 
                            <a class="btn btn-primary" href="<?php echo base_url()?>padmin/download/<?php echo $i['pembayaran_id'];?>">
                              <i class="fa fa-download"></i>
                            </a>
                          </td>
                          <td class="text-center">
                            <a class="btn btn-success" data-toggle="modal" data-target="#KonfirmasiModal<?php echo $i['pemesanan_id'];?>"><i class="fa fa-check"></i></a>
                          </td>
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <h3>Menunggu Pembayaran</h3>
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Kode</th>
                        <th>User</th>
                        <th>Biaya+Ship</th>
                        <th>Pesan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=0;
                      foreach ($pending->result_array() as $i) :
                       $no++;
                       ?>
                       <tr>
                        <td><?php echo $i['cart_kode']; ?></td>
                        <td><?php echo $i['user_username']; ?></td>
                        <td><?php echo "Rp. ".number_format($i['pemesanan_total']); ?></td>
                        <td><?php echo $i['cart_message']; ?></td>
                      </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Shipping</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Kode</th>
                          <th>User</th>
                          <th>Biaya</th>
                          <th class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no=0;
                        foreach ($ship->result_array() as $i) :
                         $no++;
                         ?>
                         <tr>
                          <td><?php echo $i['cart_kode']; ?></td>
                          <td><?php echo $i['user_username']; ?></td>
                          <td><?php echo "Rp. ".number_format($i['cart_total']); ?></td>
                          <td class="text-center">    
                            <a class="btn btn-success" data-toggle="modal" data-target="#KonfirmasiModal2<?php echo $i['pemesanan_id'];?>"><i class="fa fa-check"></i></a>
                          </td>
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
</div>
</div>


<?php foreach ($conf->result_array() as $i) :
  ?>
  <div class="modal fade" id="KonfirmasiModal<?php echo $i['pemesanan_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Konfirmasi Transaksi</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/konfirmasi_trans'?>" method="post" >
          <div class="modal-body">       
           <input type="hidden" name="kode" value="<?php echo $i['cart_kode'];?>"/> 
           <p>Apakah anda yakin ingin mengkonfirmasi pemesanan dengan kode <b><?php echo $i['cart_kode'];?> ?</b> ?</p>

         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-flat" id="simpan">Setuju</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>


<?php foreach ($ship->result_array() as $i) :
  ?>
  <div class="modal fade" id="KonfirmasiModal2<?php echo $i['pemesanan_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Konfirmasi Transaksi Selesai</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/konfirmasi_selesai'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">       
            <div class="form-group">
              <input type="text" name="kode" value="<?php echo $i['cart_kode'];?>" class="form-control" readonly> 
              <input type="hidden"  name="pemesanan_id" value="<?php echo $i['pemesanan_id'];?>" class="form-control" readonly> 
              <input type="hidden"  name="user_id" value="<?php echo $i['user_id'];?>" class="form-control" readonly> 
            </div>

            <div class="form-group">
              <span>Message :</span>
              <textarea class="form-control" name="message"></textarea>
            </div> 
            <div class="form-group">
              <span>File :</span>
              <input type="file" name="filefoto" class="form-control" required="required">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Setuju</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach;?>

<script src="js/jquery-3.1.1.min.js"></script>
