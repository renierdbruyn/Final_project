<!doctype html>

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
                width: 1425px;
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
                /*                background-image: linear-gradient(to bottom,transparent,lightseagreen);*/

                -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
                -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
            }
            .navbar-inner {
                min-height: 50px;
                padding-right: 20px;
                padding-left: 20px;
                background-color:#2c3s15;
                background-image: -moz-linear-gradient(top, #2c3e50, #2c3e50);
                background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#2c3e50), to(#2c3e50));
                background-image: -webkit-linear-gradient(top, #2c3e50, #2c3e50);
                background-image: -o-linear-gradient(top, #2c3e50, #2c3e50);
                background-image: linear-gradient(to bottom,#2c3s15, #2c3s15);
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
                echo form_open('search/execute_normal_search');

                echo form_input(array('name' => 'search'));

                echo form_submit('search_submit', 'SEARCH JOB', 'class="btn btn-primary "');

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
<li class=""><a href="<?php echo base_url(); ?>index.php/auth_admin/manage_user_accounts">Update applicant account</a></li>

                        <li class=""> <a href="<?php echo base_url(); ?>index.php/auth_admin/manage_user_groups">Update User Roles</a>			
                        </li>                   
                        <li class=""><a href="<?php echo base_url(); ?>index.php/auth_admin/manage_privileges">Update Applicant/Consultant Privileges</a>			
                        </li>         
                        <li class=""><a href="<?php echo base_url(); ?>index.php/addJobAdvert">Add Job Advert</a>
                        </li>
                        <li class=""><a href="<?php echo base_url(); ?>index.php/ranking">Rank Candidates</a>
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

                        <li><a href="<?php echo base_url(); ?>index.php/auth_public/">Public</a></li>


                        <li><a href="<?php echo base_url(); ?>index.php/upload">Upload Cv/Documents</a></li>
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Update user details<b class="caret"></b></a>

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
                                <div class='container'>
                                    <div class='accordion well span15' id='accordion2'>
                                        <div class="container">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span2">
                        <!--Sidebar content-->
                        <?php $this->load->view('login/admin/consultant_sidebar'); ?>
                    </div>

                    <div class="span10">
                        <!--Body content-->

<div class="container">
    <div class="row-fluid">
        <div class="span6">
                                        <h2>User Accounts</h2>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url());	?>
					
						<label for="search">Search for user:</label>
						<input type="text" id="search"  name="search_query" value="<?php echo set_value('search_users ',$search_query);?>" class="tooltip_trigger"
							title="Searches for users by email, first name and last name."
						/>
						<input type="submit" name="search_users" value="Search" class="link_button"/>
						<a href="<?php echo base_url(); ?>index.php/auth_admin/manage_user_accounts" class="btn btn-primary">Reset</a>
						
					
				<?php echo form_close();?>
			
				<?php echo form_open(current_url());	?>
					<table class="table table-bordered table-condensed table-striped"BORDER="1px"  WIDTH="1%"   CELLPADDING="2" CELLSPACING="2">
                                            
						<thead>
							<tr>
								<th class="spacer">Email</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th class="spacer_200 align_ctr tooltip_trigger"
									title="Indicates the user role the user belongs to.">
									User role
								</th>
								<th class="spacer_400 align_ctr tooltip_trigger"
									title="Update the access privileges of users.">
									User Privileges
								</th>
								<th class="spacer_400 align_ctr tooltip_trigger"
									title="If checked, the users account will be locked and they will not be able to login.">
									Account Suspended
								</th>
								<th class="spacer_400 align_ctr tooltip_trigger" 
									title="If checked, the row will be deleted upon the form being updated.">
									Delete
								</th>
							</tr>
						</thead>
						<?php if (!empty($users)) { ?>
						<tbody>
							<?php foreach ($users as $user) { ?>
							<tr>
								<td>
									<a href="<?php echo base_url().'index.php/auth_admin/update_user_account/'.$user[$this->flexi_auth->db_column('user_acc', 'id')];?>">
										<?php echo $user[$this->flexi_auth->db_column('user_acc', 'email')];?>
									</a>
								</td>
								<td>
									<?php echo $user['upro_first_name'];?>
								</td>
								<td>
									<?php echo $user['upro_last_name'];?>
								</td>
								<td class="align_ctr">
									<?php echo $user[$this->flexi_auth->db_column('user_group', 'name')];?>
								</td>
								<td class="align_ctr">
									<a href="<?php echo base_url().'index.php/auth_admin/update_user_privileges/'.$user[$this->flexi_auth->db_column('user_acc', 'id')];?>">Update</a>
								</td>
								<td class="align_ctr">
									<input type="hidden" name="current_status[<?php echo $user[$this->flexi_auth->db_column('user_acc', 'id')];?>]" value="<?php echo $user[$this->flexi_auth->db_column('user_acc', 'suspend')];?>"/>
									<!-- A hidden 'suspend_status[]' input is included to detect unchecked checkboxes on submit -->
									<input type="hidden" name="suspend_status[<?php echo $user[$this->flexi_auth->db_column('user_acc', 'id')];?>]" value="0"/>
								
								<?php if ($this->flexi_auth->is_privileged('Update Users')) { ?>
									<input type="checkbox" name="suspend_status[<?php echo $user[$this->flexi_auth->db_column('user_acc', 'id')];?>]" value="1" <?php echo ($user[$this->flexi_auth->db_column('user_acc', 'suspend')] == 1) ? 'checked="checked"' : "";?>/>
								<?php } else { ?>
									<input type="checkbox" disabled="disabled"/>
									<small>Not Privileged</small>
									<input type="hidden" name="suspend_status[<?php echo $user[$this->flexi_auth->db_column('user_acc', 'id')];?>]" value="0"/>
								<?php } ?>
								</td>
								<td class="align_ctr">
								<?php if ($this->flexi_auth->is_privileged('Delete Users')) { ?>
									<input type="checkbox" name="delete_user[<?php echo $user[$this->flexi_auth->db_column('user_acc', 'id')];?>]" value="1"/>
								<?php } else { ?>
									<input type="checkbox" disabled="disabled"/>
									<small>Not Privileged</small>
									<input type="hidden" name="delete_user[<?php echo $user[$this->flexi_auth->db_column('user_acc', 'id')];?>]" value="0"/>
								<?php } ?>
								</td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="7">
									<?php $disable = (! $this->flexi_auth->is_privileged('Update Users') && ! $this->flexi_auth->is_privileged('Delete Users')) ? 'disabled="disabled"' : NULL;?>
									<input type="submit" name="update_users" value="Update / Delete Users" class="btn btn-primary" <?php echo $disable; ?>/>
								</td>
							</tr>
						</tfoot>
					<?php } else { ?>
						<tbody>
							<tr>
								<td colspan="7" class="highlight_red">
									No members are available.
								</td>
							</tr>
						</tbody>
					<?php } ?>
					</table>
					
				<?php if (! empty($pagination['links'])) { ?>
					<div id="pagination" class="w100 frame">
						<p>Pagination: <?php echo $pagination['total_users'];?> users match your search</p>
						<p>Links: <?php echo $pagination['links'];?></p>
					</div>
				<?php } ?>
                                    </div>
                                </div>
</div>
    </div>
</div>

</div> <!--end container -->
                </div>
                
            </div>
        </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                  
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

