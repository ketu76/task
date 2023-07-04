<?php
session_start();
if (!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
include "navbar.php";
if (isset($_POST['update'])) {
    require "db.php";
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $filename = $_FILES["imgToUpload"]["name"];
    $tempname = $_FILES["imgToUpload"]["tmp_name"];
    $folder = "../Loginform/image/" . $filename;
    $query = "UPDATE `userdata` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`age`='$age',password='$password',`image`='$filename' WHERE `id` = '$id'";
    $result2 = mysqli_query($conn, $query);
    if (move_uploaded_file($tempname, $folder)) {
        echo  "<br>" . "File uploaded succesfully" . "<br><br>";
    }
    header("Location: dashboard.php");
}

?>

<?php
if (isset($_GET['id'])) {
    require "db.php";
    $id = $_GET['id'];
    $query = "SELECT * FROM `userdata` WHERE `id` = '$id'";
    $query2 = "SELECT access_type from usertype WHERE user_id =$id";
    $result = mysqli_query($conn, $query);
    $result2 = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result);
    $row2 = mysqli_fetch_array($result2);
    $type = $row2['access_type'];
    $_POST['showData'] = true;

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <style>
            body {
                background-color: #ffdcf3;
            }

            .container {
                display: flex;
                flex-direction: column;
                justify-content: center;
                text-align: center;
                background-color: #49ff49c7;
                border: 2px solid red;
                margin-left: 350px;
                width: 500px;
                line-height: 20px;
                margin-top: 100px;
            }

            .sbtn {
                border-radius: 5px;
                ;
            }

            #back {
                display: block;
                margin: -6px 0px 10px 228px;
                color: black;
                text-decoration: none;
                background: lightblue;
                border-radius: 5px;
                padding: 3px 10px;
                width: 50px;
                border: none;
                font-size: 15px;
            }
        </style>

    <body>
        <div class="container">
            <h1>User's Information</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <label>ID:</label>
                <input readonly type="text" name="id" value="<?php echo $row['id'] ?>"><br><br>
                <label>First Name:</label>
                <input type="text" name="firstname" value="<?php echo $row['firstname'] ?>"><br><br>
                <label>Last Name:</label>
                <input type="text" name="lastname" value="<?php echo $row['lastname'] ?>"><br><br>
                <label>Email:</label>
                <input type="text" name="email" value="<?php echo $row['email'] ?>"><br><br>
                <label>Date Of Birth:</label>
                <input type="text" name="age" value="<?php echo $row['age'] ?>"><br><br>
                <label>Password:</label>
                <input type="password" name="password" value="<?php echo $row['password'] ?>"><br><br>
                <input type="file" name="imgToUpload" id="imgToUpload" value="upload your profile picture" accept=".jpg, .png, .jpeg"><br><br>
                <input class="sbtn" type="submit" value="update" name="update"><br><br>
                <a id='back' href='dashboard.php'>Back</a>
            </form>
        </div>
    </body>

    </html>
<?php
}
?>