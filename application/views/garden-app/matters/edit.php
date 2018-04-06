<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">EDIT MATTERS</h3>
			</div>
			<div class="row">
				<div class="col-md-7">
					  <form action="<?= base_url('matters/save_edit'); ?>" method="post" accept-charset="utf-8">

					<div class="box box-primary">
					  <div class="box-header with-border">	
						<b>Informasi Proyek</b>
					  </div>
					  	<input type="hidden" name="id" value="<?= $matters['pr_id'] ?>">
			          <div class="box-body">
			            <table class="table table-bordered table-hover">
			            	<tr>
			            		<td style="width: 180px;">Perusahaan</td>
			            		<td>
			            			<select class="form-control select2" name="dt[pr_idperusahaan]">
			            				<option value=""> Choose Perusahaan .. </option>
			            				<?php foreach ($perusahaan->result() as $pr): ?>
			            					<option value="<?= $pr->id ?>" <?php if($matters['pr_idperusahaan']==$pr->id){ echo "selected"; } ?>><?= $pr->name ?></option>
			            				<?php endforeach ?>
			            			</select>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td style="width: 180px;">Pelanggan</td>
			            		<td>
			            			<select class="form-control select2" name="dt[pr_idpelanggan]">
			            				<option value=""> Choose Pelangan .. </option>

			            				<?php foreach ($pelanggan->result() as $p): ?>
			            					<option value="<?= $p->p_id ?>" <?php if($matters['pr_idpelanggan']==$p->p_id){ echo "selected"; } ?>><?= $p->p_nama_perusahaan ?> / <?= $p->p_alamat ?></option>
			            				<?php endforeach ?>
			            			</select>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Nomor SPK
			            		</td>
			            		<td>
			            			<input type="text" name="dt[pr_spk]" class="form-control" value="<?= $matters['pr_spk'] ?>">
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Nama Proyek
			            		</td>
			            		<td>
			            			<input type="text" name="dt[pr_nama]" class="form-control" value="<?= $matters['pr_nama'] ?>" >
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Cost Center (Area)
			            		</td>
			            		<td>
			            			<select class="form-control select2" name="dt[pr_idcost]">
			            				<?php foreach ($cost->result() as $c): ?>
			            					<option value="<?= $c->id ?>" <?php if($matters['pr_idcost']==$c->id){ echo "selected"; } ?>><?= $c->name ?></option>
			            				<?php endforeach ?>
			            			</select>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Tanggal Mulai
			            		</td>
			            		<td>
			            			<input type="text" name="dt[pr_tgl_mulai]" class="form-control tgl"  value="<?= $matters['pr_tgl_mulai'] ?>">
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Tanggal Selesai
			            		</td>
			            		<td>
			            			<input type="text" name="dt[pr_tgl_selesai]" class="form-control tgl"  value="<?= $matters['pr_tgl_selesai'] ?>">
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Keterangan
			            		</td>
			            		<td>
			            			<input type="text" name="dt[pr_keterangan]" class="form-control"  value="<?= $matters['pr_keterangan'] ?>">
			            		</td>
			            	</tr>
			            	<tr>
			            		<td colspan="2" style="background: #ddd">
			            			Finansial Proyek
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Nilai Kontrak
			            		</td>
			            		<td>
			            			<input type="text" name="dt[pr_nilai_kontrak]" class="form-control rupiah"  value="<?= $matters['pr_nilai_kontrak'] ?>">
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Pajak
			            		</td>
			            		<td>
			            			<select class="form-control" name="dt[pr_pajak]">
			            				<option value="">- </option>
			            				<?php 
			            					$pajak = $this->mymodel->selectData('pajak');
			            					foreach ($pajak as $pjk) {
			            				?>
			            				<option value="<?= $pjk['id'] ?>" <?php if($pjk['id']==$matters['pr_pajak']){ echo "selected"; } ?>><?= $pjk['name'] ?></option>
			            				<?php } ?>
			            			</select>
			            			<select class="form-control" name="dt[pr_pajak2]">
			            				<option value="">-</option>
			            				<?php 
			            					foreach ($pajak as $pjk) {
			            				?>
			            				<option value="<?= $pjk['id'] ?>" <?php if($pjk['id']==$matters['pr_pajak2']){ echo "selected"; } ?>><?= $pjk['name'] ?></option>
			            				<?php } ?>
			            			</select>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Status
			            		</td>
			            		<td>
			            			<select class="form-control" name="dt[pr_status]">
			            			
			            				<option value="open" <?php if($matters['pr_status']=="open"){ echo "selected"; } ?>>OPEN</option>
			            				<option value="retensi" <?php if($matters['pr_status']=="retensi"){ echo "selected"; } ?>>RETENSI</option>

			            				<option value="close" <?php if($matters['pr_status']=="close"){ echo "selected"; } ?>>CLOSE</option>
			            				
			            			</select>
			            			<small class="text-danger">* ubah status menjadi retensi / close akan menghapus relasi pengeluaran pegawai di proyek</small>
			            		</td>
			            	</tr>

			            </table>
			            <br>
		            	
		            	
			          </div>
			          
				     
			          <!-- end body -->
			          
			         
			        </div>
			        <div class="box box-primary">
			          	<div class="box-header">
			          		
			          	</div>
			          	<div class="box-body">
			          		<table class="table table-condensed">
					  		<thead>
						  		<tr>
						  			<th>Sumber</th>

						  			<th>Nominal</th>
						  			<th>Bunga</th>

						  			<th></th>
						  		</tr>	
					  		</thead>
					  		<tbody id="sumber-modal">
					  			<?php 
					  				$sumber = json_decode($matters['pr_sumber']);
					  				$nominal = json_decode($matters['pr_modal']);
					  				$bunga = json_decode($matters['pr_bunga']);

					  				$i=0;
					  				foreach ($sumber as $sm) {

					  			?>

								<tr id="mdl<?= $i ?>">
					  				<td>
					  					<select class="form-control" name="modal[]">
					  						<option value="">Choose Modal</option>
					  						<?php 
					  						$modal = $this->mymodel->selectData('modal');
					  						foreach ($modal as $mood) {
					  						?>
					  						<option value="<?= $mood['id'] ?>" <?php if($sm==$mood['id']){ echo "selected";} ?>><?= $mood['name'] ?></option>
					  						<?php } ?>
					  					</select>
					  				</td>
					  				
					  				<td>
					  					<input type="text" name="nominal[]" class="form-control rupiah text-right nominal"  value="<?= number_format($nominal[$i]) ?>"  onchange="hitung()">
					  				</td>
					  				<td>
					  					<?php 
						  					if($bunga[$i]==""){
						  						$bunga[$i] = 0;
						  					}
					  					?>
					  					<input type="text" name="bunga[]" class="form-control rupiah text-right nominal"  value="<?= number_format(@$bunga[$i]) ?>" onchange="hitung()">
					  				</td>
					  				<td>
					  					<a class="btn btn-success btn-danger" onclick="removemodal(<?= $i ?>)" ><i class="fa fa-remove"></i></a>
					  				</td>
					  			</tr>
					  			<?php
					  				$i++;}
					  			?>
					  			<tr>
					  				<td>
					  					<select class="form-control" name="modal[]">
					  						<option value="">Choose Modal</option>
					  						<?php 
					  						$modal = $this->mymodel->selectData('modal');
					  						foreach ($modal as $mood) {
					  						?>
					  						<option value="<?= $mood['id'] ?>"><?= $mood['name'] ?></option>
					  						<?php } ?>
					  					</select>
					  				</td>
					  				<td>
					  					<input type="text" name="nominal[]" class="form-control rupiah text-right nominal"  onchange="hitung()">
					  				</td>
					  				<td>
					  					<input type="text" name="bunga[]" class="form-control rupiah text-right nominal"  onchange="hitung()">
					  				</td>
					  				
					  				<td>
					  					<a class="btn btn-success btn-flat" onclick="addsumber(<?= count($sumber) ?>)" id="plus-modal"><i class="fa fa-plus"></i></a>
					  				</td>
					  			</tr>
					  		</tbody>
					  		<tfoot>
					  			<tr>
					  				<th >Total</th>
					  				<th></th>

					  				<th class="text-right" id="total-modal">0</th>
					  				<th></th>

					  			</tr>
					  		</tfoot>
					  		
					  	</table>
			          	</div>

			          </div>
			             <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-save"></i> SIMPAN PROYEK</button>

					  </form>	
			        <!-- end of box -->


				</div>
				<!-- end col -->
				<div class="col-xs-5">



	           		<form id="upload" action="<?= base_url("matters/savedocument") ?>" enctype="multipart/form-data">

					<div class="box box-primary">
					   <div class="box-header with-border">	
						<b>Document</b>
					  </div>
					  
					  <div class="box-body">
					  	<div class="show_error"></div>
			         
							<?php 
			            		$file = $this->mymodel->selectWhere('file',array('table'=>'proyek','table_id'=>$matters['pr_id']));
			            		$a = array();
			            		$json = array();

			            		foreach ($file as $fl) {
			            			$date = strtotime($fl['created_at']);
			            			$date = date('Y-m-d H:i:s',$date);
			            			$a[] = $date;
			            		}

			            		$d = array_unique($a);
			            		foreach ($d as $dt) {
				            		$files = $this->mymodel->selectWhere('file',array('created_at'=>$dt,'table'=>'proyek','table_id'=>$matters['pr_id']));
				            	
				            		$json[] = array(			            				
				            						'desc'=>@$files[0]['desc'],
				            						'file'=>$files,
				            						// 'user'=>$files['user_id']
				            					);
			            		}



			            	?>
			            <table class="table table-bordered table-hover table-striped">
			            	<tr>
			            		<td colspan="2">
			            			<input type="hidden" name="id" value="<?= $matters['pr_id'] ?>">
			            			<textarea class="form-control" name="desc" rows="3" placeholder="Description ...."></textarea>
			            			<input type="file" name="gambar[]" class="form-control" multiple="" required="">
			            		</td>
			            	</tr>
			            	<tr style="background: #ddd">
			            		<td>
			            			No
			            		</td>
			            		<td>
			            			Document
			            		</td>
			            	</tr>
			            	<?php 
			            		$i = 1;
			            		foreach ($json as $rec) {
			 	
			            	?>
			            	<tr>
			            		<td>
			            			<?= $i ?>
			            		</td>
			            		<td>
			            			<!-- <a href="#">Download - Engagement Letter (ZIP)</a><br> -->
			            			<b>Description :</b><br>
			            			<?= $rec['desc'] ?> <br>
			            			<?php 
			            				$j = 1;
			            				foreach ($rec['file'] as $val) {
			            					$user = $this->mymodel->selectdataOne('user',array('id'=>$val['user_id']));
			            				
			            			?>
			            			<div><?= $j ?>. Created by <?= $user['name'] ?> <a href="<?= base_url($val['dir']) ?>" target="_blank"><?= $val['name'] ?></a></div>
			            			<?php $j++;} ?>
			            		</td>
			            	</tr>
			            	<?php $i++;} ?>
			            </table>
			          </div>
			          <!-- END OF BODY -->
			        </div>  
			        <a href="<?= base_url('matters/detail') ?>">
			        <button class="btn btn-primary btn-block btn-flat" id="send-btn"><i class="fa fa-save"></i> SAVE and ADD PROCEDURES</button>
			    	</a>
				</form>

			    </div>
				<!-- end col -->
			</div>
			<!-- end row -->
		</div>

	</section><!-- /.content -->
	
