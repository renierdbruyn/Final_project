<!doctype html>

				<h3>Change Forgotten Password</h3>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url());	?>  	
					
						
								<small>
									Password length must be more than <?php echo $this->flexi_auth->min_password_length(); ?> characters in length.<br/>Only alpha-numeric, dashes, underscores, periods and comma characters are allowed.
								</small>
							<br>
								<label for="new_password">New Password:</label>
								<input type="password" id="new_password" name="new_password" value=""/>
							<br>
								<label for="confirm_new_password">Confirm New Password:</label>
								<input type="password" id="confirm_new_password" name="confirm_new_password" value=""/>
							
                                                        <br>
								<label for="submit">Change Password:</label>
								<input type="submit" name="change_forgotten_password" id="submit" value="Submit" class="btn btn-primary"/>
							
					
				<?php echo form_close();?>
 <br>
<br>
<br>
<br>
<br>

 <br>
       


</body>
</html>