<?php
    function getAll()
    {
        $conn = connect();
        $sql =  $conn->prepare("SELECT name FROM creatordata");
        $sql->execute();
        $res = $sql->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    function getAllCreator()
    {
        $conn = connect();
        $sql =  $conn->prepare("SELECT name, dob, channelLink, rating, review
        FROM creatordata");
        $sql->execute();
        $res = $sql->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }
?>