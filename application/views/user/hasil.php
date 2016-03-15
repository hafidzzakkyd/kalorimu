<?php 
	$this->load->view('user/template/header');
?>
	<!--bootstrap
        
        <link rel="stylesheet" href="<?php echo base_url('asset/datetimepicker/bootstrap-datetimepicker.css')?>">
        
        <script type="text/javascript" src="<?php echo base_url('asset/datetimepicker/js/moment.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('asset/datetimepicker/js/bootstrap-datetimepicker.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('asset/js/bootstrap.min.js')?>"></script>
		-->
		<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('asset/css/main.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('asset/css/animated.css')?>">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

		<script type="text/javascript" src="<?php echo base_url('asset/data/js/jQuery-2.1.4.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('asset/chartjs/Chart.min.js')?>"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
		<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
<?php	
	$this->load->view('user/template/topbar');
	$this->load->view('user/template/sidebar');
 ?>
 <?php 
 	$bmi 	= $hasil->bmi;
 	$bmr 	= $hasil->bmr;
 	$status = $hasil->status;
 	$kalori = $hasil->kalori_user;

  ?>
 	<section class="spasi-content content muncul">
      <div class="row">
          <div class="col-md-12 text-center spasi-selamat1">
              <h1 class="animated bounceInDown ">Hasil Kalkulasi</h1> 
              <h1 class="animated bounceInDown "><i class="fa fa-heartbeat"></i> Kalorimu! :)</h1>
          </div>
      </div>
      <div class="row spasi">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-success animated bounceInUp">
              <div class="box-header with-border text-center" style="background-color : #00A65A;">
                    <h4 class="box-title judul-sub"><i class="fa fa-heartbeat"></i> Info Kalorimu</h4>
              </div>
              <div class="box-body with-border">
                <div class="row">
                  <div class="col-md-6 col-md-offset-3 text-center">
                    <label class="control-label"><br/>  BMI (Body Mass Index)</label>
                    <h1 class="box-title" id="BMI"><?php echo "BMI : ".$bmi ?></h1>
                    <p id="BMIkategori">Kategori Berat Badan Anda :</p> 
                    <b style="font-size:24px;">(<?php echo $status; ?>)</b>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 text-center">
                    <label class="control-label"><span>Kebutuhan</span><br/> Basal Metabolic Rate (BMR)</label>
                    <h1 class="box-title" id="BMR"><?php echo $bmr ?></h1>
                    <b style="font-size:24px;">Kalori/Hari</b>
                  </div>
                  <div class="col-md-6 text-center">
                    <label class="control-label"><span>Kebutuhan</span><br/> Kalori Harianmu</label>
                    <h1 class="box-title" id="kalori"><?php echo round($kalori) ?></h1>
                    <b style="font-size:24px;">Kalori/Hari</b>
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
                    <div class="col-sm-offset-1 col-sm-10">
                      <center><a href="<?php echo base_url('hitung_kalori')?>" class="btn btn-md btn-primary btn-flat jajal"><i class="fa fa-calculator"></i> Hitung Lagi?</a></center>
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
            var renovasirumah = [
                {
                    value : 337,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($kalori)?>-337,
                    color : "#FFEA88",
                }
            ];

            var membersihkanlantai = [
                {
                    value : 138,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($kalori)?>-138,
                    color : "#FFEA88",
                }
            ];

            var memperbaikimobil = [
                {
                    value : 211,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($kalori)?>-211,
                    color : "#FFEA88",
                }
            ];

            var berkebun = [
                {
                    value : 360,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($kalori)?>-360,
                    color : "#FFEA88",
                }
            ];

            var bereskamar = [
                {
                    value : 251,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($kalori)?>-251,
                    color : "#FFEA88",
                }
            ];

            var laripagi = [
                {
                    value : 210,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($kalori)?>-210,
                    color : "#FFEA88",
                }
            ];

            var cucimobil = [
                {
                    value : 290,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($kalori)?>-290,
                    color : "#FFEA88",
                }
            ];

            var tidur = [
                {
                    value : 360,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($kalori)?>-360,
                    color : "#FFEA88",
                }
            ];

            var aerobik = [
                {
                    value : 400,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($kalori)?>-400,
                    color : "#FFEA88",
                }
            ];

            var hiking = [
                {
                    value : 251,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($kalori)?>-251,
                    color : "#FFEA88",
                }
            ];

            var berdiri = [
                {
                    value : 100,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($kalori)?>-100,
                    color : "#FFEA88",
                }
            ];

            var golf = [
                {
                    value : 240,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($kalori)?>-240,
                    color : "#FFEA88",
                }
            ];

            var bersihrumah = [
                {
                    value : 60,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($kalori)?>-60,
                    color : "#FFEA88",
                }
            ];

            var menyulam = [
                {
                    value : 85,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($kalori)?>-85,
                    color : "#FFEA88",
                }
            ];

            var berdansa = [
                {
                    value : 430,
                    color : "#FF8153",
                },
                {
                    value : <?php echo round($kalori)?>-430,
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
<?php $this->load->view('user/template/js'); ?> 	
<?php $this->load->view('user/template/footer'); ?> 	