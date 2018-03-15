<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">
				TAMBAH PENGELUARAN KANTOR
				</h3>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
					  <div class="box-header with-border">	
						<table class="table table-bordered table-hover" style="width:50%">
			            	<tr>
			            		<td>
			            			Tanggal
			            		</td>
			            		<td>
			            			<input type="text" name="" class="form-control tgl">
			            		</td>
			            	</tr>
			            	
			            	<tr>
			            		<td>
			            			Digunakan
			            		</td>
			            		<td>
			            			<select class="form-control">
					    				<option>Kantor</option>
					    				<option>1800.0001 / Proyek A</option>
					    				<option>1800.0002 / Proyek B</option>
					    				<option>1800.0003 / Proyek C</option>
					    			</select>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Sub Aktivitas
			            		</td>
			            		<td>
			            			<select class="form-control">
					    				<option>Tambah Saldo</option>
					    				<option>ATK</option>
					    				<option>Konsumsi</option>
					    				<option>BBM</option>
					    				<option>Sumbangan</option>
					    			</select>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Item
			            		</td>
			            		<td>
			            			<input type="text" name="" placeholder="masukan item produk" class="form-control">
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			QTY
			            		</td>
			            		<td>
			            			<select class="form-control" style="display: inline;width: 100px;">
					    				<option>2</option>
					    			</select>
					    			<select class="form-control" style="display: inline;width: 100px;">
					    				<option>PCS</option>
					    			</select>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Nominal (Rp) 
			            		</td>
			            		<td>
			            			<input type="text" class="form-control" name="">
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Keterangan
			            		</td>
			            		<td>
			            			<textarea class="form-control"></textarea>
			            			<button type="submit" class="btn btn-primary btn-flat pull-right" >Save</button>
			            		</td>
			            	</tr>
			            </table>
					  </div>
					  <div class="box-body table-responsive">
			            <table class="table table-bordered table-striped">
			            	<thead>
			            		<th style="width: 30px;">No</th>
			            		<th>Tanggal</th>
			            		<th>Sub Aktivitas</th>
			            		<!-- <th>Item</th> -->
			            		<!-- <th>Nominal</th> -->
			            		<th>Keterangan</th>
			            		<th>Keluar</th>
			            		<th>Masuk</th>
			            	</thead>
			            	<tbody>

			            		<tr>
			            			<td>1</td>
			            			<td><?= date('Y-m-d') ?></td>
			            			<td>Tambah Saldo</td>
			            			<td></td>
			            			<td></td>
			            			<td class="text-right">
			            				<?= number_format(2000000) ?>
			            			</td>
			            		</tr>
			            		<tr>
			            			<td>2</td>
			            			<td><?= date('Y-m-d') ?></td>
			            			<td>ATK</td>
			            			<td>Materai 100 pcs</td>
			            			
			            			<td class="text-right">
			            				<?= number_format(1500000) ?>
			            			</td>
			            			<td></td>
			            		</tr>
			            		<tr>
			            			<td>3</td>
			            			<td><?= date('Y-m-d') ?></td>
			            			<td>Konsumsi</td>
			            			<td>Beras 100kg</td>
			            			
			            			<td class="text-right">
			            				<?= number_format(500000) ?>
			            			</td>
			            			<td></td>
			            		</tr>
			            		<tr>
			            			<td>4</td>
			            			<td><?= date('Y-m-d') ?></td>
			            			<td>ATK</td>
			            			<td>Kertas 2 Rim</td>
			            			<td class="text-right">
			            				<?= number_format(500000) ?>
			            			</td>
			            			<td></td>
			            		</tr>
			            		<tr>
			            			<td>5</td>
			            			<td><?= date('Y-m-d') ?></td>
			            			<td>Tambah Saldo</td>
			            			<td></td>
			            			<td></td>
			            			<td class="text-right">
			            				<?= number_format(2000000) ?>
			            			</td>
			            		</tr>
			            		<tr>
			            			<td>6</td>
			            			<td><?= date('Y-m-d') ?></td>
			            			<td>ATK</td>
			            			<td>Pulpen 20 pcs</td>
			            			
			            			<td class="text-right">
			            				<?= number_format(500000) ?>
			            			</td>
			            			<td></td>
			            		</tr>
			            		
			            		<tr style="background: #ddd;font-weight: bold">
			            			<td colspan="4">Total</td>
			            			<td class="text-right">
			            				<?= number_format(2700000) ?>
			            			</td>
			            			<td class="text-right">
			            				<?= number_format(1500000) ?>
			            			</td>
			            		</tr>
			            		
			            	</tbody>
			            </table>
			            
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
