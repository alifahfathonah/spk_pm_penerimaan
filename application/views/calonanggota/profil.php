 
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
                          <form action="<?= base_url('calonanggota/proses_edit_profil')?>" method="Post"  > 
                            <center>
                              <table class="table table-bordered table-striped table-hover" style="width: 70%">
                              <input type="hidden"  name="emailx"  required  value="<?=$profil->email?>"  >
                              <input type="hidden"  name="id_calonanggota"  required  value="<?=$calonanggota->id_calonanggota?>"  >
                                <tbody>
                                    <tr>
                                         <th style="width: 30%">
                                             Email
                                         </th>
                                         <td> 
                                            <input type="text" class="form-control" name="email" placeholder="Email" required  value="<?=$profil->email?>"  >
                                         </td>
                                     </tr>
                                    <tr>
                                         <th style="width: 30%">
                                             Nama Lengkap
                                         </th>
                                         <td> 
                                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required  value="<?=$calonanggota->nama_lengkap?>"  >
                                         </td>
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Tempat, Tanggal Lahir 

                                             <?php 

                                              $date = date('m-d-Y');
                                              $date1 = str_replace('-', '/', $date);
                                              $tomorrow = date('Y-m-d',strtotime($date1 . "-18 years"));
                                                
                                            ?>



                                         </th>
                                         <td> 
                                            <div class="row clearfix">
                                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required  value="<?=$calonanggota->tempat_lahir?>"  >
                                              </div>

                                              <?php if ($calonanggota->tanggal_lahir == NULL) { ?>
                                               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <input type="date" class="form-control" name="tanggal_lahir" placeholder="Nama" required  value="<?=$tomorrow;?>"  max="<?=$tomorrow;?>"><i style="color: red">Minimal umur 18 tahun</i>
                                              </div>
                                             <?php  } else {  ?>

                                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <input type="date" class="form-control" name="tanggal_lahir" placeholder="Nama" required  value="<?=$calonanggota->tanggal_lahir;?>"  max="<?=$tomorrow;?>"><i style="color: red">Minimal umur 18 tahun</i>
                                              </div>


                                             <?php } ?>
                                              
                                            </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Jenis Kelamin
                                         </th>
                                         <td> 
                                              <input class="custom-control-input" name="jk" value="Laki - Laki" id="customRadio5-<?=$calonanggota->id_calonanggota?>" <?php if ($calonanggota->jk == 'Laki - Laki') { echo "checked";    } ?> type="radio">
                                                <label class="custom-control-label" for="customRadio5-<?=$calonanggota->id_calonanggota?>">Laki - Laki</label>  
                                                <input class="custom-control-input" name="jk" value="Perempuan" id="customRadio6-<?=$calonanggota->id_calonanggota?>" <?php if ($calonanggota->jk == 'Perempuan') { echo "checked";    } ?>  type="radio">
                                                <label class="custom-control-label" for="customRadio6-<?=$calonanggota->id_calonanggota?>">Perempuan</label> 

                                         </td>
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Alamat
                                         </th>
                                         <td> 
                                            <textarea class="form-control" name="alamat" required placeholder="Alamat"><?=$calonanggota->alamat?></textarea>
                                         </td>
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Hobi
                                         </th>
                                         <td> 
                                            <textarea class="form-control" name="hobi" required placeholder="Hobi"><?=$calonanggota->hobi?></textarea>
                                         </td>
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Pengalaman Organisasi
                                         </th>
                                         <td> 
                                            <textarea class="form-control" name="pengalaman" required placeholder="Pengalaman Organisasi"><?=$calonanggota->pengalaman?></textarea>
                                         </td>
                                     </tr>
                                     
                                     <tr>
                                       <th colspan="2">
                                          <center>
                                            <input type="submit" name="edit" class="btn bg-cyan d-flex justify-content-between" value="Simpan">
                                          </center>
                                       </th>
                                     </tr>
                                     
 
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