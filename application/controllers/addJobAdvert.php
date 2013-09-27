<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class AddJobAdvert extends CI_Controller {

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
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');

        $this->auth = new stdClass;

        $this->load->library('flexi_auth');

        if (!$this->flexi_auth->is_logged_in_via_password() || !$this->flexi_auth->is_admin()) {
            $this->flexi_auth->set_error_message('You must login as an admin to access this area.', TRUE);
            $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
            $this->session->set_userdata('last_page', current_url());
            redirect('auth');
        }
        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));
        $this->data = null;
    }

    function index() {
        
        $data['view_data'] = ''; {
            $data['message'] = $this->session->flashdata('message'); {
                if ($this->input->post('update_account')) {
                    $this->load->model('demo_auth_model');
                    $this->demo_auth_model->update_account();
                }

                $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
               // print_r($data['user']);
                $data['content'] = 'advert/addJobAdvert_view';
                $this->load->view('layout/layout', $data);
            }
        }
    }

    function addAdvert() {
        $name = array();
        $name = $this->flexi_auth->get_user_by_identity_row_array();
        $first_name = $name['upro_first_name'];
        $last_name = $name['upro_last_name'];
        $this->form_validation->set_rules('job_title', 'Job Title', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('job_description', 'Job Description', 'trim|required|max_length[1000]');
        $this->form_validation->set_rules('industry', 'Industry', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('job_duties', 'Job Duties', 'trim|required|max_length[1000]');
        $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
        $this->form_validation->set_rules('num_of_positions', 'Number Of Available Positions', 'trim|required|is_natural_no_zero|max_length[5]');
        $this->form_validation->set_rules('salary_offered', 'Salary', 'trim|required|numeric|max_length[12]');
        $this->form_validation->set_rules('required_experience', 'Required Experience', 'trim|required|numeric|max_length[2]');
        if ($this->form_validation->run() == FALSE) {
            $data['view_data'] = ''; {
                $data['message'] = $this->session->flashdata('message'); {
                    if ($this->input->post('update_account')) {
                        $this->load->model('demo_auth_model');
                        $this->demo_auth_model->update_account();
                    }
                }
            }
            $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

            $data['content'] = 'advert/addJobAdvert_view';
            $this->load->view('layout/layout', $data);
        } else {
            $qn = json_encode($this->input->post('qualification_name'));
            $qt = json_encode($this->input->post('qualification_type'));
            $data = array(
                'job_title' => $this->input->post('job_title'),
                'company_name' => $this->input->post('company_name'),
                'job_description' => $this->input->post('job_description'),
                'job_duties' => $this->input->post('job_duties'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'num_of_positions' => $this->input->post('num_of_positions'),
                'salary_offered' => $this->input->post('salary_offered'),
                'salary_type' => $this->input->post('salary_type'),
                'medical_aid' => $this->input->post('medical_aid'),
                'uif' => $this->input->post('uif'),
                'car_allowance' => $this->input->post('car_allowance'),
                'home_allowance' => $this->input->post('home_allowance'),
                'other_benefits' => $this->input->post('other_benefits'),
                'negotiable' => $this->input->post('negotiable'),
                'contract_type' => $this->input->post('contract_type'),
                'company_location' => $this->input->post('company_location'),
                'required_experience' => $this->input->post('required_experience'),
                'age_group' => $this->input->post('age_group'),
                'male' => $this->input->post('male'),
                'female' => $this->input->post('female'),
                'industry_type' => $this->input->post('industry'),
                'employment_equity' => $this->input->post('employment_equity'),
//                    'qualification_name' => $this->input->post('qualification_name'),
//                    'qualification_type' => $this->input->post('qualification_type'),
//                    'qualification_duration' => $this->input->post('qualification_duration'),
                'qualification_name' => $qn,
                'qualification_type' => $qt,
                'drivers_licence' => $this->input->post('drivers_licence'),
                'consultant_name' => $first_name." ".$last_name,
            );
            $this->addJobAdvert_model->add_Advert($data);
            $data['view_data'] = ''; {
                $data['message'] = $this->session->flashdata('message'); {
                    if ($this->input->post('update_account')) {
                        $this->load->model('demo_auth_model');
                        $this->demo_auth_model->update_account();
                    }

                    $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

                    $data['content'] = 'advert/addAdvertSuccess';
                    $this->load->view('layout/layout', $data);
                }
            }
        }
    }

}
