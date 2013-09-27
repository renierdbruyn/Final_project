<DIV class="container">
</DIV>
<DIV class="container">
    <DIV class="row">
        <DIV class="span5 bs-docs-sidebar">
            <UL class="nav nav-list bs-docs-sidenav">

                <?php
                foreach ($blogs AS $viewData) {
                    $id = $viewData->advert_id;
                    $title = $viewData->job_title;
                    $body = $viewData->job_description;
                    $date = $viewData->start_date;
                    ?>

                    <?php
                    ?>
                    <div class="span 10">
                        <b><ul> <?php echo isset($title) ? $title : NULL; ?></ul></b>
    <?php echo isset($body) ? $body : NULL; ?> </br>
                        <b>date: </b> <?php echo isset($date) ? $date : NULL; ?>

                        <hr>
                    </div>

    <?php
}
?>
            </UL></DIV>
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

                           
    <h1>Careers Articles</h1>
    <ul>
         <li><img src="<?php echo base_url(); ?>assets/img/95.jpg" class="img-rounded" height="100px" width="100px"/></form><h2><a href="<?php echo base_url(); ?>index.php/site/mentor">Should you be an employee or an employer?</a></h2><p style="font-size: 10px; font-weight: bold; color:gray">Monday, August 26, 2013</p><pMany of us want to be our own boss, but do you know what it takes to fill their shoes? Find out if you’re an employer or an employee.</p></li>
        <li><img src="<?php echo base_url(); ?>assets/img/96.jpg" class="img-rounded" height="100px" width="100px"/></form><h2><a href="<?php echo base_url(); ?>index.php/site/personality">Don’t take it personally</a></h2><p style="font-size: 10px; font-weight: bold; color:gray">Monday, August 26, 2013</p><p>It’s difficult to be criticised, especially if you believe your way is the right way. There are right and wrong ways to handle criticism – we tell you both.</p></li>
        <li><img src="<?php echo base_url(); ?>assets/img/97.jpg" class="img-rounded" height="100px" width="100px"/></form><h2><a href="<?php echo base_url(); ?>index.php/site/home">Don’t let career anxiety knock you down</a></h2><p style="font-size: 10px; font-weight: bold; color:gray">Monday, August 26, 2013</p><p>Let’s face it; the South African economy is not looking great at the moment, which is why it’s even more important that you keep your cool at work. Here’s how.</p></li>
         <li><img src="<?php echo base_url(); ?>assets/img/95.jpg" class="img-rounded" height="100px" width="100px"/></form><h2><a href="<?php echo base_url(); ?>index.php/site/mentor">How to be a great mentor?</a></h2><p style="font-size: 10px; font-weight: bold; color:gray">Monday, August 26, 2013</p><pMany of us want to be our own boss, but do you know what it takes to fill their shoes? Find out if you’re an employer or an employee.</p></li>
 </div>
                </div>
            </div>
        </div>
    </div>
</div>