<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->data['page']="home";
		$this->data['bulan']= array(array("name"=>"01","month"=>"Januari"),array("name"=>"02","month"=>"Februari"),array("name"=>"03","month"=>"Maret"),array("name"=>"04","month"=>"April"),array("name"=>"05","month"=>"Mei"),array("name"=>"06","month"=>"Juni"),array("name"=>"07","month"=>"Juli"),array("name"=>"08","month"=>"Agustus"),array("name"=>"09","month"=>"September"),array("name"=>"10","month"=>"Oktober"),array("name"=>"11","month"=>"November"),array("name"=>"12","month"=>"Desember"));
		
		$this->render->admin('garden-app/home', $this->data);
	}
	
}