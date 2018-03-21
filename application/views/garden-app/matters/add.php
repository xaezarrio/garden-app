<div class="content-wrapper" >
	<!-- Main content -->
	<section class="content">
		<div class="container">
			<div class="row no_margin">
				<h3 class="jdl_page">TAMBAH PROYEK</h3>
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
			            		<td style="width: 180px;">Perusahaan</td>
			            		<td>
			            			<select class="form-control select2" name="dt[pr_idperusahaan]">
			            				<option value=""> Choose Perusahaan .. </option>
			            				<?php foreach ($perusahaan->result() as $pr): ?>
			            					<option value="<?= $pr->id ?>"><?= $pr->name ?></option>
			            				<?php endforeach ?>
			            			</select>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td style="width: 180px;">Pelanggan</td>
			            		<td>
			            			<select class="form-control select2" name="dt[pr_idpelanggan]" required="">
			            				<option value=""> Choose Pelangan .. </option>
			            			
			            				<?php foreach ($pelanggan->result() as $p): ?>
			            					<option value="<?= $p->p_id ?>"><?= $p->p_nama_perusahaan ?> / <?= $p->p_alamat ?></option>
			            				<?php endforeach ?>
			            			</select>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Nomor SPK
			            		</td>
			            		<td>
			            			<input type="text" name="dt[pr_spk]" class="form-control" required="">
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Nama Proyek
			            		</td>
			            		<td>
			            			<input type="text" name="dt[pr_nama]" class="form-control" required="">
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Cost Center (Area)
			            		</td>
			            		<td>
			            			<select class="form-control select2" name="dt[pr_idcost]" required="">
			            				<?php foreach ($cost->result() as $c): ?>
			            					<option value="<?= $c->id ?>"><?= $c->name ?></option>
			            				<?php endforeach ?>
			            			</select>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Tanggal Mulai
			            		</td>
			            		<td>
			            			<input type="text" name="dt[pr_tgl_mulai]" class="form-control tgl" required="">
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Tanggal Selesai
			            		</td>
			            		<td>
			            			<input type="text" name="dt[pr_tgl_selesai]" class="form-control tgl" required="">
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Keterangan
			            		</td>
			            		<td>
			            			<input type="text" name="dt[pr_keterangan]" class="form-control" required="">
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
			            			<input type="text" name="dt[pr_nilai_kontrak]" class="form-control rupiah" required="">
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			Pajak
			            		</td>
			            		<td>
			            			<select class="form-control" name="dt[pr_pajak]" required="">
			            				<option value="">- </option>
			            				<?php 
			            					$pajak = $this->mymodel->selectData('pajak');
			            					foreach ($pajak as $pjk) {
			            				?>
			            				<option value="<?= $pjk['id'] ?>"><?= $pjk['name'] ?></option>
			            				<?php } ?>
			            			</select>
			            			<select class="form-control" name="dt[pr_pajak2]" >
			            				<option value="">-</option>
			            				<?php 
			            					foreach ($pajak as $pjk) {
			            				?>
			            				<option value="<?= $pjk['id'] ?>"><?= $pjk['name'] ?></option>
			            				<?php } ?>
			            			</select>
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

			</div>
			<!-- end row -->
		</div>

	</section><!-- /.content -->
	
</div><!-- /.content-wrapper -->
