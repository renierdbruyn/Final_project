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

echo form_open('profile/save_personal', array('class' => 'horizontal-form'));
echo form_fieldset('Add Personal Information');

echo form_hidden('id_number', $this->session->userdata('id_number'));

echo form_label('Physical address');
?>

<input type="text" name="street" placeholder="120 Kiwi road" />
<br>
<input type="text" name="suburb" placeholder="New dawn park" />
<br>
<input type="text" name="postal_code" placeholder="4036" />

<?php 

echo form_label('City');
echo form_input('city', '');

echo form_label('Drivers License');
$optlicense= array(
	''=>'Select License',
        'Not yet'=>'Not yet',
	'A1'=>'A1',
	'A'=>'A',
	'B'=>'B',
	'EB'=>'EB',
	'C1'=>'C1',
	'C'=>'C',
	'EC1'=>'EC1',
	'EC'=>'EC'
);

echo form_dropdown("license", $optlicense, 'Select License');

echo form_label('Select your race');
$optRace= array(
	'White'=>'White',
	'Black'=>'Black',
	'Assian'=>'Assian',
	'Mixed Race'=>'Mixed Race'
    );

echo form_dropdown("race", $optRace, 'Select Race');

echo form_label('Willing to relocate ?');
echo form_checkbox('relocate', 'Yes');

echo form_label('Minimum Salary per month');
$optMinSalary = array(
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
echo form_dropdown("minimum_salary", $optMinSalary, 'Select Salary');

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
echo form_dropdown("preferred_salary", $optPrefSalary, 'Select Salary');

echo form_label('Contract Type');
?>
<select name="contract_type">
	<optgroup label="Full time">
		<option value="Permanent full time">Permanent</option>
		<option value="Contract full time">Contract</option>
		<option value="Internship full time">Internship</option>
	</optgroup>
	<optgroup label="Part time">
		<option value="Permanent part time">Permanent</option>
		<option value="Contract part time">Contract</option>
		<option value="Internship part time">Internship</option>
	</optgroup>
</select>
<?php
echo form_label();
echo form_submit('save','Save', 'class="btn btn-success btn-large"');

echo form_fieldset_close();

echo form_close();
?>
                    </div>
                </div>
            </div>
</div>