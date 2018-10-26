<?php $b=$data->row_array(); ?>

<style type="text/css">
body {
	font-family: sans-serif;
	background-color: #eeeeee;
}

.file-upload {
	background-color: #ffffff;
	margin: 0 auto;
	padding: 20px;
	height: 530px;
}

.file-upload-btn {
	width: 100%;
	margin: 0;
	color: #fff;
	background: #1FB264;
	border: none;
	padding: 10px;
	border-radius: 4px;
	border-bottom: 4px solid #15824B;
	transition: all .2s ease;
	outline: none;
	text-transform: uppercase;
	font-weight: 700;
}

.file-upload-btn:hover {
	background: #1AA059;
	color: #ffffff;
	transition: all .2s ease;
	cursor: pointer;
}

.file-upload-btn:active {
	border: 0;
	transition: all .2s ease;
}

.file-upload-content {
	display: none;
	text-align: center;
}

.file-upload-input {
	position: absolute;
	margin: 0;
	padding: 0;
	width: 100%;
	height: 100%;
	outline: none;
	opacity: 0;
	cursor: pointer;
}

.image-upload-wrap {
	margin-top: 10px;
	border: 4px dashed #1FB264;
	position: relative;
	margin-bottom: 50px;
	height:400px;
}

.image-dropping,
.image-upload-wrap:hover {
	background-color: #1FB264;
	border: 4px dashed #ffffff;
}

.image-title-wrap {
	padding: 0 15px 15px 15px;
	color: #222;
}

.drag-text {
	text-align: center;
	bottom: 0;
}

.drag-text h3 {
	text-transform: uppercase;
	color: #15824B;
	padding-top: 300px;
	font-size:20px;
}

.file-upload-image {
	max-height: 200px;
	max-width: 200px;
	margin: auto;
	padding: -50px;
	padding: 20px;
}

.remove-image {
	width: 200px;
	margin: 0;
	color: #fff;
	background: #cd4535;
	border: none;
	padding: 10px;
	border-radius: 4px;
	border-bottom: 4px solid #b02818;
	transition: all .2s ease;
	outline: none;
	text-transform: uppercase;
	font-weight: 700;
}

.remove-image:hover {
	background: #c13b2a;
	color: #ffffff;
	transition: all .2s ease;
	cursor: pointer;
}

.remove-image:active {
	border: 0;
	transition: all .2s ease;
}

