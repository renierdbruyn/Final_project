<div class="container">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span2">
                        <!--Sidebar content-->
                        <?php $this->load->view('profile/applicant_sidebar'); ?>
                    </div>
                
                    <div class="span8">
                        <!--Body content-->

						
					<div class="container">
    <div class="row-fluid">
        <div class="span5">
                    	
				
		<h3>Upload</h3>


<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

<input type="file" name="userfile" size="20" />


<h3>display</h3>
<table border="1">  

     <th>ID</th>  

     <th>FileName</th>      

        

   


<?php foreach ($rows as $r){
    echo "<tr>";  
    echo "<td>".$r->id."</td>";  

    echo "<td>".$r->file_name."</td>";  
      

   echo "</tr>";     

}
?>
     </tr>  
<input type="submit" value="upload" />

</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>