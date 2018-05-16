<!doctype html>
<html>
<head>
	<title>
	Fish Creek
	</title>
	<link rel="stylesheet" type="text/css" href="fishcreek.css">
</head>
<body>

<?php	
	$HOSTNAME = 'localhost';
$USERNAME = 'id4935381_akash';
$PASSWORD = 'lawsuite';
$DATABASE = 'id4935381_sharehouse';
	$con = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
?>	
	
<div id="container">
	<h1>Fish Creek Animal Hospital</h1>
	<nav role="navigation">
	<a href="index.php">Home</a><br>
	<a href="services.php">Services</a><br>
	<a href="">Ask the Vet</a><br>
	<a href="subscribe.php">Subscribe</a><br>
	<a href="contact.php">Contact</a><br>
	</nav>
	
	<section>
	<p><a href="contact.php">Contact</a> us if you have a question that you would like answered here.<br></p><br>
	
	<?php
	$query = "SELECT * FROM questions";
	$result=mysqli_query($con,$query);
	
	if($result->num_rows == 0){
		echo '<h4 style="color:red;">Something went wrong while loading questions. Please try again later</h4>';
	}else{
			while ($row = $result->fetch_array()) {
				echo '<h4>'.$row[1].'</h4><p class="answer">'.$row[2].'</p>';
			}
		}	
	$con->close();?>
	
	</section>
	
	<footer>
	Copyright &copy; 2016 Fish Creek Animal Hospital<br>
	<a href="mailto:manmohanakash@halmakkichandrashekar.com">manmohanakash@halmakkichandrashekar.com</a>
	</footer>
<div>
</body>
</html>
