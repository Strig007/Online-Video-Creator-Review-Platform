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

    function updateCreator ($name, $dob, $channel)
    {
        $conn = connect();
        $sql = $conn->prepare("UPDATE creatordata SET name = ? , dob = ? , channelLink = ? 
        WHERE name = ?");
        $sql->bind_param("ssss", $name, $dob, $channel, $name);
        return $sql->execute();
    }
?>