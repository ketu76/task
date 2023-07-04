<?php
session_start();
if (!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
} else {    
    require "db.php";
    include "navbar.php";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM `userdata` WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $age = $row['age'];
        $password = $row['password'];
        $img = $row['image'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    body{
        background-color: #ffdcf3;
    }
    table {
        border: 1px solid black;
        border-spacing: 0;
    }

    tr,
    td {
        border: 1px solid black;
        border-spacing: 0;
        width: 30%;
        text-align: center;
    }

    .showtable {
        border: 1px solid green;
        border-spacing: 0;
        text-align: center;
        width: 500px;
        border-radius: 2px;
        margin-left: 350px;
    }

    #back {
        display: block;
        margin: 20px 0px 0px 580px;
        color: black;
        text-decoration: none;
        background: lightblue;
        border-radius: 5px;
        padding: 3px 10px;
        width: 50px;
        border: none;
        font-size: 15px;
    }

    .backdiv {
        display: block;
    }

    #ppimg {
        width: 80px;
        height: 80px;
        border-radius: 60px;
        background-clip: padding-box;
        margin: 7px 0 0 5px;
        float: center;
        background-size: cover;
        background-position: center center;

    }

    .header {
        margin-left: 480px;
    }
</style>

<body>
    <h2 class='header'>Student Information :</h2>

    <table class="showtable">
        <tr>
            <td>Image</td>
            <td><img id="ppimg" src="../Loginform/image/<?php echo $img; ?>" alt="<?php echo $fname . '`sProfile Image'; ?>"></td>
        </tr>
        <tr>
            <td>ID</td>
            <td><?php echo $id; ?></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><?php echo $firstname; ?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><?php echo $lastname; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><?php echo $age; ?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><?php echo $password; ?></td>
        </tr>
    </table>

    <div class='backdiv'>
        <a id='back' href='dashboard.php'>Back</a>
    </div>
</body>

</html>