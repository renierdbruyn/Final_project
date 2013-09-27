<div class="container well span8">
    
    <table class="table table-bordered table-condensed table-striped">
        
        <?php 
            foreach($word_skills as $skill):
                echo '<tr><td>';
                echo $skill['skill_name'];
                echo '</td></tr>';
            endforeach;
        ?>
    </table>
    <a href="<?php echo 'modify_job_data/' .$this->session->userdata('id_number'); ?>" class="btn btn-success" >Update</a>
</div>
