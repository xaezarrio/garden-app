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

		                        <select class="form-control select2">
		                          <option>Semua Karyawan</option>
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

		                      <select class="form-control select2">
		                          <option>Semua Sub</option>
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
		                      <label>Bulan:</label>

		                      <select class="form-control select2">
		                          <option>semua bulan</option>
		                          <?php 
		                          $bulan = $this->db->query("SELECT DISTINCT MONTHNAME(date) as month, MONTH(date) as name FROM pengeluaran")->result_array();
		                          foreach ($bulan as $m) {
		                          ?>
		                          <option value="<?= $m['name'] ?>"><?= $m['month'] ?></option>
		                        <?php } ?>
		                        </select>
		                      <!-- /.input group -->
		                    </div>      
		                  </div>
		                  <div class="col-xs-2">
		                    <div class="form-group">
		                      <label>Tahun:</label>
		                      
		                      <select class="form-control select2">
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
		                  <div class="col-xs-2">
		                    <div class="form-group">
		                      <label>.</label>
		                      <div class="input-group">
		                        <!-- <div class="input-group-addon">
		                          <i class="fa fa-calendar"></i>
		                        </div> -->
		                        <!-- <input type="text" class="form-control pull-right" id="reservation"> -->
		                        <button class="btn btn-info">Filter</button>

		                      </div>
		                    </div>
		                  </div>
		              </div>
			          	<!-- end filter -->
			            <table class="table table-condensed table-hover table-bordered" id="mytable">
			              <thead>
			                <tr>
			                  <th style="width: 30px;">No</th>
			            		<th>Tanggal</th>
			            		<th>Pegawai</th>
			            		<th>Sub Aktivitas</th>
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
				<!-- end col -->
			</div>
			<!-- end row -->
		</div>

	</section><!-- /.content -->
	
</div><!-- /.content-wrapper -->
<script>
 function loaddata() {
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
		  ajax: {"url": "<?= base_url('workorder/list-timesheets/pegawai/json') ?>/", "type": "POST"},
		    columns: [
		      {"data": "id","orderable": false},
		      {"data": "date"},
		      {"data": "karyawan"},
		      {"data": "sub"},
		      {"data": "keterangan"},
		      {"data": "nominal"},
		      {   "data": "view",
		      "orderable": false
		      }
		    ],
		  order: [[0, 'asc']],
		  columnDefs : [
		    { targets : [5],
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