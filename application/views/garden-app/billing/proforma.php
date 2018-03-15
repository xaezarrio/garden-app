<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">PROFORMA</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
			          <div class="box-body">
			          	<a href="<?= base_url('billing/addproforma') ?>" class="btn btn-success btn-flat">New Proforma</a>
			          	<br>
			          	<br>
			            <table class="table table-condensed table-hover table-bordered" id="example1">
			              <thead>
			                <tr>
			                  <th style="width:30px;">No Pro</th>
			                  <th>Matter</th>
			                  <th>Date</th>
			                  <th>Remarks</th>
			                  <th>Total</th>	
			                  <th style="width:120px;">Action</th>
			                </tr>
			              </thead>
			              <tbody>
			                <?php for ($i=1; $i < 10 ; $i++) { ?>
			                <tr>
			                  <td>1801.000<?= $i ?></td>
			                  <td>Matter</td>
			                  <td><?= date('d M Y') ?></td>
			                  <td>Nego 2x</td>
			                  <td>Rp 1000.0000,-</td>
			                  <td>
			                  	<a href="<?= base_url('ticket/close') ?>" class="btn btn-xs btn-danger btn-flat" ><i class="fa fa-arrow-right"></i></a>
			                  	
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