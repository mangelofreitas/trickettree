<?php



    include('queries.php');

    if(!isset($_SESSION['conn'])){


        $servername = "localhost";
        $username = "root";
        $password = "";

        $dbname = "shifttree";

        // Create connection
        $conn = new mysqli($servername, $username, $password,$dbname);

        if ($conn->ping())
        {
            $_SESSION['conn'] = $conn;
        }
    }

?>
