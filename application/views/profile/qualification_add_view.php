        

<?php

$this->load->helper('form');
$attributes = array('class' => 'horizontal-form');
echo form_open('profile/save_tertiary', $attributes);

echo form_fieldset('Add Tertiary Information');

echo form_hidden('id_number', $this->session->userdata('id_number'));

echo form_label('Institution Name');
echo form_input('institution', '');

echo form_label('Qualification Type');
$optSyllabus= array(
	'None'=>'Select Qualification Type',
	'Certificate'=>'Certificate',
	'National Diploma'=>'National Diploma',
	'Degree'=>'Degree'
);
echo form_dropdown("type", $optSyllabus, 'Select Qualification Type');

echo form_label('Qualification Name');
echo form_input('course', '');

echo form_label();
echo form_submit('save','Save', 'class="btn btn-success btn-large"');

echo form_fieldset_close();

echo form_close();
?>

