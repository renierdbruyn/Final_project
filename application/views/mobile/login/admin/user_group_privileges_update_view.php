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
                <div class="hide_toggle">
	                <ul class="bullet">
	                <?php
	                    if (in_array('user', $privilege_sources))
	                    {
	                        echo '<li><span class="highlight_green">User privileges are considered.</span></li>';
	                    }
	                    else
	                    {
	                        echo '<li><span class="highlight_orange">User privileges are NOT considered.</span></li>';
	                    }
	                    
	                    if (in_array('Role', $privilege_sources))
	                    {
	                        echo '<li><span class="highlight_green">Roles privileges are considered.</span></li>';
	                    }
	                    else
	                    {
	                        echo '<li><span class="highlight_orange">User Roles privileges are NOT considered.</span></li>';
	                    }
	                ?>
	                </ul>
				</div>		
			
				<h2>Update User Role Privileges of Role '<?php echo $group['ugrp_name']; ?>'</h2>
				<a href="<?php echo base_url();?>index.php/auth_admin/manage_user_groups">Update User Roles</a> | 
				<a href="<?php echo base_url();?>index.php/auth_admin/update_user_group/<?php echo $group['ugrp_id']; ?>">Update User Role</a>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
			
				<?php echo form_open(current_url());	?>  	
					<table class="table table-bordered table-condensed table-striped">
						<thead>
							<tr>
								<th class="tooltip_trigger"
									title="The name of the privilege."/>
									Privilege Name
								</th>
								<th class="tooltip_trigger"
									title="A short description of the purpose of the privilege."/>
									Description
								</th>
								<th class="spacer_150 align_ctr tooltip_trigger"
									title="If checked, the user will be granted the privilege."/>
									User Has Privilege
								</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($privileges as $privilege) { ?>
							<tr>
								<td>
									<input type="hidden" name="update[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')]; ?>][id]" value="<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')]; ?>"/>
									<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'name')];?>
								</td>
								<td><?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'description')];?></td>
								<td class="align_ctr">
									<?php 
										// Define form input values.
										$current_status = (in_array($privilege[$this->flexi_auth->db_column('user_privileges', 'id')], $group_privileges)) ? 1 : 0; 
										$new_status = (in_array($privilege[$this->flexi_auth->db_column('user_privileges', 'id')], $group_privileges)) ? 'checked="checked"' : NULL;
									?>
									<input type="hidden" name="update[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')];?>][current_status]" value="<?php echo $current_status ?>"/>
									<input type="hidden" name="update[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')];?>][new_status]" value="0"/>
									<input type="checkbox" name="update[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')];?>][new_status]" value="1" <?php echo $new_status ?>/>
								</td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="3">
									<input type="submit" name="update_group_privilege" value="Update Group Privileges" class="btn btn-primary"/>
								</td>
							</tr>
						</tfoot>
					</table>					
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