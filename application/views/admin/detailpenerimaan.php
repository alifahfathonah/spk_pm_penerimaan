 
 <section class="content" >
    <div class="container-fluid"> 
        <div class="row clearfix">
          
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                        <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>

                       <li><a href="<?=base_url('admin/penerimaan')?>"><i class="material-icons">person_add</i> Penerimaan Anggota </a></li>  
                        <li>  <?=$penerimaan->nama?> </li>  
                    </ol>
        <?= $this->session->flashdata('msg') ?>
                    <div class="card">
                        
                        <div class="body"> 
                            <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
                                    
                                     <tr>
                                         <th style="width: 30%">
                                             ID penerimaan
                                         </th>
                                         <td> 
                                          
                                            <?=$penerimaan->id_penerimaan?>

                                         </td>
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Nama Penerimaan
                                         </th>
                                         <td> 
                                          
                                            <?=$penerimaan->nama?>
 
                                         </td>
                                     </tr>  
                                     <tr>
                                         <th style="width: 30%">
                                             Tanggal Buat
                                         </th>
                                         <td> 
                                          
                                            <?=date('d-m-Y', strtotime($penerimaan->tgl_buat))?>
 
                                         </td>
                                     </tr>  
                                     <tr>
                                       <th>Status</th>
                                        <td>
                                                <?php
                                                if ($penerimaan->status == 1) {
                                                  echo "Tahap Pendaftaran";
                                                }elseif ($penerimaan->status == 2) {
                                                  echo "Tahap Penilaian";
                                                }elseif ($penerimaan->status == 3) {
                                                  echo "Tahap Pemilihan";
                                                }else{
                                                  echo "Selesai";
                                                }

                                              ?>
                                            </td>
                                     </tr> 
                                   
                                </tbody>

                            </table>  
                            <center>
                                <a data-toggle="modal" data-target="#delete"  href=""><button class="btn bg-red">Hapus</button></a>
                                <a data-toggle="modal" data-target="#edit"  href=""><button class="btn bg-cyan">Edit</button></a>

                                <?php if ($penerimaan->status == 1) { ?> 

                                <a data-toggle="modal" data-target="#tutup"  href=""><button class="btn bg-green">Tutup Tahap Pendaftaran</button></a> 

                                <?php  }elseif ($penerimaan->status == 2){   ?>
                                   <a data-toggle="modal" data-target="#tutup"  href=""><button class="btn bg-green">Tutup Tahap Penilaian</button></a> 
                                <?php  }elseif ($penerimaan->status == 3){   ?>
                                   <a data-toggle="modal" data-target="#selesai"  href=""><button class="btn bg-green">Tutup Tahap Pemilihan</button></a> 
                                <?php  }  ?>
                             </center>
                         </div>
                    </div>


                  <?php if ($penerimaan->status == 1) { ?> 
                      <div class="card">
                        <div class="header">
                              <center><h2>Daftar Peserta</h2></center>                          
                          </div>
                          <div class="body"> 
                              <div class="table-responsive">
                                   <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                      <thead>
                                          <tr>   
                                              <th>ID Peserta</th> 
                                              <th>Nama Peserta</th>  
                                              <th>Aksi</th> 
                                          </tr>
                                      </thead> 
                                      <tbody>
                                        <?php  
                                        $i = 1; foreach ($list_peserta as $row): ?> 
                                            <tr>    
                                                <td><?=$row->id_peserta?></td>  
                                                <td><?=$this->CalonAnggota_m->get_row(['id_calonanggota' => $row->id_calonanggota])->nama_lengkap?></td>  
                                                 <td>
                                                      <a data-toggle="modal" data-target="#lihat-<?=$row->id_peserta?>"  href=""><button class="btn bg-blue">Lihat Detail</button></a> 
                                                 </td>             
                                            </tr>
                                        <?php endforeach; ?>
                                      </tbody>
                                  </table>

       
                              </div>
                          </div>
                      </div>
                  
                  <?php  }  ?>

                  <?php if ($penerimaan->status == 3) { ?> 
                      <div class="card">
                        <div class="header">
                              <center><h2>Daftar Peserta yang terpilih</h2></center>                          
                          </div>
                          <div class="body"> 

                            <a data-toggle="modal" data-target="#pilih"  href=""> 
                              <button class="btn bg-cyan">Pilih Peserta</button>
                            </a> <br><br>
                              <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                      <thead>
                                          <tr>   
                                              <th>ID Peserta</th> 
                                              <th>Nama Peserta</th>  
                                              <th>Jenis Kelamin</th>  
                                              <th>Tempat, Tanggal Lahir</th>  
                                              <th>Divisi</th>   
                                              <th>Aksi</th>   
                                          </tr>
                                      </thead> 
                                      <tbody>
                                        <?php  
                                        
                                        $list_peserta = $this->Peserta_m->get(['id_penerimaan' => $penerimaan->id_penerimaan, 'status' => 1]);
                                        foreach ($list_peserta as $row): ?> 
                                        <?php $cp = $this->CalonAnggota_m->get_row(['id_calonanggota' => $row->id_calonanggota]) ?>
                                            <tr>    
                                                <td><?=$row->id_peserta?></td>  
                                                <td><?=$cp->nama_lengkap?></td> 
                                                <td><?=$cp->jk?></td> 
                                                <td><?=$cp->tempat_lahir?>, <?=date('d-m-Y' , strtotime($cp->tanggal_lahir))?></td> 
                                                <td><?=$this->Divisi_m->get_row(['id_divisi' => $row->keterangan])->nama_divisi?></td> 
                                                <td><a data-toggle="modal" data-target="#batal-<?=$row->id_peserta?>"  href=""><button class="btn bg-red">Batal</button></a></td> 
                                                         
                                            </tr>
                                        <?php endforeach; ?>
                                      </tbody>
                                  </table>

       
                              </div>
                          </div>
                      </div>
                  
                  <?php  }  ?>

                  <?php if ($penerimaan->status == 4) { ?> 
                      <div class="card">
                        <div class="header">
                              <center><h2>Daftar Peserta yang terpilih</h2></center>                          
                          </div>
                          <div class="body"> 
 
                              <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                      <thead>
                                          <tr>   
                                              <th>ID Peserta</th> 
                                              <th>Nama Peserta</th>  
                                              <th>Jenis Kelamin</th>  
                                              <th>Tempat, Tanggal Lahir</th>  
                                              <th>Divisi</th>    
                                          </tr>
                                      </thead> 
                                      <tbody>
                                        <?php  
                                        
                                        $list_peserta = $this->Peserta_m->get(['id_penerimaan' => $penerimaan->id_penerimaan, 'status' => 1]);
                                        foreach ($list_peserta as $row): ?> 
                                        <?php $cp = $this->CalonAnggota_m->get_row(['id_calonanggota' => $row->id_calonanggota]) ?>
                                            <tr>    
                                                <td><?=$row->id_peserta?></td>  
                                                <td><?=$cp->nama_lengkap?></td> 
                                                <td><?=$cp->jk?></td> 
                                                <td><?=$cp->tempat_lahir?>, <?=date('d-m-Y' , strtotime($cp->tanggal_lahir))?></td> 
                                                <td><?=$this->Divisi_m->get_row(['id_divisi' => $row->keterangan])->nama_divisi?></td> 
                                                
                                                         
                                            </tr>
                                        <?php endforeach; ?>
                                      </tbody>
                                  </table>

       
                              </div>
                          </div>
                      </div>
                  
                  <?php  }  ?>
                </div>
    </div>
