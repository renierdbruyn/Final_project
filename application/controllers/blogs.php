<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Blogs extends CI_Controller {

    public function __construct() {
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

        $this->auth = new stdClass;

        $this->load->library('flexi_auth');

        if ($this->flexi_auth->is_logged_in_via_password() && uri_string() != 'auth/logout') {
            if ($this->session->flashdata('message')) {
                $this->session->keep_flashdata('message');
            }

            if ($this->flexi_auth->is_admin()) {
                $this->session->set_userdata('last_page', current_url());
                redirect('auth_admin/dashboard');
            } else {
                $this->session->set_userdata('last_page', current_url());
                redirect('auth_public/dashboard');
            }
        }

        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));

        $this->data = null;
         
    }

    public function index() {
$this->load->model('Blogmodel');

       

        if ($this->input->post('act') == 'create_post') {
            $this->Blogmodel->insert_entry();
        }

        $data['blogs'] = $this->Blogmodel->get_last_ten_entries();

$data['view_data'] ='' ;
        $data['content'] = 'blogs';
        $this->load->view('layout/layout', $data);
    }

}

