
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class contact extends CI_Controller {
       function __construct() 
    {
        parent::__construct();
		
		// To load the CI benchmark and memory usage profiler - set 1==1.
		if (1==2) 
		{
			$sections = array(
				'benchmarks' => TRUE, 'memory_usage' => TRUE, 
				'config' => FALSE, 'controller_info' => FALSE, 'get' => FALSE, 'post' => FALSE, 'queries' => FALSE, 
				'uri_string' => FALSE, 'http_headers' => FALSE, 'session_data' => FALSE
			); 
			$this->output->set_profiler_sections($sections);
			$this->output->enable_profiler(TRUE);
		}
		
		// Load required CI libraries and helpers.
		$this->load->database();
		$this->load->library('session');
 		$this->load->helper('url');
 		$this->load->helper('form');
                		$this->load->library('form_validation');


  		// IMPORTANT! This global must be defined BEFORE the flexi auth library is loaded! 
 		// It is used as a global that is accessible via both models and both libraries, without it, flexi auth will not work.
		$this->auth = new stdClass;
		
		// Load 'standard' flexi auth library by default.
		$this->load->library('flexi_auth');	
		
     	// Redirect users logged in via password (However, not 'Remember me' users, as they may wish to login properly).
		if ($this->flexi_auth->is_logged_in_via_password() && uri_string() != 'auth/logout') 
		{
			// Preserve any flashdata messages so they are passed to the redirect page.
			if ($this->session->flashdata('message')) { $this->session->keep_flashdata('message'); }
			
			// Redirect logged in admins (For security, admin users should always sign in via Password rather than 'Remember me'.
			if ($this->flexi_auth->is_admin()) 
			{
				redirect('auth_admin/dashboard');
			}
			else
			{
				redirect('auth_public/dashboard');
			}
		}
		
		// Note: This is only included to create base urls for purposes of this demo only and are not necessarily considered as 'Best practice'.
		$this->load->vars('base_url', 'http://localhost:8080/ci/index.php/');
		$this->load->vars('includes_dir', 'http://localhost:8080/ci/includes/');
		$this->load->vars('current_url', $this->uri->uri_to_assoc(1));
		
		// Define a global variable to store data that is then used by the end view page.
		$this->data = null;
	}

public function index()
{
        $data['view_data'] ='' ;

             $data['content']='contact/contact';
             $this->load->view('layout/layout',$data);
}
 function add() {
        //validation
        //field name, error message, validation rules
        //$this->form_validation->set_rules('contactid', 'contactNo', 'trim|required');
        $this->form_validation->set_rules('id_number', 'Id Number', 'trim|required|exact_length[13]');
        $this->form_validation->set_rules('firstname', 'Name', 'trim|required');
        $this->form_validation->set_rules('email_address', 'please input a valid Email Address', 'trim|required|');
        $this->form_validation->set_rules('telephone', 'cell-phone_number', 'trim|required|exact_length[10]');
        $this->form_validation->set_rules('username', 'username', 'trim|required|callback_username_check|min_length[5]');
//        $this->form_validation->set_rules('comments', 'comments', 'trim|required');

        if (!$this->form_validation->run() == TRUE) {
            $this->index();
        } else {
            //  $this->load->model('membership_model');
           // if ($query = $this->membership_model->contact()) {
                $data['view_data'] ='' ;
    
            $data['content'] = 'contact/submission';
              //  $data['firstname'] = $query;
                $this->load->view('layout/layout', $data);
//            } else {
//                echo 'Sorry, there is a problem with the website. contact renierdbruyn@hotmail.com and let us know.';
//            }
        }
    }


function submission() {
    $data['view_data'] ='' ;

$data['content']='contact/submission';
$this->load->view('layout/layout',$data);

}

}
