<div class="container">
<div class="row-fluid">

<h4>School Information</h4>

<table class="table table-bordered  ">

<?php foreach($school_data as $data): ?>

<tr>
	<td><div class="span8">
<label>ID Number</label></td>
	<td><?php echo $data['id_number']; ?></div></td>
</tr>
<tr>
	<td><label>School Name</label></td>
	<td><?php echo $data['school_name']; ?></td>
</tr>
<tr>
	<td><label>Syllabus</label></td>
	<td><?php echo $data['syllabus']; ?></td>
</tr>

<?php endforeach ?>

</table>
</div>
</div>
</div>