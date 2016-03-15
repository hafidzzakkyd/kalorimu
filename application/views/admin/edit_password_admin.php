<?php 
    $this->load->view('admin/template/header');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/template/sidebar');
 ?>      
 <?php 
    $id                = $password_user->id;
    if($this->input->post('submitted')){
        $password      = set_value('password');
        $update_at     = set_value('',date('Y-m-d H:i:s'));
    }else{
        $password      = $password_user->password;
    }
  ?>
    <section class="content">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-5">
                <div class="box box-danger">
                    <div class="box-header with-border" style="background-color : #DD4B39;">
                        <h4 class="box-title judul-sub"><i class="glyphicon glyphicon-lock"></i> Ganti Password</h4>
                    </div>
                    <div class="box-body with-border">
                        <?=form_open('admin/edit_profil/update_password/' .$id,'class="form-horizontal"')?>
                        <!--hidden-->
                          <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
                        <!--end of hidden-->
                          <div class="form-group">
                            <label  class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password', $password)?>">
                              <span class="text-danger">
                                  <?php echo form_error('password'); ?>
                              </span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-sm-2 control-label">Confirm Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" name="cpassword" placeholder="Password" value="<?php echo set_value('cpassword')?>">
                              <span class="text-danger">
                                  <?php echo form_error('cpassword'); ?>
                              </span>
                            </div>
                          </div>
                    </div>
                    <div class="box-footer with-border clearfix">
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-10">
                              <input type="hidden" name="submitted" value="1">
                              <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="glyphicon glyphicon-ok"></i> Ganti Password</button>
                              <a href="<?php echo base_url('admin/profil') ?>" class="btn btn-flat btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Kembali</a>
                            </div>
                          </div>
                        <?=form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $this->load->view('admin/template/js'); ?>     
<?php $this->load->view('admin/template/footer'); ?>