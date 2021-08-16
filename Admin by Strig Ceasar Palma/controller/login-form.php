<?php
        require '../model/DbLogin.php';
        $userName = $password = "";
        $userNameErr = $passwordErr = "";
        $loginFailed = "";
        $uid = "";
        $flag = true;

        if (isset($_COOKIE["uid"]))
        {
            $uid = $_COOKIE["uid"];
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if (empty($_POST["uname"]))
            {
                $userNameErr = "Admin name cannot be empty!";
                $flag = false;
            }
            else
            {
                $userName = test_input($_POST["uname"]);
            }

            if (empty($_POST["password"]))
            {
                $passwordErr = "Password cannot be empty!";
                $flag = false;
            }
            else
            {
                $password = test_input($_POST["password"]);
            }


            if ($flag == true)
            {
                $response = login($userName, $password);
                if ($response)
                {   
                    if (isset($_POST["rememberme"]))
                    {
                        setcookie("uid", $userName, time()+60*60);
                    }
                    session_start();
                    $_SESSION["uid"] = $userName;
                    header("Location: admin-control.php");
                }
                else
                {
                    $loginFailed = "Login Failed! Please Try Again!";
                }
            }

        }

        function test_input($data)
        {
            $data = trim($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);
            return $data;
        }


    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../view/css/forLoginPage.css">
</head>
<body>

    <div class="header">
        <?php
            include "home-include.php"; 
        ?>
    </div>
    <h1>Admin Login</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
    name="loginForm" onsubmit="return isValid()">
    <fieldset>
            <legend>Admin Login Form:</legend>
            <br>
            <label for="uname">Admin Name: </label>
            <input type="text" id="uname" name="uname" value="<?php echo $uid;?>"> <span style="color: red;" id="usernameErr">* <?php echo $userNameErr;?></span>
            <br><br>
            <label for="password">Password: </label>
            <input type="password" id="password" name="password"> <span style="color: red;" id="passwordErr">* <?php echo $passwordErr;?></span>
            <br><br>
            <input type="checkbox" id="rememberme" name="rememberme">
            <label for="rememberme">Remember Me </label>
            <br><br>
            <input type="submit" name="submit" value="Login">
            <br>
            <span style="color: red;"><?php echo $loginFailed;?></span>
            <br>
            <span>Want to be an admin? <a href="registration-form.php">Register Here!</a></span>
            <br><br>
            <span><a href="../homepage.php">Back To Homepage</a></span>

        </fieldset>
    </form>
    <br>

    <script>
        function isValid()
        {
            var flag = true;
            document.getElementById("usernameErr").innerHTML = "";
            document.getElementById("passwordErr").innerHTML = "";
            var username = document.forms["loginForm"]["uname"].value;
            var password = document.forms["loginForm"]["password"].value;

            if (username === "")
            {
                document.getElementById("usernameErr").innerHTML = "Admin name cannot be empty!";
                flag = false;
            }
            if (password === "")
            {
                document.getElementById("passwordErr").innerHTML = "Password cannot be empty!";
                flag = false;
            }
            return flag;
        }
    </script>

    <div class="footer">
        <?php
            include "footer.php"; 
        ?>
    </div>
</body>
</html>