<?php
if (isset($_GET['id'])) {
    require "db.php";
    $id = $_GET['id'];
    $query = "DELETE FROM `standards` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);
    header("Location:standards.php");
}
?>
