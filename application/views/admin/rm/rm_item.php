  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data <small>Data Repair / Modif</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="#myModaltambah" class="btn btn-default" id="custId" data-toggle="modal" ><i class="fa fa-plus-circle"></i> Tambah Data Repair / Modif</a></li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Biaya</th>
                    <th>Jenis</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($data->result_array() as $i) :
                   ?>
                   <tr>
                    <td><?php echo $i['rm_kode']; ?></td>
                    <td><?php echo $i['rm_nama']; ?></td>
                    <td><?php echo "Rp ".number_format($i['rm_harga']) ?></td>
                    <td><?php echo $i['rm_kategori_nama']." (".$i['rm_kategori_jenis'].")"; ?></td>
                    <td>
                     <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $i['rm_kode'];?>"><span class="fa fa-pencil"></span></a>
                     <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $i['rm_kode'];?>"><span class="fa fa-trash"></span></a></td>
                   </tr>
                 <?php endforeach;?>
               </tbody>
             </table>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>


 <div class="modal fade bs-example-modal-lg" id="myModaltambah" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Tambah Repair / Modif</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data">
          <form class="form-horizontal form-label-left" action="<?php echo base_url()?>padmin/save_repairmodif" method="POST" enctype="multipart/form-data">

            <?php
            $st="RM";
            $date=date('ymd');
            $ran=rand(0,999);
            $rn=rand(0,10);
            $new_kode=$st.$date.$ran.$rn;
            ?>

            <input type="hidden" name="rm_kode" value="<?php echo $new_kode?>">


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select name="rm_kategori_jenis" class="form-control">
                  <?php foreach ($kategori->result_array() as $i ) : ?>
                    <option value="<?php echo $i['rm_kategori_id']; ?>"><?php echo $i['rm_kategori_nama']." - ".$i['rm_kategori_jenis']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="rm_nama" class="form-control">
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="rm_harga" class="form-control">
              </div>
            </div>



            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-success">Submit</button>
             </div>
           </div>

         </form>
       </div>
     </div>

   </div>
 </div>
</div>

<?php foreach ($data->result_array() as $i) :
  ?>
  
  <div class="modal fade" id="ModalEdit<?php echo $i['rm_kode'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Repair / Modif</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/update_repairmodif'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">       
            <input type="hidden" name="kode" value="<?php echo $i['rm_kode'];?>"/> 


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select name="rm_kategori_jenis" class="form-control">
                  <?php foreach ($kategori->result_array() as $j ) : ?>
                    <option value="<?php echo $j['rm_kategori_id']; ?>" <?php if($i['rm_kategori_id']==$j['rm_kategori_id']){echo "selected";} else {} ?>><?php echo $j['rm_kategori_nama']." - ".$j['rm_kategori_jenis']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="rm_nama" class="form-control" value="<?php echo $i['rm_nama']; ?>">
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="rm_harga" value="<?php echo $i['rm_harga']; ?>" class="form-control">
              </div>
            </div>




          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach;?>
<!--Modal Edit Album-->

<?php foreach ($data->result_array() as $i) :
  ?>
  <!--Modal Hapus Pengguna-->
  <div class="modal fade" id="ModalHapus<?php echo $i['rm_kode'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Repair / Modif</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/delete_repairmodif'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">       
           <input type="hidden" name="kode" value="<?php echo $i['rm_kode'];?>"/> 
           <p>Apakah Anda yakin mau menghapus data <b><?php echo $i['rm_nama'];?></b> ?</p>

         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>


<script src="js/jquery-3.1.1.min.js"></script>
