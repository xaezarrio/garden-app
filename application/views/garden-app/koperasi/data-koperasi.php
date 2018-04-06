<?php 
$id_karyawan= $this->input->get('karyawan');
$akti= $this->input->get('aktivitas');

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
$koperasi = $this->mymodel->selectWhere('koperasi',array('karyawan_id'=>$id_karyawan,'aktivitas_id'=>$akti));


if($m!=""){
	$this->db->where(array('month(date) < '=>$m));
}
$this->db->where(array('year(date)'=>$y));
$kop = $this->mymodel->selectWhere('koperasi',array('karyawan_id'=>$id_karyawan,'aktivitas_id'=>$akti));
$kopin = 0;
$kopout = 0;

foreach ($kop as $key) {
	# code...
	$akt = $this->mymodel->selectdataOne('aktivitas',array('id'=>$key['aktivitas_sub']));
	$type = $akt['kategori'];
	
	if($type=="Masuk"){
		$in = $key['nominal'];
		$out = 0;
		$kopin+=$in;
	}else{
		$out = $key['nominal'];
		$in = 0;
		$kopout+=$out;

		
	}
}

$saldototal = $kopin-$kopout;



// $saldo = $pemasukan-$pengeluaran;


?>
<h4 class="text-center"><?= $karyawan['name'] ?> - <?= $tanggal ?></h4>
<table class="table table-condensed table-hover table-bordered">
	<thead>
		<tr style="background: #ddd">
			<th>No</th>
			<th>Date</th>
			<th>Sub Aktivitas</th>
			<th>Desc</th>
			<th>Masuk</th>
			<th>Keluar</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php 
	$totalin = 0;
	$totalout = 0;
	$totalin+=$saldototal;
 ?>
	<tr>
		<td>1</td>
		<td>-</td>
		<td>Saldo</td>
		<td></td>
		<td class="text-right"><?= number_format($saldototal) ?></td>
		<td class="text-danger">0</td>
		<td></td>

	</tr>

<?php 
	$i=2;

	$id = $this->input->get('id');
	// if($id!=""){

	// }
	$sukarela = 0;
	$pokok = 0;
	$tariksukarela = 0;
	$tarikpokok = 0;


	foreach ($koperasi as $data) {
	// $type = $data['type'];

	$akt = $this->mymodel->selectdataOne('aktivitas',array('id'=>$data['aktivitas_sub']));
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
	 $akts = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Pokok'));
	 $aktd = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Sukarela'));
	 		 
	 $akts1 = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Tarik Simpanan Pokok'));
	 $aktd1 = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Tarik Simpanan Sukarela'));
	if($type=="Masuk"){
		if($data['aktivitas_sub']==$aktd['id']){
			$sukarela += $data['nominal'];

		}elseif ($data['aktivitas_sub']==$akts['id']) {
			# code...
			$pokok += $data['nominal'];

		}

	}else{
		if($data['aktivitas_sub']==$aktd1['id']){
			$tariksukarela += $data['nominal'];

		}elseif ($data['aktivitas_sub']==$akts1['id']) {
			# code...
			$tarikpokok += $data['nominal'];

		}


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
			<?php //if($date==date('Y-m-d')){ 



				if($akt['id']!=$akts['id']){
				?> 
				<i class="fa fa-remove text-danger" onclick="deletedata(<?= $data['id'] ?>)"></i>
			<?php } ?>
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
		<?php 
	 	$akts = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Simpan'));
	 	if($akts['id']==$akti){
		 ?>
		<tr class="bg-blue">
			<th colspan="5">Saldo Pokok</th>		
			<th class="text-right"><?= number_format($pokok-$tarikpokok); ?></th>
			<th></th>
		</tr>
		<tr class="bg-blue">
			<th colspan="5">Saldo Sukarela</th>		
			<th class="text-right"><?= number_format($sukarela-$tariksukarela); ?></th>
			<th></th>
		</tr>
		<?php } ?>
		<tr class="bg-blue">
			<th colspan="5">Saldo</th>		
			<th class="text-right"><?= number_format($totalin-$totalout); ?></th>
			<th></th>
		</tr>
	</tfoot>
</table>
<?php } ?>

