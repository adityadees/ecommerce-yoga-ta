 
<?php
$datenow=date('m/d/Y');
?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data <small>Laopran</small></h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <h2>Pilih Periode </h2>
            <form class="form-horizontal" action="" method="post">
              <fieldset>
                <div class="control-group">
                  <div class="col-md-3">
                    <div class="controls">
                      <div class="input-prepend input-group">
                        <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                        <input type="text" style="width: 200px" name="gdate" id="reservation" class="form-control" value="<?php echo $datenow; ?> - <?php echo $datenow; ?>" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <input type="submit" value="Submit"  name="submit" class="btn btn-primary">
                  </div>
                </div>
              </fieldset>
            </form>

            <hr>

            <?php
            if(isset($_POST['submit'])){
              $gdate=$_POST['gdate']; 

              $nex=(explode(" - ",$gdate));

              $date1=date('Y-m-d',strtotime($nex[0]))." 00:00:00";
              $date2=date('Y-m-d',strtotime($nex[1]))." 23:59:00";
              $kode=$date1." ".$date2;
              ?>

              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Total</th>
                    <th>Diskon</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  $gby=$this->m_padmin->get_laporan_by_date($date1,$date2);
                  foreach ($gby->result_array() as $i) :
                   $no++;
                   ?>
                   <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $i['cart_kode']; ?></td>
                    <td><?php echo $i['pemesanan_nama']; ?></td>
                    <td><?php echo $i['pemesanan_tel']; ?></td>
                    <td><?php echo "Rp. ".number_format($i['pemesanan_total']); ?></td>
                    <td><?php echo "Rp. ".number_format($i['pemesanan_diskon']); ?></td>
                    <td><?php echo date('d M Y H:i:s',strtotime($i['pemesanan_date'])); ?></td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>


            <a href="<?php echo base_url()?>print/<?php echo $kode; ?>" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-print"> Cetak Laporan</i></a>

            <?php 
          }
          else {

            ?>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Telepon</th>
                  <th>Total</th>
                  <th>Diskon</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=0;
                foreach ($data->result_array() as $i) :
                 $no++;
                 ?>
                 <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $i['cart_kode']; ?></td>
                  <td><?php echo $i['pemesanan_nama']; ?></td>
                  <td><?php echo $i['pemesanan_tel']; ?></td>
                  <td><?php echo "Rp. ".number_format($i['pemesanan_total']); ?></td>
                  <td><?php echo "Rp. ".number_format($i['pemesanan_diskon']); ?></td>
                  <td><?php echo date('d M Y H:i:s',strtotime($i['pemesanan_date'])); ?></td>
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>


          <a href="<?php echo base_url()?>print" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-print"> Cetak Laporan</i></a>

          <?php 
        }

        ?>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<script src="js/jquery-3.1.1.min.js"></script>
