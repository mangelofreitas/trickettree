<?php
	session_start();
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shifttree";
    $user=$_SESSION['id'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    $rootName = isset($_POST['rootName'])?$_POST['rootName'] : null;
    $rootDescription = isset($_POST['rootDescription'])?$_POST['rootDescription'] : null;
    $insert_root_sql = "INSERT INTO NODE (NAME, DESCRIPTION, ID_USER) VALUES ('".$rootName."', '".$rootDescription."',".$user.");";
    $result = $conn->query($insert_root_sql);
    echo $result;
    header("Location:index.php");
?>