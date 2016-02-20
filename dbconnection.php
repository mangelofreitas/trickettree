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
            echo "DAMMIT THERE IS CONNECTION";
            $_SESSION['conn'] = $conn;
        }

    }





    #addUser(123456,"TELMO","telmo.s@gmail.com","url:cenas");

    readUsers();



?>
