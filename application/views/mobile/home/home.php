<?php // establish variables
if($logged_in){
$firstname = $this->session->userdata('firstname');

echo "<h2>Welcome to the Home Page, {$firstname}! </h2>";

}else{
    echo"<h2>Visitor homepage</h2>";
}
