<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;




$route['customer/list-customer'] = 'customer/listcustomer';
$route['customer/add'] = 'customer/add';
$route['customer/save'] = 'customer/save';
$route['customer/edit/(:any:)'] = 'customer/edit/$1';
$route['customer/detail/(:any:)'] = 'customer/detail/$1';


$route['matters/list-matters'] = 'matters/listmatters';
$route['matters/add'] = 'matters/add';
$route['matters/save'] = 'matters/save';
$route['matters/edit/(:any:)'] = 'matters/edit/$1';
$route['matters/detail/(:any:)'] = 'matters/detail/$1';
$route['matters/aktivitas/(:any:)'] = 'matters/aktivitas/$1';
$route['matters/aktivitas/add'] = 'matters/add_aktivitas';



$route['master/aktivitas/js'] = 'master/aktivitas_js';
$route['master/aktivitas/data'] = 'master/aktivitas_data';
$route['master/aktivitas/action/store'] = 'master/aktivitas_store';
$route['master/aktivitas/edit/(:any)'] = 'master/aktivitas_edit/$1';
$route['master/aktivitas/action/update'] = 'master/aktivitas_update';
$route['master/aktivitas/delete/(:any)/(:any)'] = 'master/aktivitas_delete/$1/$2';

//===================================
$route['master/cost-center'] = 'master/costcenter';
$route['master/cost-center/json'] = 'master/costcenterjson';
$route['master/cost-center/js'] = 'master/costcenter_js';
$route['master/cost-center/action/store'] = 'master/costcenter_store';
$route['master/cost-center/action/update'] = 'master/costcenter_update';
$route['master/cost-center/edit/(:any)'] = 'master/costcenter_edit/$1';
$route['master/cost-center/delete/(:any)'] = 'master/costcenter_delete/$1';

//===================================
$route['master/karyawan'] = 'master/karyawan';
$route['master/karyawan/json'] = 'master/karyawanjson';
$route['master/karyawan/js'] = 'master/karyawan_js';
$route['master/karyawan/action/store'] = 'master/karyawan_store';
$route['master/karyawan/action/update'] = 'master/karyawan_update';
$route['master/karyawan/edit/(:any)'] = 'master/karyawan_edit/$1';
$route['master/karyawan/delete/(:any)'] = 'master/karyawan_delete/$1';
//======================================
$route['aset/registrasi/action'] = 'aset/registrasi_action';
$route['aset/registrasi/action_edit'] = 'aset/registrasi_action_edit';

$route['aset/registrasi/edit/(:any)'] = 'aset/registrasi_edit/$1';

$route['aset/transaksi/out'] = 'aset/transaksi_out';
$route['aset/transaksi/out/json'] = 'aset/transaksi_out_json';
$route['aset/transaksi/out/add'] = 'aset/transaksi_out_add';
$route['aset/transaksi/out/add/action'] = 'aset/transaksi_out_addaction';
$route['aset/transaksi/out/add/detail'] = 'aset/transaksi_out_detail';
$route['aset/transaksi/out/edit/(:any)'] = 'aset/transaksi_out_edit/$1';
$route['aset/transaksi/out/edit/action/(:any)'] = 'aset/transaksi_out_editaction/$1';
$route['aset/transaksi/out/delete/(:any)'] = 'aset/transaksi_out_delete/$1';

$route['aset/transaksi/in'] = 'aset/transaksi_in';
$route['aset/transaksi/in/json'] = 'aset/transaksi_in_json';
$route['aset/transaksi/in/add'] = 'aset/transaksi_in_add';
$route['aset/transaksi/in/add/action'] = 'aset/transaksi_in_addaction';
$route['aset/transaksi/in/add/detail'] = 'aset/transaksi_in_detail';
$route['aset/transaksi/in/edit/(:any)'] = 'aset/transaksi_in_edit/$1';
$route['aset/transaksi/in/edit/action/(:any)'] = 'aset/transaksi_in_editaction/$1';
$route['aset/transaksi/in/delete/(:any)'] = 'aset/transaksi_in_delete/$1';
$route['aset/transaksi/changeMin'] = 'aset/changeMin';

