<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Search extends CI_Controller {

    function __construct() {
        parent::__construct();

        // To load the CI benchmark and memory usage profiler - set 1==1.
        if (1 == 2) {
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
        $this->load->helper('form');
        $this->load->model('Blogmodel');
        $this->load->model('search_model');

        $this->load->helper('html');
        $this->load->library("pagination");

        // IMPORTANT! This global must be defined BEFORE the flexi auth library is loaded! 
        // It is used as a global that is accessible via both models and both libraries, without it, flexi auth will not work.
        $this->auth = new stdClass;

        $this->load->library('flexi_auth');


        if ($this->flexi_auth->is_logged_in_via_password() && uri_string() != 'auth/logout') {
            if ($this->session->flashdata('message')) {
                $this->session->keep_flashdata('message');
            }
        }

        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));

        $this->data = null;
    }

    public function index() {
        $this->load->view('search_form');
    }

    public function execute_search() {


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
            $data['results'] = $this->search_model->get_results($search_term);



            //$this->load->view('search_results', $data);
            $data['view_data'] = '';
            $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
            $data["content"] = "search/search_results";
            $this->load->view('layout/layout', $data);
        }
    }

}

?>