
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
        <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="/resources/demos/style.css" />

        <style>
            h2,h1
            {
                font-family: lucida;
            }
            .container,
            .navbar-static-top .container,
            .navbar-fixed-top .container,
            .navbar-fixed-bottom .container {
                width: 2000px;
            }

            .span15 
            {
                width: 1200px;
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
        </style>
        <script>
            $('#myTab a').click(function(e) {
                e.preventDefault();
                $(this).tab('show');
            })
        </script>
    </head>
    <body>

        <div class="navbar navbar-inner navbar-form">
            <div class="nav-collapse collapse">                      
                <ul class="nav">   
                    <form class="pull-left">
                        <img src="<?php echo base_url(); ?>assets/img/999.jpg" class="img-rounded" height="100px" width="450px"/></form>
                    <li class=""><a href="<?php echo base_url(); ?>index.php/site/home"><i></i>Home</a>
                    <li class=""><a href="<?php echo base_url(); ?>index.php/site/services"><i></i>Services</a>
                    <li class=""><a href="<?php echo base_url(); ?>index.php/site/about"><i ></i>About Us</a>
                    <li class=""><a href="<?php echo base_url(); ?>index.php/site/contact"><i></i>Contact Us</a>
                    <li class=""><a href="<?php echo base_url(); ?>index.php/site/advice"><i></i>Career Advice</a>
                </ul>

                <?php
                echo form_open('search/execute_search');
                echo form_input(array('name' => 'search'));
                echo form_submit('search_submit', 'Job Search', 'class="btn btn-primary"');
                echo form_close();
                ?>                     
                <form class="pull-right">  
                    <?php if (!$this->flexi_auth->is_logged_in_via_password()) { ?><a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/auth"><?php echo ($this->flexi_auth->is_logged_in()) ? 'Login via Password' : 'Login'; ?></a>

                    <?php } ?>
                    <?php if (!$this->flexi_auth->is_logged_in()) { ?> <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/auth/register_account">Register</a>


                    <?php } else { ?><a class="btn btn-primary " href="<?php echo base_url(); ?>index.php/auth/logout">Logout</a>
                    <?php } ?>

                </form> 
            </div>
        </div> 

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

                    <ul class="nav pull-right ">
                        <label for="first_name"><h4><?php echo set_value('update_first_name', $user['upro_first_name']); ?> <?php echo set_value('update_last_name', $user['upro_last_name']); ?></h4>
                            </div>



                            </div>

                        <?php } else { ?>


                        <?php } ?> 
                        <?php if ($this->flexi_auth->is_logged_in_via_password()) { ?>
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
                                                 



                                            <?php } else { ?>


                                            <?php } ?> 


                                            <div  style = "background: url('<?php echo base_url(); ?>assets/img/52.gif');">
                                                <div class='container'>
                                                    <div class='accordion well span15' id='accordion2'>
                                                        <div class="container">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span2">
                        <!--Sidebar content-->
                        <?php $this->load->view('profile/applicant_sidebar'); ?>
                    </div>
                
                    <div class="span8">
                        <!--Body content-->

						
					<div class="container">
    <div class="row-fluid">
        <div class="span5">
                    	
				
		<h3>Upload</h3>

                                                        <h3>Your file was successfully uploaded!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

                                                <div class="navbar-inner">

                                                    <div id="Copyright " style="color: white">
                                                        <center><p>Copyright &copy; <?php echo date("Y"); ?> Zero One Solutions </p></center>
                                                   
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
