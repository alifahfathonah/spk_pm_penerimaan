
    
<section class="content">
    <div class="container-fluid"> 
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
           
                <div class="card"> 
                        <div class="body">
                           <form action="<?= base_url('daftar')?>" method="Post" id="formadd3"> 
                <center> 
                <a href="<?=base_url('')?>"><h4 style="color:black">Daftar</h4> </a></center>
                    <div class="msg">
                      
                <?= $this->session->flashdata('msg') ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" id="email_pgw" placeholder="Email" required value="<?php
                                if(isset($_COOKIE['email_temp'])) {echo $_COOKIE['email_temp'];}
                            ?>" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$">
                        </div>

                        <div class="help-info" id="pesan1_pgw" style="color:red"></div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama"   placeholder="Nama Lengkap" required value="<?php
                                if(isset($_COOKIE['namalengkap_temp'])) {echo $_COOKIE['namalengkap_temp'];}
                            ?>" >
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="pass1_pgw"  placeholder="Kata Sandi" required>
                        </div>
                        <div class="help-info" id="pesan2_pgw"> </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password2" id="pass2_pgw" placeholder="Konfirmasi Kata Sandi" required>
                        </div>
                        <div class="help-info" id="pesan3_pgw"> </div>

                    </div>
                    <div class="row">
                      
                        <div class="col-xs-12"> 
                          <center>  <input class="btn btn-block bg-cyan  " type="submit" value="Daftar" name="daftar"></center>
                        </div>

                        <br>

                        <center>Sudah Memiliki Akun ? <a href="<?=base_url('beranda/login')?>">Login.</a></center>
                    </div>
                  
                </form>
                         
                        </div>
                    </div>
            </div>
           
          </div>
        </div>
    </section>
 
 