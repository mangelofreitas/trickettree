<?php

    function getConn(){

        if (isset($_SESSION['conn'])){
            $conn = $_SESSION['conn'];

            return $conn;
        }

        return NULL;

    }


    function addUser($name, $description){


        $conn = getConn();

        if ($conn){


            if (!($stmt = $conn->prepare("INSERT INTO `shifttree`.`users` (`username`,`description`) VALUES (?,?)"))) {
                echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            }


            /* Prepared statement, stage 2: bind and execute */

            if (!$stmt->bind_param('ss', $name,$description)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }


            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            $stmt->close();

        }

    }


    function readUsers(){

        $conn = getConn();

        if ($conn){
            $results = $conn->query("SELECT * FROM `users`");
            if ($results->num_rows > 0) {
                // output data of each row
                while($row = $results->fetch_assoc()) {
                    echo "id: " . $row["ID"]. " - Name: " . $row["USERNAME"]. "<br>";
                }
            } else {
                echo "0 results";
            }
        }

    }

    function readUserfromID($id) {

        $conn = getConn();

        if ($conn){

            $stmt = $conn->prepare("SELECT * from `shifttree`.`users` where `id` = ?;");

            if (!$stmt->bind_param('i', $id)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            $results = $stmt->get_result();

            if ($results->num_rows > 0) {
                // output data of each row
                while($row = $results->fetch_assoc()) {
                    echo "id: " . $row["ID"]. " - Name: " . $row["USERNAME"]. "<br>";
                }
            } else {
                echo "0 results";
            }
        }
    }

    function readUserfromName($username) {

        $conn = getConn();

        if ($conn){

            $stmt = $conn->prepare("SELECT * from `shifttree`.`users` where `username` = ?;");

            if (!$stmt->bind_param('s', $username)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            $results = $stmt->get_result();

            if ($results->num_rows > 0) {
                // output data of each row
                while($row = $results->fetch_assoc()) {
                    echo "id: " . $row["ID"]. " - Name: " . $row["USERNAME"]. "<br>";
                }
            } else {
                echo "0 results";
            }
        }
    }


    function createNode($name,$id_father){

        $conn = getConn();

        if ($conn){

            if (!($stmt = $conn->prepare("INSERT INTO `shifttree`.`node` (`name`,`id_father`) VALUES (?,?)"))) {
                echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            }

            if (!$stmt->bind_param('ss',$name, $id_father)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }


            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            $stmt->close();

        }



    }

    function createTree($id_raiz,$deadline,$id_user){

        $conn = getConn();

        if ($conn){


            if (!($stmt = $conn->prepare("INSERT INTO `shifttree`.`tree` (`id_raiz`,`deadline`,`id_user`) VALUES (?,?,?)"))) {
                echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            }

            if ($deadline){
                $deadline = $deadline->format('Y-m-d H:i:s');
            }
            if (!$stmt->bind_param('isi',$id_raiz, $deadline,$id_user)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }


            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            $stmt->close();

        }


    }






?>
