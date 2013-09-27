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
	public function short()
        {
            
            $this->db->order_by('upro_id','ASC');
            
            $query=$this->db->get('demo_user_profiles',1000);
           
            
            return $query->result();
        }
        function get() {
        $q = $this->db->query("select * from rank_results where job_id = 3 or job_id = 5 ")->result();
        return $q;
        
        }
	 function word()
         {
                    $q = $this->db->query("select * from rank_results where job_id = 3 or job_id = 5 ")->result();
        return $q;
        }
    }
