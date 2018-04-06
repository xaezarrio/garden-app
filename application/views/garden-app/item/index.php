<div class="content-wrapper" >
<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">
					List Item
				</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="box-header with-border">	
							<!-- <a class="btn btn-primary btn-flat" href="<?= base_url('aset/registrasi') ?>">Registrasi</a> -->
						</div>
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



	function reseterror() {
			// body...
			$('.show_error').html("");
	}

	  function loaddatas() {
        $("#mydiv").html("");

      var html = '<table class="table table-condensed table-hover table-bordered" id="mytable">'+
	             '<thead>'+
	             '  <tr>'+
                 '   <th style="width: 50px">No</th>'+
                 // '   <th>Code</th>'+                         
                 '   <th>Name</th>'+
                 '   <th>Stock</th>'+
                 // '   <th>Price per unit</th>'+
                 // '   <th>Total</th>'+

                 // '   <th style="width:100px;">Action</th>'+
	             '  </tr>'+
	             '</thead>'+
	             '<tbody>'+
	             '  '+
	             '</tbody>'+
	            '</table>';
        $("#mydiv").html(html);

        loaddata();
  }


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
		  ajax: {"url": "<?= base_url('item/json') ?>", "type": "POST"},
		    columns: [
		      {"data": "i_id","orderable": false},
		      {"data": "i_nama"},
              {"data": "i_stok"},

		      // {   "data": "view",
		      // "orderable": false
		      // }
		    ],
		  order: [[1, 'asc']],
		  // columnDefs : [
		  //   { targets : [4],
		  //     render : function (data, type, row) {
		  //       return convertToRupiah(row['price']);
		  //     }
		  //   },{ targets : [5],
		  //     render : function (data, type, row) {
		  //       return convertToRupiah(row['total']);
		  //     }
		  //   }
		  // ],
		  rowCallback: function(row, data, iDisplayIndex) {
		    var info = this.fnPagingInfo();
		    var banner = info.ibanner;
		    var length = info.iLength;
		    var index = banner * length + (iDisplayIndex + 1);
		    $('td:eq(0)', row).html(index);
		  }
		});
		}

     loaddatas();



</script>