</div><!-- /.content-wrapper -->
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

  $("#upload").submit(function(){
        var mydata = new FormData(this);
        var form = $(this);
        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: mydata,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend : function(){
                $("#send-btn").addClass("disabled").html("<i class='fa fa-spinner fa-spin'></i>  Processing...").attr('disabled',true);
                form.find(".show_error").slideUp().html("");

            },
            success: function(response, textStatus, xhr) {
                // alert(mydata);
               var str = response;
                if (str.indexOf("Success") != -1){
                    form.find(".show_error").hide().html(response).slideDown("fast");
                    $("#send-btn").removeClass("disabled").html('<i class="fa fa-save"></i> SAVE and ADD PROCEDURES').attr('disabled',false);
                   
                     // $('#upload')[0].reset();
                     setTimeout(function () {
                     	// body...
	                     window.location.href="<?= base_url('matters/edit/'.$matters['pr_id']) ?>";

                     },500);
            
                }else{
                    form.find(".show_error").hide().html(response).slideDown("fast");
                    $("#send-btn").removeClass("disabled").html('<i class="fa fa-save"></i> SAVE and ADD PROCEDURES').attr('disabled',false);
                }
            },
            error: function(xhr, textStatus, errorThrown) {
            console.log(xhr);
            }
        });
        return false;
        });


  function addsumber(no) {
  	var ids = no+1;
  	var html = '<tr id="mdl'+ids+'">'+
	  			'	<td>'+
	  			'		<select class="form-control" name="modal[]">'+
	  			'			<option value="">Choose Modal</option>'+
	  						<?php 
	  						$modal = $this->mymodel->selectData('modal');
	  						foreach ($modal as $mood) {
	  						?>
	  			'			<option value="<?= $mood['id'] ?>"><?= $mood['name'] ?></option>'+
	  						<?php } ?>
	  			'		</select>'+
	  			'	</td>'+
	  			'	<td>'+
	  			'		<input type="text" name="nominal[]" class="form-control rupiah text-right nominal" onchange="hitung()">'+
	  			'	</td>'+
	  			'	<td>'+
	  			'		<input type="text" name="bunga[]" class="form-control rupiah text-right nominal" onchange="hitung()">'+
	  			'	</td>'+
	  			'	<td>'+
	  			'		<a class="btn btn-danger btn-flat" onclick="removemodal('+ids+')"><i class="fa fa-remove"></i></a>'+
	  			'	</td>'+
	  			'</tr>';
	 $("#sumber-modal").prepend(html);
	 $(".rupiah").maskMoney({thousands:',', allowZero:false , precision:0});

	 $("#plus-modal").attr('onclick','addsumber('+ids+')');

   	




  }

  function removemodal(id) {
  	$("#mdl"+id).remove();
  }

	function convertToAngka(rupiah){
		return parseInt(rupiah.replace(/,,*|[^0-9]/g, ''), 10);
	}

  function hitung() {
  	// body...
	  	var sum = 0;
	    $('.nominal').each(function(){
	        var nom = convertToAngka(this.value);

	        if(isNaN(nom)){
	          nom = 0;
	        }
	        sum += parseFloat(nom);
	    });
	    $("#total-modal").html(convertToRupiah(sum));
  }
  hitung()
</script>