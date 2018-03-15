<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">EDIT MATTERS</h3>
			</div>
			<div class="row">
				<div class="col-md-7">
					<div class="box box-primary">
					  <div class="box-header with-border">	
						<b>Informasi Proyek</b>
					  </div>
					  <form action="<?= base_url('matters/save'); ?>" method="post" accept-charset="utf-8">
			          <div class="box-body">
			            <table class="table table-bordered table-hover">
			            	<tr>
			            		<td style="width: 180px;">Pelanggan</td>
			            		<td>
			            			<select class="form-control select2" name="dt[pr_idpelanggan]">
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
			            			Sumber Modal
			            		</td>
			            		<td>
			            			<select class="form-control" name="dt[pr_sumber]">
			            				<?php 
			            					$modal = $this->mymodel->selectData('modal');
			            					foreach ($modal as $mdl) {
			            				?>
			            				<option value="<?= $mdl['id'] ?>" <?php if($mdl['id']==$matters['pr_sumber']){ echo "selected"; } ?>><?= $mdl['name'] ?></option>
			            				<?php } ?>
			            			</select>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Nominal Modal
			            		</td>
			            		<td>
			            			<input type="text" class="form-control rupiah" name="dt[pr_modal]"  value="<?= $matters['pr_modal'] ?>">
			            		</td>
			            	</tr>
			            </table>
			            <a href="<?= base_url('matters/detail') ?>">
				        <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-save"></i> SIMPAN PROYEK</button>
				    	</a>
			          </div>
					  </form>	
			          <!-- end body -->
			          
			         
			        </div>
			        <!-- end of box -->


				</div>
	           	<form id="upload" action="<?= base_url("matters/savedocument") ?>" enctype="multipart/form-data">
				<!-- end col -->
				<div class="col-xs-5">
					<div class="box box-primary">
					   <div class="box-header with-border">	
						<b>Document</b>
					  </div>
					  <div class="box-body">
					  	<div class="show_error"></div>
			         
							<?php 
			            	$file = $this->mymodel->selectWhere('file',array('table'=>'proyek','table_id'=>$matters['pr_id']));
			            		$a = array();
			            		foreach ($file as $fl) {
			            			$date = strtotime($fl['created_at']);
			            			$date = date('Y-m-d');
			            			$a[] = $date;
			            		}

			            		$d = array_unique($a);
			            		foreach ($d as $dt) {
				            		$files = $this->mymodel->selectWhere('file',array('date(created_at)'=>$dt,'table'=>'proyek','table_id'=>$matters['pr_id']));
				            		$json[] = array(			            				
				            						'desc'=>$files[0]['desc'],
				            						'file'=>$files
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
			            			<a href="#">Download - Engagement Letter (ZIP)</a><br>
			            			<b>Description :</b><br>
			            			<?= $rec['desc'] ?> <br>
			            			<?php 
			            				$j = 1;
			            				foreach ($rec['file'] as $val) {
			            			?>
			            			<div><?= $j ?>. Created by Super Admin <a href="<?= base_url($val['dir']) ?>"><?= $val['name'] ?></a></div>
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
			    </div>
				</form>
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
                if (str.indexOf("Success Send Data") != -1){
                    form.find(".show_error").hide().html(response).slideDown("fast");
                    $("#send-btn").removeClass("disabled").html('<i class="fa fa-save"></i> SAVE and ADD PROCEDURES').attr('disabled',false);
                   
                     $('#upload')[0].reset();
            
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
</script>