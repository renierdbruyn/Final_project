<?php

class Report extends CI_Controller {

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
        $this->load->model("reportmodel");
        $this->load->helper('mpdf');

        $this->auth = new stdClass;

        $this->load->library('flexi_auth');



        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));

        $this->data = null;
    }

    public function index() {

        $this->load->model('reportmodel');

        if ($this->input->post('act') == 'create_post') {
            $this->reportmodel->add();
        }

        $data['report'] = $this->reportmodel->get_all();


        $html = $this->load->view('reportview', $data, TRUE);

        pdf_create($html, ('index'), TRUE);
    }

    public function long2() {
        $this->load->model('reportmodel');

        if ($this->input->post('act') == 'create_post') {
            $this->reportmodel->add();
        }

        $data['report'] = $this->reportmodel->word();


        $html = $this->load->view('test1', $data, TRUE);

        pdf_create($html, ('index'), TRUE);
    }

}

