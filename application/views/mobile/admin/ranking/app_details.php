<?php //echo isset($applicants)? $applicants : NULL; ?>
<style>
    tr:nth-child(odd) {
  background-color: #eee;
}

tr:nth-child(even) {
  background-color: #FFF;
}
</style>

<table width="100%">
    <tr>
        <th></th>
        <th>Job Advert</th>
        <th>Applicant</th>
    </tr>
    <tr> 
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="10">Name:</td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($adverts as $advert) {
   // echo $advert->advert_id;
    echo $advert->job_title;
    
}
?>
        </td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($applicants as $applicant) {
    //echo $applicant->id_number;
    echo $applicant->firstname;
}
?>
        </td>
    </tr>
    <tr> 
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="10">Required experience:</td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($adverts as $advert) {
   // echo $advert->advert_id;
    echo $advert->required_experience." year/s";
    
}
?>
        </td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($applicants as $applicant) {
    //echo $applicant->id_number;
    echo $applicant->job_experience." year/s";
}
?>
        </td>
    </tr>
     <tr> 
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="10">Industry Type:</td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($adverts as $advert) {
   // echo $advert->advert_id;
    echo $advert->industry_type;
    
}
?>
        </td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($applicants as $applicant) {
    //echo $applicant->id_number;
    echo $applicant->industry_type;
}
?>
        </td>
    </tr>
    <tr> 
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="10">Qualification Type:</td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($adverts as $advert) {
   // echo $advert->advert_id;
    echo $advert->qualification_type;
    
}
?>
        </td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($applicants as $applicant) {
    //echo $applicant->id_number;
    echo $applicant->qualification_type;
}
?>
        </td>
    </tr>
    <tr> 
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="10">City:</td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($adverts as $advert) {
   // echo $advert->advert_id;
    echo $advert->company_location;
    
}
?>
        </td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($applicants as $applicant) {
    //echo $applicant->id_number;
    echo $applicant->city;
}
?>
        </td>
    </tr>
    
    <tr> 
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="10">Relocate?</td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($adverts as $advert) {
   // echo $advert->advert_id;
   echo 'look right of screen ;)';
    
}
?>
        </td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($applicants as $applicant) {
    //echo $applicant->id_number;
    echo $applicant->relocate;
}
?>
        </td>
    </tr>
    <tr> 
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="10">Need license?</td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($adverts as $advert) {
   // echo $advert->advert_id;
   if($advert->drivers_licence = !NULL && !empty($advert->drivers_licence )&& $advert->drivers_licence == 1){ echo "Yes";} else echo "No"; 
    
}
?>
        </td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($applicants as $applicant) {
    //echo $applicant->id_number;
    echo $applicant->license;
}
?>
        </td>
    </tr>
    <tr> 
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="10">Employment Equity</td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($adverts as $advert) {
   // echo $advert->advert_id;
   echo $advert->employment_equity; 
    
}
?>
        </td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($applicants as $applicant) {
    //echo $applicant->id_number;
    echo $applicant->employment_equity;
}
?>
        </td>
    </tr>
    <tr> 
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="10">Preferred Salary</td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($adverts as $advert) {
   // echo $advert->advert_id;
   echo "R".$advert->salary_offered; 
    
}
?>
        </td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($applicants as $applicant) {
    //echo $applicant->id_number;
    echo "R".$applicant->preferred_salary;
}
?>
        </td>
    </tr>
    <tr> 
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="10">Minimum Salary</td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($adverts as $advert) {
   // echo $advert->advert_id;
   echo "R".$advert->salary_offered; 
    
}
?>
        </td>
        <td style="border-width:1px; border-color:Black ; border-style :groove ;" width="45">
<?php
foreach ($applicants as $applicant):
    //echo $applicant->id_number;
    echo "R".$applicant->minimum_salary;
    $email = $applicant->uacc_email;
?>
        </td>
    </tr>
    <tr>
        <td colspan ="3" style="text-align: center;"><?php echo "<a href=\"mailto:".$email."?subject=Job\">Contact</a>" ?>
        </td> <?php endforeach; ?>
    </tr>
</table>
