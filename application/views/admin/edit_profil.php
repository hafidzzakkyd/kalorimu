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
 <?php 

        $id                = $user_profil->id;
        if($this->input->post('submitted')){
            $nama          = set_value('nama');
            $username      = set_value('username');
            $jenkel        = set_value('jenkel');
            $tempatlahir   = set_value('tempatlahir');
            $tgllahir      = set_value('tgllahir');
            $email         = set_value('email');
            $alamat        = set_value('alamat');
            $foto          = set_value('foto');
            $update_at     = set_value('',date('Y-m-d H:i:s'));
        }
            $nama          = $user_profil->nama_user;
            $username      = $user_profil->username;
            $jenkel        = $user_profil->jenis_kelamin;
            $tempatlahir   = $user_profil->tempat_lahir;
            $tgllahir      = $user_profil->tgl_lahir;
            $email         = $user_profil->email;
            $alamat        = $user_profil->alamat;
            $foto          = $user_profil->foto;
 ?> 	
 	<section class="content">
 		<div class="row">
 			<div class="col-md-8 col-md-offset-2">
 				<div class="box box-primary">
 					<div class="box-header with-border" style="background-color : #3C8DBC;">
 						<h4 class="box-title judul-sub"><i class="glyphicon glyphicon-user"></i> Edit Profil</h4>
 					</div>
 					<div class="box-body with-border">
 						<div class="container">
 							<div class="row">
 								<div class="col-md-2">
 									<img class="img-circle" src="<?php echo base_url('upload/'.$foto)?>" width="165" height="165">
 								</div>
 								<div class="col-md-4">
                                    <?=form_open_multipart('admin/edit_profil/update_profil/' .$id,'class="form-horizontal"')?>
                                        <!--hidden-->
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
                                        <!--end of hidden-->
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Nama</label>
                                            <div class="col-sm-6">
                                              <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo set_value('nama',$nama)?>">
                                              <span class="text-danger">
                                                <?php echo form_error('nama'); ?>
                                              </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Username</label>
                                            <div class="col-sm-6">
                                              <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username',$username)?>">
                                              <span class="text-danger">
                                                <?php echo form_error('username'); ?>
                                              </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Jenis Kelamin</label>
                                            <div class="col-sm-6">
                                              <div class="dropdown">
                                                <select class="form-control" name="jenkel" value="<?php echo set_value('jenkel',$jenkel)?>">
                                                    <option value="0">--Pilih--</option>
                                                    <option value="1" <?php if($jenkel==1){echo 'selected="selected"';} ?>>PRIA</option>
                                                    <option value="2" <?php if($jenkel==2){echo 'selected="selected"';} ?>>WANITA</option>
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
                                              <input type="text" class="form-control" name="tempatlahir" placeholder="Tempat Lahir" value="<?php echo set_value('tempatlahir',$tempatlahir)?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Tanggal Lahir</label>
                                            <div class="col-sm-6">
                                              <input type="text" id="datepicker" class="form-control" name="tgllahir" placeholder="Tanggal Lahir" value="<?php echo set_value('tgllahir',$tgllahir)?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Email</label>
                                            <div class="col-sm-6">
                                              <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email',$email)?>">
                                              <span class="text-danger">
                                                <?php echo form_error('email'); ?>
                                              </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Alamat</label>
                                            <div class="col-sm-6">
                                              <textarea class="form-control" name="alamat" placeholder="Alamat"><?php echo set_value('alamat',$alamat) ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Upload Foto</label>
                                            <div class="col-sm-6">
                                                <input type="file" name="foto" value="<?php echo set_value('foto',$foto)?>">
                                                <br>
                                                <span>*Foto dalam bentuk JPG</span>
                                                <span>*maksimal size 500kb</span>
                                            </div>
                                        </div>
 							</div>
 						</div>
                    </div>
                    <div class="box-footer with-border clearfix">
                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-10">
                                                <input type="hidden" name="submitted" value="1">
                                                <button type="submit" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-ok"></i> Submit</button>
                                                <a href="<?php echo base_url('admin/profil') ?>" class="btn btn-danger btn-flat"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
                                            </div>
                                        </div>
                                    <?=form_close();?>
                                </div>
                    </div>
 				</div>
 			</div>
 		</div>
 	</section>
    <script>
        $('#datepicker').datetimepicker({
                viewMode: 'days',
                format: 'YYYY-MM-DD',
            });
    </script>
<?php 
      $this->load->view('admin/template/js');   
      $this->load->view('admin/template/footer'); 
?>  