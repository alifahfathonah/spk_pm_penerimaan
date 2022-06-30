
    
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                    <li> <a href="<?=base_url('admin/divisi')?>"><i class="material-icons">business_center</i> Kelola Data Divisi </a></li>  
                    <li>  <?=$divisi->nama_divisi?></li> 
                </ol>
            <?= $this->session->flashdata('msg') ?>
                <div class="card">
                      <div class="header">
                            <center><h2>Detail Divisi</h2></center>                          
                        </div>
                        <div class="body"> 

                            <?= form_open_multipart('admin/divisi/') ?> 
                           <center>
                               <table class="table table-bordered table-striped table-hover" style="width: 70%">
                              <input type="hidden"  name="emailx"  required  value="<?=$divisi->email?>"  >
                              <input type="hidden"  name="id_divisi"  required  value="<?=$divisi->id_divisi?>"  >
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
                                         <th style="width: 30%">
                                             Nama Divisi
                                         </th>
                                         <td> 
                                            <input type="text" class="form-control" name="nama" placeholder="Nama Divisi" required  value="<?=$divisi->nama_divisi?>"  >
                                         </td>
                                     </tr> 
                                     <tr>
                                         <th style="width: 30%">
                                             Deskripsi
                                         </th>
                                         <td> 
                                            <textarea class="form-control" name="deskripsi" required placeholder="Alamat"><?=$divisi->deskripsi?></textarea>
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
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data divisi?</center></h4> 
                            <center><span style="color :red"><i>Semua data yang terkait dengan divisi ini akan dihapus.</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/divisi')?>" method="Post" >  
                                        <input type="hidden" value="<?=$divisi->email?>" name="email">  
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