<?php
    require 'DbConnect.php';

    function registerCreator($name, $dob, $channel, $rating, $review)
    {
        $conn = connect();
        $sql = $conn->prepare("INSERT INTO creatordata (name, dob, channelLink, rating,
        review) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param("sssss", $name, $dob, $channel, $rating, $review);
        return $sql->execute();
    }   

?>