<?php 
$karyawan = $this->mymodel->selectdataOne('karyawan',array('id'=>$id));
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
		<!-- <th>Item</th> -->
		<!-- <th>Nominal</th> -->
		<th>Keterangan</th>
		<th>Keluar</th>
		<th>Masuk</th>
	</thead>
	<tbody>
		<tr style="background: #ddd">
			<td colspan="4">Gaji Pokok</td>
			<td>
				0
			</td>
			<td class="text-right">
				<?= number_format($karyawan['sallary']) ?>
			</td>
		</tr>
		<?php 
		$mm =array();
		$kl =array();
		$i =1;
		$this->db->order_by('date ASC');
		$data = $this->mymodel->selectWhere('pengeluaran',array('karyawan_id'=>$id,'YEAR(date)'=>$tahun,'MONTH(date)'=>$mn));
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
			<td><?= $i ?></td>
			<td><?= date('Y-m-d',strtotime($rec['date'])) ?></td>
			<td><?= $sub['name'] ?></td>
			<td><?= $rec['keterangan'] ?></td>

			<td class="text-right">
				<?= number_format($keluar) ?>
			</td>
			<td class="text-right">
				<?= number_format($masuk) ?>
			</td>
		</tr>
		<?php $i++;} ?>
		
		<tr style="background: #aaa;font-weight: bold">
			<td colspan="6"></td>
		</tr>
		<?php 
		$gaji = $karyawan['sallary'];
		$uangmasuk = array_sum($mm);
		$uangkeluar = array_sum($kl);
		$sisagaji = ($uangmasuk+$karyawan['sallary']) - $uangkeluar;

		?>

		<tr style="background: #ddd;font-weight: bold;">
			<td colspan="4">Total</td>

			<td class="text-right">
				<?= number_format($uangkeluar) ?>
			</td>
			<td class="text-right">
				<?= number_format($uangmasuk+$karyawan['sallary']) ?>
			</td>
		</tr>
		<tr style="background: #ddd;font-weight: bold;color:blue">
			<td colspan="4">Sisa gaji yang belum dibayarkan</td>

			<td class="text-right">
				<?= number_format($sisagaji) ?>
			</td>
			<td class="text-right">
			</td>
		</tr>
	</tbody>
</table>