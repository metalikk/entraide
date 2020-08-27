<?php
require_once(dirname(__FILE__) . "/../configs/database.php");


function getUser($user_id){

    global $db;

    $req = $db->prepare("SELECT * FROM user WHERE id = :user_id");
    $req->bindParam(":user_id", $user_id);
    $req->execute();

return $result = $req->fetch(PDO::FETCH_ASSOC);

}


?>