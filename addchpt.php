<?php
session_start();
if (!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
} 
	require "db.php";
	include "navbar.php";
	if (isset($_POST["newchpt"])) {
		$chptname = $_POST['chptname'];
		$query0 = "SELECT * FROM `chapters` WHERE `name` = '$chptname'";
        $result = mysqli_query($conn, $query0);
        if (mysqli_num_rows($result) > 0) {
			echo '<script>alert("Chapter Name Already Exist.")</script>';
        } else {
		$query = "INSERT INTO `chapters`(`name`) VALUES ('$chptname')";
		$add_result = mysqli_query($conn, $query);
		header("Location: chapters.php");
		}
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Chapter</title>
</head>

<body>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<style>
		body {
			color: #fff;
			background: #3598dc;
		}

		.form-control {
			min-height: 41px;
			background: #f2f2f2;
			box-shadow: none !important;
			border: transparent;
		}

		.form-control:focus {
			background: #e2e2e2;
		}

		.form-control,
		.btn {
			border-radius: 2px;
		}

		.login-form {
			width: 350px;
			margin: 30px auto;
			text-align: center;
		}

		.login-form h2 {
			margin: 10px 0 25px;
		}

		.login-form form {
			color: #7a7a7a;
			border-radius: 3px;
			margin-bottom: 15px;
			background: #fff;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;
		}

		.login-form .btn {
			font-size: 16px;
			font-weight: bold;
			background: #3598dc;
			border: none;
			outline: none !important;
		}

		.login-form .btn:hover,
		.login-form .btn:focus {
			background: #2389cd;
		}

		.login-form a {
			color: #fff;
			text-decoration: underline;
		}

		.login-form a:hover {
			text-decoration: none;
		}

		.login-form form a {
			color: black;
			text-decoration: none;
		}

		.login-form form a:hover {
			text-decoration: underline;
		}
	</style>
</head>

<body>
<h2 class="text-center">Add Chapter:</h2>
	<div class="login-form">
		<form method="post" action="addchpt.php">
			<div class="form-group row">
				<label class="col-form-label col-4">Chapter Name</label>
				<div class="col-8">
					<input type="text" class="form-control" name="chptname" required="required">
				</div>
			</div> 
			<div class="form-group row">
				<div class="col-8 offset-4">
					<input type="submit" name="newchpt" value="Add Chapter"> <br><br>
					<a class='btn' href='chapters.php'>Back</a>
				</div>

		</form>
	</div>
</body>

</html>