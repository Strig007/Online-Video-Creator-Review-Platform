<?php
        require '../model/DbCreatorRemove.php';
        $creatorName = "";
        $creatorNameErr = "";
        $sMessage = "";
        $eMessage = "";
        $notValid = "";
        $flag = true;
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            if (empty($_POST["creatorname"]))
            {
                $creatorNameErr = "Enter creator's name!";
                $flag = false;
            }
            else
            {
                $creatorName = test_input($_POST["creatorname"]);
            }

            if ($flag == true)
            {
                $check = isExist($creatorName);
                if ($check === false)
                {
                    $notValid = "Not valid creator name!";
                }
                else
                { 
                    $response = removeCreator($creatorName);
                    if ($response)
                    {
                        $sMessage = "Creator Removed Successfully!";
                    }
                    else
                    {
                        $eMessage = "Error While Removing Creator!";
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
    <title>Removing Creators</title>
    <link rel="stylesheet" href="../view/css/forRemoveCreator.css">
</head>
<body>
    
    <div class="header">
    <?php
        include "home-include.php"; 
    ?>
    </div>

    <h2>Creators List</h2>
    <?php
        require '../model/DbCreatorRead.php';
        $dataList = getAll();

        echo "<table border =1px solid black; style='text-align:center;'>";
        echo "<tr>";
        echo "<th>" . "Creators Name" . "</th>";
        echo "</tr>";
        
        for ($i = 0; $i < count($dataList); $i++)
        {
            echo "<tr>";
            echo "<td>" . $dataList[$i]["name"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
    <br><br>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
    name="removeCreatorForm" onsubmit="return isValid()">

        <fieldset>
        <legend>Remove A Creator</legend>
        <br>
        <label for="creatorname">Creator's Name: </label>
        <input type="text" id="creatorname" name="creatorname"> <span style="color: red;" id="newNameErr"><?php echo $creatorNameErr;?></span><br><br>
        <input type="submit" name="submit" value="Remove Creator"> <br>
        <span style="color: green;"><?php echo $sMessage;?></span>
        <span style="color: red;"><?php echo $notValid;?></span>
        <span style="color: red;"><?php echo $eMessage;?></span>

        </fieldset>
    </form>
    <br><br>
    <button class="button" onclick="document.location.href='admin-control.php'">Back To Admin Control Page</button>
    <br> <br>

    <script>
        function isValid()
        {
            var flag = true;
            document.getElementById("newNameErr").innerHTML = "";
            var name = document.forms["removeCreatorForm"]["creatorname"].value;

            if (name === "")
            {
                document.getElementById("newNameErr").innerHTML = "Enter creator's name!";
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