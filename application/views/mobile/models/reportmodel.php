<?php
class Reportmodel extends CI_Model {
	
	function __construct()
        {
            parent:: __construct();
	}
        
        public function add()
        {
            $this->timestamp=time();
            $this->title=$this->input->post('job_title');
            
            
            $this->date=date("Y-m-d");
            $this->db->insert('job_advert',$this);
        }
        
        public function get_all()
        {
            $this->db->order_by('start_date','DESC');
            $query=$this->db->get('job_advert',1000);
            return $query->result();
        }
	
	
}
