<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">
				TAMBAH PENGELUARAN PEGAWAI
				</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
					  <div class="box-header with-border">	
						<div class="row">
							<div class="col-xs-12">
								<table class="table table-bordered table-hover" style="width:100%">
					            	<tr>
					            		<td width="15%">
					            			Pegawai
					            		</td>
					            		<td>
					            			<select class="form-control" id="karyawan" onchange="loaddata()" name="" required style="width: 350px">
							    				<option value="">Pilih Pegawai</option>
							    				<?php 
							    					$pegawai = $this->mymodel->selectData('karyawan');
							    					foreach ($pegawai as $peg) {
							    				?>
							    					<option value="<?= $peg['id'] ?>" <?=($peg['id']==@$_GET['idp'])?'selected':'';?>><?= $peg['name'] ?></option>
							    				<?php } ?>
							    			</select>
					            		</td>
					            	</tr>
					            	<tr>
					            	
					            		<td width="15%">
					            			Tanggal
					            		</td>
					            		<td>
					            			<?php 

					            			$date = $this->input->get('date');
					            			if($date==""){
					            				$date = date('Y-m-d');
					            			}
					            			?>
					            			<input type="text"  class="form-control tgl" id="date" value="<?= $date ?>" required style="width: 250px">
					            		</td>
					            	</tr>
					            </table>
							</div>

						</div>

					  </div>
					 
			          <!-- END OF BODY -->
			        </div> 
			        <!-- end of box  -->

			        <!-- ------------------------------------- -->
				        <div class="row">
				        	<div class="col-xs-6">
								<div class="box box-primary">
									<div class="box-body">
									
									<form id="upload" action="<?= base_url("workorder/list-timesheets/pegawai/add/action") ?>"  enctype="multipart/form-data">
										<input type="hidden" name="dt[karyawan_id]" id="karyawan-input">
										<input type="hidden" name="dt[date]" id="date-input">

									<h4 class="text-bold">Pengeluaran</h4>
									<div class="show_error"></div>
									<table class="table table-bordered table-hover" style="width:100%">
						            	<tr>
						            		<td>Sub Aktivitas</td>
						            		<td>
						            			<select class="form-control" name="dt[aktivitas_sub]" required>
								    				<?php 
								    					$parent = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Pegawai'));
								    					$sub = $this->mymodel->selectWhere('aktivitas',array('parent'=>$parent['id']));
								    					foreach ($sub as $s) {
								    				?>
								    					<option value="<?= $s['id'] ?>"><?= $s['name'] ?></option>
								    				<?php } ?>
								    			</select>
						            		</td>
						            	</tr>
						            	<tr>
						            		<td>Nominal (Rp)</td>
						            		<td>
						            			<input type="text" class="form-control rupiah" name="dt[nominal]" required>
						            		</td>
						            	</tr>
						            	<tr>
						            		<td>Keterangan</td>
						            		<td>
						            			<textarea class="form-control" name="dt[keterangan]"></textarea>
						            		</td>
						            	</tr>
						            	<tr>
						            		<td>File</td>
						            		<td>
						            			<input name="file" type="file" class="form-control"  />
						            		</td>
						            	</tr>
						            </table>
			            			<button type="submit" class="btn btn-primary btn-flat" id="send-btn"><i class="fa fa-save"></i> Save</button>
									</form>
									</div>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="box box-primary">
									<div class="box-body">
										<h4 class="text-bold">Proyek</h4>
										<form id="uploads" action="<?= base_url("workorder/list-timesheets/pegawai/add/action_proyek") ?>"  enctype="multipart/form-data">
										<div class="show_errors"></div>
										<input type="hidden" name="dt[karyawan_id]" id="karyawan-inputs">
										<input type="hidden" name="dt[date]" id="date-inputs">
										<table class="table table-condensed">
											
											<tbody id="table-proyek">
												<tr>
													<td id="a1">
														<select class="form-control" name="dt[proyek_id]">
															<option value="">-Pilih Proyek-</option>
															<?php 
															$proyek = $this->mymodel->selectWhere('proyek',array('pr_status'=>'open'));
															foreach ($proyek as $pro) {
															?>
															<option value="<?= $pro['pr_id'] ?>"><?= $pro['pr_nama'] ?></option>
															<?php } ?>
														</select>
													</td>
													<td width="10%">
														<button class="btn btn-success btn-flat"  id="send-btns"><i class="fa fa-plus"></i>  Add</button>
													</td>
												</tr>
											</tbody>
										</table>
										</form>

										<div id='loadingDiv2'> 
							              <center>
							                <img src='https://www.quodfinancial.com/wp-content/themes/pro-child/QUOD-Diagram/loading_spinner.gif' style='width:75px;' /><br>
							                Please wait...
							              </center>  
							           </div> 
										<div id="list-proyek"></div>
									</div>
								</div>
							</div>
			        </div>
			        <div class="row">
			        	<div class="col-xs-12">
			        		<div class="box box-primary">
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
			        		</div>
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
  function loaddata() {
    // body...
    var id = $("#karyawan").val();
    var date = $("#date").val();
    $("#karyawan-input").val(id);
    $("#date-input").val(date);
    $("#karyawan-inputs").val(id);
    $("#date-inputs").val(date);
    $("#loadingDiv2").show();


    $("#table").load("<?= base_url('workorder/list-timesheets/pegawai/detail/') ?>"+id+"?date="+date);
	karyawanproyek(); 

  }

    $("#loadingDiv2").hide();

  function karyawanproyek() {
    // body...
    // $("#list-proyek").html("");
    var date = $("#date").val();
    var id = $("#karyawan").val();
    $("#list-proyek").load("<?= base_url('workorder/list-timesheets/pegawai/proyek?id=') ?>"+id+"&date="+date);
    $("#loadingDiv2").hide();
    

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
        var idp = $("#karyawan").val();
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
                        window.location.href="<?= base_url("workorder/list-timesheets/pegawai/add?idp=") ?>"+idp;
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


     $("#uploads").submit(function(){
        var idp = $("#karyawan").val();
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
                $("#send-btns").addClass("disabled").html("<i class='fa fa-spinner fa-spin'></i>  Processing...").attr('disabled',true);
                form.find(".show_errors").slideUp().html("");

            },
            success: function(response, textStatus, xhr) {
                // alert(mydata);
               var str = response;
                if (str.indexOf("Success") != -1){
                    form.find(".show_errors").hide().html(response).slideDown("fast");
                    setTimeout(function(){ 
                        document.getElementById('upload').reset();
                        window.location.href="<?= base_url("workorder/list-timesheets/pegawai/add?idp=") ?>"+idp;
                    }, 1000);
                    $("#send-btns").removeClass("disabled").html("<i class='fa fa-plus'></i> Add").attr('disabled',false);;

            
                }else{
                    form.find(".show_errors").hide().html(response).slideDown("fast");
                    $("#send-btns").removeClass("disabled").html("<i class='fa fa-plus'></i> Add").attr('disabled',false);;
                    
                    
                }
            },
            error: function(xhr, textStatus, errorThrown) {
        		console.log(xhr);
            }
        });
        return false;
        });

</script>