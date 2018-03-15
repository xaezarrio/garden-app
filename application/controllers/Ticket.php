<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

	/*
	Author 		: Hafidz Rozaq NJ
	Edited By 	: Iqbal Luthfillah
	Last Edit 	: -
	App Ver 	: 2.0.0 Gatoko Smart
	*/

	function __construct() {
		parent::__construct();
		
	}
	
	
	public function newticket()
	{
		$this->data['page']="ticket";
		$this->render->admin('garden-app/ticket/add', $this->data);
	}
	
	public function open()
	{
		$this->data['page']="ticket";
		$this->render->admin('garden-app/ticket/open', $this->data);
	}

	public function close()
	{
		$this->data['page']="ticket";
		$this->render->admin('garden-app/ticket/close', $this->data);
	}
}