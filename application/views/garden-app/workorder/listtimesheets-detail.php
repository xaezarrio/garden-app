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
		<th>Keterangan</th>
		<th>Download</th>
		<th>Keluar</th>
		<th>Masuk</th>
		<th></th>

	</thead>
	<tbody>
		<?php 
		$mm =array();
		$kl =array();
		$i =1;
		$this->db->order_by('date ASC');
		$data = $this->mymodel->selectWhere('pengeluaran',array('karyawan_id'=>$id,'YEAR(date)'=>$tahun,'MONTH(date)'=>$mn));
		foreach ($data as $rec) {
		$sub = $this->mymodel->selectdataOne('aktivitas',array('id'=>$rec['aktivitas_sub']));
		// print_r($file);
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
			<td>
				<a href="<?= base_url('uploads/'.$rec['file']) ?>" target="_blank"><i class="fa fa-download"></i> Download</a>
			</td>
			<td class="text-right">
				<?= number_format($keluar) ?>
			</td>
			<td class="text-right">
				<?= number_format($masuk) ?>
			</td>
			<td>
				<?php 
					$add =  date('Y-m-d',strtotime($rec['date']));
					$now = date('Y-m-d');
					if($add==$now){
				 ?>
				<a href="javascript::void(0)" onclick="hapus(<?= $rec['id'] ?>)" class="text-danger">
					<i class="fa fa-remove"></i>
				</a>
				<?php }	 ?>
			</td>
		</tr>
		<?php $i++;} ?>
		
		<tr style="background: #aaa;font-weight: bold">
			<td colspan="8"></td>
		</tr>
		<?php 
	
		$uangmasuk = array_sum($mm);
		$uangkeluar = array_sum($kl);
		$sisagaji = ($uangmasuk) - $uangkeluar;

		?>

		<tr style="background: #ddd;font-weight: bold;">
			<td colspan="5">Total</td>

			<td class="text-right">
				<?= number_format($uangkeluar) ?>
			</td>
			<td class="text-right">
				<?= number_format($uangmasuk) ?>
			</td>
			<td></td>
		</tr>
		<tr style="background: #ddd;font-weight: bold;color:blue">
			<td colspan="5">Sisa gaji yang belum dibayarkan</td>

			<td class="text-right">
				<?= number_format($sisagaji) ?>
			</td>
			<td class="text-right">
			</td>
			<td></td>
		</tr>
	</tbody>
</table>

<script type="text/javascript">
	function hapus(id) {
     	if (confirm('Are you sure delete this data ?')) {
     		window.location.href = "<?= base_url('workorder/list-timesheets/pegawai/delete/') ?>"+id;		
		} else {
		    return false
		}

     }
</script>