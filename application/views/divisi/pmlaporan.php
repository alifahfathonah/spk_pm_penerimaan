 
 <section class="content" >
    <div class="container-fluid"> 
        <div class="row clearfix">
          
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                        <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>

                       <li><a href="<?=base_url('divisi/laporan')?>"><i class="material-icons">book</i> Laporan Penilaian </a></li>  
                        <li><a href="<?=base_url('divisi/detaillaporan/'.$penerimaan->id_penerimaan)?>">  <?=$penerimaan->nama?> </a></li>  <li> Metode Profile Macthing</li>  
                    </ol>
                    <?= $this->session->flashdata('msg') ?>
                    <div class="card">
                        
                        <div class="body"> 
                           
                           <h3>#Data Kriteria</h3>
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                              <tr style="text-align: center;">  
                                <th>ID Kriteria</th>
                                <th>Nama Kriteria</th>   
                                <th>Aspek</th>    
                                <th>Jenis</th>   
                                <th>Nilai Standar</th>
                              </tr>
                            </thead>
                            <tbody >


                             <?php  
                             $m = 1;
                             foreach ($list_kriteria as $row): ?> 
                              <?php $list_subs = $this->Subkriteria_m->get(['id_kriteria' => $row->id_kriteria]); ?>
                              <tr style="text-align: center;"> 
                                <td> 
                                   <?=$row->id_kriteria?>
                                </td> 
                                <td> 
                                   <?=$row->nama_kriteria?>
                                </td> 
                                 <td>  
                                   <?=$row->aspek?>
                                </td> 
                                 <td> 
                                   <?=$row->jenis?>
                                </td> 
                                <td>
                                   <?=$this->Standar_m->get_row(['id_divisi' => $divisi->id_divisi, 'id_kriteria' => $row->id_kriteria])->nilai?>
                                </td>
                                 
                                </tr> 
                                 

                              
                              <?php endforeach; ?>
                            </tbody>
                          </table> 

                          <br>
                          <h3>1. Nilai Awal</h3>
                          <div style=" overflow-x: scroll;padding-bottom: 20px">
                            <table class="table table-bordered table-striped table-hover" >
                              <thead  >
                                <tr>
                                  <th rowspan="2" style="vertical-align: middle;text-align: center;">ID Peserta</th>
                                  <th rowspan="2" style="vertical-align: middle;text-align: center;">Nama Peserta</th> 
                                  <?php $m = 0; foreach ($list_kriteria as $row): ?>
                                 
                                  <th ><center><?=$row->nama_kriteria?></center></th>
                                  <?php   endforeach; ?> 
                                </tr>
                                
                              </thead>
                              <tbody >
                               

                               <?php  foreach ($nilai_awal_gap as $row): ?> 
                                <?php if ($this->Penilaian_m->get_num_row(['id_penerimaan' => $penerimaan->id_penerimaan, 'id_peserta' => $row['id_peserta'] ,'id_divisi' => $divisi->id_divisi] ) != 0) { ?>
                                <?php $peserta = $this->Peserta_m->get_row(['id_peserta' => $row['id_peserta']]); ?>
                                <?php $cp = $this->CalonAnggota_m->get_row(['id_calonanggota' => $peserta->id_calonanggota]); ?>
                                <tr>
                                  <td><?=$peserta->id_peserta?></td>
                                  <td><?=$cp->nama_lengkap?></td>
                                  <?php 
                                    for ($i=0; $i < sizeof($row['data']); $i++) { 
                                      for ($j=0; $j < sizeof($row['data'][$i]['nilai']); $j++) { 
                                        echo "<td>".$row['data'][$i]['nilai'][$j]['awal']."</td>";
                                      }
                                    }
                                  ?>
                                </tr>
                                 
                                <?php } endforeach; ?>
                              </tbody>
                            </table> 
                          </div>

                          <br>
                          <h3>2. Nilai GAP</h3>
                          <div style=" overflow-x: scroll;padding-bottom: 20px">
                            <table class="table table-bordered table-striped table-hover" >
                              <thead  >
                                <tr>
                                  <th rowspan="2" style="vertical-align: middle;text-align: center;">ID Peserta</th>
                                  <th rowspan="2" style="vertical-align: middle;text-align: center;">Nama Peserta</th> 
                                  <?php $m = 0; foreach ($list_kriteria as $row): ?>
                                 
                                  <th ><center><?=$row->nama_kriteria?></center></th>
                                  <?php   endforeach; ?> 
                                </tr>
                                
                              </thead>
                              <tbody >
                               

                               <?php  foreach ($nilai_awal_gap as $row): ?> 
                                <?php if ($this->Penilaian_m->get_num_row(['id_penerimaan' => $penerimaan->id_penerimaan, 'id_peserta' => $row['id_peserta'] ,'id_divisi' => $divisi->id_divisi] ) != 0) { ?>
                                <?php $peserta = $this->Peserta_m->get_row(['id_peserta' => $row['id_peserta']]); ?>
                                <?php $cp = $this->CalonAnggota_m->get_row(['id_calonanggota' => $peserta->id_calonanggota]); ?>
                                <tr>
                                  <td><?=$peserta->id_peserta?></td>
                                  <td><?=$cp->nama_lengkap?></td>
                                  <?php 
                                    for ($i=0; $i < sizeof($row['data']); $i++) { 
                                      for ($j=0; $j < sizeof($row['data'][$i]['nilai']); $j++) { 
                                        echo "<td>".$row['data'][$i]['nilai'][$j]['gap']."</td>";
                                      }
                                    }
                                  ?>
                                </tr>
                                 
                                <?php } endforeach; ?>
                              </tbody>
                            </table> 
                          </div>

                          <br>
                          <h3>3. Bobot Nilai GAP</h3>
                          <div style=" overflow-x: scroll;padding-bottom: 20px">
                            <table class="table table-bordered table-striped table-hover" >
                              <thead  >
                                <tr>
                                  <th rowspan="2" style="vertical-align: middle;text-align: center;">ID Peserta</th>
                                  <th rowspan="2" style="vertical-align: middle;text-align: center;">Nama Peserta</th> 
                                  <?php $m = 0; foreach ($list_kriteria as $row): ?>
                                 
                                  <th ><center><?=$row->nama_kriteria?></center></th>
                                  <?php   endforeach; ?> 
                                </tr>
                                
                              </thead>
                              <tbody >
                               

                               <?php  foreach ($bobot_gap as $row): ?> 

                                <?php if ($this->Penilaian_m->get_num_row(['id_penerimaan' => $penerimaan->id_penerimaan, 'id_peserta' => $row['id_peserta'] ,'id_divisi' => $divisi->id_divisi] ) != 0) { ?>
                                <?php $peserta = $this->Peserta_m->get_row(['id_peserta' => $row['id_peserta']]); ?>
                                <?php $cp = $this->CalonAnggota_m->get_row(['id_calonanggota' => $peserta->id_calonanggota]); ?>
                                <tr>
                                  <td><?=$peserta->id_peserta?></td>
                                  <td><?=$cp->nama_lengkap?></td>
                                  <?php 
                                    for ($i=0; $i < sizeof($row['data']); $i++) { 
                                      for ($j=0; $j < sizeof($row['data'][$i]['nilai']); $j++) { 
                                        echo "<td>".$row['data'][$i]['nilai'][$j]['bobot_gap']."</td>";
                                      }
                                    }
                                  ?>
                                </tr>
                                 
                                <?php  } endforeach; ?>
                              </tbody>
                            </table> 
                          </div>

                          <br>
                          <h3>4. Perhitungan Core Factor dan Secondary Factor</h3>
                          <div style=" overflow-x: scroll;padding-bottom: 20px">
                            <table class="table table-bordered table-striped table-hover" >
                              <thead  >
                                <tr>
                                  <th rowspan="2" style="vertical-align: middle;text-align: center;">ID Peserta</th>
                                  <th rowspan="2" style="vertical-align: middle;text-align: center;">Nama Peserta</th> 

                                  <th   colspan="2"><CENTER>Wawancara</CENTER></th>

                                  <th   colspan="2"><CENTER>FGD</CENTER></th> 
                                 
                                </tr>
                                <tr>
                                  <th ><center>NCF</center></th> 
                                  <th ><center>NSF</center></th> 
                                  <th ><center>NCF</center></th> 
                                  <th ><center>NSF</center></th> 
                                </tr> 
                                
                              </thead>
                              <tbody >
                               

                               <?php  foreach ($kelompok_bobot_gap as $row): ?> 

                                <?php if ($this->Penilaian_m->get_num_row(['id_penerimaan' => $penerimaan->id_penerimaan, 'id_peserta' => $row['id_peserta'] ,'id_divisi' => $divisi->id_divisi] ) != 0) { ?>
                                <?php $peserta = $this->Peserta_m->get_row(['id_peserta' => $row['id_peserta']]); ?>
                                <?php $cp = $this->CalonAnggota_m->get_row(['id_calonanggota' => $peserta->id_calonanggota]); ?>
                                <tr>
                                  <td><center><?=$peserta->id_peserta?></center></td>
                                  <td><?=$cp->nama_lengkap?></td>
                                  <td><center><?=$row['ncf_wawancara']?></center></td>
                                  <td><center><?=$row['nsf_wawancara']?></center></td>
                                  <td><center><?=$row['ncf_fgd']?></center></td>
                                  <td><center><?=$row['nsf_fgd']?></center></td>
                                </tr>
                                 
                                <?php  } endforeach; ?>
                              </tbody>
                            </table> 
                          </div>

                          <br>
                          <h3>5. Hasil Perangkingan</h3>
                          <div style=" overflow-x: scroll;padding-bottom: 20px">
                            <table class="table table-bordered table-striped table-hover" >
                              <thead  >
                                <tr>
                                  <th><center>Peringkat</center></th>
                                  <th style="vertical-align: middle;text-align: center;">ID Peserta</th>
                                  <th style="vertical-align: middle;text-align: center;">Nama Peserta</th> 

                                  <th><CENTER>N1</CENTER></th>

                                  <th><CENTER>N2</CENTER></th> 
                                  <th><CENTER>N</CENTER></th> 
                                 
                                </tr> 
                                
                              </thead>
                              <tbody >
                               

                               <?php $i=1; foreach ($rank as $row): ?> 

                                <?php if ($this->Penilaian_m->get_num_row(['id_penerimaan' => $penerimaan->id_penerimaan, 'id_peserta' => $row['id_peserta'] ,'id_divisi' => $divisi->id_divisi] ) != 0) { ?>
                                <?php $peserta = $this->Peserta_m->get_row(['id_peserta' => $row['id_peserta']]); ?>
                                <?php $cp = $this->CalonAnggota_m->get_row(['id_calonanggota' => $peserta->id_calonanggota]); ?>
                                <tr>
                                  <th><center><?=$i++?></center></th>
                                  <td><center><?=$peserta->id_peserta?></center></td>
                                  <td><center><?=$cp->nama_lengkap?></center></td> 
                                  <td><center><?=$row['n1']?></center></td>
                                  <td><center><?=$row['n2']?></center></td>
                                  <th><center><?=$row['n']?></center></th>
                                </tr>
                                 
                                <?php  } endforeach; ?>
                              </tbody>
                            </table> 
                          </div>
                         </div>
                    </div>
 
 
                </div>
    </div>
</section>
  
 