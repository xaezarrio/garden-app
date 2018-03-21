<?php 
$date = $_GET['date'];
$proyek_g = $_GET['proyek'];
$a = strtotime($date);
$tgl = date('Y-m-d',$a);
$bulan = date('M',$a);
$tahun = date('Y',$a);
$mn = date('m',$a);
// $sql = 'SELECT sum(nominal) as saldo FROM pengeluaran, aktivitas WHERE aktivitas_sub = aktivitas.id AND pengeluaran.kategori = "pribadi" AND aktivitas.kategori="Masuk" AND YEAR(date) = "'.$tahun.'" AND MONTH(date) <= "'.$mn.'"';
// $saldo = $this->db->query($sql)->row()->saldo;
 ?>


<table class="table table-bordered table-striped">
	<caption class="text-center"><h4><?= $bulan." ".$tahun ?></h4></caption>

	<thead>
		<tr>
			<th style="width: 30px;">No</th>
			<th>Tanggal</th>
			<th>Proyek</th>
			<th>Karyawan</th>
			<th>Deskripsi</th>
			<th>Total</th>
		</tr>
		<!-- <tr style="background: #ddd">
			<th colspan="4">Saldo Awal</th>
			<th class="text-right"><?= number_format($saldo)  ?></th>
		</tr> -->
	</thead>
	<tbody>
		<?php 
		$i =1;
		$this->db->order_by('date ASC');
		$data = $this->mymodel->selectWhere('aset_transaksi',array('tipe'=>'IN','YEAR(date)'=>$tahun,'MONTH(date)'=>$mn,'proyek_id'=>$proyek_g));
		foreach ($data as $rec) {
		$proyek = $this->mymodel->selectdataOne('proyek',array('pr_id'=>$rec['proyek_id']));
		$karyawan = $this->mymodel->selectdataOne('karyawan',array('id'=>$rec['karyawan_id']));
		$total_d = $this->db->query("SELECT SUM(price*qty) AS total FROM aset_transaksi_detail WHERE transaksi_id = '".$rec['id']."' ")->row();
		 ?>
		 <tr>
		 	<td><?= $i ?></td>
		 	<td><?= $rec['date'] ?></td>
		 	<td><?= $proyek['pr_nama'] ?></td>
		 	<td><?= $karyawan['name'] ?></td>
		 	<td><?= $rec['desc'] ?></td>
		 	<?php 
				$total[] = $total_d->total;
		 	 ?>
		 	<td class="text-right"><?= number_format($total_d->total) ?></td>

		 </tr>
		<?php $i++;} ?>
	</tbody>
	<tfoot>
		<?php 
		@$totals =  array_sum($total);
		?>
		<tr>
			<th colspan="5">Total</th>
			<th class="text-right"><?= number_format($totals); ?></th>
		</tr>
		<!-- <tr style="background: #ddd;font-weight: bold;color:blue">
			<td colspan="4">Margin</td>

			<td class="text-right">
				<?= number_format($saldo-$totals) ?>
			</td>
		</tr> -->
	</tfoot>
</table>
