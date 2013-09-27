<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Upload extends CI_Controller {

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
        $this->load->model('files_model');
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

    function index() {
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
        $data['rows'] = $this->files_model->getAll();
        $data['error'] = '';
        $data['view_data'] = '';
        $data['content'] = 'upload/upload_form';
        $this->load->view('layout/layout', $data);
    }

    function do_upload() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload/upload_form', $error);
        } else {
            $data = $this->upload->data();
            $this->files_model->insert_file($data['file_name'], $data['file_type'], $data['file_path'], $data['full_path']);

            $data2 = array('upload_data' => $this->upload->data());
            $this->load->view('upload/upload_success', $data2);
        }
    }

    function del($id = 0) {

        $this->load->library('table');

        $this->load->helper('html');

        if ((int) $id > 0) {

            $this->files_model->delete($id);
        }

        $data['rows'] = $this->files_model->getAll();

        $this->load->view('upload_form', $data);
    }

}

?>
