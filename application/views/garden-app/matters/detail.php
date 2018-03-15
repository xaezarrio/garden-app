<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<a href="<?= base_url('matters/detail/'.$id) ?>" class="btn btn-default btn-flat active">
					<i class="fa fa-file-text-o"></i> Informasi Proyek
				</a>
				
				
				<a href="<?= base_url('matters/payment/'.$id) ?>" class="btn btn-default btn-flat">
					<i class="fa fa-money"></i> Pembayaran
				</a>

			</div>
			<br>
			<div class="row">
				<div class="col-md-8">
					
			        <div class="box box-primary">
					   <div class="box-header with-border">	
						<button class="btn btn-primary btn-flat " data-toggle="modal" data-target="#activity"><i class="fa fa-plus"></i> Tambahkan Aktivitas</button>
						<button class="btn btn-success btn-flat pull-right"><i class="fa fa-file-excel"></i> Export Excel</button>
					  </div>
					  <div class="box-body table-responsive">
			            <table class="table table-bordered table-striped">
			            	<thead>
			            		<th style="width: 30px;">No</th>
			            		<th>Tanggal</th>
			            		<th>Aktivitas</th>
			            		<th>Sub Aktivitas</th>
			            		<th>Keterangan</th>
			            		<th>Masuk</th>
			            		<th>Keluar</th>

			            	</thead>
			            	<tbody>
			            		<?php $total=0; 
			            		$m = 0;
			            		$k = 0;
			            		foreach ($ap->result() as $i => $v): 
			            		
								$sub = $this->mymodel->selectdataOne("aktivitas",array("id"=>$v->ap_idsubaktivitas));
			            		if($sub['kategori']=="masuk"){
			            			$masuk = $v->ap_nominal;
			            			$keluar = 0;
			            			$type = "IN";
			            		}else{
			            			$keluar = $v->ap_nominal;
			            			$masuk = 0;
			            			$type = "OUT";

			            		}
			 					$m += $masuk;
			 					$k += $keluar;
			            		?>
			 
			            		<tr>
			            			<td><?= $i+1 ?></td>
			            			<td><?= $v->ap_tanggal ?></td>
			            			<?php $akt = $this->mmodel->selectWhere("aktivitas",array("id"=>$v->ap_idaktivitas))->row()->name ?>
			            			<td><?= $akt ?></td>
			            			<?php ?>
			            			<td><?= $sub['name'] ?></td>
			            			<td><?= $v->ap_keterangan ?></td>
			            			<td class="text-right"><?= number_format($masuk) ?></td>
			            			<td class="text-right"><?= number_format($keluar) ?></td>

			            		</tr>
			            		<?php endforeach;
			            		 ?>
			            		<tr style="background: #ddd;font-weight: bold">
			            			<td colspan="5">Total</td>

			            			<td class="text-right">
			            				<?= number_format($m) ?>
			            			</td>
			            			<td class="text-right">
			            				<?= number_format($k) ?>
			            			</td>
			            		</tr>
			            		<tr style="background: #aaa;font-weight: bold">
			            			<td colspan="7"></td>
			            		</tr>
			            		<tr style="background: #ddd;font-weight: bold;color:blue">
			            			<td colspan="6">Margin</td>

			            			<td class="text-right">
			            				<?= number_format(0) ?>
			            			</td>
			            		</tr>
			            	</tbody>
			            </table>
			            
			          </div>
			          <!-- END OF BODY -->
			        </div> 
			        <!-- end of box  -->
			        
			    </div>
				<!-- end col -->
				<div class="col-md-4">
					<div class="box box-primary">
					  <div class="box-header with-border">	
						<b style="font-size: 16px;">Informasi Proyek</b>
					  </div>	
			          <div class="box-body">
			            <table class="table table-bordered table-hover table-striped">
			            	<tr style="background: #ddd">
			            		<th style="width: 120px;">
			            			No SPK
			            		</th>
			            		<th>
			            			<?= $matters->pr_spk ?>
			            		</th>
			            	</tr>
			            	<tr>
			            		<td>
			            			Nama Proyek
			            		</td>
			            		<td>
			            			<?= $matters->pr_nama ?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Cost Center 
			            		</td>
			            		<td>
			            			<?= $this->mmodel->selectWhere("costcenter",array("id"=>$matters->pr_idcost))->row()->name ?> 
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Tanggal Mulai
			            		</td>
			            		<td>
			            			<?= $matters->pr_tgl_mulai ?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Tanggal Selesai
			            		</td>
			            		<td>
			            			<?= $matters->pr_tgl_selesai ?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Nilai Kontrak
			            		</td>
			            		<td>
			            			<?= number_format($matters->pr_nilai_kontrak) ?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Pajak
			            		</td>
			            		<td>
			            			<?= $matters->pr_pajak ?>, <?= $matters->pr_pajak2 ?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Modal
			            		</td>
			            		<td>
			            			<?= $matters->pr_sumber ?> | <?= number_format($matters->pr_modal) ?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Description
			            		</td>
			            		<td>
			            			<?= $matters->pr_keterangan  ?>
			            		</td>
			            	</tr>
			            	
			            </table>

			          </div>
			          <!-- end body -->
			          <div class="box-header with-border">	
						<b>Informasi Pelanggan</b>
					  </div>	
			          <div class="box-body">
			            <table class="table table-bordered table-hover table-striped">
			            	<?php $pelanggan = $this->mmodel->selectWhere("pelanggan",array("p_id"=>$matters->pr_idpelanggan))->row() ?>
			            	<tr>
			            		<td style="width: 140px;">
			            			Nama Perusahaan
			            		</td>
			            		<td>
			            			<?= $pelanggan->p_nama_perusahaan ?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Alamat
			            		</td>
			            		<td>
			            			<?= $pelanggan->p_alamat ?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			NPWP
			            		</td>
			            		<td>
			            			<?= $pelanggan->p_npwp ?>
			            		</td>
			            	</tr>
			            	
			            	
			            </table>
			            
			          </div>
			          <!-- end body -->
			          
			         
			        </div>
			        <!-- end of box -->
			        <div class="box box-primary">
					   <div class="box-header with-border">	
						<b>Dokumen</b>
						<button class="btn btn-primary btn-flat pull-right btn-xs"><i class="fa fa-file-text"></i> Add File</button>
					  </div>
					  <div class="box-body">
			            
			            <table class="table table-bordered table-hover table-striped">

			            	<tr>
			            		<td>
			            			<a href="#">Download - Engagement Letter (ZIP)</a><br>
			            			<b>Description :</b><br>
			            			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  <br>
			            			<div>1. Update by Super Admin <a href="#">(2 files)</a></div>
			            			<div>2. Update by Lawyer <a href="#">(1 files)</a></div>
			            		</td>
			            	</tr>
			            </table>
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



