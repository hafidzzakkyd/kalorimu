<?php 
    $this->load->view('admin/template/header');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/template/sidebar');
 ?>     
    <section class="content">
        <!--flash Data-->
        <?=$this->session->flashdata('sukses')?>
        <?=$this->session->flashdata('error')?>
        <!--end of flash Data-->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-primary">
                    <div class="box-header with-border" style="background-color : #3C8DBC;">
                        <h4 class="box-title judul-sub"><i class="glyphicon glyphicon-user"></i> Profil</h4>
                        <a href="<?php echo base_url('admin/edit_profil/update_password/'.$profil_admin->id) ?>" class="btn btn-danger btn-flat pull-right"><i class="glyphicon glyphicon-lock"></i> Password</a>
                    </div>
                    <div class="box-body with-border">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                    <img class="img-circle" src="<?php echo base_url('upload/'.$profil_admin->foto)?>" width="165" height="165">
                                </div>
                                <div class="col-md-4">
                                    <table class="table">
                                            <tr>
                                                <td>Nama</td>
                                                <td><?php echo $profil_admin->nama_user ?></td>
                                            </tr>
                                            <tr>
                                                <td>Username</td>
                                                <td><?php echo $profil_admin->username ?></td>
                                            </tr>                                           
                                            <tr>
                                                <td>Gender</td>
                                                <td><?php echo $profil_admin->gender ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal lahir</td>
                                                <td><?php echo $profil_admin->tgl_lahir ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat lahir</td>
                                                <td><?php echo $profil_admin->tempat_lahir ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td><?php echo $profil_admin->alamat ?></td>
                                            </tr>
                                            <tr>
                                                <td>email</td>
                                                <td><?php echo $profil_admin->email ?></td>
                                            </tr>
                                            <tr>
                                                <td>Admin sejak </td>
                                                <td><?php echo $profil_admin->create_at ?></td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer with-border">
                        <?php echo anchor('admin/edit_profil/update_profil/'.$profil_admin->id, '<i class="glyphicon glyphicon-pencil"></i> Edit Profil','class="btn btn-success btn-flat"')?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $this->load->view('admin/template/js'); ?>     
<?php $this->load->view('admin/template/footer'); ?>