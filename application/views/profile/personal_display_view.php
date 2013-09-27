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
            
            <h4>Personal Information</h4>

            <table class="table table-bordered table-condensed table-striped">
                <?php foreach($view_data as $personal): ?>
                <tr>
                    <td>ID Number</td>
                    <td><?php echo $this->session->userdata('id_number'); ?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php echo $this->session->userdata('name'); ?></td>
                </tr>
                <tr>
                    <td>Surname</td>
                    <td><?php echo $this->session->userdata('surname'); ?></td>
                </tr>
                <tr>
                    <td>Cell Phone</td>
                    <td><?php echo $this->session->userdata('cell'); ?></td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td><?php echo $this->session->userdata('email'); ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo $personal["street"] . ", " . $personal["suburb"] . ", " . $personal["postal_code"]; ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php echo $personal["city"]; ?></td>
                </tr>
                <tr>
                    <td>Race</td>
                    <td><?php echo $personal["race"]; ?></td>
                </tr>
                <tr>
                    <td>License</td>
                    <td><?php echo $personal["license"]; ?></td>
                </tr>
                
                <tr>
                    <td>Minimum Salary</td>
                    <td><?php echo $personal["minimum_salary"]; ?></td>
                </tr>
                <tr>
                    <td>Preferred Salary</td>
                    <td><?php echo $personal["preferred_salary"]; ?></td>
                </tr>
                <tr>
                    <td>Preferred Contract Type</td>
                    <td><?php echo $personal["contract_type"]; ?></td>
                </tr>
                <tr>
                    <td>Willing to Relocate</td>
                    <td><?php if($personal["relocate"]=='Yes') echo $personal["relocate"]; else echo 'No'; ?></td>
                </tr>
                <tr>
                    <td><?php echo anchor('profile/modify_personal_data/' . $personal['id_number'], 'Update', 'class="btn btn-primary btn-large "'); ?></td>
                    <td></td>
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
