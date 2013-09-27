

<script>

    $("#identifier").modal();


</script>
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
                if (!$school_data == "") {
                    $this->load->view('profile/school_display_view');
                } else {
                    $this->load->view('profile/school_add_data');
                }
                ?>

                <div class="container">
                    <div  class="modal hide" id="add_subject" aria-hidden="true">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">X</a>
                            <h3>This is a Modal Heading</h3>
                        </div>
                        <div class="modal-body">
<?php
$attributes = array('class' => 'horizontal-form');
echo form_open('profile/save_subject', $attributes);

echo form_fieldset('Add Subject Information');

echo form_hidden('id_number', $this->session->userdata('id_number'));

echo form_label('Subject Name');
?>
                            <select name="subject">

                                <option>Select Subject</option>

<?php foreach ($subjects as $subject_list): ?>

                                    <option value="<?php echo $subject_list['subject']; ?>"><?php echo $subject_list['subject']; ?></option>
                                <?php endforeach ?>

                            </select>

<?php
echo form_label('Subject Marks');
echo form_input('marks', '');

echo form_label();
echo form_submit('save', 'Save', 'class="btn btn-success btn-large"');

echo form_fieldset_close();

echo form_close();
?>        

                            <div class="modal-footer">
                                <a href="#" class="btn" data-dismiss="modal">Close</a>
                            </div>
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
<?php foreach ($school_subjects as $user_subject): ?>
                                        <tr>
                                            <td><?php echo $user_subject['subject']; ?></td>
                                            <td><?php echo $user_subject['marks']; ?></td>
                                            <td><?php echo anchor('profile/modify_school_subject/' . $user_subject['id'], 'Edit') . " &nbsp;|&nbsp; " . anchor('profile/remove_school_subject/' . $user_subject['id'], 'Delete'); ?></td>
                                        </tr>
<?php endforeach ?>
                                </table>

                            </div>
                        </div>
                    </div>
                    <p><a data-toggle="modal" href="#add_subject" class="btn btn-primary">Add A Subject</a></p>
                </div>

            </div> <!--end container -->
        </div>
    </div>
</div>
