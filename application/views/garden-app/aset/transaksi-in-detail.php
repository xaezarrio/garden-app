<?php 
$id = $_GET['id'];
$data = $this->mymodel->selectWhere('aset_transaksi_detail',array('transaksi_id'=>$id));
$rec = $this->mymodel->selectdataOne('aset_transaksi',array('id'=>$id));
$proyek = $this->mymodel->selectdataOne('proyek',array('pr_id'=>$rec['proyek_id']));
$karyawan = $this->mymodel->selectdataOne('karyawan',array('id'=>$rec['karyawan_id']));

 ?>
<button class="btn btn-flat btn-danger" onclick="printContent('prints')"><i class="fa fa-print"></i> Print Surat Jalan</button>

<div id="prints">
<h4 class="text-center"><b>Surat Jalan</b></h4>
<div class="">
Proyek : <?= $proyek['pr_nama'] ?> <br>
Karyawan : <?= $karyawan['name'] ?>
<span class="pull-right">Tanggal : <?= $rec['date'] ?></span><br>
</div>
<table class="table table-bordered table-striped">

	<thead>
		<tr>
			<th style="width: 30px;">No</th>
			<th>Kode</th>
			<th>Name</th>
			<th>Qty</th>
			<th>Keterangan</th>

		</tr>
	</thead>
	<tbody>
		<?php 
		$i =1;

	
		foreach ($data as $record) {
		$aset = $this->mymodel->selectdataOne('aset',array('id'=>$record['aset_id']));
		 
		 ?>
		 <tr>
		 	<td><?= $i ?></td>
		 	<td><?= $aset['kode'] ?></td>
		 	<td><?= $aset['name'] ?></td>
		 	<td><?= $record['qty'] ?></td>
		 	<td></td>


		 </tr>
		<?php $i++;} ?>
	</tbody>
	<tfoot>
		<?php 
		
		?>

	</tfoot>
</table>
<p>Notes :<?= $rec['desc'] ?> </p>

<div class="text-center">
	<p>Mengetahui</p>
	<br>
	<br>
	<br>
	<br>
	...............................
</div>
</div>


<script type="text/javascript">
	function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;

}

</script>