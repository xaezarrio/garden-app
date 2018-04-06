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
		$user_id = $this->session->userdata('user_id');
		$role = $this->session->userdata('role');
		define('role', $role);
		define('user_id', $user_id);

		
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
        		$dt['user_id'] = user_id;
	        	$this->db->insert('aset',$dt);
	        	$ids = $this->db->insert_id();
	        	$detail = array(
	        					'aset_id'=>$ids,
	        					'stock'=>$stock,
	        					'date'=>$date,
	        					'price'=>$dt['price'],
	        					'user_id'=>user_id,
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
	        					'user_id'=>user_id,
	        					'created_at'=>date("Y-m-d H:i:s")
	        				);
	        	$this->db->insert('aset_detail',$detail);

        	}
        	$this->alert->alertsuccess('Success Input Data');

        }
	}

	public function registrasi_action_edit()
	{
		# code...
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[kode]', '<strong>Kode</strong>', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();
			$this->alert->alertdanger($error);
        }else{
        	$dt = $_POST['dt'];
        	$id = $_POST['id'];
        	$adj = $_POST['adj'];


        	$cek = $this->mymodel->selectdataOne('aset',array('kode'=>$dt['kode']));

	        if($adj!=""){
        		$detail = array(
	        					'aset_id'=>$cek['id'],
	        					'stock'=>$adj,
	        					'date'=>date('Y-m-d'),
	        					'price'=>0,
	        					'user_id'=>user_id,
	        					'created_at'=>date("Y-m-d H:i:s")
	        				);
	        	$this->db->insert('aset_detail',$detail);
	        	$dt['stock'] = $cek['stock']+$adj;
	        }
        	$this->mymodel->updateData('aset',$dt,array('id'=>$id));

        	
        	$this->alert->alertsuccess('Success Input Data');

        }
	}

	public function json()
	{
		header('Content-Type: application/json');
        $this->datatables->select('id,kode,name,stock,price,(stock*price) as total');
        $this->datatables->from('aset');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="edit($1)" class="btn btn-xs btn-info"><span class="txt-white fa fa-edit"></span>Detail</a> <!--a onclick="hapus($1)"  class="btn btn-sm btn-danger"><span class="txt-white fa fa-trash-o"></span></a-->  </div>', 'id');
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
		// $sub = $this->input->get('sub');
		// $kategori = $this->input->get('kategori');
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');

		header('Content-Type: application/json');
        $this->datatables->select('aset_transaksi.id , aset_transaksi.date, proyek.pr_nama , karyawan.name as nama_karyawan , aset_transaksi.desc,
								   (SELECT SUM(price*qty) FROM aset_transaksi_detail WHERE aset_transaksi_detail.transaksi_id = aset_transaksi.id) AS price_aset ');
        $this->datatables->join('proyek','proyek.pr_id=aset_transaksi.proyek_id','left');
        $this->datatables->join('karyawan','karyawan.id=aset_transaksi.karyawan_id','left');
        $this->datatables->where(array('aset_transaksi.tipe'=>'OUT'));
        // if ($sub) {
        // 	$this->datatables->where('aktivitas.id', $sub);
        // }
        if ($bulan) {
        	$this->datatables->where("MONTH(aset_transaksi.date) =", $bulan);
        }
        if ($tahun) {
        	$this->datatables->where("YEAR(aset_transaksi.date) =", $tahun);
        }
        $this->datatables->from('aset_transaksi');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="edit($1)" class="btn btn-xs btn-info"><span class="txt-white fa fa-edit"></span> Edit</a> <a onclick="hapus($1)"  class="btn btn-xs btn-danger"><span class="txt-white fa fa-trash-o"></span> Hapus</a>  </div>', 'id');
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
			$aset_detail = $this->mymodel->selectWhere('aset_detail',array('aset_id'=>$td['aset_id'][$i]));
			$qty_new = $aset['stock'] - $td['qty'][$i];
			$arraytrans = array(
				'transaksi_id' => $idt,
				'aset_id' => $td['aset_id'][$i],
				'qty' => $td['qty'][$i],
				'price' => $aset['price'],
			);
			// print_r($arraytrans);
			$hasil = $this->mymodel->insertData('aset_transaksi_detail',$arraytrans);
			$this->mymodel->updateData('aset',array('stock'=>$qty_new),array('id'=>$td['aset_id'][$i]));
		}
		redirect('aset/transaksi/out/add/?proyek='.$tt["proyek_id"],'refresh');
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
		$tt['updated_at'] = date('Y-m-d H:i:s');
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


	public function transaksi_in()
	{
		$this->data['page']="aset";
		
		$this->render->admin('garden-app/aset/transaksi-in', $this->data);		
	}

	public function transaksi_in_json()
	{
		// $sub = $this->input->get('sub');
		// $kategori = $this->input->get('kategori');
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');

		header('Content-Type: application/json');
        $this->datatables->select('aset_transaksi.id , aset_transaksi.date, proyek.pr_nama , karyawan.name as nama_karyawan , aset_transaksi.desc,
								   (SELECT SUM(price*qty) FROM aset_transaksi_detail WHERE aset_transaksi_detail.transaksi_id = aset_transaksi.id) AS price_aset ');
        $this->datatables->join('proyek','proyek.pr_id=aset_transaksi.proyek_id','left');
        $this->datatables->join('karyawan','karyawan.id=aset_transaksi.karyawan_id','left');
        $this->datatables->where(array('aset_transaksi.tipe'=>'IN'));
        // if ($sub) {
        // 	$this->datatables->where('aktivitas.id', $sub);
        // }
        if ($bulan) {
        	$this->datatables->where("MONTH(aset_transaksi.date) =", $bulan);
        }
        if ($tahun) {
        	$this->datatables->where("YEAR(aset_transaksi.date) =", $tahun);
        }
        $this->datatables->from('aset_transaksi');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="edit($1)" class="btn btn-xs btn-info"><span class="txt-white fa fa-edit"></span> Edit</a> <a onclick="hapus($1)"  class="btn btn-xs btn-danger"><span class="txt-white fa fa-trash-o"></span> Hapus</a>  </div>', 'id');
        echo $this->datatables->generate();
	}

	public function transaksi_in_add()
	{
		$this->data['page']="aset";
		
		$this->render->admin('garden-app/aset/addin', $this->data);		
	}

	public function transaksi_in_addaction(){
		$tt = $this->input->post('tt');
		$tt['created_at'] = date('Y-m-d H:i:s');	
		$tt['tipe'] = 'IN';
		
		$str = $this->db->insert('aset_transaksi', $tt);
		$idt = $this->db->insert_id();

		$td = $this->input->post('td');
		for ($i=0; $i < count($td['aset_id']) ; $i++) { 
			$aset = $this->mymodel->selectDataone('aset',array('id'=>$td['aset_id'][$i]));
			$aset_detail = $this->mymodel->selectWhere('aset_detail',array('aset_id'=>$td['aset_id'][$i]));
			$qty_new = $aset['stock'] + $td['qty'][$i];
			$arraytrans = array(
				'transaksi_id' => $idt,
				'aset_id' => $td['aset_id'][$i],
				'qty' => $td['qty'][$i],
				'price' => $aset['price'],
			);
			// print_r($arraytrans);
			$hasil = $this->mymodel->insertData('aset_transaksi_detail',$arraytrans);
			$this->mymodel->updateData('aset',array('stock'=>$qty_new),array('id'=>$td['aset_id'][$i]));
		}
		redirect('aset/transaksi/in/add?proyek='.$tt["proyek_id"],'refresh');
	}

	public function transaksi_in_detail()
	{
		$this->data['page']="aset";
		
		$this->load->view('garden-app/aset/transaksi-in-detail', $this->data);
	}


	public function transaksi_in_delete($id)
	{
		$this->mymodel->deleteData('aset_transaksi',array('id'=>$id));
		$this->mymodel->deleteData('aset_transaksi_detail',array('transaksi_id'=>$id));
		redirect('aset/transaksi/in');
	}

	public function transaksi_in_edit($id){
		$this->data['trans'] = $this->mymodel->selectDataone('aset_transaksi',array('id'=>$id));
		$this->data['trans_detail'] = $this->mymodel->selectWhere('aset_transaksi_detail',array('transaksi_id'=>$id));
		$this->render->admin('garden-app/aset/editin', $this->data);
	}

	public function transaksi_in_editaction($id){
		$this->mymodel->deleteData('aset_transaksi_detail',array('transaksi_id'=>$id));
		$tt = $this->input->post('tt');
		$tt['updated_at'] = date('Y-m-d H:i:s');
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
		redirect('aset/transaksi/in/edit/'.$id,'refresh');
	}

	public function changeMin(){
		$id = $this->input->post('id');
		$aset = $this->mymodel->selectDataone('aset',array('id'=>$id));
		echo $aset['stock'];
	}
	
}