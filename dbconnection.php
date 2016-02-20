

<?php

    include('queries.php');

    if(isset($_SESSION['conn']))
    {
        echo "DAMMIT";
    }

    else {

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
    #readUsers();
    #addUser("JONAS","phpcenas");
    #readUserfromID(2);
    #readUserfromName("Telmo");
    createNode('FUCKING IDEA',NULL);
    createTree(1,'',2)
?>
