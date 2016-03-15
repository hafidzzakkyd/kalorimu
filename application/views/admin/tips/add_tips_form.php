<?php
	$this->load->view('admin/template/header');	
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
						<h4 class="box-title judul-sub"><i class="glyphicon glyphicon-plus"></i> Add Tips Kalori</h4>
					</div>
					<!--end of box header-->
					<!--box body-->
					<div class="box-body with-border">
						<?=form_open('admin/tips_kalori/add_tips','class="form-horizontal"')?>
							<div class="form-group">
								<label class="col-sm-3 control-label">Judul</label>
							    <div class="col-sm-8">
							      <input type="text" class="form-control" name="judul" placeholder="Judul" value="<?php echo set_value('judul'); ?>">
							      <span class="text-danger">
							      	<?php echo form_error('judul'); ?>
							      </span>	
							    </div>
							</div>
							<div class="form-group">
							    <label class="col-sm-3 control-label">Tips Kalori</label>
							    <div class="col-sm-8">
							      <textarea class="form-control" name="informasi" placeholder="Tips Kalori"></textarea>
							      <span class="text-danger">
							      	<?php echo form_error('informasi'); ?>
							      </span>	
							    </div>
							</div>
							<div class="form-group">
							    <div class="col-sm-offset-4 col-sm-10">
							      <button type="submit" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-ok"></i> Submit</button>
							      <a href="<?php echo base_url('admin/tips_kalori/tips') ?>" class="btn btn-danger btn-flat"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
							    </div>
							</div>
						<?=form_close();?>
					</div>
					<!--end of box body-->
				</div>
			</div>
		</div>
 	</section>
 <?php 
	$this->load->view('admin/template/js');
  	$this->load->view('admin/template/footer') ;
?>