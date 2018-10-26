  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data <small>Data Bank</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="#myModaltambah" class="btn btn-default" id="custId" data-toggle="modal" ><i class="fa fa-plus-circle"></i> Tambah Data Bank</a></li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Bank</th>
                    <th>Nama Pemilik</th>
                    <th>Nomor Rekening</th>
                    <th>Logo</th>
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
                    <td><?php echo $i['bank_nama']; ?></td>
                    <td><?php echo $i['bank_pemilik']; ?></td>
                    <td><?php echo $i['bank_norek']; ?></td>
                    <td><img src="<?php echo base_url().'assets/images/'.$i['bank_file'];?>" style="width:80px;"></td>
                    <td>
                     <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $i['bank_id'];?>"><span class="fa fa-pencil"></span></a>
                     <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $i['bank_id'];?>"><span class="fa fa-trash"></span></a></td>
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
        <h4 class="modal-title" id="myModalLabel">Tambah bank</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data">
          <form class="form-horizontal form-label-left" action="<?php echo base_url()?>padmin/save_bank" method="POST" enctype="multipart/form-data">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Bank</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="bank" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pemilik</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="pemilik" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Rekening</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="norek" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Logo</label>
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

<?php foreach ($data->result_array() as $i) :  ?>

  <div class="modal fade" id="ModalEdit<?php echo $i['bank_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Edit bank</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/update_bank'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">       
            <input type="hidden" name="kode" value="<?php echo $i['bank_id'];?>"/> 

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Bank</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="bank" class="form-control" value="<?php echo $i['bank_nama']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pemilik</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="pemilik" class="form-control" value="<?php echo $i['bank_pemilik']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Rekening</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="norek" class="form-control" value="<?php echo $i['bank_norek']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <img src="<?php echo base_url().'assets/images/'.$i['bank_file'];?>" class="img img-responsive" style="width:80px;">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Ganti Logo</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="file" name="filefoto" class="form-control">
                <span>*Kosongkan jika tidak ingin mengganti logo bank</span>
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
  <div class="modal fade" id="ModalHapus<?php echo $i['bank_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus bank</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/delete_bank'?>" method="post" >
          <div class="modal-body">       
           <input type="hidden" name="kode" value="<?php echo $i['bank_id'];?>"/> 
           <p>Apakah Anda yakin mau menghapus bank <b><?php echo $i['bank_nama'];?></b> ?</p>

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
