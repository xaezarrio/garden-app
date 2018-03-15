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
		<th>Masuk</th>
		<th>Keluar</th>
		<th></th>
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
		}

		$mm[] = $masuk;
		$kl[] = $keluar;

		?>
		<tr>
			<td><?=$i++; ?></td>
			<td><?= $rec['date'] ?></td>
			<td><?=$sub['name'] ?></td>
			<td><?= $rec['keterangan'] ?></td>
			<td class="text-right"><?= number_format($masuk) ?></td>
			<td class="text-right">
				<?= number_format($keluar) ?>
			</td>
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
		<?php $i++; } ?>
	
	</tbody>
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
