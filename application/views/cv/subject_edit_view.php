<?php
print_r($old_data);
echo $old_data['subject']; 

echo form_open('profile/update_subject');

echo form_fieldset('Edit Subject');

echo form_label('Subject Name: ');
?>
				
<select name="subject">

	<option>Select Subject</option>
	
	<?php foreach($subjects as $subject_list): ?>
		
	<option value="<?php echo $subject_list['subject']; ?>" <?php if($old_data['subject']==$subject_list['subject'])echo "selected" ?>><?php echo $subject_list['subject']; ?></option>
	
	<?php endforeach?>
	
</select>

<?php

echo form_label('Subject marks');
echo form_input('marks', $old_data['marks']);

echo form_hidden('id_number', $old_data['id']);
echo form_hidden('id_number', $old_data['id_number']);

echo form_label();
echo form_submit('save','Save', 'class="btn btn-success btn-large"');

echo form_fieldset_close();

echo form_close();

?>