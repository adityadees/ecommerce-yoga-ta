<?php $b=$inbox->row_array(); ?>

<style type="text/css">
body{ margin-top:50px;}
.nav-tabs .glyphicon:not(.no-margin) { margin-right:10px; }
.tab-pane .list-group-item:first-child {border-top-right-radius: 0px;border-top-left-radius: 0px;}
.tab-pane .list-group-item:last-child {border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;}
.tab-pane .list-group .checkbox { display: inline-block;margin: 0px; }
.tab-pane .list-group input[type="checkbox"]{ margin-top: 2px; }
.tab-pane .list-group .glyphicon { margin-right:5px; }
.tab-pane .list-group .glyphicon:hover { color:#FFBC00; }
a.list-group-item.read { color: #222;background-color: #F3F3F3; }
hr { margin-top: 5px;margin-bottom: 10px; }
.nav-pills>li>a {padding: 5px 10px;}

.ad { padding: 5px;background: #F5F5F5;color: #222;font-size: 80%;border: 1px solid #E5E5E5; }
.ad a.title {color: #15C;text-decoration: none;font-weight: bold;font-size: 110%;}
.ad a.url {color: #093;text-decoration: none;}
</style>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<div style="margin-top: 100px"></div>
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="<?php echo base_url()?>" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            My Account
        </span>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-xl-3 p-b-50 p-t-30">
            <div class="list-group">
                <a href="<?php echo base_url()?>account" class="list-group-item list-group-item-action">
                    Dashboard
                </a>
                <a href="<?php echo base_url()?>account/transaksi" class="list-group-item list-group-item-action">Transaksi</a>
                <a href="<?php echo base_url()?>account/setting" class="list-group-item list-group-item-action">Setting</a>
                <a href="<?php echo base_url()?>account/portfolio" class="list-group-item list-group-item-action">Portfolio</a>
                <a href="<?php echo base_url()?>account/inbox" class="list-group-item list-group-item-action active">Inbox</a>
            </div>
        </div>


        <div class="col-sm-9 col-md-9">

            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab"><span class="glyphicon glyphicon-inbox">
                </span>Pesan</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <div class="list-group">
                        <span class="list-group-item">
                            <h4>
                                Invoice : <?php echo $b['cart_kode']; ?>
                            </h4>
                            <?php echo $b['pesan_message']; ?>
                        </span>  
                        <span class="list-group-item">
                         <a href="<?php echo base_url(); ?>frontend/download/<?php echo $b['pesan_id']; ?>"><i class="glyphicon glyphicon-paperclip"> <?php echo $b['pesan_file']; ?> </i></a>

                         <p class="pull-right"><?php echo date('d-m-Y H:i:s',strtotime($b['pesan_tanggal'])); ?></p>
                     </span>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>
