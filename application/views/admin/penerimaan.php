
    
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>
                    <li> <i class="material-icons">person_add</i> Penerimaan Anggota </li> 
                </ol>
            <?= $this->session->flashdata('msg') ?>
                <div class="card">
                      <div class="header">
                            <center><h2>DAFTAR PENERIMAAN CALON ANGGOTA BARU</h2></center>                          
                        </div>
                        <div class="body">
                       
                          <a data-toggle="modal" data-target="#tambah"  href=""><button class="btn bg-blue">Buat Sesi Penerimaan Baru</button></a>
                          <br>
                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>NO</th> 
                                            <th>Nama Penerimaan</th>
                                            <th>Tanggal Buat</th>  
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php $i = 1; foreach ($list_penerimaan as $row): ?> 
                                          <tr>   
                                              <td><?=$i++?> </td>  
                                              <td><?=$row->nama?>  </td> 
                                              <td> <?=$row->tgl_buat?></td>    
                                              <td>
                                                <?php
                                                if ($row->status == 1) {
                                                  echo "Tahap Pendaftaran";
                                                }elseif ($row->status == 2) {
                                                  echo "Tahap Penilaian";
                                                }elseif ($row->status == 3) {
                                                  echo "Tahap Pemilihan";
                                                }else{
                                                  echo "Selesai";
                                                }

                                              ?>

                                              </td>    
                                               <td>
                                                  <a href="<?=base_url('admin/penerimaan/'.$row->id_penerimaan)?>"> 
                                                    <button class="btn bg-cyan ">
                                                      Lihat Detail
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
                            <h4 class="modal-title" id="defaultModalLabel"><center>FORM BUAT SESI PENERIMAAN</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/penerimaan')?>" method="Post"  >  
                        
                           <table class="table table-bordered"> 
                                        <tr>   
                                            <th>Nama Penerimaan</th> 
                                            <th>
                                               <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Sesi Penerimaan" required autofocus >
                                            </th>  
                                        </tr> 
 
                                </table>
 
                        <input  type="submit" class="btn bg-blue btn-block btn-lg"  name="tambah" value="Buat">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
</div> 


 