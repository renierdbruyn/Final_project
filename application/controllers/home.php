
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        //load the model
        $this->load->model('your_model');

        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "home/index/";
        $config["total_rows"] = $this->your_model->record_count();
        $config["per_page"] = 10;

        //pagination customization using bootstrap styles
        $config['full_tag_open'] = '<div class="pagination pagination-centered"><ul class="page_test">'; // I added class name 'page_test' to used later for jQuery
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['page'] = $page;

        $data["results"] = $this->your_model->fetch_record($config["per_page"], $page);

//check if ajax is called
        if ($this->input->post('ajax', FALSE)) {

            echo json_encode(array(
                'results' => $data["results"],
                'pagination' => $this->pagination->create_links()
            ));
        }
        $data['view_data'] = '';

        //load the view
        $this->load->view('template', $data);
    }

}