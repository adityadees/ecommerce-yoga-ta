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
		Repair & Modification
	</h2>
</section>	

<section class="bg0 p-t-75 p-b-120">
	<div class="container">

		<div class="row p-t-75">
			<div class="col-md-12">
				<div class="row p-b-15">
					<div class="col-md-12 text-center">
						<h3 class="mtext-111 cl2 text-center p-b-15">
							ACOUSTIC GUITAR - REPAIR
						</h3>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<?php 
									foreach ($repairkat->result_array() as $i) :
										$koder=$i['rm_kategori_id'];
										?>
										<table class="table table-striped text-center ">
											<colgroup>
												<col width="15%">
												<col width="70%">
												<col width="15%">
											</colgroup>
											<thead class="bg-warning">
												<tr>
													<th class="text-center">Code</th>
													<th class="text-center"><?php echo $i['rm_kategori_nama']; ?></th>
													<th class="text-center">Price</th>
												</tr>
											</thead>
											<?php 
											$ccr=$this->m_padmin->get_item_by_kat($koder); 
											foreach ($ccr->result_array() as $j) : 
												?>
												<tr>
													<td><?php echo $j['rm_kode']; ?></td>
													<td><?php echo $j['rm_nama']; ?></td>
													<td><?php echo "Rp ".number_format($j['rm_harga']); ?></td>
												</tr>
											<?php endforeach; ?>
										</table>
									<?php endforeach; ?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row p-t-75">
			<div class="col-md-12">
				<div class="row p-b-15">
					<div class="col-md-12 text-center">
						<h3 class="mtext-111 cl2 text-center p-b-15">
							ACOUSTIC GUITAR - MODIFICATION
						</h3>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<?php 
								foreach ($modifkat->result_array() as $i) :
									$koder=$i['rm_kategori_id'];
									?>
									<table class="table table-striped text-center">
										<colgroup>
											<col width="15%">
											<col width="70%">
											<col width="15%">
										</colgroup>
										<thead class="bg-info">
											<tr>
												<th class="text-center">Code</th>
												<th class="text-center"><?php echo $i['rm_kategori_nama']; ?></th>
												<th class="text-center">Price</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$ccm=$this->m_padmin->get_item_by_kat($koder); 
											foreach ($ccm->result_array() as $j) : 
												?>
												<tr>
													<td><?php echo $j['rm_kode']; ?></td>
													<td><?php echo $j['rm_nama']; ?></td>
													<td><?php echo "Rp ".number_format($j['rm_harga']); ?></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								<?php endforeach; ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
