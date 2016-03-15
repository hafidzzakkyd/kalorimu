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
 <?php $id = $id_user->id; ?>
 	<section class="content">
 		<div class="row">
 			<div class="col-md-6 col-md-offset-3">
 				<div class="box box-success">
 					<div class="box-header with-border" style="background-color : #00A65A;">
 						<h4 class="box-title judul-sub"><i class="fa fa-calculator"></i> Hitung Kalori</h4>
 					</div>
 					<div class="box-body with-border">
 						<?=form_open('admin/info_user/add_kalori_user/'.$id,'class="form-horizontal"')?>
						  <div class="form-group">
						    <label class="col-sm-4 control-label">Umur</label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control angka" placeholder="Umur" name="umur" value="<?php echo set_value('umur'); ?>">
							      <span class="text-danger">
							      	<?php echo form_error('umur'); ?>
							      </span>
						    </div>
						  </div>
		 				  <div class="form-group">
						    <label class="col-sm-4 control-label">Jenis Kelamin</label>
						    <div class="col-sm-6 dropdown">
							  	<select class="form-control" name="jenkel" value="<?php echo set_value('jenkel'); ?>">
							  		<option value="0">--pilih--</option>
							  		<option value="pria">PRIA</option>
							  		<option value="wanita">WANITA</option>
							  	</select>
							  	<span class="text-danger">
				  					<?php echo form_error('jenkel'); ?>
			  					</span>
							</div>
						  </div>
						  <div class="form-group">
						    <label class="col-sm-4 control-label">Berat Badan</label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control angka" placeholder="Berat Badan" name="bb" value="<?php echo set_value('bb'); ?>">
							      <span class="text-danger">
							      	<?php echo form_error('bb'); ?>
							      </span>
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="col-sm-4 control-label">Tinggi Badan</label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control angka" placeholder="Tinggi Badan" name="tb" value="<?php echo set_value('tb'); ?>">
							      <span class="text-danger">
							      	<?php echo form_error('tb'); ?>
							      </span>
						    </div>
						  </div>
		 				  <div class="form-group">
						    <label class="col-sm-4 control-label">Level Aktifitas</label>
						    <div class="col-sm-6 dropdown">
							  	<select class="form-control" name="aktifitas" value="<?php echo set_value('aktifitas'); ?>">
							  		<option value="0">--pilih--</option>
							  		<option value="1">Tidak Aktif</option>
							  		<option value="2">Aktifitas Ringan</option>
							  		<option value="3">Aktifitas Sedang</option>
							  		<option value="4">Aktifitas Berat</option>
							  		<option value="5">Aktifitas Sangat Berat</option>
							  	</select>
							  	<span class="text-danger">
				  					<?php echo form_error('jenkel'); ?>
			  					</span>
							</div>
						  </div>						  
						  <div class="form-group">
						    <label class="col-sm-4 control-label">Tanggal</label>
						    <div class="col-sm-6">
						      <input type="date" class="form-control datepicker" id="datetime" name="tanggal" value="<?php echo set_value('tanggal'); ?>">
							      <span class="text-danger">
							      	<?php echo form_error('tanggal'); ?>
							      </span>
						    </div>
						  </div>						  
 					</div>
 					<div class="box-footer with-border clearfix">
 							<div class="form-group">
						    	<div class="col-sm-offset-4 col-sm-10">
						      	<button type="submit" class="btn btn-md btn-primary btn-flat btn-sm"><i class="glyphicon glyphicon-ok"></i> Submit</button>
						      	<a class="btn btn-sm btn-danger btn-flat" href="<?php echo base_url('admin/info_user/info/'.$id)?>"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
						    	</div>
						  	</div>	
						<?=form_close();?>
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

<?php $this->load->view('admin/template/js'); ?> 	
<?php $this->load->view('admin/template/footer'); ?> 	