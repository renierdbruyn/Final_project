<div class="container">
<div class="row-fluid">
<div class="span8">

<h4>Qualification Information</h4>

<table class="table table-bordered table-condensed table-striped">

<?php foreach($qualification as $data): ?>

<tr>
	<td><label>ID Number</label></td>
	<td><?php echo $data['id_number']; ?></td>
</tr>
<tr>
	<td><label>Institution Name</label></td>
	<td><?php echo $data['institution']; ?></td>
</tr>
<tr>
	<td><label>Qualification Type</label></td>
	<td><?php echo $data['type']; ?></td>
</tr>
<tr>
	<td><label>Course Name</label></td>
	<td><?php echo $data['course']; ?></td>
</tr>

<?php endforeach ?>

</table>
<!--<a href="" class="btn btn-primary">Add Another Qualification</a>-->
</div>
</div>
</div>