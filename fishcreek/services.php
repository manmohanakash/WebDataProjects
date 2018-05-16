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
    die("Connection error:".$con->connect_error);
	} 
?>

<div id="container">
	<h1>Fish Creek Animal Hospital</h1>
	
	<nav role="navigation">
	<a href="index.php">Home</a><br>
	<a href="">Services</a><br>
	<a href="askvet.php">Ask the Vet</a><br>
	<a href="subscribe.php">Subscribe</a><br>
	<a href="contact.php">Contact</a><br><br>
	</nav>
	
	<section> 
	<ul>
	<?php
	$query = "SELECT * FROM service";
	$result=mysqli_query($con,$query);
	
	if($result->num_rows == 0){
		echo '<h4 style="color:red;">We are experiencing some issue. Please try after sometime or contact us.</h4>';
	}else{
			while ($row = $result->fetch_array()) {
				echo '<li><h4>'.$row[1].'</b></li><p id="no_tab">'.$row[2].'</p>';
			}
		}
	$con->close();
	?>
	</ul>

	</section> 
	
	<footer>
	Copyright &copy; 2016 Fish Creek Animal Hospital<br>
	<a href="mailto:manmohanakash@halmakkichandrashekar.com">manmohanakash@halmakkichandrashekar.com</a>
	</footer>
	
	</div>
</body>
</html>
