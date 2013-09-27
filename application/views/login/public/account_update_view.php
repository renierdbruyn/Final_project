<!doctype html>
<script>

function validate() {
    
       // first clear any left over error messages
    $('#error p').remove();

    // store the error div, to save typing
    var error = $('#error');

    var idNumber = $('#register_id_number').val();


    // assume everything is correct and if it later turns out not to be, just set this to false
    var correct = true;

    //Ref: http://www.sadev.co.za/content/what-south-african-id-number-made
    // SA ID Number have to be 13 digits, so check the length
    if (idNumber.length != 13 || !isNumber(idNumber)) {
        error.append('<p>ID number does not appear to be authentic - input not a valid number</p>');
        correct = false;
    }

    // get first 6 digits as a valid date
    var tempDate = new Date(idNumber.substring(0, 2), idNumber.substring(2, 4) - 1, idNumber.substring(4, 6));

    var id_date = tempDate.getDate();
    var id_month = tempDate.getMonth();
    var id_year = tempDate.getFullYear();
    var id_monTotal= id_month+1;

    var fullDate = id_date + "-" + id_monTotal + "-" + id_year;

    if (!((tempDate.getYear() == idNumber.substring(0, 2)) && (id_month == idNumber.substring(2, 4) - 1) && (id_date == idNumber.substring(4, 6)))) {
        error.append('<p>ID number does not appear to be authentic - date part not valid</p>');
        correct = false;
    }

    // get the gender
    var genderCode = idNumber.substring(6, 10);
    var gender = parseInt(genderCode) < 5000 ? "Female" : "Male";

    // get country ID for citzenship
    var citzenship = parseInt(idNumber.substring(10, 11)) == 0 ? "Yes" : "No";

    // apply Luhn formula for check-digits
    var tempTotal = 0;
    var checkSum = 0;
    var multiplier = 1;
    for (var i = 0; i < 13; ++i) {
        tempTotal = parseInt(idNumber.charAt(i)) * multiplier;
        if (tempTotal > 9) {
            tempTotal = parseInt(tempTotal.toString().charAt(0)) + parseInt(tempTotal.toString().charAt(1));
        }
        checkSum = checkSum + tempTotal;
        multiplier = (multiplier % 2 == 0) ? 1 : 2;
    }
    if ((checkSum % 10) != 0) {
        error.append('<p>ID number does not appear to be authentic - check digit is not valid</p>');
        correct = false;
    };


    // if no error found, hide the error message
    if (correct) {
        error.css('display', 'none');

        // clear the result div
        $('#result').empty();
        // and put together a result message
        $('#result').append('<p> ' + idNumber + '</p><p>Birth Date:   ' + fullDate + '</p><p>Gender:  ' + gender + '</p><p>SA Citizen:  ' + citzenship + '</p>  <input type=hidden id="gender" value="'+gender+'" />');
    }
    // otherwise, show the error
    else {
        error.css('display', 'block');
    }

    return false;
}

function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

$('#idCheck').submit(Validate);

</script>
	
<script type="text/javascript">
        // WRITE THE VALIDATION SCRIPT IN THE HEAD TAG.
        function isNumber(evt) {
            var iKeyCode = (evt.which) ? evt.which : evt.keyCode
            if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
                return false;

            return true;
        }    
    </script>












<script type='text/javascript'>

function onlyalphabate(element, AlertMessage){

    var regexp = /^[a-zA-Z]+$/;

    if(element.value.match(regexp))

    {

    alert("Letter Validation: Successful.");

    return true;

    }else{

        alert(AlertMessage);

        element.focus();

        return false;

    }

}

</script>
<script type="text/javascript">
        // WRITE THE VALIDATION SCRIPT IN THE HEAD TAG.
        function isNumber(evt) {
            var iKeyCode = (evt.which) ? evt.which : evt.keyCode
            if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
                return false;

            return true;
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


                            <h3>Update Account Details</h3>
                            <?php if (!empty($message)) { ?>
                                <div id="message">
                                    <?php echo $message; ?>
                                </div>
                            <?php } ?>

                            <?php echo form_open(current_url()); ?>  	

                            <div id="error"></div>
                            <label for="first_name">First Name:</label>
                                                        <?php echo form_error('update_first_name'); ?>
							<input type="text" id="update_first_name"  onblur="onlyalphabate(document.getElementById('txtletters'), 'Please Enter letters only.')"  name ="update_first_name" value="<?php echo set_value('update_first_name', $user['upro_first_name']); ?>"/>
                                                        <div id="result"> </div>                      
                            
          
                            <br>
                            <label for="last_name">Last Name:</label>
                            <input type="text" id="last_name" name="update_last_name" value="<?php echo set_value('update_last_name', $user['upro_last_name']); ?>"/>



<div id="error"></div>	
                                                      <?php echo form_error('update_phone_number'); ?>
                                                       <label for="phone_number">Phone Number:</label>
                                                      <input type="text" id="update_phone_number"  onblur="Validate()" onkeypress="javascript:return isNumber (event)" name ="update_phone_number"  maxlength="10" value="<?php echo set_value('update_phone_number', $user['upro_phone']); ?>"/>


                            
                            <br>


                            <label>Email Address:</label>
                            <input type="text" id="email" name="update_email" value="<?php echo set_value('update_email', $user[$this->flexi_auth->db_column('user_acc', 'email')]); ?>" class="tooltip_trigger"
                                   title="Set an email address that can be used to login with."
                                   />


                            <br>
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="update_username" value="<?php echo set_value('update_username', $user[$this->flexi_auth->db_column('user_acc', 'username')]); ?>" class="tooltip_trigger"
                                   title="Set a username that can be used to login with."
                                   />
                            <br>
                            <label>Password:</label>
                            <a href="<?php echo base_url(); ?>index.php/auth_public/change_password">Click here to change your password</a>

                            <br>
<!--								<input type="submit" name="update_account" id="submit" value="Submit" class="btn btn-primary"/>-->
                            <?php
                            echo form_label();
                            echo form_submit('update_account', 'submit', 'class="btn btn-primary "');

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
</body>
</html>