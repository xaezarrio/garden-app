<?php 
if(@$_GET['year']==""){
$year = date('Y');
}else{
$year = $this->input->get('year');	
}
$years = date('Y');

?>
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
					                    	<select class="form-control" onchange="loadwindw()" id="year">

					                    		<?php for ($i=$years; $i >= 2017 ; $i--) { 
					                    		?>
					                    			<option value="<?= $i ?>" <?php if($i==$year){ echo "selected";} ?>><?= $i ?></option>";
					                    		<?php
					                    		} ?>
					                    		<!-- <option></option> -->
					                    	</select>

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
					          		
					          		  <table class="table table-striped" style="border: solid 2px red !important">

					          		  	<tbody>
					          		  		<tr style="background: #ddd ">
					          		  			<th>Pengeluaran</th>
					          		  			<th>Nominal (Rp.)</th>
					          		  		</tr>
					          		  		<tr>
					          		  			<td>Proyek</td>
					          		  			<?php 
													$nilai = array();
													$mdl =array();
													$proyek = $this->mymodel->selectWhere('proyek','year(pr_tgl_mulai) = '.$year);
													foreach ($proyek as $prk) {
														$nilai[] = $prk['pr_nilai_kontrak'];
													}
													
													$pengeluaranproyek = array_sum($nilai);
					          		  				// $pengeluaranproyek = 0;
					          		  			?>
					          		  			<td><?= number_format($pengeluaranproyek) ?></td>
					          		  		</tr>
					          		  		<tr>
					          		  			<td>Pribadi</td>
						      		  			<?php 
													$m = array();
													$masuk = $this->db->select('nominal');
													$masuk = $this->db->join('aktivitas','pengeluaran.aktivitas_sub=aktivitas.id','left');
													$masuk = $this->db->where('year(date) = '.$year);
													$masuk = $this->db->where(array('aktivitas.kategori'=>'Masuk','pengeluaran.kategori'=>'Pribadi'));
													$masuk = $this->db->get('pengeluaran')->result_array();
													foreach ($masuk as $msk) {
														$m[] = $msk['nominal']; 
													}

													$k = array();
													$keluar = $this->db->select('nominal');
													$keluar = $this->db->join('aktivitas','pengeluaran.aktivitas_sub=aktivitas.id','left');
													$keluar = $this->db->where('year(date) = '.$year);
													$keluar = $this->db->where(array('aktivitas.kategori'=>'Keluar','pengeluaran.kategori'=>'Pribadi'));
													$keluar = $this->db->get('pengeluaran')->result_array();
													foreach ($keluar as $kl) {
														$k[] = $kl['nominal']; 
													}


													$pengeluaranpribadi = (array_sum($m)-array_sum($k));
						      		  			 ?>
					          		  			<td><?= number_format($pengeluaranpribadi) ?></td>
					          		  		</tr>
					          		  		<tr>
					          		  			<td>Gaji</td>
					          		  			<?php 
													$m = array();
													$masuk = $this->db->select('nominal');
													$masuk = $this->db->join('aktivitas','pengeluaran.aktivitas_sub=aktivitas.id','left');
													$masuk = $this->db->where('year(date) = '.$year);
													$masuk = $this->db->where(array('aktivitas.kategori'=>'Masuk','pengeluaran.kategori'=>'Pegawai'));
													$masuk = $this->db->get('pengeluaran')->result_array();
													foreach ($masuk as $msk) {
														$m[] = $msk['nominal']; 
													}


													$k = array();
													$keluar = $this->db->select('nominal');
													$keluar = $this->db->join('aktivitas','pengeluaran.aktivitas_sub=aktivitas.id','left');
													$keluar = $this->db->where('year(date) = '.$year);
													$keluar = $this->db->where(array('aktivitas.kategori'=>'Keluar','pengeluaran.kategori'=>'Pegawai'));
													$keluar = $this->db->get('pengeluaran')->result_array();
													foreach ($keluar as $kl) {
														$k[] = $kl['nominal']; 
													}
													// print_r($k);
													$pengeluaranpegawai = array_sum($m)-array_sum($k);
						      		  			 ?>
					          		  			<td><?= number_format($pengeluaranpegawai) ?></td>
					          		  		</tr>
					          		  		<tr>
					          		  			<td>Kantor</td>
					          		  			<?php 
													$m = array();
													$masuk = $this->db->select('nominal');
													$masuk = $this->db->join('aktivitas','pengeluaran.aktivitas_sub=aktivitas.id','left');
													$masuk = $this->db->where('year(date) = '.$year);
													$masuk = $this->db->where(array('aktivitas.kategori'=>'Masuk','pengeluaran.kategori'=>'Kantor'));
													$masuk = $this->db->get('pengeluaran')->result_array();
													foreach ($masuk as $msk) {
														$m[] = $msk['nominal']; 
													}


													$k = array();
													$keluar = $this->db->select('nominal');
													$keluar = $this->db->join('aktivitas','pengeluaran.aktivitas_sub=aktivitas.id','left');
													$keluar = $this->db->where('year(date) = '.$year);
													$keluar = $this->db->where(array('aktivitas.kategori'=>'Keluar','pengeluaran.kategori'=>'Kantor'));
													$keluar = $this->db->get('pengeluaran')->result_array();
													foreach ($keluar as $kl) {
														$k[] = $kl['nominal']; 
													}
													// print_r($k);
													$pengeluarankantor = array_sum($m)-array_sum($k);
						      		  			 ?>
					          		  			<td><?= number_format($pengeluarankantor) ?></td>
					          		  		</tr>
					          		  		<tr>
					          		  			<td>Toko</td>
					          		  			<td><?= number_format(0) ?></td>
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
									<?php 
									$this->db->where('year(pr_tgl_mulai) ='.$year);
									$pr = $this->mymodel->selectData('proyek');
									$countpr = count($pr);
									?>
									<h3><?= $countpr ?></h3>
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
									<?php 
									$this->db->where('year(date) ='.$year);
									$inv = $this->mymodel->selectData('invoice');
									$countinv = count($inv);
									?>
									<h3><?= $countinv ?></h3>
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
									<h3>0</h3>
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
								<?php 
									// $this->db->where('year(date) ='.$year);
									$aset = $this->mymodel->selectData('aset');
									$countaset = count($aset);
									?>
								<div class="inner">
									<h3><?= $countaset ?></h3>
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
								  	<?php 
										$i=1;
										$masuk = $this->db->select('pengeluaran.date,pengeluaran.kategori,pengeluaran.nominal,pengeluaran.keterangan');
										$masuk = $this->db->join('aktivitas','pengeluaran.aktivitas_sub=aktivitas.id','left');
										$masuk = $this->db->where('year(date) = '.$year);
										$masuk = $this->db->where(array('aktivitas.kategori'=>'Keluar'));
										$masuk = $this->db->get('pengeluaran')->result_array();
										foreach ($masuk as $msk) {
										
								  	 ?>
								    <tr>
								      <td><a href="#"><?= $i ?></a></td>
								      <td><?= $msk['date']; ?></td>
								      <td><?= $msk['kategori'] ?></td>
								      <td><?= number_format($msk['nominal']) ?></td>
								      <td><?= $msk['keterangan'] ?></td>
								    </tr>
								    <?php $i++;} ?>
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
								   <?php 
										$i=1;
										$masuk = $this->db->select('*');
										$masuk = $this->db->join('aktivitas','aktivitas_proyek.ap_idsubaktivitas=aktivitas.id','left');
										$masuk = $this->db->where('year(ap_tanggal) = '.$year);
										$masuk = $this->db->where(array('aktivitas.kategori'=>'Keluar'));
										$masuk = $this->db->get('aktivitas_proyek')->result_array();
										foreach ($masuk as $msk) {
											$akt= $this->mymodel->selectdataOne('aktivitas',array('id'=>$msk['ap_idaktivitas']));
											$proyek= $this->mymodel->selectdataOne('proyek',array('pr_id'=>$msk['ap_idproyek']));
											$perusahaan= $this->mymodel->selectdataOne('perusahaan',array('id'=>$proyek['pr_idperusahaan']));
										
								  	 ?>
								    <tr>
								      <td><a href="#">1</a></td>
								      <td><?= $msk['ap_tanggal']; ?></td>
								      <td><?= $akt['name'] ?> </td>
								      <td><b><?= $perusahaan['name'] ?></b><br><?= $proyek['pr_nama'] ?></td>
								      <td><?= number_format($msk['ap_nominal']) ?></td>
								      <td><?= $msk['ap_keterangan'] ?></td>
								      	
								    </tr>
								    <?php } ?>
								   
								    
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

	function loadwindw() {
		// body...
		var year = $("#year").val();
		window.location.href = "<?= base_url('?year=') ?>"+year;	
	}

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
<?php 
foreach ($bulan as $month) {
	$mth[] = $month['month'];
	// ------------------KONTRAK dan modal------------------------//
	$this->db->where('year(pr_tgl_mulai) = '.$year);
	$nilai = array();
	$mdl =array();
	$proyek = $this->mymodel->selectWhere('proyek','month(pr_tgl_mulai) = '.$month['name']);
	foreach ($proyek as $prk) {
		$nilai[] = $prk['pr_nilai_kontrak']/1000000;	
		$modal = json_decode($prk['pr_modal']);
		$mdl[] = array_sum($modal)/1000000;
	}
	
	$kontrak[] = array_sum($nilai);
	$mdals[] = array_sum($mdl);

	// ---------------------INVOICE----------------------------//
	$invo = array();
	$this->db->where('year(date) = '.$year);
	$invoice = $this->mymodel->selectWhere('invoice','month(date) = '.$month['name']);
	foreach ($invoice as $inv) {
		$invo[] = $inv['subtotal']/1000000;	
	}

	$in[] = array_sum($invo);

	// --------------------------------------------------------
	$m = array();
	$masuk = $this->db->select('nominal');
	$masuk = $this->db->join('aktivitas','pengeluaran.aktivitas_sub=aktivitas.id','left');
	$masuk = $this->db->where('year(date) = '.$year);
	$masuk = $this->db->where(array('month(pengeluaran.date) '=>$month['name'],'aktivitas.kategori'=>'Masuk'));
	$masuk = $this->db->get('pengeluaran')->result_array();
	foreach ($masuk as $msk) {
		$m[] = $msk['nominal']; 
	}

	$k = array();
	$keluar = $this->db->select('nominal');
	$keluar = $this->db->join('aktivitas','pengeluaran.aktivitas_sub=aktivitas.id','left');
	$keluar = $this->db->where('year(date) = '.$year);
	$keluar = $this->db->where(array('month(pengeluaran.date) '=>$month['name'],'aktivitas.kategori'=>'Keluar'));
	$keluar = $this->db->get('pengeluaran')->result_array();
	foreach ($keluar as $kl) {
		$k[] = $kl['nominal']; 
	}


	$pengeluaran[] = (array_sum($m)-array_sum($k))/1000000;

}

