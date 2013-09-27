<html>
<body>
        <img src="<?php echo base_url(); ?>assets/img/ycr.jpg" " height="100px" width="30px"/>

	<h1>Activate account for <?php echo $identity;?></h1>
        <h1>Top Employees Seeking Candidates Like You! </h1>
	<p>Please click this link to <?php echo anchor('auth/activate_account/'. $user_id .'/'. $activation_token, 'Activate Your Account');?>.</p>
</body>
</html>