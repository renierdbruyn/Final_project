<div class="container">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span2">
                <!--Sidebar content-->
                <?php $this->load->view('profile/applicant_sidebar'); ?>
            </div>

            <div class="span10">
                <!--Body content-->
				<h1>Your Applications</h1>
				<table class="table table-bordered table-condensed table-striped">
               
                <tr>
                    <th>Job Title</th>
                    <th>Consulatant</th>
                    <th>Status</th>                  
                </tr>
                
                 <?php foreach($applications as $application): ?>
                <tr><?php $sql = "SELECT job_title FROM job_advert 
                                  WHERE advert_id = {$this->db->escape($application['advert_id'])}"; ?>
                   <?php $job = $this->db->query($sql)->result_array(); foreach($job as $job_title): ?>
                    <td><?php echo $job_title['job_title']//anchor('advert/view_advert/' . $job_advert['advert_id'], $job_advert['job_title']);  ?></td>
                    <td><?php endforeach; echo $application['consultant'] ?></td>
                    <td><?php echo $application['status']; ?></td>
                </tr>
                
                <?php endforeach; ?>
            </table>
				<?php //print_r($applications) ?>
			</div> <!--end container -->
        </div>
    </div>
</div>