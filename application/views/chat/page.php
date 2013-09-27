
        <div class="contents">
            <style>
                .contents{
          
width: 84%;
-moz-border-radius: 20px;
-webkit-border-radius: 20px;
border-radius: 20px;
margin: auto;
padding: 20px;
margin-top: 20px;
margin-left: 20px;
                }
                .footer 
{
position: relative;
 
height: 10px;
clear:both;
padding-top:20px;
color:#fff;
} 
                .foot 
{
position: relative;
 
height: 10px;
clear:both;
padding-top:20px;
 margin-right: 50%;
} 
</style>

  <h1>Home</h1>
<!--   <h2>Welcome <?php echo $obj->userdata['username']; ?>!</h2>-->
  
You can <a href="http://localhost/ci/index.php/welcome/users">see the list of users</a>.<br /><br />
<?php
//If the user is logged, we display links to edit his infos, to see his pms and to log out
if(isset($obj->userdata['username']))
{
//We count the number of new messages the user has
$nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="'.$obj->userdata['username'].'" and user1read="no") or (user2="'.$obj->userdata['userid'].'" and user2read="no")) and id2="1"'));
//The number of new messages is in the variable $nb_new_pm
$nb_new_pm = $nb_new_pm['nb_new_pm'];
//We display the links
?>

<a href="welcome/edit">Edit my personal informations</a><br />
<a href="welcome/load_list">My personal messages(<?php echo $nb_new_pm; ?> unread)</a><br />
 <a href="home1/logout">Logout</a>
    </div>

 </body>
 <div class="modal-footer"><footer class="footer" style="background-color:#c2c2c2"><a href="home1">MINDZPARK</a></footer></div> 	
</html>
<?php
}
else
{
//Otherwise, we display a link to log in and to Sign up
?>
<a href="http://localhost/ci/index.php/welcome/signups">Sign up</a><br />
     <?php echo validation_errors(); ?>
   <?php echo form_open('welcome/verify'); ?>
    <div class="control-group">
        <?php echo $msg;?>
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
    <input type="text" d="username" name="username" placeholder="Email">
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
    <input type="password"  id="passowrd" name="password" placeholder="Password">
    </div>
    </div>
    <div class="control-group">
    <div class="controls">
    
    <button type="submit" value="login" class="btn">Sign in</button>
    </div>
    </div>
    </form>
         </div>
      
         	<div class="modal-footer"><footer class="footer" style="background-color:#c2c2c2"><a href="home1" class="foot">MINDZPARK</a></footer></div>	
	</body>
        
</html>
<?php
}
?>
		 
   