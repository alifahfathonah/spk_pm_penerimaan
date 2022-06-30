red
 <section class="content" >
    <div class="container-fluid"> 
        <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
          
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                        <li><a href="<?=base_url()?>"><i class="material-icons">apps</i>Beranda</a></li>
                        <li><i class="material-icons">person</i> Profil</li> 
                         
                    </ol>
                    <div class="card">
                        
                        <div class="body"> 
                            <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody> 
                                     <tr>
                                         <th style="width: 30%">
                                             Email
                                         </th>
                                         <td> 
                                            <?=$profil->email?>
                                         </td>
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Role
                                         </th>
                                         <td> 
                                             <?php

                                             if ($profil->role == 1) {
                                               echo "Admin";
                                             }elseif ($profil->role == 2) {
                                                echo "Produser";
                                             }elseif ($profil->role == 3) {
                                                echo "Penilai";
                                             }

                                             ?>
                                         </td>
                                     </tr>
                                     
 
                                </tbody>

                            </table>   
                             <center> 
                             <a data-toggle="modal" data-target="#edit"  href=""><button class="btn bg-cyan">Edit</button></a>
                            
                             <a data-toggle="modal" data-target="#gantipass"  href=""><button class="btn bg-blue">Edit Kata Sandi</button></a>
                             </center>
                         </div>
                    </div>

                     
        </div>
    </div>
</section>




  
 <div class="modal fade" id="edit" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>EDIT PROFIL</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/proses_edit_profil')?>" method="Post"  >   
                            <input type="hidden" name="emailx"  value="<?=$profil->email?>"  > 
                            
                            <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required  value="<?=$profil->email?>"  >
                                    </div>
                          </div> 
                         

                         
                          
                        <input  type="submit" class="btn bg-cyan btn-block btn-lg"  name="edit" value="Simpan"> 
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
    </div> 

  



  <div class="modal fade" id="gantipass" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content"> 
                    <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel"><center>EDIT KATA SANDI</center></h4>
                        </div>
                        <div class="modal-body">

                         <div class="row">
                            <form action="<?= base_url('admin/proses_edit_profil')?>" method="Post" id="editform2"> 
                            
                           <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                              <i class="material-icons">lock</i>
                                          </span>
                                          <div class="form-line">
                                              <input type="password" class="form-control" name="passlama" id="passlama" placeholder="Kata sandi saat ini" required>  
                                          </div>
                                           <div class="help-info" id="pesan4_ks"> </div>
                                      </div>  
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                              <i class="material-icons">lock</i>
                                          </span>
                                          <div class="form-line">
                                              <input type="password" class="form-control" name="pass1" id="pass1_ks" placeholder="Kata sandi baru" required>  
                                          </div>
                                           <div class="help-info" id="pesan2_ks"> </div>
                                      </div>  
                                    </div>
                                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                              <i class="material-icons">lock_outline</i>
                                          </span>
                                          <div class="form-line">
                                              <input type="password" class="form-control" name="pass2"  id="pass2_ks"  placeholder="Konfirmasi kata sandi" required>  
                                          </div>

                                           <div class="help-info" id="pesan3_ks"> </div>
                                      </div>  
                                    </div>
                          </div>

                           
                           <input  type="submit" class="btn bg-cyan btn-block btn-lg"  name="edit2" value="Simpan"> 
                  
                            <?php echo form_close() ?>  
                         </div>
                        </div> 
                    </div>
                </div>
    </div>  