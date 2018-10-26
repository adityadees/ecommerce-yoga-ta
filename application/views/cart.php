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

<form class="bg0 p-t-75 p-b-85">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Kode</th>
								<th class="column-1">Harga</th>
								<th class="column-1">Tanggal</th>
								<th class="column-1"></th>
							</tr>
							<?php 
							$cek=$data->num_rows();
							if($cek>0){
								foreach ($data->result_array() as $ix) : 
									$kode=$ix['cart_kode'];
									?>
									<tr class="table_row">
										<td class="column-1">
											<a href="<?php echo base_url() ?>cart/<?php echo $kode; ?>">
												<?php echo $ix['cart_kode']; ?>
											</a>

										</td>
										<td class="column-1"><?php  echo "Rp. ".number_format($ix['cart_total']); ?></td>
										<td class="column-1"><?php  echo date('d/m/Y h:i:s',strtotime($ix['cart_tanggal']));  ?></td>
										<td class="column-1"><a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
									</tr>
								<?php endforeach;	}
								else { ?>
									<tr>
										<td colspan="4" class="text-center">
											Anda belum memesan apapun<br>
											<a href="<?php base_url()?>custom">PESAN SEKARANG</a>
										</td>
									</tr>
									
								<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>


