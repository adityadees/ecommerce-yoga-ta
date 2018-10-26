<?php $b=$data->row_array(); ?>

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Invoice Order</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <section class="content invoice">
              <!-- title row -->
              <div class="row">
                <div class="col-xs-12 invoice-header">
                  <h1>
                    <i class="fa fa-globe"></i> Invoice.
                    <small class="pull-right">Date:   <?php echo date('d/m/Y', strtotime($b['pemesanan_date'])); ?></small>
                  </h1>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong><?php echo $b['user_nama']; ?></strong>
                    <br><?php echo $b['user_alamat']; ?>
                    <br>Phone: <?php echo $b['user_tel']; ?>
                    <br>Email: <?php echo $b['user_email']; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?php echo $b['pemesanan_nama']; ?></strong>
                    <br><?php echo $b['ongkir_provinsi']; ?>
                    <br><?php echo $b['pemesanan_kota']; ?>
                    <br><?php echo $b['pemesanan_alamat']; ?>
                    <br>Phone: <?php echo $b['pemesanan_tel']; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #<?php echo $b['cart_kode']; ?></b>
                  <br>
                  <br>
                  <b>Order ID:</b> <?php echo $b['user_username']; ?>
                  <br>
                  <b>Type:</b> <?php echo $b['type_nama']; ?>
                  <br>
                  <b>Shape:</b> <?php echo $b['shape_nama']; ?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-xs-12 table">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Nama</th>
                        <th>Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $bkode = $b['barang_kode'];
                      $brg =  explode(',', $bkode);
                      ?>

                      <?php
                      $no=0;
                      foreach ($brg as $item) {
                        $no++;
                        $gbrgkode=$this->m_padmin->get_brg_by_kode($item);
                        $cg=$gbrgkode->row_array();
                        ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $cg['barang_kode']; ?></td>
                          <td><?php echo $cg['barang_nama']; ?></td>
                          <td><?php echo "Rp. ".number_format($cg['barang_harga']); ?></td>
                        </tr>
                      <?php } 
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                  <p class="lead">Pesan:</p>
                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    <?php echo $b['pemesanan_message']; ?>
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th style="width:50%">Subtotal:</th>
                          <td><?php echo "Rp. ".number_format($b['cart_total']); ?></td>
                        </tr>
                        <tr>
                          <th>Ongkir:</th>
                          <td><?php echo "Rp. ".number_format($b['ongkir_biaya']); ?></td>
                        </tr>
                        <tr>
                          <th>Total:</th>
                          <td><?php echo "Rp. ".number_format($b['pemesanan_total']); ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="row no-print">
                <div class="col-xs-12">
                  <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
