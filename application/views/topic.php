<?php $b=$data->row_array(); ?>
<style type="text/css">
.comment-box {
	margin-top: 30px !important;
}

.comment-box img {
	width: 50px;
	height: 50px;
}
.comment-box .media-left {
	padding-right: 10px;
	width: 65px;
}
.comment-box .media-body p {
	border: 1px solid #ddd;
	padding: 10px;
}
.comment-box .media-body .media p {
	margin-bottom: 0;
}
.comment-box .media-heading {
	background-color: #f5f5f5;
	border: 1px solid #ddd;
	padding: 7px 10px;
	position: relative;
	margin-bottom: -1px;
}
.comment-box .media-heading:before {
	content: "";
	width: 12px;
	height: 12px;
	background-color: #f5f5f5;
	border: 1px solid #ddd;
	border-width: 1px 0 0 1px;
	-webkit-transform: rotate(-45deg);
	transform: rotate(-45deg);
	position: absolute;
	top: 10px;
	left: -6px;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<section class="bg0 p-t-175 p-b-120">
	<div class="container">
		<div class="row p-b-15">
			<div class="col-md-12 text-center">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url()?>forum">Forum</a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url()?>forum/<?php echo $b['forum_id']; ?>"><?php echo $b['forum_judul']; ?></a></li>
						<li class="breadcrumb-item"><a href="<?php echo base_url()?>forum/<?php echo $b['forum_id']; ?>"><?php echo $b['topic_judul']; ?></a></li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="col-md-12">
			<div class="panel-group">

				<div class="panel panel-primary">
					<div class="panel-heading ">Topic started : <?php echo $b['user_username']; ?> </div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<a href="<?php echo base_url()?>reply/<?php echo $b['topic_id']; ?>" class="btn btn-primary pull-right">Reply</a>
							</div>
						</div>

						<div class="media comment-box">
							<div class="media-left">
								<a href="#">
									<img class="img-responsive user-photo" src="<?php echo base_url().'assets/images/'.$b['user_foto'];?>">
								</a>

							</div>
							<div class="media-body">
								<h4 class="media-heading">
									<?php echo $b['topic_judul']; ?>
									<span class="pull-right"><?php echo date('d-m-Y H:i:s',strtotime($b['topic_tanggal'])); ?></span>
								</h4>
								<div class="row">
									<div class="col-md-12">

										<?php echo $b['topic_isi']; ?>
									</div>
								</div>

							</div>
						</div>

						<div class="row">
							<div class="col-sm-10 col-md-offset-1">
								<hr/>
								<div class="review-block">

									<?php 
									foreach ($datax->result_array() as $ix) : 
										?>
										<div class="row">
											<div class="col-sm-3">
												<img src="<?php echo base_url().'assets/images/'.$ix['user_foto'];?>" class="img-rounded user-photo" width="50px">
												<div class="review-block-name"><a href="#"><?php echo $ix['user_username']; ?></a></div>
												<div class="review-block-date">
													<?php echo date('d-m-Y',strtotime($ix['coment_tanggal'])); ?><br/>
													<?php echo date('H:i:s',strtotime($ix['coment_tanggal'])); ?><br/>
												</div>
											</div>
											<div class="col-sm-9">
												<div class="review-block-description">
													<?php echo $ix['coment_isi']; ?>
												</div>
											</div>
										</div>
										<hr>
									<?php endforeach; ?>


								</div>
							</div>
						</div>


					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-12">
								<a href="<?php echo base_url()?>reply/<?php echo $b['topic_id']; ?>" class="btn btn-primary pull-right">Reply</a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
