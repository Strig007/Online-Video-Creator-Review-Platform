<?php

        require '../model/DbSearchUser.php';
        $username = empty($_GET["username"]) ? "" : $_GET["username"];
        if (empty($username))
        {
            $dataList = getAllUsersInformations();
        }
        else
        {
            $dataList = getOne($username);
        }

        if (count($dataList) > 0)
        {
            echo "<table border =1px solid black; style='text-align:center;'>";
            echo "<tr>";
            echo "<th>" . "First Name" . "</th>";
            echo "<th>" . "Last Name" . "</th>";
            echo "<th>" . "Gender" . "</th>";
            echo "<th>" . "Date of Birth" . "</th>";
            echo "<th>" . "E-mail" . "</th>";
            echo "<th>" . "User Name" . "</th>";
            echo "<th>" . "Favourites" . "</th>";
            echo "</tr>";
            
            for ($i = 0; $i < count($dataList); $i++)
            {
                echo "<tr>";
                echo "<td>" . $dataList[$i]["firstname"] . "</td>";
                echo "<td>" . $dataList[$i]["lastname"] . "</td>";
                echo "<td>" . $dataList[$i]["gender"] . "</td>";
                echo "<td>" . $dataList[$i]["dob"] . "</td>";
                echo "<td>" . $dataList[$i]["email"] . "</td>";
                echo "<td>" . $dataList[$i]["username"] . "</td>";
                echo "<td>" . $dataList[$i]["favourites"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }

        else
        {
            echo "User not found!";
        }
        

?>