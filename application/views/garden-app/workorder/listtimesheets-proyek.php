
<?php 
	if($id!=""){
		$date = $_GET['date'];
		$a = strtotime($date);
		$tgl = date('Y-m-d',$a);
		$bulan = date('M',$a);
		$tahun = date('Y',$a);
		$mn = date('m',$a);
		$karyawan = $this->mymodel->selectdataOne('karyawan',array('id'=>$id));
		$data = $this->mymodel->selectWhere('karyawan_proyek',array('karyawan_id'=>$id,'YEAR(date)'=>$tahun,'MONTH(date)'=>$mn));

?>

<table class="table table-condensed table-hover table-bordered">
		<!-- <caption class="text-center"><?= $bulan ?> <?= $tahun ?></caption> -->
		<thead>
			<tr>
				<th style="width: 10%">No</th>
				<th>Proyek</th>
				<th>Date</th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$i=1;
			foreach ($data as $record) { 
				$proyek = $this->mymodel->selectdataOne('proyek',array('pr_id'=>$record['proyek_id']));
			?>
			<tr>
				<td><?= $i ?></td>
				<td><?= $proyek['pr_nama'] ?></td>
				<td><?= $record['date'] ?></td>
				<td>
					<a href="<?= base_url('workorder/list-timesheets/pegawai/action_deleteproyek?id='.$record['id']) ?>" onclick="return confirm('Apakah anda yakin ?')"><i class="fa fa-remove text-danger"></i></a>
				</td>
			</tr>
		<?php $i++; } ?>
		</tbody>
	</table>	


<?php } ?>