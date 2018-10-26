
<link rel="stylesheet" href="<?php echo base_url()?>assets/frontend/bost/bootstrap3.3.7.min.css">


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
					<div class="panel-heading ">Forum</div>
					<div class="panel-body">
						<div class="col-md-12">

						</div>

						<div class="card ">

							<div class="card-header bg-dark text-white">

								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="col-md-1 col-sm-12 col-xs-12">
										</div>
										<div class="col-md-5 col-sm-12 col-xs-12">
											<b>Forum</b>
										</div>
										<div class="col-md-2 col-sm-12 col-xs-12">
											<b >POSTS</b>
										</div>
										<div class="col-md-2 col-sm-12 col-xs-12">
											<b>LAST POST</b>
										</div>
									</div>
								</div>
							</div>

							<ul class="list-group list-group-flush">

								<?php 
								foreach ($data->result_array() as $ix) : 
									$kode=$ix['forum_id'];
									$ee=$this->m_padmin->get_last_post($kode);
									$eef=$ee->row_array();
									$deef=$ee->num_rows();
									$ctopic=$this->m_padmin->count_topic($kode);
									$cntpc=$ctopic->row_array();
									?>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<div class="col-md-1 col-sm-12 col-xs-12">
													<i class="fa fa-edit fa-4x"></i>
												</div>
												<div class="col-md-5 col-sm-12 col-xs-12">
													<h5 class="card-title"><a href="<?php echo base_url() ?>forum/<?php echo $ix['forum_id']; ?>"><?php echo $ix['forum_judul']; ?></a></h5>
													<h6 class="card-subtitle mb-2 text-muted"><?php echo $ix['forum_subjudul']; ?></h6>
												</div>
												<div class="col-md-2 col-sm-12 col-xs-12">
													<br>
													<b class="text-center"><?php echo $cntpc['cnttopic'];?></b>
												</div>
												<div class="col-md-2 col-sm-12 col-xs-12">
													<h5 class="card-title"><a href="<?php echo base_url()?>forum/<?php echo $eef['forum_id']; ?>/<?php echo $eef['topic_id']; ?>"><?php echo $eef['topic_judul']; ?></a></h5>
													<h6 class="card-subtitle mb-2 text-muted">By <a href=""><?php echo $eef['user_username']; ?></a></h6>
													<h6 class="card-subtitle mb-2 text-muted"><?php echo date('d-m-Y H:i:s',strtotime($eef['topic_tanggal'])); ?></h6>
												</div>
											</div>
										</div>

									</li>
								<?php endforeach; ?>


							</ul>

						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
