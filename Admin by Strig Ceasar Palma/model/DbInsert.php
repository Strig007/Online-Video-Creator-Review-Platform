<?php
    require 'DbConnect.php';

    function register ($firstname, $lastname, $gender, $dob, $religion, 
    $phone, $email, $username, $password)
    {
        $conn = connect();
        $sql = $conn->prepare("INSERT INTO admindata (FirstName, LastName, Gender, DateOfBirth, Religion, 
        Phone, Email, UserName, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("sssssisss", $firstname, $lastname, $gender, $dob, $religion,
        $phone, $email, $username, $password);
        return $sql->execute();
    }   

?>