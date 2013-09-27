<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Site extends CI_Controller {

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
        $this->load->model('Blogmodel');



        $this->auth = new stdClass;

        $this->load->library('flexi_auth');


        if ($this->flexi_auth->is_logged_in_via_password() && uri_string() != 'auth/logout') {
            if ($this->session->flashdata('message')) {
                $this->session->keep_flashdata('message');
            }
        }


        $this->data = null;
    }

    public function index() {

        if ($this->input->post('act') == 'create_post') {
            $this->Blogmodel->insert_entry();
        }

        $data['blogs'] = $this->Blogmodel->get_last_ten_entries();
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

        $data['view_data'] = '';
        $data["content"] = "layout/home";
        $this->load->view('layout/layout', $data);
    }

    public function about() {
        if ($this->input->post('act') == 'create_post') {
            $this->Blogmodel->insert_entry();
        }

        $data['blogs'] = $this->Blogmodel->get_last_ten_entries();
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

        $data['view_data'] = '';

        $data["content"] = "layout/about";
        $this->load->view('layout/layout', $data);
    }

    public function home() {
        if ($this->input->post('act') == 'create_post') {
            $this->Blogmodel->insert_entry();
        }

        $data['blogs'] = $this->Blogmodel->get_last_ten_entries();
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

        $data['view_data'] = '';

        $data["content"] = "layout/home";
        $this->load->view('layout/layout', $data);
    }

    public function uploads() {
        if ($this->input->post('act') == 'create_post') {
            $this->Blogmodel->insert_entry();
        }

        $data['blogs'] = $this->Blogmodel->get_last_ten_entries();
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

        $data['view_data'] = '';

        $data["content"] = "profile_forms/personal_form";
        $this->load->view('layout/layout', $data);
    }

    public function profile() {
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

        $data['view_data'] = '';

        $data["content"] = "profile_page";
        $this->load->view('layout/layout', $data);
    }

    public function contact() {
        if ($this->input->post('act') == 'create_post') {
            $this->Blogmodel->insert_entry();
        }
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

        $data['blogs'] = $this->Blogmodel->get_last_ten_entries();
        $data['view_data'] = '';

        $data["content"] = "contact/contact";
        $this->load->view('layout/layout', $data);
    }

    public function services() {
        if ($this->input->post('act') == 'create_post') {
            $this->Blogmodel->insert_entry();
        }
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

        $data['blogs'] = $this->Blogmodel->get_last_ten_entries();
        $data['view_data'] = '';

        $data["content"] = "layout/services";
        $this->load->view('layout/layout', $data);
    }

    public function advice() {
        if ($this->input->post('act') == 'create_post') {
            $this->Blogmodel->insert_entry();
        }
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

        $data['blogs'] = $this->Blogmodel->get_last_ten_entries();
        $data['view_data'] = '';

        $data["content"] = "layout/advice";
        $this->load->view('layout/layout', $data);
    }

    public function mentor() {
        if ($this->input->post('act') == 'create_post') {
            $this->Blogmodel->insert_entry();
        }
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

        $data['blogs'] = $this->Blogmodel->get_last_ten_entries();
        $data['view_data'] = '';

        $data["content"] = "layout/mentor";
        $this->load->view('layout/layout', $data);
    }

    public function personality() {
        if ($this->input->post('act') == 'create_post') {
            $this->Blogmodel->insert_entry();
        }
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

        $data['blogs'] = $this->Blogmodel->get_last_ten_entries();
        $data['view_data'] = '';

        $data["content"] = "layout/personality";
        $this->load->view('layout/layout', $data);
    }

}

?>