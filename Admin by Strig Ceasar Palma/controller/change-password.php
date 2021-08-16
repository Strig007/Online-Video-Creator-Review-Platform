<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changing Password</title>
    <script src="../view/js/changepass.js"></script>
    <link rel="stylesheet" href="../view/css/forChangePassword.css">
</head>
<body>
    
    <div class="header">
    <?php
        include "home-include.php"; 
    ?>
    </div>
    <br><br>
    
    <form action="changePasswordServer.php" method="POST"
    name="changePasswordForm" onsubmit="changePassForm(this); return false;">

    <fieldset>
        <legend>Change Password</legend>
        <label for="newpassword">New Password: </label>
        <input type="password" id="newpassword" name="newpassword"> <span style="color: red;" id="newPassErr"></span> <br><br>
        <input type="submit" name="submit" value="Change Password"> <br><br>
    </fieldset>
    </form>
    <br><br>
    <h3 id="changePasswordMessage" style="color: white;"></h3>
    <button class="button" onclick="document.location.href='admin-control.php'">Back To Admin Control Page</button>
    <br><br>

    <div class="footer">
    <?php
        include "footer.php"; 
    ?>
    </div>
</body>
</html>