//===================================
$route['master/toko/json'] = 'master/tokojson';
$route['master/toko/js'] = 'master/toko_js';
$route['master/toko/action/store'] = 'master/toko_store';
$route['master/toko/action/update'] = 'master/toko_update';
$route['master/toko/edit/(:any)'] = 'master/toko_edit/$1';
$route['master/toko/delete/(:any)'] = 'master/toko_delete/$1';

//===================================

//===================================
$route['master/perusahaan/json'] = 'master/perusahaanjson';
$route['master/perusahaan/js'] = 'master/perusahaan_js';
$route['master/perusahaan/action/store'] = 'master/perusahaan_store';
$route['master/perusahaan/action/update'] = 'master/perusahaan_update';
$route['master/perusahaan/edit/(:any)'] = 'master/perusahaan_edit/$1';
$route['master/perusahaan/delete/(:any)'] = 'master/perusahaan_delete/$1';

//===================================
//pegawai
$route['workorder/list-timesheets/pegawai'] = 'workorder/listtimesheets';
$route['workorder/list-timesheets/pegawai/add'] = 'workorder/addgaji';
$route['workorder/list-timesheets/pegawai/detail/(:any)'] = 'workorder/listtimesheets_detail/$1';
$route['workorder/list-timesheets/pegawai/detail'] = 'workorder/listtimesheets_detail/0';
$route['workorder/list-timesheets/pegawai/json'] = 'workorder/listtimesheets_json';
$route['workorder/list-timesheets/pegawai/edit/(:any)'] = 'workorder/editgaji/$1';
$route['workorder/list-timesheets/pegawai/update/action'] = 'workorder/editgaji_action';
$route['workorder/list-timesheets/pegawai/add/action'] = 'workorder/addgaji_action';
$route['workorder/list-timesheets/pegawai/delete/(:any)'] = 'workorder/listtimesheets_delete/$1';


// pribadi
$route['workorder/list-timesheets/pribadi'] = 'workorder/listtimesheetspribadi';
$route['workorder/list-timesheets/pribadi/add'] = 'workorder/addpribadi';
$route['workorder/list-timesheets/pribadi/detail'] = 'workorder/listtimesheetspribadi_detail';
$route['workorder/list-timesheets/pribadi/json'] = 'workorder/listtimesheetspribadi_json';
$route['workorder/list-timesheets/pribadi/edit/(:any)'] = 'workorder/editpribadi/$1';
$route['workorder/list-timesheets/pribadi/update/action'] = 'workorder/editpribadi_action';
$route['workorder/list-timesheets/pribadi/add/action'] = 'workorder/addpribadi_action';
$route['workorder/list-timesheets/pribadi/delete/(:any)'] = 'workorder/listtimesheetspribadi_delete/$1';

//kantor
$route['workorder/list-timesheets/kantor'] = 'workorder/listtimesheetskantor';
$route['workorder/list-timesheets/kantor/add'] = 'workorder/addkantor';
$route['workorder/list-timesheets/kantor/detail'] = 'workorder/listtimesheetskantor_detail';
$route['workorder/list-timesheets/kantor/json'] = 'workorder/listtimesheetskantor_json';
$route['workorder/list-timesheets/kantor/edit/(:any)'] = 'workorder/editkantor/$1';
$route['workorder/list-timesheets/kantor/update/action'] = 'workorder/editkantor_action';
$route['workorder/list-timesheets/kantor/add/action'] = 'workorder/addkantor_action';
$route['workorder/list-timesheets/kantor/delete/(:any)'] = 'workorder/listtimesheetskantor_delete/$1';

//--------------------------------
$route['billing/add-invoice/(:any)'] = 'billing/addinvoice/$1';
$route['billing/add-invoice'] = 'billing/addinvoice';

$route['billing/action-invoice/add'] = 'billing/store_invoice';
$route['billing/detail-invoice/(:any)'] = 'billing/detailinvoice/$1';
$route['billing/invoice/json/(:any)'] = 'billing/json/$1';
$route['billing/invoice/json-collections'] = 'billing/json_collections';


//================================



$route['koperasi/data'] = 'koperasi/data_koperasi';
$route['koperasi/simpan/add'] = 'koperasi/store';
// =================
$route['report/proyek/detail/(:any)'] = 'report/proyek_detail/$1';

