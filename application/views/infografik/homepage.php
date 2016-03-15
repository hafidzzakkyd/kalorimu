<?php 
	$this->load->view('infografik/header'); 
?>
</head>
<body class="body">
	<section>
		<section id="home" class="home">
			<div class="page-container">
				<div class="col-md-12 col-sm-12">
					<h1 class="judul animated bounceInDown"><i class="fa fa-heartbeat"></i> KaloriMu</h1>			
					<h4 class="animated bounce">Cara mudah untuk melihat kebutuhan kalori harian anda!</h4>
					<br/><br/><br/>
					<a href="#kalori" class="btn-home spasi smoothScroll">Cek Sekarang</a>
				</div>
			</div>
		</section>
        <?php $this->load->view('infografik/navbar')?>

        <span  id="kalori" class="spasi-section"></span>
		<section class="spasi-section content">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 animated bounceIn">
					<div class="box box-danger">
						<div class="box-header with-border" style="background-color : #DD4B39;">
							<center><h4 class="box-title"><span class="judul-sub">Kalori</span></h4></center>
						</div>
						<div class="box-body with-border">
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<div class="konten text-justify apapun">
										<br>
										<p>Kalori merupakan satuan ukur untuk menyatakan nilai energi. Dalam ilmu gizi, kalori berkaitan dengan konsumsi 
										energi yang diperoleh dari makanan dan minuman serta penggunaan energi dalam aktivitas fisik. 
										Tubuh memerlukan kalori untuk menghasilkan energi. Energi berperan penting dalam kehidupan, tanpa energi, sel - sel tubuh dapat mati, 
										sistem - sistem organ dalam dapat berhenti, serta tidak dapat melakukan aktivitas sehari - hari.</p>
										<center><b>Ada 2 tipe istilah untuk kalori :</b></center>
										<br><br>
										<div class="col-md-6 text-justify">
											<p><b>Kalori kecil</b> (simbol : kal atau cal) = 1 cal<br>adalah jumlah energi yang dibutuhkan untuk menaikkan 1 gram air dengan 1 derajat Celcius.</p>
										</div>
										<div class="col-md-6 text-justify">
											<p><b>Kalori besar</b> (simbol : Kal, Cal, Kkal, Kcal) = 1 Cal adalah jumlah energi yang dibutuhkan untuk menaikkan 1 kilogram air dengan 1 derajat celcius.</p>
										</div>	
									</div>
								</div>
							</div>
							<center><img src="<?php echo base_url('asset/img/1.png')?>" height="250" width="150"></center>
							<br>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="box box-primary">
						<div class="box-header with-border" style="background-color : #3C8DBC;">
							<center><h4 class="box-title judul-sub"><span class="judul-sub">BMR (Basal Metabolic Rate)</span></h4></center>
						</div>
						<div class="box-body with-border">
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<div class="konten text-justify apapun">
										<br>
										<p>Sebelum anda dapat menghitung kebutuhan kalori tubuh anda per hari, anda harus bisa dulu mengetahui berapa BMR 
										(Basal Metabolic Rate) anda. BMR adalah energi atau kalori yang dibutuhkan dalam sehari dalam kondisi istirahat 
										(tidak sedang melakukan aktivitas apapun)</p><br/>
									</div>
									<div class="col-md-6 apapun">
										<center><img src="<?php echo base_url('asset/img/pria.png')?>" height="130" width="130"></center>
										<br>
										<div class="text-center"><b>BMR Pria</b></div>
										<p class="text-center">66,4730 + (13,7516 x BB kg) + (5,0033 x TB cm) - (6,7550 x usia)</p>
									</div>
									<div class="col-md-6 apapun">
										<center><img src="<?php echo base_url('asset/img/wanita.png')?>" height="130" width="130"></center>
										<br>
										<div class="text-center"><b>BMR Wanita</b></div>
										<p class="text-center">655,0955 + (9,5634 x BB kg) + (1,8496 x TB cm) - (4,6756 x usia)</p>
									</div>
								</div>
								<div class="col-md-10 col-md-offset-1 konten">
									<br>
									<p>Apabila sudah mendapatkan nilai BMR, selanjutnya akan kita kalikan dengan nilai level aktivitas, adapun nilai aktivitas :</p>
									<ul>
										<li>Tidak aktif : 1,2 -> Mereka yang tidak berolahraga sama sekali dalam seminggu</li>
										<li>Aktivitas ringan : 1,375 -> Mereka yang berolahraga 1 - 3 kali dalam seminggu</li>
										<li>Aktivitas sedang : 1,55 -> Mereka yang berolahraga 4 - 5 kali dalam seminggu</li>
										<li>Aktivitas berat : 1,725 -> Mereka yang berolahraga 6 - 7 kali dalam seminggu</li>
										<li>Aktivitas sangat berat : 1,9 -> Mereka yang berolahraga 2 kali / lebih dalam sehari</li>
									</ul>
								</div>
								<br>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</section>
<?php 
	$this->load->view('infografik/footer'); 
?>