<?php
try {
    $conn = mysqli_connect('localhost',"root","root","loginform");
        if(!$conn){
            die("connection failed!!");
        } 
} catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
}
?>
