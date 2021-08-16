<?php
    include 'DbConnect.php';

    function isExist ($name)
    {
        $conn = connect();
        $sql =  $conn->prepare("SELECT * FROM creatordata WHERE name = ?");
        $sql->bind_param("s", $name);
        $sql->execute();
        $res = $sql->get_result();
        return $res->num_rows === 1;
    }

    function removeCreator ($name)
    {
        $conn = connect();
        $sql = $conn->prepare("DELETE FROM creatordata WHERE name = ?");
        $sql->bind_param("s", $name);
        return $sql->execute();
    }
?>