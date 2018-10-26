  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data <small>Data Shape</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="#myModaltambah" class="btn btn-default" id="custId" data-toggle="modal" ><i class="fa fa-plus-circle"></i> Tambah Data Shape</a></li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tipe</th>
                    <th>Nama Shape</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  foreach ($data->result_array() as $i) :
                   $no++;
                   ?>
                   <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $i['type_nama']; ?></td>
                    <td><?php echo $i['shape_nama']; ?></td>
                    <td><img src="<?php echo base_url().'assets/images/'.$i['shape_gambar'];?>" style="width:80px;"></td>
                    <td>
                     <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $i['shape_id'];?>"><span class="fa fa-pencil"></span></a>
                     <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $i['shape_id'];?>"><span class="fa fa-trash"></span></a></td>
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
        <h4 class="modal-title" id="myModalLabel">Tambah Shape</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data">
          <form class="form-horizontal form-label-left" action="<?php echo base_url()?>padmin/save_shape" method="POST" enctype="multipart/form-data">
           <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipe</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
             <select name="tipe" class="form-control">
              <?php foreach ($tipe->result_array() as $j) :  ?>
                <option value="<?php echo $j['type_id']; ?>" class="form-control"><?php echo $j['type_nama']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Shape</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" name="shape_nama" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="file" name="filefoto" class="form-control">
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
  
  <div class="modal fade" id="ModalEdit<?php echo $i['shape_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Shape</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/update_shape'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">       
            <input type="hidden" name="kode" value="<?php echo $i['shape_id'];?>"/> 
            <input type="hidden" value="<?php echo $i['shape_gambar'];?>" name="gambar">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipe</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select name="tipe" class="form-control">
                  <?php foreach ($tipe->result_array() as $j) :  ?>
                    <option value="<?php echo $j['type_id']; ?>" class="form-control"><?php echo $j['type_nama']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Shape</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="shape_nama" value="<?php echo $i['shape_nama'];?>" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
              <div class="col-md-9 col-sm-9 col-xs-12 image-responsive">
               <img src="<?php echo base_url().'assets/images/'.$i['shape_gambar'];?>" height="100px" class="image-responsive">
             </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ganti Foto?</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="file" name="filefoto"/>
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

<?php foreach ($data->result_array() as $i) :
  ?>
  <div class="modal fade" id="ModalHapus<?php echo $i['shape_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Shape</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/delete_shape'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">       
           <input type="hidden" name="kode" value="<?php echo $i['shape_id'];?>"/> 
           <input type="hidden" value="<?php echo $i['shape_gambar'];?>" name="gambar">
           <p>Apakah Anda yakin mau menghapus Shape <b><?php echo $i['shape_nama'];?></b> ?</p>

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
