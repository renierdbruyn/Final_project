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
				<h2>Add New User Role</h2>
				<a href="<?php echo base_url();?>index.php/auth_admin/manage_user_groups">Update User Roles</a>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url());	?>  	
					<fieldset>
						<label>Role Details</label>
						
						
								<label for="group">Role Name:</label>
								<input type="text" id="group" name="insert_group_name" value="<?php echo set_value('insert_group_name');?>" class="tooltip_trigger"
									title="The name of the user role."/>
							
                                                                <br>
								<label for="description">Role Description:</label>
								<textarea id="description" name="insert_group_description" class="width_400 tooltip_trigger"
									title="A short description of the purpose of the user role."><?php echo set_value('insert_group_description');?></textarea>
                                                                <br>
							
								<label for="admin">Is Consultant Role:</label>
								<input type="checkbox" id="admin" name="insert_group_admin" value="1" <?php echo set_checkbox('insert_group_admin',1);?> class="tooltip_trigger"
									title="If checked, the user group is set as an 'Consultant' role."/>
							
                                                                <br>
					</fieldset>

					<fieldset>
						<label>Add New Role</label>
							
								<label for="submit">Add Role:</label>
								<input type="submit" name="insert_user_group" id="submit" value="Submit" class="btn btn-primary"/>
							
					</fieldset>
				<?php echo form_close();?>
			
                               
    <br>
<br>
<br>
<br>
</div>
    </div>
</div>

</div> <!--end container -->
                </div>
            </div>
        </div>
</body>
</html>