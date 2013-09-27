  <body>
  <div class="container">
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
if(isset($obj->userdata['username']))
{
$form = true;
$otitle = '';
$orecip = '';
$omessage = '';
if(isset($datas))
	{
    echo $otitle = $datas['title'];
    echo $orecip = $datas['recip'];
echo $omessage = $datas['message'];
		//We protect the variables
		$title = mysql_real_escape_string($datas['title']);
		$recip = mysql_real_escape_string($datas['recip']);
		$message = mysql_real_escape_string(nl2br(htmlentities($datas['message'], ENT_QUOTES, 'UTF-8')));
		//We check if the recipient exists
		$dn1 = mysql_fetch_array(mysql_query('select count(id) as recip, id as recipid, (select count(*) from pm) as npm from users where username="'.$recip.'"'));
		if($dn1['recip']==1)
		{
			//We check if the recipient is not the actual user
			if($dn1['recipid']!=$_SESSION['userid'])
			{
				$id = $dn1['npm']+1;
				//We send the message
				if(mysql_query('insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "1", "'.$title.'", "'.$_SESSION['userid'].'", "'.$dn1['recipid'].'", "'.$message.'", "'.time().'", "yes", "no")'))
				{
?>
<div class="message">The message has successfully been sent.<br />
<a href="list_pm.php">List of my personnal messages</a></div>
<?php
					$form = false;
				}
				else
				{
					//Otherwise, we say that an error occured
					$error = 'An error occurred while sending the message';
				}
			}
			else
			{
				//Otherwise, we say the user cannot send a message to himself
				$error = 'You cannot send a message to yourself.';
			}
		}
		else
		{
			//Otherwise, we say the recipient does not exists
			$error = 'The recipient does not exists.';
		}
	}
	else
	{
		//Otherwise, we say a field is empty
		$error = 'A field is empty. Please fill of the fields.';
	}

 if(isset($_GET['recip']))
{
	//We get the username for the recipient if available
	$orecip = $_GET['recip'];
}
if($form)
{
//We display a message if necessary
if(isset($error))
{
	echo '<div class="message">'.$error.'</div>';
}
//We display the form
?>
<div class="content">
	<h1>New Personnal Message</h1>
         <?php echo validation_errors(); ?>
    <?php echo form_open('welcome/newmsgs'); ?>
		Please fill the following form to send a personnal message.<br />
        <label for="title">Title</label><input type="text" value="<?php echo htmlentities($otitle, ENT_QUOTES, 'UTF-8'); ?>" id="title" name="title" /><br />
        <label for="recip">Recipient<span class="small">(Username)</span></label><input type="text" value="<?php echo htmlentities($orecip, ENT_QUOTES, 'UTF-8'); ?>" id="recip" name="recip" /><br />
        <label for="message">Message</label><textarea cols="40" rows="5" id="message" name="message"><?php echo htmlentities($omessage, ENT_QUOTES, 'UTF-8'); ?></textarea><br />
        <input type="submit" value="Send" />
    </form>
</div>
<?php
}
}
else
{
	echo '<div class="message">You must be logged to access this page.</div>';
}
?>
		<div class="foot"><a href="lhttp://localhost/ci/index.php/welcome/load_list">Go to my personnal messages</a></div>
	</body>
</html>