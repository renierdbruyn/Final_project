<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css" />
        <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="/resources/demos/style.css" />

        <style>
            h2,h1
            {
                font-family: lucida;
            }
            .datepicker {
                z-index: 9999;
                top:0;
                left: 0;
                padding: 4px;
                margin-top: 1px;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
                background-color: white;
            }
            .well {
                min-height: 20px;
                padding: 19px;
                margin-bottom: 20px;
                background-color: transparent;
                border: transparent;
                -webkit-border-radius: 6px;
                -moz-border-radius: 6px;
                border-radius: 6px;
                background-image: linear-gradient(to bottom,transparent,transparent);

                -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
                -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
            }
            .navbar-inner {
                min-height: 50px;
                padding-right: 20px;
                padding-left: 20px;
                background-color: transparent;
                background-image: -moz-linear-gradient(top, #2c3e50, #2c3e50);
                background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#2c3e50), to(#2c3e50));
                background-image: -webkit-linear-gradient(top, #2c3e50, #2c3e50);
                background-image: -o-linear-gradient(top, #2c3e50, #2c3e50);
                background-image: linear-gradient(to bottom,lightseagreen, lightseagreen);
                background-repeat: repeat-x;
                border: 1px solid transparent;
                -webkit-border-radius: 6px;
                -moz-border-radius: 0px;
                border-radius: 6px;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff2c3e50', endColorstr='#ff2c3e50', GradientType=0);
                *zoom: 1;
                -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
                -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
                box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
            }

            #message {margin-bottom:10px; border:2px solid transparent; font-size:20px; font-weight:bold; width: 900px;}
            #message .status_msg {margin:0; padding:5px; background-color:transparent;color: green;}
            #message .error_msg {margin:0; padding:5px; background-color:transparent;color:red;}
        </style>

        <script>
            $('#myTab a').click(function(e) {
                e.preventDefault();
                $(this).tab('show');
            })
        </script>
    </head>
    <body>
        
        <!--nav bar start -->
        
        <div class="navbar">
  <div class="navbar-inner">
    <div class="container">
 
      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
 
      <!-- Be sure to leave the brand out there if you want it shown -->
      <a class="brand" href="#"><img src="<?php echo base_url(); ?>assets/img/999.jpg" class="img-rounded" height="100px" width="450px"/></a>
 
      <!-- Everything you want hidden at 940px or less, place within here -->
      <div class="nav-collapse collapse">
        <!-- .nav, .navbar-search, .navbar-form, etc -->
<!--        <form class="navbar-search pull-left" action="search/execute_search">
                      <input type="text" class="search-query span2" placeholder="Search">
                      <input type="submit" name="search_submit" value="Job Search" class="btn btn-small btn-primary" >
                    </form>-->
        <?php
                echo form_open('search/execute_search',"navbar-search pull-left'");
                echo form_input(array('name' => 'search'));
                echo form_submit('search_submit', 'Job Search', 'class="btn btn-small btn-primary"');
                echo form_close();
                ?>   
        <ul class="nav">   
                    <form class="pull-left">
                        </form>
                    <li class=""><a href="<?php echo base_url(); ?>index.php/site/home"><i></i>Home</a>
                    <li class=""><a href="<?php echo base_url(); ?>index.php/site/services"><i></i>Services</a>
                    <li class=""><a href="<?php echo base_url(); ?>index.php/site/about"><i ></i>About Us</a>
                    <li class=""><a href="<?php echo base_url(); ?>index.php/site/contact"><i></i>Contact Us</a>
                    <li class=""><a href="<?php echo base_url(); ?>index.php/site/advice"><i></i>Career Advice</a>
                </ul>

                
        
        <form class="pull-right">  
                    <?php if (!$this->flexi_auth->is_logged_in_via_password()) { ?><a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/auth"><?php echo ($this->flexi_auth->is_logged_in()) ? 'Login via Password' : 'Login'; ?></a>

                    <?php } ?>
                    <?php if (!$this->flexi_auth->is_logged_in()) { ?> <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/auth/register_account">Register</a>


                    <?php } else { ?><a class="btn btn-primary " href="<?php echo base_url(); ?>index.php/auth/logout">Logout</a>
                    <?php } ?>

                </form> 
      </div>
 
    </div>
  </div>
</div>
         <!--nav bar end -->
        <?php if ($this->flexi_auth->is_admin()) { ?>
            <div class="navbar navbar-inner navbar-form">              
                <div class="navbar navbar-fixed">
                    <ul class="nav"> 
                        <li class=""><a href="<?php echo base_url(); ?>index.php/auth_admin/">Consultant</a></li>

                        <li class=""> <a href="<?php echo base_url(); ?>index.php/auth_admin/manage_user_groups">Manage User Groups</a>			
                        </li>                   
                        <li class=""><a href="<?php echo base_url(); ?>index.php/auth_admin/manage_privileges">Manage User Privileges</a>			
                        </li>         
                        <li class=""><a href="<?php echo base_url(); ?>index.php/addJobAdvert">add job advert</a>
                        </li>
                        <li class=""><a href="<?php echo base_url(); ?>index.php/ranking">rank Candidates</a>
                        </li>
                        <li class=""><a href="<?php echo base_url(); ?>invoice/index.php/dashboard">Invoice</a>	
                    </ul>


                </div>



            </div>

        <?php } else { ?>


        <?php } ?> 
        <?php if (!$this->flexi_auth->is_admin() && $this->flexi_auth->is_logged_in_via_password()) { ?>
            <div class="navbar navbar-inner navbar-form">              
                <div class="navbar navbar-fixed">
                    <ul class="nav"> 

                        <li><a href="<?php echo base_url(); ?>index.php/auth_public/">public</a></li>


                        <li><a href="<?php echo base_url(); ?>index.php/upload">Upload Cv/Documents</a></li>
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">update user details<b class="caret"></b></a>

                            <ul class="dropdown-menu">

                                <li class=""><a href="<?php echo base_url(); ?>index.php/auth_public/update_account"></li>Update Account Details</a>

                                <li class=""><a href="<?php echo base_url(); ?>index.php/auth_public/update_email"></li>Update Email Address</a>

                                <li class=""><a href="<?php echo base_url(); ?>index.php/auth_public/change_password"></li>Update Password</a>
                                </div>					


                                </div>
                                <br>
                                <ul class="nav pull-right ">
                                    <label for="first_name"><h4>Welcome <?php echo set_value('update_first_name', $user['upro_first_name']); ?> <?php echo set_value('update_last_name', $user['upro_last_name']); ?></h4>
                                        <?php $this->session->userdata('name'); ?>

                                </ul>  



                            <?php } else { ?>


                            <?php } ?> 


                            <div  style = "background: url('<?php echo base_url(); ?>assets/img/52.gif');">
                                <div class="container-fluid">
                                    <div class="row-fluid">
                                        <!--<div class="span2"></div>-->
                                       
                                        <div class="span12">
                                            <!--Body content-->
                                            <?php $this->load->view($content, $view_data); ?>
                                            <?php echo isset($info) ? $info : null; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!--                                                <div class='container'>
                                                                                    <div class='accordion well span8' id='accordion2'>
                                                                                      
                                                                                    </div>
                                                                                </div>-->

                                <div class="navbar-inner">

                                    <div id="Copyright " style="color: white">
                                        <center><p>Copyright &copy; <?php echo date("Y"); ?> Zero One Solutions </p></center>
                                    </div>
                                </div>

                            </div>
                            <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.1.min.js"></script>
                            <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
                            <script src="<?php echo base_url(); ?>assets/js/jqBootstrapValidation.js"></script>
                            <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
                            <script src="<?php echo base_url() ?>assets/js/site.js"></script>
                            <script src="<?php echo base_url() ?>assets/js/ajaxfileupload.js"></script>
                            <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
                            <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
                            <script>
                                $(function() {
                                    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
                                });
                            </script>

                            </body>
                            </html>
