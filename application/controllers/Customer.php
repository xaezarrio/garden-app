<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	/*
	Author 		: Hafidz Rozaq NJ
	Edited By 	: Iqbal Luthfillah
	Last Edit 	: -
	App Ver 	: 2.0.0 Gatoko Smart
	*/

	function __construct() {
		parent::__construct();
		
	}
	
	public function add()
	{
		$this->data['page']="customer";
		
		$this->render->admin('garden-app/customer/add', $this->data);
	}
	public function listcustomer()
	{
		$this->data['page']="customer";
		$this->data['data']=$this->mmodel->selectData("pelanggan");
		$this->render->admin('garden-app/customer/list', $this->data);
	}
	public function edit($id)
	{
		$this->data['page']="customer";
		$this->data['pelanggan'] = $this->mmodel->selectWhere("pelanggan",array("p_id"=>$id));
		
		$this->render->admin('garden-app/customer/edit', $this->data);
	}
	public function detail($id)
	{
		$this->data['page']="customer";
		$this->data['pelanggan'] = $this->mmodel->selectWhere("pelanggan",array("p_id"=>$id));
		$this->data['proyek'] = $this->mmodel->selectWhere("proyek",array("pr_idpelanggan"=>$id));
		
		$this->render->admin('garden-app/customer/detail', $this->data);
	}

	public function save(){
		$param = $this->input->post();
		// print_r($param);

		$fileName = time().$_FILES['p_doc_file']['name'];
        $config['upload_path'] = './uploads/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000;
        $fileName2 = time().$_FILES['p_doc_file2']['name'];
        $config2['upload_path'] = './uploads/'; //buat folder dengan nama assets di root folder
        $config2['file_name'] = $fileName2;
        $config2['allowed_types'] = '*';
        $config2['max_size'] = 10000;
         
        $this->load->library('upload');

        $this->upload->initialize($config);
         
        if ( ! $this->upload->do_upload('p_doc_file'))
        $this->upload->display_errors();
             
        $media = $this->upload->data('p_doc_file');
        $param["p_doc_path"] = str_replace(" ","_",$fileName);
        $this->upload->initialize($config2);
         
        if ( ! $this->upload->do_upload('p_doc_file2'))
        $this->upload->display_errors();
             
        $media = $this->upload->data('p_doc_file2');
        $param["p_doc_path2"] = str_replace(" ","_",$fileName2);

        $param['created_at']= date("Y-m-d H:i:s");
        $param['created_by']= "";
        $query = $this->mmodel->insertData("pelanggan",$param);

        redirect('customer/list-customer');


	}

	public function editproses(){
		$param = $this->input->post();
		// print_r($param);
        $this->load->library('upload');
		if ($_FILES['p_doc_file']['name']) {
			$fileName = time().$_FILES['p_doc_file']['name'];
	        $config['upload_path'] = './uploads/'; //buat folder dengan nama assets di root folder
	        $config['file_name'] = $fileName;
	        $config['allowed_types'] = '*';
	        $config['max_size'] = 10000;
	        
	        $this->upload->initialize($config);
	         
	        if ( ! $this->upload->do_upload('p_doc_file'))
	        $this->upload->display_errors();

	        $media = $this->upload->data('p_doc_file');
	        $param["p_doc_path"] = str_replace(" ","_",$fileName);
		}
		
		if ($_FILES['p_doc_file2']['name']) {
	        $fileName2 = time().$_FILES['p_doc_file2']['name'];
	        $config2['upload_path'] = './uploads/'; //buat folder dengan nama assets di root folder
	        $config2['file_name'] = $fileName2;
	        $config2['allowed_types'] = '*';
	        $config2['max_size'] = 10000;
	         
		    $this->upload->initialize($config2);
	        if ( ! $this->upload->do_upload('p_doc_file2'))
	        $this->upload->display_errors();
	             
	        $media = $this->upload->data('p_doc_file2');
	        $param["p_doc_path2"] = str_replace(" ","_",$fileName2);
		}
             
         

        $param['created_at']= date("Y-m-d H:i:s");
        $param['created_by']= "";
        $query = $this->mmodel->updateData("pelanggan",$param,array("p_id"=>$param['p_id']));

        redirect('customer/list-customer');


	}

	function delete($id){
		$this->db->delete('pelanggan', array("p_id"=>$id));
		redirect('customer/list-customer');
	}
	
}