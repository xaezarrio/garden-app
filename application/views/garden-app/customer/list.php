<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">SEMUA PELANGGAN</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
			          <div class="box-body">
			            <table class="table table-condensed table-hover table-bordered" id="example1">
			              <thead>
			                <tr>
			                  <th style="width:30px;">No</th>
			                  <th>Nama Perusahaan</th>
			                  <th>Telepon</th>
			                  <th>Alamat</th>
			                  <!-- <th style="width:40px;">Project</th> -->
			                  <th style="width:120px;">Action</th>
			                </tr>
			              </thead>
			              <tbody>
			              	<?php foreach ($data->result() as $i => $v): ?>
			                <tr>
			                  <td><?= $i+1 ?></td>
			                  <td><?= $v->p_nama_perusahaan ?></td>
			                  <td><?= $v->p_phone ?></td>
			                  <td><?= $v->p_alamat ?></td>
			                  <!-- <td></td> -->
			                  <td>
			                  	<a href="<?= base_url('customer/detail/'.$v->p_id) ?>" class="btn btn-xs btn-success btn-flat" ><i class="fa fa-eye"></i>detail</a>
			                  	<a href="<?= base_url('customer/edit/'.$v->p_id) ?>" class="btn btn-xs btn-primary btn-flat" ><i class="fa fa-edit"></i>edit</a>
			                  	<a href="<?= base_url('customer/delete/'.$v->p_id) ?>" class="btn btn-xs btn-danger btn-flat" onclick="return confirm('Yakin menghapus customer?')"  ><i class="fa fa-remove"></i></a>

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