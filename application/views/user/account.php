<?php 
$b=$data->row_array(); 
$cp=$pemb->row_array(); 
$cc=$conf->row_array(); 

?>

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
				<a href="<?php echo base_url()?>account" class="list-group-item list-group-item-action active">
					Dashboard
				</a>
				<a href="<?php echo base_url()?>account/transaksi" class="list-group-item list-group-item-action">Transaksi</a>
				<a href="<?php echo base_url()?>account/setting" class="list-group-item list-group-item-action">Setting</a>
				<a href="<?php echo base_url()?>account/portfolio" class="list-group-item list-group-item-action">Portfolio</a>
				<a href="<?php echo base_url()?>account/inbox" class="list-group-item list-group-item-action">Inbox</a>
			</div>
		</div>
		<div class="col-lg-9 col-xl-9 p-b-50 p-t-30">
			<div class="panel-group">
				<div class="panel panel-primary">
					<div class="panel-heading ">
						Welcome, <b><?php echo $b['user_nama']; ?></b>
						<span class="pull-right">
							<?php echo date("l, d-M-Y"); ?>
						</span>
						<div id="timediv" class="pull-right p-r-25"></div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<div class="alert alert-success alert-dismissible">
									<h4><i class="icon fa fa-info"></i> Info!</h4>
									<?php
									$gpoinplus=$poinplus->row_array();
									$gpoinmin=$poinmin->row_array();
									?>
									Poin anda saat ini adalah <span class="bg-primary">&nbsp;<?php echo $gpoinplus['jumpoinplus']-$gpoinmin['jumpoinmin']; ?>&nbsp;</span><br>
									<ul>
										<li>Anda bisa mendapatkan poin dengan syarat : </li>
										<li>Melakukan transaksi minimal Rp. 1.000.000 (satu juta rupiah) dan akan mendapatkan poin sebanyak 10 poin</li>
										<li>Anda dapat menggunakan poin anda saat transaksi untuk mengurangi biaya transaksi</li>
										<li>1 Poin = Rp. 1000</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="box box-default">

									<div class="box-body">

										<div class="alert alert-danger alert-dismissible">
											<h4><i class="icon fa fa-info"></i> Info!</h4>
											Anda Memiliki <?php echo $cp['cpemb']; ?> transaksi yang membutuhkan konfirmasi pembayaran
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="box box-default">

									<div class="box-body">

										<div class="alert alert-info alert-dismissible">
											<h4><i class="icon fa fa-info"></i> Info!</h4>
											Anda Memiliki <?php echo $cc['cconf']; ?>  transaksi yang masih atau sedang ditangguhkan.
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