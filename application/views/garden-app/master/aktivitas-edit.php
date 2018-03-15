<input type="hidden" name="id" value="<?= $aktivitas['id'] ?>">
<small>Kode Rekening</small>
	<input name="dt[name]" type="text" class="form-control" value="<?= $aktivitas['name'] ?>" />
<small>Kategori</small>
<select name="dt[kategori]" class="form-control">
	<option value="Masuk" <?php if($aktivitas['kategori']=="Masuk"){ echo "selected=''"; } ?>>Masuk</option>
	<option value="Keluar" <?php if($aktivitas['kategori']=="Keluar"){ echo "selected=''"; } ?>>Keluar</option>
</select>