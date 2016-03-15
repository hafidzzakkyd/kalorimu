<?php 
	$this->load->view('admin/template/header');
?>
	<!--bootstrap
        
        <link rel="stylesheet" href="<?php echo base_url('asset/datetimepicker/bootstrap-datetimepicker.css')?>">
        
        <script type="text/javascript" src="<?php echo base_url('asset/datetimepicker/js/moment.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('asset/datetimepicker/js/bootstrap-datetimepicker.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('asset/js/bootstrap.min.js')?>"></script>
		-->
		<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css')?>">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

		<script type="text/javascript" src="<?php echo base_url('asset/data/js/jQuery-2.1.4.min.js')?>"></script>
		
		<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
		<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
<?php	
	$this->load->view('admin/template/topbar');
	$this->load->view('admin/template/sidebar');
 ?>
	<section class="content">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="box box-primary">
					<!--box header-->
					<div class="box-header with-border" style="background-color : #3C8DBC;">
						<h4 class="box-tittle judul-sub"><i class="glyphicon glyphicon-plus"></i> Add User</h4>
					</div>
					<!--end of box header-->
					<!--box body-->
					<div class="box-body with-border">
						<?=form_open('admin/crud/create','class="form-horizontal"')?>
							<div class="form-group">
								<label class="col-sm-4 control-label">Full Name</label>
							    <div class="col-sm-6">
							      <input type="text" class="form-control" name="nama" placeholder="Full Name" value="<?php echo set_value('nama'); ?>">
							      <span class="text-danger">
							      	<?php echo form_error('nama'); ?>
							      </span>	
							    </div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Username</label>
							    <div class="col-sm-6">
							      <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
							      <span class="text-danger">
							      	<?php echo form_error('username'); ?>
							      </span>	
							    </div>
							</div>
							<div class="form-group">
							    <label class="col-sm-4 control-label">Kata Sandi</label>
							    <div class="col-sm-6">
							      <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
							      <span class="text-danger">
							      	<?php echo form_error('password'); ?>
							      </span>	
							    </div>
							</div>
							<div class="form-group">
							    <label class="col-sm-4 control-label">Konfirmasi Kata Sandi</label>
							    <div class="col-sm-6">
							      <input type="password" class="form-control" name="cpassword" placeholder="Password" value="<?php echo set_value('cpassword'); ?>">
							      <span class="text-danger">
							      	<?php echo form_error('cpassword'); ?>
							      </span>	
							    </div>
							</div>
							<div class="form-group">
							    <label class="col-sm-4 control-label">Jenis Kelamin</label>
							    <div class="col-sm-6">
							      <div class="dropdown">
								  	<select class="form-control" name="jenkel" value="<?php echo set_value('jenkel'); ?>">
								  		<option value="0" selected="selected">--pilih--</option>
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
								<label class="col-sm-4 control-label">Tempat Lahir</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="tempatlahir" placeholder="Tempat Lahir">	
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Tanggal Lahir</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="datetime" name="tgllahir" placeholder="Tanggal Lahir">	
								</div>
							</div>
							<div class="form-group">
							    <label class="col-sm-4 control-label">Email</label>
							    <div class="col-sm-6">
							      <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
							      <span class="text-danger">	
							      	<?php echo form_error('email'); ?>
							      </span>	
							    </div>
							</div>
							<div class="form-group">
							    <label class="col-sm-4 control-label">Alamat</label>
							    <div class="col-sm-6">
							      <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
							    </div>
							</div>
							<div class="form-group">
							    <label class="col-sm-4 control-label">Level</label>
							    <div class="col-sm-6">
							      <div class="dropdown">
								  	<select class="form-control" name="role" value="<?php echo set_value('role'); ?>">
								  		<option value="0" selected="selected">--pilih--</option>
								  		<option value="1">admin</option>
								  		<option value="2">user</option>
								  	</select>
								  </div>
								  <span class="text-danger">	
							      	<?php echo form_error('role'); ?>
							      </span>	
							    </div>
							</div>
							<div class="form-group">
							    <div class="col-sm-offset-4 col-sm-10">
							      <button type="submit" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-ok"></i> Submit</button>
							      <a href="<?php echo base_url('admin/crud/read') ?>" class="btn btn-danger btn-flat"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
							    </div>
							</div>
						<?=form_close();?>
					</div>
					<!--end of box body-->
				</div>
			</div>
		</div>
	</section>
	<script>
   	$('#datetime').datetimepicker({
		    viewMode: 'days',
		    format: 'YYYY-MM-DD',
		});
   	</script>
<?php 
	  $this->load->view('admin/template/js');
	  $this->load->view('admin/template/footer') ;
	?>