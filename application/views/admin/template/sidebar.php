<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</div>
                    <div class="email"><?=$email?></div>
                    
                </div>
            </div>
                <div class="menu">
                    <ul class="list">
                        <li class="header">Menu </li>
                        <!-- if unconfirmed -->

                        <?php if ($index == 1): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin')?>">
                                <i class="material-icons">home</i>
                                <span>Beranda</span>
                            </a>
                         </li>  

                        <?php if ($index == 2): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/penerimaan')?>">
                                <i class="material-icons">person_add</i>
                                <span>Penerimaan Anggota</span>  
                                
                            </a>
                        </li>  

                        <li class="header">Kelola Data</li>
                        <?php if ($index == 3): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/calonanggota')?>">
                                <i class="material-icons">people</i>
                                <span>Calon Anggota</span>
                            </a>
                        </li>  
                        <?php if ($index == 4): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/divisi')?>">
                                <i class="material-icons">business_center</i>
                                <span>Divisi</span>
                            </a>
                        </li>  
                        <?php if ($index == 5): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/kriteria')?>">
                                <i class="material-icons">view_list</i>
                                <span>Kriteria</span>
                            </a>
                        </li>  
                        

                        <li class="header">Pengaturan</li>
                        <?php if ($index == 7): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/profil')?>">
                                <i class="material-icons">person</i>
                                <span>Profil</span>
                            </a>
                        </li>  




         
                          <li> 
                            <a href="<?=base_url('logout')?>">
                                <i class="material-icons">input</i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div> 
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
