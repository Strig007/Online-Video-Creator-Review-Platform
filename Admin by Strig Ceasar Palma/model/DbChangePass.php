<?php

    require 'DbConnect.php';

    function updatePassword ($username, $password)
    {
        $conn = connect();
        $sql = $conn->prepare("UPDATE admindata SET Password = ? WHERE UserName = ?");
        $sql->bind_param("ss", $password, $username);
        return $sql->execute();
    }   
?>