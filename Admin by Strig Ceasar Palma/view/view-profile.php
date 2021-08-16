<?php
    session_start();
    $userId = "";
    if (isset($_SESSION["uid"]))
    {
        $userId = $_SESSION["uid"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="./css/forViewProfile.css">
</head>
<body>

    <div class="header">
    <?php
        include "../controller/home-include.php"; 
    ?>
    </div>
    <br><br>

    <fieldset>
        <legend>Admin Profile</legend>
        <br>
        <?php
            require '../model/DbRead.php';

            $data = getAdminData($userId);
            
            echo "<b>First Name: </b>" . $data[0]["FirstName"] . "<br><br>";
            echo "<b>Last Name: </b>" . $data[0]["LastName"] . "<br><br>";
            echo "<b>Gender: </b>" . $data[0]["Gender"] . "<br><br>";
            echo "<b>DateOfBirth: </b>" . $data[0]["DateOfBirth"] . "<br><br>";
            echo "<b>Religion: </b>" . $data[0]["Religion"] . "<br><br>";
            echo "<b>Email: </b>" . $data[0]["Email"] . "<br><br>";
            echo "<b>Phone: </b>" . $data[0]["Phone"] . "<br><br>";
            echo "<b>Admin User Name: </b>" . $data[0]["UserName"] . "<br><br>";
            echo "<b>Admin Password: </b>" . $data[0]["Password"] . "<br><br>";
        ?>
        <br>
        
        <button class="button" onclick="document.location.href='../controller/admin-control.php'">Back To Admin Control Page</button>
    </fieldset>
    <br>

    <div class="footer">
    <?php
        include "../controller/footer.php"; 
    ?>
    </div>
</body>
</html>