<?php $foto = $this->session->userdata('foto');?>
</head>
<body class="skin-blue hold-transition fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <a href="<?php echo base_url('home')?>" class="logo"><i class="fa fa-heartbeat"></i><b> Kalorimu</b> Admin</a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url('upload/'.$foto) ?>" class="user-image" alt="User Image"/>
                                <span class="hidden-xs">
                                    <b><?php echo $this->session->userdata('username'); ?></b>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo base_url('upload/'.$foto) ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $this->session->userdata('nama_user'); ?> -  <?php
                                            if($this->session->userdata('role')==1){
                                                echo "Administrator";
                                            }else{
                                                echo "User";
                                            }
                                        ?>
                                        <small>
                                            Member since<br/>
                                            <?php echo $this->session->userdata('create_at'); ?>
                                        </small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url('admin/profil') ?>" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-user"></i> Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <?php echo anchor('logout','<i class="glyphicon glyphicon-log-out"></i> Logout?','class="btn btn-default btn-flat"')?>
                                    </div>

                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->