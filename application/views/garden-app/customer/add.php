<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">TAMBAH PELANGGAN</h3>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="box box-primary">
						<div class="box-header with-border">
							<b>Company Profile</b>
						</div>
						<form action="<?= base_url('customer/save'); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
							<div class="box-body">
								<table class="table table-bordered table-hover">
									<tr>
										<td style="width: 140px;">Nama Perusahaan</td>
										<td><input type="text" name="p_nama_perusahaan" class="form-control" required=""></td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td><input type="text" name="p_alamat" class="form-control" required=""></td>
									</tr>
									<tr>
										<td>NPWP</td>
										<td><input type="text" name="p_npwp" class="form-control" required=""></td>
									</tr>
									<tr>
										<td>Keterangan</td>
										<td><input type="text" name="p_keterangan" class="form-control" required=""></td>
									</tr>
								</table>
							</div>
							<!-- end body -->
							<div class="box-header with-border">
								<b>Kontak</b>
							</div>
							<div class="box-body">
								
								<table class="table table-bordered table-hover table-striped">
									<tr style="background: #ddd">
										<td>No</td>
										<td>Name</td>
										<td>Email</td>
										<td>Position</td>
										<td>Phone</td>
									</tr>
									<tr>
										<td>1.</td>
										<td><input type="text" name="p_name" class="form-control" required=""></td>
										<td><input type="text" name="p_email" class="form-control" required=""></td>
										<td><input type="text" name="p_position" class="form-control" required=""></td>
										<td><input type="text" name="p_phone" class="form-control" required=""></td>
									</tr>
									<tr>
										<td>2.</td>
										<td><input type="text" name="p_name2" class="form-control"></td>
										<td><input type="text" name="p_email2" class="form-control"></td>
										<td><input type="text" name="p_position2" class="form-control"></td>
										<td><input type="text" name="p_phone2" class="form-control"></td>
									</tr>
								</table>
							</div>
							<!-- END OF BODY -->
							<div class="box-header with-border">
								<b>Dokumen</b>
							</div>
							<div class="box-body">
								
								<table class="table table-bordered table-hover table-striped">
									<tr style="background: #ddd">
										<td>No</td>
										<td>Document</td>
										<td>File</td>
									</tr>
									<tr>
										<td>1.</td>
										<td><input type="text" name="p_doc" class="form-control"></td>
										<td><input type="file" name="p_doc_file" class="form-control"></td>
									</tr>
									<tr>
										<td>2.</td>
										<td><input type="text" name="p_doc2" class="form-control"></td>
										<td><input type="file" name="p_doc_file2" class="form-control"></td>
									</tr>
								</table>
								<hr>
								<button type="submit" class="btn btn-primary btn-flat pull-right">SAVE CUSTOMER</button>
							</div>
						</form>
						<!-- END OF BODY -->
					</div>
					<!-- end of box -->
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