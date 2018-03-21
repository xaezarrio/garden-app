<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">DETAIL REPORT MATTERS</h3>
			</div>
			<div class="row">
				<div class="col-xs-3">
					<div class="box box-primary">
					  <div class="box-header with-border">	
						<b style="font-size: 16px;">Informasi Proyek</b>
					  </div>	
			          <div class="box-body">
			            <table class="table table-bordered table-hover table-striped">
			            	<tr style="background: #ddd">
			            		<th style="width: 50px;">
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
			            			<?php 
							            $pajak1 = $this->mymodel->selectdataOne('pajak',array('id'=>$matters->pr_pajak));
							            $pajak2 = $this->mymodel->selectdataOne('pajak',array('id'=>$matters->pr_pajak2));

			            			 ?>
			            			<?= $pajak1['name'] ?>, <?= $pajak2['name'] ?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Modal
			            		</td>
			            		<td class="text-right">
			            			<?php $sumber =  json_decode($matters->pr_sumber) ?> <?php $nominal = json_decode($matters->pr_modal) ?> <?php $bunga = json_decode($matters->pr_bunga) ?>

			            			<p><b><?= number_format(array_sum($nominal)) ?></b></p>
			            			
			            		
			            		</td>
			            	</tr>
			            	<tr>
			            		<td colspan="">
			            			<ul>
			            			<?php 
			            				$i=0;
			            				foreach ($sumber as $sbr) {
			            					$sbrr = $this->mymodel->selectdataOne('modal',array('id'=>$sbr));
			            					echo "<li>".$sbrr['name']."</li>";
			            				$i++;}
			            			?>
			            			</ul>
			            		</td>
			            		<td>
			            			<?php 
			            				$i=0;
			            				foreach ($sumber as $sbr) {
			            					$sbrr = $this->mymodel->selectdataOne('modal',array('id'=>$sbr));
			            					echo "<li class='text-right'>".number_format($nominal[$i])."</li>";
			            				$i++;}
			            			?>
			            			
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
			            		<td style="width: 50px;">
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
				<div class="col-xs-9">
					<div class="box box-primary">
					<div class="box-header">
						<a class="btn btn-sm btn-success btn-flat pull-right" target="_blank" href="<?= base_url('report/proyek/excel/'.$matters->pr_id) ?>"><i class="fa fa-file-o"></i> Excel</a>
					</div>
			          <div class="box-body">
			           	<table class="table table-condensed table-hover table-bordered">
			           		<thead>
			           			
			           			<tr class="bg-primary">
			           				<th>No</th>
			           				<th>Tanggal</th>
			           				<th>Karyawan</th>
			           				<th>Aktivitas</th>
			           				<th>Sub Aktivitas</th>
			           				<th>Item</th>
			           				<th>Qty</th>
			           				<th>Masuk</th>
			           				<th>Keluar</th>
			           				<th style="width: 100px">Keterangan</th>
			           			</tr>
			           			
			           		</thead>
			           		<tbody>
			           			<?php 
			            			$m = 0;
			           				
			           				$modal = array_sum($nominal);
			           				$m += $modal;
			           			 ?>
			           			<tr style="background: #ddd">
			           				<th class="text-center" colspan="10">Modal</th>
			           			</tr>

			           			<tr>
			           				<td>1</td>
			           				<td><?= $matters->pr_tgl_mulai ?></td>
			           				<td></td>
			           				<td></td>
			           				<td></td>
			           				<td></td>
			           				<td></td>
			           				<td class="text-right"><?= number_format($modal) ?></td>
			           				<td></td>
			           				<td>Total Modal</td>

			           			</tr>
			           			<tr style="background: #ddd">
			           				<th colspan="10" class="text-center">Aktivitas</th>
			           			</tr>
			           			<?php $total=0; 
			            		$k = 0;
			            		$i = 2;
			            		foreach ($ap->result() as $v): 
			            		
								$file = $this->mymodel->selectdataOne("file",array("table"=>'aktivitas_proyek',"table_id"=>$v->ap_id));
								// print_r($file)
								$sub = $this->mymodel->selectdataOne("aktivitas",array("id"=>$v->ap_idsubaktivitas));
			            		if($sub['kategori']=="Masuk"){
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
			            			<td><?= $i ?></td>
			            			<td><?= $v->ap_tanggal ?></td>
			            			<td>-</td>
			            			<?php $akt = $this->mmodel->selectWhere("aktivitas",array("id"=>$v->ap_idaktivitas))->row()->name ?>
			            			<td><?= $akt ?></td>
			            			<td><?= $sub['name'] ?></td>
			            			<td>-</td>
			            			<td>-</td>
			            			<td class="text-right"><?= number_format($masuk) ?></td>
			            			<td class="text-right"><?= number_format($keluar) ?></td>
			            			<td><?= $v->ap_keterangan ?></td>

			            		</tr>
			            		<?php $i++; endforeach; ?>

			           			<!-- ----------------------------------------------------------- -->
								<tr style="background: #ddd">
			           				<th colspan="10" class="text-center">Aset</th>
			           			</tr>
			           			<?php 
		            			$at = $this->mymodel->selectWhere('aset_transaksi',array('proyek_id'=>$id));
			            		foreach ($at as $astr) {
			            			$karyawan = $this->mymodel->selectdataOne('karyawan',array('id'=>$astr['karyawan_id']));  
		            				$ad = $this->mymodel->selectWhere('aset_transaksi_detail',array('transaksi_id'=>$astr['id']));
		            				// $i = 1;
		            				foreach ($ad as $detail) {
			            			$aset = $this->mymodel->selectdataOne('aset',array('id'=>$detail['aset_id']));  
			            			if($astr['tipe']=="OUT"){
			            				$in = 0;
			            				$out = 0;
			            				$statusin = "<span class='text-danger'>Peminjaman</span>";
			            				$statusout = "";

			            				// $out = $detail['price']*$detail['qty'];
			            			}else{
										// $in = $detail['price']*$detail['qty'];
			            				$out = 0;
			            				$in = 0;
			            				$statusin = "";
			            				$statusout = "<span class='text-success'>Pengembalian</span>";

			            			
			            			}
			            			$m+=$in;
			            			$k+=$out;

		            		?>

			            		<tr>
			            			<td><?= $i; ?></td>
			            			<td><?= $astr['date'] ?></td>
			            			<td><?= $karyawan['name'] ?></td>
			            			<td>-</td>
			            			<td>-</td>
			            			<td><?= $aset['name'] ?></td>
			            			<td><?=  $detail['qty'] ?></td>
			            			<td class="text-right"><?= $statusin ?></td>
			            			<td class="text-right"><?= $statusout ?></td>
			            			<td><?= $astr['desc'] ?></td>


			            		</tr>
			            	<?php
			            	$i++; }	
			            		} ?>
			            		<tr style="background: #ddd">
			            			<td colspan="10"></td>
			            		</tr>
			            		<tr style="background: #ddd">
			            			<th colspan="7	">Total</th>
			            			<td class="text-right"><?= number_format($m) ?></td>
			            			<td class="text-right"><?= number_format($k) ?></td>
			            			<td ></td>
			            		</tr>
			            		<tr style="background: #ddd">
			            			<th colspan="8">Margin Operasional</th>
			            			<?php 
			            			$mo = $m-$k;
			            			?>
			            			<th class="text-right"><?= number_format($mo) ?></th>
			            			<td ></td>
			            		</tr>
			            		<tr>
			            			<th colspan="10"></th>
			            		</tr>
			            		<tr style="background: #ddd">
			            			<th colspan="8">Modal yang harus dikembalikan</th>
			            			<?php 
			            			$modalbunga = array_sum($nominal)+array_sum($bunga);
			            			 ?>
			            			<th class="text-right"><?= number_format($modalbunga) ?></th>
			            			<td ></td>
			            		</tr>
			            		<?php 
			            		$kp = $matters->pr_nilai_kontrak-$modalbunga-$k;

			            		?>
			            		<tr style="background: #ddd">
			            			<th colspan="8">Keuntungan Proyek</th>
			            			<th class="text-right"><?= number_format($kp) ?></th>
			            			<td ></td>
			            		</tr>
			            		<?php 
			            		$tp = $this->mymodel->selectWhere('invoice',array('proyek_id'=>$id));
			            		foreach ($tp as $tpp) {
			            			# code...
			            			$totaltp[] = $tpp['total'];
			            		}
			            		$stp = array_sum($totaltp);
			            		?>
			            		<tr style="background: #ddd">
			            			<th colspan="8">Total Penagihan</th>
			            			<th class="text-right"><?= number_format($stp) ?></th>
			            			<td ></td>
			            		</tr>
				            		<?php 

				            		$tps = $this->mymodel->selectWhere('invoice',array('proyek_id'=>$id,'status'=>'Lunas'));
				            		foreach ($tps as $tpps) {
				            			# code...
				            			$totaltps[] = $tpps['total'];
				            		}
				            		$stps = array_sum($totaltps);
				            		?>
			            		<tr style="background: #ddd">
			            			<th colspan="8">Total Pembayaran</th>
			            			<th class="text-right"><?= number_format($stps) ?></th>
			            			<td ></td>
			            		</tr>
			           		</tbody>
			           	</table>

			           

			           	<hr>
			       		<table class="table table-bordered table-hover table-striped table-condensed">
			       			<caption class="text-center"><h4>Invoice</h4></caption>
			            	<tr class="bg-blue">
			            		<td>
			            			Invoice 
			            		</td>
			            		<td>
			            			Item 
			            		</td>

			      
			            		<td>
			            			Total
			            		</td>
			            		
			            	</tr>
			            	<?php 

			            		$inv = $this->mymodel->selectWhere('invoice',array('proyek_id'=>$id));
			            		foreach ($inv as $invo) {
								$file = $this->mymodel->selectdataOne("file",array("table"=>'invoice',"table_id"=>$invo['id']));

			            		$no =  sprintf("%03d", $invo['id']);
			            		if($invo['status']=="Lunas"){
			            			$class= "success";
			            		}else{
			            			$class= "warning";
			            		}
			            	?>
			            	<?php 
								$item =$this->mymodel->selectWhere('invoice_item',array('invoice_id'=>$invo['id']));
								$rows = 5+count($item);
			            	 ?>
			            	<tr >
			            		<td rowspan="<?= $rows ?>" style="width: 250px">
			            			
			            				<a href="<?= base_url('billing/detail-invoice/'.$invo['id']) ?>" target="_blank"><b>INV<?= $no ?></b> </a> /
			            				<?= $invo['date']; ?><br>
			            				<label class="label label-<?= $class ?>"><?= $invo['status'] ?></label><br><br>	
			            				<p>Subject : <?= $invo['subject']; ?></p>

			            			
			            		</td>
			            		
			            	</tr>
			            	<?php 
              					foreach ($item as $it) {
			            	 ?>
			            	 <tr>
			            	 
			            	 	<td><?= $it['item'] ?></td>
			            	 	<td class="text-right"><?= number_format($it['nominal']) ?></td>
			            	 </tr>
			            	 <?php } ?>
			            	 
			            	 <?php
			            	 if($invo['pajak2']==""){
					              $invo['pajak2']=0;
					            }

					            $pajak1 = $this->mymodel->selectdataOne('pajak',array('id'=>$matters->pr_pajak));
					            $pajak2 = $this->mymodel->selectdataOne('pajak',array('id'=>$matters->pr_pajak2));

					            ?>
								<tr>
					              	<th colspan="1">Sub Total</th>
					              	<th class="text-right"><?= number_format($invo['subtotal']) ?></th>
				            	</tr>
								<tr>
					              	<th colspan="1"><?= $pajak1['name'] ?></th>
					              	<th class="text-right"><?= number_format($invo['pajak1']) ?></th>
				            	</tr>
								<tr>
					              	<th colspan="1"><?= $pajak2['name'] ?></th>
					              	<th class="text-right"><?= number_format($invo['pajak2']) ?></th>
				            	</tr>
					       		<tr>
			            	 	<th>Total</th>
			            		<th style="color: green" class="text-right"><?= number_format($invo['total']) ?></th>
			            	 	</tr>
					       		<tr style="background: #ddd" >
					       			<td colspan="3"></td>
					       		</tr>
					       		
			            	<?php } ?>
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
