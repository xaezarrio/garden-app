<?php 
$date = $_GET['date'];
$a = strtotime($date);
$tgl = date('Y-m-d',$a);
$bulan = date('M',$a);
$tahun = date('Y',$a);
$mn = date('m',$a);
// $mns = date('m',$a)-1;

$sql = 'SELECT sum(nominal) as saldo FROM pengeluaran, aktivitas WHERE aktivitas_sub = aktivitas.id AND pengeluaran.kategori = "Kantor" AND aktivitas.kategori="Masuk" AND YEAR(date) = "'.$tahun.'" AND MONTH(date) <"'.$mn.'"';
$pemasukan = $this->db->query($sql)->row()->saldo;

$sqls = 'SELECT sum(nominal) as saldo FROM pengeluaran, aktivitas WHERE aktivitas_sub = aktivitas.id AND pengeluaran.kategori = "Kantor" AND aktivitas.kategori="Keluar" AND YEAR(date) = "'.$tahun.'" AND MONTH(date) <"'.$mn.'"';
$pengeluaran = $this->db->query($sqls)->row()->saldo;

$saldo = $pemasukan-$pengeluaran;
?>
<table class="table table-bordered table-striped">
	<caption class="text-center"><h4><?= $bulan." ".$tahun ?></h4></caption>

	<thead>
		<tr>
		<th style="width: 30px;">No</th>
		<th>Tanggal</th>
		<th>Di Gunakan</th>
		<th>Sub Aktivitas</th>
		<th>Item</th>
		<th>Qty</th>
		<th>Keterangan</th>
		<th>Download</th>
		<th>Masuk</th>
		<th>Keluar</th>

		<th></th>
		</tr>
		<tr style="background: #ddd">
			<th colspan="8">Saldo Awal</th>
			<th class="text-right"><?= number_format($saldo)  ?></th>
			<th></th>
			<th></th>

		</tr>
	</thead>
	<tbody>
		<?php 
		$mm =array();
		$mm[] = $saldo;
		$kl =array();
		$total = array();
		$i =1;
		$this->db->order_by('date ASC');
		$data = $this->mymodel->selectWhere('pengeluaran',array('kategori'=>'Kantor','YEAR(date)'=>$tahun,'MONTH(date)'=>$mn));
		foreach ($data as $rec) {
		$sub = $this->mymodel->selectdataOne('aktivitas',array('id'=>$rec['aktivitas_sub']));
		if($sub['kategori']=="Masuk"){
		$masuk = $rec['nominal'];
		$keluar = 0;	
		}else if($sub['kategori']=="Keluar"){
		$masuk = 0;
		$keluar = $rec['nominal'];	
		$total[] = $rec['nominal']; 
		}else{
			$masuk = 0;
			$keluar = 0;
		}

		$mm[] = $masuk;
		$kl[] = $keluar;
		// if ($sub['kategori']=="Keluar") {
		if($rec['proyek_id']==0){
			$digunakan = "Kantor";
		}else{
			$pro = $this->mymodel->selectdataOne('proyek',array('pr_id'=>$rec['proyek_id']));
			$digunakan = $pro['pr_nama'];
		}
		?>
		<tr>
			<td><?=$i ?></td>
			<td><?= $rec['date'] ?></td>
			<td><?= $digunakan ?></td>
			<td><?=$sub['name'] ?></td>
			<td><?= $rec['item'] ?></td>
			<td><?= $rec['qty'] ?></td>
			<td><?= $rec['keterangan'] ?></td>
			<td class="text-right">
				<a href="<?= base_url('uploads/'.$rec['file']) ?>" target="_blank"><i class="fa fa-download"></i> Download</a>
			</td>
			<td class="text-right"><?= number_format($masuk) ?></td>
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

		<?php $i++; //}
			} ?>
	
	</tbody>
	<tfoot>
		<?php 
		$totals =  array_sum($total);
		?>
		<tr>
			<th colspan="8">Total</th>
			<th class="text-right"><?= number_format(array_sum($mm)); ?></th>
			<th class="text-right"><?= number_format(array_sum($kl)); ?></th>
			<th></th>
		</tr>
		<tr style="background: #ddd;font-weight: bold;color:blue">
			<td colspan="9">Saldo</td>

			<td class="text-right">
				<?= number_format(array_sum($mm)-array_sum($kl)) ?>
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
