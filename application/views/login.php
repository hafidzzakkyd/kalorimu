<?php $this->load->view('infografik/header');?>
<?php $this->load->view('admin/template/header');?>
<link href="<?php echo base_url('asset/css/animated.css')?>" rel="stylesheet" type="text/css" />
<?php $this->load->view('infografik/navbar'); ?>
	<!--container-->
	<div class="spasi">
		<div class="row">
			<div class="col-md-5 centered">
				<div class="box box-success">
					<div class="box-header with-border" style="background-color : #00A65A;">
						<center><h4 class="box-title judul-sub"><i class="glyphicon glyphicon-log-in"></i> Masuk</h4></center>
					</div>
					<div class="box-body with-border animated bounceIn">
						<div>
							<?=$this->session->flashdata('sukses')?>
							<?=$this->session->flashdata('error')?>
						</div>
						<br>
						<?=form_open('login','class="form-horizontal"')?>
						  <div class="form-group">
						    <label class="col-sm-3 col-sm-offset-1 control-label">Nama Pengguna</label>
						    <div class="col-sm-7">
						      <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
						      <span class="text-danger"><?php echo form_error('username'); ?></span>
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="col-sm-3 col-sm-offset-1 control-label">Password</label>
						    <div class="col-sm-7">
						      <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
						      <span class="text-danger"><?php echo form_error('password'); ?></span>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-4 col-sm-9">
						      <button type="submit" class="btn btn-success btn-flat">Masuk</button>
						      <span> Belum punya akun? </span><a href="<?php echo base_url('register')?>">Daftar disni.</a>
						    </div>
						  </div>
						<?=form_close();?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('infografik/footer'); ?>
