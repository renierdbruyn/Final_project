<div class="container">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span2">
                <!--Sidebar content-->
                <?php $this->load->view('profile/applicant_sidebar');  ?>
            </div>

            <div class="span10">
                <!--Body content-->
				<h4>Your Applications</h4>
				<table class="table table-bordered table-condensed table-striped">
               
                <tr>
                    <th>Job Title</th>
                    <th>Consulatant</th>
                    <th>Status</th>                  
                </tr>
                 <?php foreach($applications as $application): 
                     $adverts = $this->Advert_model->get_advert($application['advert_id']);
                       foreach($adverts as $advert): ?>
                <tr>
                    <?php if($application['id_number']==$this->session->userdata('id_number'))
                        {
                           echo '<td>'.  anchor('advert/review_advert/' . $application['advert_id'], $advert['job_title']).'</td>';
                           echo '<td>'.  $application['consultant'] .'</td>';
                           echo '<td>'.  $application['status'].'</td>';
                        }
                        //print_r($advert)
                    ?>
                </tr>
                
                <?php endforeach;
                endforeach;?>
            </table>
				<?php //print_r($applications) ?>
			</div> <!--end container -->
        </div>
    </div>
</div>