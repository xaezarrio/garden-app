<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">LIST REPORT MATTERS</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
			          <div class="box-body">
			            <table class="table table-condensed table-hover table-bordered" id="example1">
			              <thead>
			                <tr>
			                  <th style="width:30px;">Nomor</th>
			                  <th>Pelanggan</th>
			                  <th>Nama Proyek</th>
			                  <th>Cost Center</th>
			                  <th>Tanggal Mulai</th>
			                  <th>Tanggal Selesai</th>
			                  <th>Nilai Kontrak</th>
			                  <th style="width:50px;">Action</th>
			                </tr>
			              </thead>
			              <tbody>
			              	<?php foreach ($matters->result() as $p): ?>
			                <tr>
			                  <td><?= $p->pr_spk ?></td>
			                  <?php $cust = $this->mmodel->selectWhere("pelanggan",array("p_id"=>$p->pr_idpelanggan))->row()->p_nama_perusahaan ?>
			                  <td><?= $cust ?></td>
			                  <td><?= $p->pr_nama ?></td>
			                  <?php $cost = $this->mmodel->selectWhere("costcenter",array("id"=>$p->pr_idcost))->row()->name ?>
			                  <td><?= $cost ?></td>
			                  <td><?= $p->pr_tgl_mulai ?></td>
			                  <td><?= $p->pr_tgl_selesai ?></td>
			                  <td><?= number_format($p->pr_nilai_kontrak,2,",",".") ?></td>	
			                  <td>
			                  	<a href="<?= base_url('report/proyek/detail/'.$p->pr_id) ?>" class="btn btn-xs btn-success btn-flat" ><i class="fa fa-file-text-o"></i>Report</a>
			                  	
			                  </td>
			                </tr>
			              	<?php endforeach ?>
			                
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