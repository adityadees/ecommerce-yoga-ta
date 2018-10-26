<?php $b=$data->row_array(); ?>
<style type="text/css">
input.hidden {
	position: absolute;
	left: -9999px;
}

#profile-image1 {
	cursor: pointer;
	width: 100px;
	height: 100px;
	border:2px solid #03b1ce ;
}

.modal-dialog {
	position:absolute;
	top:50% !important;
	transform: translate(0, -50%) !important;
	-ms-transform: translate(0, -50%) !important;
	-webkit-transform: translate(0, -50%) !important;
	margin:auto 5%;
	width:90%;
	height:80%;
}
.modal-content {
	min-height:100%;
	position:absolute;
	top:0;
	bottom:0;
	left:0;
	right:0; 
}
.modal-body {
	position:absolute;
	top:45px; /** height of header **/
	bottom:45px;  /** height of footer **/
	left:0;
	right:0;
	overflow-y:auto;
}
.modal-footer {
	position:absolute;
	bottom:0;
	left:0;
	right:0;
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
				<a href="<?php echo base_url()?>account/setting" class="list-group-item list-group-item-action active">Setting</a>
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



						<div class="col-md-12 ">
							<div class="panel panel-default">
								<div class="panel-heading"> 
									<h4 >User Profile
										<p class="pull-right">
											<a class="text-primary" data-toggle="modal" data-target="#ModalEdit<?php echo $b['user_id'];?>"><i class="fa fa-pencil"></i></a>
										</p>
									</h4>
								</div>
								<div class="panel-body">

									<div class="box box-info">

										<div class="box-body">
											<form action="" method="POST" enctype="multipart/form-data">
												<div class="col-sm-6">
													<div  align="center">
														<img alt="User Pic" src="<?php echo base_url().'assets/images/'.$b['user_foto'];?>" id="profile-image1" class="img-circle img-responsive"> 
														<input id="profile-image-upload" class="hidden" type="file" disabled="">
														<!-- <div style="color:#999;" >click here to change profile image</div>-->
													</div>
													<br>
												</div>
											</form>
											<div class="col-sm-6">
												<span>
													<h4 style="color:#00b1b1;"><?php echo $b['user_nama']; ?> </h4>
												</span>
												<span><p><?php echo $b['user_username']; ?></p></span>            
											</div>
											<div class="clearfix"></div>
											<hr style="margin:5px 0 5px 0;">


											<div class="col-sm-2 col-sm-offset-2 col-xs-6 tital " >Email</div>
											<div class="col-sm-6 col-xs-6 pull-right"><?php echo $b['user_email']; ?></div>

											<div class="col-sm-2 col-sm-offset-2 col-xs-6 tital " >Jenis Kelamin</div>
											<div class="col-sm-6 pull-right"> <?php if($b['user_jk']=='L') {echo "Laki - Laki";} else if ($b['user_jk']=='P') {echo "Perempuan";} else {echo "Tidak diketahui";}?></div>

											<div class="col-sm-2 col-sm-offset-2 col-xs-6 tital " >Telepon</div>
											<div class="col-sm-6 pull-right"> <?php echo $b['user_tel']; ?></div>


											<div class="col-sm-2 col-sm-offset-2 col-xs-6 tital " >Tanggal Lahir</div>
											<div class="col-sm-6 pull-right"><?php echo $b['user_tgl_lahir']; ?></div>


											<div class="col-sm-2 col-sm-offset-2 col-xs-6 tital " >Alamat</div>
											<div class="col-sm-6 pull-right"><?php echo $b['user_alamat']; ?></div>
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

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script>
	$(function() {
		$('#profile-image1').on('click', function() {
			$('#profile-image-upload').click();
		});
	});       
</script> 
<script type="text/javascript">
	var interval = setInterval(timestamphome, 1000);
	function timestamphome(){
		var date;
		date = new Date();
		var time = document.getElementById('timediv'); 
		time.innerHTML = date.toLocaleTimeString();
	}
</script>
<?php foreach ($data->result_array() as $i) :  ?>

	<div class="modal fade" id="ModalEdit<?php echo $i['user_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Edit list</h4>
				</div>
				<form class="form-horizontal" action="<?php echo base_url().'frontend/update_user'?>" method="post" enctype="multipart/form-data">
					<div class="modal-body">       
						<input type="hidden" name="kode" value="<?php echo $i['user_id'];?>"/> 

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Change Foto</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="file" name="filefoto" class="form-control">
								<span>*Kosongkan jika tidak ingin mengganti foto</span>
							</div>
						</div>
						<hr>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="user_username" value="<?php echo $i['user_username'];?>" class="form-control" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="user_email" value="<?php echo $i['user_email'];?>" class="form-control" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="user_nama" value="<?php echo $i['user_nama'];?>" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select name="jk" class="form-control" size="0">
									<option value="L" <?php if($i['user_jk']=='L'){ echo "selected"; } else {}?>>Laki - Laki</option>
									<option value="P" <?php if($i['user_jk']=='P'){ echo "selected"; } else {}?>>Perempuan</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Telepon</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="user_tel" value="<?php echo $i['user_tel'];?>" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="date" name="user_ttl" value="<?php echo $i['user_tgl_lahir'];?>" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<textarea  name="alamat"  class="form-control"><?php echo $i['user_alamat'];?></textarea>	
							</div>
						</div>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php endforeach;?>