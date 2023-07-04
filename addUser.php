<?php
session_start();
if (!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin'] !== true) {
	header("Location: login.php");
	exit;
} else {
	include "navbar.php";
	require "db.php";

	if (isset($_POST["newUser"])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$age = $_POST['age'];
		$password = $_POST['password'];
		$type = $_POST['type'];
		$query = "INSERT INTO `userdata`(`firstname`, `lastname`, `email`, `age`, `password`) VALUES ('$firstname','$lastname','$email','$age','$password')";
		$add_result = mysqli_query($conn, $query);
		$query2 = "SELECT id FROM `userdata` WHERE email = '$email' and password = '$password'";
		$add_result2 = mysqli_query($conn, $query2);
		$row = mysqli_fetch_array($add_result2);
		$id = $row['id'];
		$query3 = "INSERT INTO `usertype`(`user_id`, `access_type`) VALUES ('$id','$type')";
		$add_result3 = mysqli_query($conn, $query3);
		header("Location: dashboard.php");
	}
}
?>

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
        background-color: #ffdcf3;
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
			width: 450px;
			height: 500px;
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
	<div class="login-form">
		<h2>Add New User Details</h2>
		<form method="post" action="addUser.php">
			<div class="form-group row">
				<label class="col-form-label col-4">First Name <span style="color:red">*</span></label>
				<div class="col-8">
					<input type="text" class="form-control" name="firstname" required="required">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-4">Last Name<span style="color:red">*</span></label>
				<div class="col-8">
					<input type="text" class="form-control" name="lastname" required="required">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-4">Email<span style="color:red">*</span></label>
				<div class="col-8">
					<input type="text" class="form-control" name="email" required="required">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-4">Age<span style="color:red">*</span> </label>
				<div class="col-8">
					<input type="text" class="form-control" name="age" required="required">
				</div>	
			</div>
			<div class="form-group row">
				<label class="col-form-label col-4">Password<span style="color:red">*</span></label>
				<div class="col-8">
					<input type="password" class="form-control" name="password" required="required">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-4">Usertype<span style="color:red">*</span></label>
				<select class="col-8" aria-label="Default select example" name="type">
					<option selected>select user type here</option>
					<?php
					$query1 = "SELECT * FROM `accesstype`";
					$result1 = mysqli_query($conn, $query1);
					while ($row = mysqli_fetch_array($result1)) {
						echo "<option value=" . $row['type'] . " name=" . $row['type'] . ">" . $row['type'] . "</option>";
					}
					?>
				</select>
			</div>
			<div class="form-group row">
				<div class="col-8 offset-4">
					<input cl type="submit" name="newUser" value="Add User"> <br><br>
					<a class='btn' href='dashboard.php'>Back</a>

				</div>

		</form>
	</div>
</body>

</html>