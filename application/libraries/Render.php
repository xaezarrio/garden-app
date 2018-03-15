<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Render{

	protected $CI;

	public function __construct()
	{	
		$this->CI =& get_instance();
	}


	public function admin($content, $data = NULL)
	{
		if ( ! $content)
		{
			return NULL;
		} else
		{
			$this->CI->data['mode'] = "admin";


			$data['content'] = 	$this->CI->load->view($content, $data, TRUE);
			$this->CI->load->view('garden-app/template-home', $data);
			
		}
	}

	

	



}