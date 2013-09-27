<?php
Class Mcontact extends CI_Model
{
   function __construct()
 {
   parent::__construct();
 }
   
 function  signup_db()
 {
     
//    $username = $this->input->post('username'); 
//    $password = $this->input->post('password');
//    $email = $this->input->post('email'); 
//    $avatar = $this->input->post('avatar'); 
//     
//  
//       
//   
//   $this -> db -> set('username = ' . "'" . $username . "'");
//   $this -> db -> set('password = ' . "'" . $password . "'");
//     $this -> db -> set('email = ' . "'" . $email . "'");
//   $this -> db -> set('avatar = ' . "'" . $avatar . "'");
//   $this -> db -> set('signup_date = ' . "'" . time() . "'");
     
   $this->db->set('username', $this->input->post('username', TRUE));
    $this->db->set('password', $this->input->post('password', TRUE));
//$this->db->set('password', 'PASSWORD("'.$this->input->post('password', TRUE).'")', FALSE);
$this->db->set('email', $this->input->post('email', TRUE));
$this->db->set('avatar', $this->input->post('avatar', TRUE));
$this->db->set('signup_date',time(), TRUE);
// $this->db->set('signup_date', $this->input->post(time(), TRUE));
   $query= $this->db->insert('users');
  

//   $query = $this ->db-> get();
 
       if($query)
        {
           
      
            return true;
        }
  
   else
   {
     return false;
   }
 }
 function  signup_editdb()
 {
     
//    $username = $this->input->post('username'); 
//    $password = $this->input->post('password');
//    $email = $this->input->post('email'); 
//    $avatar = $this->input->post('avatar'); 
//     
//  
//       
//   
//   $this -> db -> set('username = ' . "'" . $username . "'");
//   $this -> db -> set('password = ' . "'" . $password . "'");
//     $this -> db -> set('email = ' . "'" . $email . "'");
//   $this -> db -> set('avatar = ' . "'" . $avatar . "'");
//   $this -> db -> set('signup_date = ' . "'" . time() . "'");
   $userid= $this->session->userdata['userid'];
     $username= $this->session->userdata['username'];
   $this->db->set('username', $this->input->post('username', TRUE));
    $this->db->set('password', $this->input->post('password', TRUE));
//$this->db->set('password', 'PASSWORD("'.$this->input->post('password', TRUE).'")', FALSE);
$this->db->set('email', $this->input->post('email', TRUE));
$this->db->set('avatar', $this->input->post('avatar', TRUE));
$this->db->where('id', $userid);
//$this->db->set('signup_date',time(), TRUE);
// $this->db->set('signup_date', $this->input->post(time(), TRUE));
   $query= $this->db->update('users');
  

//   $query = $this ->db-> get();
 
       if($query)
        {
             
            return true;
        }
  
   else
   {
     return false;
   }
 }
}
?>
