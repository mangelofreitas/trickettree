<?php
	session_start();
	//verify the connection to database
    include('dbconnection.php');
    if(!isset($_SESSION['loggedin']))
    {
        include('login_callback.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Creative - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <?php include('headergreen.php') ?>
<section id="services">
    <div class="container">
      <div class="span3 well">
          <center>
          <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src=<?php echo $_SESSION['picture'] ?> name="aboutme" width="140" height="140" class="img-circle"></a>
          <h3><?php echo $_SESSION['name'] ?></h3>
          <em>click my face for more</em>
  		</center>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                      <h4 class="modal-title" id="myModalLabel">More About <?php echo $_SESSION['name'] ?></h4>
                      </div>
                  <div class="modal-body">
                      <center>
                      <img src=<?php echo $_SESSION['picture'] ?> name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                      <h3 class="media-heading"><?php echo $_SESSION['name'] ?> Sixpack <small>USA</small></h3>
                      <span><strong>Skills: </strong></span>
                          <span class="label label-warning">HTML5/CSS</span>
                          <span class="label label-info">Adobe CS 5.5</span>
                          <span class="label label-info">Microsoft Office</span>
                          <span class="label label-success">Windows XP, Vista, 7</span>
                      </center>
                      <hr>
                      <center>
                      <p class="text-left"><strong>Bio: </strong><br>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem dui, tempor sit amet commodo a, vulputate vel tellus.</p>
                      <br>
                      </center>
                  </div>
                  <div class="modal-footer">
                      <center>
                      <button type="button" class="btn btn-default" data-dismiss="modal">I've heard enough about Joe</button>
                      </center>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>
