<?php $foto = $this->session->userdata('foto');?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('upload/'.$foto) ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <h6><a href="<?php echo base_url('admin/profil')?>" style="text-decoration : none ; color : white;"><?php echo $this->session->userdata('nama_user'); ?></a></h6>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li <?php if($this->uri->uri_string() == 'home'){echo 'class="active"';} ?>><?php echo anchor('home','<i class="glyphicon glyphicon-home"></i> Beranda')?></li>
            <li <?php if($this->uri->uri_string() == 'read'){echo 'class="active"';} ?>><?php echo anchor('read','<i class="fa fa-table"></i> Tabel User')?></li>
            <li <?php if($this->uri->uri_string() == 'tips'){echo 'class="active"';} ?>><?php echo anchor('tips','<i class="fa fa-heartbeat"></i> Tips Kalori')?></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper body">