.padbtn{
	margin-top: -130px;
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
	<div class="col-lg-4 col-xl-4 p-b-50 p-t-30">
		<div id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading" id="headingOne">
					<h5 class="mb-0">
						<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							Cara pembayaran
						</button>
					</h5>
				</div>

				<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="panel-body">
						Silahkan transfer ke salah satu metode pembayaran dibawah ini. Lalu upload bukti pembayaran pada tab "Upload Bukti Transfer".
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" id="headingTwo">
					<h5 class="mb-0">
						<button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
							Metode pembayaran
						</button>
					</h5>
				</div>

				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
					<div class="panel-body">
						<?php foreach ($bank->result_array() as $i) :  ?>
							<hr>
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-4">
										<img src="<?php echo base_url().'assets/images/'.$i['bank_file'];?>" class="img img-responsive">
									</div>
									<div class="col-md-8">
										<b><?php echo $i['bank_nama']; ?></b><br>
										<?php echo $i['bank_norek']; ?><br>
										<?php echo $i['bank_pemilik']; ?>
									</div>
								</div>
							</div>
							<hr>
						<?php endforeach;?>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="col-lg-8">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_1" data-toggle="tab">Invoice</a></li>
				<li><a href="#tab_2" data-toggle="tab">Upload Bukti Transfer</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_1">
					<div class="row">


						<div class="col-lg-12 col-xl-12 p-b-50 p-t-30">
							<div class="row">
								<div class="col-xs-6">
									<strong>Invoice</strong><br>
									Order #<?php echo $b['cart_kode']; ?>
								</div>
								<div class="col-xs-6 text-right">
									<strong>Order Date:</strong><br>
									<?php echo date('d F Y', strtotime($b['pemesanan_date'])); ?>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-xs-6">
									<address>
										<strong>Billed To:</strong><br>
										<?php echo $b['user_nama']; ?><br>
										<?php echo $b['user_tel']; ?><br>
										<?php echo $b['user_alamat']; ?><br>
									</address>
								</div>
								<div class="col-xs-6 text-right">
									<address>
										<strong>Shipped To:</strong><br>
										<?php echo $b['pemesanan_nama']; ?><br>
										<?php echo $b['pemesanan_tel']; ?><br>
										<?php echo $b['ongkir_provinsi']; ?><br>
										<?php echo $b['pemesanan_kota']; ?><br>
										<?php echo $b['pemesanan_alamat']; ?><br>
									</address>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><strong>Order summary</strong></h3>
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-condensed">
											<thead>
												<tr>
													<td><strong>Item</strong></td>
													<td><strong>Nama</strong></td>
													<td><strong>Harga</strong></td>
												</tr>
											</thead>
											<tbody>
												<?php
												$bkode = $b['barang_kode'];
												$brg =  explode(',', $bkode);
												?>

												<?php foreach ($brg as $item) {
													$gbrgkode=$this->m_padmin->get_brg_by_kode($item);
													$cg=$gbrgkode->row_array();
													?>
													<tr>
														<td><?php echo $cg['barang_kode']; ?></td>
														<td><?php echo $cg['barang_nama']; ?></td>
														<td><?php echo "Rp. ".number_format($cg['barang_harga']); ?></td>
													</tr>
												<?php } 
												?>
												<tr>
													<td class="thick-line"></td>
													<td class="thick-line text-center"><strong>Subtotal</strong></td>
													<td class="thick-line text-right"><?php echo "Rp. ".number_format($b['cart_total']); ?></td>
												</tr>
												<tr>
													<td class="no-line text-right"><span class="text-danger"> (+)</span></td>
													<td class="no-line text-center"><strong>Shipping</strong></td>
													<td class="no-line text-right"><?php echo "Rp. ".number_format($b['ongkir_biaya']); ?></td>
												</tr>
												<tr>
													<td class="no-line text-right"><span class="text-primary"> (-)</span></td>
													<td class="no-line text-center"><strong>Diskon</strong></td>
													<td class="no-line text-right"><?php echo "Rp. ".number_format($b['pemesanan_diskon']); ?></td>
												</tr>
												<tr>
													<td class="no-line"></td>
													<td class="no-line text-center"><strong>Total</strong></td>
													<td class="no-line text-right"><?php echo "Rp. ".number_format($b['pemesanan_total']); ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="tab_2">
					<div class="row">
						<div class="content col-md-12">
							<form action="<?php echo base_url()?>frontend/save_pembayaran" method="POST" enctype="multipart/form-data" >
								<div class="box">
									<div class="row">
										<div class="col-md-6 col-md-offset-3" style="margin-top:30px;margin-bottom:-20px">
											<div class="form-group">
												<select class="form-control" size="1" name="bank_id">
													<option value="">Pilih Metode Pembayaran</option>
													<?php foreach ($bank->result_array() as $i) : ?>
														<option value="<?php echo $i['bank_id']; ?>"><?php echo $i['bank_nama']; ?></option>
													<?php endforeach; ?>
												</select>	
												<span>*Harus sesuai dengan bank transfer tujuan</span>
											</div>
										</div>
									</div>
									<div class="file-upload">

										<div class="image-upload-wrap">
											<input type="hidden" name="cart_kode" value="<?php echo $b['cart_kode']; ?>">

											<input class="file-upload-input" type='file' id="foto"  name="filefoto" onchange="readURL(this);" accept="image/*" required="required" />
											<div class="drag-text">

												<h3><i class="fa fa-cloud-upload"></i><br>DROP FILES HERE <p>OR CLICK TO <span class="text-primary">BROWSE</span></p></h3>
											</div>
										</div>
										<div class="file-upload-content">
											<img class="file-upload-image" src="#" alt="your image" />
											<div class="image-title-wrap" >
												<button type="button" onclick="removeUpload()" class="remove-image" >Remove <span class="image-title">Uploaded Image</span></button>
											</div>

										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-md-offset-3 col-xs-6 col-xs-offset-3">
										<input type="submit" class="form-control btn btn-round btn-success padbtn" value="Upload">
									</div>
								</div>	
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {

			var reader = new FileReader();

			reader.onload = function(e) {
				$('.image-upload-wrap').hide();

				$('.file-upload-image').attr('src', e.target.result);
				$('.file-upload-content').show();

				$('.image-title').html(input.files[0].name);
			};

			reader.readAsDataURL(input.files[0]);

		} else {
			removeUpload();
		}
	}

	function removeUpload() {
		$('.file-upload-input').replaceWith($('.file-upload-input').clone());
		$('.file-upload-content').hide();
		$('.image-upload-wrap').show();
	}
	$('.image-upload-wrap').bind('dragover', function () {
		$('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
		$('.image-upload-wrap').removeClass('image-dropping');
	});

</script>