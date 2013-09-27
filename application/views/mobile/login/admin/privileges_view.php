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
			<h2>Update Privileges</h2>
				<a href="<?php echo base_url();?>index.php/auth_admin/insert_privilege">Add New Privilege</a>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url());	?>  	
					<table class="table table-bordered table-condensed table-striped">
						<thead>
							<tr>
								<th class="spacer_200 tooltip_trigger" 
									title="The name of the privilege.">
									Privilege Name
								</th>
								<th class="tooltip_trigger" 
									title="A short description of the purpose of the privilege.">
									Description
								</th>
								<th class="spacer_100 align_ctr tooltip_trigger" 
									title="If checked, the row will be deleted upon the form being updated.">
									Delete
								</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($privileges as $privilege) { ?>
							<tr>
								<td>
									<a href="<?php echo base_url();?>index.php/auth_admin/update_privilege/<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')];?>">
										<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'name')];?>
									</a>
								</td>
								<td><?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'description')];?></td>
								<td class="align_ctr">
								<?php if ($this->flexi_auth->is_privileged('Delete Users')) { ?>
									<input type="checkbox" name="delete_privilege[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')];?>]" value="1"/>
								<?php } else { ?>
									<input type="checkbox" disabled="disabled"/>
									<small>Not Privileged</small>
									<input type="hidden" name="delete_privilege[<?php echo $privilege[$this->flexi_auth->db_column('user_privileges', 'id')];?>]" value="0"/>
								<?php } ?>
								</td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
							<td colspan="2">
								<?php $disable = (! $this->flexi_auth->is_privileged('Update Privileges') && ! $this->flexi_auth->is_privileged('Delete Privileges')) ? 'disabled="disabled"' : NULL;?>
								<input type="submit" name="submit" value="Delete Checked Privileges" class="btn btn-primary"<?php echo $disable; ?>/>
							</td>
						</tfoot>
					</table>
					
				<?php echo form_close();?>
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