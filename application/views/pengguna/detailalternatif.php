
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                    <li><a href="<?=base_url('beranda')?>"><i class="material-icons">apps</i> Beranda</a></li> 
                    <li> <?=$alternatif->nama_alternatif?> </li> 
                </ol>
               
               <div class="card">
                   
                   <div class="body">
                       <div class="row clearfix">
                             
                            <div class="col-xs-12   col-sm-12  col-md-5   col-lg-5 ">
                                <?php if($alternatif->foto == NULL){ ?>
                                    <img src="<?=base_url('assets/img/nopic.png')?>" width="100%">
                                <?php }else { ?>
                                    <img src="<?=base_url('assets/'.$alternatif->foto)?>" width="100%">
                                <?php } ?>
                                
                            </div>
                            <div class="col-xs-12   col-sm-12  col-md-7   col-lg-7 ">
                                <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
                                   
                                     <tr>
                                         <th style="width: 30%">
                                             Nama alternatif
                                         </th>
                                         <td> 
                                            <?=$alternatif->nama_alternatif?>
                                          
                                         </td>
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Email
                                         </th>
                                         <td>   
                                            <?=$alternatif->email?> - <?=$pemilik->nama_pengguna?>
                                         </td>
                                     </tr>
                                     
                                   
                                     <tr>
                                         <th style="width: 30%">
                                             Alamat
                                         </th>
                                         <td>   
                                            <?=$alternatif->alamat?> 
                                         </td>
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Kontak
                                         </th>
                                         <td>  
                                            <?=$alternatif->kontak?> 
                                         </td>
                                     </tr>
                                    
                                </tbody>

                            </table> 
                            </div>

                            <div class="col-xs-12   col-sm-12  col-md-7   col-lg-7 ">
                                <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>

                                     <?php $i = 1; foreach ($list_kriteria as $row): ?> 
                                     <tr>
                                         <th style="width: 30%">
                                              <?=$row->nama_kriteria?> 
                                         </th>
                                         <td>  
                                            <?=$this->Subkriteria_m->get_row(['id_subkriteria' => $this->Penilaian_m->get_row(['id_kriteria' => $row->id_kriteria, 'id_alternatif' => $alternatif->id_alternatif])->id_subkriteria])->nama_subkriteria?>  
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
    </div>
</section>
<script  type="text/javascript" >
  var map;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: <?=$alternatif->latitude?>, lng: <?=$alternatif->longitude?>},
      zoom: 18
    });
 
        // membuat Marker
      var marker=new google.maps.Marker({
          position: new google.maps.LatLng(<?=$alternatif->latitude?>,<?=$alternatif->longitude?>),
          map: map,
          label : '<?=$alternatif->nama_alternatif?>' 
      });
  } 
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBl0dzxXiKvYCHR_nniytwZjUViYbkq4Fw&callback=initMap"
                                    async defer>
                                        google.maps.event.addDomListener(window,'load', initMap);
                                    </script>