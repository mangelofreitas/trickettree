<?php


    function getConn(){

        require_once("dbconnection.php");
        return createConn();
        /*if (isset($_SESSION['conn'])){
            $conn = $_SESSION['conn'];

            return $conn;
        }

        return NULL;*/

    }

    function addUser($id_facebook,$username,$email,$profile_picture){


        $conn = getConn();

        if ($conn){


            if (!($stmt = $conn->prepare("INSERT INTO `users` (`ID_FACEBOOK`,`USERNAME`,`EMAIL`,`PROFILE_PICTURE`) VALUES (?,?,?,?)"))) {
                echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            }


            /* Prepared statement, stage 2: bind and execute */

            if (!$stmt->bind_param('isss', $id_facebook,$username,$email,$profile_picture)) {
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

            $final_array = array();

            if ($results){

                if ($results->num_rows > 0) {
                    // output data of each row
                    while($row = $results->fetch_assoc()) {


                        $data_json = array(
                                        "id" => $row["ID"],
                                        "username" => $row["USERNAME"],
                                        "id_facebook" => $row["ID_FACEBOOK"],
                                        "email" => $row["EMAIL"],

                                        );
                        array_push($final_array,$data_json);
                    }

                    return $final_array;
                } else {
                    return NULL;
                }

            }
            else {
                return NULL;
            }

        }

    }


    function readUserFromFacebookID($id_facebook) {

        $conn = getConn();

        if ($conn){

            $stmt = $conn->prepare("SELECT * from `users` where `id_facebook` = ?;");

            if (!$stmt->bind_param('i', $id_facebook)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            $results = $stmt->get_result();

            $final_array = array();

            if ($results->num_rows > 0) {
                // output data of each row

                while($row = $results->fetch_assoc()) {

                    $data_json = array(
                                    "username" => $row["USERNAME"],
                                    "id_facebook" => $row["ID_FACEBOOK"],
                                    "email" => $row["EMAIL"],

                    );

                    array_push($final_array,$data_json);

                }
            return $final_array;
            } else {}
        }
        return NULL;
    }

    function readUserfromName($username) {

        $conn = getConn();

        if ($conn){

            $stmt = $conn->prepare("SELECT * from `users` where `username` = ?;");

            if (!$stmt->bind_param('s', $username)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            $results = $stmt->get_result();


            $final_array = array();

            if ($results->num_rows > 0) {
                // output data of each row

                while($row = $results->fetch_assoc()) {

                    $data_json = array(
                                    "username" => $row["USERNAME"],
                                    "id_facebook" => $row["ID_FACEBOOK"],
                                    "email" => $row["EMAIL"],

                    );

                    array_push($final_array,$data_json);



                }
            } else {
                echo "0 results";
            }

            return $final_array;

        }

    }


    function createNodeSons($id_node,$id_son){

        $conn = getConn();

        if ($conn){

            if (!($stmt = $conn->prepare("INSERT INTO `node_sons` (`id_node`,`id_son`) VALUES (?,?)"))) {
                echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            }

            if (!$stmt->bind_param('ii',$id_node,$id_son)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }


            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;

            }
            $stmt->close();

        }

    }

    function getLastNode(){
        $conn = getConn();

        if ($conn){

            $results = $conn->query("SELECT * from `node` order by `ID` DESC limit 1;");


            if ($results){
                if ($results->num_rows > 0) {
                    // output data of each row
                    while($row = $results->fetch_assoc()) {

                        return $row["ID"];
                    }

                } else {
                    return NULL;
                }

            }
            else {
                return NULL;
            }

        }

    }

    function createNode($id_user,$id_father,$name,$description){

        $conn = getConn();

        if ($conn){

            if (!($stmt = $conn->prepare("INSERT INTO `node` (`id_user`,`id_father`,`name`,`description`) VALUES (?,?,?,?)"))) {
                echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            }

            if (!$stmt->bind_param('iiss',$id_user,$id_father,$name,$description)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            $id_son = getLastNode();
            if ($id_father != NULL){
                createNodeSons($id_father,$id_son);
            }

            $stmt->close();

        }
    }

function readUserandNode($id_node){

    $conn = getConn();
    if ($conn){
            if (!($stmt = $conn->prepare("SELECT `likes`,`deslike`,`name`, `id_user` from `node` where `id` = ?;"))) {
                echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            }

            if (!$stmt->bind_param('i',$id_node)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }


            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            
            $stmt->bind_result($likes,$dislikes,$name,$user);


            if($stmt->fetch()) 
            {
                $array = readUserFromFacebookID($user);
                $arr = array('idea' => $name, 'likes' => $likes, 'dislikes' => $dislikes, "username" => $array[0]['username'], "parents"=> array());
                return $arr;
            }

        }
    }

    function readNodeSons($id_node){

        $conn = getConn();

        if ($conn){

            if (!($stmt = $conn->prepare("SELECT `id_son` FROM `node_sons` where id_node =  ?;"))) {
                echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            }

            if (!$stmt->bind_param('i',$id_node)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }


            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            $stmt->bind_result($id_son);

            $array_sons = array();

            while($stmt->fetch()) {

                $array_son = readNodeSons($id_son);

                array_push($array_sons,$array_son);


            }
            //select likes,dislikes,name,username.name from `node`,(select `name`,'id_facebook' from users) AS username where id_node = ? and username.id_facebook = id_node;

            $node_and_user = readUserandNode($id_node);
            $node_and_user['parents'] = $array_sons;

            //SELECT id_node (father)
            //vou buscar info necessaria para coloccar no array

            #$info = readNode($id_node);
            #info_user = readUser($id_user);


            #$arr = array('idea' => $info["nome"], 'likes' => $info["likes"], 'dislikes' => $info["dislikes"],"username":=>$info_user["username"], "parents"=>$array_sons);

            return $node_and_user;

            $stmt->close();

        }
    }


    function createTree($id_raiz,$deadline,$id_user){

        $conn = getConn();

        if ($conn){

            if (!($stmt = $conn->prepare("INSERT INTO `tree` (`id_raiz`,`deadline`,`id_user`) VALUES (?,?,?)"))) {
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
