<?php $this->load->view('infografik/header');?>
<?php $this->load->view('admin/template/header');?>
	<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

	<script type="text/javascript" src="<?php echo base_url('asset/data/js/jQuery-2.1.4.min.js')?>"></script>
	
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
	<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
	<link href="<?php echo base_url('asset/css/animated.css')?>" rel="stylesheet" type="text/css" />
<?php $this->load->view('infografik/navbar'); ?>

	<div class="container spasi">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 animated bounceIn">
				<div class="box box-danger">
					<div class="box-header with-border" style="background-color : #DD4B39;">
						<center><h3 class="box-title judul-sub"><i class="glyphicon glyphicon-user"></i> Daftar</h3></center>
					</div>
					<div class="box-body with-border">
						<br>
						<?=form_open('register','class="form-horizontal"')?>
						  <div class="form-group">
						    <label class="col-sm-4 col-sm-offset-1 control-label">Nama Lengkap</label>
						    <div class="col-sm-5">
						      <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama'); ?>">
							  <span class="text-danger">
								  <?php echo form_error('nama'); ?>
							  </span>	
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="col-sm-4 col-sm-offset-1 control-label">Nama Pengguna</label>
						    <div class="col-sm-5">
						      <input type="text" class="form-control" name="username" placeholder="Nama Pengguna" value="<?php echo set_value('username'); ?>">
							  <span class="text-danger">
								  <?php echo form_error('username'); ?>
							  </span>	
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="col-sm-4 col-sm-offset-1 control-label">Password</label>
						    <div class="col-sm-5">
						      <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
						      <span class="text-danger">
								  <?php echo form_error('password'); ?>
							  </span>
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="col-sm-4 col-sm-offset-1 control-label">Konfirmasi Password</label>
						    <div class="col-sm-5">
						      <input type="password" class="form-control" name="cpassword" placeholder="Konfirmasi Password" value="<?php echo set_value('cpassword'); ?>">
						      <span class="text-danger">
								  <?php echo form_error('cpassword'); ?>
							  </span>
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="col-sm-4 col-sm-offset-1 control-label">Jenis Kelamin</label>
						    <div class="col-sm-5">
						      <div class="dropdown">
							  	<select class="form-control" name="jenkel" value="<?php echo set_value('jenkel'); ?>">
							  		<option value="0">--Pilih--</option>
							  		<option value="1">PRIA</option>
							  		<option value="2">WANITA</option>
							  	</select>
							  </div>
							  <span class="text-danger">	
								  <?php echo form_error('jenkel'); ?>
							  </span>	
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="col-sm-4 col-sm-offset-1 control-label">Tempat Lahir</label>
						    <div class="col-sm-5">
						      <input type="text" class="form-control" name="tempatlahir" placeholder="Tempat Lahir">	
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="col-sm-4 col-sm-offset-1 control-label">Tanggal Lahir</label>
						    <div class="col-sm-5">
						      <input type="text" id="datetime" class="form-control" name="tgllahir" placeholder="Tanggal Lahir">	
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="col-sm-4 col-sm-offset-1 control-label">Email</label>
						    <div class="col-sm-5">
						      <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
						      <span class="text-danger">
								  <?php echo form_error('email'); ?>
							  </span>
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="col-sm-4 col-sm-offset-1 control-label">Alamat</label>
						    <div class="col-sm-5">
						      <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
						    </div>
						  </div>
					</div>
					<div class="box-footer with-border clearfix">
						  <div class="form-group">
						    <div class="col-sm-offset-5 col-sm-10">
						      <button type="submit" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-ok"></i> Kirim</button>
						    </div>
						  </div>
						<?=form_close();?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
	<script>
   	$('#datetime').datetimepicker({
		    viewMode: 'days',
		    format: 'YYYY-MM-DD',
		});
   	</script>