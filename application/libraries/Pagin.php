<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagin{
	protected $_ci;
	function __construct(){
		$this->_ci =& get_instance();
		$this->_ci->load->database();
	}
	
	function pagination($page){
		
		$config['full_tag_open']	= "<ul  class='pagination'>";
		$config['full_tag_close']	= "</ul>";
		$config['num_tag_open']		= '<li class="page-item">';
		$config['num_tag_close']	= '</li>';
		$config['cur_tag_open'] 	= '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close']	= '</a></li>';
		$config['prev_link'] 		= '<span class="fa fa-caret-left"></span>';
		$config['prev_tag_open'] 	= '<li class="page-item">';
		$config['prev_tag_close'] 	= '</li>';
		$config['next_tag_open'] 	= '<li class="page-item">';
		$config['next_tag_close'] 	= '</li>';
		$config['next_link'] 		= '<span class="fa fa-caret-right"></span>';
		$config['first_tag_open'] 	= '<li class="page-item">';
		$config['first_tag_close']	= '</li>';
		$config['first_link'] 		= '<span class="fa fa-backward"></span> First';
		$config['last_tag_open'] 	= '<li class="page-item">';
		$config['last_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last <span class="fa fa-forward"></span>';
		$config['attributes'] = array('class' => 'page-link');

		return $config;
	}
	function homes($page){
		
		$config['full_tag_open']	= "<ul  class='pagination'>";
		$config['full_tag_close']	= "</ul>";
		$config['num_tag_open']		= '<li class="page-item">';
		$config['num_tag_close']	= '</li>';
		$config['cur_tag_open'] 	= '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close']	= '</a></li>';
		$config['prev_link'] 		= '<span class="fa fa-caret-left"></span>';
		$config['prev_tag_open'] 	= '<li class="page-item">';
		$config['prev_tag_close'] 	= '</li>';
		$config['next_tag_open'] 	= '<li class="page-item">';
		$config['next_tag_close'] 	= '</li>';
		$config['next_link'] 		= '<span class="fa fa-caret-right"></span>';
		$config['first_tag_open'] 	= '<li class="page-item">';
		$config['first_tag_close']	= '</li>';
		$config['first_link'] 		= '<span class="fa fa-backward"></span> First';
		$config['last_tag_open'] 	= '<li class="page-item">';
		$config['last_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last <span class="fa fa-forward"></span>';
		$config['attributes'] = array('class' => 'page-link');

		return $config;
	}
	
	
}
?>
