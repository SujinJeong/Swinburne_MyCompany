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
	if (isset ($_POST["jobref"]))
		$jobref=$_POST["jobref"];
	else {
		header ("location:manage.php");
		exit();
	}
	require_once "settings.php";	// Load MySQL log in credentials
	$conn = @mysqli_connect ($host,$user,$pwd,$sql_db);	// Log in and use database
	if ($conn) { // check is database is available for use
		$query = "DELETE FROM EOI WHERE jobref = '$jobref'";
		 
		$result = mysqli_query ($conn, $query);
		if ($result) {								// check if query was successfully executed
			echo "<p>" . mysqli_affected_rows($conn) . " record deleted. </p>";
		} else {
			echo "<p>Delete operation unsuccessful.</p>";
		}
		mysqli_close ($conn);					// Close the database connect
	} else {
		echo "<p>Unable to connect to the database.</p>";
	}
?>	
</body>
</html>