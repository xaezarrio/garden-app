						<div class="table-responsive">
			            <table class="table table-condensed table-hover table-bordered " id="example1">
			            <caption></caption>
			              <thead>
			                <tr>
			                  <th rowspan="2" class="text-center bg-blue">SPK</th>
			                  <th rowspan="2" class="text-center bg-blue">Nama Proyek</th>
			                  <th rowspan="2" class="text-center bg-blue">Nilai Kontrak</th>
			                  <th rowspan="2" class="text-center bg-blue">Modal</th>
			                  <th colspan="7" class="text-center bg-blue">Pengeluaran</th>
			                  <th colspan="2" class="text-center bg-blue">Pemasukan	</th>
			                  <th rowspan="2" class="text-center bg-blue">Profit</th>
			                  <th rowspan="2" class="text-center bg-blue">Status</th>

			                </tr>
			                <tr>
			                	<th class="text-center bg-blue">Hutang</th>
			                	<th class="text-center bg-blue">Transport</th>
			                	<th class="text-center bg-blue">Jasa</th>
			                	<th class="text-center bg-blue">Pegawai</th>
			                	<th class="text-center bg-blue">Kantor</th>
			                	<th class="text-center bg-blue">Bahan</th>
			                	<th class="text-center bg-blue">Entertain</th>

			                	<th class="text-center bg-blue">Invoice</th>
			                	<th class="text-center bg-blue">Invoice Dibayar</th>
			                </tr>
			              </thead>
			              <tbody>
			              	<?php 
			              		$allkontrak = 0;
			              		$allmodal = 0;
			              		$allhutang = 0;
			              		$alltransport = 0;
			              		$alljasa = 0;
			              		$allpegawai = 0;
			              		$allkantor = 0;
			              		$allbahan = 0;
			              		$allentertain = 0;
			              		$allinvoice = 0;
			              		$allinvoicedibayar = 0;
			              		$allprofit = 0;
			              	foreach ($matters->result() as $p): 
			              	$k =0;
			              	$mk = 0;
	                  		$kk = 0;
			              	?>
			                <tr>
			                  <td><?= $p->pr_spk ?></td>
			                  <td><?= $p->pr_nama ?></td>
			                  <td class="text-right"><?= number_format($p->pr_nilai_kontrak) ?></td>
			                  <td class="text-right">
			                  	<?php 
			                  	$modal = json_decode($p->pr_modal);
			                  	$mod = array_sum($modal);
			                  	$allmodal += $mod;
			                  	$allkontrak += $p->pr_nilai_kontrak;

			                  	?>
			                  	<?= number_format($mod) ?>
			                  </td>

			                  <td class="text-right">
			                  	<?php 
			                  	$bunga = json_decode($p->pr_bunga);
			                  	$bung = array_sum($bunga);
			                  	$hutang = $mod+$bung;
			                  	$allhutang += $hutang;

			                  	?>
			                  	<?= number_format($hutang) ?>

			                  </td>
			                  <!-- Transport -->
			                  <?php 
			                  		
			            			$akt = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Transport'));
			            			$transport = $this->mymodel->selectWhere('aktivitas_proyek',array('ap_idproyek'=>$p->pr_id,'ap_idaktivitas'=>$akt['id']));
			            			foreach ($transport as $trans) {
				            			$sub = $this->mymodel->selectdataOne('aktivitas',array('id'=>$trans['ap_idsubaktivitas']));
				            			if($sub['kategori']=="Masuk"){
										$masuk = $trans['ap_nominal'];
										$keluar = 0;	
										}else if($sub['kategori']=="Keluar"){
										$masuk = 0;
										$keluar = $trans['ap_nominal'];	
										}
										$mk += $masuk;
										$kk += $keluar;
			            				$k += $keluar;

			            			}
			            			$totaltransport = $kk;
			                  		$alltransport += $totaltransport;

			            		?>
			                  <td class="text-right">
			                  	<?= number_format($totaltransport) ?>
			                  </td>
			                  <!-- Jasa -->
			                  <?php 
			                  		$mk = 0;
			                  		$kk = 0;
			            			$akt = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Jasa'));
			            			$jasa = $this->mymodel->selectWhere('aktivitas_proyek',array('ap_idproyek'=>$p->pr_id,'ap_idaktivitas'=>$akt['id']));
			            			foreach ($jasa as $jas) {
				            			$sub = $this->mymodel->selectdataOne('aktivitas',array('id'=>$jas['ap_idsubaktivitas']));
				            			if($sub['kategori']=="Masuk"){
										$masuk = $jas['ap_nominal'];
										$keluar = 0;	
										}else if($sub['kategori']=="Keluar"){
										$masuk = 0;
										$keluar = $jas['ap_nominal'];	
										}
										$mk += $masuk;
										$kk += $keluar;
			            				$k += $keluar;

			            			}
			            			$totaljasa = $kk;
			                  		$alljasa += $totaljasa;


			            		?>
			                  <td class="text-right">
			                  	<?= number_format($totaljasa) ?>
			                  </td>
			                  <!-- Pegawai -->
			                   <?php
			                   $kk = 0;
			            		$kp = $this->mymodel->selectWhere('karyawan_proyek',array('proyek_id'=>$p->pr_id));
			            		foreach ($kp as $rec) {
			            			$bulan = date('m',strtotime($rec['date']));
			            			$tahun = date('Y',strtotime($rec['date']));

			            			$gaji = $this->mymodel->gaji($p->pr_id,$bulan,$tahun,$rec['karyawan_id']);
			            			$akt = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Pegawai'));
			            			$sub = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Gaji','parent'=>$akt['id']));
			            			$karyawan = $this->mymodel->selectdataOne('karyawan',array('id'=>$rec['karyawan_id']));
		 							$kk += $gaji['gaji'];
			            			$k += $gaji['gaji'];
			                  		$allpegawai += $gaji['gaji'];


		 						}

			            		?>
			                  <td class="text-right"><?=  number_format($kk) ?></td>
			                  <!-- Kantor -->
			                  <?php 
			                  		$mk = 0;
			                  		$kk = 0;

			            			$kantor = $this->mymodel->selectWhere('pengeluaran',array('proyek_id'=>$p->pr_id,'kategori'=>'Kantor'));
			            			foreach ($kantor as $ktr) {
				            			$sub = $this->mymodel->selectdataOne('aktivitas',array('id'=>$ktr['aktivitas_sub']));
				            			$akt = $this->mymodel->selectdataOne('aktivitas',array('id'=>$sub['parent']));
				            			if($sub['kategori']=="Masuk"){
										$masuk = $ktr['nominal'];
										$keluar = 0;	
										}else if($sub['kategori']=="Keluar"){
										$masuk = $ktr['nominal'];
										$keluar = 0;	
										}else{
											$masuk = 0;
											$keluar = $ktr['nominal'];
										}
										$mk += $masuk;
										$kk += $keluar;
			            				$k += $keluar;

			            			}
			            			$totalkantor = $kk;
			            			$allkantor += $totalkantor;

			            		?>
			                  <td class="text-right">
			                  	<?= number_format($totalkantor) ?>
			                  </td>
			                  <!-- Bahan -->
			                   <?php 
			                  		$mk = 0;
			                  		$kk = 0;
			            			$akt = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Bahan'));
			            			$bahan = $this->mymodel->selectWhere('aktivitas_proyek',array('ap_idproyek'=>$p->pr_id,'ap_idaktivitas'=>$akt['id']));
			            			foreach ($bahan as $bah) {
				            			$sub = $this->mymodel->selectdataOne('aktivitas',array('id'=>$bah['ap_idsubaktivitas']));
				            			if($sub['kategori']=="Masuk"){
										$masuk = $bah['ap_nominal'];
										$keluar = 0;	
										}else if($sub['kategori']=="Keluar"){
										$masuk = 0;
										$keluar = $bah['ap_nominal'];	
										}
										$mk += $masuk;
										$kk += $keluar;
			            				$k += $keluar;

			            			}
			            			$totalbahan = $kk;
			            			$allbahan += $totalbahan;

			            		?>
			                  <td class="text-right">
			                  	<?= number_format($totalbahan) ?>
			                  </td>
			                  <!-- Enertain -->
			                   <?php 
			                  		$mk = 0;
			                  		$kk = 0;
			            			$akt = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Entertain'));
			            			$entertain = $this->mymodel->selectWhere('aktivitas_proyek',array('ap_idproyek'=>$p->pr_id,'ap_idaktivitas'=>$akt['id']));
			            			foreach ($entertain as $ent) {
				            			$sub = $this->mymodel->selectdataOne('aktivitas',array('id'=>$ent['ap_idsubaktivitas']));
				            			if($sub['kategori']=="Masuk"){
										$masuk = $ent['ap_nominal'];
										$keluar = 0;	
										}else if($sub['kategori']=="Keluar"){
										$masuk = 0;
										$keluar = $ent['ap_nominal'];	
										}
										$mk += $masuk;
										$kk += $keluar;
			            				$k += $keluar;

			            			}
			            			$totalentertain = $kk;
			            			$allentertain += $totalentertain;

			            		?>
			                  <td class="text-right">
			                  	<?= number_format($totalentertain) ?>
			                  </td>
			                  <!-- invoice -->
			                  <?php 
				            		$totaltp = array();
				            		
				            		$tp = $this->mymodel->selectWhere('invoice',array('proyek_id'=>$p->pr_id));
				            		foreach ($tp as $tpp) {
				            			# code...
				            			$totaltp[] = $tpp['total'];
				            		}
				            		$stp = array_sum($totaltp);
			            			$allinvoice += $stp;

		            		  ?>
			                  <td class="text-right"><?= number_format($stp) ?></td>
			                  <!-- invoice dibayar -->
			                  <?php 
				            		$totaltps = array();
				            		$tps = $this->mymodel->selectWhere('invoice',array('proyek_id'=>$p->pr_id,'status'=>'Lunas'));
				            		foreach ($tps as $tpps) {
				            			# code...
				            			$totaltps[] = $tpps['total'];
				            		}
				            		$stps = array_sum($totaltps);
			            			$allinvoicedibayar += $stps;

				            		?>
			                  <td class="text-right"><?= number_format($stps) ?></td>
			                  <!-- profit -->
			                  <?php 
			            			$kp = $p->pr_nilai_kontrak-$hutang-$k;
			            			$allprofit += $kp;
			            			
			            			 ?>
	            				<th class="text-right"><?= number_format($kp) ?></th>
			                  	<td><?= $p->pr_status ?></td>
			                </tr>
			              	<?php endforeach ?>
			                
			              </tbody>
			              <tfoot>
			              	<tr style="background: #ddd">
			              		<th colspan="2">Total</th>
			              		<th class="text-right"><?= number_format($allkontrak) ?></th>
			              		<th class="text-right"><?= number_format($allmodal) ?></th>
			              		<th class="text-right"><?= number_format($allhutang) ?></th>
			              		<th class="text-right"><?= number_format($alltransport) ?></th>
			              		<th class="text-right"><?= number_format($alljasa) ?></th>
			              		<th class="text-right"><?= number_format($allpegawai) ?></th>
			              		<th class="text-right"><?= number_format($allkantor) ?></th>
			              		<th class="text-right"><?= number_format($allbahan) ?></th>
			              		<th class="text-right"><?= number_format($allentertain) ?></th>
			              		<th class="text-right"><?= number_format($allinvoice) ?></th>
			              		<th class="text-right"><?= number_format($allinvoicedibayar) ?></th>
			              		<th class="text-right"><?= number_format($allprofit) ?></th>
			              		<th></th>

			              	</tr>
			              </tfoot>
			            </table>
			            </div>