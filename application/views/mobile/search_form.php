<center>
    <table>
    <label>Title</label>
<?php
    echo form_open('search/execute_search');
    echo form_input(array('name'=>'search'));
    echo'<br>';
    
    echo form_submit('search_submit','Advanced Search','class="btn btn-primary "');


?>

 <p>
              <label for="company_location">Company Regional Location: <?php $company_location = array('none' => '-Select-',
                                                                                                'Eastern Cape' => 'Eastern Cape',
                                                                                                'Free State' => 'Free State',
                                                                                                'Gauteng' => 'Gauteng',
                                                                                                'KwaZulu-Natal' => 'KwaZulu-Natal',
                                                                                                'Limpopo' => 'Limpopo',
                                                                                                'Mpumalanga' => 'Mpumalanga',
                                                                                                'Northern Cape' => 'Northern Cape',
                                                                                                'North West' => 'North West',
                                                                                                'Wetern Cape' => 'Western Cape');                                         
              echo form_dropdown('company_location', $company_location, 'none'); ?>
              </label> 
            </p>
    </p>
            <p>
              <label for="contract_type">Contract Type : <?php  $contract_type = array('none' => '-Select-',
                                                                            'permanent' => 'Permanent', 
                                                                            'part_time' => 'Part Time', 
                                                                            'fixed_term' => 'Fixed Term',
                                                                            'zero_hour' => 'Zero Hour',
                                                                            'volunteer' => 'Volunteer');
                echo form_dropdown('contract_type', $contract_type, 'none');?>
              </label>           
            </p>
      
          <label for="employment_equity">Employment Equity : <?php $employment_equity = array('none' => '-Select-',
                                                                                    'any' => 'All',
                                                                                    'caucation' => 'Caucation',
                                                                                    'black' => 'Black',
                                                                                    'asian' => 'Asian',
                                                                                    'mixed_race' => 'Mixed Race');
                echo form_dropdown('employment_equity', $employment_equity, 'none'); ?>
          </label>
      </p>
</center>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>