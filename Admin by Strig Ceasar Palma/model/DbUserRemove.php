<?php
    include 'DbConnect.php';

    function isExist ($username)
    {
        $conn = connect();
        $sql =  $conn->prepare("SELECT * FROM userdata WHERE username = ?");
        $sql->bind_param("s", $username);
        $sql->execute();
        $res = $sql->get_result();
        return $res->num_rows === 1;
    }

    function removeUser ($username)
    {
        $conn = connect();
        $sql = $conn->prepare("DELETE FROM userdata WHERE username = ?");
        $sql->bind_param("s", $username);
        return $sql->execute();
    }
?>