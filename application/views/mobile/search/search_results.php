
<?php

if(!empty($results)){
$count=0;
foreach ($results as $val) 
    {
    $advert_id = $val['advert_id'];
    $count++;
    $med = $val['medical_aid'];
    if (isset($med) == '1') 
        {
        $med_status = 'MEDICAL AID: Yes';
    }
    else 
        {
        $med_status = 'MEDICAL AID: No';
    }
    $uif = $val['uif'];
    if (isset($uif) == '1') 
        {
        $uif_status = 'UIF: Yes';
    }
    else 
        {
        $uif_status = 'UIF: No';
    }
    $car = $val['car_allowance'];
    if (isset($car) == '1') 
        {
        $car_status = 'CAR ALLOWANCE: Yes';
    }
    else 
        {
        $car_status = 'CAR ALLOWANCE: No';
    }
    $home = $val['home_allowance'];
    if (isset($home) == '1') 
        {
        $home_status = 'HOME ALLOWANCE: Yes';
    }
    else 
        {
        $home_status = 'HOME ALLOWANCE: No';
    }
   
    echo "
        
            <div class='accordion-group'>
                <div class='accordion-heading'>
                    <a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#collapse".$count."'>" .
    $val ['job_title'] . "
                    </a>
                </div>
                <div id='collapse".$count."' class='accordion-body collapse in'>
                    <div class='accordion-inner'>
                        <strong>   END DATE: " . $val['end_date'] . "</strong>                           
                              <br>
                              <br>
                              <strong> LOCATION: " . $val['company_location'] ."</strong><br>
                                  <br>
                               <strong> CONTRACT TYPE: " . $val['contract_type'] ."</strong><br>
                                   <br>
<strong>DESCRIPTION: " . $val['job_description'] . " <strong><br>
                                <br>
                                <strong>  DUTIES: " . $val['job_duties'] . "</strong><br>
                                    <br>
                                    <strong>  SALARY TYPE: " . $val['salary_type'] . "</strong>
                              <br>
                              <br>
                            <strong>   SALARY: " . $val['salary_offered'] . "</strong><br>
                            <br>
<br>
                            <strong>" . $med_status . "<br>
                                <br>
<strong>" . $uif_status ."<br>
    <br>
    <strong>" . $car_status ."<br>
        <br>
        <strong>" . $home_status ."<br>
            <br>
            <strong> OTHER BENEFITS: " . $val['other_benefits'] . "</strong><br>
                <br>
                <strong> REQUIRED EXPERIENCE: " .$val['required_experience'] ."Years"."</strong><br>
                    <br>
                    <strong> EMPLOYMENT EQUITY: " .$val['employment_equity'] . "</strong><br>
                        <br>
                     <strong> DRIVERS LICENCE: " . $val['drivers_licence'] . "</strong><br>
                                 </br></strong>".
                                 
                           anchor(base_url()."index.php/advert/apply/$advert_id", "Apply", "class='btn btn-primary btn-medium'")
                    ."</div>
                </div>
            </div>
        
    </center>";
    
}
}else{
    ?>
<center>
<?php
    echo "no results found";
 echo form_open('Asearch/execute_search');

echo form_input(array('name' => 'search'));

echo form_submit('search_submit', 'SEARCH JOB', 'class="btn btn-primary"');
?>

                        <p>
                            <label for="company_location">Location</label>
                        <?php
                        $company_location = array('' => '',
                            'kzn' => 'Kwa-zulu Natal',
                            'gauteng' => 'Gauteng',
                            'eastern cape' => 'Eastern Cape',
                            'western cape' => 'Western Cape',
                            'northern cape' => 'Northern Cape',
                            'free state' => 'Free State',
                            'limpopo' => 'Limpopo');

                        echo form_dropdown('company_location', $company_location, '');
                        ?>
                        </p>
                        <p>
                            <label for="gender">Gender</label>
<?php
$gender = array('any' => 'Any',
    'male' => 'Male',
    'female' => 'Female');
echo form_dropdown('gender', $gender, 'any');
?>
                        </p>
                        <p>
                            <label for="employment_equity">Employment Equity</label>
<?php
$employment_equity = array('any' => 'Any',
    'caucasion' => 'Caucasion',
    'black' => 'Black',
    'asian' => 'Asian',
    'mixed race' => 'Mixed Race');
echo form_dropdown('employment_equity', $employment_equity, 'any');

}
 
?>
                            </center>
<br>
<br>
<br>
<br>
<br>
<br>
<br>