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
            
            <h4>Advert Information</h4>

            <table class="table table-bordered table-condensed table-striped">
                <?php foreach($advert_fields as $advert_field): ?>
                <tr>
                    <td>Job Title</td>
                    <td><?php echo $advert_field['job_title']; ?></td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td><?php echo $advert_field['company_location']; ?></td>
                </tr>
                <tr>
                    <td>Job Description</td>
                    <td><?php echo $advert_field['job_description']; ?></td>
                </tr>
                <tr>
                    <td>Juties</td>
                    <td><?php echo $advert_field['job_duties']; ?></td>
                </tr>
                <tr>
                    <td>Contract Type</td>
                    <td><?php echo $advert_field['contract_type']; ?></td>
                </tr>
                <tr>
                    <td>Minimum Experience</td>
                    <td><?php echo $advert_field['required_experience']." years"; ?></td>
                </tr>
                <tr>
                    <td>Eployment Equity</td>
                    <td><?php echo $advert_field['employment_equity']; ?></td>
                </tr>
                <tr>
                    <td>Tertiary Qualification</td>
                    <td><?php echo $advert_field['qualification_type'].' '.$advert_field['qualification_name']; ?></td>
                </tr>
                <tr>
                    <td>Driver's License</td>
                    <td><?php echo $advert_field['drivers_licence']; ?></td>
                </tr>
                
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
                    </div> <!--end container -->
                </div>
            </div>
        </div>
