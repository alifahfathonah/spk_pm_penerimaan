
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">location_city</i> Tempat Praktek Bersalin</a></li> 
                </ol>
                <div class="card"> 
                        <div class="body">
                         
                              <div class="table-responsive">
                                       <table class="table table-bordered table-striped table-hover  js-basic-example dataTable">
                                          <thead>
                                              <tr>   
                                                  <th>Rank.</th> 
                                                  <th>Foto</th>
                                                  <th>Nama alternatif </th>  
                                                  <th>Keterangan </th> 
                                                  <th>Aksi</th>  
                                              </tr>
                                          </thead> 
                                          <tbody>
                                            <?php $i = 1; foreach ($hasil_akhir as $row): ?> 

                                            <?php $alternatif = $this->Alternatif_m->get_row(['id_alternatif' => $row['id_alternatif']]) ?>

                                                <tr>   
                                                    <td><?=$i++?> </td>  
                                                    <td><img src="<?=base_url('assets/'.$alternatif->foto)?>" class="img-responsive" style="width: 100%" /></td>
                                                    <td><?=$alternatif->nama_alternatif?> 
                                                    
                                                    </td>  
                                                    <td>< <?=$alternatif->email?> ><br><?=$alternatif->kontak?><br><?=$alternatif->alamat?></td> 
                                                    <td>
                                                         <a href="<?=base_url('beranda/alternatif/'.$alternatif->id_alternatif)?>">
                                                            <button class="btn bg-cyan">Lihat</button>
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
 


    <div class="modal fade" id="filter" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Cari Alternatif</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('beranda/index')?>" method="Post" enctype="multipart/form-data"> 
                         <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
          
                                     
                                     <?php $i= 1; foreach ($list_kriteria as $row): ?>  
 
                                <tr>
                                    <th><?=$row->nama_kriteria?></th>
                                    <td>
                                        <select class="form-control"  name="c<?=$i++?>">
                                            <option value="">- Pilih -</option> 
                                            <?php $list_param = $this->Subkriteria_m->get(['id_kriteria' => $row->id_kriteria]);?>
                                              <?php foreach ($list_param as $row2): ?>  
                                                <option value="<?=$row2->id_subkriteria?>"><?=$row2->nama_subkriteria?></option> 
                                              <?php endforeach; ?> 
                                         </select> 
                                    </td>
                                </tr>
                                <?php  endforeach; ?>
                                </tbody>

                            </table>  
 
                              <input type="submit" class="btn bg-cyan btn-block"  name="cari" value="Cari"> 
                            <?php echo form_close() ?> 
                        </div> 
                    </div>
                </div>
    </div> 

  