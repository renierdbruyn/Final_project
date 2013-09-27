<?php
echo anchor('site/index', 'Home'); echo br();
echo anchor('site/add', 'add Applicant'); echo br();
echo anchor('site/edit', 'edit Applicant'); echo br();
echo anchor('site/delete', 'delete Applicant'); echo br();
?>

<h2>CREATE</h2>

<?php echo form_open('site/add'); ?>
<p> 
    <label for="id">ID:</label>
<input type="text" name="id" id="id"/>
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
<input type="submit" value="SUBMIT"/>
</p>

<?php echo form_close(); ?>

