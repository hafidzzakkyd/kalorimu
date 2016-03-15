<?php 
	$this->load->view('user/template/header');
?>
	<!--Data Tables-->
	<link rel="stylesheet" href="<?php echo base_url('asset/data/css/dataTables.bootstrap.min.css')?>">
	<!--Bootstrap-->
	<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('asset/css/animated.css')?>">
<?php		
	$this->load->view('user/template/topbar');
	$this->load->view('user/template/sidebar');

	$id = $this->session->userdata('id');
 ?>
 	<section class="content">
 		<?=$this->session->flashdata('sukses')?>
 		<?=$this->session->flashdata('error')?>
 		<div class="row">
 			<div class="col-md-12">
 				<div class="box box-danger">
 					<div class="box-header with-border" style="background-color : #DD4B39;">
 						<h4 class="box-title judul-sub"><i class="fa fa-heartbeat"></i> Kalorimu</h4>
 					</div>
 					<div class="box-body with-border">
 						<!--download excel-->
 						<a class="btn btn-warning btn-flat" href="<?php echo base_url('user/create_xls/kalori_user/'.$id)?>"><i class="glyphicon glyphicon-download"></i> Download Excel</a>
 						<br/>
 						<br/>
 						<!--end of download excel-->
 						<div class="table-responsive">
 							<table id="myTable" class="table table-striped table-hover table-bordered" cellspacing="0" width="100%">
 								<thead>
 									<tr>
 										<th class="text-center">No</th>
 										<th class="text-center">Tanggal</th>
 										<th class="text-center">BB (Kg)</th>
 										<th class="text-center">TB (Cm)</th>
 										<th class="text-center">Kalori</th>
 										<th class="text-center">BMR</th>
 										<th class="text-center">BMI</th>
 										<th class="text-center">Status BB</th>
 										<th class="text-center" style="width:130px;">Action</th>
 									</tr>
 								</thead>
 								<tbody>
 									<?php 
 										$no=0;
 										foreach ($jajal as $lihat) { 
 											$no++;
 											?>
 									<tr>
 										<td class="text-center"><?php echo $no;?></td>
										<td class="text-center"><?php echo date("d/m/Y h:i a",strtotime($lihat->waktu))?></td>
										<td class="text-center"><?php echo $lihat->berat_badan;?></td>
										<td class="text-center"><?php echo $lihat->tinggi_badan;?></td>
										<td class="text-center"><?php echo round($lihat->kalori_user);?></td>
										<td class="text-center"><?php echo round($lihat->bmr);?></td>
										<td class="text-center"><?php echo $lihat->bmi;?></td>
										<td class="text-center">
											<?php 
												if($lihat->status=='Berat Badan Sangat Kurang'){?> 
													<span class="label label-info">
														<?php echo $lihat->status; ?>
													</span>
												<?php			
												}else if($lihat->status=='Normal'){?> 
													<span class="label label-success">
														<?php echo $lihat->status; ?>
													</span>
												<?php			
												}else if($lihat->status=='Berat Badan Kurang'){?> 
													<span class="label label-primary">
														<?php echo $lihat->status; ?>
													</span>
												<?php			
												}else if($lihat->status=='Berat Badan Berlebih'){?> 
													<span class="label label-danger">
														<?php echo $lihat->status; ?>
													</span>
												<?php			
												}else if($lihat->status=='Obesitas'){?> 
													<span class="label label-warning">
														<?php echo $lihat->status; ?>
													</span>
												<?php			
												}
											?>
										</td>
										<td class="text-center">
											<a class="btn btn-danger btn-sm btn-flat" onclick="javascript:deleteConfirm('<?php echo base_url().'user/lihat_kalori/delete_kalori/'.$lihat->id_kalori;?>');"><i class="glyphicon glyphicon-trash"></i> Delete</a>
											<?php echo anchor('user/lihat_kalori/update_kalori/'.$lihat->id_kalori, '<i class="glyphicon glyphicon-pencil"></i> Edit','class="btn btn-primary btn-sm btn-flat"')?>
										</td>
 									</tr>
 									<?php } ?>
 								</tbody>
 							</table>
 						</div>
 						<p style="font-size:12px;">*BB = Berat Badan</p>
 						<p style="font-size:12px;">*TB = Tinggi Badan</p>
 						<p style="font-size:12px;">*BMI = Body Mass Index</p>
 						<p style="font-size:12px;">*BMR = Basal Metabolic Rate</p>
 					</div>
 					<div class="box-footer with-border clearfix"></div>
 				</div>
 			</div>
 		</div>
 	</section>
 	<?php $this->load->view('user/template/js'); ?> 	
 	<!--Data Tables-->
	<script type="text/javascript" src="<?php echo base_url('asset/data/js/jquery.dataTables.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('asset/data/js/dataTables.bootstrap.min.js')?>"></script>
   	<script>
		$(document).ready(function(){
   			 $('#myTable').DataTable();
		});
	</script>
   	<script>
		function deleteConfirm(url){
    		if(confirm('Hapus Record Ini ?')){
        		window.location.href=url;
    		}
 		}		
	</script>
<?php $this->load->view('user/template/footer'); ?> 	