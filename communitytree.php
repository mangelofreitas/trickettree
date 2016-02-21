<?php

    session_start();
    require('dbconnection.php');
    require("queries.php");


    addUser(1000,"TELMO","","string");
    addUser(2000,"JOAO","","string");
    addUser(3000,"ANDRE","","string");
    addUser(5000,"Marques","","string");
    addUser(4000,"Hernas","","string");
    addUser(6000,"JOANA","","string");
    addUser(7000,"ANTonio","","string");
    addUser(8000,"FONSECA","","string");

    createNode("FANTASTIC IDEAs",NULL);
    createNode("Intelegent IDEAs",NULL);
    createNode("DAMMIT IDEAs",NULL);
    createNode("Wonderful IDEAs",NULL);

    createUserNodeRelation(1,1);
    createUserNodeRelation(2,2);
    createUserNodeRelation(3,3);
    createUserNodeRelation(4,4);
    $x = (new \DateTime());

    createTree(2,$x,6);

    $json_data = readTree(1);






?>








<!DOCTYPE html>
<meta charset="utf-8">
<style>

text {
  font-family: "Helvetica Neue", Helvetica, sans-serif;
}

.name {
  font-weight: bold;
}

.about {
  fill: #777;
  font-size: smaller;
}

.link {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}

</style>

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

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.php" style="color:rgb(43,222,115)">Tree Baking</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.php" style="color:rgb(43,222,115)">Notifications</a></li>
                    <div class="col-sm-3 col-md-3">
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input style="background-color:transparent;border-color:transparent" type="text" class="form-control" placeholder="Search a Tree">
                            </div>
                        </form>
                    </div>
                    <li class="active"><a href="communitytree.php" style="color:rgb(43,222,115)">Community Tree</a></li>
                    <li class="active"><a href="treecreation.php" style="color:rgb(43,222,115)">Create Tree</a></li>
                    <li class="login"><a style="color: rgb(58, 87, 149)" href="profile.html">Login with <i style="font-size:18px;padding-left:10px" class="fa fa-facebook"></i> </a></li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


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


    <script src="//d3js.org/d3.v3.min.js"></script>
    <script type="text/javascript" src="js/treeData.js"></script>


</script>
