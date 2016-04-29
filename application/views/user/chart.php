<?php 
	$this->load->view('user/template/header');
 ?>
 	<script type="text/javascript" src="<?php echo base_url('asset/chartjs/Chart.min.js')?>"></script>
 <?php 
 	$this->load->view('user/template/topbar');
	$this->load->view('user/template/sidebar');
 ?>
 <section class="content">
 	<div class="row">
 		<div class="col-md-12">
 			<div class="box box-danger">
 				<div class="box-header with-border" style="background-color : #DD4B39;">
 					<h4 class="box-title judul-sub"><i class="fa fa-heartbeat"></i> Chart Kalorimu</h4>
 				</div>
 				<div class="box-body with-border">
                    <div class="chartWrapper">
                        <div class="chartAreaWrapper">
                            <?php 
                                $no=0;
                                foreach ($chart_user as $panjang) {
                                     $no=$no+100;
                                } ?>
                            <canvas id="kalorimu" height="400" width="<?php echo $no; ?>"></canvas>
                        </div>
                        <canvas id="myKalorimuAxis" height="400" width="0"></canvas>
                    </div> 
 				</div>
 			</div>
 		</div>
 	</div>
 	<div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border" style="background-color : #DD4B39;">
                    <h4 class="box-title judul-sub"><i class="fa fa-bar-chart"></i> Chart Tinggi & Berat Badanmu</h4>
                </div>
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
	var kalori_user_data = {
		labels : [<?php  
				foreach ($chart_user as $k) {
                    echo '"'.date("d/m/Y",strtotime($k->waktu)).'",';
				}
		?>],
		datasets : [
			{
				label : "KaloriMu",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
				data : [
					<?php 
						$no=0;
						foreach ($chart_user as $key) {
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
                foreach ($chart_user as $k) {
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
                        foreach ($chart_user as $key) {
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
                        foreach ($chart_user as $key) {
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

<?php $this->load->view('user/template/js'); ?> 	
<?php $this->load->view('user/template/footer'); ?> 	