<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_public extends CI_Controller {
 
    function __construct() 
    {
        parent::__construct();

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
		
		$this->load->database();
		$this->load->library('session');
 		$this->load->helper('url');
 		$this->load->helper('form');

		$this->auth = new stdClass;

		$this->load->library('flexi_auth');	

		if (! $this->flexi_auth->is_logged_in() && $this->uri->segment(2) != 'update_email')
		{
			$this->flexi_auth->set_error_message('You must login to access this area.', TRUE);
			$this->session->set_flashdata('message', $this->flexi_auth->get_messages());
			redirect('auth');
		}
		
		$this->load->vars('current_url', $this->uri->uri_to_assoc(1));
		
		$this->data = null;
	}

	
	function index()
	{
		redirect('profile/personal');
	}
 
 	
	function dashboard()
	{
		$data['message'] = $this->session->flashdata('message');
		
                {
		
		$query=$this->flexi_auth->get_user_by_identity_row_array();
		$data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
		$this->session->set_userdata('id_number', $query['id_number']);
		$this->session->set_userdata('email', $query['uacc_email']);
		$this->session->set_userdata('cell', $query['upro_phone']);
		$this->session->set_userdata('surname', $query['upro_last_name']);
		$this->session->set_userdata('name', $query['upro_first_name']);

		$data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];		
    	$data['view_name'] ='profile/welcome_message' ;
    	$data['view_data']='';

        $data['content']='profile/profile';
		$this->load->view('layout/layout', $data);
	}
	}

	function update_account()
	{
            $data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $                   $this->data['message'];
		if ($this->input->post('update_account')) 
		{
			$this->load->model('demo_auth_model');
			$this->demo_auth_model->update_account();
		}
		
		$data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

			
                  $data['view_data'] ='' ;

                $data['content']='login/public/account_update_view';
		$this->load->view('layout/layout', $data);
	}

	function change_password()
	{
            	$data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

		if ($this->input->post('change_password'))
		{
			$this->load->model('demo_auth_model');
			$this->demo_auth_model->change_password();
		}
				
		$data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
		                  $data['view_data'] ='' ;

                $data['content']='login/public/password_update_view';
		$this->load->view('layout/layout', $data);
	}

 	
	function update_email($user_id = FALSE, $token = FALSE)
	{
            	$data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

		$this->load->model('demo_auth_model');

		if ($this->input->post('update_email'))
		{
			$this->demo_auth_model->send_new_email_activation();
		}
		else if (is_numeric($user_id) && strlen($token) == 40) // 40 characters = Email Activation Token length.
		{
			$this->demo_auth_model->verify_updated_email($user_id, $token);
		}

		if ($this->flexi_auth->is_logged_in())
		{
                    $data['view_data'] ='' ;

                        $data['content']='login/public/email_update_view';
			$this->load->view('layout/layout', $data);
		}
		else
		{
			redirect('auth/login');
		}
	}
	
}