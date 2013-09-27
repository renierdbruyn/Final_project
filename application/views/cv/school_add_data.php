<?php

print_r($syllabus);
echo $syllabus['syllabus'];

$this->load->helper('form');
$attributes = array('class' => 'horizontal-form');
echo form_open('profile/save_school', $attributes);

echo form_fieldset('Add Personal Information');

echo form_label('ID Number: ');
echo form_input('id_number', '');

echo form_label('School Name');
echo form_input('school_name', '');

echo form_label('Syllabus');
$optSyllabus= array(
	'None'=>'Select Syllabus',
	'NSC'=>'National Senior Crtificate',
	'SC'=>'Senior Certificate',
	'IEB'=>'Independent Examination Board'
);
echo form_dropdown("syllabus", $optSyllabus, 'Select Syllabus');
echo form_label();
echo form_submit('save','Save', 'class="btn btn-success btn-large"');

echo form_fieldset_close();

echo form_close();
?>