 
 <section class="content" >
    <div class="container-fluid"> 
        <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix"> 
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                        <li><a href="<?=base_url()?>"><i class="material-icons">home</i>Beranda</a></li>
                        <li><i class="material-icons">person</i> Profil</li> 
                         
                    </ol>
                    <div class="card">
                        
                        <div class="body"> 
                          <form action="<?= base_url('divisi/proses_edit_profil')?>" method="Post"  > 
                            <center>
                              <table class="table table-bordered table-striped table-hover" style="width: 70%">
                              <input type="hidden"  name="emailx"  required  value="<?=$profil->email?>"  >
                              <input type="hidden"  name="id_calonanggota"  required  value="<?=$divisi->id_divisi?>"  >
                                <tbody>
                                    <tr>
                                         <th style="width: 30%">
                                             Email
                                         </th>
                                         <td> 
                                            <input type="text" class="form-control" name="email" placeholder="Email" required  value="<?=$divisi->email?>"  >
                                         </td>
                                     </tr> 

                                     <tr>
                                       <th colspan="2">
                                          <center>
                                            <input type="submit" name="edit" class="btn bg-cyan d-flex justify-content-between" value="Simpan">
                                          </center>
                                       </th>
    
                                </tbody>

                            </table>  
                            </center>  
                              <a data-toggle="modal" data-target="#gantipass"  href=""><button class="btn bg-blue d-flex justify-content-start">Edit Kata Sandi</button></a>
                             
                            
                              
                           </form>
                         </div>
                    </div>

                     
        </div>
    </div>
</section>




 
  



  <div class="modal fade" id="gantipass" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content"> 
                    <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel"><center>EDIT KATA SANDI</center></h4>
                        </div>
                        <div class="modal-body">

                         <div class="row">
                            <form action="<?= base_url('calonanggota/proses_edit_profil')?>" method="Post" id="editform2"> 
                            
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