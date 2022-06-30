 
 <section class="content" >
    <div class="container-fluid"> 
        <div class="row clearfix">
          
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                        <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>

                       <li><a href="<?=base_url('divisi/')?>"><i class="material-icons">person_add</i> Penerimaan Anggota </a></li>  
                        <li>  <?=$penerimaan->nama?> </li>  
                    </ol>
                    <?= $this->session->flashdata('msg') ?>
                    <div class="card">
                        
                        <div class="body"> 
                            <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
                                     
                                      
                                     <tr>
                                         <th style="width: 30%">
                                             ID Penerimaan
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
                           
                         </div>
                    </div>

                    <div class="card">
                        
                        <div class="body"> 
                            <a data-toggle="modal" data-target="#input"  href=""> 
                              <button class="btn bg-cyan">Input Nilai Peserta</button>
                            </a> 
                            <a data-toggle="modal" data-target="#standar"  href=""> 
                              <button class="btn bg-blue">Nilai Standar Kriteria</button>
                            </a> 
                            <a href="<?=base_url('divisi/penilaian/'.$penerimaan->id_penerimaan.'/pm')?>" >
                              <button class="btn bg-green">Detail Perhitungan (Profile Matching)</button>
                            </a> 
                           
                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                              <thead >
                                <tr>  
                                  <th>Peringkat</th>
                                  <th>ID Peserta</th>  
                                  <th>Nama Peserta</th>   
                                  <th>Hasil Akhir</th>  
                                  <th><center>Aksi</center></th> 
                                </tr>
                              </thead>
                              <tbody  >

                               <?php $i = 1; foreach ($rank as $row): ?> 
                               <?php if ($this->Penilaian_m->get_num_row(['id_penerimaan' => $penerimaan->id_penerimaan, 'id_peserta' => $row['id_peserta'] ,'id_divisi' => $divisi->id_divisi] ) != 0) {
                                  $peserta = $this->Peserta_m->get_row(['id_peserta' => $row['id_peserta']]);
                                ?>
                                
                                <tr> 
                                  <td><?=$i++?></td>
                                  <td>
                                    <?=$peserta->id_peserta?>
                                  </td> 
                                  <td>
                                    <?=$this->CalonAnggota_m->get_row(['id_calonanggota' => $peserta->id_calonanggota])->nama_lengkap?>
                                  </td> 
                                  <th>
                                    <?=$row['n']?>
                                  </th>   
               
                                  <td class="text-right">
                                    <center>
                                      <a href="" data-toggle="modal" data-target="#edit-<?=$peserta->id_peserta?>">
                                      <button type="button" class="btn bg-cyan btn-icon"> 
                                        <span class="btn-inner--text">Edit Nilai</span>
                                      </button>
                                    </a>
                                    <a href="" data-toggle="modal" data-target="#delete2-<?=$peserta->id_peserta?>">
                                      <button type="button" class="btn bg-red btn-icon"> 
                                        <span class="btn-inner--text">Hapus</span>
                                      </button>
                                    </a>
                                    </center>
                                     
                                  </td> 
                                </tr>
                                <?php } endforeach; ?>
                              </tbody>
                          </table>
                        </div>
                         </div>
                    </div>
 
                </div>
    </div>
</section>
  

