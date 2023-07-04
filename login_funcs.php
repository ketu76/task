<?php

function insert()
{
    require "db.php";
    if (isset($_POST["signup"])) {
        $firstname = mysqli_real_escape_string($conn, $_POST['Firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['Lastname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $password = $_POST['password'];
        $type = $_POST['type'];
        $sqlquery = "SELECT * FROM `userdata` WHERE email = '$email' and password = '$password'";
        $result = mysqli_query($conn, $sqlquery);
        if (mysqli_num_rows($result) > 0) {
            echo '<script>alert("User Already Exist. Login With Credintials")</script>';
            
        } else {
            $query1 = "INSERT INTO `userdata`(`firstname`, `lastname`, `email`, `age`, `password`) VALUES ('$firstname','$lastname','$email','$age','$password')";
            $result1 = mysqli_query($conn, $query1);
            $query2="SELECT id FROM `userdata` WHERE email = '$email' and password = '$password'";
            $result2 = mysqli_query($conn, $query2);
            $row = mysqli_fetch_array($result2);
            $id = $row['id'];
            $query3 = "INSERT INTO `usertype`(`user_id`, `access_type`) VALUES ('$id','$type')";
            $result3 = mysqli_query($conn, $query3);
            header('Location:login.php');
        }
    }
}

function login()
{
    try {
        if (isset($_POST['login'])) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            require "db.php";
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            $email = stripcslashes($email);
            $password = stripcslashes($password);
            $email = mysqli_real_escape_string($conn, $email);
            $password = mysqli_real_escape_string($conn, $password);
            $sql = "SELECT * FROM `userdata` WHERE email = '$email' and password = '$password'";
            $result = mysqli_query($conn, $sql);    
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            $login_query = "SELECT userdata.*, accesstype.type FROM `userdata` JOIN usertype ON userdata.id = usertype.user_id JOIN accesstype ON usertype.access_type = accesstype.type WHERE email = '$email'";
            $login_result = mysqli_query($conn, $login_query);
            $login_row1 = mysqli_fetch_array($login_result, MYSQLI_ASSOC);
            $login_type = $login_row1['type'];
            $login_name = $login_row1['firstname'];
            if ($count == 1) {
                if ($password === $row['password']) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['name'] = $login_name;
                    $_SESSION['type'] = $login_type;
                    if($_SESSION['type']=== 'Admin' || $_SESSION['type']=== 'Teacher'){
                        header("Location:dashboard.php");
                    } else{
                        header("Location:studentDash.php");
                    }
                } else {
                    $showError = "Email and Password Does not match";
                }
            } else {
                echo "<h1> Login failed. Invalid username or password.</h1>";
            }
        }
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
}
