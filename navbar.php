<?php  
session_start();
if (!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);    
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .d-flex{
        margin-left: auto;
    }

    .btn-logout{
        border-radius: 5px;
    }
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary ">
<div class="container-fluid">
  <a class="navbar-brand" href="dashboard.php">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item<?php if($curPageName === 'dashboard.php') echo ' active';?>">
        <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item<?php if($curPageName === 'student.php') echo ' active';?>">
        <a class="nav-link" href="student.php">Student</a>
    </li>
    <li class="nav-item<?php if($curPageName === 'standards.php') echo ' active';?>">
        <a class="nav-link" href="standards.php">Standard</a>
    </li>
    <li class="nav-item<?php if($curPageName === 'subjects.php') echo ' active';?>">
        <a class="nav-link" href="subjects.php">Subject</a>
    </li>
    <li class="nav-item<?php if($curPageName === 'chapters.php') echo ' active';?>">
        <a class="nav-link" href="chapters.php">Chapter</a>
    </li>
    <li class="nav-item<?php if($curPageName === 'addUser.php') echo ' active';?>">
      <a class="nav-link" href="addUser.php">Add User <span class="sr-only">(current)</span></a>
    </li>
</ul>
    <form class="d-flex" role="search">
    <a href="logout.php"><input class="btn btn-success btn-logout" type="button" value="Log Out"></a>
      </form>
  </div>
</div>
</nav>
</body>
</html>