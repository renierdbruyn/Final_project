<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Master Page</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" type="text/css" media="screen" >
            <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.1.min.js"></script>

            <?php //$this->load->view($style); ?>
            <style type="text/css" >       
                *{ margin:0px; padding: 0px; }
                body{background: #fff;}
                #navcon { background: #fff; width: 100%; height:80px}
                #nav { width: 900px; height: 56px; position: relative; color: #999; font-family:"helvatica";
                       margin:0px auto ; font-size: .9cm; padding-right: 1000%;}
                #nav ul {  list-style-type:none;}
                #nav ul li {float:left; position:relative;}
                #nav ul li a{ border-right: 1px solid #e9e9e9; padding:20px;display:block; text-align:center; color:#999; text-decoration: none; }

                #nav ul li a:hover {background: #12aeef; color:#fff;}

                #nav ul li ul {display : none;}

                #nav ul li:hover ul { display:block; position:absolute;}
                #nav ul li:hover ul li a {background: #6dc7ec; color:#fff; display:block; border-bottom:1px solid #f2f2f2; border-right:none; width:119px;}
                #nav ul li:hover ul li a:hover {background:#999; color:#fff;}

                .top{ border-top:1px solid #f2f2f2;}
                .first{border-left: 1px solid #f2f2f2; }      
            </style>
    </head>
    <body> 
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2">
                    <!--Sidebar content-->
                    <?php echo img('assets/img/ycr.jpg'); ?><!--<image rel="Logo" href="/assets/img/ycr.jpg" width="250px" height="80px"/>-->
                    <?php
                    if ($this->session->userdata('logged_in') === FALSE) {
                        echo "";
                    } else { // its true so..      
                        //
                        ?>
                        </br>
                        </br>
                        </br>
                        </br>
                        </br>
                        </br>
                        </br>
                        </br>
                        <ul class="nav nav-list well">
                            <li class="nav-header">Update Profile</li>
                            <li><a href="<?php echo base_url(); ?>index.php/profile/index">Personal</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/profile/school">School</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/profile/skill">Skills</a></li>
                            <?php
//                            $query = $this->db->get_where('school', array('id_number' => $this->session->userdata('id_number')))->result();
//                            foreach ($query as $row) {
//                                $highest_level = $row->highest_level;
//                                $matric_type = $row->matric_type;
//                            }
//                            if ($matric_type != "null" && isset($matric_type)) {
                                ?>
<!--                                <li><a href="<?php echo base_url(); ?>index.php/profile/school_subject">School subjects</a></li>
                            <?php // } elseif ($matric_type == "null") {
                                ?>
                                <li></li>-->

    <?php // } ?>
                            <!--   <li><a href="#">Settings</a></li>
                              <li class="divider"></li>
                              <li><a href="#">Help</a></li>-->
                        </ul>
    <?php
}
?>

                </div>
                <div class="span10">
                    <div id="nav">                    
                        <ul>   


                            <li class="first"><?php echo anchor('welcome/index', 'Home'); ?> </li>
                            <!--<li><?php //echo anchor('site/index', 'Crud');                      ?></li>-->
<?php
//                            if ($this->session->userdata('logged_in') === FALSE) {
//                                echo "";
//                            } else {
?>
                            <!--                                <li><?php // echo anchor('profile/index', 'online cv');     ?>
                                                                <ul>
                                                                    <li><?php // echo anchor('profile/index', 'Personal Details');      ?></li>
                                                                    <li><?php // echo anchor('profile/school', 'School Details');      ?></li>
                                                                    <li><?php // echo anchor('profile/skill', 'Skills');      ?></li>
                                                                </ul>
                                                            </li>-->
<?php
//                            }
?>
                            <li class="top"><a href="#">Submit CV</a>
                                <ul>                           
                                    <li><?php echo anchor('upload/index', 'Uploads'); ?></li>
                                    <li><?php echo anchor('blogs/index', 'Latest Jobs'); ?> </li>
                                </ul>
                            </li>
                            <li><?php echo anchor('Contact/index', 'Contact'); ?> </li>
                        </ul>
                        <form class="navbar-form pull-left" action="<?php echo base_url(); ?>index.php/Search/execute_search" >
  <input type="text" name="search" class="span8" >
  <button type="submit" class="btn">Submit</button>
</form>
                    </div> <!-- /nav -->

                    </br>
                    <div>
<?php
if ($this->session->userdata('logged_in') === FALSE) {
    echo anchor('login/index', "Login");
} else { // its true so..
    echo "";
}
?> <?php
                        if ($this->session->userdata('logged_in') === FALSE) {
                            echo "";
                        } else { // its true so..
                            echo anchor('login/logout', "Logout");
                        }//echo isset($this->session->userdata('not_set') ) ? anchor('login/logout', "Logout") : NULL; 
                        ?>
                    </div>


                    <br/>

<?php $this->load->view($content);
?>
                    </br>

                </div>
            </div>
        </div>
    </body>

</html>
