<?php
        require '../model/DbInsert.php';
        $firstName = $lastName = $gender = $dob = $religion = $email = $userName = $password = "";
        $phone = "";
        $firstNameErr = $lastNameErr = $genderErr = $dobErr = $religionErr = $emailErr = $userNameErr = $passwordErr = "";
        $flag = true;
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if (empty($_POST["fname"]))
            {
                $firstNameErr = "First name cannot be empty!";
                $flag = false;
            }
            else
            {
                $firstName = test_input($_POST["fname"]);
            }

            if (empty($_POST["lname"]))
            {
                $lastNameErr = "Last name cannot be empty!";
                $flag = false;
            }
            else
            {
                $lastName = test_input($_POST["lname"]);
            }

            if (empty($_POST["gender"]))
            {
                $genderErr = "Gender cannot be empty!";
                $flag = false;
            }
            else
            {
                $gender = test_input($_POST["gender"]);
            }

            if (empty($_POST["dob"]))
            {
                $dobErr = "Date of birth cannot be empty!";
                $flag = false;
            }
            else
            {
                $dob = test_input($_POST["dob"]);
            }

            if (empty($_POST["religion"]))
            {
                $religionErr = "Religion cannot be empty!";
                $flag = false;
            }
            else
            {
                $religion = test_input($_POST["religion"]);
            }

            if (empty($_POST["email"]))
            {
                $emailErr = "E-mail cannot be empty!";
                $flag = false;
            }
            else
            {
                $email = test_input($_POST["email"]);
            }

            if (empty($_POST["uname"]))
            {
                $userNameErr = "Admin name cannot be empty!";
                $flag = false;
            }
            else
            {
                $userName = test_input($_POST["uname"]);
            }

            if (empty($_POST["password"]))
            {
                $passwordErr = "Password cannot be empty!";
                $flag = false;
            }
            else
            {
                $password = test_input($_POST["password"]);
            }

            if (empty($_POST["phone"]))
            {
                $phone = "";
            }
            else
            {
                $phone = test_input($_POST["phone"]);
            }
            

            if ($flag == true)
            {
                $firstName = test_input($_POST["fname"]);
                $lastName = test_input($_POST["lname"]);
                $gender = test_input($_POST["gender"]);
                $dob = test_input($_POST["dob"]);
                $religion = test_input($_POST["religion"]);
                $email = test_input($_POST["email"]);
                $phone = test_input($_POST["phone"]);
                $userName = test_input($_POST["uname"]);
                $password = test_input($_POST["password"]);

                $result = register($firstName, $lastName, $gender, $dob, $religion,
                $phone, $email, $userName, $password);

                if ($result)
                {
                    echo "Successfully Registered!";
                }
                else
                {
                    echo "Error While Registering!";
                }
            }

        }

        function test_input($data)
        {
            $data = trim($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);
            return $data;
        }

    ?>