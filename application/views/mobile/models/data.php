<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data()
    {
        $this->db->select('job_title, required_experience, num_of_positions, advert_id');
    $this->db->from('job_advert');
    $query = $this->db->get();
        return $query->result();
    }
    function get_data1()
    {
        $this->db->select('start_date, required_experience, num_of_positions, advert_id');
    $this->db->from('job_advert');
    $query = $this->db->get();
        return $query->result();
    }

}