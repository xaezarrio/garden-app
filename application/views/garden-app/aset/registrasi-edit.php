<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">Edit Aset</h3>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="box box-primary">
					  <div class="box-header with-border">	
						<b>Data Aset</b>
					  </div>	
					  <form id="upload" action="<?= base_url("aset/registrasi/action") ?>">
			          <div class="box-body">
			          	<div class="show_error"></div>
			            <table class="table table-bordered table-hover">
			            	<tr>
			            		<td style="width: 140px;">
			            			Kode
			            		</td>
			            		<td>
			            			<input type="text" name="dt[kode]" class="form-control" style="width: 300px" value="<?= $aset['kode'] ?>"> 
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Nama
			            		</td>
			            		<td>
			            			<input type="text" name="dt[name]" class="form-control" style="width: 400px" value="<?= $aset['name'] ?>">
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Stok
			            		</td>
			            		<td>
			            			<input type="number" name="stock" class="form-control" style="width: 200px" value="<?= $aset['stock'] ?>">
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Harga
			            		</td>
			            		<td>
			            			<input type="text" name="dt[price]" class="form-control rupiah" style="width: 200px" value="<?= number_format($aset['price']) ?>">
			            		</td>
			            	</tr>
			            </table>
			          </div>
			          <!-- end body -->
			          <div class="box-footer ">
			          	 <button type="submit" class="btn btn-info pull-right" id="send-btn"> <i class="fa fa-save"></i> Update Registrasi</button>
			          </div>
			          </form>

			        </div>
			        <!-- end of box -->


				</div>
				<div class="col-md-4">
					<div class="box box-primary">
					  <div class="box-header with-border">	
						<b>History Registrasi</b>
					  </div>	
			          <div class="box-body">
			          	<table class="table table-hover">
			          		<thead>
			          			<tr>
			          				<th>No</th>
			          				<th>Date</th>
			          				<th>Stock</th>
			          				<th>Price</th>
			          				<th>Oleh</th>
			          			</tr>
			          		</thead>
			          		<tbody>
			          			<?php
			          			$i=1; 
			          			foreach ($detail as $det) {
			          			?>
			          			<tr>
			          				<td><?= $i ?></td>
			          				<td><?= $det['date'] ?></td>
			          				<td><?= $det['stock'] ?></td>
			          				<td><?= number_format($det['price']) ?></td>
			          				<td>Admin</td>
			          			</tr>
			          			<?php $i++; } ?>
			          		</tbody>
			          	</table>
			          </div>
			         </div>		
				</div>
				<!-- end col -->
			</div>
			<!-- end row -->
		</div>

	</section><!-- /.content -->
	
</div><!-- /.content-wrapper -->


<script type="text/javascript">
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
                if (str.indexOf("Success Input Data") != -1 || str.indexOf("Success Update Data") != -1){
                    form.find(".show_error").hide().html(response).slideDown("fast");
                    $("#send-btn").removeClass("disabled").html('<i class="fa fa-save"></i> Update Registrasi').attr('disabled',false);
                    window.location.href = '<?= base_url('aset') ?>';
            
                }else{
                    form.find(".show_error").hide().html(response).slideDown("fast");
                    $("#send-btn").removeClass("disabled").html('<i class="fa fa-save"></i> Update Registrasi').attr('disabled',false);
                }
            },
            error: function(xhr, textStatus, errorThrown) {
            console.log(xhr);
            }
        });
        return false;
        });

  </script>