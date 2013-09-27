 <body>
  <div class="container">

 		<?php
			//otherwise, we display the values of the database
			$dnn = mysql_fetch_array(mysql_query('select username,password,email,avatar from users where id="'.$obj->userdata['userid'].'"'));
			$username = htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8');
			$password = htmlentities($dnn['password'], ENT_QUOTES, 'UTF-8');
			$email = htmlentities($dnn['email'], ENT_QUOTES, 'UTF-8');
			$avatar = htmlentities($dnn['avatar'], ENT_QUOTES, 'UTF-8');
		 
		//We display the form

                        
if(isset($msg))
{
 echo $msg; 
}
else{ ?>  
<div class="content">
  <?php echo validation_errors(); ?>
    <?php echo form_open('welcome/signups_edit'); ?>
        You can edit your informations:<br />
        <div class="center">
            <label for="username">Username</label><input type="text" name="username" id="username" value="<?php echo $username; ?>" /><br />
            <label for="password">Password<span class="small">(6 characters min.)</span></label><input type="password" name="password" id="password" value="<?php echo $password; ?>" /><br />
            <label for="passverif">Password<span class="small">(verification)</span></label><input type="password" name="repassword" id="passverif" value="<?php echo $password; ?>" /><br />
            <label for="email">Email</label><input type="text" name="email" id="email" value="<?php echo $email; ?>" /><br />
            <label for="avatar">Avatar<span class="small">(optional)</span></label><input type="text" name="avatar" id="avatar" value="<?php echo $avatar; ?>" /><br />
            <input type="submit" class="btn btn-small"  value="Send" /><a class="btn btn-small"  href="http://localhost/ci/index.php/home1">back</a>
        </div>
    </form>
</div>
 <?php
	}
 ?>

 
      </div>
     </body>
	 
 