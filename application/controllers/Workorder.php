<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workorder extends CI_Controller {

	/*
	Author 		: Hafidz Rozaq NJ
	Edited By 	: Iqbal Luthfillah
	Last Edit 	: -
	App Ver 	: 2.0.0 Gatoko Smart
	*/

	function __construct() {
		parent::__construct();
		$user_id = $this->session->userdata('user_id');
		$role = $this->session->userdata('role');
		define('role', $role);
		define('user_id', $user_id);


		
	}
	
	public function listtimesheets()
	{
		$this->data['page']="matters";
		$this->data['bulan']= array(array("name"=>"01","month"=>"Januari"),array("name"=>"02","month"=>"Februari"),array("name"=>"03","month"=>"Maret"),array("name"=>"04","month"=>"April"),array("name"=>"05","month"=>"Mei"),array("name"=>"06","month"=>"Juni"),array("name"=>"07","month"=>"Juli"),array("name"=>"08","month"=>"Agustus"),array("name"=>"09","month"=>"September"),array("name"=>"10","month"=>"Oktober"),array("name"=>"11","month"=>"November"),array("name"=>"12","month"=>"Desember"));
		
		$this->render->admin('garden-app/workorder/listtimesheets', $this->data);
	}
	public function addgaji()
	{
		$this->data['page']="matters";
		$this->data['pegawai'] = $this->input->get('idp');
		
		$this->render->admin('garden-app/workorder/addgaji', $this->data);
	}

	public function editgaji($id)
	{
		$this->data['page']="matters";
		$this->data['data']=$this->mymodel->selectdataOne('pengeluaran',array('id'=>$id));
		$this->render->admin('garden-app/workorder/editgaji', $this->data);
	}



	public function listtimesheets_detail($id)
	{
		if($id==0){
			echo "<h5 class='text-center'><b>Data not Found</b></h5>";
		}else{
			$this->data['page']="matters";
			$this->data['id']=$id;

			$this->load->view('garden-app/workorder/listtimesheets-detail', $this->data);
		}

	}

	public function addgaji_action()
	{
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[date]', '<strong>Tanggal</strong>', 'required');
		$this->form_validation->set_rules('dt[karyawan_id]', '<strong>Karyawan</strong>', 'required');
		$this->form_validation->set_rules('dt[nominal]', '<strong>Nominal</strong>', 'required');
		$this->form_validation->set_rules('dt[keterangan]', '<strong>keterangan</strong>', 'required');


		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();
			$this->alert->alertdanger($error);
        }else{
        	$data = $this->input->post('dt');

        	$fileName = time().$_FILES['file']['name'];
	        $config['upload_path'] = './uploads/'; //buat folder dengan nama assets di root folder
	        $config['file_name'] = $fileName;
	        $config['allowed_types'] = '*';
	        $config['max_size'] = 10000;

        	$this->load->library('upload');
			$this->upload->initialize($config);
	        if ( ! $this->upload->do_upload('file'))
	        $this->upload->display_errors();
	             
	        $media = $this->upload->data('file');
	        $data["file"] = str_replace(" ","_",$fileName);

			$a = strtotime($_POST['dt']['date']);
        	$data['date'] = date('Y-m-d',$a);
        	$m = date('m',$a);
        	$y = date('Y',$a);


			$data['kategori'] = "Pegawai";
        	$data['nominal'] = str_replace(",", "", $_POST['dt']['nominal']);
        	$data['created_at'] = date('Y-m-d H:i:s');
        	$data['user_id'] = user_id;

        	$count = $this->mymodel->selectWhere('pengeluaran',array('month(date)'=>$m,'year(date)'=>$y,'karyawan_id'=>$_POST['dt']['karyawan_id']));
        	$cnt = count($count);
        	if($cnt==0){
        		
				$aktv1 = $this->mymodel->selectdataOne('aktivitas',array('name'=>"Pegawai"));
        		$aktv_sub1 = $this->mymodel->selectdataOne('aktivitas',array('parent'=>$aktv1['id'],'name'=>'Gaji'));
        		$kar = $this->mymodel->selectdataOne('karyawan',array('id'=>$_POST['dt']['karyawan_id']));
        		$dt_gaji = array ('date' =>  $y."-".$m."-01",
        						'aktivitas_id' => $aktv1['id'],
        						'aktivitas_sub' => $aktv_sub1['id'] ,
        						'nominal' => $kar['sallary'] ,
        						'karyawan_id' => $kar['id'] ,
        						'keterangan' => "Gaji Pokok Bulanan",
        						'file' => "" ,
        						'user_id' => user_id,
        						'kategori' => 'Pegawai' ,
        						'created_at' =>  date('Y-m-d H:i:s')
        					);
        		$this->db->insert('pengeluaran', $dt_gaji);

        		$aktv = $this->mymodel->selectdataOne('aktivitas',array('name'=>"Simpan"));
        		$aktv_sub = $this->mymodel->selectdataOne('aktivitas',array('parent'=>$aktv['id'],'name'=>'Pokok'));


        		$dt_koperasi = array ('date' =>  $y."-".$m."-01",
	        						'aktivitas_id' => $aktv['id'],
	        						'aktivitas_sub' => $aktv_sub['id'],

	        						'nominal' => '20000' ,
	        						'karyawan_id' => $kar['id'] ,
	        						'desc' => "Simpanan Pokok",
	        						'user_id' => user_id,
	        						// 'type' => 'Simpan' ,
	        						'created_at' =>  date('Y-m-d H:i:s')
	        					);

        		$this->db->insert('koperasi', $dt_koperasi);

        	

        	}



        	$this->db->insert('pengeluaran',$data);
        	$this->alert->alertsuccess('Success Input Data');
        }
	}

	public function editgaji_action()
	{
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[date]', '<strong>Tanggal</strong>', 'required');
		$this->form_validation->set_rules('dt[nominal]', '<strong>Nominal</strong>', 'required');
		$this->form_validation->set_rules('dt[keterangan]', '<strong>keterangan</strong>', 'required');


		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();
			$this->alert->alertdanger($error);
        }else{
        	$ids = $this->input->post('ids');
        	$data = $this->input->post('dt');

        	$fileName = time().$_FILES['file']['name'];
	        $config['upload_path'] = './uploads/'; //buat folder dengan nama assets di root folder
	        $config['file_name'] = $fileName;
	        $config['allowed_types'] = '*';
	        $config['max_size'] = 10000;

        	$this->load->library('upload');
			$this->upload->initialize($config);
	        if ( ! $this->upload->do_upload('file'))
	        $this->upload->display_errors();
	             
	        $media = $this->upload->data('file');
	        if ($_FILES['file']['name']) {
	        	$data["file"] = str_replace(" ","_",$fileName);
	        }

			$a = strtotime($_POST['dt']['date']);
        	$data['date'] = date('Y-m-d',$a);
        	$data['nominal'] = str_replace(",", "", $_POST['dt']['nominal']);
        	$data['updated_at'] = date('Y-m-d H:i:s');
        	$data['user_id'] = user_id;

        	$this->mymodel->updateData('pengeluaran',$data,array('id'=>$ids));
        	$this->alert->alertsuccess('Success Input Data');
        }
		# code...
	}



	public function listtimesheets_json()
	{
		$karyawan = $this->input->get('karyawan');
		$sub = $this->input->get('sub');
		$kategori = $this->input->get('kategori');
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');

		header('Content-Type: application/json');
        $this->datatables->select('pengeluaran.id,pengeluaran.date,aktivitas.kategori as kategori,karyawan.name as karyawan,karyawan.id as karyawan_id,aktivitas.name as sub,pengeluaran.keterangan,pengeluaran.nominal');
        $this->datatables->join('karyawan','karyawan.id=pengeluaran.karyawan_id','left');
        $this->datatables->join('aktivitas','aktivitas.id=pengeluaran.aktivitas_sub','left');
        $this->datatables->where(array('pengeluaran.kategori'=>'Pegawai'));
        if(role==3){
			$this->datatables->where(array('pengeluaran.user_id'=>user_id));
		}
        if ($karyawan) {
        	$this->datatables->where('karyawan.id', $karyawan);
        }
        if ($sub) {
        	$this->datatables->where('aktivitas.id', $sub);
        }
        if ($kategori) {
        	$this->datatables->where('aktivitas.kategori', $kategori);
        }
        if ($bulan) {
        	$this->datatables->where("date_format(pengeluaran.created_at, '%m') =", $bulan);
        }
        if ($tahun) {
        	$this->datatables->where("date_format(pengeluaran.created_at, '%Y') =", $tahun);
        }
        $this->datatables->from('pengeluaran');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="edit($1)" class="btn btn-xs btn-info"><span class="txt-white fa fa-edit"></span> Detail</a> <!--a onclick="hapus($1)"  class="btn btn-sm btn-danger"><span class="txt-white fa fa-trash-o"></span></a-->  </div>', 'id');
        echo $this->datatables->generate();
	}

	public function  listtimesheets_delete($id)
	{
		# code...
		$date = $this->mmodel->selectWhere('pengeluaran',array('id'=>$id))->row()->date;
		$date1=date_create($date);
		$date2=date_create(date("Y-m-d"));
		$diff=date_diff($date1,$date2);
		$res = $diff->format("%a");

		if ($res<=7) {
			$this->mymodel->deleteData('pengeluaran',array('id'=>$id));
			redirect('workorder/list-timesheets/pegawai');

		} else {
			echo "<script type='text/javascript'>alert('Maaf, data yang anda pilih melewati 7 hari setelah pembuatan. Data gagal dihapus');window.location.href='".base_url('workorder/list-timesheets/pegawai/')."';</script>";
		}
	}

	public function listtimesheets_proyek()
	{
		# code...
		$data['id'] = $this->input->get('id');
		$this->load->view('garden-app/workorder/listtimesheets-proyek', $data);
	}
	public function addgaji_actionproyek()
	{
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[date]', '<strong>Tanggal</strong>', 'required');
		$this->form_validation->set_rules('dt[karyawan_id]', '<strong>Pegawai</strong>', 'required');
		$this->form_validation->set_rules('dt[proyek_id]', '<strong>Proyek</strong>', 'required');


		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();
			$this->alert->alertdanger($error);
        }else{
        	$data = $this->input->post('dt');
        	$data['user_id'] = user_id;
        	$data['created_at'] = date('Y-m-d H:i:s');
        	$this->db->select('pr_tgl_mulai as mulai,pr_tgl_selesai as selesai');
        	$proyek = $this->mymodel->selectdataOne('proyek',array('pr_id'=>$data['proyek_id']));

			$start    = (new DateTime($proyek['mulai']))->modify('first day of this month');
			$end      = (new DateTime($proyek['selesai']))->modify('first day of next month');
			$interval = DateInterval::createFromDateString('1 month');
			$period   = new DatePeriod($start, $interval, $end);

			foreach ($period as $dt) {
			    $data['date'] = $dt->format("Y-m-01") . "<br>\n";
        		$this->db->insert('karyawan_proyek', $data);

			}
        	// print_r($proyek);

			$this->alert->alertsuccess('Success Send Data');
        }
	}

	public function addgaji_deleteproyek()
	{
		# code...
		$id = $this->input->get('id');
		$kp = $this->mymodel->selectdataOne('karyawan_proyek',array('id'=>$id));
		$this->mymodel->deleteData('karyawan_proyek',array('id'=>$kp['id']));
		redirect('workorder/list-timesheets/pegawai/add?idp='.$kp['karyawan_id']);

	}

