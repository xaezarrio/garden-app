<?php 
$id_karyawan= $this->input->get('karyawan');
$date= $this->input->get('date');
$date = strtotime($date);
$m = date('M Y',$date);
$karyawan = $this->mymodel->selectdataOne('karyawan',array('id'=>$id_karyawan));

?>
<h4 class="text-center"><?= $karyawan['name'] ?> - <?= $m ?></h4>
<table class="table table-condensed table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Date</th>
			<th>Desc</th>
			<th>Simpan</th>
			<th>Pinjam</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>