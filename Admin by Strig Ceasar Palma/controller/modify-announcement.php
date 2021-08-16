<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifying Announcement</title>
    <link rel="stylesheet" href="../view/css/forModifyAnnouncement.css">
</head>
<body>

    <div class="header">
    <?php
        include "home-include.php"; 
    ?>
    </div>
    <br><br>

    <?php

        define ("filePath","../model/announcement.txt");
        function test_input($data)
        {
            $data = trim($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);
            return $data;
        }

        function write($content)
        {
            $resource = fopen(filePath, "w");
            $fw = fwrite($resource,$content . "\n");
            fclose($resource);
            return $fw;
        }

        function read()
        {
            $resource = fopen(filePath, "r");
            $fz = filesize(filePath);
            $fr = "";
            if ($fz > 0)
            {
                $fr = fread($resource,$fz);
            }
            fclose($resource);
            return $fr;
        }

        $announ = "";
        $sMessage = "";
        $eMessage = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $announ = test_input($_POST["announ"]);
            $fileData = read();
            $result = write($announ);
            if ($result)
            {
                $sMessage = "Successfully Modified!";
            }
            else
            {
                $eMessage = "Error While Modifying!";
            }

        }

    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    
    <fieldset>
    <legend>Modifying Announcements</legend> <br>
    <label for="announ">Announcement: </label><br><br>
    <textarea name="announ" id="announ" cols="40" rows="10"></textarea>
    <br><br>
    <input type="submit" name="submit" value="Update">
    <br><br>
    <span style="color: green;"><?php echo $sMessage;?></span>
    <span style="color: red;"><?php echo $eMessage;?></span>
    </fieldset>
    
    </form>
    <br><br>
    <button class="button" onclick="document.location.href='admin-control.php'">Back To Admin Control Page</button>

    <br><br>

    <div class="footer">
    <?php
        include "footer.php"; 
    ?>
    </div>
</body>
</html>