<?php

class Profile extends CI_Controller {

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
        $this->load->model('Profile_model');

        $this->auth = new stdClass;

        $this->load->library('flexi_auth');

        if (!$this->flexi_auth->is_logged_in() && $this->uri->segment(2) != 'update_email') {
            $this->flexi_auth->set_error_message('You must login to access this area.', TRUE);
            $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
            redirect('auth');
        }

        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));

        $this->data = null;
    }

    //Load personal display/add view
    public function personal() {
        $data['header']['title'] = 'Your Profile';
        $data['footer']['scripts']['homescript.js'] = 'home';
        $data['content'] = 'profile/personal_add_view';
        $data['view_data'] = $this->Profile_model->get_personal_data($this->session->userdata('id_number'));
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
        $this->load->view('layout/layout', $data);
    }

    //Load job history add view
    public function job_history() {
        $data['header']['title'] = 'Your Employment History';
        $data['footer']['scripts']['homescript.js'] = 'home';

        $query = $this->Profile_model->get_job_data($this->session->userdata('id_number'));
        $data['view_data']['job_data'] = $query;
        $data['view_data']['industry_types'] = $this->Profile_model->get_industry_types();
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
        if ($query == NULL) {
            $data['content'] = 'profile/job_add_view';
        } else {
            $data['content'] = 'profile/job_display_view';
        }

        $this->load->view('layout/layout', $data);
    }

    //Load job history edit view
    public function edit_job_history() {
        $data['header']['title'] = 'Edit Employment History';
        $data['footer']['scripts']['homescript.js'] = 'home';
        $data['view_name'] = 'job_edit_view';
        $data['view_data']['job'] = $this->Profile_model->get_job_data();
$data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
        $this->load->view('page_view', $data);
    }

    //Saving personal data
    public function save_personal() {
        if (isset($_POST) && $_POST['save'] == 'Save') {
            $data['id_number'] = $this->input->post('id_number');
            $data['city'] = $this->input->post('city');
            $data['relocate'] = $this->input->post('relocate');
            $data['minimum_salary'] = $this->input->post('minimum_salary');
            $data['preferred_salary'] = $this->input->post('preferred_salary');
            $data['contract_type'] = $this->input->post('contract_type');
            $data['street'] = $this->input->post('street');
            $data['suburb'] = $this->input->post('suburb');
            $data['postal_code'] = $this->input->post('postal_code');
            $data['license'] = $this->input->post('license');
            $data['race'] = $this->input->post('race');

            $this->Profile_model->save_personal_data($data);
            redirect('profile/personal');
        } else {
            redirect('profile/personal'); // back to the add form
        }
    }

    //Saving personal data
    public function update_personal_data() {
        if (isset($_POST) && $_POST['save'] == 'Save') {
            $data['id_number'] = $this->input->post('id_number');
            $data['city'] = $this->input->post('city');
            $data['relocate'] = $this->input->post('relocate');
            $data['minimum_salary'] = $this->input->post('minimum_salary');
            $data['preferred_salary'] = $this->input->post('preferred_salary');
            $data['contract_type'] = $this->input->post('contract_type');
            $data['street'] = $this->input->post('street');
            $data['suburb'] = $this->input->post('suburb');
            $data['postal_code'] = $this->input->post('postal_code');
            $data['license'] = $this->input->post('license');
            $data['race'] = $this->input->post('race');

            $this->Profile_model->update_personal_data($data);
            redirect('profile/personal');
        } else {
            redirect('profile/personal'); // back to the add form
        }
    }

    //updating job data
    public function update_job_data() {
        if (isset($_POST) && $_POST['save'] == 'Save') {
            $data['id_number'] = $this->input->post('id_number');
            $data['position'] = $this->input->post('position');
            $data['duties'] = $this->input->post('duties');
            $data['industry_type'] = $this->input->post('industry_type');
            $data['start_date'] = $this->input->post('start_date');
            $data['end_date'] = $this->input->post('end_date');

            $this->Profile_model->update_job_data($data);
            redirect('profile/job_history');
        } else {
            redirect('profile/job_history'); // back to the add form
        }
    }

    //Saving job history data
    public function save_job_history() {
        if (isset($_POST) && $_POST['save'] == 'Save') {
            $data['id_number'] = $this->input->post('id_number');
            $data['position'] = $this->input->post('position');
            $data['duties'] = $this->input->post('duties');
            $data['industry_type'] = $this->input->post('industry_type');
            $data['start_date'] = $this->input->post('start_date');
            $data['end_date'] = $this->input->post('end_date');

            $this->Profile_model->save_job_history($data);
            redirect('profile/job_history');
        } else {
            redirect('profile/job_history'); // back to the add form
        }
    }

    //Loading school form
    public function school() {

        $data['header']['title'] = 'Your Profile';
        $data['footer']['scripts']['homescript.js'] = 'home';
        $data['content'] = 'profile/school_add_view';
        $data['view_data']['school_subjects'] = $this->Profile_model->get_school_subjects_data($this->session->userdata('id_number')); 
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
        $data['view_data']['school_data'] = $this->Profile_model->get_school_data($this->session->userdata('id_number'));
        $query = $this->Profile_model->get_syllabus($this->session->userdata('id_number'));
        if(!$query==false)
        {
            if ($query['syllabus'] == 'NSC') {
            $data['view_data']['subjects'] = $this->Profile_model->get_nsc_subjects();
            }

            if ($query['syllabus'] == 'SC') {
                $data['view_data']['subjects'] = $this->Profile_model->get_sc_subjects();
            }

            if ($query['syllabus'] == 'IEB') {
                $data['view_data']['subjects'] = $this->Profile_model->get_ieb_subjects();
            }
            $data['view_data']['syllabus'] = $query;
        }
        
        $data['view_data']['subject_list'] = $this->Profile_model->get_school_subjects_data($this->session->userdata('id_number'));
        $this->load->view('layout/layout', $data);
    }

    //Save school data
    public function save_school() {
        if (isset($_POST) && $_POST['save'] == 'Save') {
            $data['id_number'] = $this->input->post('id_number');
            $data['school_name'] = $this->input->post('school_name');
            $data['syllabus'] = $this->input->post('syllabus');

            $this->Profile_model->save_school_data($data);
            redirect('profile/school');
        } else {
            redirect('profile/school'); // back to the add form
        }
    }

    //Save tertiary data
    public function save_tertiary() {
        if (isset($_POST) && $_POST['save'] == 'Save') {
            $data['id_number'] = $this->input->post('id_number');
            $data['institution'] = $this->input->post('institution');
            $data['type'] = $this->input->post('type');
            $data['course'] = $this->input->post('course');

            $this->Profile_model->save_tertiary_data($data);
            redirect('profile/tertiary');
        } else {
            redirect('profile/tertiary'); // back to the add form
        }
    }
    
     //Save tertiary subject and marks for a logged in user
    public function save_tertiary_subject() {
        if (isset($_POST) && $_POST['save'] == 'Save') {
            $data['id_number'] = $this->input->post('id_number');
            $data['subject'] = $this->input->post('subject');
            $data['marks'] = $this->input->post('marks');

            $this->Profile_model->save_tertiary_subject($data);
            redirect('profile/tertiary');
        } else {
            redirect('profile/tertiary'); // back to the add form
        }
    }

    //Save school subject and marks for a logged in user
    public function save_subject() {
        if (isset($_POST) && $_POST['save'] == 'Save') {
            $data['id_number'] = $this->input->post('id_number');
            $data['subject'] = $this->input->post('subject');
            $data['marks'] = $this->input->post('marks');

            $this->Profile_model->save_school_subject($data);
            redirect('profile/school');
        } else {
            redirect('profile/school'); // back to the add form
        }
    }

    //Save skills for a logged in user
    public function save_transferable_skills() {
        if (isset($_POST) && $_POST['save'] == 'Save') {
           
            if(is_array($this->input->post('skill_name')) &&!is_null($this->input->post('skill_name'))) {
                foreach ($this->input->post('skill_name') as $skill) {
                    $data['id_number'] = $this->input->post('id_number');
                    $data['skill_name'] =$skill;
                    $this->Profile_model->save_tranferable_skills($data);
                }
            }

            redirect('profile/skills');
        } else {
            redirect('profile/skills'); // back to the add form
        }
    }

    //Save skills for a logged in user
    public function save_people_skills() {
        if (isset($_POST) && $_POST['save'] == 'Save') {
           
            if(is_array($this->input->post('skill_name')) &&!is_null($this->input->post('skill_name'))) {
                foreach ($this->input->post('skill_name') as $skill) {
                    $data['id_number'] = $this->input->post('id_number');
                    $data['skill_name'] =$skill;
                    $this->Profile_model->save_people_skills($data);
                }
            }

            redirect('profile/skills');
        } else {
            redirect('profile/skills'); // back to the add form
        }
    }
    
    //Save skills for a logged in user
    public function save_data_skills() {
        if (isset($_POST) && $_POST['save'] == 'Save') {
           
            if(is_array($this->input->post('skill_name')) &&!is_null($this->input->post('skill_name'))) {
                foreach ($this->input->post('skill_name') as $skill) {
                    $data['id_number'] = $this->input->post('id_number');
                    $data['skill_name'] =$skill;
                    $this->Profile_model->save_data_skills($data);
                }
            }

            redirect('profile/skills');
        } else {
            redirect('profile/skills'); // back to the add form
        }
    }
    
    //Save skills for a logged in user
    public function save_leadership_skills() {
        if (isset($_POST) && $_POST['save'] == 'Save') {
           
            if(is_array($this->input->post('skill_name')) &&!is_null($this->input->post('skill_name'))) {
                foreach ($this->input->post('skill_name') as $skill) {
                    $data['id_number'] = $this->input->post('id_number');
                    $data['skill_name'] =$skill;
                    $this->Profile_model->save_leadership_skills($data);
                }
            }

            redirect('profile/skills');
        } else {
            redirect('profile/skills'); // back to the add form
        }
    }


    //Save skills for a logged in user
    public function save_word_skills() {
        if (isset($_POST) && $_POST['save'] == 'Save') {
           
            if(is_array($this->input->post('skill_name')) &&!is_null($this->input->post('skill_name'))) {
                foreach ($this->input->post('skill_name') as $skill) {
                    $data['id_number'] = $this->input->post('id_number');
                    $data['skill_name'] =$skill;
                    $this->Profile_model->save_word_skills($data);
                }
            }

            redirect('profile/skills');
        } else {
            redirect('profile/skills'); // back to the add form
        }
    }

    //Save skills for a logged in user
    public function save_artistic_skills() {
        if (isset($_POST) && $_POST['save'] == 'Save') {
           
            if(is_array($this->input->post('skill_name')) &&!is_null($this->input->post('skill_name'))) {
                foreach ($this->input->post('skill_name') as $skill) {
                    $data['id_number'] = $this->input->post('id_number');
                    $data['skill_name'] =$skill;
                    $this->Profile_model->save_artistic_skills($data);
                }
            }

            redirect('profile/skills');
        } else {
            redirect('profile/skills'); // back to the add form
        }
    }
    
    //Save skills for a logged in user
    public function save_other_skills() {
        if (isset($_POST) && $_POST['save'] == 'Save') {
           
            if(is_array($this->input->post('skill_name')) &&!is_null($this->input->post('skill_name'))) {
                foreach ($this->input->post('skill_name') as $skill) {
                    $data['id_number'] = $this->input->post('id_number');
                    $data['skill_name'] =$skill;
                    $this->Profile_model->save_other_skills($data);
                }
            }

            redirect('profile/skills');
        } else {
            redirect('profile/skills'); // back to the add form
        }
    }

    
    //Modify school subject
    public function modify_school_subject($id = null) {
        if ($id == null) {
            show_error('No identifier provided', 500);
        } else {
            $data['header']['title'] = 'Edit School Subject';
            $data['footer']['scripts']['homescript.js'] = 'home';
            $data['content'] = 'profile/subject_edit_view';
            $data['view_data']['old_data'] = $this->profile_model->get_school_subject($id);
            $query = $this->Profile_model->get_syllabus($this->session->userdata('id_number'));
            if ($query['syllabus'] == 'NSC') {
                $data['view_data']['subjects'] = $this->Profile_model->get_nsc_subjects();
            }

            if ($query['syllabus'] == 'SC') {
                $data['view_data']['subjects'] = $this->Profile_model->get_sc_subjects();
            }

            if ($query['syllabus'] == 'IEB') {
                $data['view_data']['subjects'] = $this->Profile_model->get_ieb_subjects();
            }
            $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
            $data['view_data']['syllabus'] = $query;
            $this->load->view('layout/layout', $data);
        }
    }

    //Edit school informartion
    public function modify_school()
    {

        $data['header']['title'] = 'Edit School Information';
        $data['footer']['scripts']['homescript.js'] = 'home';
        $data['content'] = 'profile/modify_school';
        $data['view_data']['school_data'] = $this->Profile_model->get_school_data($this->session->userdata('id_number'));
$data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
        $this->load->view('layout/layout', $data);
    }

    public function modify_tertiary()
    {
$data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
        $data['header']['title'] = 'Edit Tertiary Information';
        $data['footer']['scripts']['homescript.js'] = 'home';
        $data['content'] = 'profile/qualification_edit_view';
        $data['view_data']['qualification'] = $this->Profile_model->get_tertiary_qualification($this->session->userdata('id_number'));

        $this->load->view('layout/layout', $data);
    }


    //Modify tertiary subject
    public function modify_tertiary_subject($id = null) {
        if ($id == null) {
            show_error('No identifier provided', 500);
        } else {
            $data['header']['title'] = 'Edit Tertiary Subject';
            $data['footer']['scripts']['homescript.js'] = 'home';
            $data['content'] = 'profile/tertiary_subject_edit_view';
            $data['view_data']['tertiary_subject_data'] = $this->profile_model->get_tertiary_subject($id);
            $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
            $this->load->view('layout/layout', $data);
        }
    }

    //Modify personal data
    public function modify_personal_data($id_number = null) {
        if ($id_number == null) {
            show_error('No identifier provided', 500);
        } else {
            $data['header']['title'] = 'Edit Personal Data';
            $data['content'] = 'profile/personal_edit_view';
            $data['view_data']['personal_data'] = $this->Profile_model->get_personal_data($id_number);
            $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
            $this->load->view('layout/layout', $data);
        }
    }

    //Modify job history data
    public function modify_job_data($id_number = null) {
        if ($id_number == null) {
            show_error('No identifier provided', 500);
        } else {
            $data['header']['title'] = 'Edit Job History';
            $data['content'] = 'profile/job_edit_view';
            $data['view_data']['industry_types'] = $this->Profile_model->get_industry_types();
            $data['view_data']['job_data'] = $this->Profile_model->get_job_data($id_number);
            $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
            $this->load->view('layout/layout', $data);
        }
    }

    //Update school subject 
    public function update_school_subject() 
    {
        if (isset($_POST) && $_POST['save'] == 'Save') {
            $data['id'] = $this->input->post('id');
            $data['subject'] = $this->input->post('subject');
            $data['marks'] = $this->input->post('marks');

            $this->Profile_model->update_subject_data($data);
            redirect('profile/school'); // back to the add form
        } else {
            redirect('profile/school');
        }
    }

    //Update school information 
    public function update_school() 
    {
        if (isset($_POST) && $_POST['save'] == 'Save') {
            $data['id_number'] = $this->input->post('id_number');
            $data['school_name'] = $this->input->post('school_name');
            //$data['syllabus'] = $this->input->post('syllabus');

            $this->Profile_model->update_school($data);
            redirect('profile/school'); // back to the add form
        } else {
            redirect('profile/school');
        }
    }

    //Update tertiary information 
    public function update_tertiary() 
    {
        if (isset($_POST) && $_POST['save'] == 'Save') {
            $data['id_number'] = $this->input->post('id_number');
            $data['institution'] = $this->input->post('institution');
            $data['type'] = $this->input->post('type');
            $data['course'] = $this->input->post('course');

            $this->Profile_model->update_tertiary($data);
            redirect('profile/tertiary'); // back to the add form
        } else {
            redirect('profile/tertiary');
        }
    }

    //Update tertiary subject 
    public function update_tertiary_subject() {
        if (isset($_POST) && $_POST['save'] == 'Save') {
            $data['id'] = $this->input->post('id');
            $data['id_number'] = $this->input->post('id_number');
            $data['subject'] = $this->input->post('subject');
            $data['marks'] = $this->input->post('marks');

            $this->Profile_model->update_tertiary_subject($data);
            redirect('profile/tertiary'); // back to the add form
        } else {
            redirect('profile/tertiary');
        }
    }

    //Delete a user's subject
    public function remove_school_subject($id = null) {
        if ($id == null) {
            show_error('No identifier provided', 500);
        } else {
            $this->Profile_model->remove_school_subject($id);
            redirect('profile/school'); // back to the listing
        }
    }

    //Delete a user's tertiary subject
    public function remove_tertiary_subject($id = null) {
        if ($id == null) {
            show_error('No identifier provided', 500);
        } else {
            $this->Profile_model->remove_tertiary_subject($id);
            redirect('profile/tertiary'); // back to the listing
        }
    }

    //Loading Tertiary form
    public function tertiary() {
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
        $data['header']['title'] = 'Tertiary Information';
        $data['footer']['scripts']['homescript.js'] = 'home';
        $data['content'] = 'profile/tertiary_add_view';
        $data['view_data']['tertiary_subjects'] = $this->Profile_model->get_tertiary_subjects_data($this->session->userdata('id_number'));
        $data['view_data']['qualification'] = $this->Profile_model->get_tertiary_qualification($this->session->userdata('id_number'));
        $this->load->view('layout/layout', $data);
    }

    public function browse_jobs() {

        $data['header']['title'] = 'Browse Jobs';
        $data['content'] = 'advert/browse_jobs';
        $data['view_data']['job_adverts'] = $this->Profile_model->get_all_adverts();
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
        $this->load->view('layout/layout', $data);
    }

    public function view_advert($advert_id) {

        $data['header']['title'] = 'Full Advert Description';
        $data['content'] = 'advert/advert_display';
        $data['view_data']['job_adverts'] = $this->Profile_model->get_advert($advert_id);
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();
        $this->load->view('layout/layout', $data);
    }

    //Load skills add view
    public function skills() {
        $data['header']['title'] = 'Skills Information';
        $data['footer']['scripts']['homescript.js'] = 'home';
        $data['content'] = 'profile/skills_add_view';
        $data['view_data']['people_skills'] = $this->Profile_model->get_people_skills($this->session->userdata('id_number'));
        $data['view_data']['data_skills'] = $this->Profile_model->get_data_skills($this->session->userdata('id_number'));
        $data['view_data']['transferable_skills'] = $this->Profile_model->get_transferable_skills($this->session->userdata('id_number'));
        $data['view_data']['word_skills'] = $this->Profile_model->get_word_skills($this->session->userdata('id_number'));
        $data['view_data']['artistic_skills'] = $this->Profile_model->get_artistic_skills($this->session->userdata('id_number'));
        $data['view_data']['other_skills'] = $this->Profile_model->get_other_skills($this->session->userdata('id_number'));
        $data['view_data']['leadership_skills'] = $this->Profile_model->get_leadership_skills($this->session->userdata('id_number'));
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

        $this->load->view('layout/layout', $data);
    }

    //save sc subject
    public function add_sc_subjects() {
        $data['subject'] = $this->input->post('subject');
        $this->Profile_model->add_sc_subjects($data);
    }

    //save nsc subject
    public function add_nsc_subjects() {
        $data['subject'] = $this->input->post('subject');
        $this->Profile_model->add_nsc_subjects($data);
    }

    //save ieb subject
    public function add_ieb_subjects() {
        $data['subject'] = $this->input->post('subject');
        $this->Profile_model->add_ieb_subjects($data);
    }

}