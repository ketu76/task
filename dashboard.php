<?php
include "navbar.php";
?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<html>
<style>
    body {
        background-color: #ffdcf3;
    }
    .table1 {
        border: 1px solid green;
        border-spacing: 0;
        text-align: center;
        width: 1050px;
        border-radius: 2px;
        margin-left: 120px;
    }

    .buttons {
        color: black;
        text-decoration: none;
        background: lightblue;
        border-radius: 6px;
        padding: 1px;
        width: 60px;
        border: none;
        font-size: 18px;
    }

    .content {
        max-width: 500px;
        margin: auto;
    }
</style>

<body>
    <div class="content">
        <h1>Welcome <?php session_start(); echo $_SESSION['type'] ." - ". $_SESSION['name'] ; ?></h1>
        <form action=dashboard.php method="post" enctype="multipart/form-data">
            <input class="btn btn-success" type="submit" value="Show Data" name="showData"><br><br>
        </form>
    </div>
</body>
</html>

<?php

if (!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
} 
else{
    require "db.php";
    include "user_func.php";
    showData();
}
?>