<?php $b=$data->row_array(); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<section class="bg0 p-t-175 p-b-120">
	<div class="container">
		<div class="row p-b-15">
			<div class="col-md-12 text-center">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url()?>forum">Forum</a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url()?>forum/<?php echo $b['forum_id']; ?>"><?php echo $b['forum_judul']; ?></a></li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="col-md-12">
			<div class="panel-group">

				<div class="panel panel-primary">
					<div class="panel-heading "><?php echo $b['forum_judul']; ?></div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<a href="<?php echo base_url() ?>forum/newtopic/<?php echo $b['forum_id']; ?>" class="btn btn-primary pull-right">Buat Topic</a>
							</div>
						</div>
						<br>


						<div class="card ">
							<div class="card-header bg-dark text-white">
								<div class="col-md-1">

								</div>
								<div class="col-md-7">
									<b>Judul</b>
								</div>
								<div class="col-md-2">
									<b>Replies</b>
								</div>
								<div class="col-md-2">
									<b>Last Message</b>
								</div>
							</div>

							<ul class="list-group list-group-flush">

								<?php 
								foreach ($datax->result_array() as $ix) :
									$kode=$ix['topic_id']; 
									$ee=$this->m_padmin->get_last_message($kode);
									$eef=$ee->row_array();
									$deef=$ee->num_rows();
									$cply=$this->m_padmin->count_reply($kode);
									$creply=$cply->row_array();
									?>
									<li class="list-group-item">
										<div class="col-md-1">
											<img class="img-responsive user-photo" src="<?php echo base_url().'assets/images/'.$ix['user_foto'];?>">
										</div>
										<div class="col-md-7">
											<h5 class="card-title"><a href="<?php echo base_url()?>forum/<?php echo $ix['forum_id']; ?>/<?php echo $ix['topic_id']; ?>"><?php echo $ix['topic_judul']; ?></a></h5>
											<h6 class="card-subtitle mb-2 text-muted">By <a href=""><?php echo $ix['user_username']; ?></a>, <?php echo date('d-m-Y H:i:s', strtotime($ix['topic_tanggal'])); ?></h6>
										</div>
										<div class="col-md-2">
											<p><?php echo $creply['cntreply']; ?></p>
										</div>
										<div class="col-md-2">
											<?php 
											if($deef==0){
												echo "<h5>Belum ada komentar</h5>";
											} 
											else {
												?>
												<h5 class="card-title">By <a href=""><?php echo $eef['user_username']; ?></a></h5>
												<h6 class="card-subtitle mb-2 text-muted"><?php echo date('d-m-Y H:i:s',strtotime($eef['coment_tanggal'])); ?></h6>
											<?php } ?>
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
