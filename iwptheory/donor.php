	<!DOCTYPE html>
	<html>
	<head>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">
		<title>Donor Registration | Success</title>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="./index.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
	</head>
	<body>
		<nav class="sitenav">
			<p class="header-shout">Success!</p>
			<a href="./home.html"><i class="fa fa-home homeIconStyle" aria-hidden="true"></i></a>
		</nav>
	</body>
	</html>

	<?php
		$servername = "localhost";
		$username = "root";
		$password = "aditya2000";
		$dbname = "donation_schema";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		// Form submission data
		$name=$_POST["name"];
		$city=$_POST["city"];
		$phone=$_POST["phone"];
		$bloodType=$_POST["bloodType"];
		$rh=$_POST["rh"];
		$address=$_POST["address"];
		$sql = "INSERT INTO donor VALUES (NULL, '$name', '$city', '$phone', '$bloodType', '$rh', '$address')";
		if ($conn->query($sql) === TRUE) {
		  echo "<div class='container centerDiv'><div>
			<i class='fas fa-check iconStyle'></i>
			<p class='cardText'>New Donor Added Successfully!</p>
		</div></div>";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	?>