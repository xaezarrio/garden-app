<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

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
		$this->data['page']="office";
		
		$this->render->admin('officeprogram/review', $this->data);
	}
	public function hr()
	{
		$this->data['page']="office";
		
		$this->render->admin('officeprogram/review_hr', $this->data);
	}
}