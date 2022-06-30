
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>
                    <li> <i class="material-icons">business_center</i> Kelola Data Divisi </li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>KELOLA DATA KRITERIA</h2></center>                          
                        </div>
                        <div class="body">
                       
                          <a data-toggle="modal" data-target="#tambah"  href=""><button class="btn bg-blue">Tambah Divisi</button></a>
                          <br>
                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>NO</th> 
                                            <th>NAMA DIVISI</th>
                                            <th>EMAIL</th>  
                                            <th>DESKRIPSI</th>  
                                            <th>AKSI</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php $i = 1; foreach ($list_divisi as $row): ?> 
                                          <tr>   
                                              <td><?=$i++?> </td>  
                                              <td><?=$row->nama_divisi?>  </td> 
                                              <td> <?=$row->email?></td>    
                                              <td> <?=$row->deskripsi?></td>    
                                               <td>
                                                  <a href="<?=base_url('admin/divisi/'.$row->id_divisi)?>"> 
                                                    <button class="btn bg-cyan ">
                                                      Lihat
                                                    </button>
                                                  </a> 
                                               </td>        
                                          </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>

     
                            </div>
                        </div>
                    </div>
            </div>
           
          </div>
        </div>
    </section>
 
  <div class="modal fade" id="tambah" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>FORM TAMBAH DIVISI</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/divisi')?>" method="Post"  >  
                          
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">assignment</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" placeholder="Email Akun Divisi" required autofocus  >
                                    </div>
                          </div> 
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">assignment</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="password" placeholder="Password Akun Divisi" required autofocus  >
                                    </div>
                          </div> 
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">assignment</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Divisi" required autofocus  >
                                    </div>
                          </div> 

                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">assignment</i>
                                    </span>
                                    <div class="form-line">
                                        <textarea  class="form-control" name="deskripsi" placeholder="Deskripsi" required autofocus  ></textarea>
                                    </div>
                          </div>  
 
                        <input  type="submit" class="btn bg-blue btn-block btn-lg"  name="tambah" value="Tambah">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
</div> 


<?php $i = 1; foreach ($list_divisi as $row): ?> 
 <div class="modal fade" id="delete-<?=$row->id_divisi?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data kriteria?</center></h4> 
                            <center><span style="color :red"><i>Semua data yang terkait dengan <?=$row->nama_kriteria?> akan dihapus.</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/kriteria')?>" method="Post" > 
                                        <input type="hidden" value="<?=$row->id_divisi?>" name="id_divisi">  
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
<?php endforeach; ?>