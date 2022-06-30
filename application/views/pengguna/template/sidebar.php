<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        
        <div class="menu">
            <ul class="list"> 
                <!-- if unconfirmed -->

                <?php if ($index == 1): ?>
                  <li class="active">
                <?php else: ?>
                  <li>
                <?php endif; ?>
                    <a href="<?=base_url('beranda')?>">
                        <i class="material-icons">home</i>
                        <span>Beranda</span>
                    </a>
                </li> 


                <?php if ($index == 2): ?>
                  <li class="active">
                <?php else: ?>
                  <li>
                <?php endif; ?>
                    <a href="<?=base_url('beranda/divisi')?>">
                        <i class="material-icons">business_center</i>
                        <span>Divisi</span>
                    </a>
                </li> 
 
                <?php if ($index == 4): ?>
                  <li class="active">
                <?php else: ?>
                  <li>
                <?php endif; ?>
                    <a href="<?=base_url('beranda/login')?>">
                        <i class="material-icons">input</i>
                        <span>Masuk/Daftar</span>
                    </a>
                </li> 
                  
                </li>
            </ul> 
                
        </div>


        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                 
            </div>
            <div class="version">
                
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    
    <!-- #END# Right Sidebar -->
</section>
