<?php
print_r($tertiary_subject_data);
echo $tertiary_subject_data['subject']; 

echo form_open('profile/update_tertiary_subject');

echo form_fieldset('Edit Tertiary Subject');

echo form_label('Subject Name: ');
echo form_input('subject', $tertiary_subject_data['subject']);

echo form_label('Subject marks');
echo form_input('marks', $tertiary_subject_data['marks']);

echo form_hidden('id_number', $tertiary_subject_data['id']);
echo form_hidden('id_number', $tertiary_subject_data['id_number']);

echo form_label();
echo form_submit('save','Save', 'class="btn btn-success btn-large"');

echo form_fieldset_close();

echo form_close();

?>