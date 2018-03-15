<?php $p = $pelanggan->row() ?>
<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">Profile : <?= $p->p_nama_perusahaan ?> </h3>
			</div>
			<div class="row">
				<div class="col-xs-7">
					<div class="box box-primary">
					  <div class="box-header with-border">	
						<b>Company Profile</b>
					  </div>	
			          <div class="box-body">
			            <table class="table table-bordered table-hover">
			            	<tr>
			            		<td style="width: 140px;">Company Name</td>
			            		<td><?= $p->p_nama_perusahaan ?></td>
			            	</tr>
			            	<tr>
			            		<td>Alamat</td>
			            		<td><?= $p->p_alamat ?></td>
			            	</tr>
			            	<tr>
			            		<td>NPWP</td>
			            		<td><?= $p->p_npwp ?></td>
			            	</tr>
			            	<tr>
			            		<td>Keterangan</td>
			            		<td><?= $p->p_keterangan ?></td>
			            	</tr>
			            </table>
			          </div>
			          <!-- end body -->
			          <div class="box-header with-border">	
						<b>Contact Person</b>
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
			            		<td><?= $p->p_name ?></td>
			            		<td><?= $p->p_email ?></td>
			            		<td><?= $p->p_position ?></td>
			            		<td><?= $p->p_phone ?></td>
			            	</tr>
			            	<tr>
			            		<td>2.</td>
			            		<td><?= $p->p_name2 ?></td>
			            		<td><?= $p->p_email2?></td>
			            		<td><?= $p->p_position2 ?></td>
			            		<td><?= $p->p_phone2 ?></td>
			            	</tr>
			            </table>
			          </div>
			          <!-- END OF BODY -->
			          <div class="box-header with-border">	
						<b>Document</b>
					  </div>
					  <div class="box-body">
			            
			            <table class="table table-bordered table-hover table-striped">
			            	<tr style="background: #ddd">
			            		<td>No</td>
			            		<td>Document</td>
			            		<td>File</td>
			            	</tr>
			            	<tr>
			            		<td>1</td>
			            		<td><?= $p->p_doc ?></td>
			            		<td><a href="<?= base_url('uploads/'.$p->p_doc_path); ?>">download</a></td>
			            	</tr>
			            	<tr>
			            		<td>2</td>
			            		<td><?= $p->p_doc2 ?></td>
			            		<td><a href="<?= base_url('uploads/'.$p->p_doc_path2); ?>">download</a></td>
			            	</tr>
			            </table>
			          </div>
			          <!-- END OF BODY -->
			        </div>
			        <!-- end of box -->


				</div>
				<!-- end col -->
				<div class="col-xs-5">
					<div class="box box-danger">
					  <div class="box-header with-border">	
						<b>Proyek</b>
					  </div>	
			          <div class="box-body">
			          	<table class="table table-hover table-bordered table-striped" >
							  <thead>
							    <tr>
							      <th>Nama Proyek</th>
							      <th>Start</th>
							      <th>Close</th>
							      <th>Kontrak</th>
							      <th>Status</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php foreach ($proyek->result() as $pr): ?>
							    <tr>
							      <td><a href="<?= base_url('matters/detail/'.$pr->pr_id) ?>"><?= $pr->pr_nama ?></a></td>
							      <td><?= date('d M Y',strtotime($pr->pr_tgl_mulai)); ?></td>
							      <td><?= date('d M Y',strtotime($pr->pr_tgl_selesai)); ?></td>
							      <td><?= number_format($pr->pr_nilai_kontrak,2,",",".") ?></td>
							      <td><?= $pr->pr_status ?></td>	
							    </tr>
							  	<?php endforeach ?>
							  </tbody>
							</table>
			          </div>
			        </div> 
			        <!-- end box  -->
			        <div class="box box-danger">
					  <div class="box-header with-border">	
						<b>Invoice</b>
					  </div>	
			          <div class="box-body">
			          	<table class="table table-hover table-bordered table-striped" >
							  <thead>
							    <tr>
							      <th>Proyek</th>
							      <th>Invoice</th>
							      <th>Termin</th>
							      <th>Nominal</th>
							    </tr>
							  </thead>
							  <tbody class="hide">
							    <tr>
							      <td>
							      	Taman Kota
							      </td>
							      <td>
							      	<a href="<?= base_url('billing/invoice') ?>">INV025</a><br>
							      	12<?= date(' M Y'); ?> s/d 21<?= date(' M Y'); ?>
							      </td>
							      <td>
							      	1
							      </td>
							      <td>
							      	<?= number_format(2900) ?>
							      </td>
							      	
							    </tr>
							    <tr>
							      <td>
							      	Taman Kota
							      </td>
							      <td>
							      	<a href="<?= base_url('billing/invoice') ?>">INV026</a><br>
							      	12<?= date(' M Y'); ?> s/d 21<?= date(' M Y'); ?>
							      </td>
							      <td>
							      	2
							      </td>
							      <td>
							      	<?= number_format(2900) ?>
							      </td>
							      	
							    </tr>
							    
							  </tbody>
							</table>
			          </div>
			        </div> 
			        <!-- end box  -->
			       

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