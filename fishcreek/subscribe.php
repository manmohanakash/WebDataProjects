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
		die("Connection failed: " .$con->connect_error);
	}
$flag=0;	
?>

<div id="container">

	<h1>Fish Creek Animal Hospital</h1>
	
	<nav role="navigation">
	<a href="index.php">Home</a><br>
	<a href="services.php">Services</a><br>
	<a href="askvet.php">Ask the Vet</a><br>
	<a href="">Subscribe</a><br>
	<a href="contact.php">Contact</a><br>
	</nav>
	
	<section> 
	<h2>Subscribe Fish Creek</h2>
		
	<?php 
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(!empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password']) && !empty($_POST['type_of_service']) && !empty($_POST['pet'])){
			$name = $_POST['name'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$password = $_POST['password'];
			$type_of_service = $_POST['type_of_service'];
			$pet = $_POST['pet'];
			
			if(preg_match('/^\d{10}$/',$phone )){
				if(preg_match("/^\w+([.-]\w+)*@\w+([.-]\w+)*\.\w{2,3}$/",$email)){  //or  filter_var($email,FILTER_VALIDATE_EMAIL)
					if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/",$password)){
						
						
						$query = 'SELECT * FROM client WHERE email="'.$email.'"';
						$result=mysqli_query($con,$query);
						
						if($result->num_rows == 0){
							
						$sql = "INSERT INTO client(name,address,phone,email,password) values (?,?,?,?,?)";
						$stmt = $con->prepare($sql);
						$stmt->bind_param("ssiss",$name,$address,$phone,$email, password_hash($password, PASSWORD_BCRYPT));
						$stmt->execute();
						$stmt->close();
						
						
						//Get client Id which was created
						$query = 'SELECT * FROM client WHERE email="'.$email.'"';
						$result=mysqli_query($con,$query);
						$row = $result->fetch_array();
						$clientid=$row[0];
						
						//Get Service Id
						$query = 'SELECT * FROM service WHERE servicename="'.$type_of_service.'"';
						$result=mysqli_query($con,$query);
						$row = $result->fetch_array();
						$serviceid=$row[0];
						
						//Get the Pet ID
						$query = 'SELECT petid FROM pet WHERE petname="'.$pet.'"';
						$result=mysqli_query($con,$query);
						$row = $result->fetch_array();
						$petid=$row[0];
						
						//Insert the service
						$sql = "INSERT INTO `subscription`(`clientid`, `serviceid`, `petid`, `date`) VALUES (?,?,?,?)";
						$stmt = $con->prepare($sql);
						$today = date("Y-m-d");
						$stmt->bind_param("iiis",$clientid,$serviceid,$petid,$today);
						$stmt->execute();
						$stmt->close();
						
						
						echo "<div class=\"msgalert\">Your request has been submitted.</div>";
						$flag=1;
						}
						else{
							$row = $result->fetch_array(); 
							$clientid = $row[0];
							$hashpass = $row[5];
							if (password_verify($password, $hashpass)){
								
								$subscribed=0;
								
								$query = 'SELECT * FROM service WHERE servicename="'.$type_of_service.'"';
								$result=mysqli_query($con,$query);
								$row = $result->fetch_array();
								$serviceid=$row[0];
						
								$query = 'SELECT petid FROM pet WHERE petname="'.$pet.'"';
								$result=mysqli_query($con,$query);
								$row = $result->fetch_array();
								$petid=$row[0];
								
								//Check if already subscribed
								$query = 'SELECT * FROM subscription WHERE clientid="'.$clientid.'"';
								$result=mysqli_query($con,$query);
								while($row = $result->fetch_array()){
									if($row[1]==$serviceid && $row[2]==$petid)
										$subscribed=1;
								}
								
								
								
								if($subscribed!=1){
								$sql = "INSERT INTO `subscription`(`clientid`, `serviceid`, `petid`, `date`) VALUES (?,?,?,?)";
								$stmt = $con->prepare($sql);
								$today = date("Y-m-d");
								$stmt->bind_param("iiis",$clientid,$serviceid,$petid,$today);
								$stmt->execute();
								$stmt->close();
								//sucess message
								echo "<div class=\"msgalert\">Your request has been submitted.</div>";
								$flag=1;
								}
								else{
								echo "<div class=\"msgalert\">You are already subbscribed for this service.</div>";	
								}
							}
							else{
								echo  "<div class=\"erralert\">Incorrect Password</div>";
							}
						}
						
					}
					else
						echo "<div class=\"erralert\">Password should match the below requirement<ul><li>Should contain 8 to 16 characters</li><li>one uppercase</li><li>one lowercase</li><li>one digit</li></ul></div>";
				}
				else
					echo "<div class=\"erralert\">Please enter valid E-mail. example: name@domain.com.</div>";
			}
			else
				echo "<div class=\"erralert\">Please enter valid 10 digit Phone number. example: 9812312331</div>";
		}
		else{
			echo "<div class=\"erralert\">Please fill below missing fields.<br><ol>";
				if(empty($_POST['name'])) echo "<li>Name</li>";
				if(empty($_POST['address'])) echo "<li>Address</li>";
				if(empty($_POST['email'])) echo "<li>E-mail</li>";
				if(empty($_POST['phone'])) echo "<li>Phone</li>";
				if(empty($_POST['password'])) echo "<li>Password</li>";
				if(empty($_POST['type_of_service'])) echo "<li>Type of Service</li>";
				if(empty($_POST['pet'])) echo "<li>Pet</li>";
			echo "</ol></div>";
		}
	}
	
	?>
	<p>Required fields are marked with an asterisk(*).
	
	<form  name="subscribe_form" action=""  onsubmit = "return validateForm2()" method="POST">
	<table id="form">
	
	<tr><th>*Client Full Name:</th><td><input type="text" name="name" id="name" <?php if($_SERVER["REQUEST_METHOD"] == "POST" && $flag==0 )echo 'value="'. $_POST['name'].'"'; ?>></td></tr>
	<tr><th>*Address:</th><td><input type="text" name="address" id="address" <?php if($_SERVER["REQUEST_METHOD"] == "POST"  && $flag==0 )echo 'value="'. $_POST['address'].'"'; ?>></td></tr>
	<tr><th>*E-mail:</th><td><input type="text" name="email" id="email" <?php if($_SERVER["REQUEST_METHOD"] == "POST"  && $flag==0 )echo 'value="'. $_POST['email'].'"'; ?>></td></tr>
	<tr><th>*Phone:</th><td><input type="text" name="phone" id="phone" <?php if($_SERVER["REQUEST_METHOD"] == "POST"  && $flag==0 )echo 'value="'. $_POST['phone'].'"'; else echo 'value=""'; ?>></td></tr>
	<tr><th>*Password:</th><td><input type="password" name="password" id="password" <?php if($_SERVER["REQUEST_METHOD"] == "POST"  && $flag==0 )echo 'value="'. $_POST['password'].'"'; else echo 'value=""'; ?>></td></tr>
	<tr><th>*Type of <br>Service:</th>
		<td><select name="type_of_service" id="type_of_service">
			<option disabled selected value> -- select an option -- </option>
			<?php
			$query = "SELECT * FROM service";
			$result=mysqli_query($con,$query);
			while ($row = $result->fetch_array()) {
				if($_SERVER["REQUEST_METHOD"] == "POST"  && $flag==0 && $_POST['type_of_service']==$row[1] ){
					echo '<option value="'.$row[1].'" selected="selected">'.$row[1].'</option>';
				}
				else
					echo '<option value="'.$row[1].'">'.$row[1].'</option>';
			}
			?>
			</select></td></tr>
	<tr><th>*Pet:</th>
		<td><select name="pet" id="pet">
			<option disabled selected value> -- select an option -- </option>
			<?php	
			$query = "SELECT * FROM pet";
			$result=mysqli_query($con,$query);
			while ($row = $result->fetch_array()) {
				if($_SERVER["REQUEST_METHOD"] == "POST"  && $flag==0 && $_POST['pet']==$row[1] ){
					echo '<option value="'.$row[1].'" selected="selected">'.$row[1].'</option>';
				}
				else
					echo '<option value="'.$row[1].'">'.$row[1].'</option>';
			}
			?>
			</select></td></tr>
	<tr><td></td><td><input type="submit" value="Send Now"></td></tr>
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
