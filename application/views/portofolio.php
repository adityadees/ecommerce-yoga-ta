
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Quicksand:400,300);
body{
  font-family: 'Quicksand', sans-serif;
}
.gal-container{
  padding: 12px;
}
.gal-item{
  overflow: hidden;
  padding: 3px;
}
.gal-item .box{
  overflow: hidden;
}
.box img{
  height: 100%;
  width: 100%;
  object-fit:cover;
  -o-object-fit:cover;
}
.gal-item a:focus{
  outline: none;
}
.gal-item a:after{
  content:"\e003";
  font-family: 'Glyphicons Halflings';
  opacity: 0;
  background-color: rgba(0, 0, 0, 0.75);
  position: absolute;
  right: 3px;
  left: 3px;
  top: 3px;
  bottom: 3px;
  text-align: center;
  line-height: 350px;
  font-size: 30px;
  color: #fff;
  -webkit-transition: all 0.5s ease-in-out 0s;
  -moz-transition: all 0.5s ease-in-out 0s;
  transition: all 0.5s ease-in-out 0s;
}
.gal-item a:hover:after{
  opacity: 1;
}
.modal-open .gal-container .modal{
  background-color: rgba(0,0,0,0.4);
}
.modal-open .gal-item .modal-body{
  padding: 0px;
}
.modal-open .gal-item button.close{
  position: absolute;
  width: 25px;
  height: 25px;
  background-color: #000;
  opacity: 1;
  color: #fff;
  z-index: 999;
  right: -12px;
  top: -12px;
  border-radius: 50%;
  font-size: 15px;
  border: 2px solid #fff;
  line-height: 25px;
  -webkit-box-shadow: 0 0 1px 1px rgba(0,0,0,0.35);
  box-shadow: 0 0 1px 1px rgba(0,0,0,0.35);
}
.modal-open .gal-item button.close:focus{
  outline: none;
}
.modal-open .gal-item button.close span{
  position: relative;
  top: -3px;
  font-weight: lighter;
  text-shadow:none;
}
.gal-container .description{
  padding: 10px 25px;
  background-color: rgba(0,0,0,0.5);
  color: #fff;
  text-align: left;
}
.gal-container .description h4{
  margin:0px;
  font-size: 15px;
  font-weight: 300;
  line-height: 20px;
}
.modal {
  text-align: center;
}

@media screen and (min-width: 768px) { 
  .modal:before {
    display: inline-block;
    vertical-align: middle;
    content: " ";
    height: 100%;
  }
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: center;
}
.gal-container .modal.fade.in .modal-dialog {
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
  -webkit-transform: translate3d(0, -100px, 0);
  transform: translate3d(0, -100px, 0);
  opacity: 1;
}
i.red{
  color:#BC0213;
}
.gal-container{
  padding-top :75px;
  padding-bottom:75px;
}
footer{
  font-family: 'Quicksand', sans-serif;
}
footer a,footer a:hover{
  color: #88C425;
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
      Portofolio
    </span>
  </div>
</div>

<section>
  <div class="container gal-container">
    <?php 
    foreach ($port->result_array() as $ix) : 
      ?>
      <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
        <div class="box">
          <a href="#" data-toggle="modal" data-target="#<?php echo $ix['portfolio_id']; ?>">
            <img src="<?php echo base_url().'assets/images/'.$ix['portfolio_foto'];?>">
          </a>
          <div class="modal fade" id="<?php echo $ix['portfolio_id']; ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <img src="<?php echo base_url().'assets/images/'.$ix['portfolio_foto'];?>">
                </div>
                <div class="col-md-12 description">
                  <div class="row"> 

                    <div class="col-md-6">
                      <h4><?php echo $ix['portfolio_judul']; ?></h4>
                    </div>
                    <div class="col-md-6 pull-right text-right">
                      <h4><?php echo $ix['user_username']; ?></h4>
                    </div>
                  </div>
                  <div class="row"> 
                    <div class="col-md-12"> 
                      <h4><?php echo $ix['portfolio_keterangan']; ?><br></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</section>

<script src="js/jquery-3.1.1.min.js"></script>
