<!doctype html>
<html>
<head>
	<title>
	Fish Creek
	</title>
	<link rel="stylesheet" type="text/css" href="fishcreek.css">
</head>
<body >
<?php
  $HOSTNAME = 'localhost';
$USERNAME = 'id4935381_akash';
$PASSWORD = 'lawsuite';
$DATABASE = 'id4935381_sharehouse';
  $con = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
  if ($con->connect_error)
    die("Connection failed: " . $con->connect_error); 
 ?>
<div id="container">
	
	<h1>Fish Creek Animal Hospital</h1>
	
	<nav role="navigation">
	<a href="index.php">Home</a><br>
	<a href="services.php">Services</a><br>
	<a href="askvet.php">Ask the Vet</a><br>
	<a href="subscribe.php">Subscribe</a><br>
	<a href="">Contact</a><br>
	</nav>
	
	<section> 
	<h2>Contact Fish Creek</h2>
	<?php 
	$submitted = 0 ;
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(!empty($_POST['name'])&& !empty($_POST['email']) && !empty($_POST['comments'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$comments = $_POST['comments'];
		if(preg_match("/^\w+([.-]\w+)*@\w+([.-]\w+)*\.\w{2,3}$/",$email)){ //or  filter_var($email,FILTER_VALIDATE_EMAIL)
			$sql = "INSERT INTO contact(name,email,comments) values (?,?,?)";
			$stmt = $con->prepare($sql);
			$stmt->bind_param("sss",$name, $email,$comments);
			$stmt->execute();
			$stmt->close();
			$con->close();
			$submitted = 1;
			echo "<div class=\"msgalert\">Your request has been submitted.</div>";
		}
			else{
				echo "<div class=\"erralert\">Enter valid Email id. example: name@domain.com.</div>";
		}
		}
		else{
			echo "<div class=\"erralert\">Please fill below empty fields.<br><ul>";
				if(empty($_POST['name'])) echo "<li>Name</li>";
				if(empty($_POST['email'])) echo "<li>E-mail</li>";
				if(empty($_POST['comments'])) echo "<li>Comments</li>";
			echo "</ul></div>";
		}
	}
	 ?>
	<p>Required fields are marked with an asterisk(*).
	
	<form  name="contact_form" action=""  onsubmit = "return validateForm1()" method="POST">
	<table id="form">
	<tr>
		<th>*Name:</th>
		<td><input type="text" name="name" id="name" <?php if($_SERVER["REQUEST_METHOD"] == "POST" && $submitted==0) echo 'value="'. $_POST['name'].'"'; ?>></td>
	</tr>
	<tr>
		<th>*E-mail:</th>
		<td><input type="text" name="email" id="email" <?php if($_SERVER["REQUEST_METHOD"] == "POST" && $submitted==0) echo 'value="'. $_POST['email'].'"'; ?>></td>
	</tr>
	<tr>
		<th>*Comments:</th>
		<td><textarea name="comments" id ="comments"  rows = "3" cols = "30" ><?php if($_SERVER["REQUEST_METHOD"] == "POST" && $submitted==0) echo $_POST['comments']; ?></textarea></td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" value="Send Now"></td>
	</tr>
	</table>
	</form>
	</p>
	
	</section> 
	
	<footer>
	Copyright &copy; 2016 Fish Creek Animal Hospital<br>
	<a href="mailto:manmohanakash@halmakkichandrashekar.com">manmohanakash@halmakkichandrashekar.com</a>
	</footer>
	
</div>

</body>
</html>