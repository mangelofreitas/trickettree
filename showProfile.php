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

    <?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shifttree";
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $q = isset($_GET['q'])?$_GET['q'] : null;
    
    $search_sql = "SELECT USERNAME, PROFILE_PICTURE FROM USERS WHERE ID_FACEBOOK = $q";
    $result = $conn->query($search_sql);
    while ($row = $result->fetch_assoc()) {
      $_SESSION['userSearched'] = $row['USERNAME'];
      $_SESSION['profilePhotoSearched'] = $row['PROFILE_PICTURE'];
      

    }

  ?>

    <?php include('headergreen.php') ?>

    <section id="services">
    <div class="container">
      <div style="background-image:url(<?php echo $_SESSION['profilePhotoSearched'] ?> )" class="profile-image span3 well">
          <center>
          <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src=<?php echo $_SESSION['profilePhotoSearched'] ?> name="aboutme" width="140" height="140" class="img-circle"></a>
          <h3><?php echo $_SESSION['userSearched'] ?></h3>
          <em>click my face for more</em>
          <p></p>
          <em>Give your feedback on <?php echo $_SESSION['userSearched'] ?></em>
          <p></p>
          <button type="button" class="btn btn-default btn-sm">
              <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="color:rgb(43,222,115)"></span> Upvote
          </button>
          <button type="button" class="btn btn-default btn-sm">
              <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true" style="color:rgb(255,0,0)"></span> Downvote
          </button>
      </center>

      </div>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                      <h4 class="modal-title" id="myModalLabel">More About <?php echo $_SESSION['userSearched'] ?></h4>
                      </div>
                  <div class="modal-body">
                      <center>
                      <img src=<?php echo $_SESSION['profilePhotoSearched'] ?> name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                      <h3 class="media-heading"><?php echo $_SESSION['name'] ?> <small></small></h3>
                      <span><strong>Skills: </strong></span>
                          <span class="label label-warning">HTML5/CSS</span>
                          <span class="label label-info">Adobe CS 5.5</span>
                          <span class="label label-info">Microsoft Office</span>
                          <span class="label label-success">Windows XP, Vista, 7</span>

                      </center>
                      <p></p>
                      <center>
                        <span><button type="button" class="btn btn-sm btn-primary"> Add more </button></span>
                      </center>
                      <hr>
                      <center>
                      <p class="text-left"><strong>Bio: </strong><br>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem dui, tempor sit amet commodo a, vulputate vel tellus.</p>
                      <br>
                      </center>
                      <center>
                        <span><button type="button" class="btn btn-sm btn-primary"> Edit bio </button></span>
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
<center>
  <h3> Projects Involved </h3>
</center>
<section class="no-padding" id="portfolio">
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-lg-4 col-sm-6">
                <a href="#" class="portfolio-box">
                    <img src="img/portfolio/1.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Category
                            </div>
                            <div class="project-name">
                                Project Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="#" class="portfolio-box">
                    <img src="img/portfolio/2.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Category
                            </div>
                            <div class="project-name">
                                Project Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="#" class="portfolio-box">
                    <img src="img/portfolio/3.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Category
                            </div>
                            <div class="project-name">
                                Project Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="#" class="portfolio-box">
                    <img src="img/portfolio/4.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Category
                            </div>
                            <div class="project-name">
                                Project Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="#" class="portfolio-box">
                    <img src="img/portfolio/5.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Category
                            </div>
                            <div class="project-name">
                                Project Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="#" class="portfolio-box">
                    <img src="img/portfolio/6.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Category
                            </div>
                            <div class="project-name">
                                Project Name
                            </div>
                        </div>
                    </div>
                </a>
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
