<?php
    require 'DbConnect.php';

    function getAdminData ($username)
        {
            $conn = connect();
            $sql =  $conn->prepare("SELECT FirstName, LastName, Gender, DateOfBirth,
            Religion, Email, Phone, UserName, Password FROM admindata WHERE UserName = ?");
            $sql->bind_param("s", $username);
            $sql->execute();
            $res = $sql->get_result();
            return $res->fetch_all(MYSQLI_ASSOC);
        }

?>