<?php

require '../model/DbUserInsert.php';

$firstName = $lastName = $gender = $dob = $email = $username = $password = "";
$firstNameErr = $lastNameErr = $genderErr = $dobErr = $emailErr = $usernameErr = $passwordErr = "";
$successfulMessage = $errorMessage = "";
$flag = true;

if ($_SERVER['REQUEST_METHOD'] === "POST") { 

    if (empty($_POST['firstname'])) {
        $firstNameErr = "First name can not be empty!";
        $flag = false;
    }
    else
    {
        $firstName = test_input($_POST['firstname']);
    }

    if (empty($_POST['lastname'])) {
        $lastNameErr = "Last name can not be empty!";
        $flag = false;
    }
    else
    {
        $lastName = test_input($_POST['lastname']);
    }

    if (empty($_POST['gender'])) {
        $genderErr = "Select gender";
        $flag = false;
    }
    else
    {
        $gender = test_input($_POST['gender']);
    }

    if (empty($_POST['dob'])) {
        $dobErr = "Select Date of Birth";
        $flag = false;
    }
    else
    {
        $dob = test_input($_POST['dob']);
    }

    if (empty($_POST['email'])) {
        $emailErr = "Enter a valid email address!";
        $flag = false;
    }
    else
    {
        $email = test_input($_POST['email']);
    }

    if (empty($_POST['username'])) {
        $usernameErr = "Enter a username";
        $flag = false;
    }
    else
    {
        $username = test_input($_POST['username']);
    }

    if (empty($_POST['password'])) {
        $passwordErr = "Enter a password";
        $flag = false;
    }
    else
    {
        $password = test_input($_POST['password']);
    }

    if ($flag == true) 
    {
        $response = registerUser($firstName, $lastName, $gender, $dob, $email, $username,
        $password);

        if ($response)
        {
            $successfulMessage = "User added successfully!";
        }
        else
        {
            $errorMessage = "Error while adding user!";
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
    <title>Adding Users</title>
    <link rel="stylesheet" href="../view/css/forNewUser.css">
</head>
<body>

    <div class="header">
    <?php
        include "home-include.php"; 
    ?>
    </div>

    <h1>Add A User: </h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
    name="addUserForm" onsubmit="return isValid()">
        <fieldset>
            <legend>User's Registration Form:</legend>
            <label for="firstname">First name:</label>
            <input type="text" id="firstname" name="firstname">
            <span style="color: red;" id="firstNameErr"><?php echo $firstNameErr; ?></span><br><br>

            <label for="lastname">Last name:</label>
            <input type="text" id="lastname" name="lastname">
            <span style="color: red;" id="lastNameErr"><?php echo $lastNameErr; ?></span><br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <span style="color: red;" id="emailErr"><?php echo $emailErr; ?></span><br><br>

            <label>Gender</label>
            <input type="radio" id="male" name="gender" value="male">
            <label for="Male">Male</label>
            <input type="radio" name="gender" id="female" value="female">
            <label for="Female">Female</label>
            <input type="radio" name="gender" id="other" value="other">
            <label for="Other">Other</label>
            <span style="color: red;" id="genderErr"><?php echo $genderErr; ?></span><br><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob">
            <span style="color: red;" id="dobErr"><?php echo $dobErr; ?></span><br><br>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <span style="color: red;" id="userNameErr"><?php echo $usernameErr; ?></span><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <span style="color: red;" id="passwordErr"><?php echo $passwordErr; ?></span><br><br>
            <input type="submit" value="Create User's Account">
        </fieldset>
    </form>
    <br>
    <span style="color: green;"><?php echo $successfulMessage; ?></span>
    <span style="color: red;"><?php echo $errorMessage; ?></span>
    <br> <br>
    <button class="button" onclick="document.location.href='../view/view-users.php'">Back</button>
    <br><br>

    <script>
        function isValid()
        {
            var flag = true;

            document.getElementById("firstNameErr").innerHTML = "";
            document.getElementById("lastNameErr").innerHTML = "";
            document.getElementById("genderErr").innerHTML = "";
            document.getElementById("emailErr").innerHTML = "";
            document.getElementById("dobErr").innerHTML = "";
            document.getElementById("userNameErr").innerHTML = "";
            document.getElementById("passwordErr").innerHTML = "";

            var firstname = document.forms["addUserForm"]["firstname"].value;
            var lastname = document.forms["addUserForm"]["lastname"].value;
            var gender = document.forms["addUserForm"]["gender"].value;
            var email = document.forms["addUserForm"]["email"].value;
            var dob = document.forms["addUserForm"]["dob"].value;
            var username = document.forms["addUserForm"]["username"].value;
            var password = document.forms["addUserForm"]["password"].value;

            if (firstname === "")
            {
                document.getElementById("firstNameErr").innerHTML = "First name can not be empty!";
                flag = false;
            }
            if (lastname === "")
            {
                document.getElementById("lastNameErr").innerHTML = "Last name can not be empty!";
                flag = false;
            }
            if (gender === "")
            {
                document.getElementById("genderErr").innerHTML = "Select a gender!";
                flag = false;
            }
            if (email === "")
            {
                document.getElementById("emailErr").innerHTML = "Enter a valid email address!";
                flag = false;
            }
            if (dob === "")
            {
                document.getElementById("dobErr").innerHTML = "Select Date of Birth";
                flag = false;
            }
            if (username === "")
            {
                document.getElementById("userNameErr").innerHTML = "Enter a username";
                flag = false;
            }
            if (password === "")
            {
                document.getElementById("passwordErr").innerHTML = "Enter a password";
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