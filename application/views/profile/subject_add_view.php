<?php
$this->load->helper('form');
$attributes = array('class' => 'horizontal-form');
echo form_open('profile/save_subjects', $attributes);

echo form_fieldset('Add Subjects');

echo form_label('Subject Name: ');

$subjects= array(
	'None'=>'Select A Subject',
	"Accounting"=>"Accounting",
    "Agricultural Management Practice"=>"Agricultural Management Practice",
    "Agricultural Science"=>"Agricultural Science",
    "Agricultural Technology"=>"Agricultural Technology",
    "Business Studies"=>"Business Studies",
    "Civil Technology"=>"Civil Technology",
    "Computer Applications Technology"=>"Computer Applications Technology",
    "Consumer Studies"=>"Consumer Studies",
    "Dance Studies"=>"Dance Studies",
    "Design"=>"Design",
    "Dramatic Arts"=>"Dramatic Arts",
    "Economics"=>"Economics",
    "Electrical Technology"=>"Electrical Technology",
    "Engineering Graphics and Design"=>"Engineering Graphics and Design",
    "Geography"=>"Geography",
    "History"=>"History",
    "Hospitality"=>"Hospitality",
    "Information Technology"=>"Information Technology",
    "Life Sciences"=>"Life Sciences",
    "Mathematics"=>"Mathematics",
    "Maths Literacy"=>"Maths Literacy",
    "Mechanical Technology"=>"Mechanical Technology",
    "Music"=>"Music",
    "Physical Science"=>"Physical Science",
    "Religion Studies"=>"Religion Studies",
    "Tourism"=>"Tourism",
    "Visual Arts"=>"Visual Arts"
);
$subjectProp=array(
    'class'=>'span7',
    'name'=>'license',
    'style'=>'width:300px'
);
echo form_dropdown("subject", $subjects, 'Select License');

echo form_hidden('id_number', $this->session->userdata('id_number'));
echo form_label('Subject Marks');
echo form_input('marks');


echo form_label();
echo form_submit('save','Save', 'class="btn btn-success btn-large"');

echo form_fieldset_close();

echo form_close();


