<?php
<<<<<<< HEAD
    if(isset($_SESSION['conn']))
    {
=======

    include('queries.php');

    if(!isset($_SESSION['conn'])){


>>>>>>> origin/master
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "teste";
        // Create connection
        $conn = new mysqli($servername, $username, $password,$dbname);
        
        if ($conn->ping()) 
        {
            $_SESSION['conn'] = $conn;
        }
    }
<<<<<<< HEAD
    
?>
=======
    #readUsers();
    #addUser("JONAS","phpcenas");
    #readUserfromID(2);
    #readUserfromName("Telmo");
    #createNode('FUCKING IDEA',NULL);
    #createTree(1,'',2)

    #createUserNodeRelation(2,1);


?>
>>>>>>> origin/master