<div class="modal fade" id="input" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>FORM INPUT NILAI</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('divisi/penilaian')?>" method="Post"  >  
                            
                            <input type="hidden" name="id_penerimaan" value="<?=$penerimaan->id_penerimaan?>" >
                            <table class="table table-bordered">
                              <tr>
                                <th style="width: 25%">Nama Peserta</th>
                                <td colspan="2">
                                  <select class="form-control" name="id_peserta" required>
                                    <option value="">Pilih Peserta</option>
                                    <?php  foreach ($list_peserta as $k): ?> 
                                    <?php $peserta = $this->CalonAnggota_m->get_row(['id_calonanggota' => $k->id_calonanggota]) ?>
                                    <?php if ($this->Penilaian_m->get_num_row(['id_peserta' => $k->id_peserta,'id_penerimaan' => $penerimaan->id_penerimaan,'id_divisi' => $divisi->id_divisi]) == 0) { ?>
                                      <option value="<?=$k->id_peserta?>"> [<?=$k->id_peserta?>]  <?=$peserta->nama_lengkap?></option>
                                    <?php } endforeach; ?>
                                  </select>
                                </td>
                              </tr>
                              <?php $i= 1; foreach ($list_kriteria as $row): ?>  
 
                                <tr>
                                    <th style="width: 30%"><?=$row->nama_kriteria?></th>
                                    <th>
                                      <?php $list_param = $this->Subkriteria_m->get(['id_kriteria' => $row->id_kriteria]);?>
                                              <?php if (sizeof($list_param) == 0) { ?>
                                               
                                              <?php

                                                $listindikator = $this->IndikatorKriteria_m->get(['id_kriteria' => $row->id_kriteria]); 
                                              ?>
                                              <table class="table table-bordered">
                                               
                                              <?php foreach ($listindikator as $ind): ?>  
                                                <tr>
                                                  <td width="80%"><?=$ind->keterangan?></td>
                                                  <td><center><?=$ind->min?> - <?=$ind->max?></center></td>
                                                </tr>
                                                <?php endforeach; ?>
                                              </table>
                                              <?php } ?>
                                              
                                              <?php foreach ($list_param as $row2): ?> 
                                                <?=$row2->nama_sub?> :  
                                               <?php

                                                $listindikator = $this->IndikatorSub_m->get(['id_sub' => $row2->id_sub]); 
                                              ?>
                                              <table class="table table-bordered">
                                               
                                              <?php foreach ($listindikator as $ind): ?>  
                                                <tr>
                                                  <td width="80%"><?=$ind->keterangan?></td>
                                                  <td><center><?=$ind->min?> - <?=$ind->max?></center></td>
                                                </tr>
                                                <?php endforeach; ?>
                                              </table>
                                              <?php endforeach; ?> 
                                    </th>
                                    <td>
                                         
                                            <?php $list_param = $this->Subkriteria_m->get(['id_kriteria' => $row->id_kriteria]);?>
                                              <?php if (sizeof($list_param) == 0) { ?>
                                               <input type="number" min="0" max="100" class="form-control"  required name="kriteria_<?=$row->id_kriteria?>" placeholder="0 - 100">
                                              <?php } ?>
                                            
                                              <?php foreach ($list_param as $row2): ?>  
                                                <?=$row2->nama_sub?> : 
                                                 <input type="number" min="0" max="100" class="form-control"  required name="kriteria_<?=$row->id_kriteria?>_sub_<?=$row2->id_sub?>" placeholder="0 - 100" >
                                              <?php endforeach; ?> 
                                         </select> 
                                    </td>
                                </tr>
                                <?php   endforeach; ?>
                              
                            </table>
                                
                        <input  type="submit" class="btn bg-cyan btn-block"  name="input" value="Input">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
</div> 
 

<div class="modal fade" id="standar" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>NILAI STANDAR KRITERIA</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('divisi/penilaian')?>" method="Post"  >  
                            
                            <input type="hidden" name="id_penerimaan" value="<?=$penerimaan->id_penerimaan?>" >
                            <table class="table table-bordered">
                              
                              <?php $i= 1; foreach ($list_standar as $row): ?>  
 
                                <tr>
                                    <th style="width: 60%"><?=$this->Kriteria_m->get_row(['id_kriteria' => $row->id_kriteria])->nama_kriteria?></th>
                                    <td>
                                         
                                         <input type="number" min="1" max="5" class="form-control"  required name="standar_<?=$row->id_kriteria?>" placeholder="1 - 5" value="<?=$row->nilai?>">
                                            
                                         </select> 
                                    </td>
                                </tr>
                                <?php   endforeach; ?>
                              
                            </table>
                                
                        <input  type="submit" class="btn bg-cyan btn-block"  name="simpanstandar" value="Simpan">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
</div> 
 



<?php $i = 1; foreach ($list_peserta as $row): ?> 

