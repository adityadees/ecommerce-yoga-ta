
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?php echo base_url()?>assets/frontend/vendor/summernote/dist/summernote-lite.css" rel="stylesheet">
<script type="text/javascript">
	.modal-backdrop, .modal-backdrop.in{
		z-index:1000;
	}

	.modal {
		z-index:1001;
	}
</script>
<section class="bg0 p-t-175 p-b-120">
	<div class="container">
		<div class="row p-b-15">
			<div class="col-md-12 text-center">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Forum</a></li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="col-md-12">
			<div class="panel-group">
				<div class="panel panel-primary">
					<div class="panel-heading ">New Topic</div>
					<div class="panel-body">
						<form method="POST" action="<?php echo base_url()?>frontend/save_post">
							<?php $cc=$this->uri->segment(3); ?>

							<div class="row">
								<div class="col-md-10">
									<div class="form-group">
										<input type="text" name="judul" class="form-control">
										<input type="hidden" name="forum" value="<?php echo $cc; ?>" class="form-control">
										<input type="hidden" name="userid" value="<?php echo $userid=$_SESSION['userid']; ?>" class="form-control">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<input type="submit" class="btn btn-primary form-control" value="POST">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<textarea id="summernote" name="isi"></textarea>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</section>

	<script src="<?php echo base_url()?>assets/frontend/vendor/summernote/dist/jquery-3.2.1.slim.min.js"></script>
	<script src="<?php echo base_url()?>assets/frontend/vendor/summernote/dist/summernote-lite.js"></script>
	<script>
		$('#summernote').summernote({
			placeholder: 'Hello stand alone ui',
			tabsize: 2,
			height: 300
		});

	</script>