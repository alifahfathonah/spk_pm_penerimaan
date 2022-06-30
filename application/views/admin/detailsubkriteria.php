 
 <section class="content" >
    <div class="container-fluid"> 
        <div class="row clearfix">
          
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                        <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>

                        <li> <a href="<?=base_url('admin/kriteria')?>"><i class="material-icons">view_list</i> Kelola Data Kriteria</a> </li> 
                        <li> <a href="<?=base_url('admin/kriteria/'.$kriteria->id_kriteria)?>"> <?=$kriteria->nama_kriteria?></a> </li>  
                        <li>  <?=$sub->nama_sub?> </li>  
                    </ol>
        <?= $this->session->flashdata('msg') ?>
                    <div class="card">
                        
                        <div class="body"> 
                            <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
                                    
                                    <tr>
                                         <th style="width: 30%">
                                             Nama Subkriteria
                                         </th>
                                         <td> 
                                          
                                            <?=$sub->nama_sub?>
 
                                         </td>
                                     </tr> 
                                     <tr>
                                         <th style="width: 30%">
                                             Nama Kriteria
                                         </th>
                                         <td> 
                                          
                                            <?=$kriteria->nama_kriteria?>
 
                                         </td>
                                     </tr>   
                                   
                                </tbody>

                            </table>  
                            <center>
                               <a data-toggle="modal" data-target="#delete"  href=""><button class="btn bg-red">Hapus</button></a>
                            <a data-toggle="modal" data-target="#edit"  href=""><button class="btn bg-cyan">Edit</button></a> 
                             </center>
                         </div>
                    </div>

 
                      <div class="card">
                        <div class="header">
                              <center><h2>Indikator SubKriteria</h2></center>                          
                          </div>
                          <div class="body">
                          <a data-toggle="modal" data-target="#tambahindikator"  href=""><button class="btn bg-cyan">Tambah Indikator</button></a>

                              <div class="table-responsive">
                                   <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                      <thead>
                                          <tr>   
                                              <th>No.</th> 
                                              <th>Keterangan</th> 
                                              <th>Minimal</th> 
                                              <th>Maksimal</th> 
                                              <th>Nilai</th> 
                                              <th>Aksi</th> 
                                          </tr>
                                      </thead> 
                                      <tbody>
                                        <?php 
                                        $list_indikator = $this->IndikatorSub_m->get(['id_sub' => $sub->id_sub]);
                                        $i = 1; foreach ($list_indikator as $row): ?> 
                                            <tr>   
                                                <td><?=$i++?></a></td>  
                                                <td><?=$row->keterangan?></td>  
                                                <td><?=$row->min?></td> 
                                                <td><?=$row->max?></td> 
                                                <td><?=$row->nilai?></td>
                                                 <td>
                                                      <a data-toggle="modal" data-target="#edit-<?=$row->id?>"  href=""><button class="btn bg-blue">Edit</button></a>
                                                      <a data-toggle="modal" data-target="#delete-<?=$row->id?>"  href=""><button class="btn bg-red">Hapus</button></a>
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
</section>
 
 
 <div class="modal fade" id="edit" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>EDIT DATA SUB KRITERIA</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/subkriteria')?>" method="Post"  >  
                          <input type="hidden" class="form-control" name="id_kriteria"   required autofocus  value="<?=$kriteria->id_kriteria?>" >
                          <input type="hidden" class="form-control" name="id_sub"   required autofocus  value="<?=$sub->id_sub?>" > 
                           <table class="table table-bordered"> 
                                        <tr>   
                                            <th>Nama Subkriteria</th> 
                                            <th>
                                               <input type="text" class="form-control" name="nama_sub" placeholder="Masukkan Nama Kriteria" required autofocus value="<?=$sub->nama_sub?>" >
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
 

 
  
