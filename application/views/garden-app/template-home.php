<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Manajemen Operasional Garden</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- style -->
		<link rel="stylesheet" href="<?= base_url('assets');?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?= base_url('assets');?>/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?= base_url('assets');?>/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?= base_url('assets');?>/css/skins/_all-skins.css">
		<link rel="stylesheet" href="<?= base_url('assets');?>/css/skins/skin-yellow-light.css">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 
		<link rel="stylesheet" href="<?= base_url('assets');?>/js/datatables/dataTables.bootstrap.css">
		<link rel="stylesheet" href="<?= base_url('assets');?>/css/jQuery.verticalCarousel.css">
		<link rel="stylesheet" href="<?= base_url('assets');?>/js/select2/select2.min.css">
		<!-- fullCalendar 2.2.5-->
		<link rel="stylesheet" href="<?= base_url('assets');?>/js/fullcalendar/fullcalendar.min.css">
		<link rel="stylesheet" href="<?= base_url('assets');?>/js/fullcalendar/fullcalendar.print.css" media="print">
		<link rel="stylesheet" href="<?= base_url('assets');?>/css/style.css">
		<link rel="stylesheet" href="<?= base_url('assets');?>/css/jquery-ui.min.css"></script>
		<link rel="stylesheet" href="<?= base_url('assets');?>/css/jquery-ui.theme.min.css"></script>
		<!-- script -->
		<script src="<?= base_url('assets');?>/js/select2/select2.full.min.js"></script>
		<script src="<?= base_url('assets');?>/js/jquery-1.11.3.min.js"></script>
		<script src="<?= base_url('assets');?>/js/jquery-ui.js"></script>
		<script src="<?= base_url('assets');?>/js/bootstrap.min.js"></script>
		<script src="<?= base_url('assets');?>/js/jquery.dataTables.min.js"></script>
    	<script src="<?= base_url('assets');?>/maskmoney/src/jquery.maskMoney.js" type="text/javascript"></script>
		<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
		<script src="<?= base_url('assets');?>/js/datatables/dataTables.bootstrap.min.js"></script>
		<script src="<?= base_url('assets');?>/js/jQuery.verticalCarousel.js"></script>
		<script src="<?= base_url('assets');?>/js/chartjs/Chart.min.js"></script>
		<script src="<?= base_url('assets');?>/js/app.min.js"></script>
		<script src="<?= base_url('assets');?>/js/custom.js"></script>


		<script src="https://cdn.datatables.net/1.10.16/js/dataTables.jqueryui.min.js"></script>
		<script src="https://cdn.datatables.net/keytable/2.3.2/js/dataTables.keyTable.min.js"></script>
		<!-- new css -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.jqueryui.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/keytable/2.3.2/css/keyTable.jqueryui.min.css">
		
  <script type="text/javascript">
            $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
              {
                  return {
                      "iStart": oSettings._iDisplayStart,
                      "iEnd": oSettings.fnDisplayEnd(),
                      "iLength": oSettings._iDisplayLength,
                      "iTotal": oSettings.fnRecordsTotal(),
                      "iFilteredTotal": oSettings.fnRecordsDisplay(),
                      "ibanner": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                      "iTotalbanners": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                  };
          };
            function convertToRupiah(angka)
			{
			  var rupiah = '';    
			  var angkarev = angka.toString().split('').reverse().join('');
			  for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+',';
			  return rupiah.split('',rupiah.length-1).reverse().join('');
			}

  </script>
		<style type="text/css">
			.ui-autocomplete-loading {background: white url('<?=base_url();?>assets/js/jQueryUI/ui-anim_basic_16x16.gif') right center no-repeat;}
		</style>
	</head>
	<body class="hold-transition skin-black-light sidebar-mini sidebar-collapse">
		<div class="wrapper">
			<header class="main-header">
				<!-- Logo -->
				<a href="<?= base_url() ?>" class="logo">
					<span class="logo-mini">
					<div><img src="<?= base_url('assets/img/gatoko_web.png') ?>" class="img-responsive" style="padding: 10px 40px;" /></div>
					
	              	
			          <!-- logo for regular state and mobile devices -->
			          <span class="logo-lg"><b>GARDEN</b>APP</span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
		        <nav class="navbar navbar-static-top" role="navigation">
		          <div class="navbar-custom-menu navbar-left">
		            <ul class="nav navbar-nav">
		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-users"></i> Pelanggan <span class="caret"></span></a>
		                <ul class="dropdown-menu">
						   <li>
		                    <a href="<?= base_url('customer/add') ?>"><i class="fa fa-user-plus"></i> Tambah Pelanggan</a>
		                   </li>
		                   <li>
		                    <a href="<?= base_url('customer/list-customer') ?>"><i class="fa fa-bar-chart-o"></i> List Pelanggan</a>
		                   </li>
						</ul>
		              </li>
		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown">
		                <i class="fa fa-table"></i> 
		                Project Management  
		                <span class="caret"></span>
		                </a>
		                <ul class="dropdown-menu">
						   <li>
		                    <a href="<?= base_url('matters/add') ?>"> <i class="fa fa-plus"></i> Tambah Proyek</a>
		                   </li>
						   <li>
		                    <a href="<?= base_url('matters/list-matters') ?>"> <i class="fa fa-file-text-o"></i> List Proyek</a>
		                   </li>
		                   <li>
		                    <a href="<?= base_url('billing/invoice') ?>"> <i class="fa fa-file"></i> Invoice </a>
		                   </li>
		                   <li>
		                    <a href="<?= base_url('billing/collections') ?>"> <i class="fa fa-files-o"></i> Pembayaran  </a>
		                   </li>
						</ul>
		              </li>
		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown">
		                <i class="fa fa-money"></i> 
		                Pengeluaran  
		                <span class="caret"></span>
		                </a>
		                <ul class="dropdown-menu">
						   <li>
		                     <a href="<?= base_url('workorder/list-timesheets/pegawai') ?>"> <i class="fa fa-user-plus"></i> Pegawai </a>
		                   </li>
						   <li>
		                    <a href="<?= base_url('workorder/list-timesheets/pribadi') ?>"> <i class="fa fa-tags"></i> Pribadi</a>
		                   </li>
		                   <li>
		                    <a href="<?= base_url('workorder/list-timesheets/kantor') ?>"> <i class="fa fa-book"></i> Kantor</a>
		                   </li>
						</ul>
		              </li>

		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-line-chart"></i> 
		                Report  
		                <span class="caret"></span>
		                </a>
		                <ul class="dropdown-menu">
						   <li>
		                    <a href="<?= base_url('billing/invoice') ?>"> <i class="fa fa-file-text-o"></i> Proyek </a>
		                   </li>
						   <li>
		                    <a href="<?= base_url('billing/invoice') ?>"> <i class="fa fa-file-text-o"></i> Per Aktivitas </a>
		                   </li>
		                   <li>
		                    <a href="<?= base_url('billing/collections') ?>"> <i class="fa fa-line-chart"></i> Finansial Perusahaan  </a>
		                   </li>

						</ul>
		              </li>
		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa  fa-cubes"></i> 
		                Manajemen Aset  
		                <span class="caret"></span>
		                </a>
		                <ul class="dropdown-menu">
						   <li>
		                    <a href="<?= base_url('aset') ?>"> <i class="fa fa-file-text-o"></i> List Aset </a>
		                   </li>
		                   <li>
		                    <a href="<?= base_url('aset/registrasi') ?>"> <i class="fa fa-sign-in"></i> Registrasi Aset</a>
		                   </li>
		                   <li>
		                    <a href="<?= base_url('aset/transaksi/out') ?>"> <i class="fa fa-upload"></i> Transaksi Keluar</a>
		                   </li>
		                   <li>
		                    <a href="<?= base_url('billing/collections') ?>"> <i class="fa fa-download"></i> Transaksi masuk</a>
		                   </li>

						</ul>
		              </li>

		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-database"></i> 
		                Master  
		                <span class="caret"></span>
		                </a>
		                <ul class="dropdown-menu">
						   <li>
		                    <a href="<?= base_url('master/aktivitas/1') ?>"> <i class="fa fa-file-text-o"></i> Aktivitas </a>
		                   </li>
						   <li>
		                    <a href="<?= base_url('master/cost-center') ?>"> <i class="fa fa-map-marker"></i> Cost Center </a>
		                   </li>
		                   <li>
		                    <a href="<?= base_url('master/karyawan') ?>"> <i class="fa fa-user"></i> Karyawan  </a>
		                   </li>
		                   <li>
		                    <a href="<?= base_url('master/toko') ?>"> <i class="fa fa-home"></i> Toko  </a>
		                   </li>
		                   <li>
		                    <a href="<?= base_url('master/perusahaan') ?>"> <i class="fa fa-legal"></i> Data Perusahaan  </a>
		                   </li>

						</ul>
		              </li>
		              
		              
		              
		              
		            </ul>
		          </div>
		          <div class="navbar-custom-menu navbar-right">
		            <ul class="nav navbar-nav">
		              <li>
		                <a href="<?= base_url('login/logout') ?>">
		                <i class="fa fa-sign-out"></i> Logout
		                </a>
		              </li>
		            </ul>
		          </div>
		        </nav>
			</header>
			<div id="main_content" >
				<?= $content ?>
			</div>
			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>Version</b> 1.0.0
				</div>
			</footer>
		</div>
		<!-- ./wrapper -->
		<!-- page script -->
		<script type="text/javascript">

		$(".rupiah").maskMoney({thousands:',', allowZero:false , precision:0});
			
		$(function () {
			$(".jstable").DataTable({
				responsive: true,
				ordering : false,
				autoWidth: false,
			});
		});
		$('.tgl').datepicker({
		    dateFormat: 'yy-mm-dd',
		});

		$('.date_field').datepicker({
		    //comment the beforeShow handler if you want to see the ugly overlay
		    format: 'yyyy-mm-dd',
		    beforeShow: function() {
		        setTimeout(function(){
		            $('.ui-datepicker').css('z-index', 99999999999999);
		        }, 0);
		    }
		});
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
		// $('.select2').select2();

		</script>
	</body>
</html>