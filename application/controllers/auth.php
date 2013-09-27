<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

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

    function index() {
        $this->login();
    }

    function login() {
        if ($this->input->post('login_user')) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->login();
        }

        // CAPTCHA 
        if ($this->flexi_auth->ip_login_attempts_exceeded()) {

            $data['captcha'] = $this->flexi_auth->recaptcha(FALSE);
        }

        $data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        if ($this->input->post('act') == 'create_post') {
            $this->Blogmodel->insert_entry();
        }

        $data['blogs'] = $this->Blogmodel->get_last_ten_entries();
        $data['view_data'] = '';

        $data['content'] = 'login/login_view';
        $this->load->view('layout/layout', $data);
    }

    function register_account() {
        if ($this->flexi_auth->is_logged_in()) {
            redirect('auth');
        } else if ($this->input->post('register_user')) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->register_account();
        }

        //$data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];		
        if ($this->input->post('act') == 'create_post') {
            $this->Blogmodel->insert_entry();
        }

        $data['blogs'] = $this->Blogmodel->get_last_ten_entries();
        $data['view_data'] = '';

        $data['content'] = 'login/public/register_view';
        $this->load->view('layout/layout', $data);
    }

    function activate_account($user_id, $token = FALSE) {
        $this->flexi_auth->activate_user($user_id, $token, TRUE);

        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());

        redirect('auth');
    }

    function resend_activation_token() {
        if ($this->input->post('send_activation_token')) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->resend_activation_token();
        }

        $data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        if ($this->input->post('act') == 'create_post') {
            $this->Blogmodel->insert_entry();
        }

        $data['blogs'] = $this->Blogmodel->get_last_ten_entries();
        $data['view_data'] = '';

        $data['content'] = 'login/public/resend_activation_token_view';
        $this->load->view('layout/layout', $data);
    }

    function forgotten_password() {
        if ($this->input->post('send_forgotten_password')) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->forgotten_password();
        }

        $data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        if ($this->input->post('act') == 'create_post') {
            $this->Blogmodel->insert_entry();
        }

        $data['blogs'] = $this->Blogmodel->get_last_ten_entries();
        $data['view_data'] = '';

        $data['content'] = 'login/public/forgot_password_view';
        $this->load->view('layout/layout', $data);
    }

    function manual_reset_forgotten_password($user_id = FALSE, $token = FALSE) {
        if ($this->input->post('change_forgotten_password')) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->manual_reset_forgotten_password($user_id, $token);
        }

        $data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        if ($this->input->post('act') == 'create_post') {
            $this->Blogmodel->insert_entry();
        }

        $data['blogs'] = $this->Blogmodel->get_last_ten_entries();
        $data['view_data'] = '';

        $data['content'] = 'login/public/forgot_password_update_view';
        $this->load->view('layout/layout', $data);
    }

    function auto_reset_forgotten_password($user_id = FALSE, $token = FALSE) {

        $this->flexi_auth->forgotten_password_complete($user_id, $token, FALSE, TRUE);

        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());

        redirect('auth');
    }

    function logout() {
        $this->flexi_auth->logout(TRUE);

        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());

        redirect('auth');
    }

    function logout_session() {
        $this->flexi_auth->logout(FALSE);

        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());

        redirect('auth');
    }

}
