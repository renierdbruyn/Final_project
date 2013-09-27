        
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
				$attributes = array('class' => 'horizontal-form');
				echo form_open('profile/update_tertiary', $attributes);

				echo form_fieldset('Add Tertiary Information');
				foreach($qualification as $tertiary):
				echo form_hidden('id_number', $this->session->userdata('id_number'));

				echo form_label('Institution Name');
				echo form_input('institution', $tertiary['institution']);

				echo form_label('Qualification Type');
				$optSyllabus= array(
					'None'=>'Select Qualification Type',
					'Certificate'=>'Certificate',
					'National Diploma'=>'National Diploma',
					'Degree'=>'Degree'
				);
				echo form_dropdown("type", $optSyllabus, $tertiary['type']);

				echo form_label('Qualification Name');
				echo form_input('course', $tertiary['course']);

				echo form_label();
				echo form_submit('save','Save', 'class="btn btn-primary"');
				endforeach;
				echo form_fieldset_close();

				echo form_close();
				?>
			</div> <!--end container -->
    	</div>
	</div>
</div>
