<div class="content-wrapper" >
<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">
					Master perusahaan  
				</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="box-header with-border">	
							<button class="btn btn-primary btn-flat" onclick="addmodal()">Tambahkan</button>
						</div>
						<div class="box-body" id="mydiv">
							<table class="table table-striped table-hover" id="mytable">
								<thead>
									<tr> 
										<th style="width: 50px">No</th>
										<th>Name</th>
										<th>Alamat</th>
										<th>Telp</th>

										<th style="width:100px;"></th>
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
<div class="modal fade" id="addsite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="z-index: 9999">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add New costcenter</h4>
			</div>
		<form action="<?= base_url('master/perusahaan/action/store') ?>" id="upload">
		<div class="modal-body">
			<div class="show_error"></div>
			<small>Nama</small>
			<input name="dt[name]" type="text" class="form-control" />
			<small>Alamat</small>
			<input name="dt[address]" type="text" class="form-control" />
			<small>Telp</small>
			<input name="dt[telp]" type="text" class="form-control" />
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
	        <h4 class="modal-title" id="myModalLabel">Edit costcenter</h4>
	      </div>
      	<form action="<?= base_url('master/perusahaan/action/update') ?>" id="uploads">
	      <div class="modal-body" id="data-update">
	      	
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary" id="send-btns"><i class="fa fa-save"></i> Simpan</button>
	      </div>
	      </form>
	  </div>
	</div>
</div>
<script type="text/javascript" src="<?= base_url('master/perusahaan/js') ?>"></script>