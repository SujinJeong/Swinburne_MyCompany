
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

function sanitise_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
	// validate form data, echo message
	if (!isset($_POST["jobrefnum"])) {
		header("location:apply.php");
		exit();
	}
	$err_msg="";
	
	// get value.      validate and sanitise the values
	$jobref=trim($_POST["jobrefnum"]);
	if (!preg_match('/^[a-zA-Z0-9]{5}$/',$jobref))
		$err_msg .= "<p>Invalid job referce number.</p>";

	$fname=$_POST["firstname"];
	if ($fname == "")
		$err_msg .= "<p>Please enter first name. </p>";
	else {
		$fname = sanitise_input($fname);
		if (!preg_match('/^[a-zA-Z]{1,20}$/',$fname))
			$err_msg .= "<p>Invalid first name.</p>";
	}

	$lname=$_POST["lastname"];
	if ($lname == "")
		$err_msg .= "<p>Please enter last name. </p>";
	else {
		$lname = sanitise_input($lname);
		if (!preg_match('/^[a-zA-Z]{1,20}$/',$lname))
			$err_msg .= "<p>Invalid last name.</p>";
	}
	
	if (isset($_POST["gender"]))    // radio button
		$gender=$_POST["gender"];
	else
		$err_msg .="<p>Please select the gender</p>";
	
	$stadd=$_POST["StAdress"];
	if ($stadd == "")
		$err_msg .= "<p>Please enter the street name</p>";
	else {
		$sttadd = sanitise_input($stadd);
		if (strlen($stadd) > 40)
			$err_msg .= "<p>Invalid street address.</p>";
	}
	
	$sub=$_POST["sub"];
	if ($sub == "")
		$err_msg .= "<p>Please enter the suburb/town</p>";
	else {
		$sub = sanitise_input($sub);
		if (strlen($sub) > 40)
			$err_msg .= "<p>Invalid subrub/town.</p>";
	}
	
	if (isset($_POST["state"]))    // select option
		$state=$_POST["state"];
	else
		$err_msg .="<p>Please select the state</p>";
		
	$post=$_POST["postcode"];
	if ($post == "")
		$err_msg .= "<p>Please enter the post code</p>";
	else {
		$post = sanitise_input($post);
		if (!preg_match('/^\d{4}$/',$post))
			$err_msg .= "<p>Invalid post code.</p>";

			switch($state) {
				case "VIC": 
					if (!($post[0] == 3 || $post[0] == 8)) {
						$err_msg .= "VIC postcode starts with 3 or 8\n";
					}
					break;
				case "NSW":
					if (!($post[0] == 1 || $post[0] == 2)) {
						$err_msg .= "NSW postcode starts wiht 1 or 2\n";
					}
					break;
				case "QLD":
					if (!($post[0] == 4 || $post[0] == 9)) {
						$err_msg .= "QLD postcode starts with 4 or 9\n";
					}
					break;
				case "NT":
					if ($post[0] != 0) {
						$err_msg .= "NT postcode starts with 0\n";
					}
					break;
				case "WA":
					if ($post[0] != 6) {
						$err_msg .= "WA postcode starts with 6\n";
					}
					break;
				case "SA":
					if ($post[0] != 5) {
						$err_msg .= "SA postcode starts with 5\n";
					}
					break;
				case "TAS":
					if ($post[0] != 7) {
						$err_msg .= "TAS postcode starts with 7\n";
					}
					break;
				case "ACT":
					if ($post[0] != 0) {
						$err_msg .= "ACT postcode starts with 0\n";
					}
					break;
			}
		
	}

	$email=$_POST["email"];
	if ($email == "")
		$err_msg .= "<p>Please enter the email</p>";
	else {
		$email=sanitise_input($email);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$err_msg .= "<p>Invalid email.</p>";
		}
	}
	
	$phonenum=$_POST["phonenum"];
	if ($phonenum == "") 
		$err_msg .= "<p>Please enter the phone number</p>";
	else {
		$phonenum=sanitise_input($phonenum);
		if (!preg_match('/^[0-9 ]{8,12}$/',$phonenum))
			$err_msg .= "<p>Invalid phone number.</p>";
	}
	
	if (isset($_POST["skill"]))    // check box
		$skills=$_POST["skill"];
	else if (isset($_POST["othercheck"]))
		$otherskills = $_POST["othercheck"];
	else
		$err_msg .= "<p>Please select skills.</p>";

	$explainother=$_POST["otherskill"];
	 if (isset($_POST["othercheck"])&& $explainother ==""){
         $err_msg .= "<p>Please explain your other skills. </p>";
	}
  
	$dob=$_POST["date"];	// dob
	if ($dob == "")
		$err_msg .= "<p>Please enter the date of birth</p>";
	else {
		$dob=sanitise_input($dob);
		if (!preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $dob)){
			$err_msg .= "<p>Please enter your date of birth follow the dd/mm/yyyy format.</p>";
		}
		else {
			$dob=explode("/", $dob);
			$dob=$dob[2] . "-" . $dob[1] . "-" . $dob[0];
			
			$dateDob = date_create($dob);
			$dateNow = date_create();
			$age = date_diff($dateDob, $dateNow);
			$age = date_interval_format($age, "%Y");
			
			if ($age<15 || $age>80)
				$err_msg .= "<p>You age is NOT between 15 and 80.</p>";
		}	
	}
	
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
					jobref VARCHAR(6),
					fname VARCHAR(25),
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
					VALUES ('$jobref', '$fname','$lname', '$gender', '$dob','$stadd','$sub','$state','$post','$email','$phonenum', '". implode(',', $skills) . "','$explainother', CURDATE(), 'new');";
 
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
