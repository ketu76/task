<?php

if (isset($_GET['id'])) {
    require "db.php";
    $id = $_GET['id'];
    $query = "DELETE FROM `userdata` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);
    $_POST['showData']=true;
}

function showData()
{
    try {
        session_start();
        if (isset($_POST["showData"])) {
            require "db.php";
            if($_SESSION['type'] === 'Admin'){
                $query = "SELECT ud.*, ut.access_type FROM userdata ud JOIN usertype ut WHERE ud.id = ut.user_id";
                $result = mysqli_query($conn, $query);
            }

            elseif($_SESSION['type'] === 'Teacher'){
                $query = "SELECT ud.*, ut.access_type FROM userdata ud JOIN usertype ut WHERE ud.id = ut.user_id AND ut.access_type ='Student'";
                $result = mysqli_query($conn, $query);
            }
            
    
            echo "<table class='table1' border='1'>
            <br>
            <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Date Of Birth</th>
            <th>User Type</th>";
            if($_SESSION['type'] === 'Admin' ){
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
                if($_SESSION['type'] === 'Admin' ){
                echo "<td>" . $row['password'] . "</td>";
                }
                echo "<td>" . "<a class='buttons' href='viewuser.php?id=" . $row['id'] . "'>View</a>" . " " . "<a class='buttons' href='updateData.php?id=" . $row['id'] . "'>Update</a>". " " . "<a class='buttons' href='dashboard.php?id=" . $row['id'] . "'>Delete</a>" . "</td>"; ;
                echo "</tr>";
            }
            echo "</table>"; 
        }
    } catch (Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
    
}


?>