<?php
    require '../model/DbCreatorRemoveReviews.php';
    $Name = "";
    $NameErr = "";
    $successfulMessage = $errorMessage = "";
    $notValid = "";
    $flag = true;

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        
        $Name = test_input($_POST['name']);

        if (empty($Name)){
            $NameErr = "Enter Creator's Name";
            $flag = false;
        }

        if ($flag == true) 
        {
            $check = isExist($Name);
            if ($check == false)
            {
                $notValid = "Not valid creator name!";
            }
            else
            {
                $response = removeCreatorReviews($Name);
                if ($response)
                {
                    $successfulMessage = "Successfully Removed Reviews For This Creator!";
                }
                else
                {
                    $errorMessage = "Error While Removing Reviews!";
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
    <title>Removing Reviews</title>
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
    name="removeCreatorReviewsForm" onsubmit="return isValid()">
        <fieldset>
            <legend>Remove User's Reviews:</legend>
            <br>
            <label for="name">Which Creator's Reviews Do You Want To Reset? :</label>
            <input type="text" id="name" name="name">
            <span style="color: red;" id="NameErr"><?php echo $NameErr; ?></span><br><br>

            <input type="submit" value="Remove All Reviews"> <br><br>
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
            var newname = document.forms["removeCreatorReviewsForm"]["name"].value;

            if (newname === "")
            {
                document.getElementById("NameErr").innerHTML = "Enter Creator's Name";
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