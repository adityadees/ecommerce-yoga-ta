<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<style type="text/css">
select.models{
	display:none;
}
select.models.active{
	display:inline-block;
}
select.harg{
	display:none;
}
select.harg.active{
	display:inline-block;
}
#accordion.models{
	display:none;
}
#accordion.models.active{
	display:inline-block;
}
</style>



<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
		CUSTOM GUITAR
	</h2>
</section>	

<section class="bg0 p-t-75 p-b-120">
	<div class="container">
		<div class="row p-b-15">
			<div class="col-md-12 text-center">
				<h3 class="mtext-111 cl2 text-center">
					BASIC OPTION
				</h3>
			</div>
		</div>
		<div class="col-md-7">

			<form method="post" id="reg-form">
				<div class="panel panel-info">
					<div class="panel-heading">Your Custom</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label>Guitar Type:</label>
									<select size="1" class="form-control main" name="type">
										<option value="none"> Pilih tipe gitar</option>
										<?php foreach ($tipegitar->result_array() as $ir) : ?>
											<option value="<?php echo $ir['type_id'];?>"><?php echo $ir['type_nama']; ?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group ">
									<label>Basic Shape:</label>
									<select size="1" class="form-control " name="shape">
										<?php
										$shapetype=$this->m_padmin->get_all_shape(); 
										foreach ($shapetype->result_array() as $ix) : 
											?>
											<option value="<?php echo $ix['shape_id']; ?>"> <?php echo $ix['shape_nama']; ?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<?php 
							foreach ($katgroup->result_array() as $j) : 
								$kattypeid=$j['type_id'];
								?>
								<div class="panel-group models <?php echo $kattypeid; ?> col-md-12" id="accordion">
									<?php
									$kattype=$this->m_padmin->get_kategori_by_type($kattypeid); 
									foreach ($kattype->result_array() as $i) : 
										$katid=$i['kategori_id'];
										?>
										<div class="panel panel-default">
											<div class="panel-heading ">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i['kategori_id']; ?>">
														<?php echo $i['kategori_nama']; ?></a>
													</h4>
												</div>
												<div id="collapse<?php echo $katid; ?>" class="panel-collapse collapse">
													<?php
													$lst=$this->m_padmin->get_barang_by_kat($katid); 
													foreach ($lst->result_array() as $k) : 
														$listid=$k['list_id'];
														?>
														<div class="panel-body">
															<div class="col-md-4">
																<label><input type="hidden" name="list[]" value="<?php echo $listid;?>"></label>
																<label><?php echo $k['list_nama']; ?></label>
															</div>
															<div class="col-md-8">

																<div class="form-group">
																	<select class="form-control hrgmain" name="barang[]" size="0">

																		<option value="none">-- Silahkan dipilih dahulu --</option>
																		<?php
																		$gbarang=$this->m_padmin->get_barang_by_list($listid); 
																		foreach ($gbarang->result_array() as $l) : 
																			?>
																			<option value="<?php echo $l['barang_kode']; ?>"><?php echo $l['barang_nama']."  (Rp ". number_format($l['barang_harga']).")"; ?></option>
																		<?php endforeach;?>
																	</select>
																</div>
															</div>
														</div>
													<?php endforeach;?>
												</div>
											</div>
										<?php endforeach;?>

									</div>
								<?php endforeach;?>
							</div>
							<input type="submit" class="btn btn-info" value="Cek">
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-5">
				<div class="panel panel-success">
					<div class="panel-heading">Perkiraan Biaya</div>
					<div class="panel-body">
						<?php
						if( $_POST ){
							$type= $_POST['type'];
							$gtype=$this->m_padmin->get_type_cart($type);
							$cc=$gtype->row_array();
							$shape = $_POST['shape'];
							$gshape=$this->m_padmin->get_shape_cart($shape);
							$dd=$gshape->row_array();
							$barang = $_POST['barang'];
							$list = $_POST['list'];
							$stringkode='CST00';
							$gkd=$this->m_padmin->get_max_id_cart();
							$nck=$gkd->row_array();
							$nk=$nck['count_ck']+1;
							$newdt=date("Ymd");
							$cart_kd=$stringkode.$nk.$newdt.rand(0,999);
							?>
							<form action="<?php echo base_url(); ?>frontend/save_to_chart" method="POST">
								<table class="table table-striped" border="0">

									<tr>
										<td colspan="3">
											<div class="alert alert-info">
												<strong>Sukses</strong>, Barang yang anda custom
											</div>
										</td>
									</tr>
									<input type="hidden" name="cart_kd" value="<?php echo $cart_kd; ?>">
									<?php if(isset($_SESSION['userid'])){ ?>
										<input type="hidden" name="usrid" value="<?php echo $_SESSION['userid']; ?>">
									<?php } else {} ?>
									<tr>
										<th>Guitar Type :</th>
										<th colspan="2">
											<?php echo $cc['type_nama']; ?>
											<input type="hidden" name="type_id" value="<?php echo $cc['type_id']; ?>">
										</th>
									</tr>
									<tr>
										<th>Shape Name :</th>
										<th colspan="2">
											<?php echo $dd['shape_nama']; ?>
											<input type="hidden" name="shape_id" value="<?php echo $dd['shape_id']; ?>">
										</th>
									</tr>
									<?php 

									$tot=0;
									foreach ($barang as $abrg){

										if($abrg!='none'){
											$gbarang=$this->m_padmin->get_barang_cart($abrg);
											$ee=$gbarang->row_array();
											echo "<tr>
											<td>".$ee['list_nama']."</td>
											<td>".$ee['barang_nama']."<input type='hidden' name='barang_kode[]' value=".$ee['barang_kode']."></td>
											<td>"."Rp ".number_format($ee['barang_harga'])."</td>
											</tr>";


											$cqs=$tot+=$ee['barang_harga'];
										}
									} 
									?>
									<tfoot>
										<tr>
											<th colspan ="2">Total</th>
											<input type="hidden" name="totalharga" value="<?php echo $tot; ?>">
											<th>Rp. <?php echo number_format($tot); ?></th>
										</tr>
									</tfoot>
								</table>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" name="message" placeholder="type your messege here"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<?php if(isset($_SESSION['logged_in'])){
											if($_SESSION['role']=='customer'){
												?>
												<input type="submit" class="form-control btn btn-primary" value="Next">

											<?php }
											else { ?>

												<input type="submit" class="form-control btn btn-primary" value="Next" disabled>
												<span >*Anda tidak dapat memesan</span>
											<?php }
										}else  {?>

											<input type="submit" class="form-control btn btn-danger" value="Next" disabled>
											<span >*Silahkan Login terlebih dahulu untuk proses selanjutnya</span>
										<?php } ?>


									</div>
								</div>

							</form>
							<?php

						} else { ?>
							<div class="alert alert-warning">
								<strong>Belum ada data</strong>
							</div>
						<?php }?>
					</div>
				</div>

			</div>
		</div>
	</section>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script type="text/javascript">
		$(function(){

			$("select.main").on("change", function(){

				$("select.models.active").removeClass("active");
				var subList = $("select.models."+$(this).val());
				if (subList.length){
					subList.addClass("active");
				}

				$("#accordion.models.active").removeClass("active");
				var subList = $("#accordion.models."+$(this).val());
				if (subList.length){
					subList.addClass("active");
				}

			});


			$("select.hrgmain").on("change", function(){

				$("select.harg.active").removeClass("active");
				var subList = $("select.harg."+$(this).val());
				if (subList.length){
					subList.addClass("active");
				}
			});

		});
	</script>
	<script type="text/javascript">

		$(document).ready(function() {	

			$('#reg-form').submit(function(e){

				e.preventDefault();

				$.ajax({
					url: 'submit.php',
					type: 'POST',
					data: $(this).serialize() 
				})
				.done(function(data){
					$('#form-content').fadeOut('slow', function(){
						$('#form-content').fadeIn('slow').html(data);
					});
				})
				.fail(function(){
					alert('Ajax Submit Failed ...');	
				});
			});

		</script>