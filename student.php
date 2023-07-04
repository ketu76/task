<?php include "navbar.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
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

    .back {
        display: block;
        margin: 25px 0px 10px 610px;
        text-decoration: none;
        border-radius: 5px;
        padding: 3px 10px;
        width: 55px;
        font-size: 15px;
    }
</style>

<body>
    <h1 class="text-center">Students Data</h1>
    <a class='btn btn-success back' href='dashboard.php'>Back</a>
</body>

</html>
<?php
try {
    session_start();

    require "db.php";

    $query = "SELECT ud.*, ut.access_type FROM userdata ud JOIN usertype ut WHERE ud.id = ut.user_id and ut.access_type ='Student'";
    $result = mysqli_query($conn, $query);

    echo "<table class='table1' border='1'>
            <br>
            <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>User Type</th>";
    if ($_SESSION['type'] === 'Admin') {
        echo "<th>Password</th>";
    }
    echo "<th>Action</th>
            </tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['access_type'] . "</td>";
        if ($_SESSION['type'] === 'Admin') {
            echo "<td>" . $row['password'] . "</td>";
        }
        echo "<td>" . "<a class='buttons' href='assignStandard.php?id=" . $row['id'] . "'>Assign</a>" . "</td>";;
        echo "</tr>";
    }
    echo "</table>";
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}

?>