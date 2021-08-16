<?php
    require '../model/DbCreatorInsert.php';
    $Name = $rating = $channelLink = $review = $dob = "";
    $NameErr = $ratingErr = $channelErr = $dobErr = "";
    $successfulMessage = $errorMessage = "";
    $flag = true;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        if (empty($_POST["name"])) 
        {
            $NameErr = "Name can not be empty!";
            $flag = false;
        }
        else
        {
            $Name = test_input($_POST["name"]);
        }

        if (empty($_POST["dob"])) 
        {
            $dobErr = "Select Date of Birth";
            $flag = false;
        }
        else
        {
            $dob = test_input($_POST["dob"]);
        }

        if (empty($_POST["channelLink"])) 
        {
            $channelErr = "Enter a Channel Link";
            $flag = false;
        }
        else
        {
            $channelLink = test_input($_POST["channelLink"]);
        }

        if (empty($_POST["rate"])) {
            $ratingErr = "Select a Rating";
            $flag = false;
        }
        else
        {
            $rating = test_input($_POST["rate"]);
        }

        if (empty($_POST["review"])) 
        {
            $review = "";
        }
        else
        {
            $review = test_input($_POST['review']);
        }

        if ($flag == true) {
            
            $result1 = registerCreator($Name, $dob, $channelLink, $rating, $review);
            if ($result1) {
                $successfulMessage = "Successfully Added.";
            } else {
                $errorMessage = "Error While Saving.";
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
    <title>Adding Creators</title>
    <link rel="stylesheet" href="../view/css/forNewCreator.css">
</head>
<body>

    <div class="header">
    <?php
        include "home-include.php"; 
    ?>
    </div>
    <h1>Add Creators</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
    name="creatorForm" onsubmit="return isValid()">
        <fieldset>
            <legend>Add New Creator:</legend>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <span style="color: red;" id="creatorNameErr"><?php echo $NameErr; ?></span><br><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob">
            <span style="color: red;" id="creatorDobErr"><?php echo $dobErr; ?></span><br><br>

            <label for="channelLink">Channel Link:</label>
            <input type="url" id="channelLink" name="channelLink">
            <span style="color: red;" id="creatorLinkErr"><?php echo $channelErr; ?></span><br><br>

            <label>Rating: </label>
            <input type="radio" id="one" name="rate" value="one">
            <label for="one">1</label>
            <input type="radio" name="rate" id="two" value="two">
            <label for="two">2</label>
            <input type="radio" name="rate" id="five" value="five">
            <label for="five">3</label>
            <input type="radio" name="rate" id="four" value="four">
            <label for="four">4</label>
            <input type="radio" name="rate" id="five" value="five">
            <label for="five">5</label>
            <span style="color: red;" id="creatorRatingErr"><?php echo $ratingErr; ?></span><br><br>

            <label for="review">Review:</label>
            <textarea id="review" name="review" cols="20" rows="4"></textarea>
            <br><br><br>
            <input type="submit" value="Add Creator">
        </fieldset>
    </form>

    <span style="color: green;"><?php echo $successfulMessage; ?></span>
    <span style="color: red;"><?php echo $errorMessage; ?></span>
    <br>
    <br>
    <button class="button" onclick="document.location.href='admin-control.php'">Back To Admin Control Page</button>
    <br><br>

    <script>
        function isValid()
        {
            var flag = true;
            document.getElementById("creatorNameErr").innerHTML = "";
            document.getElementById("creatorDobErr").innerHTML = "";
            document.getElementById("creatorLinkErr").innerHTML = "";
            document.getElementById("creatorRatingErr").innerHTML = "";

            var name = document.forms["creatorForm"]["name"].value;
            var dob = document.forms["creatorForm"]["dob"].value;
            var channel = document.forms["creatorForm"]["channelLink"].value;
            var rating = document.forms["creatorForm"]["rate"].value;

            if (name === "")
            {
                document.getElementById("creatorNameErr").innerHTML = "Name can not be empty!";
                flag = false;
            }
            if (dob === "")
            {
                document.getElementById("creatorDobErr").innerHTML = "Select Date of Birth";
                flag = false;
            }
            if (channel === "")
            {
                document.getElementById("creatorLinkErr").innerHTML = "Enter a Channel Link";
                flag = false;
            }
            if (rating === "")
            {
                document.getElementById("creatorRatingErr").innerHTML = "Select a Rating";
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