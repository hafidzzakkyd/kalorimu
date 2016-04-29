<?php 
    $this->load->view('admin/template/header');
?>
    <script type="text/javascript" src="<?php echo base_url('asset/chartjs/Chart.min.js')?>"></script>
    <!--Data Tables-->
    <link rel="stylesheet" href="<?php echo base_url('asset/data/css/dataTables.bootstrap.min.css')?>">
    <!--Bootstrap-->
    <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/animated.css')?>">
<?php    
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/template/sidebar');
 ?>     
<?php 
    $id         = $info_user->id;
    $nama       = $info_user->nama_user;
    $username   = $info_user->username;
    $password   = $info_user->password;
    $jenkel     = $info_user->gender;
    $tgllahir   = $info_user->tgl_lahir;
    $tempatlahir= $info_user->tempat_lahir;
    $alamat     = $info_user->alamat;
    $email      = $info_user->email;
    $role       = $info_user->level;
    $create_at  = $info_user->create_at;

    $password   = $info_user->password;
?> 
    <section class="content">
        <!--flash Data-->
        <?=$this->session->flashdata('sukses')?>
        <?=$this->session->flashdata('error')?>
        <!--end of flash Data-->
        <div class="row ">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="box box-primary">
                    <div class="box-header with-border" style="background-color : #3C8DBC;">
                        <h4 class="box-title judul-sub"><i class="glyphicon glyphicon-user"></i> Info USER</h4>
                    </div>
                    <div class="box-body with-border">
                        <div class="container">
                            <div class="row">
                                <br>
                                <div class="col-md-3">
                                    <center><img class="img-circle" src="<?php echo base_url('upload/'.$info_user->foto)?>" width="165" height="165"></center>
                                </div>
                                <div class="col-md-5">
                                    <table class="table">
                                            <tr>
                                                <td><i class="glyphicon glyphicon-user"></i> Nama</td>
                                                <td><?php echo $nama?></td>
                                            </tr>
                                            <tr>
                                                <td><i class="glyphicon glyphicon-user"></i> Username</td>
                                                <td><?php echo $username ?></td>
                                            </tr>                                           
                                            <tr>
                                                <td><i class="glyphicon glyphicon-user"></i> Gender</td>
                                                <td><?php echo $jenkel ?></td>
                                            </tr>
                                            <tr>
                                                <td><i class="glyphicon glyphicon-calendar"></i> Tanggal lahir</td>
                                                <td><?php echo $tgllahir ?></td>
                                            </tr>
                                            <tr>
                                                <td><i class="glyphicon glyphicon-home"></i> Tempat lahir</td>
                                                <td><?php echo $tempatlahir ?></td>
                                            </tr>
                                            <tr>
                                                <td><i class="glyphicon glyphicon-map-marker"></i> Alamat</td>
                                                <td><?php echo $alamat ?></td>
                                            </tr>
                                            <tr>
                                                <td><i class="glyphicon glyphicon-envelope"></i> email</td>
                                                <td><?php echo $email ?></td>
                                            </tr>
                                            <tr>
                                                <td><i class="glyphicon glyphicon-user"></i> <?php echo $role ?> sejak </td>
                                                <td><?php echo date("d/m/Y h:i a",strtotime($create_at))?></td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer with-border clearfix">
                        <?php echo anchor('admin/crud/update/'.$id, '<i class="glyphicon glyphicon-pencil"></i> Edit User','class="btn btn-primary btn-sm btn-flat"')?>
                        <a href="<?php echo base_url('admin/crud/read')?>" class="btn btn-danger btn-flat btn-sm"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="box box-danger">
                    <div class="box-header with-border" style="background-color : #DD4B39;">
                        <h4 class="box-title judul-sub"><i class="fa fa-heartbeat"></i> Kalori <?php echo $nama?></h4>
                    </div>
                    <br>
                    <div class="box-body with-border">
                        <div class="table-responsive">
                            <!--btn add user dan download Excel-->
                            <a class="btn btn-success btn-flat" href="<?php echo base_url('admin/info_user/add_kalori_user/'.$id)?>"><i class="glyphicon glyphicon-plus"></i> Add Kalori</a>
                            <a class="btn btn-warning btn-flat" href="<?php echo base_url('admin/create_xls/kalori_user/'.$id)?>"><i class="glyphicon glyphicon-download"></i> Download Excel</a>
                            <!--end of btn add user-->
                            <br/>
                            <br/>
                            <table id="myTable" class="table table-striped table-hover table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:10px">No</th>
                                        <th class="text-center" style="width:20px">Tanggal</th>
                                        <th class="text-center" style="width:60px">BB (Kg)</th>
                                        <th class="text-center" style="width:60px">TB (cm)</th>
                                        <th class="text-center" style="width:40px">Kalori</th>
                                        <th class="text-center" style="width:30px">BMR</th>
                                        <th class="text-center" style="width:30px">BMI</th>
                                        <th class="text-center" style="width:100px">Status BB</th>
                                        <th class="text-center" style="width:180px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 0;
                                        foreach ($kalori_user as $lihat) { 
                                            $no++;
                                            ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no ?></td>
                                        <td class="text-center"><?php echo date("d/m/Y",strtotime($lihat->waktu))?></td><!--"d/m/Y h:i a"-->
                                        <td class="text-center"><?php echo $lihat->berat_badan ?></td>
                                        <td class="text-center"><?php echo $lihat->tinggi_badan ?></td>
                                        <td class="text-center"><?php echo round($lihat->kalori_user) ?></td>
                                        <td class="text-center"><?php echo round($lihat->bmr) ?></td>
                                        <td class="text-center"><?php echo $lihat->bmi ?></td>
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
                                                    <span class="label label-warning">
                                                        <?php echo $lihat->status; ?>
                                                    </span>
                                                <?php           
                                                }else if($lihat->status=='Obesitas'){?> 
                                                    <span class="label label-danger">
                                                        <?php echo $lihat->status; ?>
                                                    </span>  
                                                <?php           
                                                }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-danger btn-sm btn-flat" onclick="javascript:deleteConfirm('<?php echo base_url().'admin/info_user/delete_kalori_user/'.$lihat->id_kalori;?>');"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                            <?php echo anchor('admin/info_user/update_kalori_user/'.$lihat->id_kalori, '<i class="glyphicon glyphicon-pencil"></i> Edit','class="btn btn-primary btn-sm btn-flat"')?>         
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
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="box box-success">
                    <div class="box-header with-border" style="background-color : #00A65A;">
                        <h4 class="box-title judul-sub"><i class="fa fa-heartbeat"></i> Chart Kalori <?php echo $nama?></h4>
                    </div>
                    <br>
                    <div class="box-body with-border">
                        <div class="chartWrapper">
                            <div class="chartAreaWrapper">
                                <!--jajal-->
                                <?php 
                                    $no = 0;
                                    foreach ($kalori_user as $panjang) { 
                                        $no=$no+100;
                                        }?>                                
                                <canvas id="kalorimu" width="<?php echo $no; ?>" height="400" ></canvas>
                            </div>
                            <canvas id="myKalorimuAxis" height="400" width="0"></canvas>
                        </div>                         
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="box box-warning">
                    <div class="box-header with-border" style="background-color : #F39C12;">
                        <h4 class="box-title judul-sub"><i class="fa fa-heartbeat"></i> Chart tinggi dan berat badan <?php echo $nama?></h4>
                    </div>
                    <br>
                    <div class="box-body with-border">
                        <div class="chartWrapper">
                            <div class="chartAreaWrapper">
                                <canvas id="bb_user" height="400" width="<?php echo $no; ?>"></canvas>
                                <div id="js-legend" class="chart-legend"></div>
                            </div>
                            <canvas id="myChartAxisbb" height="400" width="0"></canvas>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function deleteConfirm(url){
            if(confirm('Hapus Record Ini ?')){
                window.location.href=url;
            }
        }       
    </script>
    <script>
        var kalori_user_data = {
            labels : [<?php
                    foreach ($kalori_user as $k) {
                        echo '"'.date("d/m/Y",strtotime($k->waktu)).'",';
                    }
            ?>],
            datasets : [
                {
                    fillColor : "rgba(64,185,201,0.4)",
                    strokeColor : "#008b9f",
                    pointColor : "#fff",
                    pointStrokeColor : "#3998a5",
                    data : [
                        <?php 
                            $no=0;
                            foreach ($kalori_user as $key) {
                                echo round($key->kalori_user).',';
                            $no++;
                        } ?>]
                }
            ]

        }

        var ctx = document.getElementById('kalorimu').getContext('2d');
        new Chart(ctx).Line(kalori_user_data, {                    
        onAnimationComplete: function () {
            var sourceCanvas = this.chart.ctx.canvas;
            var copyWidth = this.scale.xScalePaddingLeft - 5;
                    // the +5 is so that the bottommost y axis label is not clipped off
                    // we could factor this in using measureText if we wanted to be generic
                    var copyHeight = this.scale.endPoint + 5;
                    var targetCtx = document.getElementById("myKalorimuAxis").getContext("2d");
                    targetCtx.canvas.width = copyWidth;
                    targetCtx.drawImage(sourceCanvas, 0, 0, copyWidth, copyHeight, 0, 0, copyWidth, copyHeight);
                }
            });
    </script>
    <script>
        var bb_user_data = {
            labels : [<?php
                    foreach ($kalori_user as $k) {
                        echo '"'.date("d/m/Y",strtotime($k->waktu)).'",';
                    }
            ?>],
            datasets : [
                    {
                        label : "Tinggi Badan",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data : [
                            <?php 
                                $no=0;
                                foreach ($kalori_user as $key) {
                                    echo $key->tinggi_badan.',';
                                $no++;
                            } ?>]
                    },
                    {
                        label : "Berat Badan",
                        fillColor: "rgba(255,206,0,0.4)",
                        strokeColor: "rgba(255,206,0,1)",
                        pointColor: "rgba(255,206,0,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(255,206,0,1)",
                        data : [
                            <?php 
                                $no=0;
                                foreach ($kalori_user as $key) {
                                    echo $key->berat_badan.',';
                                $no++;
                            } ?>]
                    }      
                ]
        }
        var bb_user = document.getElementById('bb_user').getContext('2d');
        var mybb = new Chart(bb_user).Bar(bb_user_data,{                    
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            onAnimationComplete: function () {
                var sourceCanvas = this.chart.bb_user.canvas;
                var copyWidth = this.scale.xScalePaddingLeft - 5;
                        // the +5 is so that the bottommost y axis label is not clipped off
                        // we could factor this in using measureText if we wanted to be generic
                        var copyHeight = this.scale.endPoint + 5;
                        var targetCtx = document.getElementById("myChartAxisbb").getContext("2d");
                        targetCtx.canvas.width = copyWidth;
                        targetCtx.drawImage(sourceCanvas, 0, 0, copyWidth, copyHeight, 0, 0, copyWidth, copyHeight);
                    }
                }
        );
        document.getElementById('js-legend').innerHTML = mybb.generateLegend();
    </script>
<?php $this->load->view('admin/template/js'); ?>
    <!--Data Tables-->
    <script type="text/javascript" src="<?php echo base_url('asset/data/js/jquery.dataTables.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/data/js/dataTables.bootstrap.min.js')?>"></script>
    <script>
        $(document).ready(function(){
             $('#myTable').DataTable();
        });
    </script>     
<?php $this->load->view('admin/template/footer'); ?>