<!doctype html>
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
				<h2>Update Account of <?php echo $user['upro_first_name'].' '.$user['upro_last_name']; ?></h2>
				<a href="<?php echo base_url();?>index.php/auth_admin/manage_user_accounts">Update User Accounts</a>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url());?>  	
					<fieldset>
						
								<label for="first_name">First Name:</label>
								<input type="text" id="first_name" name="update_first_name" value="<?php echo set_value('update_first_name',$user['upro_first_name']);?>"/>
							<br>
							
								<label for="last_name">Last Name:</label>
								<input type="text" id="last_name" name="update_last_name" value="<?php echo set_value('update_last_name',$user['upro_last_name']);?>"/>
							<br>
					
					</fieldset>
					
					<fieldset>
						
								<label for="phone_number">Phone Number:</label>
								<input type="text" id="phone_number" name="update_phone_number" value="<?php echo set_value('update_phone_number',$user['upro_phone']);?>"/>
							<br>
							
								
					</fieldset>
					
					<fieldset>
						
							
								<label for="email_address">Email Address:</label>
								<input type="text" id="email_address" name="update_email_address" value="<?php echo set_value('update_email_address',$user[$this->flexi_auth->db_column('user_acc', 'email')]);?>" class="tooltip_trigger"
									title="Set the users email address that they can use to login with."
								/>
							<br>
							
								<label for="username">Username:</label>
								<input type="text" id="username" name="update_username" value="<?php echo set_value('update_username',$user[$this->flexi_auth->db_column('user_acc', 'username')]);?>" class="tooltip_trigger"
									title="Set the users username that they can use to login with."
								/>
							<br>
							
								<label for="group">Role:</label>
								<select id="group" name="update_group" class="tooltip_trigger"
									title="Set the users group, that can define them as an admin, public, moderator etc."
								>
								<?php foreach($groups as $group) { ?>
									<?php $user_group = ($group[$this->flexi_auth->db_column('user_group', 'id')] == $user[$this->flexi_auth->db_column('user_acc', 'group_id')]) ? TRUE : FALSE;?>
									<option value="<?php echo $group[$this->flexi_auth->db_column('user_group', 'id')];?>" <?php echo set_select('update_group', $group[$this->flexi_auth->db_column('user_group', 'id')], $user_group);?>>
										<?php echo $group[$this->flexi_auth->db_column('user_group', 'name')];?>
									</option>
								<?php } ?>
								</select>
							<br>
						
								
								<a href="<?php echo base_url().'index.php/auth_admin/update_user_privileges/'.$user[$this->flexi_auth->db_column('user_acc', 'id')];?>" class="tooltip_trigger"
									title="Update a users access privileges.">Update User Privileges</a>
							<br>
					
					</fieldset>
					
					<fieldset>
                                            <br>
								<input type="submit" name="update_users_account" id="submit" value="Submit" class="btn btn-primary"/>
							<br>
						
					</fieldset>
				<?php echo form_close();?>
			
</div>
    </div>
</div>

</div> <!--end container -->
                </div>
            </div>
        </div>

</body>
</html>