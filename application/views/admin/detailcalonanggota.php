
    
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                        <li> <a href="<?=base_url('admin/calonanggota')?>"><i class="material-icons">people</i> Kelola Data calonanggota </a> </li>  
                    <li>  <?=$calonanggota->nama_lengkap?></li> 
                </ol>
            <?= $this->session->flashdata('msg') ?>
                <div class="card">
                      <div class="header">
                            <center><h2>Detail Calon Anggota</h2></center>                          
                        </div>
                        <div class="body"> 

                            <?= form_open_multipart('admin/tambahcalonanggota/') ?>
                            <input type="hidden" name="email_x" value="<?=$calonanggota->email?>">
                            <input type="hidden" name="id_calonanggota" value="<?=$calonanggota->id_calonanggota?>">
                           <center>
                               <table class="table table-bordered table-striped table-hover" style="width: 70%">
                              <input type="hidden"  name="emailx"  required  value="<?=$calonanggota->email?>"  >
                              <input type="hidden"  name="id_calonanggota"  required  value="<?=$calonanggota->id_calonanggota?>"  >
                                <tbody>
                                    <tr>
                                         <th style="width: 30%">
                                             Email
                                         </th>
                                         <td> 
                                            <input type="text" class="form-control" name="email" placeholder="Email" required  value="<?=$calonanggota->email?>"  >
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
                                         </th>
                                         <td> 
                                            <div class="row clearfix">
                                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required  value="<?=$calonanggota->tempat_lahir?>"  >
                                              </div>
                                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <input type="date" class="form-control" name="tanggal_lahir" placeholder="Nama" required  value="<?=$calonanggota->tanggal_lahir?>"  >
                                              </div>
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

                             <?php echo form_close() ?> 

                              <a data-toggle="modal" data-target="#delete"  href=""><button class="btn bg-red">Hapus</button></a>
     
                            </div>
                        </div>
                    </div>
            </div>
           
          </div>
        </div>
    </section>
 

 <div class="modal fade" id="delete" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data calonanggota?</center></h4> 
                            <center><span style="color :red"><i>Semua data yang terkait dengan calonanggota ini akan dihapus.</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/tambahcalonanggota')?>" method="Post" >  
                                        <input type="hidden" value="<?=$calonanggota->email?>" name="email">  
                                        <input  type="submit" class="btn bg-red btn-block "  name="hapus" value="Ya">
                                         
                                    </div>
                                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                          <button type="button"  class="btn bg-green btn-block" data-dismiss="modal">Tidak</button>
                                    </div>
                            <?php echo form_close() ?> 
                                </div>
                        </div> 
                    </div>
                </div>
    </div>