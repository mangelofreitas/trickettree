<?php


    //if(!isset($_SESSION['conn'])){

    function createConn()
    {
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
        return $conn;
    }
    
    //}

    //require("queries.php");

    /*addUser(1000,"TELMO","no_email","url_cenas");
    addUser(2000,"JOAO","no_email","url_cenas");
    addUser(3000,"ANDRE","no_email","url_cenas");
    addUser(4000,"ANDRE","no_email","url_cenas");
    addUser(5000,"ANDRE","no_email","url_cenas");
    addUser(6000,"ANDRE","no_email","url_cenas");
    addUser(7000,"ANDRE","no_email","url_cenas");
    addUser(8000,"ANDRE","no_email","url_cenas");
    addUser(9000,"ANDRE","no_email","url_cenas");*/

    

    //$id_user,$id_father,$name,$description
    /*createNode(1000,NULL,"IDEIA 1","cenas");
    createNode(2000,NULL,"IDEIA 2","cenas");
    createNode(3000,NULL,"IDEIA 3","cenas");
    createNode(3000,1,"IDEIA 4","cenas");
    createNode(1000,2,"IDEIA 5","cenas");
    createNode(5000,2,"IDEIA 61","jonas");
    createNode(6000,2,"IDEIA 6","jonas");
    createNode(7000,3,"IDEIA 7","jonas");
    createNode(3000,2,"IDEIA 9","jonas");
*/


?>
