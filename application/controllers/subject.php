<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Subjects extends CI_Controller {

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
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('Profile_model');
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
        $data['message'] = $this->session->flashdata('message');


        if ($this->input->post('update_account')) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->update_account();
        }
    }

    public function personal() {
        $data['header']['title'] = 'Your Profile';
        $data['footer']['scripts']['homescript.js'] = 'home';
        $data['content'] = 'cv/profile_view';
        $data['view_data'] = $this->Profile_model->get('9002035637082');
        $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

        $this->load->view('layout/layout', $data);
    }

    public function add_nsc() {
        $nsc = array("Accounting",
            "Agricultural Management Practice",
            "Agricultural Science",
            "Agricultural Technology",
            "Business Studies",
            "Civil Technology",
            "Computer Applications Technology",
            "Consumer Studies",
            "Dance Studies",
            "Design",
            "Dramatic Arts",
            "Economics",
            "Electrical Technology",
            "Engineering Graphics and Design",
            "Geography",
            "History",
            "Hospitality",
            "Information Technology",
            "Life Sciences",
            "Mathematics",
            "Maths Literacy",
            "Mechanical Technology",
            "Music",
            "Physical Science",
            "Religion Studies",
            "Tourism",
            "Visual Arts"
        );

        /* $sc = array("Afrikaans",
          "English",
          "IsiNdebele",
          "IsiXhosa",
          "IsiZulu",
          "Sepedi",
          "Sesotho",
          "Setswana",
          "Siswati",
          "Tshivenda",
          "Xitsonga",
          "Accounting SG",
          "Applied Agriculture SG",
          "Biblical Studies HG",
          "Biology HG",
          "Biology SG",
          "Business Economics HG",
          "Business Economics SG",
          "Commercial Mathematics SG",
          "Computer Studies HG",
          "Computer Studies SG",
          "Economics HG",
          "Economics SG",
          "Functional Mathematics SG",
          "Geography SG",
          "History HG",
          "History SG",
          "Home Economics HG",
          "Home Economics SG",
          "Physical Science HG",
          "Physical Science SG",
          "Technical Drawing HG",
          "Technical Drawing SG");

          $ieb = array("Afrikaans Home Language",
          "Afrikaans First Additional Language",
          "English Home Language",
          "English First Additional Language",
          "IsiXhosa First Additional Language",
          "IsiZulu Home Language",
          "IsiZulu First Additional Language",
          "Sepedi First Additional Language",
          "Sesotho First Additional Language",
          "Setswana First Additional Language",
          "SiSwati Home Language",
          "SiSwati First Additional Language",
          "Mathematical Literacy",
          "Mathematics",
          "Life Orientation",
          "Dance",
          "Design",
          "Dramatic Arts",
          "Music",
          "Visual Culture Studies / Visual Arts",
          "Accounting",
          "Business Studies",
          "Economics",
          "Arabic Second Additional Language",
          "French Second Additional Language",
          "German Home Language",
          "German Second Additional Language",
          "Gujarati Home Language",
          "Gujarati First Additional Language",
          "Gujarati Second Additional Language",
          "Hebrew Second Additional Language",
          "Hindi Second Additional Language",
          "Italian Second Additional Language",
          "Latin Second Additional Language",
          "Modern Greek Second Additional Language",
          "Portuguese Home Language",
          "Portuguese First Additional Language",
          "Portuguese Second Additional Language",
          "Spanish Second Additional Language",
          "Tshivenda First Additional Language",
          "Civil Technology",
          "Engineering Graphics and Design",
          "Geography",
          "History",
          "Religion Studies",
          "Computer Applications Technology",
          "Information Technology",
          "Life Sciences",
          "Physical Sciences",
          "Consumer Studies",
          "Hospitality Studies",
          "Tourism",
          "Equine Studies",
          "Sports and Exercise Science",
          "Royal Schools of Music Practical Grade 6",
          "Royal Schools of Music Practical Grade 7",
          "Royal Schools of Music Practical Grade 8",
          "Trinity College of London Practical Grade 6",
          "Trinity College of London Practical Grade 7",
          "Trinity College of London Practical Grade 8",
          "Trinity College of London Performer's Licentiate",
          "Unisa Practical Music Grade 6",
          "Unisa Practical Music Grade 7",
          "Unisa Practical Music Grade 8",
          "Unisa Performer's Licentiate in Music",
          "Advanced Programme Mathematics",
          "Advanced Mathematics"); */


        foreach ($nsc as $subject) {
            //echo $nsc[1]."<br>";
            echo $subject;
            $this->Profile_model->save_subject($data);
        }


        //$this->load->view("view_nsc_list");
    }

}