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

	public function transaksi_out()
	{
		$this->data['page']="aset";
		
		$this->render->admin('garden-app/aset/transaksi-out', $this->data);		
	}

	public function transaksi_out_json()
	{
		$sub = $this->input->get('sub');
		// $kategori = $this->input->get('kategori');
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');

		header('Content-Type: application/json');
        $this->datatables->select('aset_transaksi.id , aset_transaksi.date, proyek.pr_nama , karyawan.name as nama_karyawan , aset_transaksi.desc,
								   (SELECT SUM(price) FROM aset_transaksi_detail WHERE aset_transaksi_detail.transaksi_id = aset_transaksi.id) AS price_aset ');
        $this->datatables->join('proyek','proyek.pr_id=aset_transaksi.proyek_id','left');
        $this->datatables->join('karyawan','karyawan.id=aset_transaksi.karyawan_id','left');
        $this->datatables->where(array('aset_transaksi.tipe'=>'OUT'));
        // if ($sub) {
        // 	$this->datatables->where('aktivitas.id', $sub);
        // }
        // if ($bulan) {
        // 	$this->datatables->where("date_format(pengeluaran.created_at, '%m') =", $bulan);
        // }
        // if ($tahun) {
        // 	$this->datatables->where("date_format(pengeluaran.created_at, '%Y') =", $tahun);
        // }
        $this->datatables->from('aset_transaksi');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="edit($1)" class="btn btn-sm btn-info"><span class="txt-white fa fa-edit"></span></a> <a onclick="hapus($1)"  class="btn btn-sm btn-danger"><span class="txt-white fa fa-trash-o"></span></a>  </div>', 'id');
        echo $this->datatables->generate();
	}

	public function transaksi_out_add()
	{
		$this->data['page']="aset";
		
		$this->render->admin('garden-app/aset/addout', $this->data);		
	}

	public function transaksi_out_addaction(){
		$tt = $this->input->post('tt');
		$tt['created_at'] = date('Y-m-d H:i:s');	
		$tt['tipe'] = 'OUT';
		
		$str = $this->db->insert('aset_transaksi', $tt);
		$idt = $this->db->insert_id();

		$td = $this->input->post('td');
		for ($i=0; $i < count($td['aset_id']) ; $i++) { 
			$aset = $this->mymodel->selectDataone('aset',array('id'=>$td['aset_id'][$i]));
			$arraytrans = array(
				'transaksi_id' => $idt,
				'aset_id' => $td['aset_id'][$i],
				'qty' => $td['qty'][$i],
				'price' => $aset['price'],
			);
			// print_r($arraytrans);
			$this->mymodel->insertData('aset_transaksi_detail',$arraytrans);
		}
		redirect('aset/transaksi/out/add','refresh');
	}

	public function transaksi_out_detail()
	{
		$this->data['page']="aset";
		
		$this->load->view('garden-app/aset/transaksi-out-detail', $this->data);
	}


	public function transaksi_out_delete($id)
	{
		$this->mymodel->deleteData('aset_transaksi',array('id'=>$id));
		$this->mymodel->deleteData('aset_transaksi_detail',array('transaksi_id'=>$id));
		redirect('aset/transaksi/out');
	}

	public function transaksi_out_edit($id){
		$this->data['trans'] = $this->mymodel->selectDataone('aset_transaksi',array('id'=>$id));
		$this->data['trans_detail'] = $this->mymodel->selectWhere('aset_transaksi_detail',array('transaksi_id'=>$id));
		$this->render->admin('garden-app/aset/editout', $this->data);
	}

	public function transaksi_out_editaction($id){
		$this->mymodel->deleteData('aset_transaksi_detail',array('transaksi_id'=>$id));
		$tt = $this->input->post('tt');
		$str = $this->mymodel->updateData('aset_transaksi', $tt, array('id'=>$id));
		$td = $this->input->post('td');
		for ($i=0; $i < count($td['aset_id']) ; $i++) {
			$aset = $this->mymodel->selectDataone('aset',array('id'=>$td['aset_id'][$i]));
			$arraytrans = array(
				'transaksi_id' => $id,
				'aset_id' => $td['aset_id'][$i],
				'qty' => $td['qty'][$i],
				'price' => $aset['price'],
			);
			// print_r($arraytrans);
			$this->mymodel->insertData('aset_transaksi_detail',$arraytrans);
		}
		redirect('aset/transaksi/out/edit/'.$id,'refresh');
	}
	
}