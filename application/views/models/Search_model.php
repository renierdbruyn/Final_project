<?php
class Search_model extends CI_Model {

    public function get_results($search_term='default',$search_term2='default',$search_term3='default',$search_term4='default')
    {
      
if ($search_term2 == 'none' & $search_term3 == 'none' & $search_term4 == 'none'){
         $this->db->select('*');
         $this->db->from('job_advert');
         $this->db->like('job_title',$search_term);
         
        
}
      elseif($search_term2!=='none'AND $search_term3=='none'AND $search_term4=='none'){  
         $this->db->select('*');
         $this->db->from('job_advert');
         $this->db->like('job_title',$search_term);
         $this->db->where('company_location',$search_term2);

      
       
      }
      
      elseif($search_term2!=='none'AND $search_term3!=='none'AND $search_term4=='none'){  
         $this->db->select('*');
         $this->db->from('job_advert');
         $this->db->like('job_title',$search_term);
         $this->db->where('company_location',$search_term2);
         $this->db->where('contract_type',$search_term3);
      }
      elseif($search_term2!=='none'AND $search_term3!=='none'AND $search_term4!=='none'){  
         $this->db->select('*');
         $this->db->from('job_advert');
         $this->db->like('job_title',$search_term);
         $this->db->where('company_location',$search_term2);
         $this->db->where('contract_type',$search_term3);
         $this->db->where('employment_equity',$search_term4);
      }
      elseif($search_term2=='none'AND $search_term3!=='none'AND $search_term4!=='none'){  
         $this->db->select('*');
         $this->db->from('job_advert');
         $this->db->like('job_title',$search_term);
         $this->db->where('contract_type',$search_term3);
         $this->db->where('employment_equity',$search_term4);
      }
      elseif($search_term2=='none'AND $search_term3=='none'AND $search_term4!=='none'){  
         $this->db->select('*');
         $this->db->from('job_advert');
         $this->db->like('job_title',$search_term);
         $this->db->where('employment_equity',$search_term4);
      }
      elseif($search_term2=='none'AND $search_term3!=='none'AND $search_term4=='none'){  
         $this->db->select('*');
         $this->db->from('job_advert');
         $this->db->like('job_title',$search_term);
         $this->db->where('contract_type',$search_term3);
      }
      elseif($search_term2!=='none'AND $search_term3=='none'AND $search_term4!=='none'){  
         $this->db->select('*');
         $this->db->from('job_advert');
         $this->db->like('job_title',$search_term);
         $this->db->where('company_location',$search_term2);
         $this->db->where('employment_equity',$search_term4);
      }
        $query = $this->db->get();
         return $query->result_array(); 
    }
    
    public function get_normal_results($search_term = 'default') {


        $this->db->select('*');
        $this->db->from('job_advert');
        $this->db->like('job_title', $search_term);


        $query = $this->db->get();



        return $query->result_array();
    }
}

?>
