<?php 
$date = $_GET['date'];
$a = strtotime($date);
$tgl = date('Y-m-d',$a);
$bulan = date('M',$a);
$tahun = date('Y',$a);
$mn = date('m',$a);
$sql = 'SELECT sum(nominal) as saldo FROM pengeluaran, aktivitas WHERE aktivitas_sub = aktivitas.id AND pengeluaran.kategori = "kantor" AND aktivitas.kategori="Masuk" AND YEAR(date) = "'.$tahun.'" AND MONTH(date) <= "'.$mn.'"';
$saldo = $this->db->query($sql)->row()->saldo;
?>
<table class="table table-bordered table-striped">
	<caption class="text-center"><h4><?= $bulan." ".$tahun ?></h4></caption>

	<thead>
		<th style="width: 30px;">No</th>
		<th>Tanggal</th>
		<th>Sub Aktivitas</th>
		<th>Item</th>
		<th>Qty</th>
		<th>Keterangan</th>
		<!-- <th>Masuk</th> -->
		<th>Nominal</th>
		<th></th>
		<tr style="background: #ddd">
			<th colspan="6">Saldo Awal</th>
			<th class="text-right"><?= number_format($saldo)  ?></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$mm =array();
		$kl =array();
		$i =1;
		$this->db->order_by('date ASC');
		$data = $this->mymodel->selectWhere('pengeluaran',array('kategori'=>'Kantor','YEAR(date)'=>$tahun,'MONTH(date)'=>$mn));
		foreach ($data as $rec) {
		$sub = $this->mymodel->selectdataOne('aktivitas',array('id'=>$rec['aktivitas_sub']));
		if($sub['kategori']=="Masuk"){
		$masuk = $rec['nominal'];
		$keluar = 0;	
		}else{
		$masuk = 0;
		$keluar = $rec['nominal'];	
		$total[] = $rec['nominal']; 
		}

		$mm[] = $masuk;
		$kl[] = $keluar;
		if ($sub['kategori']=="Keluar") {
		?>
		<tr>
			<td><?=$i++; ?></td>
			<td><?= $rec['date'] ?></td>
			<td><?=$sub['name'] ?></td>
			<td><?= $rec['item'] ?></td>
			<td><?= $rec['qty'] ?></td>
			<td><?= $rec['keterangan'] ?></td>
			<!-- <td class="text-right"><?= number_format($masuk) ?></td> -->
			<td class="text-right"><?= number_format($keluar) ?></td>
			<td>
			<?php 
		 	$created = strtotime($rec['created_at']);
		 	$created = date('Y-m-d',$created);
		 	$now = date('Y-m-d');
		 	if($created==$now){
		 	?>
		 		<a href="javascript:void(0)" onclick="hapus(<?= $rec['id'] ?>)" class="text-danger"><i class="fa fa-times"></i></a>
		 	<?php } ?>
			</td>
		</tr>

		<?php $i++; }} ?>
	
	</tbody>
	<tfoot>
		<?php 
		$totals =  array_sum($total);
		?>
		<tr>
			<th colspan="6">Total</th>
			<th class="text-right"><?= number_format($totals); ?></th>
			<th></th>
		</tr>
		<tr style="background: #ddd;font-weight: bold;color:blue">
			<td colspan="6">Margin</td>

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
     		window.location.href = "<?= base_url('workorder/list-timesheets/kantor/delete/') ?>"+id;		
		} else {
		    return false
		}

     }
</script>
