<!DOCTYPE html>
<html lang="en">
<head>
<title>ASssignment 3</title>

<meta charset="utf-8" />
<meta name="description" content="Lab 10"  />
<meta name="keywords" content="PHP, File, input, output" />
  <link href="styles/style.css" rel="stylesheet"/>
</head>
<body>
<?php
	include_once "header.inc";
	include_once "menu.inc";
?>
<?php
	$jobinfo=trim($_POST["job1_info"]);
	if ()
	$jobref=trim($_POST["job2_info"]);
	$jobref=trim($_POST["jobrefnum"]);
	$jobref=trim($_POST["jobrefnum"]);
	
	if ($err_msg!=""){
		echo $err_msg;
	}
	else {
		//connect to db, create table, insert record
	require_once("settings.php");
	$conn = @mysqli_connect($host,$user,$pwd,$sql_db);
	
	if ($conn) { // check is database is available for use
		$query = "CREATE TABLE IF NOT EXISTS EOI (
					id INT AUTO_INCREMENT PRIMARY KEY, 
					jobinfo VARCHAR(50),
					jobrefnum VARCHAR(5),
					lname VARCHAR(25),
					stadd VARCHAR(40),
					sub VARCHAR(40),
					state VARCHAR(5),
					post INT(4),
					email VARCHAR(30),
					phonenum VARCHAR(12),
					gender VARCHAR(10),
					dob DATE,
					skills VARCHAR(50),
					other VARCHAR(50),
					app_date DATE,
					status VARCHAR(20)
					);";
					
		$result = mysqli_query ($conn, $query);
		if ($result) {								// check if query was successfully executed

			$query = "INSERT INTO EOI (jobref, fname, lname, gender, dob,stadd,sub,state,post,email,phonenum, skills,other,app_date, status) 
					VALUES ('$jobref', '$fname','$lname', '$gender', '$dob','$stadd','$sub','$state','$post','$email','$phonenum', '" . implode(',', $skills) . "','$explainother', CURDATE(), 'new');";
 
			$insert_result = mysqli_query ($conn, $query);

			if ($insert_result) {			// check if insert successfully 
				echo "<p>Insert  successful. Your application number is " . mysqli_insert_id($conn) . ".</p>";
			} else {
				echo "<p>Insert  unsuccessful.</p>";
			}
		} else {
			echo "<p>Create table operation unsuccessful.</p>";
		}
		mysqli_close ($conn);					// Close the database connect
	} else {
		echo "<p>Unable to connect to the database.</p>";
	}
	}
?>
</body>
</html>