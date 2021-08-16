<?php
    require 'DbConnect.php';

    function registerUser($firstname, $lastname, $gender, $dob, $email, $username,
    $password)
    {
        $conn = connect();
        $sql = $conn->prepare("INSERT INTO userdata (firstname, lastname,gender,
        dob, email, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("sssssss", $firstname, $lastname, $gender, $dob, $email, 
        $username, $password);
        return $sql->execute();
    }   

?>