<?php 
$date = $_GET['date'];
$a = strtotime($date);
$tgl = date('Y-m-d',$a);
$bulan = date('M',$a);
$tahun = date('Y',$a);
$mn = date('m',$a);
$sql = 'SELECT sum(nominal) as saldo FROM pengeluaran, aktivitas WHERE aktivitas_sub = aktivitas.id AND pengeluaran.kategori = "pribadi" AND aktivitas.kategori="Masuk" AND YEAR(date) = "'.$tahun.'" AND MONTH(date) <= "'.$mn.'"';
$saldo = $this->db->query($sql)->row()->saldo;
 ?>


<table class="table table-bordered table-striped">
	<caption class="text-center"><h4><?= $bulan." ".$tahun ?></h4></caption>

	<thead>
		<tr>
			<th style="width: 30px;">No</th>
			<th>Tanggal</th>
			<th>Sub Aktivitas</th>
			<th>Keterangan</th>
			<th>Keluar</th>
		</tr>
		<tr style="background: #ddd">
			<th colspan="4">Saldo Awal</th>
			<th class="text-right"><?= number_format($saldo)  ?></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$i =1;
		$total[] = 0;
		$this->db->order_by('date ASC');
		$data = $this->mymodel->selectWhere('pengeluaran',array('kategori'=>'pribadi','YEAR(date)'=>$tahun,'MONTH(date)'=>$mn));
		foreach ($data as $rec) {
		$sub = $this->mymodel->selectdataOne('aktivitas',array('id'=>$rec['aktivitas_sub']));
		 $total[] = $rec['nominal']; 
		 ?>
		 <tr>
		 	<td><?= $i ?></td>
		 	<td><?= $rec['date'] ?></td>
		 	<td><?= $sub['name'] ?></td>
		 	<td><?= $rec['keterangan'] ?></td>
		 	<td class="text-right"><?= number_format($rec['nominal']) ?></td>
		 </tr>
		<?php $i++;} ?>
	</tbody>
	<tfoot>
		<?php 
		$totals =  array_sum($total);
		?>
		<tr>
			<th colspan="4">Total</th>
			<th class="text-right"><?= number_format($totals); ?></th>
		</tr>
		<tr style="background: #ddd;font-weight: bold;color:blue">
			<td colspan="4">Margin</td>

			<td class="text-right">
				<?= number_format($saldo-$totals) ?>
			</td>
		</tr>
	</tfoot>
</table>
