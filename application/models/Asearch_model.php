<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Asearch_model extends CI_Model {

    public function get_results($search_term = 'default', $search_term2 = 'default', $search_term3 = 'default', $search_term4 = 'default') {
        $empty = FALSE;

        $this->db->select('*');
        $this->db->from('job_advert');
        $this->db->like('job_title', $search_term);
        $this->db->where('company_location', $search_term2);
        $this->db->where('gender', $search_term3);
        $this->db->where('employment_equity', $search_term4);

        $query = $this->db->get();



        return $query->result_array();
    }

}

?>
