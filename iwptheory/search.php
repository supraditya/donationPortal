<!DOCTYPE html>
<html>
<head>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<meta content="utf-8" http-equiv="encoding">
	<title>Donation Site | Search</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="./index.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body>
	<nav class="sitenav">
		<p class="header-shout">Donor Search</p>
		<a href="./home.html"><i class="fa fa-home homeIconStyle" aria-hidden="true"></i></a>
	</nav>
	<form id="searchFormID" action="./search.php" method="POST" class="searchForm form-inline">
		<br>
		<br>
		<div class="form-group">
			<label for="city">City&nbsp;</label>
			<select name="city" id="cityDropdown" class="form-control">
				<option value="%" selected>Any</option>
				<option value="Chennai">Chennai</option>
				<option value="Tambaram">Tambaram</option>
				<option value="Adyar">Adyar</option>
				<option value="Velachery">Velachery</option>
				<option value="Ambattur">Ambattur</option>
				<option value="Avadi">Avadi</option>
				<option value="Perambur">Perambur</option>
			</select>	
		</div>
		<!-- <p class="smaller-shout">AND / OR</p> -->
		<div class="form-group">
			<label for="bloodType">Blood Type&nbsp;</label>
			<!-- Dummy values, fetch from DB -->
			<select name="bloodType" id="bloodTypeDropdown" class="form-control">
				<option value="%" selected>Any</option>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="AB">AB</option>
				<option value="O">O</option>
			</select>
		</div>
		    <label class="radio-inline">
      			<input type="radio" name="rh" value="POSITIVE" checked>+ve
      		</label>
		    <label class="radio-inline">
      			<input type="radio" name="rh" value="NEGATIVE">-ve
      		</label>
		<div class="centerDiv">
			<button type="submit" name="submit" class="btn btn-success">Search</button>
		</div>
	</form>
</body>
<?php
	function formSearch()
	{
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
		echo "<div class='resultsForm centerDiv'>";
		$city=$_POST['city'];
		$blood_type=$_POST['bloodType'];
		$rh=$_POST['rh'];

		echo "<h3>Search Filters: City=$city, Blood Type=$blood_type, Rh=$rh</h3><br><br>";

		$sql="SELECT * FROM donor WHERE City LIKE '$city' AND Blood_Type LIKE '$blood_type' AND Rh LIKE '$rh'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			echo "<table class='table table-hover tableStyle'><thead><tr class='headerStyle'><th scope='col'>Id</th><th scope='col'>Name</th><th scope='col'>City</th><th scope='col'>Phone Number</th><th scope='col'>Blood Type</th><th scope='col'>Rh</th><th scope='col'>Address</th></tr></thead><tbody>";
		  	// output data of each row
			while($row = $result->fetch_assoc()) 
			{
				echo "<tr><td>".$row["Donor_id"]."</td><td>".$row["Name"]."</td><td>".$row["City"]."</td><td>".$row["Phone_Number"]."</td><td>".$row["Blood_Type"]."</td><td>".$row["Rh"]."</td><td>".$row["Address"]."</td></tr>";
			}
		} 
		else 
		{
			echo "<p class='smaller-shout'>No Results</p>";
		}
		echo "</tbody></table></div>";
		$conn->close();
	}
	if(isset($_POST['submit']))
	{
		formSearch();
	}
?>
</html>