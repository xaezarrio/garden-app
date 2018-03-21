<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
	
	public function proyek()
	{
		$this->data['page']="report";
		if(role==3){
			$this->db->where(array('created_by'=>user_id));
		}
		
		$this->data['matters']=$this->mmodel->selectData("proyek");
		
		$this->render->admin('garden-app/report/report-proyek', $this->data);
	}


	public function proyek_detail($id)
	{
		$this->data['page']="report";
		// $this->data['matters']=$this->mymodel->selectWhere("proyek",array('pr_id'=>$id));
		$this->data['matters']=$this->mmodel->selectWhere("proyek",array("pr_id"=>$id))->row();
		
		$this->data['page']="matters";
		$this->data['aktivitas']=$this->mmodel->selectWhere("aktivitas",array("parent"=>"0"));
		$this->data['ap']=$this->mmodel->selectWhere("aktivitas_proyek",array("ap_idproyek"=>$id));
		$this->data['id'] = $id;
		

		
		$this->render->admin('garden-app/report/report-proyek-detail', $this->data);
	}
	
	public function proyek_excel($id)
	{	
		$this->data['page']="report";
		$this->data['matters']=$this->mmodel->selectWhere("proyek",array("pr_id"=>$id))->row();
		
		$this->data['page']="matters";
		$this->data['aktivitas']=$this->mmodel->selectWhere("aktivitas",array("parent"=>"0"));
		$this->data['ap']=$this->mmodel->selectWhere("aktivitas_proyek",array("ap_idproyek"=>$id));
		$this->data['id'] = $id;
		$this->load->view('garden-app/report/report-proyek-excel', $this->data);
	
	}
}