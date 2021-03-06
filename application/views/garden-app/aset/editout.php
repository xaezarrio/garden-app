<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">
				EDIT TRANSAKSI KELUAR - ASET
				</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
					  <div class="box-header with-border">	
						<form id="upload" action="<?= base_url("aset/transaksi/out/edit/action/").$trans['id'] ?>" method="POST">
							<div class="show_error"></div>
						<table class="table table-bordered table-hover table-aset" style="width:50%">
			            	<tr>
			            		<td>
			            			Tanggal
			            		</td>
			            		<td>
			            			<input type="text" name="tt[date]" class="form-control tgl" id="date" value="<?=$trans['date']?>" required>
			  
			            		</td>
			            	</tr>
			            	
			            	<tr>
			            		<td>
			            			Proyek
			            		</td>
			            		<td>
			            			<select class="form-control" id="" name="tt[proyek_id]" id="proyek" onchange="loaddata();" required>
			            				<option value="">--Pilih Proyek--</option>
					    				<?php 
					    					$proyek = $this->mymodel->selectData('proyek');
					    					foreach ($proyek as $pr) {
					    				?>
					    					<option value="<?= $pr['pr_id'] ?>" <?=($pr['pr_id']==$trans['proyek_id'])?'selected':'';?>><?= $pr['pr_spk'] ?> - <?= $pr['pr_nama'] ?></option>
					    				<?php } ?>
					    			</select>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Karyawan
			            		</td>
			            		<td>
			            			<select class="form-control" name="tt[karyawan_id]" required>
			            				<option value="">--Pilih Karyawan--</option>
					    				<?php 
					    					$karyawan = $this->mymodel->selectData('karyawan');
					    					foreach ($karyawan as $kr) {
					    				?>
					    					<option value="<?= $kr['id'] ?>" <?=($kr['id']==$trans['karyawan_id'])?'selected':'';?>><?= $kr['name'] ?></option>
					    				<?php } ?>
					    			</select>
			            		</td>
			            	</tr>
			            	<?php $i=1; foreach ($trans_detail as $tr): ?>
			            		<tr id="box-aset">
				            		<td>
				            			Asset
				            		</td>
				            		<td>
				            			<select class="form-control" style="margin-right:5px;width: 200px;float: left;" name="td[aset_id][]" required>
						    				<?php 
						    					$satuan = $this->mymodel->selectData('aset');
						    					foreach ($satuan as $st) {
						    				?>
						    					<option value="<?= $st['id'] ?>" <?=($st['id']==$tr['aset_id'])?'selected':'';?>><?= $st['name'] ?></option>
						    				<?php } ?>
						    			</select>
				            			<input type="number" name="td[qty][]" placeholder="Qty" class="form-control" style="margin-right:5px;width: 100px;float: left;" value="<?=$tr['qty']?>" required>
				            			<?php if ($i>1) { ?>
				            			<button type="button" class="btn btn-danger btn-flat" style="display: inline;float: left;" id="del-aset"><i class="fa fa-minus"></i></button>
				            			<?php } else { ?>
				            			<button type="button" class="btn btn-primary btn-flat" style="display: inline;float: left;" id="add-aset"><i class="fa fa-plus"></i></button>
				            			<?php } ?>
				            		</td>
				            	</tr>
			            	<?php $i++; endforeach ?>
			            	<tr>
			            		<td>
			            			Deskripsi
			            		</td>
			            		<td>
			            			<textarea class="form-control" name="tt[desc]" required><?=$trans['desc']?></textarea>
			            		</td>
			            	</tr>
			            </table>
            			<button type="submit" class="btn btn-primary btn-flat" id="send-btn">Save</button>
            			</form>
					  </div>
					  <div class="box-body table-responsive">
					  		<div id='loadingDiv'> 
				              <center>
				                <img src='https://www.quodfinancial.com/wp-content/themes/pro-child/QUOD-Diagram/loading_spinner.gif' style='width:75px;' /><br>
				                Please wait...
				              </center>  
				           </div> 
				          <div class="table-responsive" id="table">
				           
				          </div>

			          </div>
			          <!-- END OF BODY -->
			        </div> 
			        <!-- end of box  -->

				</div>
				<!-- end col -->
			</div>
			<!-- end row -->
		</div>

	</section><!-- /.content -->
	
</div><!-- /.content-wrapper -->

<?php 

?>

<script type="text/javascript">
  function loaddata() {
    var date = $("#date").val();
    var proyek = $("select[name='tt[proyek_id]']").val();
    $("#table").load("<?= base_url('aset/transaksi/out/add/detail') ?>?date="+date+"&proyek="+proyek);
  }
  loaddata();

    $('#loadingDiv').hide().ajaxStart( function() {
    $(this).show();  // show Loading Div
  } ).ajaxStop ( function(){
    $(this).hide(); // hide loading div
  });


    $("#date").datepicker({
      dateFormat: "yy-mm-dd",
        onSelect: function (date) {
          loaddata();

        }
    });

	$('#add-aset').click(function() {
	  $('#box-aset:last').after('\
	  	<tr id="box-aset">\
    		<td>\
    			Asset\
    		</td>\
    		<td>\
    			<select class="form-control" style="margin-right:5px;width: 200px;float: left;" name="td[aset_id][]" required>\
    				<?php 
    					$satuan = $this->mymodel->selectData('aset');
    					foreach ($satuan as $st) {
    				?>\
    					<option value="<?= $st['id'] ?>"><?= $st['name'] ?></option>\
    				<?php } ?>\
    			</select>\
    			<input type="number" name="td[qty][]" placeholder="Qty" class="form-control" style="margin-right:5px;width: 100px;float: left;" required>\
    			<button type="button" class="btn btn-danger btn-flat" style="display: inline;float: left;" id="del-aset"><i class="fa fa-minus"></i></button>\
    		</td>\
    	</tr>');
	});

	$('.table-aset').on('click','#del-aset',function() {
		if (confirm('Anda ingin menghapus baris ?')) {
			$(this).parent().parent().remove();
		} else {
			return false;
		}
	});

</script>
