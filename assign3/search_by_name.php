<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8 " />
	<title>PHP - MySQL Select (Check - Display) Template</title>
	<link rel="stylesheet" href="styles/style.css" />
	<!-- other meta here -->
</head>
<body>
<?php
	include_once "header.inc";
	include_once "menu.inc";
?>
<?php
		if (!isset($_POST["fn"])&&!isset($_POST["ln"]))
		$query = "SELECT * FROM EOI;";	
	else {
		$fn=trim($_POST["fn"]);
		$ln=trim($_POST["ln"]);
		$query="SELECT * FROM EOI WHERE fname LIKE '%$fn%' and lname LIKE '%$ln%'";
	}
	
	require_once "settings.php";	// Load MySQL log in credentials
	$conn = mysqli_connect ($host,$user,$pwd,$sql_db);	// Log in and use database
	if ($conn) { // check is database is available for use
 
		$result = mysqli_query ($conn, $query);
		
		if ($result) {								// check if query was successfully executed
			
			$record = mysqli_fetch_assoc ($result);
			if ($record) {							// check if any record exists
				echo "<h3>Result of searching by Name!!</h3>";
				echo "<table border='1'>";
				echo "<tr><th>ID</th><th>Job Ref</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Street Address</th><th>Suburb/Town</th><th>State</th><th>Post Code</th><th>Email Address</th><th>Phone Number</th><th>DOB</th><th>Skills</th><th>Other skills</th><th>Application Date</th><th>Status</th><th>Change Status</th></tr>";
				while ($record) {
					echo "<tr><td>{$record['id']}</td>";
					echo "<td>{$record['jobref']}</td>";
					echo "<td>{$record['fname']}</td>";
					echo "<td>{$record['lname']}</td>";
					echo "<td>{$record['gender']}</td>";
					echo "<td>{$record['stadd']}</td>";
					echo "<td>{$record['sub']}</td>";
					echo "<td>{$record['state']}</td>";
					echo "<td>{$record['post']}</td>";
					echo "<td>{$record['email']}</td>";
					echo "<td>{$record['phonenum']}</td>";
					echo "<td>{$record['dob']}</td>";
					echo "<td>{$record['skills']}</td>";
					echo "<td>{$record['other']}</td>";
					echo "<td>{$record['app_date']}</td>";
					echo "<td>{$record['status']}</td>";
					echo "<td><a href='new.php?id=" . $record['id'] 
					            . "'>New</a>
								<a href='current.php?id=" . $record['id'] 
					            . "'>Current</a>
								<a href='final.php?id=" . $record['id'] 
					            . "'>Final</a></td>";
					$record = mysqli_fetch_assoc($result);
				}
				echo "</table>";
				mysqli_free_result ($result);	// Free up resources
			} else {
				echo "<p>No records retrieved.</p>";
			}
		} else {
			echo "<p>Job application table doesn't exist or select operation unsuccessful.</p>";
		}
		mysqli_close ($conn);					// Close the database connect
	} else {
		echo "<p>Unable to connect to the database.</p>";
	}
?>	
</body>
</html>