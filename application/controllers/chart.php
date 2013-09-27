<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('data');
    }  
    
    public function index()
    {
        $this->load->view('chart');
    }
    
    public function data()
    {
        
        $data = $this->data->get_data();
        
        $category = array();
        $category['name'] = 'Category';
        
        $series1 = array();
        $series1['name'] = 'job adverts';
        
        $series2 = array();
        $series2['name'] = 'application forms';
        
        $series3 = array();
        $series3['name'] = 'logged in';
        
        foreach ($data as $row)
        {
            $category['data'][] = $row->job_title;
            $series1['data'][] = $row->required_experience;
            $series2['data'][] = $row->num_of_positions;
            $series3['data'][] = $row->advert_id;
        }
        
        $result = array();
        array_push($result,$category);
        array_push($result,$series1);
        array_push($result,$series2);
        array_push($result,$series3);
        
        print json_encode($result, JSON_NUMERIC_CHECK);
    }
    public function data1()
    {
        
        $data = $this->data->get_data1();
        
        $category = array();
        $category['name'] = 'Category';
        
        $series1 = array();
        $series1['name'] = 'job adverts';
        
        $series2 = array();
        $series2['name'] = 'application forms';
        
        $series3 = array();
        $series3['name'] = 'logged in';
        
        foreach ($data as $row)
        {
            $category['data'][] = $row->start_date;
            $series1['data'][] = $row->required_experience;
            $series2['data'][] = $row->num_of_positions;
            $series3['data'][] = $row->advert_id;
        }
        
        $result = array();
        array_push($result,$category);
        array_push($result,$series1);
        array_push($result,$series2);
        array_push($result,$series3);
        
        print json_encode($result, JSON_NUMERIC_CHECK);
    }
}

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */