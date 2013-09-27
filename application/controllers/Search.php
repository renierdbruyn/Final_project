<?php

class Search extends CI_Controller {

    function __construct() {
        parent::__construct();


        if (1 == 2) {
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
        $this->load->model('Blogmodel');
        

        $this->load->model('search_model');

        $this->load->helper('html');
        $this->load->library("pagination");


        $this->auth = new stdClass;

        $this->load->library('flexi_auth');

        if ($this->flexi_auth->is_logged_in_via_password() && uri_string() != 'auth/logout') {
            if ($this->session->flashdata('message')) {
                $this->session->keep_flashdata('message');
            }

            if ($this->flexi_auth->is_admin()) {
                redirect('auth_admin/dashboard');
            } else {
                redirect('auth_public/dashboard');
            }
        }

        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));

        $this->data = null;
    }
 
    public function index() {
        $data['view_data'] = '';
          $data['view_data'] = 'search_form';
        $this->load->view('layout/layout',$data);

     
    }
    
    public function execute_normal_search() {


        $this->load->library('form_validation');
        $this->form_validation->set_rules('search', 'search job', 'required');
        if ($this->form_validation->run() == FALSE) {
            if ($this->input->post('act') == 'create_post') {
                $this->Blogmodel->insert_entry();
            }

            $data['blogs'] = $this->Blogmodel->get_last_ten_entries();
            $data['view_data'] = '';
            $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
            $data["content"] = 'layout/home';
            $this->load->view('layout/layout', $data);
        } else {

            $search_term = $this->input->post('search');

            $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
            $data['results'] = $this->search_model->get_normal_results($search_term);



            //$this->load->view('search_results', $data);
            $data['view_data'] = '';
            //$data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
            $data["content"] = "search/search_results";
            $this->load->view('layout/layout', $data);
        }
    }

    public function execute_search() {

$data['view_data'] = '';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('search', 'search job', 'required');
        if ($this->form_validation->run() == FALSE) {
           // $data['info'] = "<script>alert('search feild cannot be empty');</script>";
               $data['content']='search_form';
            $this->load->view('layout/layout',$data);
        } else {

            $search_term = $this->input->post('search');
            $search_term2= $this->input->post('company_location');
       $search_term3= $this->input->post('contract_type');
       $search_term4=$this->input->post('employment_equity');
//             
            $data['results'] = $this->search_model->get_results($search_term,$search_term2,$search_term3,$search_term4);

IF ($data['results']==NULL){
    $data['content']='search_form';
            $this->load->view('layout/layout',$data);
//    echo'No results,please search again!!';
}
ELSE
            //$this->load->view('search_results', $data);
    
        $data['content']="search/search_results";
            $this->load->view('layout/layout',$data);     }
    }
}

?>