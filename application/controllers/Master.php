<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	/*
	Author 		: Hafidz Rozaq NJ
	Edited By 	: Iqbal Luthfillah
	Last Edit 	: -
	App Ver 	: 2.0.0 Gatoko Smart
	*/

	function __construct() {
		parent::__construct();
		
	}
	
	public function aktivitas($tipe)
	{
		$this->data['page']="office";
		$this->data['tipe']=$tipe;
		if ($tipe) {
			$this->data['judul']="Enable";
		} else{
			$this->data['judul']="Disable";
		}
		
		$this->render->admin('garden-app/master/aktivitas', $this->data);
	}

	public function aktivitas_data()
	{
		$tipe=$this->input->get('tipe');
		$data['where'] = "";
		$data['where'] .= " aktivitas.parent = 0 ";			
        $this->db->select('aktivitas.*');
		$this->db->where($data['where']);
		// $this->db->where('status', $tipe);
		$a = $this->db->order_by('id ASC')->get('aktivitas');
        $data["data"]   =   $a->result_array();
		$data['tipe']=$tipe;
		$this->load->view('garden-app/master/aktivitas-data',$data);	
	}

	public function aktivitas_store()
	{
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[name]', '<strong>Name</strong>', 'required');
		$this->form_validation->set_rules('dt[kategori]', '<strong>Kategori</strong>', 'required');

		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();
			$this->alert->alertdanger($error);
        }else{
        	$data = $this->input->post('dt');
        	$data['created_at'] = date('Y-m-d H:i:s');
        	$this->db->insert('aktivitas',$data);
        	$this->alert->alertsuccess('Success Input Data');
        }
	}

	public function aktivitas_edit($id)
	{
		// $this->data['page_name'] = 'master';
		$this->data['aktivitas'] = $this->mymodel->selectdataOne('aktivitas',array('id'=>$id));
		$this->load->view('garden-app/master/aktivitas-edit',$this->data);

	}

	public function aktivitas_update()
	{
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[name]', '<strong>Name</strong>', 'required');
		$this->form_validation->set_rules('dt[kategori]', '<strong>Kategori</strong>', 'required');

		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();
			$this->alert->alertdanger($error);
        }else{
        	$data = $this->input->post('dt');
        	$id = $this->input->post('id');
        	$data['updated_at'] = date('Y-m-d H:i:s');
        	$this->mymodel->updateData('aktivitas',$data,array('id'=>$id));
        	$this->alert->alertsuccess('Success Update Data');
        }
	}

	public function aktivitas_delete($id,$tipe)
	{
		// $this->mymodel->deleteData('aktivitas',array('id'=>$id));
		$this->mmodel->updateData('aktivitas', array("status"=>$tipe),array('id'=>$id));
		$this->alert->alertsuccess('Success Disable Data');
	}

	public function aktivitas_js()
	{
		# code...
		$this->load->view('garden-app/master/aktivitas-js');
	}

