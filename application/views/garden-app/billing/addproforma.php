<div class="content-wrapper" >
      <!-- Main content -->
      <section class="content">
   		<div class="container">
		<div class="row no_margin">
			<h3 class="jdl_page">ADD PROFORMA</h3>
		</div>
        <div class="row">      
	        <div class="col-md-8">
	          <!-- general form elements -->
	          <div class="box box-primary">
	            <div class="box-header with-border">
	              <!-- <h3 class="box-title">New Tickets</h3> -->
					<b>Data Proforma</b>

	            </div>
	            <!-- /.box-header -->
	            <!-- form start -->
	            <form class="form-horizontal">
	              <div class="box-body">
	              	<div class="row">
	              		<div class="col-md-8">
	              			<table class="table table-bordered table-hover">
				            	<tr>
				            		<td style="width: 140px;">Matter</td>
				            		<td>
				            			<select class="form-control select2">
					                      <option></option>
					                    </select>
				            		</td>
				            	</tr>
				            	<tr>
				            		<td>Date</td>
				            		<td>
				            			<div class="input-group">
					                      <input type="text" class="form-control tgl">
					                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					                    </div>
				            		</td>
				            	</tr>
				            	<tr>
				            		<td>Remark</td>
				            		<td><textarea class="form-control" rows="4"></textarea></td>
				            	</tr>
				            </table>
	              		</div>
	              	</div>
	              	
		            	 <table class="table table-bordered">
                            <thead>
                              <tr style="background: #ddd">
                                <th>DATE</th>
                                <th>TYPE</th>
                                <th>COST</th>
                                <th>ACTIVITY</th>
                                <th width="80">#</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>
                                  <a href="javascript::void(0)" class="btn btn-success btn-sm" onclick="modalshow()"><i class="glyphicon glyphicon-edit"></i></a>
                                </td>
                              </tr>
                            </tbody>
                            <tfoot style="background: #ddd"	>
                              <tr>
                                <th>TOTAL</th>
                                <th></th>
                                <th></th>
                                <th>Rp.0 -</th>
                                <th></th>

                              </tr>
                            </tfoot>
                        </table>
	              </div>
	              <div class="box-footer">
	              	<div class="pull-right">
		                <button type="submit" class="btn btn-primary">SAVE</button>              		
	              	</div>
	              </div>
	          </form>

	          </div>
	          <!-- /.box -->

	        </div>
        <!--/.col (left) -->
        </div>
        <!-- /.box -->
   		</div>
      </section>
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog" style="z-index:9999">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Default Modal</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Matter</label>

                  <div class="col-sm-9">
                    <!-- <input type="email" class="form-control" id="inputEmail3" > -->
                    <select class="form-control select2">
                      <option></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Date</label>

                  <div class="col-sm-9">
                    <div class="input-group">
                      <input type="text" class="form-control date_field" >
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="cost" class="col-sm-2 control-label">Cost</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="cost" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="activity" class="col-sm-2 control-label">Activity</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="activity" >
                  </div>
                </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>


  <script type="text/javascript">
    function modalshow() {
      // body...
      $("#ui-datepicker-div").attr('style','z-index:9999')
      $("#modal-default").modal('show')
    }
  </script>