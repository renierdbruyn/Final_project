
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

				<h2>Update User Role</h2>
				<a href="<?php echo base_url();?>index.php/auth_admin/manage_user_groups">Update User Roles</a>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url());	?>  	
					
						<label>Role Details</label>
						<ul>
							<li class="info_req">
								<label for="group">Role Name:</label>
								<input type="text" id="group" name="update_group_name" value="<?php echo set_value('update_group_name', $group[$this->flexi_auth->db_column('user_group', 'name')]);?>" class="tooltip_trigger"
									title="The name of the user role."/>
							<br>
							
								<label for="description">Role Description:</label>
								<textarea id="description" name="update_group_description" class="width_400 tooltip_trigger"
									title="A short description of the purpose of the user role."><?php echo set_value('update_group_description', $group[$this->flexi_auth->db_column('user_group', 'description')]);?></textarea>
							<br>
							
								<?php $ugrp_admin = ($group[$this->flexi_auth->db_column('user_group', 'admin')] == 1) ;?>
								<label for="admin">Is Consultant Role:</label>
								<input type="checkbox" id="admin" name="update_group_admin" value="1" <?php echo set_checkbox('update_group_admin', 1, $ugrp_admin);?> class="tooltip_trigger"
									title="If checked, the user role is set as an 'Admin' group."/>
							<br>
							
								<label for="admin">User Role Privileges:</label>
								<a href="<?php echo base_url();?>index.php/auth_admin/update_group_privileges/<?php echo $group['ugrp_id']; ?>">Update Privileges for this User Role</a>
							<br>
						</ul>
					
									
					
						
						<ul>
							
								<label for="submit">Update Role:</label>
								<input type="submit" name="update_user_group" id="submit" value="Submit" class="btn btn-primary"/>
							<br>
						</ul>
				
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