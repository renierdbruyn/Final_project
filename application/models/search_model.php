<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search_model extends CI_Model {

    public function get_results($search_term = 'default') {


        $this->db->select('*');
        $this->db->from('job_advert');
        $this->db->like('job_title', $search_term);


        $query = $this->db->get();



        return $query->result_array();
    }

}

?>
