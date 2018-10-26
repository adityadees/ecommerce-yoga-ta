<?php $b=$data->row_array(); ?>

<div style="margin-top: 100px"></div>
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="<?php echo base_url()?>" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			My Account
		</span>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-3 col-xl-3 p-b-50 p-t-30">
			<div class="list-group">
				<a href="<?php echo base_url()?>account" class="list-group-item list-group-item-action">Dashboard</a>
				<a href="<?php echo base_url()?>account/transaksi" class="list-group-item list-group-item-action active">Transaksi</a>
				<a href="<?php echo base_url()?>account/setting" class="list-group-item list-group-item-action">Setting</a>
				<a href="<?php echo base_url()?>account/portfolio" class="list-group-item list-group-item-action">Portfolio</a>
				<a href="<?php echo base_url()?>account/inbox" class="list-group-item list-group-item-action">Inbox</a>
			</div>
		</div>
		<div class="col-lg-9 col-xl-9 p-b-50 p-t-30">
			<div class="panel-group">
				<div class="panel panel-info">
					<div class="panel-heading ">
						Welcome, <b><?php echo $b['user_nama']; ?></b>
						<span class="pull-right">
							<?php echo date("l, d-M-Y"); ?>
						</span>
						<div id="timediv" class="pull-right p-r-25"></div>
					</div>
					<div class="panel-body">

						<div class="col-md-12">
							<h3>Data Transaksi</h3>
							<hr>
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab">Data Transaksi</a></li>
									<li><a href="#tab_2" data-toggle="tab">Menunggu Pembayaran</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1">
										<table class="table table-hover">
											<tr>
												<th>Kode</th>
												<th>Total</th>
												<th>Status</th>
											</tr>

											<?php foreach ($trnscorm->result_array() as $i) : ?>
												<tr>
													<td><?php echo $i['cart_kode']; ?></td>
													<td><?php echo "Rp. ".number_format($i['pemesanan_total']); ?></td>
													<td><?php echo $i['pemesanan_status']; ?></td>

												</tr>
											<?php endforeach; ?>
										</table>
									</div>
									<div class="tab-pane" id="tab_2">

										<table class="table table-hover">
											<tr>
												<th>Kode</th>
												<th>Total</th>
												<th>Status</th>
												<th></th>
											</tr>

											<?php foreach ($trans->result_array() as $i) : ?>
												<tr>
													<td><?php echo $i['cart_kode']; ?></td>
													<td><?php echo "Rp. ".number_format($i['pemesanan_total']); ?></td>
													<td><?php echo $i['cart_status']; ?></td>
													<td>	
														<li class="dropdown">
															<a class="dropdown-toggle" data-toggle="dropdown" href="#">
																Aksi
															</a>
															<ul class="dropdown-menu">
																<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url()?>konfirmasi/<?php echo $i['cart_kode']; ?>">Konfirmasi</a></li>
																<li role="presentation">
																	<a data-toggle="modal" data-target="#KonfirmasiModal<?php echo $i['cart_kode'];?>">Batal</a></li>
																</ul>
															</li>
														</td>
													</tr>
												<?php endforeach; ?>
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


	<?php foreach ($trans->result_array() as $i) :
		?>
		<div class="modal fade" id="KonfirmasiModal<?php echo $i['cart_kode'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script type="text/javascript">
	var interval = setInterval(timestamphome, 1000);
	function timestamphome(){
		var date;
		date = new Date();
		var time = document.getElementById('timediv'); 
		time.innerHTML = date.toLocaleTimeString();
	}
</script>