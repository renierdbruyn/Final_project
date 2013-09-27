

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

                 <?php echo form_open('contact/add'); ?>
                   
                        <h1>Contact Us</h1>
                        
                        <label> Fields marked * must be completed.</label>
                            <?php echo form_error('id_number'); ?>
                            <?php echo form_input('id_number', set_value('id_number'), "placeholder='Your Id Number * '"); ?>
                        <br>
                            <?php echo form_error('firstname'); ?>
                            <?php echo form_input('firstname', set_value('firstname'), "placeholder=' Your Name *'"); ?>
                        
                        <br>
                             <?php echo form_error('email_address'); ?>
                            <?php echo form_input('email_address', set_value('email_address'), "placeholder=' Your Email *'"); ?>
                        <br>
                            <?php echo form_error('telephone'); ?>
                            <?php echo form_input('telephone', set_value('cell-phone_number'),"placeholder='Your Number *'"); ?>
                        <br>
                    
                                     <select name="choose" <option value="choose"></option>
                                     <option value="1">I am a candidate having trouble with my account</option>
                                     <option value="2">I am an employer/recruiter looking to post jobs</option>
                                     <option value="3">I am an employer having trouble with my account</option>
                                     <option value="4">Other</option></select>
                  

 <?php
                $data = array(
                    'name' => 'content',
                    'id' => 'content',
                    'value' => set_value('content'),
                    'rows' => '6',
                    'cols' => '70',
                    'style' => 'margin: 0; padding: 0;',
                );
                echo "<tr><td>" . form_label('Comments: ', 'content') . "</td><td>" . form_textarea($data) . "</td></tr>";
                ?>
                
                        <button class="btn btn-primary" type="submit">submit</button>


            </div>
        </div>
    </div>
</div>