</section>
 




 <div class="modal fade" id="edit" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>EDIT DATA PENERIMAAN</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/penerimaan')?>" method="Post"  >   

                            <input type="hidden" class="form-control" name="id_penerimaan"   required autofocus  value="<?=$penerimaan->id_penerimaan?>" >
                           <table class="table table-bordered"> 
                                        <tr>   
                                            <th>Nama penerimaan</th> 
                                            <th>
                                               <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama penerimaan" required autofocus value="<?=$penerimaan->nama?>" >
                                            </th>  
                                        </tr> 
 
 
                                </table>
                         
                          
                        <input  type="submit" class="btn bg-cyan btn-block btn-lg"  name="edit" value="Simpan">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
    </div> 
  


<?php if ($penerimaan->status == 1) { ?> 
      
    <?php $i = 1; foreach ($list_peserta as $row): ?> 

    <?php $calonanggota =  $this->CalonAnggota_m->get_row(['id_calonanggota' => $row->id_calonanggota]) ?>
      <div class="modal fade" id="lihat-<?=$row->id_peserta?>" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header"> 
                                <h4 class="modal-title" id="defaultModalLabel"><center>Detail Peserta</center></h4>
                            </div>
                            <div class="modal-body">
                               <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                    <tbody>
                                         
                                          <tr>
                                             <th style="width: 30%">
                                                ID Peserta
                                             </th>
                                             <td> 
                                              
                                                <?=$row->id_peserta?>

                                             </td>
                                         </tr>
                                         <tr>
                                             <th style="width: 30%">
                                                Nama Peserta
                                             </th>
                                             <td> 
                                              
                                                <?=$calonanggota->nama_lengkap?>

                                             </td>
                                         </tr>
                                         <tr>
                                             <th style="width: 30%">
                                                Tempat, Tanggal Lahir
                                             </th>
                                             <td> 
                                              
                                                <?=$calonanggota->tempat_lahir?>, <?=date('d-m-Y', strtotime($calonanggota->tanggal_lahir))?>

                                             </td>
                                         </tr>
                                         <tr>
                                             <th style="width: 30%">
                                                Jenis Kelamin
                                             </th>
                                             <td> 
                                              
                                                <?=$calonanggota->jk?>

                                             </td>
                                         </tr>
                                         <tr>
                                             <th style="width: 30%">
                                                Alamat
                                             </th>
                                             <td> 
                                              
                                                <?=$calonanggota->alamat?>

                                             </td>
                                         </tr>
                                         <tr>
                                             <th style="width: 30%">
                                                Hobi
                                             </th>
                                             <td> 
                                              
                                                <?=$calonanggota->hobi?>

                                             </td>
                                         </tr>
                                         <tr>
                                             <th style="width: 30%">
                                                Pengalaman
                                             </th>
                                             <td> 
                                              
                                                <?=$calonanggota->pengalaman?>

                                             </td>
                                         </tr>
     
                                       
                                    </tbody>

                                </table> 
                            
                                </div> 
                                <div class="modal-footer"> 
                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                                </div>
                        </div>
                    </div>
        </div> 
      
    <?php endforeach; ?> 

     <div class="modal fade" id="tutup" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header"> 
                                <h4 class="modal-title" id="defaultModalLabel"><center>Tahap Pendaftaran Selesai?</center></h4> 
                                <center><span style="color :red"><i>tahap pendaftaran akan ditutup dan akan beralih ke tahap penilaian</i></span></center>
                            </div>
                            <div class="modal-body"> 
                           
                             <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                            <form action="<?= base_url('admin/penerimaan')?>" method="Post" > 
                                            <input type="hidden" value="<?=$penerimaan->id_penerimaan?>" name="id_penerimaan">  
                                            <input  type="submit" class="btn bg-green btn-block "  name="tutup" value="Ya">
                                             
                                        </div>
                                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                              <button type="button"  class="btn bg-red btn-block" data-dismiss="modal">Tidak</button>
                                        </div>
                                <?php echo form_close() ?> 
                                    </div>
                            </div> 
                        </div>
                    </div>
        </div>


<?php  }elseif ($penerimaan->status == 2){   ?>
  <div class="modal fade" id="tutup" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header"> 
                                <h4 class="modal-title" id="defaultModalLabel"><center>Tahap Penilaian Selesai?</center></h4> 
                                <center><span style="color :red"><i>tahap penilaian akan ditutup dan akan beralih ke tahap pemilihan</i></span></center>
                            </div>
                            <div class="modal-body"> 
                           
                             <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                            <form action="<?= base_url('admin/penerimaan')?>" method="Post" > 
                                            <input type="hidden" value="<?=$penerimaan->id_penerimaan?>" name="id_penerimaan">  
                                            <input  type="submit" class="btn bg-green btn-block "  name="tutup2" value="Ya">
                                             
                                        </div>
                                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                              <button type="button"  class="btn bg-red btn-block" data-dismiss="modal">Tidak</button>
                                        </div>
                                <?php echo form_close() ?> 
                                    </div>
                            </div> 
                        </div>
                    </div>
        </div>

<?php  }elseif ($penerimaan->status == 3){   ?>
    <div class="modal fade" id="pilih" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>PILIH PESERTA</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/penerimaan')?>" method="Post"  >  
                            
                            <input type="hidden" name="id_penerimaan" value="<?=$penerimaan->id_penerimaan?>" >
                            <table class="table table-bordered">
                              <tr>
                                <th style="width: 60%">Nama Peserta</th>
                                <td>
                                  <select class="form-control" name="id_peserta" required>
                                    <option value="">Pilih Peserta</option>
                                    <?php
                                     $list_peserta = $this->Peserta_m->get(['id_penerimaan' => $penerimaan->id_penerimaan, 'status' => 0]);
                                      foreach ($list_peserta as $k): ?> 
                                    <?php $peserta = $this->CalonAnggota_m->get_row(['id_calonanggota' => $k->id_calonanggota]) ?>
                                    <?php if ($this->Penilaian_m->get_num_row(['id_peserta' => $k->id_peserta,'id_penerimaan' => $penerimaan->id_penerimaan,'id_divisi' => $divisi->id_divisi]) == 0) { ?>
                                      <option value="<?=$k->id_peserta?>"> [<?=$k->id_peserta?>]  <?=$peserta->nama_lengkap?></option>
                                    <?php } endforeach; ?>
                                  </select>
                                </td>
                              </tr>
 
                                <tr>
                                    <th style="width: 60%">Divisi</th>

                                    <td>
                                         <select class="form-control" name="id_divisi" required>
                                            <option value="">Pilih Divisi</option>
                                            <?php
                                             
                                              foreach ($list_divisi as $k): ?>  
                                            
                                              <option value="<?=$k->id_divisi?>"> [<?=$k->id_divisi?>]  <?=$k->nama_divisi?></option>
                                            <?php  endforeach; ?>
                                    </td>
                                </tr> 
                              
                            </table>
                                
                        <input  type="submit" class="btn bg-cyan btn-block"  name="pilih" value="Submit">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
</div> 

<?php  $list_peserta = $this->Peserta_m->get(['id_penerimaan' => $penerimaan->id_penerimaan, 'status' => 1]);
    foreach ($list_peserta as $row): ?> 
         <div class="modal fade" id="batal-<?=$row->id_peserta?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>batalkan peserta dari pilihan?</center></h4> 
                           
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/penerimaan')?>" method="Post" > 
                                        <input type="hidden" value="<?=$penerimaan->id_penerimaan?>" name="id_penerimaan"> 
                                        <input type="hidden" value="<?=$row->id_peserta?>" name="id_peserta">  
                                        <input  type="submit" class="btn bg-red btn-block "  name="batal" value="Ya">
                                         
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
    <?php endforeach; ?>

?>


 <div class="modal fade" id="selesai" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header"> 
                                <h4 class="modal-title" id="defaultModalLabel"><center>Tahap Pemilihan Selesai?</center></h4> 
                                <center><span style="color :red"><i>tahap pemilihan akan ditutup, pengumuman akan dikirim ke calon anggota</i></span></center>
                            </div>
                            <div class="modal-body"> 
                           
                             <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                            <form action="<?= base_url('admin/penerimaan')?>" method="Post" > 
                                            <input type="hidden" value="<?=$penerimaan->id_penerimaan?>" name="id_penerimaan">  
                                            <input  type="submit" class="btn bg-green btn-block "  name="selesai" value="Ya">
                                             
                                        </div>
                                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                              <button type="button"  class="btn bg-red btn-block" data-dismiss="modal">Tidak</button>
                                        </div>
                                <?php echo form_close() ?> 
                                    </div>
                            </div> 
                        </div>
                    </div>
        </div>


<?php  }  ?>

 <div class="modal fade" id="delete" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data penerimaan?</center></h4> 
                            <center><span style="color :red"><i>Semua data yang terkait dengan <?=$penerimaan->nama?> akan dihapus.</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/penerimaan')?>" method="Post" > 
                                        <input type="hidden" value="<?=$penerimaan->id_penerimaan?>" name="id_penerimaan">  
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