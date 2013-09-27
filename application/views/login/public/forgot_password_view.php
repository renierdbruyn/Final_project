<!doctype html>


				<h3>Forgotten Password</h3>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url());	?>  	
					
						
								<label for="identity">Email or Username:</label>
								<input type="text" id="identity" name="forgot_password_identity" value="" class="tooltip_trigger"
									title="Please enter either your email address or username defined during registration."
								/>
							<br>
								<label for="submit">Send Email:</label>
								<input type="submit" name="send_forgotten_password" id="submit" value="Submit" class="btn btn-primary"/>
							
					
				<?php echo form_close();?>
<br>
<br>
<br>
<br>
 <br>
<br>
<br>
<br>
 <br>
<br>
<br>
<br>
<br>
<br>


</body>
</html>