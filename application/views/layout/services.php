<?php $this->load->view('layout/blog'); ?>
       
        <DIV class="span9"><SECTION id="overview">
                <DIV class="page-header">
                </div>
                <div id="myCarousel" class="carousel slide">

                    <div class="carousel-inner">
                        <div class="active item"><img src="<?php echo base_url(); ?>assets/img/222.jpg" width ="1200px"/></div>
                        <div class="item"><img src="<?php echo base_url(); ?>assets/img/444.jpg"  height="1px" width="1200px"/>
                        </div>
                        <div class="item"><img src="<?php echo base_url(); ?>assets/img/555.jpg" height="5px" width="1200px"/>
                        </div>
                        <div class="item"><img src="<?php echo base_url(); ?>assets/img/888.jpg" height="5px" width="450px"/>
                        </div>
                        <div class="item"><img src="<?php echo base_url(); ?>assets/img/666.jpg" height="5px" width="315px"/>
                        </div>
                        <div class="item"><img src="<?php echo base_url(); ?>assets/img/777.jpg" height="5px" width="315px"/>
                        </div>

                    </div>
                </div>
                <a class="carousel-control left" href="#myCarousel" data-slide="prev"><img src="<?php echo base_url(); ?>assets/img/83.jpg" class="img-rounded" height="100px" width="100px"/> </a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next"><img src="<?php echo base_url(); ?>assets/img/83.jpg" class="img-rounded" height="100px" width="100px"/> </a>

        </DIV>
        <DIV class="container">
            <DIV class="row">
                <DIV class="span4 ">
                    <UL class="nav ">
<?php
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
?>
                        </p>


                    </UL></DIV>
                <DIV class="span9"><SECTION id="overview">
                        <DIV class="page-header">

                           
        <h1>Client Information</h1>
        <p>
            Rapid service, accurate assessments and successful placements! 
            Our reputation is based on creating the opportunity for you to 
            choose from the best candidates available. Our experience and 
            understanding of the market enables us to attract the highest 
            quality candidates.


        </p>
        <p>
            <br>
            All of our Consultants are skilled professionals who strive to deliver exceptional 
            results by matching the right candidate to both the culture and skills required by 
            your organization. Our services offer personnel placement for all skilled levels. 
            We have successfully placed every level of employee, from Executive Management to 
            Semi-skilled Labourers.
        </p>
        
        <dl>
           <h2>We offer our clients</h2>
           <dd>Background check</dd>
           <dd>Candidate introduction</dd>
           <dd>Placement facilitation</dd>
           <dd>Obtaining detailed Job Specification</dd>
           <dd>Interviewing & short-list selection</dd>
           <dd>Developing a thorough understanding of your organisation and need</dd>
           <dd>Database search coupled with selected advertising method and media</dd>
           
            
        </dl>
       
<p><a class="btn btn-primary pull-right" href="<?php echo base_url(); ?>index.php/site/contact"><i class="icon-info-sign"></i> Contact Us</a></p>

<br>
        <h1>Applicant Information</h1>
        <p>
            <b>
                You Choose Recruit are here to help you find that perfect position 
                and want to make it as easy as possible.
            </b>
        </p>
        <p>
            We do this by first getting to know you and finding out exactly what 
            you are looking for, the kind of job you want, projects that interest 
            you and locations that would suit you. 
        </p>
        <p>
            We use our database and contacts 
            to put you in touch with the right companies and support you through 
            the recruitment process, helping out with any information on vacancies 
            or employers you might need. Our support does not stop when you start 
            work either, we are always on hand if you need advice or when you are 
            ready to make that next move.
        </p>
        <p>
            Click <a href="" class="">here</a> for hints and tips
        </p>
        
             <form class="pull-right"> 
         <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/auth/register_account">Create new account</a>
             </form>
 </div>
                </div>
            </div>
        </div>
    </div>
</div>