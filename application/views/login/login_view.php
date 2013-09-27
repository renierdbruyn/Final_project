<?php  $this->session->set_userdata('last_page', current_url()); ?>
<h3>Register New Users</h3>
    <a href="<?php echo base_url(); ?>index.php/auth/register_account">Create new account</a><img alt="" src="<?php echo base_url(); ?>assets/img/clients24x24.png" title=""/>

    

<center>
<h3>Login</h3>

<?php if (!empty($message)) { ?>
    <div id="message">
        <?php echo $message; ?>
    </div>
<?php } ?>

<?php echo form_open("auth/login", 'class="parallel"'); ?>  	



<label for="identity">Email or Username:</label>
<input type="text" id="identity" name="login_identity" value="<?php echo set_value('login_identity'); ?>" />

<label for="password">Password:</label>
<input type="password" id="password" name="login_password" value="<?php echo set_value('login_password'); ?>"/>


<?php
if (isset($captcha)) {
    echo "\n";
    echo $captcha;
    echo "\n";
    
    	/* math_captcha Example
							# To activate math_captcha, ensure the 'if' statement immediately below is uncommented and then comment out the reCAPTCHA 'if' statement just above.
							# You will also need to enable the math_captcha examples in 'controllers/auth.php', and 'models/demo_auth_model.php'.
							if (isset($captcha))
							{
								echo "<li>\n";
								echo "<label for=\"captcha\">Captcha Question:</label>\n";
								echo $captcha.' = <input type="text" id="captcha" name="login_captcha" class="width_50"/>'."\n";
								echo "</li>\n";
							}
							#*/
}
?>

<label for="remember_me">Remember Me:<input type="checkbox" id="remember_me" name="remember_me" value="1" <?php echo set_checkbox('remember_me', 1); ?>/></label>


<br>
<br>
<input type="submit" name="login_user" id="submit" value="Submit" class="btn btn-primary"/>
<br>

<small>Note:3 failed login attempts will raise security on the account,<br> activating a 10 second time limit ban per login attempt (20 secs after 9+ attempts), and activation<br> of a captcha that must be completed to login.</small>
<br>
<a href="<?php echo base_url(); ?>index.php/auth/forgotten_password">Reset Forgotten Password</a>
<br>
<a href="<?php echo base_url(); ?>index.php/auth/resend_activation_token">Resend Account Activation Token</a>

<?php echo form_close(); ?>
</center>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
</html>