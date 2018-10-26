<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>Laporan Keseluruhan</title>
	<link href="<?php echo base_url()?>assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/backend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/backend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
	<style type="text/css">

</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="col-md-6">
					Logo
				</div>
				<div class="col-md-6 text-right">
					Laporan Keseluruhan
				</div>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode</th>
								<th>Nama</th>
								<th>Telepon</th>
								<th>Total</th>
								<th>Diskon</th>
								<th>Tanggal</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no=0;
							foreach ($print->result_array() as $i) :
								$no++;
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $i['cart_kode']; ?></td>
									<td><?php echo $i['pemesanan_nama']; ?></td>
									<td><?php echo $i['pemesanan_tel']; ?></td>
									<td><?php echo "Rp. ".number_format($i['pemesanan_total']); ?></td>
									<td><?php echo "Rp. ".number_format($i['pemesanan_diskon']); ?></td>
									<td><?php echo date('d M Y H:i:s',strtotime($i['pemesanan_date'])); ?></td>
								</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>


	<!-- jQuery -->
	<script src="<?php echo base_url()?>assets/backend/vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url()?>assets/backend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>


	<script src="<?php echo base_url()?>assets/backend/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url()?>assets/backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url()?>assets/backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets/backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
	<script src="<?php echo base_url()?>assets/backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
	<script src="<?php echo base_url()?>assets/backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url()?>assets/backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
	<script src="<?php echo base_url()?>assets/backend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
</body>
</html>