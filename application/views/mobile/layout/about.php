

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <!--Sidebar content-->
           <?php $this->load->view('layout/advanced_search'); ?>
                <br>
            <hr>
                <br>
            
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

                 <h1>About Us</h1>
        <p>
            You Choose Recruit has grown from strength to strength as our 
            loyal Clients have come to rely on our trusted advice and employment 
            process. At You Choose Recruit we represent top companies / 
            enterprises who employ the finest staff.
        </p>
        <p>
            We therefore screen our candidates thoroughly to ensure that they 
            are the very best employees / candidates of choice thus ensuring the 
            correct fit and the long term success for all. We recruit for both 
            generalist placements and specialist placements.
        </p>
        <p>
            Our focus is to understand the career objectives of every candidate; 
            and particularly our client strategy and corporate culture. 
            You Choose Recruit is committed to being an Employer of Choice 
            ourselves, and as such have chosen the most remarkable and talented 
            team who have one primary goal is to be of service to you. 
            We welcome any feedback.
        </p>
        
            <p><a class="btn btn-primary pull-right" href="<?php echo base_url(); ?>index.php/site/contact"><i class="icon-info-sign"></i> Contact Us</a></p>


            </div>
        </div>
    </div>
</div>




