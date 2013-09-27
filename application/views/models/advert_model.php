<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Advert_model extends CI_Model {

    function get_advert($advert_id) {
        $this->db->where('advert_id', $advert_id);
        $query = $this->db->get('job_advert');
        return $query->result_array();
    }

    function get_all_adverts() {
        $query = $this->db->query("select * from job_advert");
        return $query->result_array();
    }

    function apply($data) {
        $this->db->insert('applications', $data);
    }

    function get_applications($id_number) {
        $this->db->where('id_number', $id_number);
        $query = $this->db->get('applications');
        return $query->result_array();
    }

}

?>