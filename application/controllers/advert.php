<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Advert extends CI_Controller {

    // calling the constructor
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
        $this->load->model('Advert_model');

        $this->auth = new stdClass;

        $this->load->library('flexi_auth');

        if (!$this->flexi_auth->is_logged_in() && $this->uri->segment(2) != 'update_email') {
            $this->flexi_auth->set_error_message('You must login to access this area.', TRUE);
            $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
            $this->session->set_userdata('last_page', current_url());
            redirect('auth');
        }

        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));

        $this->data = null;
    }

    public function browse_jobs() {
        $data['header']['title'] = 'Browse Jobs';
        $data['content'] = 'advert/browse_jobs';
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
        $data['view_data']['job_adverts'] = $this->Advert_model->get_all_adverts();
        $this->load->view('layout/layout', $data);
    }

    public function view_advert($advert_id) {
        $data['header']['title'] = 'Full Advert Description';
        $data['content'] = 'advert/advert_display';
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
        $data['view_data']['advert_fields'] = $this->Advert_model->get_advert($advert_id);
        $this->load->view('layout/layout', $data);
    }

    public function review_advert($advert_id) {
        $data['header']['title'] = 'Full Advert Description';
        $data['content'] = 'advert/advert_review';
        $data['view_data']['advert_fields'] = $this->Advert_model->get_advert($advert_id);
        $this->load->view('layout/layout', $data);
    }

    function apply($advert_id) {//get job title on query for display
        $sq = $this->db->select('consultant_name')->from('job_advert')->where('advert_id', $advert_id)->get();
        // $sql = "SELECT consultant_name FROM job_advert WHERE advert_id ='{$this->db->escape($advert_id)}'";
        $data['id_number'] = $this->session->userdata('id_number');
        $data['advert_id'] = $advert_id;
        $data['status'] = 'pending';
        foreach ($sq->result() as $consultant) {
            if (!$consultant->consultant_name == "") {
                $data['consultant'] = $consultant->consultant_name;
            } else {
                $data['consultant'] = "not yet assigned";
            }
        }

        // $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

        if ($this->Advert_model->apply($data) === FALSE) {
            echo "<script>alert('You have already applied for this job.');window.location.href = '" . base_url() . "index.php/advert/applications/" . $data['id_number'] . "';</script> </a>";
            //redirect($this->session->userdata('last_page'));
        } else {

            redirect("advert/applications/" . $data['id_number'] . "");
        }
    }

    public function applications($id_number) {
        $data['header']['title'] = 'Applications';
        $data['content'] = 'advert/applications';
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
        $data['sidebar'] = 'profile/applicant_sidebar';
        $data['view_data']['applications'] = $this->Advert_model->get_application($id_number);
        $this->load->view('layout/layout', $data);
    }

    public function advert_stats() {
        $data['header']['title'] = 'Advert Statistics';
        $data['content'] = 'advert/statistics';
        $data['view_data']['advert_stats'] = $this->Advert_model->get_applications_stats();
        $this->load->view('layout/layout', $data);
    }

    public function view_applicants() {
        $data['header']['title'] = 'Advert Statistics';
        $data['content'] = 'advert/advert_applicaions';
        $data['view_data']['application_s'] = $this->Advert_model->get_applications_stats();
        $this->load->view('layout/layout', $data);
    }

}

?>
