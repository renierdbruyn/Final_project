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
				<h2>Consultant: <?php echo $page_title;?></h2>
			<?php if (isset($status) && $status == 'failed_login_users') { ?>
			<?php } else { ?>
				<?php if (isset($status) && $status == 'active_users') { ?>
				<?php } else { ?>
				<?php } ?>
			<?php } ?>
			
				<h2><?php echo $page_title;?></h2>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url()); ?>
				<table class="table table-bordered table-condensed table-striped">
                                            <a href="<?php echo base_url();?>index.php/auth_admin/manage_user_groups">update User Roles</a>
						<thead>
							<tr>
								<th class="spacer"></th>
								<th>First Name</th>
								<th>Last Name</th>
								<th class="spacer align_ctr tooltip_trigger"
									title="Indicates the user role the user belongs to.">
									User Role
								</th>
							<?php if (isset($status) && $status == 'failed_login_users') { ?>
								<th class="spacer align_ctr tooltip_trigger"
									title="The number of consecutive failed login attempts made since the user last successfully logged in.">
									Failed Attempts</th>
							<?php } ?>
								<th class="spacer align_ctr tooltip_trigger" 
									title="Indicates whether the users account is currently set as 'active'.">
									Status
								</th>
							</tr>
						</thead>
					<?php if (! empty($users)) { ?>
						<tbody>
						<?php foreach ($users as $user) { ?>
							<tr>
								<td>
									<a href="<?php echo base_url();?>index.php/auth_admin/update_user_account/<?php echo $user[$this->flexi_auth->db_column('user_acc', 'id')];?>">
										
									</a>
								</td>
								<td>
									<?php echo $user['upro_first_name'];?>
								</td>
								<td>
									<?php echo $user['upro_last_name'];?>
								</td>
								<td class="align_ctr">
									<?php echo $user[$this->flexi_auth->db_column('user_group', 'name')];?>
								</td>
							<?php if (isset($status) && $status == 'failed_login_users') { ?>
								<td class="align_ctr">
									<?php echo $user[$this->flexi_auth->db_column('user_acc', 'failed_logins')];?>
								</td>
							<?php } ?>
								<td class="align_ctr">
									<?php echo ($user[$this->flexi_auth->db_column('user_acc', 'active')] == 1) ? 'Active' : 'Inactive';?>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					<?php } else { ?>
						<tbody>
							<tr>
								<td colspan="<?php echo (isset($status) && $status == 'failed_login_users') ? '6' : '5'; ?>" class="highlight_red">
									No users are available.
								</td>
							</tr>
						</tbody>
					<?php } ?>
					</table>
				<?php echo form_close(); ?>
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

</div>
</body>
</html>