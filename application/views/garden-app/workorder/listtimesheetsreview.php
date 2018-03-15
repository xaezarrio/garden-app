<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">LIST MATTERS to TIMESHEETS REVIEW</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
			          <div class="box-body">
			            <table class="table table-condensed table-hover table-bordered" id="example1">
			              <thead>
			                <tr>
			                  <th style="width:30px;">Nomor</th>
			                  <th>Task</th>
			                  <th>Practic Area</th>
			                  <th>Active Date</th>
			                  <th>Custommer</th>
			                  <th>Activity</th>
			                  <th>Hour</th>
			                  <th>Status</th>
			                  <th style="width:80px;">Action</th>
			                </tr>
			              </thead>
			              <tbody>
			                <?php for ($i=1; $i < 10 ; $i++) { ?>
			                <tr>
			                  <td>1801.000<?= $i ?></td>
			                  <td>Task <?= $i ?> - Hak Cipta Legality</td>
			                  <td>Legal and Kekayaan Informasi</td>
			                  <td><?= date('d M Y') ?></td>
			                  <td>XYZ<?= $i ?><?= $i ?> Co ltd.</td>
			                  <td>1<?= $i ?></td>
			                  <td>5<?= $i ?> Jam</td>
			                  <td>Partner</td>
			                  <td>
			                  	<a href="<?= base_url('workorder/reviewtimesheets') ?>" class="btn btn-xs btn-primary btn-flat" >
			                  		<i class="fa fa-arrow-right"></i> review
			                  	</a>		                  	
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