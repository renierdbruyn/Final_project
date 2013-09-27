<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
       public function sample($msg=NULL)
	{
           
                $this->load->view('chat/sam2',$data);
           
      
	}
 
	public function index($msg=NULL)
	{
            $data['msg']=$msg;
            $this->load->helper(array('form','url'));
		 $this->load->view('chat/header');
                $this->load->view('chat/page',$data);
           
      
	}
        public function users()
	{
             $data['obj']=  $this->session;
             $this->load->view('chat/header');
//                   $data['obj']=  $this->session;
		$this->load->view('chat/users',$data);
                $this->load->view('chat/footer');
                    
	}
         public function load_list()
	{
             $data['obj']=  $this->session;
                     $this->load->view('chat/header');
		$this->load->view('chat/list',$data);
                $this->load->view('chat/footer');
                       
	}
         public function readmsg()
	{
             
             $data['obj']=  $this->session;
                     $this->load->view('chat/header');
		$this->load->view('chat/read',$data);
                       $this->load->view('chat/footer');
	}
            public function profile()
	{
             
             $data['obj']=  $this->session;
                     $this->load->view('chat/header');
		$this->load->view('chat/profile',$data);
                $this->load->view('chat/footer');
                    
	}
//              public function newmsg()
//	{
//             
//             $data['obj']=  $this->session;
//                     $this->load->view('header');
//		$this->load->view('newmsg',$data);
//                       $this->load->view('footer');
//	}
               public function signup($msg=NULL)
                      
	{
                    $data['msg']=$msg;
              $this->load->helper(array('form','url'));
             $data['obj']=  $this->session;
                     $this->load->view('chat/header');
		$this->load->view('chat/sign_up',$data);
                   $this->load->view('chat/footer');  
	}
             public function newmsger($msg=NULL)
            
	{
                   
                    $data['msg']=$msg;
              $this->load->helper(array('form','url'));
             $data['obj']=  $this->session;
                     $this->load->view('chat/header');
		$this->load->view('chat/new_msg',$data);
                 $this->load->view('chat/footer');
                        
	}
              public function edit($msg=NULL)
              {
         $data['msg']=$msg;
              $this->load->helper(array('form','url'));
             $data['obj']=  $this->session;
                     $this->load->view('chat/header');
		$this->load->view('chat/edit',$data);
                $this->load->view('chat/footer');
                        
	}
 function newmsgs()
  {
     
     $userid= $this->session->userdata['userid'];
     $username= $this->session->userdata['username'];
 
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('title','Title','trim|required|xss_clean');
   $this->form_validation->set_rules('recip','Recip','trim|required|xss_clean');
   $this->form_validation->set_rules('message','Message','trim|required|xss_clean');
   
   if($this->form_validation->run() == FALSE)
   {
         $this->newmsger();
   }
   else{
////       
////           $datas['title'] = $this->input->post('title'); 
////           $datas['$recip'] = $this->input->post('recip');
////           $datas['$message']= $this->input->post('message');
//        
//     $this->newmsger($msg=Null,$datas);
        $this->load->model('test_msg');
        
    // echo "Go to private area";
       $result = $this->test_msg->msg_dbs();
     echo $result;
       if($result)
   {
                 $msg = '<div class="alert alert-success">message delivered successfuly. </div>';
        $this->newmsger($msg);
    
   }
    else{
   $msg = '<div class="alert alert-error"><font color=red>server error.</font><br /></div>';
           $this->newmsger($msg);
//       redirect('sign_up');   
         }  
   }
//   if(!empty($result))
//   {
//       $msg = '<font color=red>server error.</font><br />';
//           $this->newmsger($msg);
//   
//   }
//    else{
//         $msg = '<div class="message">message delivered successfuly. </div>';
//        $this->newmsger($msg);
////       redirect('sign_up');   
//         }  
         
         
         
         
   }
   function signups_edit()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
   $this->form_validation->set_rules('avatar', 'Avatar', 'trim|required|xss_clean');
   $this->form_validation->set_rules('repassword','rePassword', 'trim|required|xss_clean');   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('email','Email', 'trim|required|xss_clean');
   if($this->form_validation->run() == FALSE)
   {
         $this->edit();
   }
   else
   {
        $this->load->model('mcontact');
    // echo "Go to private area";
       $result = $this->mcontact->signup_editdb();

   if(!$result)
   {
       $msg = '<div class="alert alert-error">server error.</font><br />';
           $this->edit($msg);
   
   }
    else{
         $msg = '<div class="alert alert-success">You have successfuly updated.<br />
 <a class="btn btn-small"  href="http://localhost/ci/index.php/home1">back</a></div>';
        $this->edit($msg);
//       redirect('sign_up');   
         }  
   }

 }
 
        function signups()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
   $this->form_validation->set_rules('avatar', 'Avatar', 'trim|required|xss_clean');
   $this->form_validation->set_rules('repassword','rePassword', 'trim|required|xss_clean');   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('email','Email', 'trim|required|xss_clean');
   if($this->form_validation->run() == FALSE)
   {
         $this->signup();
   }
   else
   {
        $this->load->model('mcontact');
    // echo "Go to private area";
       $result = $this->mcontact->signup_db();

   if(!$result)
   {
       $msg = '<div class="alert alert-error">server error.</font><br />';
           $this->signup($msg);
   
   }
    else{
         $msg = '<div class="alert alert-success">You have successfuly been signed up. You can log in.<br />
<a href="welcome/index">Log in</a></div>';
        $this->signup($msg);
//       redirect('sign_up');   
         }  
   }

 }
        
 function verify()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

   if($this->form_validation->run() == FALSE)
   {
         $this->index();
   }
   else
   {
        $this->load->model('users');
    // echo "Go to private area";
       $result = $this->users->login();

   if(!$result)
   {
       $msg = '<font color=red>Invalid username and/or password.</font><br />';
           $this->index($msg);
   
   }
    else{
       redirect('home1');   
         }  
   }

 }
  function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->users->login($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }      
        
        
        
        
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */