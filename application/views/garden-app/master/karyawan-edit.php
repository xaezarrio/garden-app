<div class="show_error"></div>
<input type="hidden" name="ids" value="<?= $karyawan['id'] ?>">
<small>Nama</small>
<input name="dt[name]" type="text" class="form-control" value="<?= $karyawan['name'] ?>" />
<small>Sallary</small>
<input name="dt[name]" type="text" class="form-control rupiah" value="<?= $karyawan['sallary'] ?>" />
<script type="text/javascript">
      $(".rupiah").maskMoney({thousands:',', allowZero:false , precision:0});
	
</script>