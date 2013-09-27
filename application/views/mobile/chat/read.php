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
   $obj->userdata['username'];  
if(isset($obj))
{
//We check if the ID of the discussion is defined
if(isset($_GET['id']))
{
$id = intval($_GET['id']);
//We get the title and the narators of the discussion
$req1 = mysql_query('select title, user1, user2 from pm where id="'.$id.'" and id2="1"');
$dn1 = mysql_fetch_array($req1);
//We check if the discussion exists
if(mysql_num_rows($req1)==1)
{
//We check if the user have the right to read this discussion
if($dn1['user1']==$obj->userdata['userid'] or $dn1['user2']==$obj->userdata['userid'])
{
//The discussion will be placed in read messages
if($dn1['user1']==$obj->userdata['userid'])
{
	mysql_query('update pm set user1read="yes" where id="'.$id.'" and id2="1"');
	$user_partic = 2;
}
else
{
	mysql_query('update pm set user2read="yes" where id="'.$id.'" and id2="1"');
	$user_partic = 1;
}
//We get the list of the messages
$req2 = mysql_query('select pm.timestamp, pm.message, users.id as userid, users.username, users.avatar from pm, users where pm.id="'.$id.'" and users.id=pm.user1 order by pm.id2');
//We check if the form has been sent
if(isset($_POST['message']) and $_POST['message']!='')
{
	$message = $_POST['message'];
	//We remove slashes depending on the configuration
	if(get_magic_quotes_gpc())
	{
		$message = stripslashes($message);
	}
	//We protect the variables
	$message = mysql_real_escape_string(nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8')));
	//We send the message and we change the status of the discussion to unread for the recipient
	if(mysql_query('insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "'.(intval(mysql_num_rows($req2))+1).'", "", "'.$obj->userdata['userid'].'", "", "'.$message.'", "'.time().'", "", "")') and mysql_query('update pm set user'.$user_partic.'read="yes" where id="'.$id.'" and id2="1"'))
	{
?>
<div class="alert alert-success">Your message has successfully been sent.<br />
<a href="readmsg?id=<?php echo $id; ?>">Go to the discussion</a></div>
<?php
	}
	else
	{
?>
<div class="alert alert-error">An error occurred while sending the message.<br />
<a href="readmsg?id=<?php echo $id; ?>">Go to the discussion</a></div>
<?php
	}
}
else
{
//We display the messages
?>
<div class="content">
<h1><?php echo $dn1['title']; ?></h1>
<table class="messages_table">
	<tr>
    	<th class="author">User</th>
        <th>Message</th>
    </tr>
<?php
while($dn2 = mysql_fetch_array($req2))
{
?>
	<tr>
    	<td class="author center"><?php
if($dn2['avatar']!='')
{
	echo '<img src="'.htmlentities($dn2['avatar']).'" alt="Image Perso" style="max-width:100px;max-height:100px;" />';
}
?><br /><a href="profile?id=<?php echo $dn2['userid']; ?>"><?php echo $dn2['username']; ?></a></td>
    	<td class="left"><div class="date">Sent: <?php echo date('m/d/Y H:i:s' ,$dn2['timestamp']); ?></div>
    	<?php echo $dn2['message']; ?></td>
    </tr>
<?php
}
//We display the reply form
?>
</table><br />
<h2>Reply</h2>
<div class="center">
    <form action="readmsg?id=<?php echo $id; ?>" method="post">
    	<label for="message" class="center">Message</label><br />
        <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
        <input class="btn btn-mini" type="submit" value="Send" /><a  id="left" class="btn btn-mini" href="http://localhost/ci/index.php/welcome/load_list">Back</a></div>
    </form>
</div>
</div>
<?php
}
}
else
{
	echo '<div class="alert alert-error">You dont have the rights to access this page.</div>';
}
}
else
{
	echo '<div class="alert alert-error">This discussion does not exists.</div>';
}
}
else
{
	echo '<div class="alert alert-error">The discussion ID is not defined.</div>';
}
}
else
{
	echo '<div class="alert alert-error">You must be logged to access this page.</div>';
}
?>
		 