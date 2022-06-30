
    
<section class="content">
    <div class="container-fluid"> 
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>
                    <li> <i class="material-icons">people</i> Kelola Data Calon Anggota</li> 
                </ol>
                <?= $this->session->flashdata('msg') ?>
                <div class="card">
                      <div class="header">
                            <center><h2>Kelola Data Calon Anggota</h2></center>                          
                        </div>
                        <div class="body">
 
                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>No.</th> 
                                            <th>Nama Lengkap </th>
                                            <th>Email</th> 
                                            <th>Tempat, Tanggal Lahir</th>  
                                            <th>Jenis Kelamin</th>   
                                            <th>Aksi</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php $i = 1; foreach ($list_calonanggota as $row): ?> 
                                          <tr>   
                                              <td><?=$i++?> </td>  
                                              <td><?=$row->nama_lengkap?>  </td> 
                                              <td> <?=$row->email?></td>    
                                              <td> <?=$row->tempat_lahir?>, <?=$row->tanggal_lahir?></td>    
                                              <td> <?=$row->jk?></td>    
                                               <td>
                                                  <a href="<?=base_url('admin/calonanggota/'.$row->id_calonanggota)?>"> 
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
 
 