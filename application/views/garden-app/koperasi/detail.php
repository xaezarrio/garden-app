<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">List Detail Simpan</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
			          	<div class="box-body">
			        		<div class="row no_margin">
			        			<!-- <a href="" class="btn btn-success btn-flat pull-right">Excel</a> -->
			        			<div class="col-xs-3">
			        				<select class="form-control" id="month" onchange="loaddata()">
			        					<option value="">Semua Bulan .. </option>
			        					<?php 
				                         
				                          for ($i=0; $i < count($bulan) ; $i++) { 
				                          ?>
				                          <option value="<?= $bulan[$i]['name'] ?>"><?= $bulan[$i]['month'] ?></option>
				                        <?php } ?>
			        				</select>
			        			</div>
			        			<div class="col-xs-2">
			        				<select class="form-control" id="year" onchange="loaddata()">
			        					 	<?php 
			                          $year = $this->db->query("SELECT DISTINCT YEAR(date) as year FROM koperasi ")->result_array();
				                          foreach ($year as $y) {

				                      ?>
				                          <option value="<?= $y['year'] ?>"><?= $y['year'] ?></option>
				                          <?php } ?>

			        				</select>
			        			</div>
			        		</div>    
			        		<hr>
			        		<div class="row">
			        			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			        				<div class="table-responsive">
		        						<div id="loading">
					                        <h4 class="text-center"><i class="fa fa-spinner fa-spin"></i>  Loading...</h4>
				                      	</div>
										<div class="errors"></div>
				                      	<div id="load-data"></div>
			        				</div>
			        			</div>
			        		</div>
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


	function deletedata(id) {
		if(confirm('Apakah anda yakin ?')){
			$.ajax({
	          type: "POST",
	          url: "<?= base_url('koperasi/delete/') ?>"+id,
	          cache: false,
	          contentType: false,
	          processData: false,
	          beforeSend : function(){
                  $(".errors").hide().html("").slideDown("fast");
	          },
	          success: function(response, textStatus, xhr) {
	              // alert(mydata);
	             var str = response;
	              if (str.indexOf("Success Delete Data") != -1){
	                  $(".errors").show().html(response).slideDown("fast");
	               		if(id==<?= $id ?>){
		               			loaddata(); 

	               		}else{
	               			setTimeout(function () {
	               				window.location.href = "<?= base_url('koperasi') ?>";
	               			},1000);
	               		}

	               			setTimeout(function () {
	               				$(".errors").slideUp();
	               			},1000);


	              }else{
	                  $(".errors").show().html(response).slideDown("fast");
	              }
	          },
	          error: function(xhr, textStatus, errorThrown) {
	          console.log(xhr);
	          }
	      });
		}else{

		}
	}

	    function loaddata() {
      $("#loading").show();
      $("#load-data").html("");
      var month = $("#month").val();
      var year = $("#year").val();
      <?php $akt = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Simpan')); ?>
      var akt = <?= $akt['id'] ?>;
      var url = "<?= base_url('koperasi/data_koperasi_simpan') ?>?month="+month+"&year="+year+"&karyawan=<?= $karyawan_id ?>&id=<?= $id ?>&aktivitas="+akt;
      $("#load-data").load(url);
      $("#loading").hide();
    }

    loaddata();
</script>
