<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render->admin('garden-app/item/index');
	}

	public function json()
	{
		header('Content-Type: application/json');
        $this->datatables->select('i_id,i_nama,i_stok');
        $this->datatables->where(array('i_nama !='=>''));

        $this->datatables->from('item');
        $this->datatables->add_column('view', '<div class="btn-group"> <a onclick="edit($1)" class="btn btn-xs btn-info"><span class="txt-white fa fa-edit"></span>Detail</a> <!--a onclick="hapus($1)"  class="btn btn-sm btn-danger"><span class="txt-white fa fa-trash-o"></span></a-->  </div>', 'id');
        echo $this->datatables->generate();		
	}

}
