<?php
echo anchor('site/index', 'Home'); echo br();
echo anchor('site/add', 'add Applicant'); echo br();
echo anchor('site/edit', 'edit Applicant'); echo br();
//echo anchor('site/delete', 'delete Applicant'); echo br();
?>
<h2>UPDATE</h2>
<?php echo form_open('site/edit'); ?>
<!--<p>  <label for="id">ID:</label>-->
    <?php //echo form_input('id',$fid['value']);?>

    <label for="id">ID:</label>
    <input type="text" name="id" id="id" value="<?php echo $this->uri->segment(3);  //set_value( $this->uri->segment(3), $this->uri->segment(3)); ?>"/>
</p>
<p> 
    <label for="name">Name:</label>
<input type="text" name="name" id="name"/>
</p>
<p> 
    <label for="number">Number:</label>
<input type="text" name="number" id="number"/>
</p>
<p> 
<input type="submit" name="submit" value="update"/>
</p>

<?php echo form_close(); ?>