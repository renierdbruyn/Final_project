 
        <div class="contents">
            <style>
                .contents{
            background: url('images/bluec_30p.png');
width: 84%;
-moz-border-radius: 20px;
-webkit-border-radius: 20px;
border-radius: 20px;
margin: auto;
padding: 20px;
margin-top: 20px;
margin-left: 20px;
                }
</style>
<?php
//We check if the users ID is defined
if(isset($_GET['id']))
{
	$id = intval($_GET['id']);
	//We check if the user exists
	$dn = mysql_query('select username, email, avatar, signup_date from users where id="'.$id.'"');
	if(mysql_num_rows($dn)>0)
	{
		$dnn = mysql_fetch_array($dn);
		//We display the user datas
?>
This is the profile of "<?php echo htmlentities($dnn['username']); ?>" :
<div class="well well-large">
    <a  class="btn btn-primary" href="http://localhost/ci/index.php/welcome/users">Go to the users list</a>
<table class ="table"style="width:500px;">
	<tr>
    	<td><?php
if($dnn['avatar']!='')
{
	echo '<img src="'.htmlentities($dnn['avatar'], ENT_QUOTES, 'UTF-8').'" alt="Avatar" style="max-width:100px;max-height:100px;" />';
}
else
{
	echo 'This user dont have an avatar.';
}
?></td>
    	<td class="left"><h1><?php echo htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8'); ?></h1>
    	Email: <?php echo htmlentities($dnn['email'], ENT_QUOTES, 'UTF-8'); ?><br />
        This user joined the website on <?php echo date('Y/m/d',$dnn['signup_date']); ?></td>
    </tr>
</table>
<?php
//We add a link to send a pm to the user
if(isset( $obj->userdata['username']))
{
?>
<br /><a  class="btn btn-primary" href="newmsger" class="big">Send a PM to "<?php echo htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8'); ?>"</a>
<?php
}
	}
	else
	{
		echo 'This user dont exists.';
	}
}
else
{
	echo 'The user ID is not defined.';
}
?>
		</div>
	
