<div class="container">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span2">
                        <!--Sidebar content-->
                        <?php $this->load->view('login/admin/consultant_sidebar'); ?>
                    </div>

                    <div class="span10">
                        <!--Body content-->

<div class="container">
    <div class="row-fluid">
        <div class="span6">
				<h2>Consultant</h2>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				

					<h3>User Roles</h3>
					<p>Update the user Roles that users can be assigned to.</p>
					<p>User Roles are intended to be used to categorize the primary access rights of a user, if required, more specific privileges can then be assigned to a user using the 'User Privileges' below.</p>
					<ul>
						<li>
							<a href="<?php echo base_url();?>index.php/auth_admin/manage_user_groups">Update User Roles</a>			
						</li>	
					</ul>
                                        <ul>
					<li>
							<a href="<?php echo base_url();?>index.php/auth_admin/manage_user_accounts">Update User Accounts</a>			
						</li>
                                        </ul>
					<h3>User Privileges</h3>
					<p>Update the specific user privileges that can be assigned to users.</p>
					<p>User privileges are intended to verify whether a user has privileges to perform specific actions within the site. The specific action of each privilege is completely customized.</p>
					<ul>
						<li>
							<a href="<?php echo base_url();?>index.php/auth_admin/manage_privileges">Update User Privileges</a>			
						</li>	
					</ul>
					

					<h3>User Activity</h3>
					<p>View lists of users that are currently active, inactive or who have a high number of failed logins attempts.</p>
					<p>
						<br/>
						Active (activated) account users can login, inactive accounts cannot. It is also possible in suspend an active account to prevent the user from logging in again.
					</p>
                                        <h3>Add Job Advert</h3>
					<p>Allows the consultant to add job adverts that are given to You Choose Recruit from clients who are searching to employ candidates .</p>
                                        <ul>
                                        <li>
                                                     <a href="<?php echo base_url(); ?>index.php/addJobAdvert">Add job advert</a>

						</li>
                                        </ul>
                                        <h3>Ranking candidates</h3>
					<p>Allows the Consultant to rank each candidate according to their qualifications, skills, gender, nationality and so on.</p>

                                        <li class=""><a href="<?php echo base_url(); ?>index.php/ranking">Rank Candidates</a>
                        </li>
<!--					<ul>
						<li>
							<a href="<?php echo base_url();?>index.php/auth_admin/list_user_status/active">List all active users</a>
						</li>	
						<li>
							<a href="<?php echo base_url();?>index.php/auth_admin/list_user_status/inactive">List all inactive users</a>
						</li>	
						<li>
							<a href="<?php echo base_url();?>index.php/auth_admin/delete_unactivated_users">List all unactivated (Never been activated) users over 31 days old</a>
						</li>	
						<li>
							<a href="<?php echo base_url();?>index.php/auth_admin/failed_login_users">List users with a high number of failed login attempts</a>
						</li>	
					</ul>-->
				     </div>
    </div>
</div>

</div> <!--end container -->
                </div>
            </div>
        </div>