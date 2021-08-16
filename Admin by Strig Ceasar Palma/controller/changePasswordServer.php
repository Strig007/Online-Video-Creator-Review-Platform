<?php
        require '../model/DbChangePass.php';
        session_start();
        $userId = "";
        if (isset($_SESSION["uid"]))
        {
            $userId = $_SESSION["uid"];
        }

        $password = "";
        $passwordErr = "";
        $flag = true;
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            if (empty($_POST["newpassword"]))
            {
                $passwordErr = "Enter new password!";
                $flag = false;
            }
            else
            {
                $password = test_input($_POST["newpassword"]);
            }

            if ($flag == true)
            {
                $result = updatePassword($userId, $password);
                if ($result)
                {
                    echo "Password Changed Successfully!";
                }
                else
                {
                    echo "Error While Changing Password!";
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