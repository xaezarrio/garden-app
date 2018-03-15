<?php 
$date = $_GET['date'];
$a = strtotime($date);
$tgl = date('Y-m-d',$a);
$bulan = date('M',$a);
$tahun = date('Y',$a);
$mn = date('m',$a);

 ?>


<table class="table table-bordered table-striped">
	<caption class="text-center"><h4><?= $bulan." ".$tahun ?></h4></caption>

	<thead>
		<th style="width: 30px;">No</th>
		<th>Tanggal</th>
		<th>Sub Aktivitas</th>
		<th>Keterangan</th>
		<th>Keluar</th>
		<th></th>

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
		<?php $i++;} ?>
	</tbody>
	<tfoot>
		<?php 
		$totals =  array_sum($total);
		?>
		<tr>
			<th colspan="4">Jumlah</th>
			<th class="text-right"><?= number_format($totals); ?></th>
			<th></th>

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
