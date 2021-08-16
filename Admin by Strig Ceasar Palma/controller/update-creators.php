<?php
    require '../model/DbUpdateCreator.php';

    $Name = $channelLink = $dob = "";
    $NameErr = $channelErr = $dobErr = "";
    $successfulMessage = $errorMessage = "";
    $notValid = "";
    $flag = true;

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $Name = test_input($_POST['name']);
        $channelLink = test_input($_POST['channelLink']);
        $dob = test_input($_POST['dob']);


        if (empty($channelLink)) {
            $channelErr = "Enter A Channel Link";
            $flag = false;
        }
        if (empty($dob)) {
            $dobErr = "Enter Valid Date";
            $flag = false;
        }
        if (empty($Name)){
            $NameErr = "Enter Creator's Name";
            $flag = false;
        }

        if ($flag == true) 
        {
            $check = isExist($Name);
            if ($check == false)
            {
                $notValid = "Not Valid Creator's Name!";
            }
            else
            {
                $response = updateCreator($Name, $dob, $channelLink);
                if ($response)
                {
                    $successfulMessage = "Creator's Modified Successfully!";
                }
                else
                {
                    $errorMessage = "Error While Modifying!";
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
    <title>Updating Creators</title>
    <link rel="stylesheet" href="../view/css/forUpdateCreator.css">
</head>
<body>
    <div class="header">
    <?php
        include "home-include.php"; 
    ?>
    </div>
    <br><br>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
    name="updateCreatorForm" onsubmit="return isValid()">
        <fieldset>
            <legend>Update Creator's Information:</legend>
            <br>
            <label for="name">Creator's Name:</label>
            <input type="text" id="name" name="name">
            <span style="color: red;" id="NameErr"><?php echo $NameErr; ?></span><br><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob">
            <span style="color: red;" id="dobErr"><?php echo $dobErr; ?></span><br><br>

            <label for="channelLink">Creator's Channel Link:</label>
            <input type="url" id="channelLink" name="channelLink">
            <span style="color: red;" id="channelErr"><?php echo $channelErr; ?></span><br><br>
            <input type="submit" value="Update"> <br><br>

            <span style="color: green;"><?php echo $successfulMessage; ?></span>
            <span style="color: red;"><?php echo $notValid; ?></span>
            <span style="color: red;"><?php echo $errorMessage; ?></span>
        </fieldset>
    </form>
    <br><br>

    <button class="button" onclick="document.location.href='../view/view-creators.php'">Back</button>
    <br><br>

    <script>
        function isValid()
        {
            var flag = true;
            
            document.getElementById("NameErr").innerHTML = "";
            document.getElementById("dobErr").innerHTML = "";
            document.getElementById("channelErr").innerHTML = "";

            var name = document.forms["updateCreatorForm"]["name"].value;
            var dob = document.forms["updateCreatorForm"]["dob"].value;
            var channel = document.forms["updateCreatorForm"]["channelLink"].value;

            if (name === "")
            {
                document.getElementById("NameErr").innerHTML = "Enter Creator's Name";
                flag = false;
            }
            if (dob === "")
            {
                document.getElementById("dobErr").innerHTML = "Enter Valid Date";
                flag = false;
            }
            if (channel === "")
            {
                document.getElementById("channelErr").innerHTML = "Enter A Channel Link";
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