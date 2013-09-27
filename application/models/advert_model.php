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
        $ql = $this->db->select('id_number, advert_id')->from('applications')->where('id_number', $data['id_number'])->get();
        if ($ql->num_rows() >0 ) {
            return FALSE;
        } else {
            $this->db->insert('applications', $data);
        }
            
    }

    function get_application($id_number) {
        $this->db->where('id_number', $id_number);
        $query = $this->db->get('applications');
        return $query->result_array();
    }
    
    function get_applicants($advert_id) {
        /* $this->db->select('applicants');
          $this->db->where('advert_id',$advert_id);
          $applicants=$this->db->get('job_advert'); */
        $applicants = $this->db->query("select applicants from job_advert where advert_id=$advert_id");
        return $applicants->row_array();
    }

    function update_applicants($advert_id) {
        /* $this->db->where('advert_id', $advert_id);
          $data['applicants']=$applicants+1;
          $this->db->update('job_advert', $data); */
        $this->db->query("update job_advert set applicants=applicants+1 where advert_id={$advert_id}");
    }

    function get_applications() {
        $query = $this->db->query("select job_advert.job_title, applications.id_number, applications.advert_id, applications.consultant, applications.status from applications inner join job_advert on job_advert.advert_id=applications.advert_id");
        //=$this->db->get('applications');
        return $query->result_array();
    }

    function get_applications_stats() {
        $query = $this->db->query("SELECT job_advert.job_title, applications.id_number, applications.advert_id, applications.consultant, job_advert.start_date, job_advert.company_location, job_advert.applicants
FROM applications
INNER JOIN job_advert ON job_advert.advert_id = applications.advert_id");
        //=$this->db->get('applications');
        return $query->result_array();
    }


}

?>