<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matters extends CI_Controller {

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
	
	public function add()
	{
		$this->data['page']="matters";
		$this->data['pelanggan'] = $this->mmodel->selectData("pelanggan");
		$this->data['cost'] = $this->mmodel->selectData("costcenter");
		$this->data['perusahaan'] = $this->mmodel->selectData("perusahaan");
		
		$this->render->admin('garden-app/matters/add', $this->data);
	}
	public function listmatters()
	{
		$this->data['page']="matters";
		if(role==3){
			$this->db->where(array('created_by'=>user_id));
		}
		$this->data['matters']=$this->mmodel->selectData("proyek");

		$this->render->admin('garden-app/matters/list', $this->data);
	}
	public function edit($id)
	{
		$this->data['page']="matters";
		$this->data['pelanggan'] = $this->mmodel->selectData("pelanggan");
		$this->data['perusahaan'] = $this->mmodel->selectData("perusahaan");

		$this->data['matters']=$this->mymodel->selectdataOne("proyek",array("pr_id"=>$id));

		$this->data['cost'] = $this->mmodel->selectData("costcenter");
		
		
		$this->render->admin('garden-app/matters/edit', $this->data);
	}
	public function detail($id)
	{
		$this->data['page']="matters";
		$this->data['matters']=$this->mmodel->selectWhere("proyek",array("pr_id"=>$id))->row();
		$this->data['aktivitas']=$this->mmodel->selectWhere("aktivitas",array("parent"=>"0"));
		$this->data['ap']=$this->mmodel->selectWhere("aktivitas_proyek",array("ap_idproyek"=>$id));
		$this->data['id'] = $id;
		$this->render->admin('garden-app/matters/detail', $this->data);
	}

	public function aktivitas($id){
		$akt = $this->mmodel->selectWhere("aktivitas",array("parent"=>$id))->result();
		foreach ($akt as $akt) {
			echo '<option value="'.$akt->id.'" data-kategori="'.$akt->kategori.'">'.$akt->name.'</option>';
		}
	}

	public function add_aktivitas(){
		$param = $this->input->post('dt');
		$param['ap_nominal'] = str_replace(",", "",$param['ap_nominal']);
	        $dir  = "webfile/aktivitas-proyek/";
			$config['upload_path']          = $dir;
			$config['allowed_types']        = '*';
			// $config['max_size']             = 100;
			$config['max_width']            = 500;
			$config['max_height']           = 500;
			$config['file_name']           = rand(1,1000);

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar')){
				$error = $this->upload->display_errors();
				$this->alert->alertdanger($error);		
			}else{
				$param['created_at'] = date('Y-m-d H:i:s');
				// $param['user_id'] = user_id;
				
			   	$str = $this->db->insert('aktivitas_proyek', $param);
			   	$last_id = $this->db->insert_id();
			   	$image = $this->upload->data();
	   			$data = array(
			   				'id' => '',
			   				'name'=> $image['file_name'],
			   				'type'=> $image['file_type'],
			   				'size'=> $image['file_size'],
			   				'dir'=> $dir.$image['file_name'],
			   				'table'=> 'aktivitas_proyek',
			   				'table_id'=> $last_id,
			   				'user_id'=> user_id ,
			   				'desc'=>"",
			   				'created_at'=>date('Y-m-d H:i:s')

			   	 		);


			   	$str = $this->db->insert('file', $data);
        		if($str){
					$this->alert->alertsuccess('Success Input Data');
        		}else{
					$this->alert->alertdanger();		
        		}
			}
		// $query = $this->mmodel->insertData("aktivitas_proyek",$param);
		// redirect('matters/detail/'.$param['ap_idproyek']);
	}

	public function delete_aktivitas($id)
	{
		$aktpro = $this->mymodel->selectdataOne('aktivitas_proyek',array('ap_id'=>$id));
		$file = $this->mymodel->selectdataOne('file',array('table_id'=>$id,'table'=>'aktivitas_proyek'));
		@unlink($file['dir']);
		$this->mymodel->deleteData('aktivitas_proyek',array('ap_id'=>$id));
		$this->mymodel->deleteData('file',array('id'=>$file['id']));
		redirect('matters/detail/'.$aktpro['ap_idproyek']);
	}

	public function payment($id)
	{
		$this->data['page']="matters";
		$this->data['id'] = $id;
		$this->data['matters']=$this->mmodel->selectWhere("proyek",array("pr_id"=>$id))->row();
		
		$this->render->admin('garden-app/matters/payment', $this->data);
	}
	public function save(){
		$param = $this->input->post('dt');
		$param['pr_nilai_kontrak'] = str_replace(",", "", $param['pr_nilai_kontrak']);
		$param['pr_modal'] = str_replace(",", "", $param['pr_modal']);

		$param['pr_status'] = "open";
		$param['created_at'] = date("Y-m-d H:i:s");
		$param['created_by'] = user_id;
		$query = $this->mmodel->insertData("proyek",$param);
		redirect('matters/list-matters');
	}

	public function save_edit(){
		$id = $this->input->post('id');
		$param = $this->input->post('dt');
		$param['pr_nilai_kontrak'] = str_replace(",", "", $param['pr_nilai_kontrak']);
		// $param['pr_modal'] = str_replace(",", "", $param['pr_modal']);
		$param['update_at'] = date("Y-m-d H:i:s");
		$param['update_by'] = "";

		$modal = $this->input->post('modal');
		$i=0;
		foreach ($modal as $mdl) {
		if($mdl!=""){
			$nominal[] = str_replace(",", "", $_POST['nominal'][$i]);
			$bunga[] = str_replace(",", "", $_POST['bunga'][$i]);

			$modals[] = $mdl;		
		}
		$i++; }	

		$nm = json_encode($nominal);
		$md = json_encode($modals);
		$bng = json_encode($bunga);

		$param['pr_modal'] = $nm;
		$param['pr_sumber'] = $md;
		$param['pr_bunga'] = $bng;



		$query = $this->mymodel->updateData("proyek",$param,array('pr_id'=>$id));
		redirect('matters/list-matters');
	}

	public function savedocument()
	{

		// $this->form_validation->set_rules('gambar[]', '<strong>"File"</strong>', 'required');
		$this->form_validation->set_rules('desc', '<strong>"Description"</strong>', 'required');

		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();
			$this->alert->alertdanger($error);
        }else{
			$dir  = "webfile/matters/";
			$desc = $this->input->post('desc');
			$id = $this->input->post('id');

		   	foreach ($_FILES['gambar']['name'] as $key => $value) {
		   		$exp = explode('.', $_FILES['gambar']['name'][$key]);
		   		$exnt = $exp[1];
		   		$name = substr($exp[0], 0,5);
		   		$file_name = rand(1,1000).$name.".".$exnt;
		   		$uploadimg = move_uploaded_file($_FILES["gambar"]['tmp_name'][$key], $dir.$file_name);
			   	
		   			$data = array(
				   				'id' => '',
				   				'name'=> $_FILES['gambar']['name'][$key],
				   				'type'=> $_FILES['gambar']['type'][$key],
				   				'size'=> $_FILES['gambar']['size'][$key],
				   				'dir'=> $dir.$file_name,
				   				'table'=> 'proyek',
				   				'table_id'=> $id,
				   				'user_id'=> user_id ,
				   				'desc'=>$desc,
				   				'created_at'=>date('Y-m-d H:i:s')

				   	 		);

				   	$str = $this->db->insert('file', $data);
			}

			$this->alert->alertsuccess('Success Send Data');
		}
	}


	public function aktivitas_excel($id)
	{
		$this->data['matters']=$this->mmodel->selectWhere("proyek",array("pr_id"=>$id))->row();
		$this->data['ap']=$this->mmodel->selectWhere("aktivitas_proyek",array("ap_idproyek"=>$id));

		$this->load->view('garden-app/matters/excel-aktivitas',$this->data);
	}

	public function aset_excel($id)
	{
		$this->data['matters']=$this->mmodel->selectWhere("proyek",array("pr_id"=>$id))->row();
		$this->data['id'] = $id;

		$this->load->view('garden-app/matters/excel-aset',$this->data);
	}
	
}