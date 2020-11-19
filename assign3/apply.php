<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="author" content="Sujin Jeong"  />
  <title>Making IT support specialist </title>
   <!-- Viewport set to scasle 1.0-->
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <!-- References to basic CSS file -->
  <link href="styles/style.css" rel="stylesheet"/>
  <!-- References to javascript file -->
  <script src="scripts/apply.js"></script>
	  <script src="scripts/enhancements.js"></script>

</head>
<body id="apply">
<?php
	include_once 'header.inc';
	include_once 'menu.inc';
?>

<form id="regform" method="post" action="processEOI.php" novalidate="novalidate">
	<button id="sec" onclick="myFunction()">Alert in 2 seconds</button>
	<p><label for="jobrefnum">Job reference number</label> 
		<input type="text" name= "jobrefnum" id="jobrefnum" required="required" pattern="[a-zA-Z0-9]{5}" maxlength="20"/>
	</p>
	<p><label for="firstname">First Name</label>
      <input type="text" name= "firstname" id="firstname" required="required" pattern="[a-zA-Z]{1,20}" maxlength="20" />
	<label for="lastname">Last Name</label>
      <input type="text" name= "lastname" id="lastname" required="required" pattern="[a-zA-Z]{1,20}" maxlength="20" />
	  </p>
	  <p>
		<label>Date of birth<input type="text" name="date" id="date" maxlength="10" size="10" placeholder="dd/mm/yyyy"
		/>
		</label><span id="span_birth"></span>
	</p>
		<fieldset id="gender">
		<legend>Gender</legend>
		<p>
		<label><input type="radio" name= "gender" id="male" value="Male" required="required"/>
		Male</label> 
		<label><input type="radio" name= "gender" id="female" value="Female"/>
		Female</label> 
		</p>
		</fieldset>
		<p>
		<label for="StAdress">Street address</label>
      <input type="text" name= "StAdress" id="StAdress" required="required" />
		</p>
		<p>
		<label for="sub">Suburb/town</label>
      <input type="text" name= "sub" id="sub" required="required" />
		</p>
			<p><label for="state">State</label> <span id="span_state"></span>
			<select name="state" id="state">
				<option value="VIC" id="VIC">VIC</option>			
				<option value="NSW" id="NSW">NSW</option>
				<option value="QLD" id="QLD">QLD</option>
				<option value="NT" id="NT">NT</option>
				<option value="WA" id="WA">WA</option>
				<option value="SA" id="SA">SA</option>
				<option value="TAS" id="TAS">TAS</option>
				<option value="ACT" id="ACT">ACT</option>
			</select>
		</p>
		<p>
		<label for="postcode">PostCode</label><span id="span_postcode"></span>
      <input type="text" name= "postcode" id="postcode" />
		</p>
		<p>
		<label for="email">Email Address</label>
      <input type="email" name= "email" id="email" />
		</p>
		<p>
		<label for="phonenum">Phone number</label>
      <input type="text" name= "phonenum" id="phonenum" />
		</p>
		<fieldset id="skills" name="skills">
		<legend>Skill list</legend>
		<p>
			<label><input type="checkbox" name= "skill[]" value="skill1" id="skill1"/>
			Having a working knowledge of common information technologies and systems</label> <br/>
			<label><input type="checkbox" name= "skill[]" value="skill2" id="skill2" />
			Managing multiple projects simultaneously while maintaining high customer service standards</label><br/>
			<label><input type="checkbox" name= "skill[]" value="skill3" id="skill3" />
			Communicating complex concepts to a general audience</label><br/>
			<label><input type="checkbox" name= "skill[]" value="skill4" id="skill4"/>
			Troubleshooting common IT problems</label><br/>
			<label><input type="checkbox" name= "othercheck" value="skill5" id="other"/>
			Other skills</label>
		</p>
		<p><label>Write about your other skills<br/><span id="other_span"></span>
			<textarea name="otherskill" id="othertextarea" rows="15" cols="50" placeholder="Write about your other ability here..."></textarea>
		</label></p>
		</fieldset>
		
	<input type= "submit" value="Submit"/>
	<input type= "reset" value="Reset Form"/>
</form>
<hr>
<?php include 'footer.inc' ?>
</body>