// ===========================================================================================
	public function costcenter()
	{
		$this->data['page_name'] = 'master';
		$this->render->admin('garden-app/master/costcenter',$this->data);
	}
	public function costcenterjson()
	{
		header('Content-Type: application/json');
        $this->datatables->select('costcenter.id,costcenter.name');
        // $this->datatables->join('role','user.role_id=role.id','left');
        // $this->datatables->where(array('status'=>0));
        $this->datatables->from('costcenter');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="edit($1)" class="btn btn-sm btn-info"><span class="txt-white fa fa-edit"></span></a> <a onclick="hapus($1)"  class="btn btn-sm btn-danger"><span class="txt-white fa fa-trash-o"></span></a>  </div>', 'id');
        echo $this->datatables->generate();
	}
	public function costcenter_js()
	{
		# code...
		$this->load->view('garden-app/master/costcenter-js');

	}

	public function costcenter_store()
	{
		# code...
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[name]', '<strong>Name</strong>', 'required');
		if ($this->form_validation->run() == FALSE){
			$error =  validation_errors();
			$this->alert->alertdanger($error);
             
        }else{
        	$dt = $this->input->post('dt');
	    	$dt['created_at'] = date('Y-m-d H:i:s');
        	$this->db->insert('costcenter',$dt);
        	$this->alert->alertsuccess('Success Send Data');

        }

	}
	public function costcenter_edit($id)
	{
		# code...
		$data['costcenter'] = $this->mymodel->selectdataOne('costcenter',array('id'=>$id));
		$this->load->view('garden-app/master/costcenter-edit',$data);
	}

	public function costcenter_update()
	{
		# code...
		# code...
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[name]', '<strong>Name</strong>', 'required');
		if ($this->form_validation->run() == FALSE){
			$error =  validation_errors();
			$this->alert->alertdanger($error);
             
        }else{
        	$dt = $this->input->post('dt');
        	$ids = $this->input->post('ids');
	    	$dt['updated_at'] = date('Y-m-d H:i:s');
        	$this->mymodel->updateData('costcenter',$dt,array('id'=>$ids));
        	$this->alert->alertsuccess('Success Send Data');
        }
	}

	public function costcenter_delete($id)
	{
		# code...
		$this->mymodel->deleteData('costcenter',array('id'=>$id));
    	// $this->alert->alertsuccess('Success Send Data');
		redirect('master/cost-center');


	}
	// ===========================================================================================

	// ===========================================================================================
	public function karyawan()
	{
		$this->data['page_name'] = 'master';
		$this->render->admin('garden-app/master/karyawan',$this->data);
	}
	public function karyawanjson()
	{
		header('Content-Type: application/json');
        $this->datatables->select('karyawan.id,karyawan.name,karyawan.sallary');
        // $this->datatables->join('role','user.role_id=role.id','left');
        // $this->datatables->where(array('status'=>0));
        $this->datatables->from('karyawan');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="edit($1)" class="btn btn-sm btn-info"><span class="txt-white fa fa-edit"></span></a> <a onclick="hapus($1)"  class="btn btn-sm btn-danger"><span class="txt-white fa fa-trash-o"></span></a>  </div>', 'id');
        echo $this->datatables->generate();
	}
	public function karyawan_js()
	{
		# code...
		$this->load->view('garden-app/master/karyawan-js');

	}

	public function karyawan_store()
	{
		# code...
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[name]', '<strong>Name</strong>', 'required');
		$this->form_validation->set_rules('dt[sallary]', '<strong>sallary</strong>', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$error =  validation_errors();
			$this->alert->alertdanger($error);
             
        }else{
        	$dt = $this->input->post('dt');
        	$dt['sallary'] = str_replace(",", "", $_POST['dt']['sallary']);
        	
	    	$dt['created_at'] = date('Y-m-d H:i:s');
        	$this->db->insert('karyawan',$dt);
        	$this->alert->alertsuccess('Success Send Data');

        }

	}
	public function karyawan_edit($id)
	{
		# code...
		$data['karyawan'] = $this->mymodel->selectdataOne('karyawan',array('id'=>$id));
		$this->load->view('garden-app/master/karyawan-edit',$data);
	}

	public function karyawan_update()
	{
		# code...
		# code...
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[name]', '<strong>Name</strong>', 'required');
		$this->form_validation->set_rules('dt[sallary]', '<strong>sallary</strong>', 'required');

		if ($this->form_validation->run() == FALSE){
			$error =  validation_errors();
			$this->alert->alertdanger($error);
             
        }else{
        	$dt = $this->input->post('dt');
        	$ids = $this->input->post('ids');
        	$dt['sallary'] = str_replace(",", "", $_POST['dt']['sallary']);
	    	$dt['updated_at'] = date('Y-m-d H:i:s');
        	$this->mymodel->updateData('karyawan',$dt,array('id'=>$ids));
        	$this->alert->alertsuccess('Success Send Data');
        }
	}

	public function karyawan_delete($id)
	{
		# code...
		$this->mymodel->deleteData('karyawan',array('id'=>$id));
    	// $this->alert->alertsuccess('Success Send Data');
		redirect('master/karyawan');


	}
	// ===========================================================================================

	public function aset()
	{
		$this->data['page']="office";
		
		$this->render->admin('garden-app/master/aset', $this->data);
	}

	// ===========================================================================================
	public function toko()
	{
		$this->data['page_name'] = 'master';
		$this->render->admin('garden-app/master/toko',$this->data);
	}
	public function tokojson()
	{
		header('Content-Type: application/json');
        $this->datatables->select('toko.id,toko.name,toko.address,toko.telp');
        // $this->datatables->join('role','user.role_id=role.id','left');
        // $this->datatables->where(array('status'=>0));
        $this->datatables->from('toko');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="edit($1)" class="btn btn-sm btn-info"><span class="txt-white fa fa-edit"></span></a> <a onclick="hapus($1)"  class="btn btn-sm btn-danger"><span class="txt-white fa fa-trash-o"></span></a>  </div>', 'id');
        echo $this->datatables->generate();
	}
	public function toko_js()
	{
		# code...
		$this->load->view('garden-app/master/toko-js');

	}

	public function toko_store()
	{
		# code...
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[name]', '<strong>Nama</strong>', 'required');
		$this->form_validation->set_rules('dt[address]', '<strong>Alamat</strong>', 'required');
		$this->form_validation->set_rules('dt[telp]', '<strong>Telp</strong>', 'required');

		if ($this->form_validation->run() == FALSE){
			$error =  validation_errors();
			$this->alert->alertdanger($error);
             
        }else{
        	$dt = $this->input->post('dt');
	    	$dt['created_at'] = date('Y-m-d H:i:s');
        	$this->db->insert('toko',$dt);
        	$this->alert->alertsuccess('Success Send Data');

        }

	}
	public function toko_edit($id)
	{
		# code...
		$data['toko'] = $this->mymodel->selectdataOne('toko',array('id'=>$id));
		$this->load->view('garden-app/master/toko-edit',$data);
	}

	public function toko_update()
	{
		# code...
		# code...
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[name]', '<strong>Name</strong>', 'required');
		$this->form_validation->set_rules('dt[address]', '<strong>Alamat</strong>', 'required');
		$this->form_validation->set_rules('dt[telp]', '<strong>Telp</strong>', 'required');
		if ($this->form_validation->run() == FALSE){
			$error =  validation_errors();
			$this->alert->alertdanger($error);
             
        }else{
        	$dt = $this->input->post('dt');
        	$ids = $this->input->post('ids');
	    	$dt['updated_at'] = date('Y-m-d H:i:s');
        	$this->mymodel->updateData('toko',$dt,array('id'=>$ids));
        	$this->alert->alertsuccess('Success Send Data');
        }
	}

	public function toko_delete($id)
	{
		# code...
		$this->mymodel->deleteData('toko',array('id'=>$id));
    	// $this->alert->alertsuccess('Success Send Data');
		redirect('master/toko');


	}
	// ===========================================================================================
	// ===========================================================================================
	public function perusahaan()
	{
		$this->data['page_name'] = 'master';
		$this->render->admin('garden-app/master/perusahaan',$this->data);
	}
	public function perusahaanjson()
	{
		header('Content-Type: application/json');
        $this->datatables->select('perusahaan.id,perusahaan.name,perusahaan.address,perusahaan.telp');
        // $this->datatables->join('role','user.role_id=role.id','left');
        // $this->datatables->where(array('status'=>0));
        $this->datatables->from('perusahaan');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="edit($1)" class="btn btn-sm btn-info"><span class="txt-white fa fa-edit"></span></a> <a onclick="hapus($1)"  class="btn btn-sm btn-danger"><span class="txt-white fa fa-trash-o"></span></a>  </div>', 'id');
        echo $this->datatables->generate();
	}
	public function perusahaan_js()
	{
		# code...
		$this->load->view('garden-app/master/perusahaan-js');

	}

	public function perusahaan_store()
	{
		# code...
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[name]', '<strong>Nama</strong>', 'required');
		$this->form_validation->set_rules('dt[address]', '<strong>Alamat</strong>', 'required');
		$this->form_validation->set_rules('dt[telp]', '<strong>Telp</strong>', 'required');

		if ($this->form_validation->run() == FALSE){
			$error =  validation_errors();
			$this->alert->alertdanger($error);
             
        }else{
        	$dt = $this->input->post('dt');
	    	$dt['created_at'] = date('Y-m-d H:i:s');
        	$this->db->insert('perusahaan',$dt);
        	$this->alert->alertsuccess('Success Send Data');

        }

	}
	public function perusahaan_edit($id)
	{
		# code...
		$data['perusahaan'] = $this->mymodel->selectdataOne('perusahaan',array('id'=>$id));
		$this->load->view('garden-app/master/perusahaan-edit',$data);
	}

	public function perusahaan_update()
	{
		# code...
		# code...
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[name]', '<strong>Name</strong>', 'required');
		$this->form_validation->set_rules('dt[address]', '<strong>Alamat</strong>', 'required');
		$this->form_validation->set_rules('dt[telp]', '<strong>Telp</strong>', 'required');
		if ($this->form_validation->run() == FALSE){
			$error =  validation_errors();
			$this->alert->alertdanger($error);
             
        }else{
        	$dt = $this->input->post('dt');
        	$ids = $this->input->post('ids');
	    	$dt['updated_at'] = date('Y-m-d H:i:s');
        	$this->mymodel->updateData('perusahaan',$dt,array('id'=>$ids));
        	$this->alert->alertsuccess('Success Send Data');
        }
	}

	public function perusahaan_delete($id)
	{
		# code...
		$this->mymodel->deleteData('perusahaan',array('id'=>$id));
    	// $this->alert->alertsuccess('Success Send Data');
		redirect('master/perusahaan');


	}
}