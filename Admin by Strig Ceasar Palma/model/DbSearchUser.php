<?php

    require 'DbConnect.php';

    function getAllUsersInformations()
    {
        $conn = connect();
        $sql =  $conn->prepare("SELECT firstname, lastname, gender, dob, email,
        username, favourites FROM userdata");
        $sql->execute();
        $res = $sql->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    function getOne($username)
    {
        $conn = connect();
        $sql =  $conn->prepare("SELECT firstname, lastname, gender, dob, email,
        username, favourites FROM userdata WHERE username = ?");
        $sql->bind_param("s", $username);
        $sql->execute();
        $res = $sql->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

?>