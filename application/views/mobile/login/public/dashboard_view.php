<!doctype html>
<div class="navbar navbar-inner navbar-form">              
        <div class="navbar navbar-fixed">
        <ul class="nav">
						
							<li class=""><a href="<?php echo base_url();?>index.php/auth_public/">Applicant</a>
						
						
						
							<li class=""><a href="<?php echo base_url();?>index.php/auth_public/update_account">Update Account Details</a>
						
						
							<li class=""><a href="<?php echo base_url();?>index.php/auth_public/update_email">Update Email Address</a>
                                                       
						
							<li class=""><a href="<?php echo base_url();?>index.php/auth_public/change_password">Update Password</a>
						
                                                        <li class=""><a href="<?php echo base_url();?>index.php/upload">Upload Cv/Documents</a>

						
						
					</ul>		       
      </div>
        </div>   
<div class="container">   
<!-- <div class="well span11 ">-->
			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>

<label for="first_name"><h3>Welcome <?php echo set_value('update_first_name',$user['upro_first_name']);?> <?php echo set_value('update_last_name',$user['upro_last_name']);?>!!!</label></h3>
							
								
<?php echo set_value('update_email',$user[$this->flexi_auth->db_column('user_acc', 'email')]);?>
								
							
								<br>
<?php echo set_value('update_username',$user[$this->flexi_auth->db_column('user_acc', 'username')]);?>
								
<form class="pull-right">
      <div class="well sidebar-nav">
     
         <li class="nav-header">Personal</li>
          <li class="active"><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
          <li class="nav-header">School</li>

          <li><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>

          <li class="nav-header">Skills</li>
          <li><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
</form>
      </div><!--/.well -->
   </div>
                                  <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

</body>
</html>