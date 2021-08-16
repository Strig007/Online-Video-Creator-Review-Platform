<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creators</title>
    <link rel="stylesheet" href="./css/forOnlyViewCreators.css">
</head>
<body>

    <div class="header">
    <?php
        include "../controller/home-include.php"; 
    ?>
    </div>

    <h1 style="background-color:yellowgreen; text-align:center; color:black">Information of Creators</h1>
    <div style="text-align: center;">
        <button class="button" onclick="document.location.href='../controller/update-creators.php'">Edit Creators</button>
        <button class="button" onclick="document.location.href='../controller/remove-reviews.php'">Remove Reviews</button>
        <button class="button" onclick="document.location.href='../controller/admin-control.php'">Back To Admin Control Page</button>
    </div>
    <br><br>
    <hr>
    <?php

        require '../model/DbConnect.php';
        require '../model/DbCreatorRead.php';

        $data = getAllCreator();
        for ($i = 0; $i < count($data); $i++)
            {
                echo "(" . ($i + 1) . ")";
                echo "<br>";
                echo "<br>";
                echo "<b>Creator's Name: </b>" . $data[$i]["name"];
                echo "<br>";
                echo "<b>Date of Birth: </b>" . $data[$i]["dob"];
                echo "<br>";
                echo "<b>Creator's Channel Link: </b>" . $data[$i]["channelLink"];
                echo "<br>";
                echo "<b>All Ratings: </b>" . $data[$i]["rating"];
                echo "<br>";
                echo "<b>All Reviews: </b>" . $data[$i]["review"];
                echo "<br>";
                echo "<br>";
                echo "<hr>";
            }

    ?>
    <br><br>
    <?php
        include "../controller/footer.php"; 
    ?>
</body>
</html>