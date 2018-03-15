<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row">
				<div class="col-xs-4">
					<div class="box box-primary">
					  <div class="box-header with-border">	
						<b style="font-size: 16px;">Review Timesheets - (1801.0001 - Hak Cipta)</b>
					  </div>	
			          <div class="box-body">
			            <table class="table table-bordered table-hover table-striped">
			            	<tr style="background: #ddd">
			            		<th style="width: 180px;">
			            			No Matter
			            		</th>
			            		<th>
			            			1801.0001
			            		</th>
			            	</tr>
			            	<tr>
			            		<td style="width: 140px;">
			            			Company Name
			            		</td>
			            		<td>
			            			XYZ Co Ltd
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Task
			            		</td>
			            		<td>
			            			Hak Cipta
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Practic Area
			            		</td>
			            		<td>
			            			Legal and Kekayaan Informasi
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Active Date
			            		</td>
			            		<td>
			            			<?= date('d M Y') ?>
			            		</td>
			            	</tr>
			            	
			            </table>

			          </div>
			          
			          <div class="box-header with-border">	
						<b>Contact Person In Matter</b>
					  </div>
					  <div class="box-body">
			            
			            <table class="table table-bordered table-hover table-striped">
			            	<tr style="background: #ddd">
			            		<td>
			            			No
			            		</td>
			            		<td>
			            			Contact
			            		</td>
			            	</tr>
			            	<?php for ($i=1; $i < 4 ; $i++) { ?>
			            	<tr>
			            		<td>
			            			<?= $i ?>
			            		</td>
			            		<td>
			            			Name Employee <?= $i ?><br>
			            			<b>Email : </b> company<?= $i ?>@company.com<br>
			            			<b>Position :</b>  Managing Procurement<br>
			            			<b>Phone :</b> 0811122XX
			            		</td>
			            	</tr>
			            	<?php } ?>
			            </table>
			          </div>
			          <!-- END OF BODY -->
			         
			        </div>
			        <!-- end of box -->


				</div>
				<!-- end col -->
				<div class="col-xs-8">
					<div class="box box-primary">
					  <div class="box-body">
			            	<ul class="nav nav-tabs">
							  <li class="active"><a data-toggle="tab" href="#home">List Timesheets</a></li>
							  <li><a data-toggle="tab" href="#menu1">Calendar View</a></li>
							</ul>

							<div class="tab-content">
							  <div id="home" class="tab-pane fade in active">
							    <table class="table table-bordered" style="background: #562e893b">
							    	<tr>
							    		<td style="width: 110px;">
							    			Date
							    			<input type="text" class="form-control tgl" name="" value="<?= date('Y-m-d') ?>">
							    		</td>
							    		<td>
							    			Lawyer
							    			<select class="form-control">
							    				<option>All Lawyer</option>
							    				<option>Lawyer 1</option>
							    				<option>Lawyer 2</option>
							    				<option>Lawyer 3</option>
							    			</select>
							    		</td>
							    		<td>
							    			Type
							    			<select class="form-control">
							    				<option>Lumpsum</option>
							    				<option>Hourly</option>
							    			</select>
							    		</td>
							    		<td>
							    			Code Activity
							    			<select class="form-control">
							    				<option>All Activity</option>
							    				<option>1102 - Due Dilligence</option>
							    				<option>1103 - Filling</option>
							    				<option>1104 - Documentations</option>
							    			</select>
							    		</td>
							    		<td style="width: 40px;">
							    			<br>
							    			<button class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
							    		</td>
							    	</tr>
							    </table>
							    
							    <button class="btn btn-primary btn-flat"  data-toggle="modal" data-target="#activity">
							    	<i class="fa fa-file-text-o"></i> Add new activity
							    </button>
							    <hr class="hr_dashed">
							    <table class="table table-bordered">
							    	<thead style="background: #ddd;border-bottom: 3px solid #e69c9c;">
							    		<td style="width: 30px;">
							    			
							    		</td>
							    		<td style="width: 110px;">
							    			Date
							    		</td>
							    		<td style="width: 110px;">
							    			Time
							    		</td>
							    		<td style="width: 80px;">
							    			Duration
							    		</td>
							    		<td>
							    			Type
							    		</td>
							    		<td>
							    			Code Activity
							    		</td>
							    		<td style="width: 100px;">
							    			Action
							    		</td>
							    	</thead>
							    	<tr>
							    		<td>
							    			<input type="checkbox" name="">
							    		</td>
							    		<td>
							    			<?= date("Y-m-d") ?>
							    		</td>
							    		<td>
							    			07:00 s/d 12.00
							    		</td>
							    		<td>
							    			5 hour
							    		</td>
							    		<td>
							    			Lumpsum
							    		</td>
							    		<td>
							    			1102 - Due Dilligence
							    		</td>
							    		<td>
							    			<div class="btn btn-xs btn-primary btn-flat" data-toggle="modal" data-target="#activity" ><i class="fa fa-edit"></i>edit</div>
			                  				<a href="#" class="btn btn-xs btn-danger btn-flat" onclick="return confirm('Yakin menghapus activity?')"  ><i class="fa fa-remove"></i></a>
							    		</td>
							    	</tr>
							    	<tr style="border-bottom: 3px solid #e69c9c;">
							    		<td colspan="7">
							    			<b>Description : </b><br>
							    			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="checkbox" name="">
							    		</td>
							    		<td>
							    			<?= date("Y-m-d") ?>
							    		</td>
							    		<td>
							    			07:00 s/d 12.00
							    		</td>
							    		<td>
							    			5 hour
							    		</td>
							    		<td>
							    			Hourly
							    		</td>
							    		<td>
							    			1104 - Documentations
							    		</td>
							    		<td>
							    			<div class="btn btn-xs btn-primary btn-flat" data-toggle="modal" data-target="#activity" ><i class="fa fa-edit"></i>edit</div>
			                  				<a href="#" class="btn btn-xs btn-danger btn-flat" onclick="return confirm('Yakin menghapus activity?')"  ><i class="fa fa-remove"></i></a>
							    		</td>
							    	</tr>
							    	<tr style="border-bottom: 3px solid #e69c9c;">
							    		<td colspan="7">
							    			<b>Description : </b><br>
							    			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="checkbox" name="">
							    		</td>
							    		<td>
							    			<?= date("Y-m-d") ?>
							    		</td>
							    		<td>
							    			07:00 s/d 12.00
							    		</td>
							    		<td>
							    			5 hour
							    		</td>
							    		<td>
							    			Hourly
							    		</td>
							    		<td>
							    			1104 - Documentations
							    		</td>
							    		<td>
							    			<div class="btn btn-xs btn-primary btn-flat" data-toggle="modal" data-target="#activity" ><i class="fa fa-edit"></i>edit</div>
			                  				<a href="#" class="btn btn-xs btn-danger btn-flat" onclick="return confirm('Yakin menghapus activity?')"  ><i class="fa fa-remove"></i></a>
							    		</td>
							    	</tr>
							    	<tr style="border-bottom: 3px solid #e69c9c;">
							    		<td colspan="7">
							    			<b>Description : </b><br>
							    			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
							    		</td>
							    	</tr>
							    	<tr>
							    		<td>
							    			<input type="checkbox" name="">
							    		</td>
							    		<td>
							    			<?= date("Y-m-d") ?>
							    		</td>
							    		<td>
							    			07:00 s/d 12.00
							    		</td>
							    		<td>
							    			5 hour
							    		</td>
							    		<td>
							    			Hourly
							    		</td>
							    		<td>
							    			1104 - Documentations
							    		</td>
							    		<td>
							    			<div class="btn btn-xs btn-primary btn-flat" data-toggle="modal" data-target="#activity" ><i class="fa fa-edit"></i>edit</div>
			                  				<a href="#" class="btn btn-xs btn-danger btn-flat" onclick="return confirm('Yakin menghapus activity?')"  ><i class="fa fa-remove"></i></a>
							    		</td>
							    	</tr>
							    	<tr style="border-bottom: 3px solid #e69c9c;">
							    		<td colspan="7">
							    			<b>Description : </b><br>
							    			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
							    		</td>
							    	</tr>
							    </table>
							    <br><br>
							    <button class="btn btn-default btn-block btn-flat" onclick="return confirm('pastikan semua activity telah di centang')"><i class="fa fa-arrow-right"></i> Save Review</button>
							  </div>
							  <!-- end tab 1 -->
							  <div id="menu1" class="tab-pane fade">
							    <h3>Menu 1</h3>
							    <p>Some content in menu 1.</p>
							  </div>
							  <!-- end tab 2 -->
							</div>
			          </div>
			          <!-- END OF BODY -->
			        </div> 
			        <!-- end of box  -->
			    </div>
				<!-- end col -->
			</div>
			<!-- end row -->
		</div>

	</section><!-- /.content -->
	
