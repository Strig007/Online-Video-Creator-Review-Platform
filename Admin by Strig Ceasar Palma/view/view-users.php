<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Information</title>
    <script src="./js/search.js"></script>
    <link rel="stylesheet" href="./css/forViewUser.css">
</head>
<body>
    <div class="header">
    <?php
        include "../controller/home-include.php"; 
    ?>
    </div>
    <br>

    <div style="text-align: center;">
        <button class="button" onclick="document.location.href='../controller/add-users.php'">Add Users</button>
        <button class="button" onclick="document.location.href='../controller/remove-users.php'">Remove Users</button>
        <button class="button" onclick="document.location.href='../controller/admin-control.php'">Back</button>
    </div>

    <h2>Users Information: </h2>

    <form action="../controller/userListAction.php" method="GET" name="searchUserForm"
    onsubmit="getData(this); return false;">

    <input type="text" name="username">
    <input type="submit" name="submit" value="Search">

    </form>
    <br><br>

    <div id="result" style="color: white;"></div>
    
    <br><br>

    <?php
        include "../controller/footer.php"; 
    ?>


</body>
</html>