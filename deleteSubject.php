<?php
if (isset($_GET['id'])) {
    require "db.php";
    $id = $_GET['id'];
    $query = "DELETE FROM `subject` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);
    header("Location:subjects.php");
}
?>