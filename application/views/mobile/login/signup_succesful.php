<h1>Congratulations</h1>

<?php
$firstname = $this->session->userdata('firstname');
?>
<!--<p>Your account has been created. <?php // echo anchor('login', 'Login Now'); ?> </p>-->

<p> <?php echo"thank you for registering $firstname !  "; echo anchor('login', 'Login'); ?></p>