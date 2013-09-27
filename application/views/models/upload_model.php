<?php
class Upload_Model extends CI_Model{
public function insert_file($file_name,$id_number,$file_type,$file_path,$full_path)
	{
		$data = array(
			'file_name'		=> $file_name,
                        'id_number'             => $id_number,
                    	'file_type'		=> $file_type,
                        'file_path'             => $file_path,
                        'full_path'             => $full_path,
		);
		$this->db->insert('cfiles', $data);
		//return $this->db->insert_id();
	}
function getAll(){
    $q=  $this->db->query("select * from cfiles")->result();
    return $q;    
       //var_dump($data);
       
   
}
function delete($id){  

 $this->load->database();  

$this->db->delete('cfiles', array('id' => $id));   

}
function getById(){
    $query = $this->db->get_where('cfiles',array('id_number'=>123));
    return $query->result();
    
}

function getImage(){
    $query = $this->db->get_where('cfiles',array('id_number'=>123));
    
    return $query->result();
    
}


}

?>
