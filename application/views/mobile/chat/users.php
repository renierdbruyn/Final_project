
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
                .left{
                    margin-left: 75%;
                }
</style>
    	 
       
This is the list of members:
<table class="table">
    <?php 
    if(isset($obj->userdata['username']))
        {
        echo $obj->userdata['username'];
        echo'<div class="left"><a class="btn btn-mini" href="http://localhost/ci/index.php/home1">Go Home</a></div>';
    }else
        {?>
    <?php
     
    echo'<div class="left"><a class="btn btn-mini" href="http://localhost/ci/index.php">Go Home</a></div>';
      } ?>
    <tr>
    	<th>Id</th>
    	<th>Username</th>
    	<th>Email</th>
    </tr>
<?php
//We get the IDs, usernames and emails of users
$req = mysql_query('select id, username, email from users');
while($dnn = mysql_fetch_array($req))
{
?>
	<tr>
    	<td class="left"><?php echo $dnn['id']; ?></td>
    	<td class="left"><a href="profile?id=<?php echo $dnn['id']; ?>"><?php echo htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td class="left"><?php echo htmlentities($dnn['email'], ENT_QUOTES, 'UTF-8'); ?></td>
    </tr>
    
<?php
}

?>
    
</table>
<div class="pagination">
  <ul>
    <li><a href="#">Prev</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">Next</a></li>
  </ul>
</div>
		</div>
			
 