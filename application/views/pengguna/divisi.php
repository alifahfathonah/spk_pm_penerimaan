
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
           
                <div class="card"> 
                        <div class="body">
                          <center>
                            <h3>
                              DAFTAR DIVISI
                            </h3> 
                          </center>
                          
                          <?php $i=1; foreach ($list_divisi as $d) { ?>
                            <h4><?=$i++?>. <?=$d->nama_divisi?></h4>
                            <p><?=$d->deskripsi?></p>
                          <?php } ?>
                        </div>
                    </div>
            </div>
           
          </div>
        </div>
    </section>
 
 