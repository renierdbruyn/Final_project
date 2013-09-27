<?php
Class Newmsg_db extends CI_Model
{
   function __construct()
 {
   parent::__construct();
 }
   
 function  msg_db()
 {
 
   
   $this->db->set('title', $this->input->post('title', TRUE));
    $this->db->set('recip', $this->input->post('recip', TRUE));
//$this->db->set('password', 'PASSWORD("'.$this->input->post('password', TRUE).'")', FALSE);
$this->db->set('message', $this->input->post('message', TRUE));
 
$this->db->set('timestamp',time(), TRUE);
// $this->db->set('signup_date', $this->input->post(time(), TRUE));
   $query= $this->db->insert('pm');
  

//   $query = $this ->db-> get();
 
       if($query)
        {
           
      
            return true;
        }
  
   else
   {
     return false;
   }
 }
}
?>
<?php
 
		//We check if the recipient exists
		$dn1 = mysql_fetch_array(mysql_query('select count(id) as recip, id as recipid, (select count(*) from pm) as npm from users where username="'.$recip.'"'));
		if($dn1['recip']==1)
		{
			//We check if the recipient is not the actual user
			if($dn1['recipid']!=$_SESSION['userid'])
			{
				$id = $dn1['npm']+1;
				//We send the message
				if(mysql_query('insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "1", "'.$title.'", "'.$_SESSION['userid'].'", "'.$dn1['recipid'].'", "'.$message.'", "'.time().'", "yes", "no")'))
				{
 
					$form = false;
				}
				else
				{
					//Otherwise, we say that an error occured
					$error = 'An error occurred while sending the message';
				}
			}
			else
			{
				//Otherwise, we say the user cannot send a message to himself
				$error = 'You cannot send a message to yourself.';
			}
		}
		else
		{
			//Otherwise, we say the recipient does not exists
			$error = 'The recipient does not exists.';
		}
	 
//	else
//	{
//		//Otherwise, we say a field is empty
//		$error = 'A field is empty. Please fill of the fields.';
//	}
 
 
 ?>