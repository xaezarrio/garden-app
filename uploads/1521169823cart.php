<?php 
	if ($this->cart->total_items()>0) {
	$i = 1;
	$total = 0;
	$cart = $this->cart->contents();
	foreach ($cart as $items) {

	$sap = $this->mymodel->selectdataOne('site',array('id'=>$items['options']['id_sap']));
	$physical = $this->mymodel->selectdataOne('site',array('id'=>$items['options']['id_physical']));
	$category = $this->mymodel->selectdataOne('category_heavy',array('id'=>$items['options']['id_category']));
	$subcategory = $this->mymodel->selectdataOne('category_subppe',array('id_subppe'=>$items['options']['id_subcategory']));
?>
<tr>
	<td><?=$i;?></td>
	<td><?=@$sap['code']?> - <?=@$sap['name']?></td>
	<td><?=@$physical['code']?> - <?=@$physical['name']?></td>
	<td><?=@$category['name']?></td>
	<td><?=@$subcategory['sp_name']?></td>
	<td><?=@$items['options']['assetnumber']?></td> 
	<td><?=@$items['options']['assetdescription']?></td>
	<td><?=@$items['options']['remark']?></td>
	<td>
	  	<a style="color:green" onclick="setEdit('<?= $items['rowid'] ?>','<?=$items['options']['barcode']?>')" style="cursor: pointer;"><i class="fa fa-pencil"></i></a>|
	  	<a style="color:red" onclick="del('<?= $items['rowid'] ?>')" style="cursor: pointer;"><i class="fa fa-remove"></i></a>
	</td>
</tr>
<?php 
	$i++; 
	$total += @$items['qty'];
	} 
	}
?>
<tr style="background: #ddd;font-weight: bold;font-size: 16px;">
  <td colspan="8">Total Asset Process</td>
  <td class="text-right"><?=@$total;?></td>
</tr>