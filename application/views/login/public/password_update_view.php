<!doctype html>
<script>
    function pwdStrength(password)
    {
        var desc = new Array();
        desc[0] = "Very Weak";
        desc[1] = "Weak";
        desc[2] = "Better";
        desc[3] = "Medium";
        desc[4] = "Strong";
        desc[5] = "Strongest";
        var score = 0;
        //if password bigger than 6 give 1 point
        if (password.length > 6)
            score++;
        //if password has both lower and uppercase characters give 1 point      
        if ((password.match(/[a-z]/)) && (password.match(/[A-Z]/)))
            score++;
        //if password has at least one number give 1 point
        if (password.match(/\d+/))
            score++;
        //if password has at least one special caracther give 1 point
        if (password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))
            score++;
        //if password bigger than 12 give another 1 point
        if (password.length > 12)
            score++;
        document.getElementById("pwdDescription").innerHTML = desc[score];
        document.getElementById("pwdStrength").className = "strength" + score;
    }

</script>
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


<h3>Update Password</h3>
<a href="<?php echo base_url(); ?>index.php/auth_public/update_account">Update Account Details</a>

<?php if (!empty($message)) { ?>
    <div id="message">
        <?php echo $message; ?>
    </div>
<?php } ?>

<?php echo form_open(current_url()); ?> 

<div id="result"> </div>
<?php echo form_error('current_password'); ?>
<input type="password" id="current_password" name ="current_password" placeholder="Confirm current password" value="<?php echo set_value('current_password'); ?>"/>
<div id="result"> </div>

<div id="error"></div>
<div id="pwdDescription" style="color: red">
    <b>Password</b>
</div> 
<div id="result"> </div>
<?php echo form_error('new_password'); ?>
<input type="password" id="new_password" onkeyup="pwdStrength(this.value)"  name ="new_password" placeholder="Enter new password" value="<?php echo set_value('new_password'); ?>"/>
<div id="result"> </div>


<div id="result"> </div>
<?php echo form_error('confirm_new_password'); ?>
<input type="password" id="confirm_new_password" name ="confirm_new_password" placeholder="Confirm new password" value="<?php echo set_value('confirm_new_password'); ?>"/>
<div id="result"> </div>

<small>

    Password length must be more than <?php echo $this->flexi_auth->min_password_length(); ?> characters in length.<br/>
    Only alpha-numeric, dashes, underscores, periods and comma characters are allowed.
</small>
<br>
<!--								<input type="submit" name="change_password" id="submit" value="Submit" class="btn btn-primary"/>-->
<br>
<?php
echo form_label();
echo form_submit('change_password', 'submit', 'class="btn btn-primary "');

echo form_fieldset_close();

echo form_close();
?>
          <?php echo form_close(); ?>
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


                </body>
                </html>