<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model {
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  
  
  public function login($email, $password)
  {
    $email_special = htmlspecialchars($this->db->escape($email));
    $password_password = htmlspecialchars($this->db->escape($password));
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where("username = $email_special"); 
    $this->db->where("password = $password_password");
    $query = $this->db->get();
    return $query;
  }
  
  
  public function data($email)
  {
   $email_special = htmlspecialchars($this->db->escape($email));    
   $this->db->select('*');
   $this->db->where("username = $email_special"); 
   
   $query = $this->db->get('user');
   
   return $query->row();
  }

  public function login_member($email, $password)
  {
    $email_special = htmlspecialchars($this->db->escape($email));
    $password_password = htmlspecialchars($this->db->escape($password));
    $this->db->select('*');
    $this->db->from('tb_member');
    $this->db->where("f_member_email = $email_special"); 
    $this->db->where("f_member_password = $password_password");
    $query = $this->db->get();
    return $query->num_rows();
  }
  
  
  public function data_member($email)
  {
   $email_special = htmlspecialchars($this->db->escape($email));    
   $this->db->select('*');
   $this->db->where("f_member_email = $email_special"); 
   
   $query = $this->db->get('tb_member');
   
   return $query->row();
  }

  
}  

?>
