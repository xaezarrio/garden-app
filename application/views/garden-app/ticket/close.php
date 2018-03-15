<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">Ticket Open</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
			          <div class="box-body">
			            <table class="table table-condensed table-hover table-bordered" id="example1">
			              <thead>
			                <tr>
			                  <th style="width:30px;">Nomor</th>
			                  <th>Date</th>
			                  <th>Customer</th>
			                  <th>Title</th>
			                  <th>Status</th>	
			                  <th style="width:120px;">Action</th>
			                </tr>
			              </thead>
			              <tbody>
			                <?php for ($i=1; $i < 10 ; $i++) { ?>
			                <tr>
			                  <td>1801.000<?= $i ?></td>
			                  <td>Misbah Chairi</td>
			                  <td><?= date('d M Y') ?></td>
			                  <td>Title Ticket</td>
			                  <td>-</td>
			                  <td>
			                  	<a href="<?= base_url('ticket/close') ?>" class="btn btn-xs btn-danger btn-flat" ><i class="fa fa-reply"></i> Reply</a>
			                  	
			                  </td>
			                </tr>
			                <?php } ?>
			                
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