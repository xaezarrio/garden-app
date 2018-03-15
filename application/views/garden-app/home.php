<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">DASHBOARD Admin</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					
					<!-- BAR CHART -->
			          <div class="box box-primary">
			            <div class="box-header with-border">
			            	<div class="row">
								<div class="col-xs-8">
					              <h3 class="box-title">
					              		Nominal (Juta) - Kontrak | Invoice | Modal | Pengeluaran
					              </h3>
					            </div>
					            <!-- end col -->
					            <div class="col-xs-4">
					            	<p class="text-center">
					                    <strong>
					                    	Rekap Finansial (<?= date('M-y') ?>)

					                    </strong>
					                    
					                  </p>
					            </div>
					            <!-- end col -->
					        </div>
					        <!-- end row       -->
			            </div>
			            <div class="box-body">

			              <div class="chart">
			              	<div class="row">
								<div class="col-xs-8">
			                		<canvas id="barChart" style="height:250px"></canvas>
			                	</div>
					          	<!-- end cols -->
					          	<div class="col-xs-4">
					          		<select class="form-control">
					                    		<option><?= date('M-y') ?></option>
					                    		<option>Jan-18</option>
					                    	</select>
					          		  <table class="table table-striped" style="border: solid 2px red !important">

					          		  	<tbody>
					          		  		<tr style="background: #ddd ">
					          		  			<th>Pengeluaran</th>
					          		  			<th>Nominal (Rp.)</th>
					          		  		</tr>
					          		  		<tr>
					          		  			<td>Proyek</td>
					          		  			<td><?= number_format(235000000) ?></td>
					          		  		</tr>
					          		  		<tr>
					          		  			<td>Pribadi</td>
					          		  			<td><?= number_format(15000000) ?></td>
					          		  		</tr>
					          		  		<tr>
					          		  			<td>Gaji</td>
					          		  			<td><?= number_format(15000000) ?></td>
					          		  		</tr>
					          		  		<tr>
					          		  			<td>Kantor</td>
					          		  			<td><?= number_format(15000000) ?></td>
					          		  		</tr>
					          		  		<tr>
					          		  			<td>Toko</td>
					          		  			<td><?= number_format(15000000) ?></td>
					          		  		</tr>
					          		  	</tbody>
					          		  </table>
					          	</div>
					          	<!-- end cols -->
					          </div>
					          <!-- end row -->
			              </div>

			            </div>
			            <!-- /.box-body -->
			          </div>
			          <!-- /.box -->
			          
				<div class="col-xs-12">
					<!-- kotakan -->
					<div class="row">
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-red">
								<div class="inner">
									<h3>15</h3>
									<p>Proyek</p>
								</div>
								<div class="icon">
									<i class="fa fa-bolt"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-aqua">
								<div class="inner">
									<h3>8</h3>
									<p>Invoice </p>
								</div>
								<div class="icon">
									<i class="fa fa-file"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-teal">
								<div class="inner">
									<h3>800</h3>
									<p>Produk</p>
								</div>
								<div class="icon">
									<i class="fa fa-money"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-primary">
								<div class="inner">
									<h3>15</h3>
									<p>Aset Aktif</p>
								</div>
								<div class="icon">
									<i class="fa fa-wrench"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
					</div>





				<!-- activity -->
				<div class="row">
					<div class="col-md-6">
						<div class="box box-primary">
							<div class="box-header with-border">	
								<b>Pengeluaran (Gaji | Pribadi | Kantor)</b>
						  	</div>
							<div class="box-body">
								<table class="table table-striped" style="font-size: 12px;">
								  <thead>
								    <tr>
								      <th style="width:30px;">No</th>
								      <th>Tanggal</th>
								      <th>Tipe</th>
								      <th>Nominal</th>
								      <th>Keterangan</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <td><a href="#">1</a></td>
								      <td><?= date('Y-m-d H:i'); ?></td>
								      <td>Gaji</td>
								      <td><?= number_format(10000000) ?></td>
								      <td>Gaji Februari - Arif</td>
								      	
								    </tr>
								    
								  </tbody>
								</table>
							</div>
							<!-- end box body -->
				        </div>
				        <!-- end box -->
					</div>
					<!-- end col -->
					<div class="col-md-6">
						<div class="box box-primary">
							<div class="box-header with-border">	
								<b>Pengeluaran Proyek</b>
						  	</div>
							<div class="box-body">
								<table class="table table-striped" style="font-size: 12px;">
								  <thead>
								    <tr>
								      <th style="width:30px;">No</th>
								      <th>Tanggal</th>
								      <th>Tipe</th>
								      <th>Proyek</th>
								      <th>Nominal</th>
								      <th>Keterangan</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <td><a href="#">1</a></td>
								      <td><?= date('d M Y'); ?></td>
								      <td>Bahan </td>
								      <td><b>Bekasi</b><br>Taman Nor Ali</td>
								      <td><?= number_format(10000000) ?></td>
								      <td>Pot (10pcs)</td>
								      	
								    </tr>
								    <tr>
								      <td><a href="#">2</a></td>
								      <td><?= date('d M Y'); ?></td>
								      <td>Konsumsi</td>
								      <td><b>Bekasi</b><br>Mega Bekasi</td>
								      <td><?= number_format(10000000) ?></td>
								      <td>makan minum 1 minggu</td>
								      	
								    </tr>
								    
								  </tbody>
								</table>
							</div>
							<!-- end box body -->
				        </div>
				        <!-- end box -->
					</div>
				</div>



				</div>
				<!-- end col -->
			</div>
		</div>

	</section><!-- /.content -->
	
