			            <table class="table table-condensed table-hover table-bordered">
			              <thead>
			                <tr>
			                  <th style="width:100px;">No</th>
			                  <th>Aktivitas</th>
			                  <th>Kategori</th>

			                  <th style="width:150px;">Edit/Delete</th>
			                </tr>
			              </thead>
			              <tbody>
					          	<?php 
					          		$i=1;
					          		foreach ($data as $val) {  
					                $this->db->where(array('aktivitas.parent'=>$val['id'],"status"=>$tipe));
					                $sub = $this->mymodel->selectData('aktivitas');
					                $count = $this->mmodel->selectWhere('aktivitas',array('aktivitas.parent'=>$val['id']))->num_rows();


					            ?>
				                <tr style="background: #ddd">
				                  <td><?= $i ?></td>
				                  <td><?= $val['name'] ?></td>
				                  <td><?= $val['kategori'] ?></td>

				                  <td class="text-right">
					              	<button class="btn btn-xs btn-success" onclick="addmodal(<?= $val['id'] ?>)"><i class="fa fa-plus"></i> sub</button>
					              	<button class="btn btn-xs btn-primary" onclick="editmodal(<?= $val['id'] ?>)">edit</button>
					              	<?php if($count==0){ ?>
					                <a href="javascript::void(0)" class="btn btn-xs btn-danger" onclick="deleterka(<?= $val['id'] ?>)"  >delete</a>
					                <?php } ?>

				          
				                  </td>
				                </tr>
				                	<?php
					            		 foreach ($sub as $key) {
					                ?>
							    	 	<tr>
							              <td style="padding-left:30px !important;" class="sub_rka"></td>
							              <td><?= $key['name'] ?></td>
							              <td><?= $key['kategori'] ?></td>
							              <td class="text-right">
							              	<button class="btn btn-xs btn-primary"  onclick="editmodal(<?= $key['id'] ?>)" >edit</button>
							              	<?php  if ($key['id']!="88" && $key['id']!="78" && $key['id']!="67"): ?>
							              		<?php if ($tipe==1): ?>
							              		<a href="javascript::void(0)" class="btn btn-xs btn-danger" onclick="deleterka(<?= $key['id'] ?>,0)"  >disable</a>	
							              		<?php else: ?>
							              		<a href="javascript::void(0)" class="btn btn-xs btn-warning" onclick="deleterka(<?= $key['id'] ?>,1)"  >enable</a>
							              		<?php endif ?>
							              	<?php endif ?>
							              </td>
							            </tr>
					       			<?php } ?>
			                <?php $i++;} ?>
			              </tbody>
			            </table>