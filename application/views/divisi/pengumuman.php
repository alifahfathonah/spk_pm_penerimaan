  
    <section class="content">
        
          <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?= $this->session->flashdata('msg') ?>
                    <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li> 
                    <li><a href="<?=base_url('calonanggota/pengumuman')?>"><i class="material-icons">home</i> Beranda</a></li> 
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
                                            <th>Jumlah Peserta</th>
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
                                              <td><?=$this->Peserta_m->get_num_row(['id_penerimaan' => $row->id_penerimaan])?></td>  
                                               <td>

                                               
                                               <center>
                                                   
                                                <a href="<?=base_url('divisi/penilaian/'.$row->id_penerimaan)?>"> 
                                                    <button class="btn bg-cyan ">
                                                      Input Nilai
                                                    </button>
                                                  </a>
                                               </center> 
                                               </td>         
                                             
                                          </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>

     
                            </div>
                        </div>
                    </div>

              
       
    </section>


 