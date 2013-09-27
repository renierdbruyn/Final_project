

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

				//print_r($syllabus);
				//echo $syllabus['syllabus'];

				$this->load->helper('form');
				$attributes = array('class' => 'horizontal-form');
				echo form_open('profile/update_school', $attributes);

				echo form_fieldset('Add Personal Information');
				foreach ($school_data as $school):
				echo form_hidden('id_number', $this->session->userdata('id_number'));

				echo form_label('School Name');
				echo form_input('school_name', $school['school_name']);

				echo form_label('Syllabus');
				echo $school['syllabus'];
				/*$optSyllabus= array(
					'None'=>'Select Syllabus',
					'NSC'=>'National Senior Crtificate',
					'SC'=>'Senior Certificate',
					'IEB'=>'Independent Examination Board'
				);
				echo form_dropdown("syllabus", $optSyllabus, $school['syllabus']);*/
				echo form_label();
				echo form_submit('save','Save', 'class="btn btn-success "');
				endforeach;
				echo form_fieldset_close();

				echo form_close();
				?>
			</div> <!--end container -->
    	</div>
	</div>
</div>