</div><!-- /.content-wrapper -->
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script type="text/javascript">
//--------------
//- AREA CHART -
//--------------

// Get context with jQuery - using jQuery's .get() method.
// var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
// This will get the first returned node in the jQuery collection.

var areaChartData = {
  labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
  datasets: [
    {
      label               : 'Kontrak',
      fillColor           : 'rgba(210, 214, 222, 1)',
      strokeColor         : 'rgba(210, 214, 222, 1)',
      pointColor          : 'rgba(210, 214, 222, 1)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data                : [650, 590, 800, 810, 560, 550, 400]
    },
    {
      label               : 'Invoice',
      fillColor           : 'rgba(60,141,188,0.9)',
      strokeColor         : 'rgba(60,141,188,0.8)',
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                : [580, 480, 400, 390, 860, 527, 900]
    },
    {
      label               : 'Modal',
      fillColor           : 'rgba(60,141,188,0.9)',
      strokeColor         : 'rgba(60,141,188,0.8)',
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                : [580, 580, 500, 590, 660, 770, 500]
    },
    {
      label               : 'Pengeluaran',
      fillColor           : 'rgba(60,1,1,0.9)',
      strokeColor         : 'rgba(60,1,1,0.8)',
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,1,1,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,1,1,1)',
      data                : [580, 480, 400, 390, 860, 527, 900]
    }
  ]
}

//-------------
//- BAR CHART -
//-------------
var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
var barChart                         = new Chart(barChartCanvas)
var barChartData                     = areaChartData
barChartData.datasets[1].fillColor   = '#00a65a'
barChartData.datasets[1].strokeColor = '#00a65a'
barChartData.datasets[1].pointColor  = '#00a65a'
var barChartOptions                  = {
  //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
  scaleBeginAtZero        : true,
  //Boolean - Whether grid lines are shown across the chart
  scaleShowGridLines      : true,
  //String - Colour of the grid lines
  scaleGridLineColor      : 'rgba(0,0,0,.03)',
  //Number - Width of the grid lines
  scaleGridLineWidth      : 1,
  //Boolean - Whether to show horizontal lines (except X axis)
  scaleShowHorizontalLines: true,
  //Boolean - Whether to show vertical lines (except Y axis)
  scaleShowVerticalLines  : true,
  //Boolean - If there is a stroke on each bar
  barShowStroke           : true,
  //Number - Pixel width of the bar stroke
  barStrokeWidth          : 1,
  //Number - Spacing between each of the X value sets
  barValueSpacing         : 5,
  //Number - Spacing between data sets within X values
  barDatasetSpacing       : 1,
  //String - A legend template
  legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%=datasets[i].label%></li><%}%></ul>',
  //Boolean - whether to make the chart responsive
  responsive              : true,
  maintainAspectRatio     : true
}

barChartOptions.datasetFill = false
barChart.Bar(barChartData, barChartOptions)

</script>