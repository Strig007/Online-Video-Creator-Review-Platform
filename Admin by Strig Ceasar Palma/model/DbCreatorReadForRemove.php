<?php
    require 'DbConnect.php';
    function getAll()
    {
        $conn = connect();
        $sql =  $conn->prepare("SELECT name, channelLink FROM creatordata");
        $sql->execute();
        $res = $sql->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }
?>