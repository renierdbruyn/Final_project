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
				<h2>Update user Roles</h2>
				<a href="<?php echo base_url();?>index.php/auth_admin/insert_user_group">Add New User Role</a>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url());	?>  	
					<table class="table table-bordered table-condensed table-striped">
						<thead>
							<tr>
								<th class="spacer_100 tooltip_trigger" 
									title="The user role name.">
									Role Name
								</th>
								<th class="tooltip_trigger" 
									title="A short description of the purpose of the user role.">
									Description
								</th>
								<th class="spacer_100 align_ctr tooltip_trigger" 
									title="Indicates whether the Role is considered an 'Consultant' Role.<br/> Note: Privileges can still be set seperately.">
									Is Consultant Role
								</th>
								<th class="spacer_100 align_ctr tooltip_trigger"
									title="update the access privileges of user roles.">
									User Role Privileges
								</th>
								<th class="spacer_100 align_ctr tooltip_trigger" 
									title="If checked, the row will be deleted upon the form being updated.">
									Delete
								</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($user_groups as $group) { ?>
							<tr>
								<td>
									<a href="<?php echo base_url();?>index.php/auth_admin/update_user_group/<?php echo $group[$this->flexi_auth->db_column('user_group', 'id')];?>">
										<?php echo $group[$this->flexi_auth->db_column('user_group', 'name')];?>
									</a>
								</td>
								<td><?php echo $group[$this->flexi_auth->db_column('user_group', 'description')];?></td>
								<td class="align_ctr"><?php echo ($group[$this->flexi_auth->db_column('user_group', 'admin')] == 1) ? "Yes" : "No";?></td>
								<td class="align_ctr">
									<a href="<?php echo base_url().'index.php/auth_admin/update_group_privileges/'.$group[$this->flexi_auth->db_column('user_group', 'id')];?>">update</a>
								</td>
								<td class="align_ctr">
								<?php if ($this->flexi_auth->is_privileged('Delete User Roles')) { ?>
									<input type="checkbox" name="delete_group[<?php echo $group[$this->flexi_auth->db_column('user_group', 'id')];?>]" value="1"/>
								<?php } else { ?>
									<input type="checkbox" disabled="disabled"/>
									<small>Not Privileged</small>
									<input type="hidden" name="delete_group[<?php echo $group[$this->flexi_auth->db_column('user_group', 'id')];?>]" value="0"/>
								<?php } ?>
								</td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
							<td colspan="5">
								<?php $disable = (! $this->flexi_auth->is_privileged('Update User Roles') && ! $this->flexi_auth->is_privileged('Delete User Roles')) ? 'disabled="disabled"' : NULL;?>
								<input type="submit" name="submit" value="Delete Checked User roles" class="btn btn-primary" <?php echo $disable; ?>/>
							</td>
						</tfoot>
					</table>
					
				<?php echo form_close();?>
			

    <br>
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