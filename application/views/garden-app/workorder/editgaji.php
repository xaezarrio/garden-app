<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">
				TAMBAH PENGELUARAN PEGAWAI
				- (<?= date('M-y') ?>)
				</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
					  <div class="box-header with-border">	
					<form id="upload" action="<?= base_url("workorder/list-timesheets/pegawai/update/action") ?>">
						<input type="hidden" name="ids" value="<?= $data['id'] ?>">
						<div class="show_error"></div>
						<table class="table table-bordered table-hover" style="width:50%">
			            	<tr>
			            		<td>
			            			Tanggal
			            		</td>
			            		<td>
			            			<input type="text" name="dt[date]" class="form-control tgl" id="date" value="<?= $data['date'] ?>">
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Pegawai
			            		</td>
			            		<td>
			            			<select class="form-control" id="karyawan" onchange="loaddata()" name="dt[karyawan_id]" disabled="">
					    				<option value="">Pilih Pegawai</option>
					    				<?php 
					    					$pegawai = $this->mymodel->selectData('karyawan');
					    					foreach ($pegawai as $peg) {
					    				?>
					    					<option value="<?= $peg['id'] ?>" <?php if($data['karyawan_id']==$peg['id']){ echo "selected=''"; } ?>><?= $peg['name'] ?></option>
					    				<?php } ?>
					    			</select>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Sub Aktivitas
			            		</td>
			            		<td>
			            			<select class="form-control" name="dt[aktivitas_sub]">
					    				<?php 
					    					$parent = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Pegawai'));
					    					$sub = $this->mymodel->selectWhere('aktivitas',array('parent'=>$parent['id']));
					    					foreach ($sub as $s) {
					    				?>
					    					<option value="<?= $s['id'] ?>" <?php if($data['aktivitas_sub']==$s['id']){ echo "selected=''"; } ?>><?= $s['name'] ?></option>
					    				<?php } ?>
					    			</select>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Nominal (Rp) 
			            		</td>
			            		<td>
			            			<input type="text" class="form-control rupiah" name="dt[nominal]" value="<?= number_format($data['nominal']) ?>">
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Keterangan
			            		</td>
			            		<td>
			            			<textarea class="form-control" name="dt[keterangan]"><?= $data['keterangan'] ?></textarea>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			File
			            		</td>
			            		<td>
			            			<input name="file" type="file" class="form-control" />
			            		</td>
			            	</tr>
			            </table>
            			<button type="submit" class="btn btn-primary btn-flat" id="send-btn"><i class="fa fa-save"></i> Save</button>
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
<script type="text/javascript">
	  function loaddata() {
    // body...
    var id = $("#karyawan").val();
    var date = $("#date").val();

    $("#table").load("<?= base_url('workorder/list-timesheets/pegawai/detail/') ?>"+id+"?date="+date);


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
                    setTimeout(function(){ 
                        document.getElementById('upload').reset();
                        window.location.href="<?= base_url("workorder/list-timesheets/pegawai") ?>";
                    }, 1000);
                    $("#send-btn").removeClass("disabled").html("Tambahkan").attr('disabled',false);;

            
                }else{
                    form.find(".show_error").hide().html(response).slideDown("fast");
                    $("#send-btn").removeClass("disabled").html("Tambahkan").attr('disabled',false);;
                    
                    
                }
            },
            error: function(xhr, textStatus, errorThrown) {
        		console.log(xhr);
            }
        });
        return false;
        });

</script>