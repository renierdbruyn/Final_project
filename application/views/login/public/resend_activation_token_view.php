<!doctype html>
<center>

				<h3>Resend Activation Token</h3>
<br>
			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url());?>  	
				
						
								<label for="identity">Email or Username:</label>
								<input type="text" id="identity" name="activation_token_identity" value="" class="tooltip_trigger"
									title="Please enter either your email address or username defined during registration."
								/>
							<br>
                                                               <br>
								
								<input type="submit" name="send_activation_token" id="submit" value="Submit" class="btn btn-primary"/>
							
						
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
</center>
</body>
</html>