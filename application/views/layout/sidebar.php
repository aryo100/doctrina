<!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <?php
						if ($this->session->userdata('role') == 'admin') { ?>
							<ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                                <li class="heading">
                                    <h3 class="uppercase">Tabel Data</h3>
                                </li>    
                                <li class="nav-item  <?php if($this->uri->segment(2) == 'view_dona'){ echo 'active';} ?>">
                                    <a href="<?php echo base_url(); ?>index.php/admin/view_dona" class="nav-link ">
                                        <i class="icon-notebook"></i>
                                        <span class="title">Donatur</span>
                                    </a>
                                </li>
                                <li class="nav-item  <?php if($this->uri->segment(2) == 'view_pene'){ echo 'active';} ?>">
                                    <a href="<?php echo base_url(); ?>index.php/admin/view_pene" class="nav-link ">
                                        <i class="icon-users"></i>    
                                        <span class="title">Penerima</span>
                                    </a>
                                </li>
							</ul>
						<?php 
						}
					?>
                    <?php
						if ($this->session->userdata('role') == 'donatur') { ?>
							<ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                                <li class="nav-item  <?php if($this->uri->segment(2) == 'data_lengkap_dona'){ echo 'active';} ?>">
                                    <a href="<?php echo base_url(); ?>index.php/donatur/data_lengkap_dona//<?php echo $this->session->userdata('id').'/'.$this->session->userdata('role'); ?>" class="nav-link ">
                                        <i class="icon-user"></i>
                                        <span class="title">Profil</span>
                                    </a>
                                </li>
                                <!-- <li class="heading">
                                    <h3 class="uppercase">Data Penerima</h3>
                                </li>     -->
                                <li class="nav-item  <?php if($this->uri->segment(2) == 'list_pene'){ echo 'active';} ?>">
                                    <a href="<?php echo base_url(); ?>index.php/donatur/list_pene" class="nav-link ">
                                        <i class="icon-notebook"></i>
                                        <span class="title">List Penerima</span>
                                    </a>
                                </li>
                                <!-- <li class="nav-item  <?php if($this->uri->segment(2) == 'view_pene'){ echo 'active';} ?>">
                                    <a href="<?php echo base_url(); ?>index.php/admin/view_pene" class="nav-link ">
                                        <i class="icon-users"></i>    
                                        <span class="title">Forum</span>
                                    </a>
                                </li> -->
							</ul>
						<?php } ?>
                    <?php
						if ($this->session->userdata('role') == 'penerima') { ?>
							<ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                                <li class="nav-item  <?php if($this->uri->segment(2) == 'data_lengkap_pene'){ echo 'active';} ?>">
                                    <a href="<?php echo base_url(); ?>index.php/penerima/data_lengkap_pene/<?php echo $this->session->userdata('id').'/'.$this->session->userdata('role'); ?>" class="nav-link ">
                                        <i class="icon-user"></i>
                                        <span class="title">Profil</span>
                                    </a>
                                </li>
                                <!-- <li class="heading">
                                    <h3 class="uppercase">Data Penerima</h3>
                                </li>     -->
                                <li class="nav-item  <?php if($this->uri->segment(2) == 'list_dona'){ echo 'active';} ?>">
                                    <a href="<?php echo base_url(); ?>index.php/penerima/list_dona" class="nav-link ">
                                        <i class="icon-notebook"></i>
                                        <span class="title">List Donatur</span>
                                    </a>
                                </li>
                                <li class="nav-item  <?php if($this->uri->segment(2) == 'view_pene'){ echo 'active';} ?>">
                                    <a href="<?php echo base_url(); ?>index.php/penerima/view_dona" class="nav-link ">
                                        <i class="icon-users"></i>    
                                        <span class="title">Waiting List</span>
                                    </a>
                                </li>
							</ul>
						<?php 
						}
					?>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>