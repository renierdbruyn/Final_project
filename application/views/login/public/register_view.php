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
    
    
 <script language="javascript" type="text/javascript">
 
function pwdStrength(password)
{
        var desc = new Array();
        desc[0] = "Very Weak";
        desc[1] = "Weak";
        desc[2] = "Better";
        desc[3] = "Medium";
        desc[4] = "Strong";
        desc[5] = "Strongest";
        var score   = 0;
        //if password bigger than 6 give 1 point
        if (password.length > 6) score++;
        //if password has both lower and uppercase characters give 1 point      
        if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;
        //if password has at least one number give 1 point
        if (password.match(/\d+/)) score++;
        //if password has at least one special caracther give 1 point
        if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) score++;
        //if password bigger than 12 give another 1 point
        if (password.length > 12) score++;
         document.getElementById("pwdDescription").innerHTML = desc[score];
         document.getElementById("pwdStrength").className = "strength" + score;
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


<!doctype html>
 
				<h3>Register</h3>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url()); ?>  	
                                                        
                                                        
                                                        
						<label>Personal Details</label>
					
                                                        <div id="error"></div>
                                                        <?php echo form_error('register_id_number'); ?>
                                                       <input type="text" id="register_id_number"  onblur="validate()" onkeypress="javascript:return isNumber (event)" name ="register_id_number" placeholder="Enter identity number" maxlength="13" value="<?php echo set_value('register_id_number');?>"/>
                                                        <div id="result"> </div>
							
							
                                                        <div id="error"></div>
                                                        <?php echo form_error('register_first_name'); ?>
							<input type="text" id="register_first_name"  onblur="onlyalphabate(document.getElementById('txtletters'), 'Please Enter letters only.')"  name ="register_first_name" placeholder="Enter Firstname" value="<?php echo set_value('register_first_name');?>"/>
                                                        <div id="result"> </div>
                                                        
							
                                                            <?php echo form_error('register_last_name'); ?>
                                                       <?php echo form_input('register_last_name', set_value('register_last_name'), "placeholder='Enter Lastname'"); ?>
							
						
			
                               
                                   
					<label>Contact Details</label>
		
                                        
                                                      <div id="error"></div>	
                                                      <?php echo form_error('register_phone_number'); ?>
                                                      <input type="text" id="register_phone_number"  onblur="Validate()" onkeypress="javascript:return isNumber (event)" name ="register_phone_number" placeholder="Enter Phone Number" maxlength="10" value="<?php echo set_value('register_phone_number');?>"/>					
                                                      <div id="result"> </div>                                                         
                                                     
							
                                                       <?php echo form_error('register_email_address'); ?>
                                                       <?php echo form_input('register_email_address', set_value('register_email_address'), "placeholder='Enter Email Address'"); ?>
								
						
					
                                  
                                    
					<label>Login Details</label>
					
							
                                        	
                                                            <?php echo form_error('register_username'); ?>
                                                       <?php echo form_input('register_username', set_value('register_username'), "placeholder='Enter username'"); ?>
								
							
														
								
							<br>
							
                                                        <div id="error"></div>
                                                        <div id="pwdDescription" style="color: red">
                                                          <b>Password</b>
                                                       </div> 
                                                       <div id="result"> </div>
                                                        <?php echo form_error('register_password'); ?>
                                                       <input type="password" id="register_password" onkeyup="pwdStrength(this.value)"  name ="register_password" placeholder="Enter a valid password" value="<?php echo set_value('register_password');?>"/>
                                                       <div id="result"> </div>
                                                        
                                                   
                                                       
                                                       <div id="result"> </div>
                                                        <?php echo form_error('register_confirm_password'); ?>
                                                       <input type="password" id="register_confirm_password" name ="register_confirm_password" placeholder="Confirm password" value="<?php echo set_value('register_confirm_password');?>"/>
                                                       <div id="result"> </div>
                                                 
							<br>
						
					                        <small>
									
									Password entered must be more than <?php echo $this->flexi_auth->min_password_length(); ?> characters!.
                                                                        <br/>
                                                                        Alpha-numeric, dashes, underscores, periods and comma characters are accepted!
                                                                        
								</small>
					
                                                        <br>
								<input type="submit" name="register_user" id="submit" value="Register Now" class="btn btn-primary"/>
					
				<?php echo form_close();?>
 
			
</body>
</html>







