<?php $b=$data->row_array(); ?>
<style type="text/css">
.btn-primary {
	background-color: #E7A331;
	color: #ffffff;
	border: 2px solid #E7A331;
	text-transform: uppercase;
	border-radius: 4px;
}
.btn-primary:hover {
	background-color: #d6962c;
	border-color: #d6962c;
	color: #fff;
}

.portfolio{
	background:url(assets/images/portfoliobg.jpg) center top no-repeat;
	-moz-background-size: cover;
	-webkit-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	width: 100%;
	overflow: hidden;	
}

.portfolio_content{
	padding-bottom:120px;
	display:inline-block;
}
.portfolio .portfolio_content .head_title h3{
	color:#000000;
}
.portfolio .portfolio_content .head_title h4{
	color:#000000;
}

.single_portfolio_text{
	display:inline-block;
	padding:0;
	position:relative;
	overflow:hidden;

}
.single_portfolio_text img{
	width:100%;
}

.single_portfolio_text:hover .portfolio_images_overlay{
	top:5%;
	left: 5%;
}

.portfolio_images_overlay{
	width: 90%;
	height: 90%;
	background: rgba(0, 0, 0, .5);
	padding: 20px;
	margin: 0 auto;
	top:-100%;
	left: 5%;
	position: absolute;
	transition:.6s;
}
.portfolio_images_overlay h6{
	text-transform:uppercase;
	color:#fff;
	font-size:2rem;
	line-height:2.575rem;
	font-weight: 500;
	margin-bottom: 1rem;
	margin-top: 1rem;
}

.portfolio_images_overlay p.product_price{
	font-size:2.5725rem;
	color:#fff;
	line-height:3rem;
}
.portfolio_images_overlay .btn{
	margin-top: 25px;
}

@media (min-width:769px) and (max-width:991px) {
	.portfolio_images_overlay {
		padding: 0px;
	}
}
@media (max-width:768px) {
	.portfolio_images_overlay{
		padding: 170px 20px;
	}
}
@media (max-width:580px) {
	.portfolio_images_overlay{
		padding: 100px 20px;
	}
}
@media (max-width:480px) {
	.portfolio_images_overlay{
		padding: 40px 20px;
	}
}
@media (max-width:320px) {
	.portfolio_images_overlay{
		padding: 20px;
	}
}
.modal {
	text-align: center;
}

@media screen and (min-width: 768px) { 
	.modal:before {
		display: inline-block;
		vertical-align: middle;
		content: " ";
		height: 100%;
	}
}

.modal-dialog {
	display: inline-block;
	text-align: left;
	vertical-align: middle;
}
</style>
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
				<a href="<?php echo base_url()?>account/transaksi" class="list-group-item list-group-item-action">Transaksi</a>
				<a href="<?php echo base_url()?>account/setting" class="list-group-item list-group-item-action">Setting</a>
				<a href="<?php echo base_url()?>account/portfolio" class="list-group-item list-group-item-action active">Portfolio</a>
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
						<div class="row">
							<div class="col-md-12">
								<a href="#myModaltambah" class="btn btn-default pull-right" id="custId" data-toggle="modal" ><i class="fa fa-plus-circle"></i> Tambah Data</a>
							</div>
						</div>
						<hr>

						<div class="main_portfolio_content">
							<?php 
							foreach ($port->result_array() as $ix) : 
								?>
								<div class="col-md-3 col-sm-4 col-xs-12 single_portfolio_text">
									<img src="<?php echo base_url().'assets/images/'.$ix['portfolio_foto'];?>" alt="" />
									<div class="portfolio_images_overlay text-center">
										<p class="product_price">
											<span><a href="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></span>
											<span><a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a></span>
										</p>
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

<div class="modal fade bs-example-modal-lg" id="myModaltambah" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Tambah Portofolio</h4>
			</div>
			<div class="modal-body">
				<div class="fetched-data">
					<form class="form-horizontal form-label-left" action="<?php echo base_url()?>frontend/save_portfolio" method="POST" enctype="multipart/form-data">

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="file" name="filefoto" class="form-control" required="required">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Judul</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="judul" class="form-control">
								<input type="hidden" name="userid" value="<?php echo $b['user_id']; ?>" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<textarea class="form-control"  name="keterangan"></textarea>
							</div>
						</div>

						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>

					</form>
				</div>
			</div>

		</div>
	</div>
</div>
<script src="js/jquery-3.1.1.min.js"></script>

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

