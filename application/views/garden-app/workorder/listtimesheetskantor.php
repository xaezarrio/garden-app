<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">
					LIST PENGELUARAN KANTOR
					<a href="<?= base_url('workorder/addkantor') ?>">
					<button class="btn btn-primary pull-right btn-xs">Tambah Pengeluaran</button>
					</a>
				</h3>

			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
			          <div class="box-body">

			          	<!-- filter -->
			          	<div class="row">
		                  <div class="col-xs-3">
		                    <div class="form-group">
		                      <label>Item Produk:</label>

		                        <select class="form-control select2">
		                          <option>Semua Item</option>
		                          <option></option>

		                        </select>
		                    </div>      
		                  </div>
		                  <div class="col-xs-2">
		                    <div class="form-group">
		                      <label>Sub Aktivitas:</label>

		                      <select class="form-control select2">
		                          <option>semua sub</option>
		                          <option>gaji</option>
		                          <option>honor</option>

		                        </select>
		                      <!-- /.input group -->
		                    </div>      
		                  </div>
		                  <div class="col-xs-2">
		                    <div class="form-group">
		                      <label>Bulan:</label>

		                      <select class="form-control select2">
		                          <option>semua bulan</option>
		                          <option></option>

		                        </select>
		                      <!-- /.input group -->
		                    </div>      
		                  </div>
		                  <div class="col-xs-2">
		                    <div class="form-group">
		                      <label>Tahun:</label>

		                      <select class="form-control select2">
		                          <option>2018</option>
		                          <option></option>

		                        </select>
		                      <!-- /.input group -->
		                    </div>      
		                  </div>
		                  <div class="col-xs-2">
		                    <div class="form-group">
		                      <label>.</label>
		                      <div class="input-group">
		                        <!-- <div class="input-group-addon">
		                          <i class="fa fa-calendar"></i>
		                        </div> -->
		                        <!-- <input type="text" class="form-control pull-right" id="reservation"> -->
		                        <button class="btn btn-info">Filter</button>

		                      </div>
		                    </div>
		                  </div>
		              </div>

			          	<!-- end filter -->
			            <table class="table table-condensed table-hover table-bordered" id="example1">
			              <thead>
			                <tr>
			                  <th style="width: 30px;">No</th>
			            		<th>Tanggal</th>
			            		<th>Sub Aktivitas</th>
			            		<th>Item</th>
			            		<th>QTY</th>
			            		
			            		<!-- <th>Item</th> -->
			            		<!-- <th>Nominal</th> -->
			            		<th>Keterangan</th>
			            		<th>Nominal</th>
			                  	<th style="width:80px;">Action</th>
			                </tr>
			              </thead>
			              <tbody>
			                <?php for ($i=1; $i < 5 ; $i++) { ?>
			                <tr>
			                  	<td><?= $i ?></td>
		            			<td><?= date('Y-m-d') ?></td>
		            			<td>ATK</td>
		            			<td>Produk <?= $i ?></td>
		            			<td>20 pcs</td>
		            			<td>
		            				Beli produk 20 pcs
		            			</td>
		            			<td>
		            				<?= number_format(5000000) ?>
		            			</td>
			                  	<td>
				                  	<a href="#" class="btn btn-xs btn-primary btn-flat" >
				                  		<i class="fa fa-edit"></i> edit
				                  	</a>
				                  	<a href="#" class="btn btn-xs btn-danger btn-flat" >
				                  		<i class="fa fa-remove"></i>
				                  	</a>		                  	
			                  	</td>
			                </tr>
			                <?php } ?>
			                <?php for ($i=5; $i < 7 ; $i++) { ?>
			                <tr>
			                  	<td><?= $i ?></td>
		            			<td><?= date('Y-m-d') ?></td>
		            			<td>Konsumsi</td>
		            			<td>Produk <?= $i ?></td>
		            			<td>100 kg</td>
		            			<td>
		            				Beli produk 100 kg
		            			</td>
		            			<td>
		            				<?= number_format(5000000) ?>
		            			</td>
			                  	<td>
				                  	<a href="#" class="btn btn-xs btn-primary btn-flat" >
				                  		<i class="fa fa-edit"></i> edit
				                  	</a>
				                  	<a href="#" class="btn btn-xs btn-danger btn-flat" >
				                  		<i class="fa fa-remove"></i>
				                  	</a>		                  	
			                  	</td>
			                </tr>
			                <?php } ?>
			                
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
</script>