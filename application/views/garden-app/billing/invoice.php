<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">INVOICE</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
			          <div class="box-body">
			          	<div class="row">
			          		<div class="col-xs-9">
			          			<a href="<?= base_url('billing/add-invoice') ?>" class="btn btn-success btn-flat">New Invoice</a>
			          			
			          		</div>
			          		<div class="col-xs-3">
			          			<label>Status Invoice</label>
			          			<select class="form-control" id="status" onchange="settable()">
			          				<option value="Belum">Belum Lunas</option>
			          				<option value="Lunas">Lunas</option>
			          			</select>
			          		</div>
			          	</div>
			          	<br>

			           <div id="set"></div>
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
		var html  = '<table class="table table-condensed table-hover table-bordered" id="mytable">'+
			        '      <thead>'+
			        '        <tr>'+
			        '          <th>No</th>'+
			        '          <th>Invoice</th>'+
			        '          <th>Proyek</th>'+
			        '          <th>Pelannggan</th>'+
			        '          <th>Inv Date</th>'+
			        '          <th>Due Date</th>'+
			        '          <th>Type</th>'+
			        '          <th>Tgl Bayar</th>'+
			        '          <th>Nominal</th>'+
			        '          <th>Status</th>'+
			        '          <th>#</th>'+
			        '        </tr>'+
			        '        </thead>'+
			        '        <tbody>'+
			        '        '+
			        '        </tbody>'+
			         '   </table>';
		         $("#set").html(html);
		         loaddata()
	}

		function loaddata() {
		var stt = $("#status").val();
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
		  ajax: {"url": "<?= base_url('billing/invoice/json') ?>/"+stt, "type": "POST"},
		    columns: [
		      {"data": "id","orderable": false},
		      {"data": "id"},
              {"data": "proyek"},
              {"data": "perusahaan"},
		      {"data": "date"},

              {"data": "due"},
              {"data": "type"},
              {"data": "updated_at"},
              {"data": "total"},
              {"data": "status"},

		      {   "data": "view",
		      "orderable": false
		      }
		    ],
		  order: [[0, 'asc']],
		  columnDefs : [
		    { targets : [8],
		      render : function (data, type, row) {
		        return convertToRupiah(row['total']);
		      }
		    },{ targets : [1],
		      render : function (data, type, row) {
		        return "INV000"+row['id'];
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

     settable();

     function detail(id) {
     	window.location.href= "<?= base_url("billing/detail-invoice/") ?>"+id;
     }
</script>
