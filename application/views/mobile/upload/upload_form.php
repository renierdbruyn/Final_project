<center>
<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload','class="btn btn-primary"');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload"  />

</form>

<title>Upload Form</title>
<style type="text/css">
		#find, #upload {
			border: 1px solid #ccc; margin: 100px auto; width: 700px; padding: 100px;
		}
		#blank_find {
			font-family: Arial; font-size: 70px; font-weight: bold;
			text-align: center;
		}
/*		.thumb {
			float: left; width: 50px; height: 50px; padding: 50px; margin: 50px; background-color: #ddd;
		}*/
		.thumb:hover {
			outline: 1px solid #999;
		}
		img {
			border: 0;
		}
		#gallery:after {
			content: "."; visibility: hidden; display: block; clear: both; height: 0; font-size: 0;
		}
	</style>

<h2>Uploaded documents</h2>



<?php foreach ($rows as $r){

//    echo "</tr>";   ?>
   </center>

<table class="thumb" width="50%" style=" alignment-adjust: central;"><tr><td style=" text-align: left;">
    <a href="<?php echo base_url(); ?>uploads/<?php echo $r->file_name ; ?>"/>
    <img src="<?php echo base_url(); ?>uploads/<?php echo $r->file_name; ?>"class="img-rounded" height="50px" width="50px"/>
    <?php echo $r->file_name; ?>
    
     
				</a>
        </td>
        <td style=" text-align: right;"><?php echo anchor('upload/delete/'.$r->id, 'Delete','class="btn btn-primary btn-small "'); ?></td>
        </tr>
    </table>
        



<!--   <img src="<?php echo base_url(); ?>uploads/<?php echo $r->file_name; ?>" class="img-rounded" height="100px" width="450px"/>-->
    <?php
   

    

}


?>

</body>
</html>




