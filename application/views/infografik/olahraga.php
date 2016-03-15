<?php 
	$this->load->view('infografik/header'); 
?>
		<script type="text/javascript" src="<?php echo base_url('asset/chartjs/Chart.min.js')?>"></script>
        <?php $this->load->view('infografik/navbar')?>
        <span  id="olahraga" class="spasi-section"></span>
		<section class="spasi-section content">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="box box-danger animated bounceIn">
						<div class="box-header with-border" style="background-color : #DD4B39;">
							<center><h4 class="box-title judul-sub"> Olahraga</h4></center>
						</div>
						<div class="box-body with-border">
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<div class="konten">
										<br>
										<p>Agar badan menjadi sehat dan bugar, kita harus rajin berolah - raga. Selain itu olah - raga membantu membakar kalori di tubuh kita.</p>
										<p>Jika kita sering berolah - raga terus menerus secara rutin maka tubuh kita akan merasakan dampaknya. Berikut terdapat beberapa contoh dampak dari sering berolah - raga secara rutin :</p><br/>
										<ul>
											<li>Proses penurunan berat badan menjadi efektif</li>
											<li>Lebih bertenaga</li>
											<li>Melatih konsentrasi</li>
											<li>Baik untuk metabolisme tubuh</li>
											<li>Melatih otak dan fokus</li>
											<li>Menentukan prioritas</li>
											<li>Mudah bangun pagi</li>
											<li>Melatih disiplin</li>
											<li>Meningkatkan ketajaman mental</li>
										</ul>
										<br>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="box box-primary animated bounceInUp">
						<div class="box-header with-border" style="background-color : #3C8DBC;">
							<center><h4 class="box-title judul-sub"> Olahraga</h4></center>
						</div>
						<div class="box-body with-border">
							<div id="carousel2" class="carousel slide">
	                            <div class="carousel-inner">
	                                <div class="item active" data-interval="3">
	                                    <div class="row">
											<div class="col-md-4">
												<div class="col-md-12 text-center">
													<center><img src="<?php echo base_url('asset/img/sepeda.png')?>" width="80" height="80"></center>
													<p><center><canvas id="bersepeda" width="170" height="170"></canvas></center></p>
													<h5>Bersepeda</h5>
				                                    <h6>60 menit</h6>
				                                    <h4><b>950 kalori</b></h4>
												</div>							
											</div>
											<div class="col-md-4">
												<div class="col-md-12 text-center">
													<center><img src="<?php echo base_url('asset/img/jump.png')?>" width="80" height="80"></center>
													<p><center><canvas id="lompattali" width="170" height="170"></canvas></center></p>
													<h5>Lompat Tali</h5>
				                                    <h6>60 menit</h6>
				                                    <h4><b>850 kalori</b></h4>
												</div>							
											</div>
											<div class="col-md-4">
												<div class="col-md-12 text-center">
													<center><img src="<?php echo base_url('asset/img/swim.png')?>" width="80" height="80"></center>
													<p><center><canvas id="renang" width="170" height="170"></canvas></center></p>
													<h5>Berenang</h5>
				                                    <h6>60 menit</h6>
				                                    <h4><b>840 kalori</b></h4>
												</div>							
											</div>	
										</div>  
	                                </div>
	                                <div class="item">
	                                    <div class="row">
	                                        <div class="col-md-4">
												<div class="col-md-12 text-center">
													<center><img src="<?php echo base_url('asset/img/run.png')?>" width="80" height="80"></center>
													<p><center><canvas id="lari" width="170" height="170"></canvas></center></p>
													<h5>Lari</h5>
				                                    <h6>60 menit</h6>
				                                    <h4><b>748 kalori</b></h4>
												</div>							
											</div>
											<div class="col-md-4">
												<div class="col-md-12 text-center">
													<center><img src="<?php echo base_url('asset/img/aerobik.png')?>" width="80" height="80"></center>
													<p><center><canvas id="aerobik" width="170" height="170"></canvas></center></p>
													<h5>Aerobik</h5>
				                                    <h6>60 menit</h6>
				                                    <h4><b>650 kalori</b></h4>
												</div>							
											</div>
											<div class="col-md-4">
												<div class="col-md-12 text-center">
													<center><img src="<?php echo base_url('asset/img/treadmill.png')?>" width="80" height="80"></center>
													<p><center><canvas id="treadmill" width="170" height="170"></canvas></center></p>
													<h5>Treadmill</h5>
				                                    <h6>60 menit</h6>
				                                    <h4><b>600 kalori</b></h4>
												</div>							
											</div>
	                                    </div>  
	                                </div>
	                            </div>
	                            <a class="carousel-control carousel-control-olahraga left" data-slide="prev" href="#carousel2"><i style="color:#ff4800;" class="glyphicon glyphicon-chevron-left"></i></a>
	                            <a class="carousel-control carousel-control-olahraga right" data-slide="next" href="#carousel2"><i style="color:#ff4800;" class="glyphicon glyphicon-chevron-right"></i></a>
	                        </div>
	                        <!--end of carousel-->
	                        <h6>*kalori global = 2000 Kal</h6>
						</div>
					</div>
				</div>
			</div>
		</section>
		<script>
			var lompattali = [
	                {
	                    value : 850,
	                    color : "#FF8153",
	                },
	                {
	                    value : 2000-850,
	                    color : "#FFEA88",
	                }
	            ];

	        var berenang = [
	                {
	                    value : 840,
	                    color : "#FF8153",
	                },
	                {
	                    value : 2000-840,
	                    color : "#FFEA88",
	                }
	            ];

	        var bersepeda = [
	                {
	                    value : 950,
	                    color : "#FF8153",
	                },
	                {
	                    value : 2000-950,
	                    color : "#FFEA88",
	                }
	            ];

	        var lari = [
	                {
	                    value : 748,
	                    color : "#FF8153",
	                },
	                {
	                    value : 2000-748,
	                    color : "#FFEA88",
	                }
	            ];

	        var aerobik = [
	                {
	                    value : 748,
	                    color : "#FF8153",
	                },
	                {
	                    value : 2000-748,
	                    color : "#FFEA88",
	                }
	            ];

	        var treadmill = [
	                {
	                    value : 600,
	                    color : "#FF8153",
	                },
	                {
	                    value : 2000-600,
	                    color : "#FFEA88",
	                }
	            ];

			var pieOptions = {
				segmentShowStroke : false,
				animateScale : true
			}

		    

			var do_lompat= document.getElementById("lompattali").getContext("2d");
			new Chart(do_lompat).Doughnut(lompattali, pieOptions);

			var do_renang= document.getElementById("renang").getContext("2d");
			new Chart(do_renang).Doughnut(berenang, pieOptions);

			var do_bersepeda= document.getElementById("bersepeda").getContext("2d");
			new Chart(do_bersepeda).Doughnut(bersepeda, pieOptions);

			var do_lari= document.getElementById("lari").getContext("2d");
			new Chart(do_lari).Doughnut(lari, pieOptions);

			var do_aerobik= document.getElementById("aerobik").getContext("2d");
			new Chart(do_aerobik).Doughnut(aerobik, pieOptions);

			var do_treadmill= document.getElementById("treadmill").getContext("2d");
			new Chart(do_treadmill).Doughnut(treadmill, pieOptions);

		</script>


<?php 
	$this->load->view('infografik/footer'); 
?>