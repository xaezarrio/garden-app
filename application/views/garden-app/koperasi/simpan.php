<div class="content-wrapper" >
      <!-- Main content -->
      <section class="content">
      <div class="container">
    <div class="row no_margin">
      <h3 class="jdl_page">ADD SIMPAN </h3>
    </div>
        <div class="row">      
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <!-- <h3 class="box-title">New Tickets</h3> -->
                <b>Data Simpan</b>

              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" id="upload" action="<?= base_url('koperasi/simpan/add') ?>">
                <div class="box-body">
                  <div class="show_error"></div>
                  <div class="row">
                    <div class="col-md-6">
                      <table class="table table-bordered table-hover">
                   
                      <tr>
                        <td style="width: 140px;">karyawan</td>
                        <td>
                         <select class="form-control" name="dt[karyawan_id]" id="karyawan" onchange="loaddata()">
                          <option value="">Pilih karyawan . . </option>
                            <?php 
                              $karyawan = $this->mymodel->selectData('karyawan'); 
                                foreach ($karyawan as $pro) {
                            ?>
                              <option value="<?= $pro['id'] ?>"><?= $pro['name'] ?></option>
                            <?php
                                }
                            ?>
                         </select>
                        </td>
                      </tr>
                     <tr>
                        <td style="width: 140px;">Aktivitas</td>
                        <td>
                          <?php 
                           $aktv = $this->mymodel->selectdataOne('aktivitas',array('name'=>"Simpan"));
                           ?>
                           <input type="hidden" name="dt[aktivitas_id]" value="<?= $aktv['id'] ?>">
                         <select class="form-control" name="dt[aktivitas_sub]" >
                          <option value="">Pilih Aktivitas . . </option>
                            <?php 
                           $aktv_sub = $this->mymodel->selectWhere('aktivitas',array('parent'=>$aktv['id']));
                                foreach ($aktv_sub as $akt) {
                            ?>
                              <option value="<?= $akt['id'] ?>"><?= $akt['name'] ?></option>
                            <?php
                                }
                            ?>
                         </select>
                        </td>
                      </tr>


                      <tr>
                        <td>Date</td>
                        <td>
                          <div class="input-group">
                                <input type="text" class="form-control " name="dt[date]" id="date" value="<?= date('Y-m-d') ?>">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              </div>
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 140px;">Nominal</td>
                        <td>
                          <input type="text" name="dt[nominal]" class="form-control rupiah" id="nominal">
                          
                        </td>
                      </tr>
                      <tr>
                        <td>Description</td>
                        <td>
                          <input type="text" name="dt[desc]" class="form-control" id="desc">
                        </td>

                      </tr>
                    </table>
                    <button type="submit" class="btn btn-primary" id="send-btn"><i class="fa fa-save"></i> Simpan </button>                 

                    </div>
                  </div>

                  <!-- table -->
                  <div class="row">
                    <div class="col-md-12">
                      <div id="loading">
                        <h4 class="text-center"><i class="fa fa-spinner fa-spin"></i>  Loading...</h4>
                      </div>
                      <div class="errors"></div>
                      <div id="load-data"></div>
                    </div>
                  </div>
                        

                </div>
                <div class="box-footer">
                  <div class="pull-right">
                  </div>
                </div>
            </form>

            </div>
            <!-- /.box -->

          </div>
        <!--/.col (left) -->
        </div>
        <!-- /.box -->
      </div>
      </section>
 
</div>


  <script type="text/javascript">
    function loaddata() {
      $("#loading").show();
      $("#load-data").html("");
      var date = $("#date").val();
      var karyawan = $("#karyawan").val();
      <?php $akt = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Simpan')); ?>
      var akt = <?= $akt['id'] ?>;
      var url = "<?= base_url('koperasi/data') ?>?date="+date+"&karyawan="+karyawan+"&aktivitas="+akt;
      $("#load-data").load(url);
      $("#loading").hide();
    }

    loaddata();


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
                  $("#send-btn").removeClass("disabled").html('<i class="fa fa-save"></i> Simpan').attr('disabled',false);
                   // $('#upload')[0].reset();
                  $("#nominal").val('');
                  $("#desc").val('');
                  setTimeout(function () {
                    // body...
                  loaddata();
                  $(".show_error").slideUp();
                  },1000);

              }else{
                  form.find(".show_error").hide().html(response).slideDown("fast");
                  $("#send-btn").removeClass("disabled").html('<i class="fa fa-save"></i> Simpan').attr('disabled',false);
              }
          },
          error: function(xhr, textStatus, errorThrown) {
          console.log(xhr);
          }
      });
      return false;
      });



      $("#date").datepicker({
      dateFormat: "yy-mm-dd",
        onSelect: function (date) {
          loaddata();

        }
    });


  function deletedata(id) {
    if(confirm('Apakah anda yakin ?')){
      $.ajax({
            type: "POST",
            url: "<?= base_url('koperasi/delete/') ?>"+id,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend : function(){
                  $(".errors").hide().html("").slideDown("fast");
            },
            success: function(response, textStatus, xhr) {
                // alert(mydata);
               var str = response;
                if (str.indexOf("Success Delete Data") != -1){
                    $(".errors").show().html(response).slideDown("fast");
                        loaddata(); 
                      setTimeout(function () {
                        $(".errors").slideUp();
                      },1000);


                }else{
                    $(".errors").show().html(response).slideDown("fast");
                }
            },
            error: function(xhr, textStatus, errorThrown) {
            console.log(xhr);
            }
        });
    }else{

    }
  }

  </script>
