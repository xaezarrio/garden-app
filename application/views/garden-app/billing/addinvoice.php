<div class="content-wrapper" >
      <!-- Main content -->
      <section class="content">
      <div class="container">
    <div class="row no_margin">
      <h3 class="jdl_page">ADD INVOICE</h3>
    </div>
        <div class="row">      
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <!-- <h3 class="box-title">New Tickets</h3> -->
                <b>Data Proforma</b>

              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" id="upload" action="<?= base_url('billing/action-invoice/add') ?>">
                <div class="box-body">
                  <div class="show_error"></div>
                  <div class="row">
                    <div class="col-md-8">
                      <table class="table table-bordered table-hover">
                      <?php if($id!=""){ ?>
                      <tr>
                        <td style="width: 140px;">proyek</td>
                        <td>
                          <input type="hidden" name="dt[proyek_id]" value="<?= $proyek['pr_id'] ?>">
                         <input type="text" name="" value="<?= $proyek['pr_nama'] ?>" class="form-control" readonly="">
                        </td>
                      </tr>
                      <?php }else{ ?>
                      <tr>
                        <td style="width: 140px;">proyek</td>
                        <td>
                         <select class="form-control" name="dt[proyek_id]" onchange="getjsoninv(this.value)">
                          <option value="">Pilih Proyek . . </option>
                            <?php 
                              $proyek = $this->mymodel->selectData('proyek'); 
                                foreach ($proyek as $pro) {
                            ?>
                              <option value="<?= $pro['pr_id'] ?>"><?= $pro['pr_nama'] ?></option>
                            <?php
                                }
                            ?>
                         </select>
                        </td>
                      </tr>
                      <?php } ?>


                      <tr>
                        <td>Invoice Date</td>
                        <td>
                          <div class="input-group">
                                <input type="text" class="form-control tgl" name="dt[date]" value="">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Due Date</td>
                        <td>
                          <div class="input-group">
                                <input type="text" class="form-control tgl" name="dt[due]" value="">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              </div>
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 140px;">Type</td>
                        <td>
                          <select class="form-control select2" name="dt[type]">
                                <option value="Pembayaran Proyek">Pembayaran Proyek </option>
                                <option value="Penambahan Proyek">Penambahan Proyek </option>

                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Subject</td>
                        <td>
                          <input type="text" name="dt[subject]" class="form-control">
                        </td>

                      </tr>
                      
                    </table>
                    </div>
                  </div>
                        <button type="button" class="btn btn-success btn-flat btn-sm" onclick="addappen(1)" id="appenbtn"><i class="fa fa-plus"></i> Add Item</button>
                        <table class="table table-bordered">
                            <thead>
                              <tr class="bg-blue">
                                <th>Item Pembelian</th>
                                <th style="width: 30%">Nominal</th>
                                <td style="width: 30px"></td>
                              </tr>
                            </thead>
                            <tbody id="appendtr">
                              <tr id="tr1">
                                <td><input type="text" class="form-control" name="item[]" id="item1" placeholder="Masukan nama item"></td>
                                <td><input type="text" class="form-control rupiah nominals text-right" name="nominal[]" id="nominal1" onfocusout="hitung()"></td>
                                <td></td>
                              </tr>
                            </tbody>
                            <tfoot>
                              <tr style="background: #ddd">
                                <th>Sub Total</th>
                                <th style="width: 30%" id="subtotal" class="text-right">-
                                </th>
                                <th></th>
                              </tr>
                              <tr style="background: #ddd">
                                <th id="pajak1html">
                                  <?php if($id!=""){ ?>
                                  <?php

                                   $pjk1 = $this->mymodel->selectdataOne('pajak',array('id'=>$proyek['pr_pajak'])); 
                                   echo $pjk1['name'];
                                   
                                   ?>
                                    <?php } ?>
                                  </th>
                                <th style="width: 30%" class="text-right">
                                  <input type="text" class="form-control rupiah text-right" name="dt[pajak1]" id="pajak1" onfocusout="hitung()">
                                </th>
                                <th></th>
                              </tr>
                              <tr style="background: #ddd">
                                <th id="pajak2html">
                                  <?php if($id!=""){ ?>
                                  <?php

                                   $pjk12 = $this->mymodel->selectdataOne('pajak',array('id'=>$proyek['pr_pajak2'])); 
                                   if($proyek['pr_pajak2']==""){
                                    $pjk12['name'] = "-";
                                   }
                                   echo $pjk12['name'];
                                   
                                   ?>
                                    <?php } ?>
                                  </th>
                                <th style="width: 30%" class="text-right">
                                  <input type="text" class="form-control rupiah text-right" name="dt[pajak2]" id="pajak2" onfocusout="hitung()">
                                  
                                </th>
                                <th></th>
                              </tr>
                              <tr style="background: #ddd">
                                <th>Total</th>
                                <th style="width: 30%" id="total" class="text-right">-
                                </th>
                                <th></th>
                              </tr>                              
                            </tfoot>
                        </table>
                                  <input type="hidden" name="dt[subtotal]" id="subtotalval">

                                  <input type="hidden" name="dt[total]" id="totalval">

                        <hr>
                        <table class="table table-bordered table-hover">
                          <tr>
                            <td>Remark</td>
                            <td>
                              <input type="text" class="form-control" name="dt[remark]">
                            </td>
                          </tr>

                          
                        </table>

                </div>
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary" id="send-btn"><i class="fa fa-save"></i> Simpan </button>                 
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
    function modalshow() {
      // body...
      $("#ui-datepicker-div").attr('style','z-index:9999')
      $("#modal-default").modal('show')
    }
  
    function addappen(ids) {
      ids = ids+1;
      $("#appenbtn").attr('onclick',"addappen("+ids+")");
      var html = ' <tr id="tr'+ids+'">'+
                 '   <td><input type="text" class="form-control" name="item[]" id="item'+ids+'" placeholder="Masukan nama item"></td>'+
                 '   <td><input type="text" class="form-control rupiah nominals text-right" name="nominal[]" id="nominal'+ids+'" onfocusout="hitung()"></td>'+
                 '   <td><i class="fa fa-remove text-danger" onclick="removes('+ids+')"></i></td>'+
                 ' </tr>';
      $("#appendtr").append(html);
      $(".rupiah").maskMoney({thousands:',', allowZero:false , precision:0});

    }

    function removes(ids) {
      $("#tr"+ids).remove();
      hitung();
    }
    function convertToAngka(rupiah)
    {
      return parseInt(rupiah.replace(/,,*|[^0-9]/g, ''), 10);
    }
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
                  // loaddatas();
                  // document.getElementById('upload').reset();
                   $('#upload')[0].reset();
                  // $("#addsite").modal('hide');
                  <?php if($id!=""){ ?>
                  window.location.href = "<?= base_url("matters/payment/".$proyek['pr_id']) ?>";
                  <?php }else{ ?>
                  window.location.href = "<?= base_url("billing/invoice") ?>";

                    <?php } ?>
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


    function hitung() {
      var sub = 0;
      var values = $('input[name="nominal[]"]').map(function(){
        var a = this.value;
        var nom = convertToAngka(a);
        if(nom==""){
          nom = 0;
        }
        sub += parseInt(nom);
      }).get();
    
        var pajak = $("#pajak1").val();
        var pajak2 = $("#pajak2").val();
        if(pajak==""){
         pajak = 0; 
        }else{
        pajak  = convertToAngka(pajak);

        }
        if(pajak2==""){
         pajak2 = 0; 
        }else{
        pajak2  = convertToAngka(pajak2);
        }


        var total = sub+pajak+pajak2;
        $("#total").html(convertToRupiah(total));
        $("#subtotal").html(convertToRupiah(sub));

        $("#totalval").val(total);
        $("#subtotalval").val(sub);
        

    }


    <?php if($id==""){ ?>
      function getjsoninv(id) {
          $.getJSON("<?= base_url("billing/getpajak/") ?>"+id, function(result){
              // $.each(result, function(i, field){
                  // $("div").append(field + " ");
              // });
              // console.log(result);
              $("#pajak1html").html(result.pr_pajak);
              $("#pajak2html").html(result.pr_pajak2);

          });
        }  
    <?php } ?>



  </script>
