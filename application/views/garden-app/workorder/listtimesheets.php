<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">
					LIST PENGELUARAN PEGAWAI
					<a href="<?= base_url('workorder/list-timesheets/pegawai/add') ?>">
					<button class="btn btn-primary pull-right btn-xs">Tambah Pengeluaran</button>
					</a>
				</h3>

			</div>
			<div class="row">
				<div class="col-xs-12">

					<div class="box box-primary">
			          <div class="box-body">
			          	<!-- filter -->
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
		                          $cari = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Pegawai'));
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
		                          // $bulan = $this->db->query("SELECT DISTINCT MONTHNAME(date) as month, DATE_FORMAT(date,'%m') as name FROM pengeluaran")->result_array();
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
	                          $year = $this->db->query("SELECT DISTINCT YEAR(date) as year FROM pengeluaran ")->result_array();
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
			          	<!-- end filter -->
			          	<div id="resettable">
			            <table class="table table-condensed table-hover table-bordered" id="mytable">
			              <thead>
			                <tr>
			                  <th style="width: 30px;">No</th>
			            		<th>Tanggal</th>
			            		<th>Pegawai</th>
			            		<th>Sub Aktivitas</th>
			            		<th>Kategori</th>
			            		<th>Keterangan</th>
			            		<th>Nominal</th>
			                  	<th style="width:80px;">Action</th>
			                </tr>
			              </thead>
			              <tbody>
			              </tbody>
			            </table>
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

<script>
	function settable() {
		var table = '<table class="table table-condensed table-hover table-bordered" id="mytable">'+
					'  <thead>'+
					'    <tr>'+
					'      <th style="width: 30px;">No</th>'+
					'		<th>Tanggal</th>'+
					'		<th>Pegawai</th>'+
					'		<th>Sub Aktivitas</th>'+
					'		<th>Kategori</th>'+
					'		<th>Keterangan</th>'+
					'		<th>Nominal</th>'+
					'      	<th style="width:80px;">Action</th>'+
					'    </tr>'+
					'  </thead>'+
					'  <tbody>'+
					'  </tbody>'+
					'</table>';
		 $("#resettable").html(table);
		 var karyawan = $("#karyawan").val();
		 var sub = $("#sub").val();
		 var kategori = $("#kategori").val();
		 var bulan = $("#bulan").val();
		 var tahun = $("#tahun").val();

		 var url = "?karyawan="+karyawan+"&sub="+sub+"&kategori="+kategori+"&bulan="+bulan+"&tahun="+tahun;

		 loaddata(url);
	}
 function loaddata(url="") {
 		 if(url!=null){
         	var urls = "<?= base_url('workorder/list-timesheets/pegawai/json') ?>"+url;
         }else{
         	var urls = "<?= base_url('workorder/list-timesheets/pegawai/json') ?>";
         }
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
		  ajax: {"url": urls, "type": "POST"},
		    columns: [
		      {"data": "id","orderable": false},
		      {"data": "date"},
		      {"data": "karyawan"},
		      {"data": "sub"},
		      {"data": "kategori"},
		      {"data": "keterangan"},
		      {"data": "nominal"},
		      {   "data": "view",
		      "orderable": false
		      }
		    ],
		  order: [[0, 'asc']],
		  columnDefs : [
		    { targets : [6],
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

     loaddata();


     function edit(id) {
     	window.location.href = "<?= base_url('workorder/list-timesheets/pegawai/edit/') ?>"+id;
     }

     function hapus(id) {
     	if (confirm('Are you sure delete this data ?')) {
     		window.location.href = "<?= base_url('workorder/list-timesheets/pegawai/delete/') ?>"+id;		
		} else {
		    return false
		}

     }
</script>