<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">MASTER AKTIVITAS (<?= $judul ?>)</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="box-header with-border">	
							<button class="btn btn-primary btn-flat" onclick="addmodal(0)">Tambahkan aktivitas</button>
							<?php if ($tipe==1): ?>
							<a class="btn btn-warning btn-flat pull-right" href="<?= base_url('master/aktivitas/0'); ?>">Disable <i class="fa fa-arrow-right"></i></a>
							<?php else: ?>
							<a class="btn btn-success btn-flat pull-right" href="<?= base_url('master/aktivitas/1'); ?>">Enable <i class="fa fa-arrow-right"></i></a>
							<?php endif ?>
					  	</div>
			          	<div class="box-body">
							<div id='loadingDiv'>	
				          	 	<center>
							    <img src='https://www.quodfinancial.com/wp-content/themes/pro-child/QUOD-Diagram/loading_spinner.gif' style='width:75px;' /><br>
							    Please wait...
							    </center>  
						 	</div> 
				           	<div id="table">
				           	
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


<div class="modal fade" id="addsite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="z-index: 9999">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Add New aktivitas </h4>
	      </div>
	      <form action="<?= base_url('master/aktivitas/action/store') ?>" id="upload">
	      	<input type="hidden" name="dt[parent]" id="parent">
	      <div class="modal-body">
	      	<div class="show_error"></div>
	      	<div id="bidang">
	        <small>name</small>
	        <input name="dt[name]" type="text" class="form-control" />

	      	<small>kategori</small>
	        <select name="dt[kategori]" class="form-control" >
              <option value="Masuk">Masuk</option>
            
              <option value="Keluar">Keluar</option>
            </select>
            </div>

	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary" id="send-btn">Tambahkan</button>
	      </div>
	      </form>
	  </div>
	</div>
</div>

<div class="modal fade" id="editsite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="z-index: 9999">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Edit aktivitas </h4>
	      </div>
	      <form action="<?= base_url('master/aktivitas/action/update') ?>" id="uploads">
	      <div class="modal-body">
	      	<div class="show_error"></div>
	      	<div id="aktivitas-edit"></div>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary" id="send-btns">Perbaharui</button>
	      </div>
	      </form>
	  </div>
	</div>
</div>

	<!-- end modal review -->

<script type="text/javascript" src="<?= base_url('master/aktivitas/js?tipe='.$tipe) ?>"></script>