<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/bootstrap.css" />
	<script src="<?php echo base_url(); ?>/js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>/js/jquery-1.10.1.min.js"></script>
	
</head>
<body>
<div class="container">
	<p><a href="#myModal" class="btn" data-toggle="modal">Show Modal</a></p>
	<div class="modal" id="myModal" aria-hidden="true">
	
		<div class="modal-header">
			<h4>Add A Subject</h4>
		</div>
		<div class="modal-body">
		<form>
			<label>Subject Name</label>
			<input type="text" name="subject"/>
			<label>Subject Marks</label>
			<input type="text" name="marks"/>
			<br>
			<button class="btn btn-success">Save</button>
		</form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">close</button>
		</div>
	
	</div>
</div>
	
</body>
</html>