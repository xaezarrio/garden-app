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
			<th>Download</th>

			<th>Nominal</th>
			<th></th>
		</tr>
		<tr style="background: #ddd">
			<th colspan="5">Saldo Awal</th>
			<th class="text-right"><?= number_format($saldo)  ?></th>
			<th></th>
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
		if ($sub['kategori']=="Keluar") {
		$total[] = $rec['nominal']; 
		 ?>
		 <tr>
		 	<td><?= $i ?></td>
		 	<td><?= $rec['date'] ?></td>
		 	<td><?= $sub['name'] ?></td>
		 	<td><?= $rec['keterangan'] ?></td>
		 	<td class="text-right">
				<a href="<?= base_url('uploads/'.$rec['file']) ?>" target="_blank"><i class="fa fa-download"></i> Download</a>
			</td>
		 	<td class="text-right"><?= number_format($rec['nominal']) ?></td>
			<th>
				<?php 
			 	$created = strtotime($rec['created_at']);
			 	$created = date('Y-m-d',$created);
			 	$now = date('Y-m-d');
			 	if($created==$now){
			 	?>
			 		<a href="javascript:void(0)" onclick="hapus(<?= $rec['id'] ?>)" class="text-danger"><i class="fa fa-times"></i></a>
			 	<?php } ?>
			</th>

		 </tr>
		<?php $i++;}} ?>
	</tbody>
	<tfoot>
		<?php 
		$totals =  array_sum($total);
		?>
		<tr>
			<th colspan="5">Total</th>
			<th class="text-right"><?= number_format($totals); ?></th>
			<td></td>
		</tr>
		<tr style="background: #ddd;font-weight: bold;color:blue">
			<td colspan="5">Margin</td>

			<td class="text-right">
				<?= number_format($saldo-$totals) ?>
			</td>
			<td></td>
		</tr>
	</tfoot>
</table>
<script type="text/javascript">
	 function hapus(id) {
     	if (confirm('Are you sure delete this data ?')) {
     		window.location.href = "<?= base_url('workorder/list-timesheets/pribadi/delete/') ?>"+id;		
		} else {
		    return false
		}

     }
</script>
