<div class="content-wrapper" >
      <!-- Main content -->
  <section class="content">
	<div class="container">
 	   <div class="row no_margin">
    	  <h3 class="jdl_page">DETAIL INVOICE</h3>
    	</div>
		
      <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row page-header">
        <div class="col-xs-6">
          <h3 style="margin-top:0px ">
            <?php 
                  $no =  sprintf("%03d", $invoice['id']);
                  $date = strtotime($invoice['date']);
                  $date = date("d M Y",$date);
                  $due = strtotime($invoice['due']);
                  $due = date("d M Y",$due);

             ?>
             INVOICE :  INV<?= $no ?>
          </h3>
        </div>
        <div class="col-xs-6">
          <?php if($invoice['status']!="Lunas"){ ?>
          <button type="button" class="btn btn-primary btn-flat pull-right" style="bottom: 0px" onclick="modalchange()"><i class="fa fa-refresh"></i>  Change to <b>LUNAS</b></button>  
          <?php } ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
          <table width="100%">
            <tr>
              <td width="10%">DATE</td>
              <td width="1%"> : </td>
              <td width=""><?= $date ?></td>
            </tr>
            <tr>
              <td>DUE DATE</td>
              <td> : </td>
              <td><?= $due ?></td>
            </tr>
            <tr>
              <td>Hal</td>
              <td> : </td>
              <td>2</td>
            </tr>
          </table>
        </div>
       
      </div>
      <!-- /.row -->
      <hr>
      <div class="row">
        <div class="col-sm-4 invoice-col">
        Bill To
          <address>
            <strong><?= $pelanggan['p_nama_perusahaan'] ?></strong><br>
            <?= $pelanggan['p_alamat'] ?>
          </address>
        </div>
      </div>
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped table-bordered table-condensed">
            <caption><strong>Item purchase </strong></caption>
            <thead>
            <tr class="bg-aqua">
              <th>ITEM</th>
              <th style="width: 30%">NOMINAL</th>
            </tr>
            </thead>
            <tbody>
            <?php 
              foreach ($item as $it) {
            ?>
            <tr>
              <td><?= $it['item'] ?></td>
              <td class="text-right"><?= number_format($it['nominal']) ?></td>
            </tr>
            <?php } 
            if($invoice['pajak2']==""){
              $invoice['pajak2']=0;
            }
            ?>
            </tbody>
            <tfooter >
              <tr>
              <th>Sub Total</th>
              <th class="text-right"><?= number_format($invoice['subtotal']) ?></th>
            </tr>
              <tr>
              <th><?= $proyek['pr_pajak'] ?></th>
              <th class="text-right"><?= number_format($invoice['pajak1']) ?></th>
            </tr>
              <tr>
              <th><?= $proyek['pr_pajak2'] ?></th>
              <th class="text-right"><?= number_format($invoice['pajak2']) ?></th>
            </tr>
              <tr class="bg-info">
              <th>Total</th>
              <th class="text-right"><?= number_format($invoice['total']) ?></th>
            </tr>
            </tfooter>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-12">
          <p class="lead">Remark:</p>
          
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            <?= $invoice['remark'] ?>
          </p>
        </div>
        <!-- /.col -->
  
        <!-- /.col -->
      </div>

      <div class="row">
        <div class="col-xs-12">
          <p>Hal 1</p>
        </div>
      </div>
  
    </section>

          <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
             INVOICE :  INV<?= $no ?>
            <!-- <small class="pull-right">Date: 2/10/2014</small> -->
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
           <h4>LAMPIRAN</h4>
        </div>
       
      </div>
      <!-- /.row -->
      <hr>

      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped table-bordered table-condensed">
            <thead>
            <tr class="bg-aqua">
              <th>DATE</th>
              <th>TYPE</th>
              <th>ACTIVITY</th>
              <th>OUT</th>
              <th>IN</th>


            </tr>
            </thead>
            <tbody>
              <?php $total=0; 
                      $m = 0;
                      $k = 0;
              foreach ($ap->result() as $i => $v): 
                      
                $sub = $this->mymodel->selectdataOne("aktivitas",array("id"=>$v->ap_idsubaktivitas));
                      if($sub['kategori']=="masuk"){
                        $masuk = $v->ap_nominal;
                        $keluar = 0;
                        $type = "IN";
                      }else{
                        $keluar = $v->ap_nominal;
                        $masuk = 0;
                        $type = "OUT";

                      }
                $m += $masuk;
                $k += $keluar;
                      ?>
            <tr>
              <?php $akt = $this->mmodel->selectWhere("aktivitas",array("id"=>$v->ap_idaktivitas))->row()->name ?>
              <td><?= $v->ap_tanggal ?></td>
              <td><?= $type ?></td>
              <td><?= $akt ?> - <?= $sub['name'] ?></td>
              <td class="text-right"><?= number_format($masuk) ?></td>
              <td class="text-right"><?= number_format($keluar) ?></td>
            </tr>
            <?php endforeach;
                       ?>
            </tbody>
            <tfoot>
              <tr class="bg-info">
                <td colspan="3">Total</td>
                <td class="text-right"><?= number_format($m) ?></td>
                <td class="text-right"><?= number_format($k) ?></td>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-xs-12">
          <p>Hal 2</p>
        </div>
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <!-- <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div> -->
    </section>
	</div>
    </section>
</div>

<div class="modal fade" id="modal-id">
  <div class="modal-dialog modal-sm" style="z-index: 99999">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Alert</h4>
      </div>
      <div class="modal-body">
        <h5 class="text-center"><b>Are you sure change invoice status ?</b></h5>
        
      </div>
      <div class="modal-footer">
        <center>
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary btn-flat" onclick="changes()">Save changes</button>
      </center> 
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  function modalchange() {
    // body...
    $("#modal-id").modal("show");
  }

  function changes() {
    // body...
    var url = "<?= base_url('billing/updatestatus/'.$invoice['id']) ?>";
    window.location.href = url;
    
  }

</script>