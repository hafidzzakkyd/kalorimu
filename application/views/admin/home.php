<?php 
	  $this->load->view('admin/template/header');
?>
		<link rel="stylesheet" href="<?php echo base_url('asset/css/animated.css')?>">
<?php
	  $this->load->view('admin/template/topbar');
	  $this->load->view('admin/template/sidebar');
	  $user_count = $jumlah; 
	  $tips;
	  ?>
	</head>
	<body>
	  <section class="content">
	  	<!--flash Data-->
		<?=$this->session->flashdata('sukses')?>
		<?=$this->session->flashdata('error')?>
		<!--end of flash Data-->
	  	<div class="row">
	  		<div class="col-md-12">
	  			<div class="box box-danger">
	  				<div class="box-header with-border" style="background-color : #DD4B39;">
	  					<h4 class="box-title judul-sub"><i class="glyphicon glyphicon-home"></i> BERANDA</h4>
	  				</div>
	  				<div class="box-body with-border">
	  					<div class="row">
	  						<div class="col-md-6">
	  							<div class="small-box bg-purple">
		  							<div class="inner">
		  								<h3>Hari :  
		  								<?php
		  									if(date('l')=='Monday'){
		  										echo "Senin";
		  									}else if(date('l')=='Tuesday'){
		  										echo "Selasa";
		  									}else if(date('l')=='Wednesday'){
		  										echo "Rabu";
		  									}else if(date('l')=='Thursday'){
		  										echo "Kamis";
		  									}else if(date('l')=='Friday'){
		  										echo "Jumat";
		  									}else if(date('l')=='Saturday'){
		  										echo "Sabtu";
		  									}else if(date('l')=='Sunday'){
		  										echo "MINGGU";
		  									}
		  								?></h3>		
		  								<h4><b>Tanggal : <?php 
		  									echo date('d-');
		  									if(date('m')==01){
		  										echo "<b>Januari</b>";
		  									}elseif(date('m')==02){
		  										echo "<b>Februari</b>";
		  									}elseif(date('m')==03){
		  										echo "<b>Maret</b>";
		  									}elseif(date('m')==04){
		  										echo "<b>April</b>";
		  									}elseif(date('m')==05){
		  										echo "<b>Mei</b>";
		  									}elseif(date('m')==06){
		  										echo "<b>Juni</b>";
		  									}elseif(date('m')==07){
		  										echo "<b>Juli</b>";
		  									}elseif(date('m')==08){
		  										echo "<b>Agustus</b>";
		  									}elseif(date('m')==09){
		  										echo "<b>September</b>";
		  									}elseif(date('m')==10){
		  										echo "<b>Oktober</b>";
		  									}elseif(date('m')==11){
		  										echo "<b>November</b>";
		  									}else{
		  										echo "<b>Desember</b>";
		  									}
		  									echo date('-Y');
		  								?></b></h4>
		  								<h5><b>Pukul : <?php echo date('H:i:s a');?></b></h5>
		  							</div>
		  							<div class="icon">
		  								<i class="ion ion-calendar"></i>
		  							</div>
		  								<div class="small-box-footer"></div>
		  						</div>
	  						</div>
	  						<div class="col-md-6">
	  							<div class="small-box bg-green">
		  							<div class="inner">
		  								<?php 
											foreach ($best as $row){ 
										?>
		  								<h3><?php echo $row->username;?></h3>		
		  								<?php } ?>
		  								<p>Pengguna Aktif <i class="fa fa-heartbeat"></i> KaloriMu</p>
		  							</div>
		  							<div class="icon">
		  								<i class="ion ion-person"></i>
		  							</div>
		  								<a href="<?php echo base_url('admin/info_user/info/'.$row->id_user)?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		  						</div>
	  						</div>
	  					</div>
	  					<div class="row">
	  						<div class="col-md-4">
	  							<div class="small-box bg-yellow">
		  							<div class="inner">
		  								<h3><?php echo $user_count;?> Pengguna</h3>		
		  								<p><i class="fa fa-heartbeat"></i> KaloriMu</p>
		  							</div>
		  							<div class="icon">
		  								<i class="ion ion-person"></i>
		  							</div>
		  								<a href="<?php echo base_url('read')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		  						</div>
	  						</div>
	  						<div class="col-md-4">
	  							<div class="small-box bg-red">
		  							<div class="inner">
		  								<h3><?php echo $tips;?> Tips Sehat</h3>			
		  								<p><i class="fa fa-heartbeat"></i> KaloriMu</p>
		  							</div>
		  							<div class="icon">
		  								<i class="ion ion-document"></i>
		  							</div>
		  								<a href="<?php echo base_url('tips')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		  						</div>
	  						</div>
	  						<div class="col-md-4">
	  							<div class="small-box bg-blue">
		  							<div class="inner">
		  								<h3><?php echo $register;?> Pengguna</h3>
		  								<p>Baru di bulan <?php 
		  									if(date('m')==01){
		  										echo "<b>Januari</b>";
		  									}elseif(date('m')==02){
		  										echo "<b>Februari</b>";
		  									}elseif(date('m')==03){
		  										echo "<b>Maret</b>";
		  									}elseif(date('m')==04){
		  										echo "<b>April</b>";
		  									}elseif(date('m')==05){
		  										echo "<b>Mei</b>";
		  									}elseif(date('m')==06){
		  										echo "<b>Juni</b>";
		  									}elseif(date('m')==07){
		  										echo "<b>Juli</b>";
		  									}elseif(date('m')==08){
		  										echo "<b>Agustus</b>";
		  									}elseif(date('m')==09){
		  										echo "<b>September</b>";
		  									}elseif(date('m')==10){
		  										echo "<b>Oktober</b>";
		  									}elseif(date('m')==11){
		  										echo "<b>November</b>";
		  									}else{
		  										echo "<b>Desember</b>";
		  									}
		  								?></p>
		  							</div>
		  							<div class="icon">
		  								<i class="ion ion-person-add"></i>
		  							</div>
		  								<a href="<?php echo base_url('read')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		  						</div>
	  						</div>
	  					</div>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  </section>
<?php $this->load->view('admin/template/js') ?>
<?php $this->load->view('admin/template/footer') ?>