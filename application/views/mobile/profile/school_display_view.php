<div class="container">
<div class="row-fluid">
<div class="span8">

<h4>School Information</h4>

<table class="table table-bordered table-condensed table-striped">
<?php foreach ($school_data as $school):?>
<tr>
	<td><label>ID Number</label></td>
	<td><?php echo $school['id_number']; ?></td>
</tr>
<tr>
	<td><label>School Name</label></td>
	<td><?php echo $school['school_name']; ?></td>
</tr>
<tr>
	<td><label>Syllabus</label></td>
	<td><?php echo $school['syllabus']; ?></td>
</tr>
<tr>
	<td><?php echo anchor('profile/modify_school/' , 'Update', "class='btn btn-primary'"); ?></td>
	<td></td>
</tr>
<?php endforeach; ?>
</table>
</div>
</div>
</div>