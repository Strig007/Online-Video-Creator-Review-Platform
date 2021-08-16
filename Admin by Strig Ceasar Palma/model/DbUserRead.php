<?php
    function getAll()
    {
        $conn = connect();
        $sql =  $conn->prepare("SELECT username FROM userdata");
        $sql->execute();
        $res = $sql->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }
?>