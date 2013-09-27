<?php
Class Users extends CI_Model
{
   function __construct()
 {
   parent::__construct();
 }
     
 function login()
 {
     
    $username = $this->input->post('username'); 
    $password = $this->input->post('password');
       $this -> db -> select('id, username, password');
   $this -> db -> from('users');
   $this -> db -> where('username = ' . "'" . $username . "'");
   $this -> db -> where('password = ' . "'" . $password . "'");
   $this -> db -> limit(1);

   $query = $this -> db -> get();
 
       if($query->num_rows == 1)
        {
           
            $row = $query->row();
            $data = array(
                    'userid' => $row->id,
                    'username' => $row->username,
                    
                
                    'validated' => true,
                    'is_logged_in' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
  
   else
   {
     return false;
   }
 }
}
?>