<!-- modal review -->
<div class="modal fade" id="activity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="z-index: 9999">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Tambahkan Aktivitas Baru</h4>
	      </div>
	      <form action="<?= base_url('matters/aktivitas/add'); ?>" method="get" accept-charset="utf-8">
	      <div class="modal-body">
	      	<table class="table table-bordered table-hover">
	      		<input type="hidden" name="ap_idproyek" value="<?= $matters->pr_id ?>" placeholder="">
            	<tr>
            		<td>
            			Tanggal
            		</td>
            		<td>
            			<input type="text" name="ap_tanggal" class="form-control tgl" required="" value="<?= date("Y-m-d") ?>">
            		</td>
            	</tr>
            	<tr>
            		<td>
            			Aktivitas
            		</td>
            		<td>
            			<select class="form-control" name="ap_idaktivitas" onchange="aktivitass();" id="aktivitas" required="">
            				<?php foreach ($aktivitas->result() as $a): ?>
		    				<option value="<?= $a->id ?>"><?= $a->name ?></option>
            				<?php endforeach ?>
		    			</select>
            		</td>
            	</tr>
            	<tr>
            		<td>
            			Sub Aktivitas
            		</td>
            		<td>
            			<select class="form-control" name="ap_idsubaktivitas" id="parent" required="">
		    			</select>
            		</td>
            	</tr>
            	<tr>
            		<td>
            			QTY 
            		</td>
            		<td>
            			<input type="text" class="form-control" name="ap_qty" style="width: 60px;" value="1" required="">
            		</td>
            	</tr>
            	<tr>
            		<td>
            			Nominal (Rp) 
            		</td>
            		<td>
            			<input type="text" class="form-control" name="ap_nominal" required="">
            		</td>
            	</tr>
            	<tr>
            		<td>
            			Keterangan
            		</td>
            		<td>
            			<textarea class="form-control" name="ap_keterangan"></textarea>
            		</td>
            	</tr>
            </table>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary" >Save</button>
	      </div>
	      </form>
	  </div>
	</div>
</div>
<!-- end modal review -->


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

<script type="text/javascript">
	function aktivitass() {
		id = $("#aktivitas").val();
		$("#parent").prop( "disabled", true );
		url = "<?= base_url('matters/aktivitas/'); ?>/"+id;
		$("#parent").load(url);
		$("#parent").prop( "disabled", false );

	}

	aktivitass();
</script>