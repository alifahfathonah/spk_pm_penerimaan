
    
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>
                    <li> <i class="material-icons">view_list</i> Kelola Data Kriteria </li> 
                </ol>
            <?= $this->session->flashdata('msg') ?>
                <div class="card">
                      <div class="header">
                            <center><h2>KELOLA DATA KRITERIA</h2></center>                          
                        </div>
                        <div class="body">
                       
                          <a data-toggle="modal" data-target="#tambah"  href=""><button class="btn bg-blue">Tambah Kriteria</button></a>
                          <br>
                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>NO</th> 
                                            <th>NAMA KRITERIA</th>
                                            <th>ASPEK</th>  
                                            <th>JENIS</th>  
                                            <th>AKSI</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php $i = 1; foreach ($list_kriteria as $row): ?> 
                                          <tr>   
                                              <td><?=$i++?> </td>  
                                              <td><?=$row->nama_kriteria?>  </td> 
                                              <td> <?=$row->aspek?></td>    
                                              <td> <?=$row->jenis?></td>    
                                               <td>
                                                  <a href="<?=base_url('admin/kriteria/'.$row->id_kriteria)?>"> 
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
                            <h4 class="modal-title" id="defaultModalLabel"><center>FORM TAMBAH KRITERIA</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/kriteria')?>" method="Post"  >  
                        
                           <table class="table table-bordered"> 
                                        <tr>   
                                            <th>Nama Kriteria</th> 
                                            <th>
                                               <input type="text" class="form-control" name="nama_kriteria" placeholder="Masukkan Nama Kriteria" required autofocus >
                                            </th>  
                                        </tr> 

                                        <tr>   
                                            <th>Aspek</th> 
                                            <th> 
                                                <input name="aspek" type="radio" id="aspek1"  value="Wawancara" required /> 
                                                <label  for="aspek1">Wawancara</label>
                                                <input name="aspek" type="radio" id="aspek2"   value="FGD" required />
                                                <label  for="aspek2">FGD</label>
                                            </th>  
                                        </tr> 

                                        <tr>   
                                            <th>Jenis</th> 
                                            <th> 
                                                <input name="jenis" type="radio" id="jenis1"  value="Core Factor" required /> 
                                                <label  for="jenis1">Core Factor</label>
                                                <input name="jenis" type="radio" id="jenis2"   value="Secondary Factor" required />
                                                <label  for="jenis2">Secondary Factor</label>
                                            </th>  
                                        </tr> 

                                        <tr>   
                                            <th>Subkriteria</th> 
                                            <th> 
                                                <input name="sub" type="radio" id="sub1"  value="1" required /> 
                                                <label  for="sub1">Ada</label>
                                                <input name="sub" type="radio" id="sub2"   value="0" required />
                                                <label  for="sub2">Tidak Ada</label>
                                            </th>  
                                        </tr> 
                                </table>
 
                        <input  type="submit" class="btn bg-blue btn-block btn-lg"  name="tambah" value="Tambah">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
</div> 


 