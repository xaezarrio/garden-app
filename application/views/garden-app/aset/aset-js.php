<?php header('Content-Type: application/javascript'); ?>
//<script type="text/javascript">



	function reseterror() {
			// body...
			$('.show_error').html("");
	}

	function addmodal() {
		// body...
		reseterror();
		$("#addsite").modal('show');
	}
		  function loaddatas() {
        $("#mydiv").html("");

      var html = '<table class="table table-condensed table-hover table-bordered" id="mytable">'+
	             '<thead>'+
	             '  <tr>'+
                 '   <th style="width: 50px">No</th>'+
                 '   <th>Code</th>'+                         
                 '   <th>Name</th>'+
                 '   <th>Stock</th>'+
                 '   <th>Price</th>'+
                 '   <th style="width:100px;"></th>'+
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
		  ajax: {"url": "<?= base_url('aset/json') ?>", "type": "POST"},
		    columns: [
		      {"data": "id","orderable": false},
		      {"data": "kode"},
              {"data": "name"},
              {"data": "stock"},
              {"data": "price"},
		      {   "data": "view",
		      "orderable": false
		      }
		    ],
		  order: [[1, 'asc']],
		  columnDefs : [
		    { targets : [4],
		      render : function (data, type, row) {
		        return convertToRupiah(row['price']);
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
     	// $("#editsite").modal('show');
     	// $("#data-update").load('<?= base_url('master/cost-center/edit') ?>/'+id);
     	window.location.href = "<?= base_url("aset/registrasi/edit") ?>/"+id;
     }

     function hapus(id) {

     	// var url = "<?= base_url('master/cost-center/delete') ?>/"+id;
     	if (confirm('Are you sure delete this data ?')) {
			// window.location.href = url;
			alert("Dalam Perbaikan");
		} else {
		    return false
		}
     }
//<script>