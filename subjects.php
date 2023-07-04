<?php include "navbar.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<style>
    body {
        background-color: #ffdcf3;
    }

    .header {
        text-align: center;
    }

    .table1 {
        border: 1px solid green;
        border-spacing: 0;
        text-align: center;
        width: 550px;
        border-radius: 2px;
        margin-left: 350px;
    }

    .buttons {
        color: black;
        text-decoration: none;
        background: lightblue;
        border-radius: 11px;
        padding: 3px;
        width: 60px;
        border: none;
        font-size: 18px;
    }

    .content {
        max-width: 500px;
        margin: auto;
    }

    .btn1 {
        display: block;
        margin-left: 605px;

    }
    .backbtn{
        display: inline;
        width: 100px;
        margin-bottom: 60px;
        margin-left: 620px;
    }
</style>

<body>
    <h1 class="header">Subjects</h1>
    <a href="addsub.php"><input class="btn1" type="button" value="Add subject"></a><br>
    <a class='btn btn-success backbtn'  href='dashboard.php'>Back</a><br>
</body>

</html>

<?php
require "db.php";
$query = "SELECT * FROM `subject`";
$result = mysqli_query($conn, $query);

echo "<table class='table1' border='1'>
        <br>
        <tr>
        <th>ID</th>
        <th>Subjects</th>
        <th>Actions</th>
        </tr>";

while ($row = mysqli_fetch_array($result)) {

    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['sub_name'] . "</td>";
    echo "<td>" . "<a class='buttons' href='updateSubject.php?id=" . $row['id'] . "'>Update</a>" . " " ."<a class='buttons' href='assignSubject.php?id=" . $row['id'] . "'>Assign</a>" . " " . "<a class='buttons' href='deleteSubject.php?id=" . $row['id'] . "'>Delete</a>" . "</td>";;
    echo "</tr>";
}

echo "</table>";
?>
<div class="backbtn">
    
</div>