<div class="container">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span2">
                        <!--Sidebar content-->
                        <?php $this->load->view('profile/applicant_sidebar'); ?>
                    </div>

                    <div class="span10">
                        <!--Body content-->

<div class="container">
    <div class="row-fluid">
        <div class="span8">
            
            <h4>Employment History Information</h4>

            <table class="table table-bordered table-condensed table-striped">

                <?php foreach ($job_data as $data): ?>

                    <tr>
                        <td><label>Position</label></td>
                        <td><?php echo $data['position']; ?></td>
                    </tr>
                    <tr>
                        <td><label>Duties</label></td>
                        <td><?php echo $data['duties']; ?></td>
                    </tr>
                    <tr>
                        <td><label>Industry Type</label></td>
                        <td><?php echo $data['industry_type']; ?></td>
                    </tr>
                    <tr>
                        <td><label>Start Date</label></td>
                        <td><?php echo $data['start_date']; ?></td>
                    </tr>
                    <tr>
                        <td><label>End Date</label></td>
                        <td><?php echo $data['end_date']; ?></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo 'modify_job_data/' . $data['id_number']; ?>" class="btn btn-primary btn-large" >Update</a></td>
                        <td><?php /* echo anchor('profile/modify_job_data/'.$data['id'], 'Update'); */ ?></td>
                    </tr>

                <?php endforeach ?>

            </table>
            <!--<a href="" class="btn btn-primary">Add Another Qualification</a>-->
        </div>
    </div>
</div>

</div> <!--end container -->
                </div>
            </div>
        </div>