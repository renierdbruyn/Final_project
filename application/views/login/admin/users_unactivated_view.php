<!doctype html>


				<h2>User Accounts Not Activated in 31 Days</h2>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url()); ?>
					                <table class="table table-striped">

						<thead>
							<tr>
								<th class="spacer_200">Email</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th class="spacer_125 align_ctr tooltip_trigger"
									title="Indicates the user group the user belongs to.">
									User Group
								</th>
								<th class="spacer_125 align_ctr tooltip_trigger" 
									title="Indicates whether the users account is currently set as 'active'.">
									Status
								</th>
							</tr>
						</thead>
					<?php if (!empty($users)) { ?>
						<tbody>
						<?php foreach ($users as $user) { ?>
							<tr>
								<td>
<!--									<a href="<?php echo base_url();?>index.php/auth_admin/update_user_account/<?php echo $user[$this->flexi_auth->db_column('user_acc', 'id')];?>">-->
										<?php echo $user[$this->flexi_auth->db_column('user_acc', 'email')];?>
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
								<td class="align_ctr">
									<?php echo ($user[$this->flexi_auth->db_column('user_acc', 'active')] == 1) ? 'Active' : 'Inactive';?>
								</td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="5">
									<input type="submit" name="delete_unactivated" value="Delete Listed Users" class="link_button large"/>
								</td>
							</tr>
						</tfoot>
					<?php } else { ?>
						<tbody>
							<tr>
								<td colspan="5" class="highlight_red">
									No users are available.
								</td>
							</tr>
						</tbody>
					<?php } ?>
					</table>
				<?php echo form_close(); ?>
		
<br>

</body>
</html>