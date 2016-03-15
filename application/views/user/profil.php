<?php 
	$this->load->view('user/template/header');
	$this->load->view('user/template/topbar');
	$this->load->view('user/template/sidebar');
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
 					</div>
 					<div class="box-body with-border">
 						<div class="container">
 							<div class="row">
 								<div class="col-md-2">
 									<img class="img-circle" src="<?php echo base_url('upload/'.$profil->foto)?>" width="165" height="165">
 								</div>
 								<div class="col-md-4">
 									<table class="table table-user-information">
 											<tr>
 												<td>Nama</td>
 												<td><?php echo $profil->nama_user ?></td>
 											</tr>
 											<tr>
 												<td>Username</td>
 												<td><?php echo $profil->username ?></td>
 											</tr> 											
 											<tr>
 												<td>Gender</td>
 												<td><?php echo $profil->gender ?></td>
 											</tr>
 											<tr>
 												<td>Tanggal lahir</td>
 												<td><?php echo $profil->tgl_lahir ?></td>
 											</tr>
 											<tr>
 												<td>Tempat lahir</td>
 												<td><?php echo $profil->tempat_lahir ?></td>
 											</tr>
 											<tr>
 												<td>Alamat</td>
 												<td><?php echo $profil->alamat ?></td>
 											</tr>
                                            <tr>
                                                <td>email</td>
                                                <td><?php echo $profil->email ?></td>
                                            </tr>
 											<tr>
 												<td>Member since</td>
 												<td><?php echo date("d/m/Y h:i a",strtotime($profil->create_at))?></td>
 											</tr>
 									</table>
 								</div>
 							</div>
 						</div>
                    </div>
                    <div class="box-footer with-border">
                        <?php echo anchor('user/edit_profil/update_profil/'.$profil->id, '<i class="glyphicon glyphicon-pencil"></i> Edit Profil','class="btn btn-success    btn-flat"')?>
                        <a href="<?php echo base_url('user/edit_profil/update_password/'.$profil->id) ?>" class="btn btn-danger btn-flat pull-right"><i class="glyphicon glyphicon-lock"></i> Password</a>
                    </div>
 				</div>
 			</div>
 		</div>
 	</section>
<?php $this->load->view('user/template/js'); ?> 	
<?php $this->load->view('user/template/footer'); ?> 	 	