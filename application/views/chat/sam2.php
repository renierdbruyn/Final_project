
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="http://localhost/ci/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="http://localhost/ci/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="http://localhost/ci/bootstrap/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://localhost/ci/bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://localhost/ci/bootstrap/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://localhost/ci/bootstrap/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="http://localhost/ci/bootstrap/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="Email">
              <input class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
         <h1>Home</h1>
<!--   <h2>Welcome <?php echo $obj->userdata['username']; ?>!</h2>-->
  
You can <a href="http://localhost/ci/index.php/welcome/users">see the list of users</a>.<br /><br />
<?php
//If the user is logged, we display links to edit his infos, to see his pms and to log out
if(isset($obj->userdata['username']))
{
//We count the number of new messages the user has
$nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="'.$obj->userdata['username'].'" and user1read="no") or (user2="'.$obj->userdata['userid'].'" and user2read="no")) and id2="1"'));
//The number of new messages is in the variable $nb_new_pm
$nb_new_pm = $nb_new_pm['nb_new_pm'];
//We display the links
?>

<a href="welcome/edit">Edit my personnal informations</a><br />
<a href="welcome/load_list">My personnal messages(<?php echo $nb_new_pm; ?> unread)</a><br />
 <a href="home1/logout">Logout</a>
    </div>

 </body>
 <footer class="footer" style="background-color:#c2c2c2"><div class="foot"><a href="home1">MINDZPARK</a></div></footer>		
</html>
<?php
}
else
{
//Otherwise, we display a link to log in and to Sign up
?>
<a href="http://localhost/ci/index.php/welcome/signups">Sign up</a><br />
     <?php echo validation_errors(); ?>
   <?php echo form_open('welcome/verify'); ?>
    <div class="control-group">
        <?php echo $msg;?>
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
    <input type="text" d="username" name="username" placeholder="Email">
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
    <input type="password"  id="passowrd" name="password" placeholder="Password">
    </div>
    </div>
    <div class="control-group">
    <div class="controls">
    
    <button type="submit" value="login" class="btn">Sign in</button>
    </div>
    </div>
    </form>
         </div>
      
         	<footer class="footer" style="background-color:#c2c2c2"><div class="foot"><a href="home1">Mindzpark</a></div></footer>	
	</body>
        
</html>
<?php
}
?>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://localhost/ci/bootstrap/js/jquery.js"></script>
    <script src="http://localhost/ci/bootstrap/js/bootstrap-transition.js"></script>
    <script src="http://localhost/ci/bootstrap/js/bootstrap-alert.js"></script>
    <script src="http://localhost/ci/bootstrap/js/bootstrap-modal.js"></script>
    <script src="http://localhost/ci/bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="http://localhost/ci/bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="http://localhost/ci/bootstrap/js/bootstrap-tab.js"></script>
    <script src="http://localhost/ci/bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="http://localhost/ci/bootstrap/js/bootstrap-popover.js"></script>
    <script src="http://localhost/ci/bootstrap/js/bootstrap-button.js"></script>
    <script src="http://localhost/ci/bootstrap/js/bootstrap-collapse.js"></script>
    <script src="http://localhost/ci/bootstrap/js/bootstrap-carousel.js"></script>
    <script src="http://localhost/ci/bootstrap/js/bootstrap-typeahead.js"></script>

  </body>
</html>
