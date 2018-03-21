<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">MASTER USER (<?=$status?>)</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="box-header with-border">	
							<button class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#addsite">Add User</button>
							<?php if($status!="DISABLE"){ ?>
							<a class="btn btn-warning btn-sm btn-flat pull-right" href="<?= base_url('user/index/disable') ?>">Move to Disable  <i class="fa fa-arrow-right"></i></a>
							<?php }else{ ?>
							<a class="btn btn-success  btn-sm btn-flat pull-right" href="<?= base_url('user/index/') ?>">Move to Enable  <i class="fa fa-arrow-right"></i></a>

							<?php } ?>
					  	</div>
			          <div class="box-body">
			            <table class="table table-condensed table-hover table-bordered" id="mytable">
			              <thead>
			                <tr>
			                  <th style="width:40px;">No</th>
			                  <th>Name</th>
			                  <th >Username</th>
			                  <th >Role</th>
			                  <th style="width:100px;">Action</th>
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

<!-- modal review -->
<div class="modal fade" id="addsite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="z-index: 9999">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Add New User</h4>
	      </div>
	      <form action="<?= base_url('user/store') ?>" method="POST">
	      <div class="modal-body">
	       <table class="table table-borderd table-striped">
				<tr>
					<td>Name</td>
					<td><input name="dt[name]" type="text" class="form-control" value="" required="" /></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input name="dt[username]" type="text" class="form-control" value="" required="" /></td>
				</tr>
				
				<tr>
					<td>Email</td>
					<td><input name="dt[email]" type="text" class="form-control" value="" required="" /></td>
				</tr>
				
				<tr>
					<td>Password</td>
					<td><input name="password" type="password" class="form-control" value="" required="" /></td>
				</tr>
				<tr>
					<td>role</td>
					<td>
						<select class="form-control" name="dt[role_id]">
							<?php 
							$dt = $this->mymodel->selectData('role');
							foreach ($dt as $role) {
							?>
							<option value="<?= $role['id'] ?>"><?= $role['role'] ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
	
			</table>	
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary" >Create</button>
	      </div>
	      </form>
	  </div>
	</div>
</div>
<!-- modal review -->
<div class="modal fade" id="updateuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="z-index: 9999">

	    <div class="modal-content">
        <form  action="<?= base_url('user/update') ?>" method="POST" enctype="multipart/form-data" >

	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Update User</h4>
	      </div>
	      
	      <div class="modal-body" id="modal-body">
			
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary" >Update</button>
	      </div>
	  </form>
	  </div>
	</div>
</div>
	<!-- end modal review -->



	<!-- end modal review -->

	<script type="text/javascript">
		function user_update(id) {
			// body...
			$("#updateuser").modal('show');
			$("#modal-body").load("<?= base_url('user/edit') ?>/"+id);
		}

        function loaddata() {
             // body...

             var status = "<?= $status ?>";
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
                ajax: {"url": "<?= base_url('user/json') ?>/"+status, "type": "POST"},
                columns: [
                    {"data": "id","orderable": false},
                    {"data": "name"},
                    {"data": "username"},
                    {"data": "role"},
                    // {"data": "site"},
                    {   "data": "view",
                        "orderable": false
                    }
                ],
                order: [[0, 'asc']],
               //  columnDefs : [
               //      { targets : [1],
               //        render : function (data, type, row) {
               //           return data == null ? '<img src="<?= base_url('assets/img/image-1.png') ?>" class="img-responsive" />' : '<img src="<?= base_url() ?>'+data+'" class="img-responsive" />'
               //        }
               //      },
               //      { targets : [4],
               //        render : function (data, type, row) {
               //           return data == "ENABLE" ? '<label class="label label-success">'+data+'</label>' : '<label class="label label-warning">'+data+'</label>'
               //        }
               //      }
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

         function hapus(id) {
         		var cek = "<?= $status ?>";
         		if(cek=="ENABLE"){
         			cek = "DISABLE";
         		}else if(cek=="DISABLE"){
         			cek = "ENABLE";
         		}
         	    if (confirm("Are you sure to '"+cek+"' this data !")) {
			    	window.location.href = "<?= base_url('user/hidden') ?>/"+id+"/"+cek;    
			    } else {
		
			    }
         }
	</script>