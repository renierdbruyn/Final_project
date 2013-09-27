<div class="container">   

<?php
$this->load->helper('form');
$attributes = array('class' => 'horizontal-form');
echo form_open('profile/save_job_history', $attributes);
echo form_fieldset('Enter Employment History Information');
?>
<label for="id_no">Identity number:<?php echo set_value('update_id_number',$user['id_number']);?></label>

<?php
echo form_label('Position');
echo form_input('position', '');

echo form_label('Duties');
echo form_textarea('duties', '');

echo form_label('Industry Type');
$optlicense= array(
	'None'=>'Select Industry Type',
	'A1'=>'A1',
	'A'=>'A',
	'B'=>'B',
	'EB'=>'EB',
	'C1'=>'C1',
	'C'=>'C',
	'EC1'=>'EC1',
	'EC'=>'EC'
);

echo form_dropdown("industry_type", $optlicense, 'Select Industry Type');

echo form_label('Start Date');
echo form_input('start_date', '');

echo form_label('End Date');
echo form_input('end_date', '');

echo form_label();
echo form_submit('save','Save', 'class="btn btn-success btn-large"');

echo form_fieldset_close();

echo form_close();
?>

</div>