 
 <section class="content" >
    <div class="container-fluid"> 
        <div class="row clearfix">
          
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                        <li><a href="<?=base_url()?>"><i class="material-icons">home</i> Beranda</a></li>

                       <li><a href="<?=base_url('calonanggota/')?>"><i class="material-icons">person_add</i> Penerimaan Anggota </a></li>  
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
                            <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
                                     
                                      <tr>
                                         <th style="width: 30%">
                                            ID Peserta
                                         </th>
                                         <td> 
                                          
                                            <?=$peserta->id_peserta?>

                                         </td>
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                            Nama Peserta
                                         </th>
                                         <td> 
                                          
                                            <?=$calonanggota->nama_lengkap?>

                                         </td>
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                            Tempat, Tanggal Lahir
                                         </th>
                                         <td> 
                                          
                                            <?=$calonanggota->tempat_lahir?>, <?=date('d-m-Y', strtotime($calonanggota->tanggal_lahir))?>

                                         </td>
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                            Jenis Kelamin
                                         </th>
                                         <td> 
                                          
                                            <?=$calonanggota->jk?>

                                         </td>
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                            Alamat
                                         </th>
                                         <td> 
                                          
                                            <?=$calonanggota->alamat?>

                                         </td>
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                            Hobi
                                         </th>
                                         <td> 
                                          
                                            <?=$calonanggota->hobi?>

                                         </td>
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                            Pengalaman
                                         </th>
                                         <td> 
                                          
                                            <?=$calonanggota->pengalaman?>

                                         </td>
                                     </tr>
 
                                   
                                </tbody>

                            </table> 
                           
                         </div>
                    </div>
 
                </div>
    </div>
</section>
  