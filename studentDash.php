<h1>Welcome <?php session_start(); echo $_SESSION['type'] ." - ". $_SESSION['name'] ; ?></h1>
<a href="logout.php"><input type="button" value="Log Out"></a>