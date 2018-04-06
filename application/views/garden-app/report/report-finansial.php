<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">LIST REPORT FINANSIAL PERUSAHAAN</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="box-header">
							<div class="row no_padding">
								<div class="col-xs-2">
									<small>Dari</small>
									<input type="text" class="form-control tgl" name="" id="start">
								</div>
								<div class="col-xs-2">
									<small>Sampai</small>
									<input type="text" class="form-control tgl" name="" id="end">
								</div>
								<div class="col-xs-2">
									<small>Pemodal</small>
									<select class="form-control" id="modal">
										<option value="">-Semua Pemodal-</option>
										<?php 
										$modal = $this->mymodel->selectData('modal');
										foreach ($modal as $mdl) {
										?>
										<option value="<?= $mdl['id'] ?>"><?= $mdl['name'] ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-xs-2">
									<small>Status Proyek</small>
									<select class="form-control" id="status">
										<option value="">-Semua Status Proyek-</option>
										<option value="open">open</option>
										<option value="close">retensi/close</option>
										<!-- <option value="close">close</option> -->

									</select>
								</div>
								<div class="col-xs-2">
									<br>
									<button class="btn btn-info btn-flat" onclick="loaddata()"><i class="fa fa-search"></i> Filter</button>
									<button class="btn btn-success btn-flat" onclick="excel()"><i class="fa fa-file-excel-o" ></i> Excel</button>
									
								</div>
							</div>
						</div>
			          <div class="box-body " id="load-data">

			          </div>
			        </div>


				</div>
				<!-- end col -->
			</div>
			<!-- end row -->
		</div>

	</section><!-- /.content -->
	
</div><!-- /.content-wrapper -->


<script type="text/javascript">
 function loaddata() {
 	var start = $('#start').val();
 	var end = $('#end').val();
 	var modal = $('#modal').val();
 	var status = $('#status').val();
 	var str = "?start="+start+"&end="+end+"&modal="+modal+"&status="+status;
 	var url = "<?= base_url('report/finansial_data') ?>"+str;
 	$("#load-data").load(url);
 }
 loaddata() 

function excel() {
 	var start = $('#start').val();
 	var end = $('#end').val();
 	var modal = $('#modal').val();
 	var status = $('#status').val();
 	var str = "?start="+start+"&end="+end+"&modal="+modal+"&status="+status;
 	var url = "<?= base_url('report/finansial_excel') ?>"+str;
 	// $/("#load-data").load(url);/
 	// window.location.href = url;
 	window.open(url,'_blank');
 }
 
</script>