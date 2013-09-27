<div class="container">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span2">
                <!--Sidebar content-->
                <?php $this->load->view('profile/applicant_sidebar'); ?>
            </div>

            <div class="span10">
                <!--Body content-->
                
                <h4>Available jobs</h4>
                <table class="table table-bordered table-condensed table-striped">
               
                <tr>
                    <th>Job Title</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Start Date</th>
                    <th>End Date</th>                    
                </tr>
                 <?php foreach($job_adverts as $job_advert): ?>
                <tr>
                    <td><?php echo anchor('advert/view_advert/' . $job_advert['advert_id'], $job_advert['job_title']); ?></td>
                    <td><?php echo $job_advert['industry_type'] ?></td>
                    <td><?php echo anchor('advert/view_location/' . $job_advert['company_location'], $job_advert['company_location']); ?></td>
                    <td><?php echo $job_advert['start_date'] ?></td>
                    <td><?php echo $job_advert['end_date'] ?></td>
                </tr>
                
                <?php endforeach; ?>
            </table>
            <?php //echo anchor('profile/modify_personal_data/' . $job_advert['advert_id'], 'Update', 'class="btn btn-primary btn-large "'); ?>
                <?php //print_r($job_adverts); ?>

                
            </div>

        </div> <!--end container -->
    </div>
</div>
</div>