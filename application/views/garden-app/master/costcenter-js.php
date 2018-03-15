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
	             '    <th style="width:50px;">No</th>'+
	             '    <th>Name</th>'+
	             '    <th style="width:100px;">Edit/Delete</th>'+
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
		  ajax: {"url": "<?= base_url('master/cost-center/json') ?>/", "type": "POST"},
		    columns: [
		      {"data": "id","orderable": false},
		      {"data": "name"},
		      {   "data": "view",
		      "orderable": false
		      }
		    ],
		  order: [[0, 'asc']],
		  // columnDefs : [
		  //   { targets : [3],
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

     loaddata();


      $("#upload").submit(function(){
        var mydata = new FormData(this);
        var form = $(this);
        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: mydata,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend : function(){
                $("#send-btn").addClass("disabled").html("<i class='fa fa-spinner fa-spin'></i>  Processing...").attr('disabled',true);
                form.find(".show_error").slideUp().html("");

            },
            success: function(response, textStatus, xhr) {
                // alert(mydata);
               var str = response;
                if (str.indexOf("Success Send Data") != -1){
                    form.find(".show_error").hide().html(response).slideDown("fast");
                    $("#send-btn").removeClass("disabled").html('<i class="fa fa-save"></i> Simpan').attr('disabled',false);
                    loaddatas();
                    // document.getElementById('upload').reset();
                     $('#upload')[0].reset();
                    $("#addsite").modal('hide');
            
                }else{
                    form.find(".show_error").hide().html(response).slideDown("fast");
                    $("#send-btn").removeClass("disabled").html('<i class="fa fa-save"></i> Simpan').attr('disabled',false);
                }
            },
            error: function(xhr, textStatus, errorThrown) {
            console.log(xhr);
            }
        });
        return false;
        });


            // body...
        $('#loadingDiv2').hide().ajaxStart( function() {
        $(this).show();  // show Loading Div
        } ).ajaxStop ( function(){
          $(this).hide(); // hide loading div
        });


       function edit(id) {
     	$("#editsite").modal('show');
     	$("#data-update").load('<?= base_url('master/cost-center/edit') ?>/'+id);
     }


     $("#uploads").submit(function(){
        var mydata = new FormData(this);
        var form = $(this);
        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: mydata,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend : function(){
                $("#send-btns").addClass("disabled").html("<i class='fa fa-spinner fa-spin'></i>  Processing...").attr('disabled',true);
                form.find(".show_error").slideUp().html("");

            },
            success: function(response, textStatus, xhr) {
                // alert(mydata);
               var str = response;
                if (str.indexOf("Success Send Data") != -1){
                    form.find(".show_error").hide().html(response).slideDown("fast");
                    $("#send-btns").removeClass("disabled").html('<i class="fa fa-save"></i> Simpan').attr('disabled',false);
                    loaddatas();
                    // document.getElementById('upload').reset();
                     $('#uploads')[0].reset();
                    $("#editsite").modal('hide');
            
                }else{
                    form.find(".show_error").hide().html(response).slideDown("fast");
                    $("#send-btns").removeClass("disabled").html('<i class="fa fa-save"></i> Simpan').attr('disabled',false);
                }
            },
            error: function(xhr, textStatus, errorThrown) {
            console.log(xhr);
            }
        });
        return false;
        });

     function hapus(id) {

     	var url = "<?= base_url('master/cost-center/delete') ?>/"+id;
     	if (confirm('Are you sure delete this data ?')) {
			window.location.href = url;
		} else {
		    return false
		}
     }
//<script>