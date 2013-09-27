<?php
if (!$view_data == "")
{
    $this->load->view('profile/personal_display_view');
} 
else 
{
    $this->load->view('profile/personal_add_data');
}
?>


