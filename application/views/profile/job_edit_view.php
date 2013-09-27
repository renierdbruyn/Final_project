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
//print_r($job_data);
//echo "<br>";
//print_r($industry_types);

echo form_open('profile/update_job_data');

echo form_fieldset('Edit Employment History Information');

foreach($job_data as $job):


echo form_hidden('id_number', $job['id_number']);

echo form_label('Position');
echo form_input('position', $job['position']);

echo form_label('Duties');
echo form_textarea('duties', $job['duties']);

echo form_label('Industry Type');
?>				
<select name="industry_type">

	<option>Select Industry Type</option>
	
	<?php foreach($industry_types as $industry_type): ?>
		
	<option value="<?php echo $industry_type['industry_type']; ?>" <?php if($industry_type['industry_type']==$job['industry_type'])echo "selected" ?>><?php echo $industry_type['industry_type']; ?></option>
	
	<?php endforeach; ?>
	
</select>

<?php

echo form_label('Start Date');
?>
<input type="text" name="start_date" value="<?php echo $job['start_date']; ?>" id="dp2">
<?php
//echo form_input('start_date', $job['start_date']);

echo form_label('End Date');
?>
<input type="text" name="end_date" value="<?php echo $job['end_date']; ?>" id="dp1">
<?php
//echo form_input('end_date', $job['end_date']);

echo form_label();
echo form_submit('save','Save', 'class="btn btn-success btn-large"');

endforeach;

echo form_fieldset_close();

echo form_close();
?>



<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
<script src="http://www.eyecon.ro/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
        $('#dp1').datepicker({
    format: 'dd-mm-yyyy'
    });

        $('#dp2').datepicker({
    format: 'dd-mm-yyyy'
    });
</script>
</div> <!--end container -->
                </div>
            </div>
        </div>
