<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">Pembayaran</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
			          <div class="box-body">
		              	<div class="row">
		                  <div class="col-xs-4">
		                    <div class="form-group">
		                      <label>Customer:</label>

		                        <select class="form-control select2" id="pelanggan">
		                        	<option value="">All Customer</option>
		                          <?php 	
		                          	$customer = $this->mymodel->selectData('pelanggan');
		                          	foreach ($customer as $pelanggan) {
		                          ?>
		                          <option value="<?= $pelanggan['p_id'] ?>"><?= $pelanggan['p_name'] ?> - <?= $pelanggan['p_nama_perusahaan'] ?></option>
		                          <?php 	} ?>
		                        </select>
		                    </div>      
		                  </div>
		                  <div class="col-xs-3">
		                    <div class="form-group">
		                      <label>Start Date:</label>

		                      <div class="input-group">
		                        <div class="input-group-addon">
		                          <i class="fa fa-calendar"></i>
		                        </div>
		                        <input type="text" class="form-control pull-right tgl" id="start">
		                      </div>
		                      <!-- /.input group -->
		                    </div>      
		                  </div>
		                  <div class="col-xs-3">
		                    <div class="form-group">
		                      <label>End Date:</label>

		                      <div class="input-group">
		                        <div class="input-group-addon">
		                          <i class="fa fa-calendar"></i>
		                        </div>
		                        <input type="text" class="form-control pull-right tgl" id="due">
		                      </div>
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
		                        <button class="btn btn-info" onclick="loaddatas()">Filter</button>

		                      </div>
		                    </div>
		                  </div>
		              </div>
		              <div id="divis">	
		              	 <table id="mytable" class="table table-bordered table-striped">
				            <thead>
				            <tr>
				              <th >No</th>
				              <th >Proyek</th>
				              <th >Tanggal Mulai</th>
				              <th >Tanggal Selesai</th>
				              <th >Invoice</th>
				              <th >Kontrak</th>
				              <th >Terbayar</th>
				              <th >#</th>
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



<script type="text/javascript">
	
		function loaddatas() {
			// body...
			$("#divis").html("");
			var html  =  '<table id="mytable" class="table table-bordered table-striped">'+
				         '   <thead>'+
				         '   <tr>'+
				         '     <th >No</th>'+
				         '     <th >Proyek</th>'+
				         '     <th >Tanggal Mulai</th>'+
				         '     <th >Tanggal Selesai</th>'+
				         '     <th >Invoice</th>'+
				         '     <th >Kontrak</th>'+
				         '     <th >Terbayar</th>'+
				         '     <th >#</th>'+
				         '   </tr>'+
				         '   </thead>'+
				         '   <tbody>'+
				         '   </tbody>'+
				         ' </table>';
			$("#divis").html(html);
			loaddata()



		}

		function loaddata() {
		var pelanggan = $("#pelanggan").val();
		var start = $("#start").val();
		var due = $("#due").val();
		var str = "?pelanggan="+pelanggan+"&start="+start+"&due="+due;
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
		  ajax: {"url": "<?= base_url('billing/invoice/json-collections') ?>"+str, "type": "POST"},
		    columns: [
		      {"data": "id","orderable": false},
		      {"data": "proyek"},
		      {"data": "date"},
              {"data": "due"},
              {"data": "invoice"},
              {"data": "kontrak"},
              {"data": "terbayar"},
		      {   "data": "view",
		      "orderable": false
		      }
		    ],
		  order: [[0, 'asc']],
		  columnDefs : [
		    { targets : [5],
		      render : function (data, type, row) {
		        return convertToRupiah(row['kontrak']);
		        // return true;
		      }
		    },
		    { targets : [6],
		      render : function (data, type, row) {
		      	if(row['terbayar']!=null){
		      		var a = convertToRupiah(row['terbayar']);
		      	}else{
		      		var a = 0;
		      	}
		        return a;
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

     function detail(id) {
     	window.location.href= "<?= base_url("matters/payment/") ?>"+id;
     }
</script>
