<?php
        require '../model/DbUserRemove.php';
        $userName = "";
        $userNameErr = "";
        $sMessage = "";
        $eMessage = "";
        $notValid = "";
        $flag = true;
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            if (empty($_POST["username"]))
            {
                $userNameErr = "Enter user's name!";
                $flag = false;
            }
            else
            {
                $userName = test_input($_POST["username"]);
            }

            if ($flag == true)
            {
                $check = isExist($userName);
                if ($check == false)
                {
                    $notValid = "Not valid username!";
                }
                else
                {
                    $response = removeUser($userName);
                    if ($response)
                    {
                        $sMessage = "User removed successfully!";
                    }
                    else
                    {
                        $eMessage = "Error while removing user!";
                    }
                }
            }

        }
        
        function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Removing Users</title>
    <link rel="stylesheet" href="../view/css/forRemoveUser.css">
</head>
<body>

    <div class="header">
    <?php
        include "home-include.php"; 
    ?>
    </div>

    <h2>Users List</h2>

    <?php

        require '../model/DbUserRead.php';
        $data = getAll();

        echo "<table border =1px solid black; style='text-align:center;'>";
        echo "<tr>";
        echo "<th>" . "Users Name" . "</th>";
        echo "</tr>";
        
        for ($i = 0; $i < count($data); $i++)
        {
            echo "<tr>";
            echo "<td>" . $data[$i]["username"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

    ?>
    <br><br><br>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
    name="removeUserForm" onsubmit="return isValid()">
        <fieldset>
            <legend>Remove A User:</legend>
            <label for="username">User's Name:</label>
            <input type="text" id="username" name="username">
            <span style="color: red;" id="userNameErr"><?php echo $userNameErr; ?></span><br><br>
            <input type="submit" name="submit" value="Remove Creator"> <br><br>

            <span style="color: green;"><?php echo $sMessage;?></span>
            <span style="color: red;"><?php echo $notValid;?></span>
            <span style="color: red;"><?php echo $eMessage;?></span>
        </fieldset>
    </form>
    <br><br>
    <button class="button" onclick="document.location.href='../view/view-users.php'">Back</button>
    <br><br>

    <script>
        function isValid()
        {
            var flag = true;
            document.getElementById("userNameErr").innerHTML = "";

            var username = document.forms["removeUserForm"]["username"].value;

            if (username === "")
            {
                document.getElementById("userNameErr").innerHTML = "Enter User's Name!";
                flag = false;
            }
            return flag;
        }
    </script>

    <?php
        include "footer.php"; 
    ?>
</body>
</html>