<?php $peserta = $this->CalonAnggota_m->get_row(['id_calonanggota' => $row->id_calonanggota]) ?>
<div class="modal fade" id="edit-<?=$row->id_peserta?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <?= form_open_multipart('divisi/penilaian/') ?>
      <div class="modal-body">
         
            <input type="hidden" name="id_penerimaan" value="<?=$penerimaan->id_penerimaan?>">
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Nama Peserta</label>
                 <input type="text" class="form-control" readonly value="<?=$peserta->nama_lengkap?>">
                 <input type="hidden" class="form-control" name="id_peserta" value="<?=$row->id_peserta?>">
            </div> 
 
                            <table class="table table-bordered">
                             
                               <?php $i= 1; foreach ($list_kriteria as $k): ?>  
 
                                <tr>
                                    <th style="width: 25%"><?=$k->nama_kriteria?></th>
                                    <th>
                                      <?php $list_param = $this->Subkriteria_m->get(['id_kriteria' => $k->id_kriteria]);?>
                                              <?php if (sizeof($list_param) == 0) { ?>
                                               
                                              <?php

                                                $listindikator = $this->IndikatorKriteria_m->get(['id_kriteria' => $k->id_kriteria]); 
                                              ?>
                                              <table class="table table-bordered">
                                               
                                              <?php foreach ($listindikator as $ind): ?>  
                                                <tr>
                                                  <td width="80%"><?=$ind->keterangan?></td>
                                                  <td><center><?=$ind->min?> - <?=$ind->max?></center></td>
                                                </tr>
                                                <?php endforeach; ?>
                                              </table>
                                              <?php } ?>
                                              
                                              <?php foreach ($list_param as $row2): ?> 
                                                <?=$row2->nama_sub?> :  
                                               <?php

                                                $listindikator = $this->IndikatorSub_m->get(['id_sub' => $row2->id_sub]); 
                                              ?>
                                              <table class="table table-bordered">
                                               
                                              <?php foreach ($listindikator as $ind): ?>  
                                                <tr>
                                                  <td width="80%"><?=$ind->keterangan?></td>
                                                  <td><center><?=$ind->min?> - <?=$ind->max?></center></td>
                                                </tr>
                                                <?php endforeach; ?>
                                              </table>
                                              <?php endforeach; ?> 
                                    </th>

                                    <td>
                                         
                                            <?php $list_param = $this->Subkriteria_m->get(['id_kriteria' => $k->id_kriteria]);?>
                                              <?php if (sizeof($list_param) == 0) { ?>
                                               <input type="number" min="0" max="100" class="form-control"  required name="kriteria_<?=$k->id_kriteria?>" placeholder="0 - 100" value="<?=$this->Penilaian_m->get_row(['id_penerimaan' => $penerimaan->id_penerimaan, 'id_divisi' => $divisi->id_divisi, 'id_peserta' => $row->id_peserta, 'id_kriteria' => $k->id_kriteria])->nilai?>">
                                              <?php } ?>
                                            
                                              <?php foreach ($list_param as $k2): ?>  
                                                <?=$k2->nama_sub?> : 
                                                 <input type="number" min="0" max="100" class="form-control"  required name="kriteria_<?=$k->id_kriteria?>_sub_<?=$k2->id_sub?>" placeholder="0 - 100" value="<?=$this->Penilaian_m->get_row(['id_penerimaan' => $penerimaan->id_penerimaan, 'id_divisi' => $divisi->id_divisi, 'id_peserta' => $row->id_peserta, 'id_kriteria' => $k->id_kriteria,'id_sub' => $k2->id_sub])->nilai?>">
                                              <?php endforeach; ?> 
                                         </select> 
                                    </td>
                                </tr>
                                <?php   endforeach; ?>
                              
                            </table>
                                
            
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="editnilai" value="Submit"> 
      </div>
      </form>
    </div>
  </div>
</div> 


<div class="modal fade" id="delete2-<?=$row->id_peserta?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered text-white" role="document">
        <div class="modal-content bg-gradient-danger"> 
              
                  <div class="modal-body">
                    
                      <div class="py-3 text-center">
                          <i class="ni ni-bell-55 ni-3x"></i>
                          <h4 class="heading mt-4 text-white"> Hapus Penilaian ini? </h4> 
                      </div>
                      
                  </div>
                  
                  <form action="<?= base_url('divisi/penilaian')?>" method="Post" >  
                  <div class="modal-footer">

                  <input type="hidden" name="id_penerimaan" value="<?=$penerimaan->id_penerimaan?>">
                
                   
                      <input type="hidden" value="<?=$row->id_peserta?>" name="id_peserta">  
                      <input type="submit" class="btn bg-red" name="deletenilai" value="Ya!">
                     
                      <button type="button" class="btn btn-white ml-auto" data-dismiss="modal">Close</button>
                  </div>
                </form>
          </div>
  </div>
</div>
<?php endforeach; ?>
