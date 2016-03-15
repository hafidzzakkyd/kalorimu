<?php $this->load->view('admin/template/header') ?>
	<!--Data Tables-->
	<link rel="stylesheet" href="<?php echo base_url('asset/data/css/dataTables.bootstrap.min.css')?>">
	<!--Bootstrap-->
	<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('asset/css/animated.css')?>">
<?php $this->load->view('admin/template/topbar');
	  $this->load->view('admin/template/sidebar'); 
	  ?>
</head>
<body>
<section class="content">
	<!--flash Data-->
	<?=$this->session->flashdata('sukses')?>
	<?=$this->session->flashdata('error')?>
	<!--end of flash Data-->
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<!--box header-->
				<div class="box-header with-border" style="background-color : #3C8DBC;">
					<h4 class="box-title judul-sub"><i class="fa fa-heartbeat"></i> Tips Kalori</h4>
				</div>
				<!--end of box header-->
				<!--box body-->
				<div class="box-body with-border">
					<div class="table-responsive">
					    <!--btn add user-->
					    <a class="btn btn-success btn-flat" href="<?php echo base_url('admin/tips_kalori/form')?>"><i class="glyphicon glyphicon-plus"></i> Add Tips</a>
						<!--end of btn add user-->
						<!--btn add user-->
					    <a class="btn btn-warning btn-flat" href="<?php echo base_url('admin/create_xls/tips_kalori')?>"><i class="glyphicon glyphicon-download"></i> Download Excel</a>
						<!--end of btn add user-->
					    <br />
					    <br />
						<table id="myTable" class="table table-striped table-hover table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th class="text-center" style="width:10px">No</th>
									<th class="text-center">Judul</th>
									<th class="text-center" style="width:350px">Informasi</th>
									<th class="text-center">Create At</th>
									<th class="text-center">Update At</th>
									<th class="text-center"style="width:120px;">
										Action
									</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$no=0;
									foreach ($tips_kalori as $row) : 
										$no++;
										?>
								<tr>
									<td class="text-center"><?php echo $no; ?></td>								
									<td class="text-center"><?php echo $row->judul; ?></td>
									<td class="text-center"><?php echo $row->info; ?></td>
									<td class="text-center"><?php echo $row->create_at; ?></td>
									<td class="text-center"><?php echo $row->update_at; ?></td>
									<td>
										<a class="btn btn-danger btn-sm btn-flat" onclick="javascript:deleteConfirm('<?php echo base_url().'admin/tips_kalori/delete_tips/'.$row->id;?>');"><i class="glyphicon glyphicon-trash"></i> Delete</a>
										<?php echo anchor('admin/tips_kalori/update_tips/'.$row->id, '<i class="glyphicon glyphicon-edit"></i> Edit','class="btn btn-primary btn-sm btn-flat"')?>
									</td>
								</tr>
								<?php  endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<!--end of box body-->
			</div>
		</div>
	</div>
</section>
	<!--end of modal add user-->
	<?php $this->load->view('admin/template/js') ?>
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
	<?php $this->load->view('admin/template/footer') ?>
</div>
	<!--bootstrap-->
</body>
</html>