// -------------------------------------------------------------------

	public function listtimesheetskantor()
	{
		$this->data['page']="matters";
		$this->data['bulan']= array(array("name"=>"01","month"=>"Januari"),array("name"=>"02","month"=>"Februari"),array("name"=>"03","month"=>"Maret"),array("name"=>"04","month"=>"April"),array("name"=>"05","month"=>"Mei"),array("name"=>"06","month"=>"Juni"),array("name"=>"07","month"=>"Juli"),array("name"=>"08","month"=>"Agustus"),array("name"=>"09","month"=>"September"),array("name"=>"10","month"=>"Oktober"),array("name"=>"11","month"=>"November"),array("name"=>"12","month"=>"Desember"));
		$this->data['item'] = $this->mmodel->selectData("item");
		
		$this->render->admin('garden-app/workorder/listtimesheetskantor', $this->data);
	}
	public function addkantor()
	{
		$this->data['page']="matters";
		
		$this->render->admin('garden-app/workorder/addkantor', $this->data);
	}
	public function editkantor($id)
	{
		$this->data['page']="matters";
		$this->data['data']=$this->mymodel->selectdataOne('pengeluaran',array('id'=>$id));
		$this->render->admin('garden-app/workorder/editkantor', $this->data);
	}



	public function listtimesheetskantor_detail()
	{
			$this->data['page']="matters";

			$this->load->view('garden-app/workorder/listtimesheetskantor-detail', $this->data);
	
	}

	public function addkantor_action()
	{
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[date]', '<strong>Tanggal</strong>', 'required');
		// $this->form_validation->set_rules('dt[nominal]', '<strong>Nominal</strong>', 'required');
		$this->form_validation->set_rules('dt[keterangan]', '<strong>keterangan</strong>', 'required');


		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();
			$this->alert->alertdanger($error);
        }else{
        	$data = $this->input->post('dt');
			$a = strtotime($_POST['dt']['date']);
        	$data['date'] = date('Y-m-d',$a);
			$data['kategori'] = "Kantor";

        	$fileName = time().$_FILES['file']['name'];
	        $config['upload_path'] = './uploads/'; //buat folder dengan nama assets di root folder
	        $config['file_name'] = $fileName;
	        $config['allowed_types'] = '*';
	        $config['max_size'] = 10000;

        	$this->load->library('upload');
			$this->upload->initialize($config);
	        if ( ! $this->upload->do_upload('file'))
	        $this->upload->display_errors();
	             
	        $media = $this->upload->data('file');
	        $data["file"] = str_replace(" ","_",$fileName);

			$a = strtotime($_POST['dt']['date']);
        	$data['date'] = date('Y-m-d',$a);
			$data['kategori'] = "Kantor";
        	$data['nominal'] = str_replace(",", "", $_POST['dt']['nominal']);
        	$data['created_at'] = date('Y-m-d H:i:s');
        	$data['user_id'] = user_id;

        	$this->db->insert('pengeluaran',$data);

        	$itemquery = $this->mmodel->selectWhere("item",array("i_nama"=>$data['item']));
        	$cekitem = $itemquery->num_rows();	
        	if ($cekitem>0) {
        		$sub = $this->mymodel->selectdataOne('aktivitas',array('id'=>$data['aktivitas_sub']));
        		$item = $this->mmodel->selectWhere("item", array("i_id"=>$itemquery->row()->i_id))->row();
        		$it['i_id'] = $item->i_id;
        		if($sub['kategori']=="Pakai"){
	        		$it['i_stok'] =  $item->i_stok-$data['qty'];
        		}elseif($sub['kategori']=="Pakai"){
	        		$it['i_stok'] =  $item->i_stok+$data['qty'];
        		}
        		$it['i_satuan'] = $data['satuan_id'];
        		$it['updated_at'] = $data['created_at'];
        		$this->mmodel->updateData("item",$it,array("i_id"=>$it['i_id']));


        	} else {
        		$it['i_nama'] = $data['item'];
        		$it['i_stok'] = $data['qty'];
        		$it['i_satuan'] = $data['satuan_id'];
        		$it['created_at'] = $data['created_at'];
        		$this->db->insert('item', $it);
        	}

        	$this->alert->alertsuccess('Success Input Data');
        }
	}


	public function getstock($name,$sub)
	{

			$name = urldecode($name);
			$itemquery = $this->mmodel->selectWhere("item",array("i_nama"=>$name));
        	$cekitem = $itemquery->num_rows();	
        	$it['i_stok'] = null;
        	if ($cekitem>0) {
        		$sub = $this->mymodel->selectdataOne('aktivitas',array('id'=>$sub));
        		$item = $this->mmodel->selectWhere("item", array("i_id"=>$itemquery->row()->i_id))->row();
        		// $it['i_id'] = $item->i_id;
        		if($sub['kategori']=="Pakai"){
	        		$it['i_stok'] =  $item->i_stok;
        		}else{
        			$it['i_stok'] = null;
        		}

        	}

        	echo json_encode($it);

		
	}

	public function editkantor_action()
	{
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[date]', '<strong>Tanggal</strong>', 'required');
		$this->form_validation->set_rules('dt[aktivitas_sub]', '<strong>Aktivitas Sub</strong>', 'required');
		// $this->form_validation->set_rules('dt[item]', '<strong>Item</strong>', 'required');
		// $this->form_validation->set_rules('dt[nominal]', '<strong>Item</strong>', 'required');
		$this->form_validation->set_rules('dt[keterangan]', '<strong>keterangan</strong>', 'required');


		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();
			$this->alert->alertdanger($error);
        }else{
        	$ids = $this->input->post('ids');
        	$data = $this->input->post('dt');

        	$fileName = time().$_FILES['file']['name'];
	        $config['upload_path'] = './uploads/'; //buat folder dengan nama assets di root folder
	        $config['file_name'] = $fileName;
	        $config['allowed_types'] = '*';
	        $config['max_size'] = 10000;

        	$this->load->library('upload');
			$this->upload->initialize($config);
	        if ( ! $this->upload->do_upload('file'))
	        $this->upload->display_errors();
	             
	        $media = $this->upload->data('file');
	        if ($_FILES['file']['name']) {
	        	$data["file"] = str_replace(" ","_",$fileName);
	        }
	        
			$a = strtotime($_POST['dt']['date']);
        	$data['date'] = date('Y-m-d',$a);
        	$data['nominal'] = str_replace(",", "", $_POST['dt']['nominal']);
        	$data['updated_at'] = date('Y-m-d H:i:s');
        	$this->mymodel->updateData('pengeluaran',$data,array('id'=>$ids));
        	$this->alert->alertsuccess('Success Input Data');
        }
		# code...
	}



	public function listtimesheetskantor_json()
	{
		$sub = $this->input->get('sub');
		$item = $this->input->get('item');
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');
		$kategori = $this->input->get('kategori');
		header('Content-Type: application/json');
        $this->datatables->select('pengeluaran.id,pengeluaran.date,aktivitas.name as sub,item,aktivitas.kategori as kategori, qty,pengeluaran.keterangan,pengeluaran.nominal');
        // $this->datatables->join('karyawan','karyawan.id=pengeluaran.karyawan_id','left');
        $this->datatables->join('aktivitas','aktivitas.id=pengeluaran.aktivitas_sub','left');
        $this->datatables->where(array('pengeluaran.kategori'=>'kantor'));
        if(role==3){
			$this->datatables->where(array('pengeluaran.user_id'=>user_id));
		}
        if ($sub) {
        	$this->datatables->where('aktivitas.id', $sub);
        }
        if ($item) {
        	$this->datatables->where('item', $item);
        }
        if ($kategori) {
        	$this->datatables->where('aktivitas.kategori', $kategori);
        }
        if ($bulan) {
        	$this->datatables->where("date_format(pengeluaran.created_at, '%m') =", $bulan);
        }
        if ($tahun) {
        	$this->datatables->where("date_format(pengeluaran.created_at, '%Y') =", $tahun);
        }
        $this->datatables->from('pengeluaran');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="edit($1)" class="btn btn-xs btn-info"><span class="txt-white fa fa-edit"></span> Edit</a> <!--a onclick="hapus($1)"  class="btn btn-sm btn-danger"><span class="txt-white fa fa-trash-o"></span></a-->  </div>', 'id');
        echo $this->datatables->generate();
	}

	public function  listtimesheetskantor_delete($id)
	{
		$date = $this->mmodel->selectWhere('pengeluaran',array('id'=>$id))->row()->date;


		$date1=date_create($date);
		$date2=date_create(date("Y-m-d"));
		$diff=date_diff($date1,$date2);
		$res = $diff->format("%a");

		if ($res<=7) {
			
			$pengeluaran = $this->mymodel->selectdataOne('pengeluaran',array('id'=>$id));
			$aktivitas = $this->mymodel->selectdataOne('aktivitas',array('id'=>$pengeluaran['aktivitas_sub']));
			if($aktivitas['kategori']=="Pakai"){
				$item = $this->mymodel->selectdataOne('item',array('i_nama'=>$pengeluaran['item']));
				// print_r($item);
				$stock = $item['i_stok']+$pengeluaran['qty'];
				$this->mymodel->updateData('item',array('i_stok'=>$stock),array('i_id'=>$item['i_id']));
			}

			// print_r($pengeluaran);
			$this->mymodel->deleteData('pengeluaran',array('id'=>$id));
		
			redirect('workorder/addkantor');
		} else {
		
			echo "<script type='text/javascript'>alert('Maaf, data yang anda pilih melewati 7 hari setelah pembuatan. Data gagal dihapus');window.location.href='".base_url('workorder/addkantor')."';</script>";
		}
	}

	public function json_item(){
	    $term = $this->input->get('term');
	    $this->db->where("i_nama LIKE '%".$term."%'");
	    $data = $this->mymodel->selectData('item');
	    foreach ($data as $rec) {
	      $json[] = $rec['i_nama']; 
	    }
	    echo json_encode($json);
	}
 

 
  	public function json_detail($nama){
	    $json = $this->mmodel->selectWhere('item',array('i_nama'=>$nama))->row_array();
	    echo json_encode($json);
	}

