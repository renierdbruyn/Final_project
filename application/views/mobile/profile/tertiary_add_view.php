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
				//print_r($qualification); //SQL query variable dumb
				
				if (!$qualification == "") {
				    $this->load->view('profile/qualification_display_view');
				} else {
				    $this->load->view('profile/qualification_add_view');
				}
				?>
				<script>
				
				    $("#identifier").modal();
				
				
				</script>
				
				<div class="container">
				    <div  class="modal hide" id="example" aria-hidden="true">
				        <div class="modal-header">
				            <a class="close" data-dismiss="modal">�</a>
				            <h3>Enter Subject Information</h3>
				        </div>
				        <div class="modal-body">
				<?php
				$attributes = array('class' => 'horizontal-form');
				echo form_open('profile/save_tertiary_subject', $attributes);
				
				echo form_hidden('id_number', $this->session->userdata('id_number'));
				
				echo form_label('Tertiary Subject');
				echo form_input('subject', '');
				
				echo form_label('Subject Marks');
				echo form_input('marks', '');
				
				echo form_label();
				echo form_submit('save', 'Save', 'class="btn btn-success btn-large"');
				
				echo form_close();
				?>        
				        </div>
				        <div class="modal-footer">
				            <a href="#" class="btn" data-dismiss="modal">Close</a>
				        </div>
				    </div>
				
				    <div class="container">
				        <div class="row-fluid">
				            <div class="span8">
				                <h4>Your Subjects List</h4>
				
				                <table class="table table-bordered table-condensed table-striped">
				                    <tr class="info">
				                        <th>Subject Name</th>
				                        <th>Subject Marks</th>
				                        <th>Actions</th>
				                    </tr>
				<?php foreach ($tertiary_subjects as $tertiary_subject): ?>
				                        <tr>
				                            <td><?php echo $tertiary_subject['subject']; ?></td>
				                            <td><?php echo $tertiary_subject['marks']; ?></td>
				                            <td><?php echo anchor('profile/modify_tertiary_subject/' . $tertiary_subject['id'], 'Edit') . " &nbsp;|&nbsp; " . anchor('profile/remove_tertiary_subject/' . $tertiary_subject['id'], 'Delete'); ?></td>
				                        </tr>
				<?php endforeach ?>
				                </table>
				
				            </div>
				        </div>
				    </div>
				    <a data-toggle="modal" href="#example" class="btn btn-primary" > Add A Subject</a>
				
				</div>
</div> <!--end container -->
                </div>
            </div>
        </div>