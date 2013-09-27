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

echo form_open('profile/update_school_subject');
foreach ($old_data as $old):
echo form_fieldset('Edit Subject');
echo form_label('Subject Name: ');
?>
				
<select name="subject">

	<option>Select Subject</option>
	
	<?php foreach($subjects as $subject): ?>
		
	<option value="<?php echo $subject['subject']; ?>" <?php if($old['subject']==$subject['subject'])echo "selected" ?>><?php echo $subject['subject']; ?></option>
	
	<?php endforeach?>
	
</select>

<?php

echo form_label('Subject marks');
echo form_input('marks', $old['marks']);

echo form_hidden('id', $old['id']);
echo form_hidden('id_number', $old['id_number']);

echo form_label();
echo form_submit('save','Save', 'class="btn btn-success btn-large"');
endforeach;
echo form_fieldset_close();

echo form_close();

?>

</div> <!--end container -->
                </div>
            </div>
        </div>