<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		$user_id = $this->session->userdata('user_id');
		$role = $this->session->userdata('role');
		define('role', $role);
		define('user_id', $user_id);


		
	}
	
	public function index($stt="")
	{
		if($stt=="enable" OR $stt ==""){
			$data['status'] = "ENABLE";
		}else{
			$data['status'] = "DISABLE";
		}
		
		$this->render->admin('garden-app/user/index', $data);
	}

	

	public function json($cek)
	{
		# code...
		header('Content-Type: application/json');
        $this->datatables->select('user.id as id,user.name,user.username,role.role,user.email');
        $this->datatables->join('role','user.role_id=role.id','left');
        $this->datatables->where(array('user.status'=>$cek));
        $this->datatables->from('user');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="user_update($1)" class="btn btn-xs btn-info"><span class="txt-white fa fa-edit"></span> Edit</a> <a onclick="hapus($1)"  class="btn btn-xs btn-danger"><span class="txt-white fa fa-trash-o"></span> Disable</a>  </div>', 'id');
        echo $this->datatables->generate();
	}

	public function store()
	{
		$password = $this->input->post('password');
		$acak = "!@#$%^&*()_+SMARTSOFT+_()*&^%$#@!";
		$pass = md5(md5($acak).$password);
		$dt = $this->input->post('dt');
		$dt['created_at'] = date("Y-m-d H:i:s");
		$dt['password'] = $pass;
		$dt['status'] = "ENABLE";
		$str = $this->db->insert('user', $dt);
		if($str){
			header("Location: ".base_url()."user"); 
		}else{
			echo "<script>alert('Something Error , Try Again');history.go(-1)</script>";
		}
	}

	public function update()
	{
		# code...
		$id = $this->input->post('ids');

		$password = $this->input->post('password');
		$dt = $this->input->post('dt');

		if($password !=""){
			$acak = "!@#$%^&*()_+SMARTSOFT+_()*&^%$#@!";
			$pass = md5(md5($acak).$password);
			$dt['password'] = $pass;
		}

		$dt['updated_at'] = date("Y-m-d H:i:s");
		$str = $this->mymodel->updateData('user', $dt , array('id'=>$id));
		if($str){
			header("Location: ".base_url()."user"); 
		}else{
			echo "<script>alert('Something Error , Try Again');history.go(-1)</script>";
		}
	}

	public function edit($id)
	{
		# code...
		$data['data'] = $this->mymodel->selectdataOne('user',array('id'=>$id));
		$this->load->view('garden-app/user/edit',$data);
	}

	public function hidden($ids,$stt="")
	{
		// if($ids!=1){
			if($stt=="ENABLE" OR $stt ==""){
				$data['status'] = "ENABLE";
			}else{
				$data['status'] = "DISABLE";
			}
			$str = $this->mymodel->updateData('user', $data , array('id' => $ids));
			header("Location: ".base_url()."user"); 
		// }else{
				// echo "<script>alert('SITE PUSAT cant DISABLE');history.go(-1)</script>";
		// }
	}

	public function role()
	{
		$this->data['page']="office";
		
		$this->render->admin('garden-app/user/role', $this->data);
	}
}