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
    <title>Admin Page</title>
    <link rel="stylesheet" href="../view/css/forAdminControlPage.css">
</head>
<body>
    <div class="header">
    <?php
        include "home-include.php"; 
    ?>
    </div>

    <h1 style="background-color:yellowgreen; text-align:center">Welcome To The System Admin: <?php echo $userId;?></h1>
    <ul>
        <li><a href="../view/view-profile.php">View Profile</a></li>
        <li><a href="change-password.php">Change Account Password</a></li>
        <li><a href="../view/view-users.php">View All Users</a></li>
        <li><a href="../view/view-creators.php">View All Creators</a></li>
        <li><a href="add-creators.php">Add New Creators</a></li>
        <li><a href="remove-creators.php">Remove Creators</a></li>
        <li><a href="modify-announcement.php">Modify Announcement</a></li>
        <li><a href="recommended-creator.php">Creator Recommendation</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <br>
    
    <div class="footer">
    <?php
        include "footer.php"; 
    ?>
    </div>
</body>
</html>