<?php $b=$data->row_array(); ?>

<div style="margin-top: 100px"></div>
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Shoping Cart
		</span>
	</div>
</div>

<form class="bg0 p-t-75 p-b-85" action="<?php echo base_url(); ?>frontend/checkout" method="POST">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<div class="card rounded">
							<div class="card-body">
								<h5 class="card-title">INVOICE : <?php echo $b['cart_kode']; ?></h5>
								<b><p class="card-text">Tipe : <?php echo $b['type_nama'];?>
								<span class=" pull-right">Shape : <?php echo $b['shape_nama'];?></span></p></b>
							</div>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<div class="row">
										<div class="col-md-3"><b>List</b></div>
										<div class="col-md-3"><b>Kode</b></div>
										<div class="col-md-3"><b>Nama</b></div>
										<div class="col-md-3"><b>Harga</b></div>
									</div>
								</li>
								<?php
								$bkode = $b['barang_kode'];
								$brg =  explode(',', $bkode);
								?>

								<?php foreach ($brg as $item) {

									$gbrgkode=$this->m_padmin->get_brg_by_kode($item);
									$cg=$gbrgkode->row_array();

									?>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-3"><?php echo $cg['list_nama']; ?></div>
											<div class="col-md-3"><?php echo $cg['barang_kode']; ?></div>
											<div class="col-md-3"><?php echo $cg['barang_nama']; ?></div>
											<div class="col-md-3"><?php echo "Rp ".number_format($cg['barang_harga']); ?></div>
										</div>
									</li>
								<?php } 
								?>
							</ul>
						</div>
					</div>

					<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						<div class="flex-w flex-m m-r-20 m-tb-5">
							<?php
							$gpoinplus=$poinplus->row_array();
							$gpoinmin=$poinmin->row_array();

							$pointotal=$gpoinplus['jumpoinplus']-$gpoinmin['jumpoinmin'];
							if($pointotal==0){
								?>
							<?php } else {?>
								<div class="row col-md-12">
									Anda saat ini memiliki  <span class="text-primary">&nbsp;<?php echo $pointotal; ?>&nbsp;</span> Poin
								</div>
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="number" max="<?php echo $pointotal; ?>" min="0" name="coupon" id="coupon" placeholder="Jumlah pakai" onKeyup="diskonpot()">
							<?php } ?>

						</div>
					</div>
				</div>
			</div>


			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Cart Totals
					</h4>

					<div class="flex-w flex-t bor12 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Subtotal:
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								<?php echo "Rp. ".number_format($b['cart_total']); ?>
							</span>
						</div>
					</div>

					<div class="flex-w flex-t bor12 p-t-15 p-b-30">
						<div class="size-208 w-full-ssm">
							<span class="stext-110 cl2">
								Shipping:
							</span>
						</div>

						<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
							<p class="stext-111 cl6 p-t-2">
								Barang akan dikirim sesuai dengan form dibawah ini.
							</p>

							<div class="p-t-15">


								<div class="bor8 bg0 m-b-12">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="nama" placeholder="Nama">
									<input  type="hidden" name="cart_kode" value="<?php echo $b['cart_kode']; ?>">
									<input  type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>">
								</div>

								<div class="bor8 bg0 m-b-22">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="tel" placeholder="Telepon">
								</div>

								<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
									<select id="ongkir" class="js-select2" name="ongkir"  onchange="price()">
										<option value="none">Pilih Provinsi</option>
										<?php foreach ($ongkir->result_array() as $ongk) : ?>
											<option value="<?php echo $ongk['ongkir_id'].",".$ongk['ongkir_biaya']; ?>"><?php echo $ongk['ongkir_provinsi']; ?></option>
										<?php endforeach; ?>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
								<div class="bor8 bg0 m-b-22">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="kota" placeholder="Kab / Kota">
								</div>

								<div class="bor8 bg0 m-b-22">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="alamat" placeholder="Alamat">
								</div>
								<div class="bor8 bg0 m-b-22">
									<textarea  class="stext-111 cl8 plh3 size-111 p-lr-15" rows="8" name="message" placeholder="Masukan pesan anda"></textarea>
								</div>
							</div>
						</div>
					</div>

					<div class="flex-w flex-t p-t-27 p-b-33">
						<div class="col-md-5 mtext-101 cl-12">
							Sub Total 
						</div>
						<div class="col-md-6 mtext-50 cl-12">
							<input type="hidden" id="subttl" value="<?php echo $b['cart_total']; ?>" readonly>
							<input type="text"  value="<?php echo number_format($b['cart_total']); ?>" readonly>
						</div>
						<div class="col-md-5 mtext-101 cl-12">
							Diskon
						</div>
						<div class="col-md-6 mtext-50 cl-12">
							<input type="hidden" id="diskon" name="diskon" value="0" readonly>
							<input type="text" id="fdiskon" name="fdiskon" value="0" readonly>
						</div>
						<div class="col-md-5 mtext-101 cl-12">
							Ongkir
						</div>
						<div class="col-md-6 mtext-50 cl-12">
							<input type="text" id="harga" value="0" readonly>
						</div>
						<div class="col-md-5 mtext-101 cl-12">
							Total
						</div>
						<div class="col-md-6 mtext-50 cl-12">
							<input type="text" id="ttal" value="<?php echo number_format($b['cart_total']); ?>" readonly>
							<input type="hidden" id="gttal" name="gttal" value="<?php echo $b['cart_total']; ?>" readonly>
						</div>
					</div>

					<button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
						Proceed to Checkout
					</button>
				</div>
			</div>
		</div>
	</div>

</form>


<script type="text/javascript">
	function FormatDuit(x) {
		var tmp_num;
		var negatif = false;
		if(x<0) {
			negatif = true;
			tmp_num = Math.abs(x);
		} else {
			tmp_num = x;
		}

		var num = tmp_num.toString();
		for(var i=0; i < Math.floor((num.length-(1+i))/3); i++)
			num=num.substring(0,num.length-(4*i+3)) + ',' + num.substring(num.length-(4*i+3));
		if(negatif) { num = '-'+num; }
		return(num);
	}  

	function diskonpot() {
		var coupon = document.getElementById("coupon").value;
		var subttl = document.getElementById("subttl").value;
		var tes = document.getElementById("ongkir").value;
		var res = tes.split(",");

		document.getElementById("diskon").value=parseInt(coupon)*1000;
		document.getElementById("fdiskon").value=FormatDuit(parseInt(coupon)*1000);
		document.getElementById("harga").value=FormatDuit(res[1]);
		document.getElementById("ttal").value=FormatDuit((parseInt(res[1])+parseInt(subttl))-(parseInt(coupon)*1000));
		document.getElementById("gttal").value=(parseInt(res[1])+parseInt(subttl)-(parseInt(coupon)*1000));

	}


	function price() {
		var subttl = document.getElementById("subttl").value;
		var tes = document.getElementById("ongkir").value;
		var diskon = document.getElementById("diskon").value;
		var res = tes.split(",");
		document.getElementById("harga").value=FormatDuit(res[1]);
		document.getElementById("ttal").value=FormatDuit((parseInt(res[1])+parseInt(subttl))-parseInt(diskon));
		document.getElementById("gttal").value=(parseInt(res[1])+parseInt(subttl)-parseInt(diskon));
	}

	
</script>


