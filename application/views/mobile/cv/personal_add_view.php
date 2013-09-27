 <div class="navbar navbar-inner navbar-top">              
        <div class="navbar navbar-fixed">
        <ul class="nav"> 
            <li><a href="<?php echo base_url();?>index.php/auth_public/">public</a></li>
					
             
                                                       <li><a href="<?php echo base_url();?>index.php/upload">Upload Cv/Documents</a></li>
                           <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">update user details<b class="caret"></b></a>

                            <ul class="dropdown-menu">
										
							<li class=""><a href="<?php echo base_url();?>index.php/auth_public/update_account"></li>Update Account Details</a>
						
							<li class=""><a href="<?php echo base_url();?>index.php/auth_public/update_email"></li>Update Email Address</a>
						
							<li class=""><a href="<?php echo base_url();?>index.php/auth_public/change_password"></li>Update Password</a>
						
		
                            </ul>
  
		</ul>
        </div>
</div>
<div class="container">   
    <?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url());	?> 
<?php
$this->load->helper('form');
$attributes = array('class' => 'horizontal-form');
echo form_open('profile/save_personal', $attributes);

//echo form_label('ID Number: ');
//echo form_input('id_number', '');
?>

   
<label for="first_name"><h2>Welcome <?php echo set_value('update_first_name',$user['upro_first_name']);?> <?php echo set_value('update_last_name',$user['upro_last_name']);?> <br>Fill your personal details!!!</label></h2>

<label for="id_no">Identity number:<?php echo set_value('update_id_number',$user['id_number']);?></label>
<?php
echo form_label('Address');
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
	'None'=>'Select License',
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

echo form_label('Select your ethnicity');
$optEE= array(
	'None'=>'Select Employment Equity',
	'White'=>'White',
	'Black'=>'Black',
	'Assian'=>'Assian',
	'Mixed Race'=>'Mixed Race',
	'Other'=>'Other'
	
);

echo form_dropdown("ee", $optEE, 'Select Employment Equity');

echo form_label('If Employment Equity is "Other", please specify');
echo form_input('other_ee');

echo form_label('How would you like to get paid ?');
$optPeriodPay= array(
	'None'=>'Select Preferred Period',
	'Weekly'=>'Weekly',
	'Monthly'=>'Monthly'
	
);
echo form_dropdown("pay_period", $optPeriodPay, 'Select Preferred Period');

echo form_label('Willing to relocate ?');
echo form_checkbox('relocate', 'Yes');

echo form_label('Minimum Salary per month');
$optMinSalary= array(
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
$minSalaryProp=array(
    'class'=>'span7',
    'name'=>'minimum_salary',
    'style'=>'width:300px'
);
echo form_dropdown("minimum_salary", $optMinSalary, 'Select Salary');

echo form_label('Preferred Salary per month');
$optMinSalary= array(
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
$minSalaryProp=array(
    'class'=>'span7',
    'name'=>'license',
    'style'=>'width:300px'
);
echo form_dropdown("preferred_salary", $optMinSalary, 'Select Salary');
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
echo form_submit('save','Save', 'class="btn btn-primary "');

echo form_fieldset_close();

echo form_close();
?>

<form class="pull-right">
      <div class="well sidebar-nav">
          <ul>
              <li class="nav-header">Online Cv</li>
              <li class=""> <a href="<?php echo base_url(); ?>index.php/profile/personal">Personal Details</a>			
         </li>                   
         <li class=""><a href="<?php echo base_url(); ?>index.php/profile/school">School Details</a>			
         </li>                    
         <li class=""><a href="<?php echo base_url(); ?>index.php/profile/tertiary">Tertiary Details</a>
                               
         <li class=""><a href="<?php echo base_url(); ?>index.php/profile/job_history">Employment Details</a>
                               
         <li class=""><a href="<?php echo base_url(); ?>index.php/profile/skills">Skills Details</a>
                            
</form>
</div>
</div>