<?php $req1 = mysql_query('select * from users'); 
 ?>

<?php
if($msg)
{
 echo $msg; 
}
?>
<div class="content">
    <img src="<?php// echo $includes_dir; ?>images/download_icon.png"/>
	
    
    <h1>New Personnal Message</h1>
         <?php echo validation_errors(); ?>
    <?php echo form_open('welcome/newmsgs'); ?>
		Please fill the following form to send a personnal message.<br />
        <label for="title">Title</label><input type="text" value="" id="title" name="title" /><br />
        <label for="recip">Recipient<span class="small">(Username)</span></label>
        <select name="recip" multiple="multiple">
            <?php while($dn = mysql_fetch_array($req1))
            { 
                if($dn['username']==$obj->userdata['username']){
                
            }  else{
?>

      <option><?php echo $dn['username']; ?></option>



   
<?php } } ?></select> 
        <label for="message">Message</label><textarea cols="40" rows="5" id="message" name="message"></textarea><br />
        <input class="btn"type="submit" value="Send" /><a class="btn" href="http://localhost/ci/index.php/welcome/load_list">Go to my personnal messages</a></div>
    </form>
</div>
 
 