<?php $i = 1; foreach ($list_indikator as $row): ?> 
  <div class="modal fade" id="edit-<?=$row->id?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Edit Indikator Sub Kriteria</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/subkriteria')?>" method="Post"  > 

                            <input type="hidden" value="<?=$sub->id_sub?>" name="id_sub">   
                            <input type="hidden" value="<?=$row->id?>" name="id">   
                          <table class="table table-bordered"> 
                                        <tr>   
                                            <th>Keterangan</th> 
                                            <th>
                                               <textarea   class="form-control" name="keterangan"  required autofocus ><?=$row->keterangan?></textarea>
                                            </th>  
                                        </tr> 
                                        <tr>   
                                            <th>Minimal </th> 
                                            <th> 
                                               <input type="number" class="form-control" name="minimal"  required autofocus min="0" max="100" value="<?=$row->min?>">
                                            </th>  
                                        </tr> 
                                        <tr>   
                                            <th>Maksimal</th> 
                                            <th>
                                               <input type="number" class="form-control" name="maksimal"  required autofocus min="0" max="100" value="<?=$row->max?>">
                                            </th>  
                                        </tr> 
                                        <tr>   
                                            <th>Nilai</th> 
                                            <th>
                                               <input type="number" class="form-control" name="nilai"  required autofocus min="1" max="5" value="<?=$row->nilai?>">
                                            </th>  
                                        </tr> 
    
                                </table>


                            <input  type="submit" class="btn bg-cyan btn-block btn-lg"  name="edit_indikator" value="Simpan">  <br><br>
                      
                                <?php echo form_close() ?> 
                            </div> 
                            <div class="modal-footer"> 
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                            </div>
                    </div>
                </div>
    </div> 
 
 <div class="modal fade" id="delete-<?=$row->id?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data indikator?</center></h4> 
                            <center><span style="color :red"><i>Semua data yang terkait dengan indikator ini akan dihapus.</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/subkriteria')?>" method="Post" > 
                                        <input type="hidden" value="<?=$sub->id_sub?>" name="id_sub">  
                                        <input type="hidden" value="<?=$row->id?>" name="id">  
                                        <input  type="submit" class="btn bg-red btn-block "  name="hapus_indikator" value="Ya">
                                         
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

  
<div class="modal fade" id="tambahindikator" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Tambah Indikator Sub Kriteria</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/subkriteria')?>" method="Post"  >  
                            <input type="hidden" class="form-control" name="id_sub"   required autofocus  value="<?=$sub->id_sub?>" >
                          <table class="table table-bordered"> 
                                        <tr>   
                                            <th>Keterangan</th> 
                                            <th>
                                               <textarea   class="form-control" name="keterangan"  required autofocus ></textarea>
                                            </th>  
                                        </tr> 
                                        <tr>   
                                            <th>Minimal </th> 
                                            <th> 
                                               <input type="number" class="form-control" name="minimal"  required autofocus min="0" max="100" >
                                            </th>  
                                        </tr> 
                                        <tr>   
                                            <th>Maksimal</th> 
                                            <th>
                                               <input type="number" class="form-control" name="maksimal"  required autofocus min="0" max="100" >
                                            </th>  
                                        </tr> 
                                        <tr>   
                                            <th>Nilai</th> 
                                            <th>
                                               <input type="number" class="form-control" name="nilai"  required autofocus min="1" max="5" >
                                            </th>  
                                        </tr> 
    
                                </table>
                        <input  type="submit" class="btn bg-cyan btn-block btn-lg"  name="tambah_indikator" value="Tambah">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
</div> 
 
 
 <div class="modal fade" id="delete" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data subkriteria?</center></h4> 
                            <center><span style="color :red"><i>Semua data yang terkait dengan subkriteria <?=$sub->nama_sub?> akan dihapus.</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/subkriteria')?>" method="Post" > 
                                        <input type="hidden" value="<?=$kriteria->id_kriteria?>" name="id_kriteria"> 
                                        <input type="hidden" value="<?=$sub->id_sub?>" name="id_sub">  
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