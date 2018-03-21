<?php 
$id_karyawan= $this->input->get('karyawan');
$dt= $this->input->get('date');
if($dt!=""){
	$date = strtotime($dt);
	$tanggal = date('M Y',$date);
	$m = date('m',$date);
	$y = date('Y',$date);	
}


$month= $this->input->get('month');
$year= $this->input->get('year');
if($year!=""){
	$date = $year."-".$month."-01";
	$date = strtotime($date);
	$m = $month;
	$y = $year;	

	if($month!=""){
		$tanggal = date('M Y',$date);
	}else{
		$tanggal = $y;
	}
	
}





$karyawan = $this->mymodel->selectdataOne('karyawan',array('id'=>$id_karyawan));
if($id_karyawan==""){

}else{

if($m!=""){
	$this->db->where(array('month(date)'=>$m));
}

$this->db->where(array('year(date)'=>$y));

$koperasi = $this->mymodel->selectWhere('koperasi',array('karyawan_id'=>$id_karyawan));
?>
<h4 class="text-center"><?= $karyawan['name'] ?> - <?= $tanggal ?></h4>
<table class="table table-condensed table-hover table-bordered">
	<thead>
		<tr style="background: #ddd">
			<th>No</th>
			<th>Date</th>
			<th>Aktivitas</th>
			<th>Desc</th>
			<th>Masuk</th>
			<th>Keluar</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

<?php 
	$i=1;
	$totalin = 0;
	$totalout = 0;
	$id = $this->input->get('id');
	// if($id!=""){

	// }

	foreach ($koperasi as $data) {
	// $type = $data['type'];

	$akt = $this->mymodel->selectdataOne('aktivitas',array('id'=>$data['aktivitas_id']));
	$date = $data['created_at'];
	$date = strtotime($date);
	$date = date('Y-m-d',$date);
	$type = $akt['kategori'];
	if($type=="Masuk"){
		$in = $data['nominal'];
		$out = 0;
		$totalin+=$in;
	}else{
		$out = $data['nominal'];
		$in = 0;
		$totalout+=$out;

		
	}
?>

		<tr <?php if($id==$data['id']){ echo "class='bg-info'";} ?>>
			<td><?= $i ?></td>
			<td><?= $data['date'] ?></td>
			<td><?= $akt['name'] ?></td>

			<td><?= $data['desc'] ?></td>
			<td class="text-right"><?= number_format($in); ?></td>
			<td class="text-right"><?= number_format($out); ?></td>
			<td class="text-center">
			<?php //if($date==date('Y-m-d')){ ?> 
				<i class="fa fa-remove text-danger" onclick="deletedata(<?= $data['id'] ?>)"></i>
			<?php //} ?>
			</td>
		</tr>
<?php $i++; } ?>
	</tbody>
	<tfoot>
		<tr style="background: #ddd">
			<th colspan="4">Total</th>
			<th class="text-right"><?= number_format($totalin); ?></th>
			<th class="text-right"><?= number_format($totalout); ?></th>
			<th></th>

		</tr>
		<tr class="bg-blue">
			<th colspan="5">Saldo</th>		
			<th class="text-right"><?= number_format($totalin-$totalout); ?></th>
			<th></th>
		</tr>
	</tfoot>
</table>
<?php } ?>

