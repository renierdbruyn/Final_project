<html>
<head>
<title>Upload Form</title>
<style type="text/css">
		#find, #upload {
			border: 1px solid #ccc; margin: 10px auto; width: 570px; padding: 10px;
		}
		#blank_find {
			font-family: Arial; font-size: 18px; font-weight: bold;
			text-align: center;
		}
		.thumb {
			float: left; width: 10px; height: 10px; padding: 10px; margin: 10px; background-color: #ddd;
		}
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
</head>
<body>

<h3>display</h3>
<!--<table border="1">  

   <tr>  

     <th>ID</th>  

     <th>FileName</th>    
     <th>path</th>

     <th>Action</th>

   </tr>  -->


<?php foreach ($rows as $r){
//    echo "<tr>";  
//    echo "<td>".$r->id."</td>";  
//
//    echo "<td>".$r->file_name."</td>";
//    echo "<td>".$r->full_path."</td>";
//    
//
//    echo "<td>".anchor('upload/delete/'.$r->id, 'Delete')."</td>";  
//
//    echo "</tr>";   ?>
   

    <div class="thumb">
    <a href="<?php echo base_url(); ?>uploads/<?php echo $r->file_name ; ?>"/>
    <img src="<?php echo base_url(); ?>uploads/<?php echo $r->file_name; ?>"class="img-rounded" height="100px" width="200px"/>
    <?php echo $r->file_name; ?>
     <?php echo anchor('upload/delete/'.$r->id, 'Delete'); ?>
				</a>
        
    </div>


   
<!--   <img src="<?php echo base_url(); ?>uploads/<?php echo $r->file_name; ?>" class="img-rounded" height="100px" width="450px"/>-->
    <?php
   

    

}


?>

</body>
</html>
