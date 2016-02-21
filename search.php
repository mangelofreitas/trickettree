<?php
	session_start();
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shifttree";
    $user=$_SESSION['id'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $searchName = isset($_POST['searchName'])?$_POST['searchName'] : null;
    $search_sql = "SELECT USERNAME FROM USERS WHERE USERNAME LIKE '%".$searchName."%'";
    $result = $conn->query($search_sql);
    while ($row = $result->fetch_assoc()) {
        echo $row['USERNAME']."<br>";
    }

    //header("Location:index.php");
?>