
    
<section class="content">
    <div class="container-fluid"> 
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
           
                <div class="card"> 
                        <div class="body">
                           <?php echo form_open('login/cek') ?> 
               <center> 
                <a href="<?=base_url('')?>"><h4 style="color:black">Masuk</h4> </a></center>
                    <div class="msg">
                      
                <?= $this->session->flashdata('msg') ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus value="<?php
                                if(isset($_COOKIE['email_temp'])) {echo $_COOKIE['email_temp'];}
                            ?>" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                      
                        <div class="col-xs-12">
                          <center>  <button class="btn btn-block bg-cyan waves-effect" type="submit">Login</button></center>
                        </div>

                        <br>
                        
                        <center>Belum Memiliki Akun ? <a href="<?=base_url('beranda/daftar')?>">Daftar .</a></center>
 
                    </div>
                  
                </form>
                         
                        </div>
                    </div>
            </div>
           
          </div>
        </div>
    </section>
 
 