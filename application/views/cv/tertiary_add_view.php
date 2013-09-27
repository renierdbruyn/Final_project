<?php
	print_r($qualification);
	if(isset($qualification))
	{
		$this->load->view('qualification_display_view');
	}
	else
	{
		$this->load->view('qualification_add_view');
	}
	
?>
<script>

 $("#identifier").modal();    


</script>

<div class="container">
<div  class="modal hide" id="example" aria-hidden="true">
            <div class="modal-header">
              <a class="close" data-dismiss="modal">×</a>
              <h3>Enter Subject Information</h3>
            </div>
            <div class="modal-body">
              <?php
				
				$attributes = array('class' => 'horizontal-form');
				echo form_open('profile/save_tertiary_subject', $attributes);
				
				echo form_label('ID Number: ');
				echo form_input('id_number', '');
				$subject_names=array();
				
				echo form_label('Tertiary Subject');
				echo form_input('subject', '');
				
				echo form_label('Subject Marks');
				echo form_input('marks', '');
				
				echo form_label();
				echo form_submit('save','Save', 'class="btn btn-success btn-large"');
				
				echo form_close();
			?>        
            </div>
            <div class="modal-footer">
              <a href="#" class="btn" data-dismiss="modal">Close</a>
            </div>
          </div>
<fieldset>
<legend>Add Your Tertiary Subjects</legend>
<div class="container">
<div class="row-fluid">
<div class="span8">
<h4>Your Subjects List</h4>

<table class="table table-bordered table-condensed table-striped">
<tr class="info">
	<th>Subject Name</th>
	<th>Subject Marks</th>
	<th>Actions</th>
</tr>
<?php foreach($tertiary_subjects as $user_subject): ?>
<tr>
	<td><?php echo $user_subject['subject']; ?></td>
	<td><?php echo $user_subject['marks']; ?></td>
	<td><?php echo anchor('profile/modify_tertiary_subject/'.$user_subject['id'], 'Edit')." &nbsp;|&nbsp; ". anchor('profile/remove_tertiary_subject/'.$user_subject['id'], 'Delete'); ?></td>
</tr>
<?php endforeach ?>
</table>

</div>
</div>
</div>
<a data-toggle="modal" href="#example" class="btn btn-primary btn-large" > Add A Subject</a>
</fieldset>
</div>
<div></div>