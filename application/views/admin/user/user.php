  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data <small>Data User</small></h2>
       
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Jenis Kelamin</th>
                  <th>Telepon</th>
                  <th>Role</th>
                  <th>Last Login</th>
                  <th>Foto</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=0;
                foreach ($data->result_array() as $i) :
                 $no++;
                 ?>
                 <tr>
                  <td><?php echo $i['user_nama']; ?></td>
                  <td><?php echo $i['user_username']; ?></td>
                  <td><?php echo $i['user_email']; ?></td>
                  <td><?php if($i['user_jk']=='L'){echo "Laki - Laki";} else {echo "Perempuan";} ?></td>
                  <td><?php echo $i['user_tel']; ?></td>
                  <td><?php echo $i['user_role']; ?></td>
                  <td><?php echo $i['user_last_login']; ?></td>
                  <td><img src="<?php echo base_url().'assets/images/'.$i['user_foto'];?>" style="width:80px;"></td>
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



<script src="js/jquery-3.1.1.min.js"></script>
