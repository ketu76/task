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
    $name = $_POST['name'];
    $standard_id = $_POST['standard'];
    $query = "INSERT INTO `standard_subject`(`std_id`, `sub_id`) VALUES ($standard_id,$id)";
    
    $result2 = mysqli_query($conn, $query);

    header("Location: subjects.php");
}

?>

<?php
if (isset($_GET['id'])) {
    require "db.php";
    $id = $_GET['id'];
    $query = "SELECT * FROM `subject` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
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
                margin-top: 180px;
            }

            .sbtn {
                border-radius: 5px;
                ;
            }

            #back {
                display: block;
                margin: 0px 0px 5px 210px;
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
                <label>Subject Name:</label>
                <input type="text" name="name" value="<?php echo $row['sub_name'] ?>"><br><br>
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="standard">
                        <option selected>Select Standard For Subject</option>
                        <?php
                        $query1 = "SELECT * FROM `standards`";
                        $result1 = mysqli_query($conn, $query1);
                        while ($row = mysqli_fetch_array($result1)) {
                            echo "<option value=" . $row['id'] . " name=" . $row['std_name'] . ">" . $row['std_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <br>
                <input class="sbtn" type="submit" value="update" name="update"><br><br>
                <a id='back' href='subjects.php'>Back</a>
            </form>
        </div>
    </body>

    </html>
<?php
}
?>