<?php 
	$this->load->view('infografik/header'); 
?>
	<link href="<?php echo base_url('asset/css/animated.css')?>" rel="stylesheet" type="text/css" />
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo base_url('asset/data/js/jQuery-2.1.4.min.js')?>"></script>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/js/kalkulator.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/chartjs/Chart.min.js')?>"></script>
</head>
<body class="body">
        <?php $this->load->view('infografik/navbar')?>
        <span  id="olahraga" class="spasi-section"></span>
		<section class="spasi-content content hilang" id="calculate"> 
            <div class="row">
                <div class="col-md-12 text-center spasi-selamat1">
                    <h1 class="animated bounceInDown">Selamat Datang! :)</h1>
                    <h3 class="animated bounceInDown">Mulailah Hitung Kebutuhan Kalorimu</h3>
                </div>
            </div>
            <div class="row spasi">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-success animated bounceInUp">
                        <div class="box-header with-border text-center" style="background-color : #00A65A;">
                            <h4 class="box-title judul-sub"> Hitung Kalori</h4>
                        </div>
                        <br>
                        <div class="box-body with-border">
                            <?=form_open('','class="form-horizontal"')?>
                              <div class="form-group">
                                <label class="col-sm-4 control-label"> Umur <i class="fa fa-hourglass"></i></label>
                                <div class="col-sm-6">
                                  <input id="umur" type="text" class="form-control angka" placeholder="Umur" name="umur" value="<?php echo set_value('umur'); ?>">
                                      <span class="text-danger">
                                        <?php echo form_error('umur'); ?>
                                      </span>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-4 control-label">Jenis Kelamin</label>
                                <div class="col-sm-6 dropdown">
                                    <select id="jenkel" class="form-control" name="jenkel" value="<?php echo set_value('jenkel'); ?>">
                                        <option value="0">--pilih--</option>
                                        <option value="1">PRIA</option>
                                        <option value="2">WANITA</option>
                                    </select>
                                    <span class="text-danger">
                                        <?php echo form_error('jenkel'); ?>
                                    </span>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-4 control-label">Berat Badan(Kg)</label>
                                <div class="col-sm-6">
                                  <input id="bb" type="text" class="form-control angka" placeholder="Berat Badan" name="bb" value="<?php echo set_value('bb'); ?>">
                                      <span class="text-danger">
                                        <?php echo form_error('bb'); ?>
                                      </span>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-4 control-label">Tinggi Badan(Cm)</label>
                                <div class="col-sm-6">
                                  <input id="tb" type="text" class="form-control angka" placeholder="Tinggi Badan" name="tb" value="<?php echo set_value('tb'); ?>">
                                      <span class="text-danger">
                                        <?php echo form_error('tb'); ?>
                                      </span>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-4 control-label">Level Aktifitas</label>
                                <div class="col-sm-6 dropdown">
                                    <select id="aktifitas" class="form-control" name="aktifitas" value="<?php echo set_value('aktifitas'); ?>">
                                        <option value="0">--pilih--</option>
                                        <option value="1">Tidak Aktif</option>
                                        <option value="2">Aktifitas Ringan</option>
                                        <option value="3">Aktifitas Sedang</option>
                                        <option value="4">Aktifitas Berat</option>
                                        <option value="5">Aktifitas Sangat Berat</option>
                                    </select>
                                    <span class="text-danger">
                                        <?php echo form_error('aktifitas'); ?>
                                    </span>
                                </div>
                              </div>                          
                        </div>
                        <div class="box-footer with-border clearfix">
                              <div class="form-group">
                                  <div class="col-sm-offset-5 col-sm-10 col-xs-6 col-xs-offset-3">
                                    <a href="javascript:calculate()" class="btn btn-md btn-primary btn-flat jajal"><i class="fa fa-calculator"></i> Hitung</a>
                                  </div>
                              </div>
                            <?=form_close();?>  
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--muncul-->
        <section class="spasi-content content muncul">
          <div class="row">
              <div class="col-md-12 text-center spasi-selamat1">
                  <h1 class="animated bounceInDown ">Hasil Kalkulasi</h1> 
                  <h1 class="animated bounceInDown "><i class="fa fa-heartbeat"></i> Kalorimu! :)</h1>
              </div>
          </div>
          <div class="row spasi">
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-success animated bounceInUp">
                  <div class="box-header with-border text-center" style="background-color : #00A65A;">
                        <h4 class="box-title judul-sub"><i class="fa fa-heartbeat"></i> Info Kalorimu</h4>
                  </div>
                  <div class="box-body with-border">
                    <div class="row">
                      <br>
                      <div class="col-md-6 text-center">
                        <table class="table">
                          <tr>
                            <td><b>umur</b></td>
                            <td class="text-center" id="umurstr"></td>
                          </tr>
                          <tr>
                            <td><b>Jenis Kelamin</b></td>
                            <td class="text-center" id="jenkelstr"></td>
                          </tr>
                          <tr>
                            <td><b>Berat Badan</b></td>
                            <td class="text-center" id="bbstr"></td>
                          </tr>
                          <tr>
                            <td><b>Tinggi Badan</b></td>
                            <td class="text-center" id="tbstr"></td>
                          </tr>
                          <tr>
                            <td><b>Level Aktifitas</b></td>
                            <td class="text-center" id="aktifitasstr"></td>
                          </tr>
                        </table>
                        <hr>
                      </div>
                      <div class="col-md-6 text-center">
                        <label class="control-label"><br/>  BMI (Body Mass Index)</label>
                        <h1 class="box-title" id="BMI"></h1>
                        <p id="BMIkategori"></p> 
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 text-center">
                        <label class="control-label"><span>Kebutuhan</span><br/> Basal Metabolic Rate (BMR)</label>
                        <h1 class="box-title" id="BMR"></h1> 
                      </div>
                      <div class="col-md-6 text-center">
                        <label class="control-label"><span>Kebutuhan</span><br/> Kalori Harianmu</label>
                        <h1 class="box-title" id="kalori"></h1>
                      </div>
                    </div>
                    <hr style="align : center;" width="550">
                    <center><img src="<?php echo base_url('asset/img/activity.png')?>"></center>
                    <div class="text-center"><h4>Cara Bakar Kalorimu</h4></div>
                    <div id="carousel2" class="carousel slide spasi-section">
                        <div class="carousel-inner">
                            <div class="item active" data-interval="3">
                                <div class="row text-center">
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
                                <div class="row text-center">
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
                                <div class="row text-center">
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
                                <div class="row text-center">
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
                                <div class="row text-center">
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
                        <a class="carousel-control carousel-control-olahraga left" data-slide="prev" href="#carousel2"><i class="glyphicon glyphicon-chevron-left" style="color:#ff4800;"></i></a>
                        <a class="carousel-control carousel-control-olahraga right" data-slide="next" href="#carousel2"><i class="glyphicon glyphicon-chevron-right" style="color:#ff4800;"></i></a>
                        <div style="margin : 20px 0px 0px 20px;">*kalori global = 2000 Kal</div>
                    </div>
                    <!--end of carousel-->
                    <hr style="align : center;" width="550">
                    <div class="form-group clearfix">
                        <h5 class="text-center"><b>Daftar dan Dapatkan info lengkap tentang Kalorimu</b></h5>
                        <div class="col-sm-offset-1 col-sm-10">
                          <center><a href="<?php echo base_url('register')?>" class="btn btn-md btn-warning btn-flat jajal"><i class=" glyphicon glyphicon-list-alt"></i> Daftar</a></center>
                          <h6 class="text-center">atau</h6>
                        </div>
                        <br>
                        <div class="col-sm-offset-1 col-sm-10">
                          <center><a href="<?php echo base_url('kalkulator')?>" class="btn btn-md btn-primary btn-flat jajal"><i class="fa fa-calculator"></i> Hitung Lagi?</a></center>
                        </div>
                    </div>
                    <!--end of body-->
                  </div>
                </div>
            </div>
          </div>
        </section>
        <script>
		    $('#datetime').datetimepicker({
		        viewMode: 'days',
		        minDate: new Date(), //Current
		        format: 'YYYY-MM-DD HH:mm:s',
		    });
	    </script>
      <script>
            $(document).ready(function() {
                $(".angka").keydown(function (e){
                    // Allow: backspace, delete, tab, escape, enter and .
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                         // Allow: Ctrl+A
                        (e.keyCode == 65 && e.ctrlKey === true) ||
                         // Allow: Ctrl+C
                        (e.keyCode == 67 && e.ctrlKey === true) ||
                         // Allow: Ctrl+X
                        (e.keyCode == 88 && e.ctrlKey === true) ||
                         // Allow: home, end, left, right
                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                             // let it happen, don't do anything
                             return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
            });
      </script>
      <script>
        function isNull(a){
          if (a == null || a == "" || a ==0){
            return true;
          }
          return false;
        }
      </script>
      <script>
          $(document).ready(function(){
            $(".muncul").hide();
            $(".jajal").click(function(){
              if(isNull(document.getElementById("umur").value)){
                alert("Mohon Isi Umur Anda");
                return;
              }
              if(isNull(document.getElementById("jenkel").value)){
                alert("Mohon Isi Jenis Kelamin Anda");
                return;
              }
              if(isNull(document.getElementById("bb").value)){
                alert("Mohon Isi Berat Badan Anda");
                return;
              }
              if(isNull(document.getElementById("tb").value)){
                alert("Mohon Isi Tinggi Badan Anda");
                return;
              }
              if(isNull(document.getElementById("aktifitas").value)){
                alert("Mohon Isi Aktifitas Anda");
                return;
              }else{
                $(".muncul").show();
                $(".hilang").hide();
              }
            });
          });
      </script>
      <script>
            var renovasirumah = [
                {
                    value : 337,
                    color : "#FF8153",
                },
                {
                    value : 2000-337,
                    color : "#FFEA88",
                }
            ];

            var membersihkanlantai = [
                {
                    value : 138,
                    color : "#FF8153",
                },
                {
                    value : 2000-138,
                    color : "#FFEA88",
                }
            ];

            var memperbaikimobil = [
                {
                    value : 211,
                    color : "#FF8153",
                },
                {
                    value : 2000-211,
                    color : "#FFEA88",
                }
            ];

            var berkebun = [
                {
                    value : 360,
                    color : "#FF8153",
                },
                {
                    value : 2000-360,
                    color : "#FFEA88",
                }
            ];

            var bereskamar = [
                {
                    value : 251,
                    color : "#FF8153",
                },
                {
                    value : 2000-251,
                    color : "#FFEA88",
                }
            ];

            var laripagi = [
                {
                    value : 210,
                    color : "#FF8153",
                },
                {
                    value : 2000-210,
                    color : "#FFEA88",
                }
            ];

            var cucimobil = [
                {
                    value : 290,
                    color : "#FF8153",
                },
                {
                    value : 2000-290,
                    color : "#FFEA88",
                }
            ];

            var tidur = [
                {
                    value : 360,
                    color : "#FF8153",
                },
                {
                    value : 2000-360,
                    color : "#FFEA88",
                }
            ];

            var aerobik = [
                {
                    value : 400,
                    color : "#FF8153",
                },
                {
                    value : 2000-400,
                    color : "#FFEA88",
                }
            ];

            var hiking = [
                {
                    value : 251,
                    color : "#FF8153",
                },
                {
                    value : 2000-251,
                    color : "#FFEA88",
                }
            ];

            var berdiri = [
                {
                    value : 100,
                    color : "#FF8153",
                },
                {
                    value : 2000-100,
                    color : "#FFEA88",
                }
            ];

            var golf = [
                {
                    value : 240,
                    color : "#FF8153",
                },
                {
                    value : 2000-240,
                    color : "#FFEA88",
                }
            ];

            var bersihrumah = [
                {
                    value : 60,
                    color : "#FF8153",
                },
                {
                    value : 2000-60,
                    color : "#FFEA88",
                }
            ];

            var menyulam = [
                {
                    value : 85,
                    color : "#FF8153",
                },
                {
                    value : 2000-85,
                    color : "#FFEA88",
                }
            ];

            var berdansa = [
                {
                    value : 430,
                    color : "#FF8153",
                },
                {
                    value : 2000-430,
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
<?php 
	$this->load->view('infografik/footer'); 
?>