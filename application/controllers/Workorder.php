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
		
	}
	
	public function listtimesheets()
	{
		$this->data['page']="matters";
		
		$this->render->admin('garden-app/workorder/listtimesheets', $this->data);
	}
	public function addgaji()
	{
		$this->data['page']="matters";
		
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
			$a = strtotime($_POST['dt']['date']);
        	$data['date'] = date('Y-m-d',$a);
			$data['kategori'] = "Pegawai";
        	$data['nominal'] = str_replace(",", "", $_POST['dt']['nominal']);
        	$data['created_at'] = date('Y-m-d H:i:s');
        	$this->db->insert('pengeluaran',$data);
        	$this->alert->alertsuccess('Success Input Data');
        }
	}

	public function editgaji_action()
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
        	$ids = $this->input->post('ids');
        	$data = $this->input->post('dt');
			$a = strtotime($_POST['dt']['date']);
        	$data['date'] = date('Y-m-d',$a);
        	$data['nominal'] = str_replace(",", "", $_POST['dt']['nominal']);
        	$data['updated_at'] = date('Y-m-d H:i:s');
        	$this->mymodel->updateData('pengeluaran',$data,array('id'=>$ids));
        	$this->alert->alertsuccess('Success Input Data');
        }
		# code...
	}



	public function listtimesheets_json()
	{
		header('Content-Type: application/json');
        $this->datatables->select('pengeluaran.id,pengeluaran.date,karyawan.name as karyawan,aktivitas.name as sub,pengeluaran.keterangan,pengeluaran.nominal');
        $this->datatables->join('karyawan','karyawan.id=pengeluaran.karyawan_id','left');
        $this->datatables->join('aktivitas','aktivitas.id=pengeluaran.aktivitas_sub','left');
        $this->datatables->where(array('pengeluaran.kategori'=>'Pegawai'));
        $this->datatables->from('pengeluaran');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="edit($1)" class="btn btn-sm btn-info"><span class="txt-white fa fa-edit"></span></a> <a onclick="hapus($1)"  class="btn btn-sm btn-danger"><span class="txt-white fa fa-trash-o"></span></a>  </div>', 'id');
        echo $this->datatables->generate();
	}

	public function  listtimesheets_delete($id)
	{
		# code...
		$this->mymodel->deleteData('pengeluaran',array('id'=>$id));
		redirect('workorder/list-timesheets/pegawai');


	}

// -------------------------------------------------------------------

	public function listtimesheetskantor()
	{
		$this->data['page']="matters";
		
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
		$this->form_validation->set_rules('dt[aktivitas_sub]', '<strong>Aktivitas Sub</strong>', 'required');
		$this->form_validation->set_rules('dt[item]', '<strong>Item</strong>', 'required');
		$this->form_validation->set_rules('dt[nominal]', '<strong>Item</strong>', 'required');
		$this->form_validation->set_rules('dt[nominal]', '<strong>Nominal</strong>', 'required');
		$this->form_validation->set_rules('dt[keterangan]', '<strong>keterangan</strong>', 'required');


		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();
			$this->alert->alertdanger($error);
        }else{
        	$data = $this->input->post('dt');
			$a = strtotime($_POST['dt']['date']);
        	$data['date'] = date('Y-m-d',$a);
			$data['kategori'] = "Kantor";
        	$data['nominal'] = str_replace(",", "", $_POST['dt']['nominal']);
        	$data['created_at'] = date('Y-m-d H:i:s');
        	$this->db->insert('pengeluaran',$data);
        	$this->alert->alertsuccess('Success Input Data');
        }
	}

	public function editkantor_action()
	{
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[date]', '<strong>Tanggal</strong>', 'required');
		$this->form_validation->set_rules('dt[aktivitas_sub]', '<strong>Aktivitas Sub</strong>', 'required');
		$this->form_validation->set_rules('dt[item]', '<strong>Item</strong>', 'required');
		$this->form_validation->set_rules('dt[nominal]', '<strong>Item</strong>', 'required');
		$this->form_validation->set_rules('dt[nominal]', '<strong>Nominal</strong>', 'required');
		$this->form_validation->set_rules('dt[keterangan]', '<strong>keterangan</strong>', 'required');


		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();
			$this->alert->alertdanger($error);
        }else{
        	$ids = $this->input->post('ids');
        	$data = $this->input->post('dt');
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
		header('Content-Type: application/json');
        $this->datatables->select('pengeluaran.id,pengeluaran.date,aktivitas.name as sub,pengeluaran.keterangan,pengeluaran.nominal,pengeluaran.qty,satuan.name as satuan,pengeluaran.item');
        $this->datatables->join('satuan','satuan.id=pengeluaran.satuan_id','left');
        $this->datatables->join('aktivitas','aktivitas.id=pengeluaran.aktivitas_sub','left');
        $this->datatables->where(array('pengeluaran.kategori'=>'Kantor'));
        $this->datatables->from('pengeluaran');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="edit($1)" class="btn btn-sm btn-info"><span class="txt-white fa fa-edit"></span></a> <a onclick="hapus($1)"  class="btn btn-sm btn-danger"><span class="txt-white fa fa-trash-o"></span></a>  </div>', 'id');
        echo $this->datatables->generate();
	}

	public function  listtimesheetskantor_delete($id)
	{
		# code...
		$this->mymodel->deleteData('pengeluaran',array('id'=>$id));
		redirect('workorder/list-timesheets/kantor');


	}
// -------------------------------------------------------------------

	public function listtimesheetspribadi()
	{
		$this->data['page']="matters";
		
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
			$a = strtotime($_POST['dt']['date']);
        	$data['date'] = date('Y-m-d',$a);
			$data['kategori'] = "Pribadi";
        	$data['nominal'] = str_replace(",", "", $_POST['dt']['nominal']);
        	$data['created_at'] = date('Y-m-d H:i:s');
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
			$a = strtotime($_POST['dt']['date']);
        	$data['date'] = date('Y-m-d',$a);
        	$data['nominal'] = str_replace(",", "", $_POST['dt']['nominal']);
        	$data['updated_at'] = date('Y-m-d H:i:s');
        	$this->mymodel->updateData('pengeluaran',$data,array('id'=>$ids));
        	$this->alert->alertsuccess('Success Input Data');
        }
		# code...
	}



	public function listtimesheetspribadi_json()
	{
		header('Content-Type: application/json');
        $this->datatables->select('pengeluaran.id,pengeluaran.date,aktivitas.name as sub,pengeluaran.keterangan,pengeluaran.nominal');
        // $this->datatables->join('karyawan','karyawan.id=pengeluaran.karyawan_id','left');
        $this->datatables->join('aktivitas','aktivitas.id=pengeluaran.aktivitas_sub','left');
        $this->datatables->where(array('pengeluaran.kategori'=>'Pribadi'));
        $this->datatables->from('pengeluaran');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="edit($1)" class="btn btn-sm btn-info"><span class="txt-white fa fa-edit"></span></a> <a onclick="hapus($1)"  class="btn btn-sm btn-danger"><span class="txt-white fa fa-trash-o"></span></a>  </div>', 'id');
        echo $this->datatables->generate();
	}

	public function  listtimesheetspribadi_delete($id)
	{
		# code...
		$this->mymodel->deleteData('pengeluaran',array('id'=>$id));
		redirect('workorder/list-timesheets/pribadi');


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
	
	
}