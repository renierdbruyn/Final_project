<!--<div id="login_form">
    <h1>Please Login</h1>
<?php
//    echo form_open('login/validate_credentials');
//    echo form_input('username', 'Username'); echo br();
//    echo form_password('password', 'Password');echo br();
//    echo form_submit('submit', 'Login');echo br();
//    echo anchor('login/signup', 'Create Account');
?>
    
    
</div>-->

        <style type="text/css">
            /* Override some defaults */
            
            .container {
                width: 300px;
            }

            /* The white background content wrapper */
            .container > .content {
                background-color: #f0f0f0;
                padding: 20px;
                margin: 50px -20px; 
                -webkit-border-radius: 10px 10px 10px 10px;
                -moz-border-radius: 10px 10px 10px 10px;
                border-radius: 10px 10px 10px 10px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
            }

            .resetpassword_form {
                margin-left: 65px;
            }

            legend {
                margin-right: -50px;
                font-weight: bold;
                color: #404040;
            }


        </style>
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="login-form">
                        <h2>RESET PASSWORD</h2>
<!--                        <div class="alert">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Warning!</strong> Best check yo self, you're not looking too good.
                        </div>-->

                        <?php echo form_open('login/resetpassword'); ?>
                            <fieldset>
                                
                                <div class="clearfix">
                                <?php   echo form_input('email', set_value('email')); echo br(); ?>

                                </div>
                                
                                
                                
                                <button class="btn btn-primary" type="submit">Retrieve User Password</button> 
                                 
                                
                            </fieldset>
                    </div>
                </div>
            </div>
        </div> <!-- /container -->