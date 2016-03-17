<?php 
    $last_kalori = $last->kalori_user;
    $bb_user = $last->berat_badan;
    $waktu = $last->waktu;
    $nama_user   = $this->session->userdata('nama_user');

    $this->load->view('user/template/header');
 ?>
        <link href="<?php echo base_url('asset/css/animated.css')?>" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo base_url('asset/chartjs/Chart.min.js')?>"></script>  
    </head>
    <body class="body">
        <!--navbar-->
        <div class="navbar navbar-new navbar-fixed-top navbar-static-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" style="color : white;" href="<?php echo base_url('user/f_end_user/pilihan')?>"><i class="fa fa-heartbeat"></i> KaloriMu</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <!--<li><a href="">jajal</a></li>-->
                    </ul>
                    <ul class="nav navbar-nav navbar-right navbar-form">
                        <a class="btn btn-warning btn-flat" href="<?php echo base_url('user/chart/read_chart')?>"><i class="glyphicon glyphicon-th-large"></i> Cek Sekarang!</a>
                        <?php echo anchor('logout','<i class="glyphicon glyphicon-log-out"></i> Logout?','class="btn2"')?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </div>  
        <!--end of navbar-->
        <section class="content spasi">
        <!--flash Data-->
        <?=$this->session->flashdata('sukses')?>
        <?=$this->session->flashdata('error')?>
        <!--end of flash Data-->
        <div class="row">           
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-danger animated bounceInUp">
                    <div class="box-header with-border" style="background-color : #DD4B39;">
                        <h4 class="box-title judul-sub"><i class="fa fa-heartbeat"></i> Info Kalori</h4>
                    </div>
                    <div class="box-body with-border">
                        <div id="carousel" class="carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target = "#carousel" data-slide-to='0' class="active"></li>
                                <li data-target = "#carousel" data-slide-to='1'></li>
                                <li data-target = "#carousel" data-slide-to='2'></li>
                                <li data-target = "#carousel" data-slide-to='3'></li>
                                <li data-target = "#carousel" data-slide-to='4'></li>
                                <li data-target = "#carousel" data-slide-to='5'></li>
                                <li data-target = "#carousel" data-slide-to='6'></li>
                                <li data-target = "#carousel" data-slide-to='7'></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active" data-interval="3">
                                    <center><img src="<?php echo base_url('asset/img/ayampanggang.jpg')?>" alt="Ayam Panggang" class="img-responsive"></center>
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="item">
                                    <center><img src="<?php echo base_url('asset/img/brownies.jpg')?>" alt="Brownies" class="img-responsive"></center>
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="item">
                                    <center><img src="<?php echo base_url('asset/img/kareayam.jpg')?>" alt="Kare Ayam" class="img-responsive"></center>
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="item">
                                    <center><img src="<?php echo base_url('asset/img/mieinstant.jpg')?>" alt="Mie Instant" class="img-responsive"></center>
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="item">
                                    <center><img src="<?php echo base_url('asset/img/rawon.jpg')?>" alt="Rawon" class="img-responsive"></center>
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="item">
                                    <center><img src="<?php echo base_url('asset/img/rujak.jpg')?>" alt="Rujak" class="img-responsive"></center>
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="item">
                                    <center><img src="<?php echo base_url('asset/img/sate.jpg')?>" alt="Sate" class="img-responsive"></center>
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="item">
                                    <center><img src="<?php echo base_url('asset/img/spaghetti.jpg')?>" alt="spaghetti" class="img-responsive"></center>
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control left" data-slide="prev" href="#carousel"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            <a class="carousel-control right" data-slide="next" href="#carousel"><span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <!--end of carousel-->
                    </div>
                    <!--end of box body-->
                    <div class="box-footer with-border clearfix">&nbsp;</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-primary">
                    <div class="box-header with-border" style="background-color : #3C8DBC;">
                        <h4 class="box-title judul-sub"><i class="fa fa-area-chart"></i> Chart Kalorimu</h4>
                    </div>
                    <div class="box-body with-border">
                        <center><canvas id="kalori_user" width="830" height="400"></canvas></center>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-2">
                <div class="box box-primary">
                    <div class="box-header with-border" style="background-color : #3C8DBC;">
                        <h4 class="box-title" style="color : white;"><i class="fa fa-heartbeat"></i> KaloriMu</h4>
                    </div>
                    <div class="box-body with-border tinggi">
                        <!--kalori terakhir-->
                        <div class="text-center">
                            <br>
                            <br>
                            <h5>Hasil kalkulasi Kalori terakhirmu</h5>
                            <h1 class="animated bounceInDown"><?php echo round($last_kalori),' Kal'; ?></h1>
                            <br>
                            <h5>Ayo Cek Kalori Kamu Hari Ini</h5>
                            <a href="<?php echo base_url('user/kalori_user')?>" class="btn btn-success btn-flat">Cek Sekarang</a>

                        </div>
                        <!--kalori terakhir-->
                    </div>
                    <!--<div class="box-footer with-border clearfix">&nbsp;</div>-->
                </div>
            </div>      
            <div class="col-md-4">
                <div class="box box-danger animated bounceInUp">
                    <div class="box-header with-border" style="background-color : #DD4B39;">
                        <h4 class="box-title judul-sub"><img src="<?php echo base_url('asset/img/activity.png')?>">  Cara Bakar Kalorimu</h4>
                    </div>
                    <div class="box-body with-border">
                        <div id="carousel2" class="carousel slide">
                            <div class="carousel-inner carousel-inners">
                                <div class="item active" data-interval="3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('asset/img/needle.png')?>">
                                            <div class="text-center">
                                                <canvas id="menyulam" width="100" height="100"></canvas>
                                                <h5>Menyulam</h5>
                                                <h6>60 menit</h6>
                                                <h4><b>85 Kal</b></h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('asset/img/repair.png')?>">
                                            <div class=" text-center">
                                                <canvas id="memperbaikimobil" width="100" height="100"></canvas>
                                                <h5>Memperbaiki Mobil Rusak</h5>
                                                <h6>60 menit</h6>
                                                <h4><b>211 Kal</b></h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('asset/img/car-wash.png')?>">
                                            <div class=" text-center">
                                                <canvas id="cucimobil" width="100" height="100"></canvas>
                                                <h5>Cuci Mobil</h5>
                                                <h6>30 menit</h6>
                                                <h4><b>290 Kal</b></h4>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('asset/img/man.png')?>">
                                            <div class="text-center">
                                                <canvas id="berdiri" width="100" height="100"></canvas>
                                                <h5>Berdiri</h5>
                                                <h6>30 menit</h6>
                                                <h4><b>100 Kal</b></h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('asset/img/sapu.png')?>">
                                            <div class="text-center">
                                                <canvas id="bersihrumah" width="100" height="100"></canvas>
                                                <h5>Membersihkan Rumah</h5>
                                                <h6>60 menit</h6>
                                                <h4><b>60 Kal</b></h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('asset/img/golf-player.png')?>">
                                            <div class=" text-center">
                                                <canvas id="golf" width="100" height="100"></canvas>
                                                <h5>Bermain Golf</h5>
                                                <h6>60 menit</h6>
                                                <h4><b>240 Kal</b></h4>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('asset/img/hiking.png')?>">
                                            <div class="text-center">
                                                <canvas id="hiking" width="100" height="100"></canvas>
                                                <h5>Hiking</h5>
                                                <h6>60 menit</h6>
                                                <h4><b>251 Kal</b></h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('asset/img/renovasi1.png')?>">
                                            <div class="text-center">
                                                <canvas id="renovasirumah" width="100" height="100"></canvas>
                                                <h5>Merenovasi Rumah</h5>
                                                <h6>90 menit</h6>
                                                <h4><b>337 Kal</b></h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('asset/img/dance.png')?>">
                                            <div class=" text-center">
                                                <canvas id="berdansa" width="100" height="100"></canvas>
                                                <h5>Berdansa</h5>
                                                <h6>45 menit</h6>
                                                <h4><b>430 Kal</b></h4>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('asset/img/aerobik.png')?>" width="24" height="24">
                                            <div class="text-center">
                                                <canvas id="aerobik" width="100" height="100"></canvas>
                                                <h5>Aerobik</h5>
                                                <h6>30 menit</h6>
                                                <h4><b>400 Kal</b></h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('asset/img/sapu.png')?>">
                                            <div class="text-center">
                                                <canvas id="membersihkanlantai" width="100" height="100"></canvas>
                                                <h5>Membersihkan Lantai</h5>
                                                <h6>45 menit</h6>
                                                <h4><b>138 Kal</b></h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('asset/img/sleep.png')?>">
                                            <div class="text-center">
                                                <canvas id="tidur" width="100" height="100"></canvas>
                                                <h5>Tidur</h5>
                                                <h6>360 menit</h6>
                                                <h4><b>360 Kal</b></h4>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('asset/img/gardening.png')?>">
                                            <div class="text-center">
                                                <canvas id="berkebun" width="100" height="100"></canvas>
                                                <h5>Berkebun</h5>
                                                <h6>60 menit</h6>
                                                <h4><b>360 Kal</b></h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('asset/img/bereskamar.png')?>">
                                            <div class="text-center">
                                                <canvas id="bereskamar" width="100" height="100"></canvas>
                                                <h5>Membersihkan Kamar</h5>
                                                <h6>30 menit</h6>
                                                <h4><b>251 Kal</b></h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('asset/img/runner.png')?>">
                                            <div class=" text-center">
                                                <canvas id="laripagi" width="100" height="100"></canvas>
                                                <h5>Lari Pagi</h5>
                                                <h6>30 menit</h6>
                                                <h4><b>210 Kal</b></h4>
                                            </div>
                                        </div>
                                    </div>  
                                </div>      
                            </div>
                            <br>
                            <ol class="carousel-indicators carousel-indicatorss carousel-option">
                                <li data-target = "#carousel2" data-slide-to='0' class="active"></li>
                                <li data-target = "#carousel2" data-slide-to='1'></li>
                                <li data-target = "#carousel2" data-slide-to='2'></li>
                                <li data-target = "#carousel2" data-slide-to='3'></li>
                                <li data-target = "#carousel2" data-slide-to='4'></li>
                            </ol>
                            <a class="carousel-control carousel-control-olahraga left" data-slide="prev" href="#carousel2"></a>
                            <a class="carousel-control carousel-control-olahraga right" data-slide="next" href="#carousel2"></a>
                        </div>

                        <!--end of carousel-->
                    </div>
                    <!--end of box body-->
                </div>
            </div>
            <!--end of digawe carousel-->
            <div class="col-md-2 col-md-offset-0">
                <div class="box box-primary">
                    <div class="box-header with-border" style="background-color : #3C8DBC;">
                        <h4 class="box-title text" style="color : white;"><i class="fa fa-heartbeat"></i> Berat BadanMu</h4>
                    </div>
                    <div class="box-body with-border tinggi">
                        <!--kalori terakhir-->
                        <div class="text-center">
                            <br>
                            <br>
                            <h5>Berat Badan yang kamu masukan terakhir kali</h5>
                            <h1 class="animated bounceInDown"><?php echo round($bb_user),' Kg'; ?></h1>
                            <br>
                            <h5>Ada Perubahan pada Berat Badan anda?</h5>
                        </div>
                        <!--kalori terakhir-->
                    </div>
                    <!--<div class="box-footer with-border clearfix">&nbsp;</div>-->
                </div>
            </div>    
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-warning">
                    <div class="box-header with-border" style="background-color : #F39C12;">
                        <h4 class="box-title judul-sub"><i class="fa fa-bar-chart"></i> Chart Tinggi & Berat Badanmu</h4>
                    </div>
                    <div class="box-body with-border">
                        <center><canvas id="bb_user" width="830" height="400"></canvas></center>
                        <div id="js-legend" class="chart-legend"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-success">
                    <div class="box-header with-border" style="background-color : #00A65A;">
                        <h4 class="box-title judul-sub"><i class="fa fa-heartbeat"></i> Tips Kesehatan</h4>
                    </div>
                    <div class="box-body with-border">
                        <div id="text-carousel" class="carousel slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="row">
                                <div class="col-xs-offset-3 col-xs-6">
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <div class="carousel-content">
                                                <div class="animated bounce">
                                                    <p><b>"Aturlah jadwal makan anda secara teratur dan jangan merubah-ubah atau melewatkan jadwal makan anda."</b></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php foreach ($tips_kalori as $key) {?>
                                        <div class="item">
                                            <div class="carousel-content">
                                                <div class="animated bounceInRight">
                                                    <p><b> <?php echo '"'.$key->info.'"'; ?></b></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Controls --> 
                            <a class="left carousel-control tinggi-panah" href="#text-carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            <a class="right carousel-control tinggi-panah" href="#text-carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </body>
</html>
        <script>
            var renovasirumah = [
                {
                    value : 337,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($last_kalori)-337;?>,
                    color : "#FFEA88",
                }
            ];

            var membersihkanlantai = [
                {
                    value : 138,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($last_kalori)-138;?>,
                    color : "#FFEA88",
                }
            ];

            var memperbaikimobil = [
                {
                    value : 211,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($last_kalori)-211;?>,
                    color : "#FFEA88",
                }
            ];

            var berkebun = [
                {
                    value : 360,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($last_kalori)-360;?>,
                    color : "#FFEA88",
                }
            ];

            var bereskamar = [
                {
                    value : 251,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($last_kalori)-251;?>,
                    color : "#FFEA88",
                }
            ];

            var laripagi = [
                {
                    value : 210,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($last_kalori)-210;?>,
                    color : "#FFEA88",
                }
            ];

            var cucimobil = [
                {
                    value : 290,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($last_kalori)-290;?>,
                    color : "#FFEA88",
                }
            ];

            var tidur = [
                {
                    value : 360,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($last_kalori)-360;?>,
                    color : "#FFEA88",
                }
            ];

            var aerobik = [
                {
                    value : 400,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($last_kalori)-400;?>,
                    color : "#FFEA88",
                }
            ];

            var hiking = [
                {
                    value : 251,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($last_kalori)-251;?>,
                    color : "#FFEA88",
                }
            ];

            var berdiri = [
                {
                    value : 100,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($last_kalori)-100;?>,
                    color : "#FFEA88",
                }
            ];

            var golf = [
                {
                    value : 240,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($last_kalori)-240;?>,
                    color : "#FFEA88",
                }
            ];

            var bersihrumah = [
                {
                    value : 60,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($last_kalori)-60;?>,
                    color : "#FFEA88",
                }
            ];

            var menyulam = [
                {
                    value : 85,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($last_kalori)-85;?>,
                    color : "#FFEA88",
                }
            ];

            var berdansa = [
                {
                    value : 430,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($last_kalori)-430;?>,
                    color : "#FFEA88",
                }
            ];


            var pieOptions = {
                segmentShowStroke : false,
                animateScale : true
            }

            var do_renovasi= document.getElementById("renovasirumah").getContext("2d");
            new Chart(do_renovasi).Doughnut(renovasirumah, pieOptions);

            var do_lantai= document.getElementById("membersihkanlantai").getContext("2d");
            new Chart(do_lantai).Doughnut(membersihkanlantai, pieOptions);

            var do_mobil= document.getElementById("memperbaikimobil").getContext("2d");
            new Chart(do_mobil).Doughnut(memperbaikimobil, pieOptions);

            var do_sulam= document.getElementById("menyulam").getContext("2d");
            new Chart(do_sulam).Doughnut(menyulam, pieOptions);

            var do_bersih= document.getElementById("bersihrumah").getContext("2d");
            new Chart(do_bersih).Doughnut(bersihrumah, pieOptions);

            var do_maingolf= document.getElementById("golf").getContext("2d");
            new Chart(do_maingolf).Doughnut(golf, pieOptions);

            var do_berdiri= document.getElementById("berdiri").getContext("2d");
            new Chart(do_berdiri).Doughnut(berdiri, pieOptions);

            var do_hiking= document.getElementById("hiking").getContext("2d");
            new Chart(do_hiking).Doughnut(hiking, pieOptions);

            var do_dansa= document.getElementById("berdansa").getContext("2d");
            new Chart(do_dansa).Doughnut(berdansa, pieOptions);

            var do_aerobik= document.getElementById("aerobik").getContext("2d");
            new Chart(do_aerobik).Doughnut(aerobik, pieOptions);

            var do_tidur= document.getElementById("tidur").getContext("2d");
            new Chart(do_tidur).Doughnut(tidur, pieOptions);

            var do_cucimobil= document.getElementById("cucimobil").getContext("2d");
            new Chart(do_cucimobil).Doughnut(cucimobil, pieOptions);

            var do_berkebun= document.getElementById("berkebun").getContext("2d");
            new Chart(do_berkebun).Doughnut(berkebun, pieOptions);

            var do_bereskamar= document.getElementById("bereskamar").getContext("2d");
            new Chart(do_bereskamar).Doughnut(bereskamar, pieOptions);

            var do_laripagi= document.getElementById("laripagi").getContext("2d");
            new Chart(do_laripagi).Doughnut(laripagi, pieOptions);
        </script>
        <script>
            var kalori_user_data = {
                labels : [<?php  
                        foreach ($chart_user as $k) {
                            echo '"'.date("d/m/Y",strtotime($waktu)).'",';
                        }
                ?>],
                datasets : [
                    {
                        label : "KaloriMu",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data : [
                            <?php 
                                $no=0;
                                foreach ($chart_user as $key) {
                                    echo round($key->kalori_user).',';
                                $no++;
                            } ?>]
                    },
                ]

            }
            var kalori_user = document.getElementById('kalori_user').getContext('2d');
            new Chart(kalori_user).Line(kalori_user_data,{
                responsive : true,
                pointDotRadius: 5,
                bezierCurve: true,
                scaleShowVerticalLines : true,
            });
        </script>
        <script>
            var bb_user_data = {
                labels : [<?php  
                        foreach ($chart_user as $k) {
                             echo '"'.date("d/m/Y",strtotime($waktu)).'",';
                        }
                ?>],
                datasets : [
                    {
                        label : "Tinggi Badan",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data : [
                            <?php 
                                $no=0;
                                foreach ($chart_user as $key) {
                                    echo $key->tinggi_badan.',';
                                $no++;
                            } ?>]
                    },
                    {
                        label : "Berat Badan",
                        fillColor: "rgba(255,206,0,0.4)",
                        strokeColor: "rgba(255,206,0,1)",
                        pointColor: "rgba(255,206,0,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(255,206,0,1)",
                        data : [
                            <?php 
                                $no=0;
                                foreach ($chart_user as $key) {
                                    echo $key->berat_badan.',';
                                $no++;
                            } ?>]
                    }      
                ]
            }
            var bb_user = document.getElementById('bb_user').getContext('2d');
            var mybb = new Chart(bb_user).Bar(bb_user_data,{
                responsive : true,
                pointDotRadius: 5,
                bezierCurve: true,
                scaleShowVerticalLines : true,
                legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            });
            document.getElementById('js-legend').innerHTML = mybb.generateLegend();
        </script>
<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url('asset/data/js/jQuery-2.1.4.min.js') ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('asset/adminlte/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('asset/adminlte/plugins/slimScroll/jquery.slimScroll.min.js') ?>" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?php echo base_url('asset/adminlte/plugins/fastclick/fastclick.min.js') ?>'></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('asset/adminlte/dist/js/app.min.js') ?>" type="text/javascript"></script>