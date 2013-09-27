<div class="" style="margin:0px;">
	<ul  class="nav nav-tabs nav-stacked">
		<li class="nav-header">Member's Navigation</li>
	    <li><a href="<?php echo base_url(); ?>index.php/profile/personal" >Personal Details</a></li>
	    <li><a href="<?php echo base_url(); ?>index.php/profile/school" >School Details</a></li>
	    <li><a href="<?php echo base_url(); ?>index.php/profile/tertiary" >Tertiary Details</a></li>
	    <li><a href="<?php echo base_url(); ?>index.php/profile/job_history" >Employment Details</a></li>
	    <li><a href="<?php echo base_url(); ?>index.php/profile/skills" >Skills Details</a></li>
	    <li><?php echo anchor("advert/applications/".$user['id_number']."" , 'Applications'); ?></li> 
	    <li class="nav-header">Public Navigation</li>
	    <li><a href="<?php echo base_url(); ?>index.php/advert/browse_jobs" >Browse Jobs</a></li>
	    <!--<li><a href="" >Alerts</a></li>
	    <li><a href="" >Contact Consultant</a></li>-->
	</ul>
</div> <!-- /well -->

  
