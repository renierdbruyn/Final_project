<!doctype html>
<div class="container">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span2">
                        <!--Sidebar content-->
                        <?php $this->load->view('profile/applicant_sidebar'); ?>
                    </div>
                
                    <div class="span8">
                        <!--Body content-->

						
					<div class="container">
    <div class="row-fluid">
        <div class="span5">
                    	
				
		<h3>Change Email via Email Verification</h3>
				<a href="<?php echo base_url();?>index.php/auth_public/update_account">Update Account Details</a>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url());	?>  	
						<br>
                                                                <?php echo form_error('email_address'); ?>
                                                                <?php echo form_input('email_address', set_value('email_address'), "placeholder='Enter email address'"); ?>
							<br>
					
<!--                                                        <input type="submit" name="" id="submit" value="Submit" class="btn btn-primary"/>-->
<?php
echo form_label();
echo form_submit('update_email','submit', 'class="btn btn-primary "');

echo form_fieldset_close();

echo form_close();
?>

		<?php echo form_close();?>
			
 </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<br>
<br>
<br>
</body>
</html>