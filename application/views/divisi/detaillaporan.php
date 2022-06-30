 
 <section class="content" >
    <div class="container-fluid"> 
        <div class="row clearfix">
          
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                        <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>

                       <li><a href="<?=base_url('divisi/laporan')?>"><i class="material-icons">book</i> Laporan Penilaian  </a></li>  
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
                            
                            <a href="<?=base_url('divisi/detaillaporan/'.$penerimaan->id_penerimaan.'/pm')?>" >
                              <button class="btn bg-green">Detail Perhitungan (Profile Matching)</button>
                            </a> 
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                              <thead >
                                <tr>  
                                  <th>Peringkat</th>
                                  <th>ID Peserta</th>  
                                  <th>Nama Peserta</th>   
                                  <th>Hasil Akhir</th>   
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
  
 
 