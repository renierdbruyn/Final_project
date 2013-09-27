

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <!--Sidebar content-->
            <?php
            echo form_open('Asearch/execute_search');

            echo form_input(array('name' => 'search'), "search", "style='width:100%'");
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

echo form_dropdown('company_location', $company_location, '', "style='width:100%'");
?>
            </p>
            <p>
                <label for="gender">Gender</label>
<?php
$gender = array('any' => 'Any',
    'male' => 'Male',
    'female' => 'Female');
echo form_dropdown('gender', $gender, 'any', "style='width:100%'");
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
echo form_dropdown('employment_equity', $employment_equity, 'any', "style='width:100%'");
echo form_submit('search_submit', 'SEARCH JOB', "class='btn btn-primary' ");
?>
                <br>
            <hr>
                <br>
            </p>
<?php $this->load->view('layout/blog'); ?>

        </div>
        <div class="span10">
            <!--Body content-->

            <DIV class="page-header">
            </div>
            <div id="myCarousel" class="carousel slide">

                <div class="carousel-inner span12">
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



            <DIV class="page-header">

                <h1>You choose recruit</h1>

                <p>
                    A Kloof, KZN based Recruitment Agency offering a comprehensive 
                    range of services to Candidates who seek quality positions and 
                    Employers who require the right Personnel. Our selection process 
                    ensures that the skills, knowledge and experience of the candidate 
                    is conducive with the exacting requirements of the needs of the enterprise .
                    Building relationships with our candidates and clients is the prime focus of 
                    our dedicated and dynamic team of consultants.
                </p>

                <h1>Clients<img src="<?php echo base_url(); ?>assets/img/15.jpg" class="img-rounded" height="100px" width="100px"/></h1>
                <p>
                    We are here to make the process of finding your ideal job as easy as possible. 
                    We achieve that by first getting to know you and finding out exactly what 
                    you are looking for, the kind of job you want, projects that interest you 
                    and locations that would suit you.
                </p>
                <p><a class="btn btn-primary pull-right" href="<?php echo base_url(); ?>index.php/site/services"><i class="icon-info-sign"></i> Read more</a></p>


                <h1>Applicants<img src="<?php echo base_url(); ?>assets/img/22.jpg" class="img-rounded" height="100px" width="100px"/></h1>
                <p>
                    Rapid service, accurate assessments and successful placements! 
                    Our reputation is based on creating the opportunity for you to 
                    choose from the best candidates available. Our experience and 
                    understanding of the market enables us to attract the highest 
                    quality candidates.
                </p>
                <p><a class="btn btn-primary pull-right" href="<?php echo base_url(); ?>index.php/site/services"><i class="icon-info-sign"></i> Read more</a></p>

            </div>
        </div>
    </div>
</div>



