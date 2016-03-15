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
 					<center><canvas id="kalori_user" width="1050" height="400"></canvas></center>
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
                    <center><canvas id="bb_user" width="830" height="400"></canvas></center>
                    <div id="js-legend" class="chart-legend"></div>
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
    var kalori_user = document.getElementById('kalori_user').getContext('2d');
    new Chart(kalori_user).Line(kalori_user_data,{
        responsive : true,
        pointDotRadius: 5,
        bezierCurve: true,
        scaleShowVerticalLines : true,
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
        responsive : true,
        pointDotRadius: 5,
        bezierCurve: true,
        scaleShowVerticalLines : true,
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
    });
    document.getElementById('js-legend').innerHTML = mybb.generateLegend();
</script>

<?php $this->load->view('user/template/js'); ?> 	
<?php $this->load->view('user/template/footer'); ?> 	