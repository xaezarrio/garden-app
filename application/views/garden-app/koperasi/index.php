<div class="content-wrapper" >
<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">
					List Transaksi Koperasi  
				</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<div class="row">
				                  <div class="col-xs-3">
				                    <div class="form-group">
				                      <label>Karyawan:</label>

				                        <select class="form-control select2" id="karyawan">
				                          <option value="">Semua Karyawan</option>
				                          <?php 
				                          $karyawan = $this->mymodel->selectData('karyawan');
				                          foreach ($karyawan as $kar) {
				                           ?>
				                           <option value="<?= $kar['id'] ?>"><?= $kar['name'] ?></option>
				                           <?php } ?>
				                        </select>
				                    </div>      
				                  </div>
				                  <div class="col-xs-2">
				                    <div class="form-group">
				                      <label>Sub Aktivitas:</label>

				                      <select class="form-control select2" id="sub">
				                          <option value="">Semua Sub</option>
				                          <?php 
				                          $cari = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Koperasi'));
				                          $sub = $this->mymodel->selectWhere('aktivitas',array('parent'=>$cari['id']));
				                          foreach ($sub as $aktivitas) {
				                           ?>
				                           <option value="<?= $aktivitas['id'] ?>"><?= $aktivitas['name'] ?></option>
				                           <?php } ?>

				                        </select>
				                      <!-- /.input group -->
				                    </div>      
				                  </div>
				                  <div class="col-xs-2">
				                    <div class="form-group">
				                      <label>Kategori:</label>

				                      <select class="form-control select2" id="kategori">
				                          <option value="">Semua Kategori</option>
				                          <option value="Masuk">Masuk</option>
				                          <option value="Keluar">Keluar</option>
				                        </select>
				                      <!-- /.input group -->
				                    </div>      
				                  </div>
				                  <div class="col-xs-2">
				                    <div class="form-group">
				                      <label>Bulan :</label>

				                      <select class="form-control select2" id="bulan">
				                          <option value="">Semua Bulan</option>
				                          <?php 
				                         
				                          for ($i=0; $i < count($bulan) ; $i++) { 
				                          ?>
				                          <option value="<?= $bulan[$i]['name'] ?>"><?= $bulan[$i]['month'] ?></option>
				                        <?php } ?>
				                        </select>
				                      <!-- /.input group -->
				                    </div>      
				                  </div>
				                  <div class="col-xs-2">
				                    <div class="form-group">
				                      <label>Tahun:</label>
				                      
				                      <select class="form-control select2" id="tahun">
				                      	<?php 
			                          $year = $this->db->query("SELECT DISTINCT YEAR(date) as year FROM koperasi ")->result_array();
				                          foreach ($year as $y) {

				                      ?>
				                          <option value="<?= $y['year'] ?>"><?= $y['year'] ?></option>
				                          <?php } ?>

				                        </select>
				                      <!-- /.input group -->
				                    </div>      
				                  </div>
				                  <div class="col-xs-1">
				                    <div class="form-group">
				                      <label style="color: #fff">.</label>
				                      <div class="input-group">
				                        <!-- <div class="input-group-addon">
				                          <i class="fa fa-calendar"></i>
				                        </div> -->
				                        <!-- <input type="text" class="form-control pull-right" id="reservation"> -->
				                        <button type="button" class="btn btn-info" onclick="settable()">Filter</button>

				                      </div>
				                    </div>
				                  </div>
				              </div>
						</div>
						<div class="errors"></div>
						<div class="box-body" id="mydiv">
							
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
	function settable() {
		// body...
		var table = '<table class="table table-striped table-hover" id="mytable">'+	
					'			<thead>'+
					'				<tr>'+ 
					'					<th style="width: 50px">No</th>'+
					'					<th>Date</th>					'+		
					'					<th>Kayawan</th>'+
					'					<th>Aktivitas</th>'+
					'					<th>Nominal</th>'+
					'					<th>Kategori</th>'+
					'					<th>Description</th>'+
					'					<th style="width:50px;"></th>'+
					'				</tr>'+
					'			</thead>'+
					'			<tbody>'+
					'			</tbody>'+
					'		</table>';

		$("#mydiv").html(table);
		loaddata();
	}


	settable();


	function loaddata() {
		 var karyawan = $("#karyawan").val();
		 var sub = $("#sub").val();
		 var kategori = $("#kategori").val();
		 var bulan = $("#bulan").val();
		 var tahun = $("#tahun").val();

		 var link = "?karyawan="+karyawan+"&sub="+sub+"&kategori="+kategori+"&bulan="+bulan+"&tahun="+tahun;


		var t = $("#mytable").dataTable({
		  initComplete: function() {
		    var api = this.api();
		    $('#mytable_filter input')
		    .off('.DT')
		    .on('keyup.DT', function(e) {
		      if (e.keyCode == 13) {
		        api.search(this.value).draw();
		      }
		    });
		  },
		  oLanguage: {
		    sProcessing: "loading..."
		  },
		  processing: true,
		  serverSide: true,
		  ajax: {"url": "<?= base_url('koperasi/json') ?>"+link, "type": "POST"},
		    columns: [
		      {"data": "id","orderable": false},
		      {"data": "date"},
              {"data": "karyawan"},
              {"data": "aktivitas"},
              {"data": "nominal"},
              {"data": "kategori"},
              {"data": "desc"},
		      {   "data": "view",
		      "orderable": false
		      }
		    ],
		  order: [[1, 'desc']],
		  columnDefs : [
		    { targets : [4],
		      render : function (data, type, row) {
		        return convertToRupiah(row['nominal']);
		      }
		    }
		  ],
		  rowCallback: function(row, data, iDisplayIndex) {
		    var info = this.fnPagingInfo();
		    var banner = info.ibanner;
		    var length = info.iLength;
		    var index = banner * length + (iDisplayIndex + 1);
		    $('td:eq(0)', row).html(index);
		  }
		});
		}


		function detail(id) {
			var url = "<?= base_url("koperasi/detail/") ?>"+id;
			window.location.href = url;
		}

		function hapus(id) {
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
	               		
							settable();
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


</script>