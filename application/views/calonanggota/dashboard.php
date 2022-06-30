  
    <section class="content">
        
          <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?= $this->session->flashdata('msg') ?>
                    <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li> 
                </ol>
                    <div class="card">
                      <div class="header">
                            <center><h2>DAFTAR PENERIMAAN CALON ANGGOTA BARU</h2></center>                          
                        </div>
                        <div class="body">
                        
                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>NO</th> 
                                            <th>Nama Penerimaan</th>
                                            <th>Tanggal Buat</th>   
                                            <th>Aksi</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php $i = 1; foreach ($list_penerimaan as $row): ?> 
                                          <tr>   
                                              <td><?=$i++?> </td>  
                                              <td><?=$row->nama?>  </td> 
                                              <td> <?=date('d-m-Y', strtotime($row->tgl_buat))?></td>    
                                              
                                              </td>    
                                               <td>

                                                <?php
                                                if ($this->Peserta_m->get_num_row(['id_penerimaan' => $row->id_penerimaan, 'id_calonanggota' => $calonanggota->id_calonanggota])  == 0) { ?> 
                                                   
                                                  <a href="<?=base_url('calonanggota/daftar/'.$row->id_penerimaan)?>"> 
                                                    <button class="btn bg-cyan ">
                                                      Daftar
                                                    </button>
                                                  </a>

                                              <?php  }else {  ?>

                                               <center>
                                                    <b style="color: green">Terdaftar</b> <br>
                                                <a href="<?=base_url('calonanggota/penerimaan/'.$row->id_penerimaan)?>"> 
                                                    <button class="btn bg-cyan ">
                                                      Lihat Detail
                                                    </button>
                                                  </a>
                                               </center>
                                               <?php   } ?>
                                               </td>         
                                             
                                          </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>

     
                            </div>
                        </div>
                    </div>

              
       
    </section>


 