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

    .login-form {
        text-align: center;
        margin-left: 25px;
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
                <h1>Create an account</h1>
                <div class="alert" style=" color: red;">
                    <?php echo form_open('login/create_member'); ?>
                    <fieldset>
                        <legend>Personal Information</legend>  

                        <div class="clearfix">
                            <?php echo form_error('id_number'); ?>
                            <?php echo form_input('id_number', set_value('id_number'), "placeholder='id number'"); ?>
                        </div>
                        <div class="clearfix">
                            <?php echo form_error('first_name'); ?>
                            <?php echo form_input('first_name', set_value('first_name'), "placeholder='First Name'"); ?>
                        </div>
                        <div class="clearfix">
                            <?php echo form_error('last_name'); ?>
                            <?php echo form_input('last_name', set_value('last_name'),"placeholder='Last name'"); ?>
                        </div>
                        <div class="clearfix">
                            <?php echo form_error('email_address'); ?>
                            <?php echo form_input('email_address', set_value('email_address'), "placeholder='Email Address'"); ?>
                        </div>

                        <div class="clearfix">
                            <?php echo form_error('cell-phone_number'); ?>
                            <?php echo form_input('cell-phone_number', set_value('cell-phone_number'),"placeholder='Contact Number'"); ?>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Login Info</legend>  

                        <div class="clearfix">
                            <?php echo form_error('username'); ?>
                            <?php echo form_input('username', set_value('username'),"placeholder='Username'"); ?>
                        </div>
                         <div class="clearfix">
                             <?php echo form_error('password1'); ?>
                            <?php echo form_password('password1', set_value('password1'),"placeholder='Password'"); ?>
                        </div>
                        <div class="clearfix">
                            <?php echo form_error('password2'); ?>
                            <?php echo form_password('password2', set_value('password2'),"placeholder='Confirm Password'"); ?>
                        </div>

                        <button class="btn btn-primary" type="submit">SignUp</button>
                        <?php //echo validation_errors('<p class ="error">'); ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div> <!-- /container -->