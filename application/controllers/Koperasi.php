<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Koperasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['bulan']= array(array("name"=>"01","month"=>"Januari"),array("name"=>"02","month"=>"Februari"),array("name"=>"03","month"=>"Maret"),array("name"=>"04","month"=>"April"),array("name"=>"05","month"=>"Mei"),array("name"=>"06","month"=>"Juni"),array("name"=>"07","month"=>"Juli"),array("name"=>"08","month"=>"Agustus"),array("name"=>"09","month"=>"September"),array("name"=>"10","month"=>"Oktober"),array("name"=>"11","month"=>"November"),array("name"=>"12","month"=>"Desember"));
		$this->render->admin('garden-app/koperasi/index',$data);
	}

	public function simpan()
	{
		$this->render->admin('garden-app/koperasi/simpan');
	}

	public function data_koperasi()
	{
		$this->load->view('garden-app/koperasi/data-koperasi');
	}

	public function store()
	{
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[karyawan_id]', '<strong>Karyawan</strong>', 'required');
		$this->form_validation->set_rules('dt[aktivitas_id]', '<strong>Aktivias</strong>', 'required');
		$this->form_validation->set_rules('dt[date]', '<strong>Date</strong>', 'required');
		$this->form_validation->set_rules('dt[nominal]', '<strong>Nominal</strong>', 'required');
		$this->form_validation->set_rules('dt[desc]', '<strong>Description</strong>', 'required');

		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();
			$this->alert->alertdanger($error);
        }else{
        	$dt = $this->input->post('dt'); 
        	$dt['nominal'] = str_replace(",", '', $dt['nominal']);
        	$dt['created_at'] = date("Y-m-d H:i:s");
        	$dt['user_id'] = 0;
        	// print_r($dt);
        	$this->db->insert('koperasi', $dt);
        	$this->alert->alertsuccess('Success Send Data');	

        }
	}

	public function json()
	{
		$karyawan = $this->input->get('karyawan');
		$sub = $this->input->get('sub');
		$kategori = $this->input->get('kategori');
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');
		header('Content-Type: application/json');
        $this->datatables->select('koperasi.id,koperasi.date,koperasi.nominal,karyawan.name as karyawan,aktivitas.name as aktivitas,aktivitas.kategori as kategori,koperasi.desc');
        $this->datatables->join('karyawan','koperasi.karyawan_id=karyawan.id','left');
        $this->datatables->join('aktivitas','koperasi.aktivitas_id=aktivitas.id','left');
      
		if ($karyawan) {
        	$this->datatables->where('karyawan.id', $karyawan);
        }
        if ($sub) {
        	$this->datatables->where('aktivitas.id', $sub);
        }
        if ($kategori) {
        	$this->datatables->where('aktivitas.kategori', $kategori);
        }
        if ($bulan) {
        	$this->datatables->where("date_format(koperasi.date, '%m') =", $bulan);
        }
        if ($tahun) {
        	$this->datatables->where("date_format(koperasi.date, '%Y') =", $tahun);
        }
        $this->datatables->from('koperasi');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="detail($1)"  class="btn btn-sm btn-info"><span class="txt-white fa fa-user"></span></a><a onclick="hapus($1)"  class="btn btn-sm btn-danger"><span class="txt-white fa fa-trash-o"></span></a>  </div>', 'id');


        echo $this->datatables->generate();

	}

	public function detail($id)
	{
		$data['bulan']= array(array("name"=>"01","month"=>"Januari"),array("name"=>"02","month"=>"Februari"),array("name"=>"03","month"=>"Maret"),array("name"=>"04","month"=>"April"),array("name"=>"05","month"=>"Mei"),array("name"=>"06","month"=>"Juni"),array("name"=>"07","month"=>"Juli"),array("name"=>"08","month"=>"Agustus"),array("name"=>"09","month"=>"September"),array("name"=>"10","month"=>"Oktober"),array("name"=>"11","month"=>"November"),array("name"=>"12","month"=>"Desember"));

		$this->db->order_by('date','ASC');
		$detail = $this->mymodel->selectdataOne('koperasi',array('id'=>$id));
		$data['list'] = $this->mymodel->selectWhere('koperasi',array('karyawan_id'=>$detail['karyawan_id']));
		$data['karyawan_id'] = $detail['karyawan_id'];
		$data['id'] = $id;
		$this->render->admin('garden-app/koperasi/detail',$data);
	}


	public function delete($id)
	{
		# code...
		$this->mymodel->deleteData('koperasi',array('id'=>$id));
		$this->alert->alertsuccess('Success Delete Data');
	}

}
