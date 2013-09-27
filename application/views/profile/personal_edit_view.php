<div class="container">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span2">
                        <!--Sidebar content-->
                        <?php $this->load->view('profile/applicant_sidebar'); ?>
                    </div>

                    <div class="span10">
                        <!--Body content-->
                    
<?php
$this->load->helper('form');
echo form_open('profile/update_personal_data');

echo form_fieldset('Add Personal Information');

foreach ($personal_data as $personal) 
{
    
echo form_label('ID Number: ');
echo form_input('id_number', $personal['id_number']);

echo form_label('Address');
echo form_input('street', $personal['street']);
echo "<br>";
echo form_input('suburb', $personal['suburb']);
echo "<br>";
echo form_input('postal_code', $personal['postal_code']);

echo form_label('City');
echo form_input('city', $personal['city']);

echo form_label('Race');
$optRace= array(
	'None'=>'Select Race',
	'White'=>'White',
	'Black'=>'Black',
	'Assian'=>'Assian',
	'Mixed Race'=>'Mixed Race',
	'Other'=>'Other'
	
);

echo form_dropdown("race", $optRace, $personal['race']);

echo form_label('Drivers License');
$optlicense= array(
	'None'=>'Select License',
	'A1'=>'A1',
	'A'=>'A',
	'B'=>'B',
	'EB'=>'EB',
	'C1'=>'C1',
	'C'=>'C',
	'EC1'=>'EC1',
	'EC'=>'EC',
);

echo form_dropdown('license', $optlicense, $personal['license']);
$checked='';
echo form_label('Willing to relocate ?');
if($personal['relocate']=="Yes")
{
	$checked=true;
} 
echo form_checkbox('relocate', 'Yes', $checked);

echo form_label('Minimum Salary per month');
$optminSalary= array(
	'None'=>'Select Salary',
	'1000-3000'=>'R1000 - R3000',
	'4000-6000'=>'R4000 - R6000',
	'7000-9000'=>'R7000 - R9000',
	'10000-15000'=>'R10 000 - R15 000',
	'16000-21000'=>'R16 000 - R21 000',
	'23000-28000'=>'R23 000 - R28 000',
	'29000-35000'=>'R29 000 - R35 000',
	'36000-41000'=>'R36 000 - R41 000',
);
echo form_dropdown('minimum_salary', $optminSalary, $personal['minimum_salary']);

echo form_label('Preferred Salary per month');
$optPrefSalary= array(
	'None'=>'Select Salary',
	'7000-9000'=>'R7000 - R9000',
	'10000-15000'=>'R10 000 - R15 000',
	'16000-21000'=>'R16 000 - R21 000',
	'23000-28000'=>'R23 000 - R28 000',
	'29000-35000'=>'R29 000 - R35 000',
	'36000-41000'=>'R36 000 - R41 000',
	'42000-60000'=>'R42 000 - R60 000',
	'61000-100000'=>'R61 000 - R100 000',
);
echo form_dropdown('preferred_salary', $optPrefSalary, $personal['preferred_salary']);
echo form_label('Contract Type');
?>
<select name="contract_type">
	<optgroup label="Full time">
		<option <?php if($personal['contract_type']=="Permanent full time") echo "checked"; ?> value="Permanent full time">Permanent</option>
		<option <?php if($personal['contract_type']=="Contract full time") echo "checked"; ?> value="Contract full time">Contract</option>
		<option <?php if($personal['contract_type']=="Internship full time") echo "checked"; ?> value="Internship full time">Internship</option>
	</optgroup>
	<optgroup label="Part time">
		<option <?php if($personal['contract_type']=="Permanent part time") echo "checked"; ?> value="Permanent part time">Permanent</option>
		<option <?php if($personal['contract_type']=="Contract part time") echo "checked"; ?> value="Contract part time">Contract</option>
		<option <?php if($personal['contract_type']=="Internship part time") echo "checked"; ?> value="Internship part time">Internship</option>
	</optgroup>
</select>
<?php

}
echo form_label();
echo form_submit('save','Save', 'class="btn btn-success btn-medium"');

echo form_fieldset_close();

echo form_close();
?>

</div> <!--end container -->
                </div>
            </div>
        </div>