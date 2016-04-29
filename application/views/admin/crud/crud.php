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
					<h4 class="box-title judul-sub"><i class="glyphicon glyphicon-user"></i> Tabel User</h4>
				</div>
				<!--end of box header-->
				<!--box body-->
				<div class="box-body with-border">
					<div class="table-responsive">
						<br>
					    <!--btn add user-->
					    <a class="btn btn-success btn-flat" href="<?php echo base_url('admin/crud/create')?>"><i class="glyphicon glyphicon-plus"></i> Add User</a>
						<!--end of btn add user-->
						<!--btn add user-->
					    <a class="btn btn-warning btn-flat" href="<?php echo base_url('admin/create_xls/crud')?>"><i class="glyphicon glyphicon-download"></i> Download Excel</a>
						<!--end of btn add user-->
					    <br />
					    <br />
						<table id="myTable" class="table table-striped table-hover table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th class="text-center" style="width:10px">No</th>
									<th class="text-center" style="width:10px;">Username</th>
									<th class="text-center" style="width:50px">Gender</th>
									<th class="text-center" style="width:50px;">Email</th>
									<th class="text-center" style="width:10px;">Level</th>
									<th class="text-center" style="width:90px;">Sejak</th>
									<th class="text-center"style="width:185px;">
										Action
									</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$no=0;
									foreach ($query as $row) : 
										$no++;
										?>
								<tr>
									<td class="text-center"><?php echo $no; ?></td>								
									<td class="text-center"><?php echo $row->username; ?></td>
									<td class="text-center"><?php echo $row->gender; ?></td>
									<td class="text-center"><?php echo $row->email; ?></td>
									<td class="text-center"><?php echo $row->level; ?></td>
									<td class="text-center"><?php echo date("d-",strtotime($row->create_at))?>
										<?php 
											if(date('m',strtotime($row->create_at))==01){
		  										echo "Januari";
		  									}elseif(date('m',strtotime($row->create_at))==02){
		  										echo "Februari";
		  									}elseif(date('m',strtotime($row->create_at))==03){
		  										echo "Maret";
		  									}elseif(date('m',strtotime($row->create_at))==04){
		  										echo "April";
		  									}elseif(date('m',strtotime($row->create_at))==05){
		  										echo "Mei";
		  									}elseif(date('m',strtotime($row->create_at))==06){
		  										echo "Juni";
		  									}elseif(date('m',strtotime($row->create_at))==07){
		  										echo "Juli";
		  									}elseif(date('m',strtotime($row->create_at))==08){
		  										echo "Agustus";
		  									}elseif(date('m',strtotime($row->create_at))==09){
		  										echo "September";
		  									}elseif(date('m',strtotime($row->create_at))==10){
		  										echo "Oktober";
		  									}elseif(date('m',strtotime($row->create_at))==11){
		  										echo "November";
		  									}elseif(date('m',strtotime($row->create_at))==12){
		  										echo "Desember";
		  									}
		  									echo date('-Y',strtotime($row->create_at));
										?>
									</td>
									<td class="text-center">
										<a class="btn btn-danger btn-sm btn-flat" onclick="javascript:deleteConfirm('<?php echo base_url().'admin/crud/delete/'.$row->id;?>');"><i class="glyphicon glyphicon-trash"></i> Delete</a>
										<?php echo anchor('admin/crud/update/'.$row->id, '<i class="glyphicon glyphicon-edit"></i> Edit','class="btn btn-primary btn-sm btn-flat"')?>
										<?php echo anchor('admin/info_user/info/'.$row->id, '<i class="glyphicon glyphicon-eye-open"></i> Info','class="btn btn-info btn-flat btn-sm"')?>
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
