<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class site_model extends CI_Model {

    function get_records() {
        $query = $this->db->get('applicant');
        return $query->result();
    }

    function add_record($data) {
        $this->db->insert('applicant', $data);
        return;
    }

    function edit_record($data) {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('applicant', $data);
    }

    function delete_record() {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->get('applicant');
    }

}