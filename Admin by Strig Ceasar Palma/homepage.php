<?php

        function read()
            {
                $resource = fopen(filePath, "r");
                $fz = filesize(filePath);
                $fr = "";
                if ($fz > 0) {
                    $fr = fread($resource, $fz);
                }
                fclose($resource);
                return $fr;
            }
        function read2()
            {
                $resource = fopen(filePath2, "r");
                $fz = filesize(filePath2);
                $fr = "";
                if ($fz > 0) {
                    $fr = fread($resource, $fz);
                }
                fclose($resource);
                return $fr;
            }
        
        define("filePath","./model/recommend.json");
        define("filePath2","./model/announcement.txt");

        $fileData = read();
        $fileData2 = read2();
        $data = json_decode($fileData);
        $announce = "";
        if (empty($fileData2))
        {
            $announce = "No Announcement Available Right Now!";
        }
        else
        {
            $announce = $fileData2;
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Y/TTV | Home</title>
    <link rel="stylesheet" href="./view/css/forHomePage.css">
</head>
<body>
    <div class="header">
        <?php
            include "./controller/home-include.php"; 
        ?>
    </div>
    <ul>
        <li><a href="./controller/only-view-creators.php">Creators</a></li>
        <li><a href="./controller/login-form.php">Admin Login</a></li>
        <li><a href="homepage.php">Home Page</a></li>
    </ul>

    <p class="blink">Admin Recommended Creator: <?php echo $data->creatorname;?> , <a href="<?php echo $data->creatorchannel;?>" style="color: whitesmoke;">Click here to go creator's channel</a> </p> <br><br>
    <h3 style="border: 1px solid white; color:white"><marquee width="100%" direction="left" height="100%"><?php echo $announce;?></marquee></h3>

    <div class="footer">
    <?php
        include "./controller/footer.php"; 
    ?>
    </div>
</body>
</html>