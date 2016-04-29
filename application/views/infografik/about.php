<?php 
	$this->load->view('infografik/header'); 
?>
</head>
<body class="body">
        <?php $this->load->view('infografik/navbar')?>
        <span  id="makanan" class="spasi-section"></span>
		<section class="spasi-section content">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 animated bounceIn">
					<div class="box box-danger">
						<div class="box-header with-border" style="background-color : #DD4B39;">
							<center><h4 class="box-title judul-sub"> Tentang Kami</h4></center>
						</div>
						<div class="box-body with-border">
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<div class="konten">
										<div class="row">
											<br>
											<div class="col-md-6 text-center">
												<img src="<?php echo base_url('asset/img/fotohafis.JPG') ?>" height="200" width="200" class="img-circle" />
												<h4>Hafidz Zakky</h4>
											</div>
											<div class="col-md-6 text-center">
												<img src="<?php echo base_url('asset/img/fotoarya.jpg') ?>" height="200" width="200" class="img-circle" />
												<h4>Arya Kusuma</h4>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-md-12 text-justify">
												<p>Salam kenal! Kami berdua adalah mahasiswa dari Semarang. Hobi kami berdua sama yaitu sama - sama suka membuat web. Maka dari itu kami berdua berkolaborasi menyatukan pikiran, tujuan, Visi dan misi untuk menyelamatkan dunia (dengan membuat web tentang kalori, RED). Kami membuat web tentang kalori agar masyarakat dapat mengetahui info tentang kebutuhan kalori mereka. Di dalam web ini terdapat informasi tentang jumlah kebutuhan kalori yang dibutuhkan oleh pengguna, misalnya : jumlah kalori yang terdapat pada makanan, olahraga yang baik untuk membakar kalori, dan terdapat juga alat hitung untuk mengetahui jumlah kalori yang mereka butuhkan dalam sehari. Semoga web kami dapat bermanfaat dan memberikan ilmu pengetahuan kepada masyarakat luas. Dan tuliskan tips & saran anda untuk kami, agar kami dapat terus mengembangkan dan memperbaiki web kami untuk menjadi lebih baik lagi. Terimakasih.</p>
											</div>
											<br>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php 
	$this->load->view('infografik/footer'); 
?>