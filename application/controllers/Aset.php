<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {

	/*
	Author 		: Hafidz Rozaq NJ
	Edited By 	: Iqbal Luthfillah
	Last Edit 	: -
	App Ver 	: 2.0.0 Gatoko Smart
	*/

	function __construct() {
		parent::__construct();
		
	}

	public function index()
	{
		$this->data['page']="aset";
		
		$this->render->admin('garden-app/aset/aset', $this->data);
	}

	public function registrasi()
	{
		$this->data['page']="aset";
		
		$this->render->admin('garden-app/aset/registrasi', $this->data);
	}

	public function registrasi_edit($id)
	{
		$data['aset'] = $this->mymodel->selectdataOne('aset',array('id'=>$id));
		$this->db->order_by('date DESC');
		$data['detail'] = $this->mymodel->selectWhere('aset_detail',array('aset_id'=>$id));

		$this->render->admin('garden-app/aset/registrasi-edit',$data);
	}

	public function registrasi_action()
	{
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('date', '<strong>Tanggal Beli</strong>', 'required');
		$this->form_validation->set_rules('dt[kode]', '<strong>Kode</strong>', 'required');
		$this->form_validation->set_rules('dt[name]', '<strong>Nama</strong>', 'required');
		$this->form_validation->set_rules('stock', '<strong>Stock</strong>', 'required');
		$this->form_validation->set_rules('dt[price]', '<strong>Harga</strong>', 'required');

		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();
			$this->alert->alertdanger($error);
        }else{
        	$dt = $_POST['dt'];
        	$dt["price"] = str_replace(",","", $_POST['dt']['price']);
        	$date = strtotime($_POST['date']);
        	$date = date('Y-m-d',$date);
        	$cek = $this->mymodel->selectdataOne('aset',array('kode'=>$dt['kode']));
        	if($cek==""){
        		$stock = $_POST['stock'];
        		$dt['stock'] = $stock;
        		$dt['created_at'] = date("Y-m-d H:i:s");
	        	$this->db->insert('aset',$dt);
	        	$ids = $this->db->insert_id();
	        	$detail = array(
	        					'aset_id'=>$ids,
	        					'stock'=>$stock,
	        					'date'=>$date,
	        					'price'=>$dt['price'],
	        					'user_id'=>0,
	        					'created_at'=>date("Y-m-d H:i:s")
	        				);
	        	$this->db->insert('aset_detail',$detail);

        	}else{
        		$dt['updated_at'] = date("Y-m-d H:i:s");
	        	$ids = $cek['id'];
	        	$stock = $_POST['stock'];
	        	$dt['stock'] = $cek['stock']+$stock;
	        	$this->mymodel->updateData('aset',$dt,array('kode'=>$dt['kode']));
	        	$detail = array(
	        					'aset_id'=>$ids,
	        					'stock'=>$stock,
	        					'date'=>$date,
	        					'price'=>$dt['price'],
	        					'user_id'=>0,
	        					'created_at'=>date("Y-m-d H:i:s")
	        				);
	        	$this->db->insert('aset_detail',$detail);

        	}
        	$this->alert->alertsuccess('Success Input Data');

        }
	}

	public function json()
	{
		header('Content-Type: application/json');
        $this->datatables->select('id,kode,name,stock,price');
        $this->datatables->from('aset');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="edit($1)" class="btn btn-sm btn-info"><span class="txt-white fa fa-edit"></span></a> <a onclick="hapus($1)"  class="btn btn-sm btn-danger"><span class="txt-white fa fa-trash-o"></span></a>  </div>', 'id');
        echo $this->datatables->generate();		
	}

	public function json_asset(){
	    $term = $this->input->get('term');
	    $this->db->where("kode LIKE '%".$term."%'");
	    $data = $this->mymodel->selectData('aset');
	    foreach ($data as $rec) {
	      $json[] = $rec['kode']; 
	    }
	    echo json_encode($json);
	}
 

 
  	public function json_detail($kode){
	    $json = $this->mymodel->selectdataOne('aset',array('kode'=>$kode));
	    echo json_encode($json);
	}
 
	public function js(){
		$this->load->view('garden-app/aset/aset-js');
	}
}