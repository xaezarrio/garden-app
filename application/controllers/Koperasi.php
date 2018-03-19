<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Koperasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}

	public function simpan()
	{
		$this->render->admin('garden-app/koperasi/simpan');
	}

	public function data_koperasi()
	{
		$this->load->view('garden-app/koperasi/data-koperasi');
	}

}
