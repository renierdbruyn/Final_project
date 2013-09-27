<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class HomeController extends CI_Controller {

    public function index() {

        //load the session library
        $this->load->library('session');

        //if form submitted and given captcha word matches one in session
        if ($this->input->post() && ($this->input->post('word') == $this->session->userdata('word'))) {

            $this->load - view('signup_form.php');
        } else {
            //load codeigniter captcha helper
            $this->load->helper('captcha');

            $vals = array(
                'img_path' => './captcha/',
                'img_url' => 'http://localhost:8080/ci/captcha/',
                'img_width' => '200',
                'img_height' => 30,
                'border' => 0,
                'expiration' => 7200
            );

            //create captcha image
            $cap = create_captcha($vals);

            //store image html code in a varible
            $data['image'] = $cap['image'];

            //store the captcha word in a session
            $this->session->set_userdata('word', $cap['word']);

            $this->load->view('captcha_view', $data);
        }
    }

}