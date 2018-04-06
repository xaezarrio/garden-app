<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {

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
	
	public function proforma()
	{
		$this->data['page']="billing";
		
		$this->render->admin('garden-app/billing/proforma', $this->data);
	}

	public function addproforma()
	{
		$this->data['page']="billing";
		
		$this->render->admin('garden-app/billing/addproforma', $this->data);
	}

	public function invoice()
	{
		$this->data['page']="billing";
		
		$this->render->admin('garden-app/billing/invoice', $this->data);
	}

	public function addinvoice($id="")
	{
		$this->data['page']="billing";
		if($id!=""){
			$this->data['proyek']=$this->mymodel->selectdataOne('proyek',array('pr_id'=>$id));
		}
		$this->data['id'] = $id;
		
		$this->render->admin('garden-app/billing/addinvoice', $this->data);
	}


	public function detailinvoice($id)
	{
		# code...
		$data['page']="billing";
		$data['invoice'] =$this->mymodel->selectdataOne('invoice',array('id'=>$id));
		$data['proyek'] =$this->mymodel->selectdataOne('proyek',array('pr_id'=>$data['invoice']['proyek_id']));
		$data['item'] =$this->mymodel->selectWhere('invoice_item',array('invoice_id'=>$id));
		$data['pelanggan'] =$this->mymodel->selectdataOne('pelanggan',array('p_id'=>$data['proyek']['pr_idpelanggan']));
		$data['ap']=$this->mmodel->selectWhere("aktivitas_proyek",array("ap_idproyek"=>$data['proyek']['pr_id']));

		$this->render->admin('garden-app/billing/detailinvoice', $data);
	}

	public function updatestatus($id)
	{
			$dir  = "webfile/invoice/";
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
			   	// $str = $this->db->insert('aktivitas_proyek', $param);
				$this->mymodel->updateData('invoice',array('status'=>'Lunas','updated_at'=>date('Y-m-d H:i:s')),array('id'=>$id));

			   	$last_id = $this->db->insert_id();
			   	$image = $this->upload->data();
	   			$data = array(
			   				'id' => '',
			   				'name'=> $image['file_name'],
			   				'type'=> $image['file_type'],
			   				'size'=> $image['file_size'],
			   				'dir'=> $dir.$image['file_name'],
			   				'table'=> 'invoice',
			   				'table_id'=> $id,
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

		// $invoice =$this->mymodel->selectdataOne('invoice',array('id'=>$id));

		// redirect('matters/payment/'.$invoice['proyek_id']);
	}

	public function json($status)
	{
		if($status=="Belum"){
			$status = "Belum Lunas";
		}

		header('Content-Type: application/json');
        $this->datatables->select('invoice.id,invoice.date,invoice.due,pelanggan.p_nama_perusahaan as perusahaan, proyek.pr_nama as proyek,invoice.type,invoice.total,invoice.status,invoice.updated_at');
        $this->datatables->join('proyek','invoice.proyek_id=proyek.pr_id','left');
        $this->datatables->join('pelanggan','proyek.pr_idpelanggan=pelanggan.p_id','left');
        $this->datatables->where('invoice.status',$status);
        $this->datatables->from('invoice');
        if(role==3){
			$this->datatables->where(array('proyek.created_by'=>user_id));
		}
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="detail($1)" class="btn btn-xs btn-primary">detail</span></a></div>', 'id');
        echo $this->datatables->generate();
	}

	public function json_collections()
	{
		# code...
		// SELECT `proyek`.`pr_id` as id, 
		// `proyek`.`pr_nama` as proyek,
		// `proyek`.`pr_tgl_mulai` as date,
		// `proyek`.`pr_tgl_selesai` as due,
		// (SELECT COUNT(`invoice`.`id`) as invoice FROM `invoice` WHERE `proyek`.`pr_id` = `invoice`.`proyek_id` AND `invoice`.`status`='Lunas') as invoice,
		// `proyek`.`pr_nilai_kontrak` as kontrak,
		// (SELECT SUM(`invoice`.`total`) as invoice FROM `invoice` WHERE `proyek`.`pr_id` = `invoice`.`proyek_id` AND `invoice`.`status`='Lunas') as terbayar
		// FROM `proyek`;
		header('Content-Type: application/json');

        $this->datatables->select("`proyek`.`pr_id` as id, 
        							pelanggan.p_nama_perusahaan as perusahaan,
									`proyek`.`pr_nama` as proyek,
									`proyek`.`pr_tgl_mulai` as date,
									`proyek`.`pr_status` as status,


									`proyek`.`pr_tgl_selesai` as due,
									(SELECT COUNT(`invoice`.`id`) as invoice FROM `invoice` WHERE `proyek`.`pr_id` = `invoice`.`proyek_id` AND `invoice`.`status`='Lunas') as invoice,
									`proyek`.`pr_nilai_kontrak` as kontrak,
									(SELECT SUM(`invoice`.`total`) as invoice FROM `invoice` WHERE `proyek`.`pr_id` = `invoice`.`proyek_id` AND `invoice`.`status`='Lunas') as terbayar");
        $pelanggan = $this->input->get('pelanggan');
        $start = $this->input->get('start');
        $due = $this->input->get('due');
     	if(role==3){
			$this->datatables->where(array('proyek.created_by'=>user_id));
		}
		if($start != "" AND $due !=""){
			$start = strtotime($start);
			$start = date('Y-m-d',$start);
			$due = strtotime($due);
			$due = date('Y-m-d',$due);
			$this->datatables->where('date(proyek.pr_tgl_mulai) >=', $start);
			$this->datatables->where('date(proyek.pr_tgl_mulai) <=', $due);
		}else if($start != "" AND $due ==""){
			$start = strtotime($start);
			$start = date('Y-m-d',$start);
			$this->datatables->where("date(proyek.pr_tgl_mulai) ='".$start."'");
		}else if(($start == "" AND $due !="")){
			$due = strtotime($due);
			$due = date('Y-m-d',$due);
			$this->datatables->where("date(proyek.pr_tgl_mulai) ='".$due."'");
		}

		if($pelanggan!=""){
			$this->datatables->where('proyek.pr_idpelanggan', $pelanggan);
		}

        $this->datatables->join('pelanggan','proyek.pr_idpelanggan=pelanggan.p_id','left');

        $this->datatables->from('proyek');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="detail($1)" class="btn btn-xs btn-primary">detail</span></a></div>', 'id');

        echo $this->datatables->generate();

		
	}

	public function getpajak($id)
	{
		$invoice =$this->mymodel->selectdataOne('proyek',array('pr_id'=>$id));
		$pajak =$this->mymodel->selectdataOne('pajak',array('id'=>$invoice['pr_pajak']));
		$pajak2 =$this->mymodel->selectdataOne('pajak',array('id'=>$invoice['pr_pajak2']));
		
		$json = array(
					'pr_pajak'=>$pajak['name'],
					'pr_pajak2'=>$pajak2['name']
				);
		echo json_encode($json);
	}

	public function store_invoice()
	{
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[proyek_id]', '<strong>Pruyek</strong>', 'required');

		$this->form_validation->set_rules('dt[date]', '<strong>Invoice Date</strong>', 'required');
		$this->form_validation->set_rules('dt[due]', '<strong>Due Date</strong>', 'required');
		$this->form_validation->set_rules('dt[subject]', '<strong>Subject</strong>', 'required');
		$this->form_validation->set_rules('item[]', '<strong>item</strong>', 'required');
		$this->form_validation->set_rules('nominal[]', '<strong>Nominal</strong>', 'required');
		$this->form_validation->set_rules('dt[remark]', '<strong>Remark</strong>', 'required');

		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();
			$this->alert->alertdanger($error);
        }else{
			$dt = $this->input->post('dt');
			$dt['created_at'] = date("Y-m-d H:i:s");
			$dt['user_id'] = user_id;
			$dt['status'] = "Belum Lunas";

			$dt['pajak1'] = str_replace(",", "", $dt['pajak1']);
			$dt['pajak2'] = str_replace(",", "", $dt['pajak2']);

			$this->db->insert('invoice',$dt);
			$ids = $this->db->insert_id();
			$item = $this->input->post('item');
			$i=0;
			foreach ($item as $it) {
				$nominal = $_POST['nominal'][$i];
				$nominal = str_replace(",", "", $nominal);
				$data = array(
								'invoice_id'=>$ids,
								'item'=>$it,
								'nominal'=>$nominal
								);
				$this->db->insert('invoice_item',$data);
			$i++;
			}

			$this->alert->alertsuccess("Success Send Data");
        }
	}
// ==============================================================================

	public function collections()
	{
		$this->data['page']="billing";
		
		$this->render->admin('garden-app/billing/collections', $this->data);
	}

	public function detailcollections()
	{
		# code...
		$this->data['page']="billing";
		
		$this->render->admin('garden-app/billing/detailcollections', $this->data);
	}
	
}