<?php

class Profile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //Save personal data
    public function save_personal_data($data) {
        $this->db->insert('personal', $data);
    }

    //Save job history
    public function save_job_history($data) {
        $this->db->insert('job_history', $data);
    }
    
    //Save transferable skills
    public function save_tranferable_skills($data) {
        $this->db->insert('transferable_skills', $data);
    }
    
    //Save data skills
    public function save_data_skills($data) {
        $this->db->insert('data_skills', $data);
    }
    
    //Save people skills
    public function save_people_skills($data) {
        $this->db->insert('people_skills', $data);
    }
    
    //Save words skills
    public function save_word_skills($data) {
        $this->db->insert('word_skills', $data);
    }
    
    //Save leadership skills
    public function save_leadership_skills($data) {
        $this->db->insert('leadership_skills', $data);
    }
    
    //Save artistic skills
    public function save_artistic_skills($data) {
        $this->db->insert('artistic_skills', $data);
    }
    
    //Save other skills
    public function save_other_skills($data) {
        $this->db->insert('other_skills', $data);
    }

    //Get personal data for a logged in user
    public function get_personal_data($id_number) {
        $query = $this->db->query("select * from personal where id_number=$id_number");
        return $query->result_array();
    }
    
    //Get people skills for a logged in user
    public function get_people_skills($id_number) {
        $query = $this->db->query("select * from people_skills where id_number=$id_number");
        if($query->num_rows>0)
        {
            return $query->result_array();
        }
        else 
        {
            return false;
        }
    }
    
    //Get people skills for a logged in user
    public function get_data_skills($id_number) {
        $query = $this->db->query("select * from data_skills where id_number=$id_number");
        if($query->num_rows>0)
        {
            return $query->result_array();
        }
        else 
        {
            return false;
        }
    }
    
    //Get people skills for a logged in user
    public function get_word_skills($id_number) {
        $query = $this->db->query("select * from word_skills where id_number=$id_number");
        if($query->num_rows>0)
        {
            return $query->result_array();
        }
        else 
        {
            return false;
        }
    }
    
    //Get people skills for a logged in user
    public function get_leadership_skills($id_number) {
        $query = $this->db->query("select * from leadership_skills where id_number=$id_number");
        if($query->num_rows>0)
        {
            return $query->result_array();
        }
        else 
        {
            return false;
        }
    }
    
    //Get people skills for a logged in user
    public function get_artistic_skills($id_number) {
        $query = $this->db->query("select * from artistic_skills where id_number=$id_number");
        
        if($query->num_rows>0)
        {
            return $query->result_array();
        }
        else 
            return false;
    }
    
    //Get people skills for a logged in user
    public function get_other_skills($id_number) {
        $query = $this->db->query("select * from other_skills where id_number=$id_number");
        if($query->num_rows>0)
        {
            return $query->result_array();
        }
        else 
        {
            return false;
        }
    }
    
    //Get people skills for a logged in user
    public function get_transferable_skills($id_number) {
        $query = $this->db->query("select * from transferable_skills where id_number=$id_number");
        if($query->num_rows>0)
        {
            return $query->result_array();
        }
        else 
        {
            return false;
        }
    }
    
    //Get job data for a logged in user
    public function get_job_data($id_number) {
        $query = $this->db->query("select * from job_history where id_number=$id_number");
        return $query->result_array();
    }

    //Get school subjects data for a logged in user
    public function get_school_subjects_data($id_number) {
        $query = $this->db->query("select * from subjects where id_number=$id_number");
        return $query->result_array();
    }

    //Get tertiary subjects data 
    public function get_tertiary_subjects_data($id_number) {
        $query = $this->db->query("select * from tertiary_subjects where id_number=$id_number");
        return $query->result_array();
    }

    //Get a single school subject to update
    public function get_school_subject($id) {
        $query=  $this->db->query("select * from subjects where id=$id");
        return $query->result_array();
    }

    //Get a single tertiary subject to update
    public function get_tertiary_subject($id = null) {
        $this->db->select()->from('tertiary_subjects');

        // where condition if id is present
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->order_by('id');
        }

        $query = $this->db->get();

        if ($id != null) {
            return $query->row_array(); // single row
        } else {
            return $query->result_array(); // array of result
        }
    }

    //Get a single tertiary qualification to display
    public function get_tertiary_qualification($id_number) {
        $query = $this->db->query("select * from tertiary where id_number=$id_number");
        return $query->result_array(); // single row
    }

    //Get a user school data to display
    public function get_school_data($id_number) 
    {
        $this->db->where('id_number', $id_number);
        $query = $this->db->get('school');
        return $query->result_array(); // single row
    }


    //Save school data
    public function save_school_data($data) {
        $this->db->insert('school', $data);
    }

    //Save tertiary data
    public function save_tertiary_data($data) {
        $this->db->insert('tertiary', $data);
    }

    //Save subjects data
    public function save_school_subject($data) {
        $this->db->insert('subjects', $data);
    }

    //Save tertiary subjects
    public function save_tertiary_subject($data) {
        $this->db->insert('tertiary_subjects', $data);
    }

    //Update school subject
    public function update_subject_data($data) 
    {
        $this->db->where('id', $data['id']);
        $this->db->update('subjects', $data); // update the record
    }

    //Update school information
    public function update_school($data) 
    {
        $this->db->where('id_number', $data['id_number']);
        $this->db->update('school', $data); // update the record
    }

    //Update tertiary information
    public function update_tertiary($data) 
    {
        $this->db->where('id_number', $data['id_number']);
        $this->db->update('tertiary', $data); // update the record
    }

    //Update tertiary subject
    public function update_tertiary_subject($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('tertiary_subjects', $data); // update the record
    }
    
    //Update personal data
    public function update_personal_data($data) {
        $this->db->where('id_number', $data['id_number']);
        $this->db->update('personal', $data); // update the record
    }
    
    function get_all_adverts()
    {
        $query=  $this->db->query("select * from job_advert");
        return $query->result_array();
    }
    
    //Update job data
    public function update_job_data($data) {
        $this->db->where('id_number', $data['id_number']);
        $this->db->update('job_history', $data); // update the record
    }

    //Delete subject for a user
    public function remove_school_subject($id) {
        $this->db->where('id', $id);
        $this->db->delete('subjects');
    }

    //Delete tertiary subject for a user
    public function remove_tertiary_subject($id) {
        $this->db->where('id', $id);
        $this->db->delete('tertiary_subjects');
    }

    //Add subject to the Independent Examination Board table
    public function add_ieb_subjects($data) {
        $this->db->insert('ieb_subjects', $data);
    }

    //Add subject to the National Senior Certificate table
    public function add_nsc_subjects($data) {
        $this->db->insert('nsc_subjects', $data);
    }

    //Add subject to the Senior Certificate table
    public function add_sc_subjects($data) {
        $this->db->insert('sc_subjects', $data);
    }

    //Get nsc subjects 
    public function get_nsc_subjects() {
        $query = $this->db->select('subject')->get('nsc_subjects');
        return $query->result_array();
    }

    //Get nsc subjects 
    public function get_industry_types() {
        $query = $this->db->query('select industry_type from industry');
        return $query->result_array();
    }

    //Get sc subjects 
    public function get_sc_subjects() {
        $query = $this->db->get('sc_subjects');
        return $query->result_array();
    }

    //Get ieb subjects 
    public function get_ieb_subjects() {
        $query = $this->db->get('ieb_subjects');
        return $query->result_array();
    }

    //Get syllabus for a user 
    public function get_syllabus($id_number) {
        $query = $this->db->query("select syllabus from school where id_number=$id_number");
        if($query->num_rows==1)
        {
            return $query->row_array();
        }
        else
            return false;
        
    }

}