<?php
        define ("filePath2","../model/recommend.json");
        $creatorName = "";
        $creatorNameErr = "";
        $creatorChannel = "";
        $creatorChannelErr = "";
        $sMessage = "";
        $eMessage = "";
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

            if (empty($_POST["channelname"]))
            {
                $creatorChannelErr = "Enter creator's channel link!";
                $flag = false;
            }
            else
            {
                $creatorChannel = test_input($_POST["channelname"]);
            }

            if ($flag == true)
            {
                $data_file = array("creatorname"=>$creatorName, "creatorchannel"=>$creatorChannel);
                $data_encode = json_encode($data_file, JSON_PRETTY_PRINT);
                $result = write($data_encode);
                if ($result)
                {
                    $sMessage = "Recommended Successfully!";
                }
                else
                {
                    $eMessage = "Error While Recommending!";
                }
            }

        }

        function write($content)
            {
                $resource = fopen(filePath2, "w");
                $fw = fwrite($resource, $content . "\n");
                fclose($resource);
                return $fw;
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
    <title>Creator Recommendation</title>
    <link rel="stylesheet" href="../view/css/forRecommendCreator.css">
</head>
<body>

    <div class="header">
    <?php
        include "home-include.php"; 
    ?>
    </div>

    <h1>Creator Recommendation</h1>
    <h2>Creators List</h2>
    <?php

        require '../model/DbCreatorReadForRemove.php';
        $data = getAll();

        echo "<table border =1px solid black; style='text-align:center;'>";
        echo "<tr>";
        echo "<th>" . "Creators Name" . "</th>";
        echo "<th>" . "Creators Channel Link" . "</th>";
        echo "</tr>";
        
        for ($i = 0; $i < count($data); $i++)
        {
            echo "<tr>";
            echo "<td>" . $data[$i]["name"] . "</td>";
            echo "<td>" . $data[$i]["channelLink"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

    ?>
    <br><br>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
    name="recomCreator" onsubmit="return isValid()">

        <fieldset>
        <legend>Recommend A Creator: </legend>
        <br>
        <label for="creatorname">Creator's Name: </label>
        <input type="text" id="creatorname" name="creatorname"> <span style="color: red;" id="nameErr"><?php echo $creatorNameErr;?></span><br><br>
        <label for="channelname">Creator's Channel Link: </label>
        <input type="url" id="channelname" name="channelname"> <span style="color: red;" id="channelErr"><?php echo $creatorChannelErr;?></span><br><br>
        <input type="submit" name="submit" value="Recommend This Creator"> <br><br><br>
        <span style="color: green;"><?php echo $sMessage;?></span>
        <span style="color: red;"><?php echo $eMessage;?></span>
        </fieldset>
    </form>

    <br><br>
    <button class="button" onclick="document.location.href='admin-control.php'">Back To Admin Control Page</button>
    <br><br>

    <script>
        function isValid()
        {
            var flag = true;
            
            document.getElementById("nameErr").innerHTML = "";
            document.getElementById("channelErr").innerHTML = "";

            var name = document.forms["recomCreator"]["creatorname"].value;
            var channel = document.forms["recomCreator"]["channelname"].value;

            if (name === "")
            {
                document.getElementById("nameErr").innerHTML = "Enter creator's name!";
                flag = false;
            }
            if (channel === "")
            {
                document.getElementById("channelErr").innerHTML = "Enter creator's channel link!";
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