$bln = json_encode($mth);
$nilaikontrak = json_encode($kontrak);
$nilaiinvo = json_encode($in);
$nilaimodal= json_encode($mdals);
$nilaipengeluaran= json_encode($pengeluaran);






 ?>
<script type="text/javascript">
//--------------
//- AREA CHART -
//--------------

var areaChartData = {
  labels  : <?= $bln ?>,
  datasets: [
    {
      label               : 'Kontrak',
      fillColor           : 'rgba(210, 214, 222, 1)',
      strokeColor         : 'rgba(210, 214, 222, 1)',
      pointColor          : 'rgba(210, 214, 222, 1)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data                : <?= $nilaikontrak ?>
    },
    {
      label               : 'Invoice',
      fillColor           : 'rgba(60,141,188,0.9)',
      strokeColor         : 'rgba(60,141,188,0.8)',
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                : <?= $nilaiinvo ?>
    },
    {
      label               : 'Modal',
      fillColor           : 'rgba(60,141,188,0.9)',
      strokeColor         : 'rgba(60,141,188,0.8)',
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                : <?= $nilaimodal ?>
    },
    {
      label               : 'Pengeluaran',
      fillColor           : 'rgba(60,1,1,0.9)',
      strokeColor         : 'rgba(60,1,1,0.8)',
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,1,1,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,1,1,1)',
      data                : <?= $nilaipengeluaran ?>
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