<style></style>
<h2>welcome to CruD</h2>
<hr />

<?php
echo anchor('site/index', 'Home'); echo br();
//echo anchor('site/add', 'add Applicant'); echo br();
//echo anchor('site/edit', 'edit Applicant'); echo br();
//echo anchor('site/delete', 'delete Applicant'); echo br();
?>
<h2>CREATE</h2>
<?php echo form_open('site/add'); ?>
<p> 
    <label for="name">Name:</label>
<input type="text" name="name" id="name"/>
</p>
<p> 
    <label for="number">Number:</label>
<input type="text" name="number" id="number"/>
</p>
<p> 
<input type="submit" value="add"/>
</p>

<?php echo form_close(); ?>

<hr />

<h2> READ </h2>
<?php if(isset($records)) : foreach ($records as $row) : ?>

<h3><?php echo anchor("site/delete/$row->id", $row->name);  ?></h3>
<div><?php echo $row->number; ?></div>
<?php endforeach; ?>
<?php else : ?>

<h3>No records found</h3>

<?php endif; ?>

<hr />
<h2>UPDATE</h2>
<?php echo form_open('site/edit'); ?>
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
<input type="submit" value="update"/>
</p>

<?php echo form_close(); ?>

<hr />


<h2>DELETE</h2>

<p>CLick on one of the links above to delete</p>




