<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    //verify the connection to database
    include('dbconnection.php');
    if(!isset($_SESSION['loggedin']))
    {
        include('login_callback.php');
    }
?>

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

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shifttree";
    $user=$_SESSION['id'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $searchName = isset($_POST['searchName'])?$_POST['searchName'] : null;
    $search_sql = "SELECT ID_FACEBOOK, USERNAME, PROFILE_PICTURE FROM USERS WHERE USERNAME LIKE '%".$searchName."%'";
    $result = $conn->query($search_sql);
    while ($row = $result->fetch_assoc()) {
        $idFacebook = $row['ID_FACEBOOK'];
        $usr = $row['USERNAME'];

        echo "<a href=showProfile.php?q=$idFacebook>$usr</a>";
        $profilePhoto = $row['PROFILE_PICTURE'];
        echo "<a href=showProfile.php?q=$idFacebook> <img src=$profilePhoto> </a>";

    }
    echo $idFacebook;
    


    //header("Location:index.php");
?>


    <section id="services">
    <div class="container">
      <div style="background-image:url(<?php echo $_SESSION['picture'] ?> )" class="profile-image span3 well">
          <center>
          <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src=<?php echo $_SESSION['picture'] ?> name="aboutme" width="140" height="140" class="img-circle"></a>
          <h3><?php echo $_SESSION['name'] ?></h3>
          <em>click my face for more</em>
                    <p></p>
                    <em>Give your feedback on <?php echo $_SESSION['name'] ?></em>
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
