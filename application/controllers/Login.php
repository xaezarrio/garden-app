<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
	}


	public function index($value='')
	{
		# code...
		$this->load->view('login/index');
	}

	public function logout()
	{
		# code...
        $this->session->sess_destroy();
		redirect('login');
	}

	public function forgot()
	{
		# code...
		$this->load->view('login/forgot');

	}

	   public function act_login()
    {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $acak = "!@#$%^&*()_+SMARTSOFT+_()*&^%$#@!";
            $pass = md5(md5($acak).$password);

            $cek     = $this->model_login->login($username,$pass);
            $session = $this->model_login->data($username);
            if ($cek->num_rows() > 0) {
                $this->session->set_userdata('session_garden', true);
                $this->session->set_userdata('user_id', $session->id);
                $this->session->set_userdata('role', $session->role_id);
                echo "oke";
                return TRUE;
            } else {
                
                $this->alert->alertdanger();
                return FALSE;

            }
    }
}