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
                <h6><a href="<?php echo base_url('user/profil')?>" style="text-decoration : none ; color : white;"><?php echo $this->session->userdata('nama_user'); ?></a></h6>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="<?php echo base_url('user/f_end_user/pilihan')?>"><i class="glyphicon glyphicon-th-large"></i> Landing Page</a></li>
            <li <?php if($this->uri->uri_string() == 'hitung_kalori'){echo 'class="active"';} ?>><?php echo anchor('hitung_kalori','<i class="fa fa-calculator"></i> Hitung Kalori')?></li>
            <li <?php if($this->uri->uri_string() == 'lihat_kalori'){echo 'class="active"';} ?>><?php echo anchor('lihat_kalori','<i class="fa fa-heartbeat"></i> Lihat Kalorimu')?></li>
            <li <?php if($this->uri->uri_string() == 'chart_user'){echo 'class="active"';} ?>><?php echo anchor('chart_user','<i class="fa fa-pie-chart"></i> Chart')?></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper body">