</div><!-- /.content-wrapper -->
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>


<!-- modal review -->
<div class="modal fade" id="activity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="z-index: 9999">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Add New Activity</h4>
	      </div>
	      
	      <div class="modal-body">
	      	<table class="table table-bordered table-hover">
            	<tr>
            		<td>
            			Date
            		</td>
            		<td>
            			<input type="text" name="" class="form-control tgl">
            		</td>
            	</tr>
            	<tr>
            		<td>
            			Time
            		</td>
            		<td>
            			<input type="time" name="" class="form-control" value="07:00" style="width: 100px; display: inline;">
            			s/d
            			<input type="time" name="" class="form-control" value="12:00" style="width: 100px; display: inline;">
            		</td>
            	</tr>
            	<tr>
            		<td>
            			Type
            		</td>
            		<td>
            			<select class="form-control">
		    				<option>Lumpsum</option>
		    				<option>Hourly</option>
		    			</select>
            		</td>
            	</tr>
            	<tr>
            		<td>
            			Code Activity
            		</td>
            		<td>
            			<select class="form-control">
		    				<option>All Activity</option>
		    				<option>1102 - Due Dilligence</option>
		    				<option>1103 - Filling</option>
		    				<option>1104 - Documentations</option>
		    			</select>
            		</td>
            	</tr>
            	<tr>
            		<td>
            			Description
            		</td>
            		<td>
            			<textarea class="form-control"></textarea>
            		</td>
            	</tr>
            </table>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary" >Save</button>
	      </div>
	  </div>
	</div>
</div>

	<!-- end modal review -->