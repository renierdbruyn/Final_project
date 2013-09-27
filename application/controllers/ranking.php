<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Renier de Bruyn <renierdbruyn@hotmail.com>
 */
class ranking extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ranking_model');

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
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');

        $this->auth = new stdClass;

        $this->load->library('flexi_auth');

        if ($this->flexi_auth->is_logged_in_via_password() && uri_string() != 'auth/logout') {
            if ($this->session->flashdata('message')) {
                $this->session->keep_flashdata('message');
            }
        }
        if (!$this->flexi_auth->is_logged_in_via_password() || !$this->flexi_auth->is_admin()) {
            $this->flexi_auth->set_error_message('You must login as an admin to access this area.', TRUE);
            $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
            $this->session->set_userdata('last_page', current_url());
            redirect('auth');
        }
        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));
        $this->data = null;
    }

//public $i;
    public function index() {

        $data['info'] = $this->ranking_model->rank();
        // $data['results'] = $this->get_detailed_list();
        $data['content'] = 'admin/ranking/ranking';
        $data['view_data'] = '';
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
        $this->load->view('layout/layout', $data);
    }

    function display_details() {
        $data['adverts'] = $this->ranking_model->get_advert_by_id();
        $data['applicants'] = $this->ranking_model->get_applicant_by_id();
        // $data['results'] = $this->get_detailed_list();
        $data['content'] = 'admin/ranking/app_details';
        $data['view_data'] = '';
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
        $this->load->view('layout/layout', $data);
    }

    function rank_email() {
        $data['info'] = $this->ranking_model->send_applicant_results;
    }

}

