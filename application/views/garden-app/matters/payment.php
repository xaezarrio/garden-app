<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<a href="<?= base_url('matters/detail/'.$id) ?>" class="btn btn-default btn-flat ">
					<i class="fa fa-file-text-o"></i> Informasi Proyek
				</a>
				
				<a href="<?= base_url('matters/payment/'.$id) ?>"" class="btn btn-default btn-flat active">
					<i class="fa fa-money"></i> Pembayaran
				</a>
			</div>
			<br>
			<div class="row">
				
				<div class="col-md-8">
					
			        <div class="box box-primary">
					  <div class="box-header with-border">	
						<b>Invoice </b>
						<a href="<?= base_url('billing/add-invoice/'.$id) ?>">
							<button class="btn btn-primary pull-right btn-xs">Add Invoice</button>
						</a>
					  </div>
					  <div class="box-body">
			            
			            <table class="table table-bordered table-hover table-striped">

			            	<tr style="background: #ddd">
			            		<td>
			            			Invoice 
			            		</td>
			            		<td style="width: 100px;">
			            			Date
			            		</td>
			            		<td>
			            			Subject
			            		</td>
			            		<td>
			            			Status 
			            		</td>
			            		<td>
			            			Total
			            		</td>
			            		
			            	</tr>
			            	<?php 

			            		$inv = $this->mymodel->selectWhere('invoice',array('proyek_id'=>$id));
			            		foreach ($inv as $invo) {
			            		$no =  sprintf("%03d", $invo['id']);
			            		if($invo['status']=="Lunas"){
			            			$class= "success";
			            		}else{
			            			$class= "warning";
			            		}
			            	?>
			            	<tr>
			            		<td>
			            			<a href="<?= base_url('billing/detail-invoice/'.$invo['id']) ?>">INV<?= $no ?> </a>
			            		</td>
			            		<td><?= $invo['date']; ?></td>
			            		<td>
			            			<?= $invo['subject']; ?>
			            		</td>
			            		<td>
			            			<label class="label label-<?= $class ?>"><?= $invo['status'] ?></label>
			            		</td>
			            		<td style="color: green" class="text-right"><?= number_format($invo['total']) ?></td>
			            	</tr>
			            	<?php } ?>
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


				</div>
				<!-- end col -->
			</div>
			<!-- end row -->
		</div>

	</section><!-- /.content -->
	
</div><!-- /.content-wrapper -->