// -------------------------------------------------------------------

	public function listtimesheetspribadi()
	{
		$this->data['page']="matters";
		$this->data['bulan']= array(array("name"=>"01","month"=>"Januari"),array("name"=>"02","month"=>"Februari"),array("name"=>"03","month"=>"Maret"),array("name"=>"04","month"=>"April"),array("name"=>"05","month"=>"Mei"),array("name"=>"06","month"=>"Juni"),array("name"=>"07","month"=>"Juli"),array("name"=>"08","month"=>"Agustus"),array("name"=>"09","month"=>"September"),array("name"=>"10","month"=>"Oktober"),array("name"=>"11","month"=>"November"),array("name"=>"12","month"=>"Desember"));

		$this->render->admin('garden-app/workorder/listtimesheetspribadi', $this->data);
	}
	public function addpribadi()
	{
		$this->data['page']="matters";
		
		$this->render->admin('garden-app/workorder/addpribadi', $this->data);
	}
	public function editpribadi($id)
	{
		$this->data['page']="matters";
		$this->data['data']=$this->mymodel->selectdataOne('pengeluaran',array('id'=>$id));
		$this->render->admin('garden-app/workorder/editpribadi', $this->data);
	}



	public function listtimesheetspribadi_detail()
	{
			$this->data['page']="matters";

			$this->load->view('garden-app/workorder/listtimesheetspribadi-detail', $this->data);
	
	}

	public function addpribadi_action()
	{
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[date]', '<strong>Tanggal</strong>', 'required');
		$this->form_validation->set_rules('dt[nominal]', '<strong>Nominal</strong>', 'required');
		$this->form_validation->set_rules('dt[keterangan]', '<strong>keterangan</strong>', 'required');


		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();
			$this->alert->alertdanger($error);
        }else{
        	$data = $this->input->post('dt');

        	$fileName = time().$_FILES['file']['name'];
	        $config['upload_path'] = './uploads/'; //buat folder dengan nama assets di root folder
	        $config['file_name'] = $fileName;
	        $config['allowed_types'] = '*';
	        $config['max_size'] = 10000;

        	$this->load->library('upload');
			$this->upload->initialize($config);
	        if ( ! $this->upload->do_upload('file'))
	        $this->upload->display_errors();
	             
	        $media = $this->upload->data('file');
	        $data["file"] = str_replace(" ","_",$fileName);

			$a = strtotime($_POST['dt']['date']);
        	$data['date'] = date('Y-m-d',$a);
			$data['kategori'] = "Pribadi";
        	$data['nominal'] = str_replace(",", "", $_POST['dt']['nominal']);
        	$data['created_at'] = date('Y-m-d H:i:s');
        	$data['user_id'] = user_id;

        	$this->db->insert('pengeluaran',$data);
        	$this->alert->alertsuccess('Success Input Data');
        }
	}

	public function editpribadi_action()
	{
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[date]', '<strong>Tanggal</strong>', 'required');
		$this->form_validation->set_rules('dt[nominal]', '<strong>Nominal</strong>', 'required');
		$this->form_validation->set_rules('dt[keterangan]', '<strong>keterangan</strong>', 'required');


		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();
			$this->alert->alertdanger($error);
        }else{
        	$ids = $this->input->post('ids');
        	$data = $this->input->post('dt');

        	$fileName = time().$_FILES['file']['name'];
	        $config['upload_path'] = './uploads/'; //buat folder dengan nama assets di root folder
	        $config['file_name'] = $fileName;
	        $config['allowed_types'] = '*';
	        $config['max_size'] = 10000;

        	$this->load->library('upload');
			$this->upload->initialize($config);
	        if ( ! $this->upload->do_upload('file'))
	        $this->upload->display_errors();
	             
	        $media = $this->upload->data('file');
	        if ($_FILES['file']['name']) {
	        	$data["file"] = str_replace(" ","_",$fileName);
	        }
	        
			$a = strtotime($_POST['dt']['date']);
        	$data['date'] = date('Y-m-d',$a);
        	$data['nominal'] = str_replace(",", "", $_POST['dt']['nominal']);
        	$data['updated_at'] = date('Y-m-d H:i:s');
        	$data['user_id'] = user_id;
        	
        	$this->mymodel->updateData('pengeluaran',$data,array('id'=>$ids));
        	$this->alert->alertsuccess('Success Input Data');
        }
		# code...
	}



	public function listtimesheetspribadi_json()
	{
		$sub = $this->input->get('sub');
		$kategori = $this->input->get('kategori');
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');
		header('Content-Type: application/json');
        $this->datatables->select('pengeluaran.id,pengeluaran.date,aktivitas.name as sub,aktivitas.kategori as kategori,pengeluaran.keterangan,pengeluaran.nominal');
        // $this->datatables->join('karyawan','karyawan.id=pengeluaran.karyawan_id','left');
        $this->datatables->join('aktivitas','aktivitas.id=pengeluaran.aktivitas_sub','left');
        $this->datatables->where(array('pengeluaran.kategori'=>'Pribadi'));
        if ($sub) {
        	$this->datatables->where('aktivitas.id', $sub);
        }
        if ($kategori) {
        	$this->datatables->where('aktivitas.kategori', $kategori);
        }
        if ($bulan) {
        	$this->datatables->where("date_format(pengeluaran.created_at, '%m') =", $bulan);
        }
        if ($tahun) {
        	$this->datatables->where("date_format(pengeluaran.created_at, '%Y') =", $tahun);
        }
        $this->datatables->from('pengeluaran');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="edit($1)" class="btn btn-xs btn-info"><span class="txt-white fa fa-edit"></span>Edit</a> <!--a onclick="hapus($1)"  class="btn btn-sm btn-danger"><span class="txt-white fa fa-trash-o"></span></a-->  </div>', 'id');
        echo $this->datatables->generate();
	}

	public function  listtimesheetspribadi_delete($id)
	{
		$date = $this->mmodel->selectWhere('pengeluaran',array('id'=>$id))->row()->date;
		$date1=date_create($date);
		$date2=date_create(date("Y-m-d"));
		$diff=date_diff($date1,$date2);
		$res = $diff->format("%a");

		if ($res<=7) {
			$this->mymodel->deleteData('pengeluaran',array('id'=>$id));
			redirect('workorder/addpribadi');
		} else {
			echo "<script type='text/javascript'>alert('Maaf, data yang anda pilih melewati 7 hari setelah pembuatan. Data gagal dihapus');window.location.href='".base_url('workorder/addpribadi')."';</script>";
		}
		


	}
// -------------------------------------------------------------------

	public function timesheets()
	{
		$this->data['page']="matters";
		
		$this->render->admin('garden-app/workorder/timesheets', $this->data);
	}
	public function listtimesheetsreview()
	{
		$this->data['page']="matters";
		
		$this->render->admin('garden-app/workorder/listtimesheetsreview', $this->data);
	}
	public function reviewtimesheets()
	{
		$this->data['page']="matters";
		
		$this->render->admin('garden-app/workorder/reviewtimesheets', $this->data);
	}
	

	public function ceksub($proyek)
	{
			// $subs = $this->mymodel->selectdataOne('aktivitas',array('id'=>$sub));

			

			$parent = $this->mymodel->selectdataOne('aktivitas',array('name'=>'Kantor'));
			if($proyek!=0){
				$this->db->where(array('kategori'=>'Pakai'));	
			}
			$sub = $this->mymodel->selectWhere('aktivitas',array('parent'=>$parent['id']));
			foreach ($sub as $s) {
				$data[] = array(
							'value'=>$s['id'],
							'option'=>$s['name'],
							);
			}
			echo json_encode($data);
		# code...
	}
	
}