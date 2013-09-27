<div class="container well span8">
    
    <table class="table table-bordered table-condensed table-striped">
        
        <?php 
            foreach($data_skills as $skill):
                echo '<tr><td>';
                echo $skill['skill_name'];
                echo '</td></tr>';
            endforeach;
        ?>
    </table>
</div>
