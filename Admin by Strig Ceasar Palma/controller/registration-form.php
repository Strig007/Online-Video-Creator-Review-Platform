<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration Form</title>
    <script src="../view/js/myJS.js"></script>
    <link rel="stylesheet" href="../view/css/forNewAdmin.css">
</head>
<body>

    <div class="header">
    <?php
        include "home-include.php"; 
    ?>
    </div>
    <h1>Admin Registration Form</h1>
    <br>

    <form method="post" action="registrationServer.php"
    name="resgistrationForm" onsubmit="submitRegistrationForm(this); return false;">
        <fieldset>
            <legend>Basic Information:</legend>
            <br>
            <label for="fname">First Name: </label>
            <input type="text" id="fname" name="fname"> <span style="color: red;" id="firstnameErr"></span>
            <br><br>
            <label for="lname">Last Name: </label>
            <input type="text" id="lname" name="lname"> <span style="color: red;" id="lastnameErr"></span>
            <br><br>
            
            <label for="gender">Gender: </label>
            <input type="radio" id="male" name="gender" value="male">
            <label for="gender">Male</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="gender">Female</label> <span style="color: red;" id="genderErr"></span>
            <br><br>

            <label for="dob">Date of Birth: </label>
            <input type="date" id="dob" name="dob"> <span style="color: red;" id="dobErr"></span>
            <br><br>

            <label for="religion">Religion: </label>
            <select name="religion" id="religion">
                <option value="muslim">Muslim</option>
                <option value="christian">Christian</option>
                <option value="hindu">Hindu</option>
                <option value="buddhist">Buddhist</option>
            </select>
            <span style="color: red;" id="religionErr"></span>
            <br>
        </fieldset>
        <br>
        
        <fieldset>
            <legend>Contact Information:</legend>
            <br>
            <label for="phone">Phone: </label>
            <input type="number" id="phone" name="phone"> <br> <br>

            <label for="email">Email: </label>
            <input type="email" id="email" name="email"> <span style="color: red;" id="emailErr"></span>
            <br><br>

        </fieldset>
        <br>

        <fieldset>
            <legend>Account Information:</legend>
            <br>
            <label for="uname">Admin Name: </label>
            <input type="text" id="uname" name="uname"> <span style="color: red;" id="unameErr"></span>
            <br><br>
            <label for="password">Password: </label>
            <input type="password" id="password" name="password"> <span style="color: red;" id="passwordErr"></span>
        </fieldset>
        <br>
        <input type="submit" name="submit" id="submit" value="Submit"><br><br>
    </form>
    <button class="button" onclick="document.location.href='login-form.php'">Back To Login</button>
    <br>
    <h2 id="registrationMessage" style="color: white;"></h2>
    <br>
    <?php
        include "footer.php"; 
    ?>


</body>
</html>