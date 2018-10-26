<?php

if(isset($_SESSION['logged_in'])){
  $userid=$_SESSION['userid'];
  $gcusr=$this->m_padmin->get_user($userid);
  $cgusr=$gcusr->row_array();
}
?>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo base_url(); ?>padmin" class="site_title"><i class="fa fa-paw"></i> <span>Admin Panel</span></a>
          </div>
          <div class="clearfix"></div>
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?php echo base_url().'assets/images/'.$cgusr['user_foto'];?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $cgusr['user_username']; ?></h2>
            </div>
          </div>
          <br />
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">

                <?php if($_SESSION['role']=='admin') {?>
                  <li><a href="<?php echo base_url(); ?>padmin"><i class="fa fa-home"></i> Home</a> </li>
                  <li><a><i class="fa fa-file"></i>Data Website<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>type">Data Tipe</a></li>
                      <li><a href="<?php echo base_url();?>shape">Data Shape</a></li>
                      <li><a href="<?php echo base_url();?>kategori">Data Kategori</a></li>
                      <li><a href="<?php echo base_url();?>list">Data List</a></li>
                    </ul>
                  </li>   
                  <li><a><i class="fa fa-cog"></i>Repair & Modification<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>rm_kategori">Kategori</a></li>
                      <li><a href="<?php echo base_url();?>rm_item">Item</a></li>
                    </ul>
                  </li>        
                  <li><a href="<?php echo base_url();?>barang"><i class="fa fa-barcode"></i>Barang</a> </li>
                  <li><a href="<?php echo base_url();?>transaksi"><i class="fa fa-credit-card"></i>Transaksi</a> </li>
                  <li><a href="<?php echo base_url();?>bank"><i class="fa fa-bank"></i>Bank</a> </li>
                  <li><a><i class="fa fa-comments"></i>Forum<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>forum/forum">Thread</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo base_url();?>user"><i class="fa fa-child"></i>User</a> </li>
                  <?php 
                } else if ($_SESSION['role']=='pimpinan') {
                  ?>
                  <li><a><i class="fa fa-comments"></i>Forum<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>forum/forum">Thread</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo base_url();?>laporan"><i class="fa fa-print"></i>Laporan</a> </li>
                  <?php 
                } 
                else {} ?>
              </ul>
          </div>

        </div>
      </div>
    </div>