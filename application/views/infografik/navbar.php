    <script src="<?php echo base_url('asset/js/jquery.sticky.js')?>"></script>
</head>
<body class="body">
        <!--navbar-->
        <div class="navbar navbar-new navbar-static-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand smoothScroll" style="color : white;" href="<?php echo base_url() ?>"><i class="fa fa-heartbeat"></i> KaloriMu</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li <?php if($this->uri->uri_string() == 'makanan'){echo 'class="active"';} ?>><?php echo anchor('makanan','Makanan')?></li>
                        <li <?php if($this->uri->uri_string() == 'olahraga'){echo 'class="active"';} ?>><?php echo anchor('olahraga','Olahraga')?></li>
                        <li <?php if($this->uri->uri_string() == 'kalkulator'){echo 'class="active"';} ?>><?php echo anchor('kalkulator','Hitung Kalorimu')?></li>
                        <li <?php if($this->uri->uri_string() == 'about'){echo 'class="active"';} ?>><?php echo anchor('about','Tentang Kami')?></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right navbar-form">
                        <a style ="color : white;" class="btn btn-flat btn-warning" href="<?php echo base_url('register')?>"><i class=" glyphicon glyphicon-list-alt"></i> <b>Daftar</b></a></li>
                        <a style="color : white;" class="btn-login" href="<?php echo base_url('login')?>"><i class="glyphicon glyphicon-log-in"></i> Masuk</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </div>
        <!--end of navbar-->