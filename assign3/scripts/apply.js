/**
* Author: Sujin Jeong 102442426
* Target: apply.php
* Purpose: File for Assignment 3
* Created: 01/05/2019
* Last Updated: 29/05/2019
* Credits: 
*/

"use strict"; // prevents creation of global variables in functions
/*get variable from form and check rules*/
function validate() {
	//initialize local variables
	var errMsg="";
	var result=true;
	var job = document.getElementById("jobrefnum").value;
	var firstname = document.getElementById("firstname").value;
	var lastname = document.getElementById("lastname").value;
	var StAdress = document.getElementById("StAdress").value;
	var sub = document.getElementById("sub").value;
	var postcode = document.getElementById("postcode").value;
	var email = document.getElementById("email").value;
	var phonenum = document.getElementById("phonenum").value;
	var dobStr = document.getElementById("date").value;
	var other = document.getElementById("other").checked;
	var DateMsg="";
	
	
	//check date of birth format
	 DateMsg = isDobOK();
	
	// var age = getAgeinYear(dobStr);
	if (age < 15 || age > 80) {
		DateMsg += ", Your Age must be between 15 to 80\n";
		document.getElementById("span_birth").innerHTML = DateMsg;
		result = false;
	}
	
	
	//check postcode
	var tempMsg = checkPost();
	if (tempMsg != "") {
		document.getElementById("span_postcode").innerHTML =tempMsg;
		result = false;
	}
	
	
	if (other && document.getElementById("othertextarea").value.trim().length == 0) {
		document.getElementById("other_span").innerHTML = "You have to write about other skills";
		result = false;
	}
	
	
	
	if (result) { //if the form validates ok.
	//As result is a Boolean variable saying (result) is the same as saying (result == true)
		storeInfo(job, firstname, lastname, dobStr, StAdress, sub, postcode, email, phonenum);
	}
	
	return result;
}

function getState() {
	var stateName = "Unknown";
	var stateArray = document.getElementById("state").getElementsByTagName("option");
	
		for (var i = 0; i < stateArray.length; i++) {
		if(stateArray[i].selected) //test if radio button is selected
			stateName = stateArray[i].value; // assign the value attributes
		}	
	return stateName;
}

function getGender() {
	var genderName ="";
	var genderArray = document.getElementById("gender").getElementsByTagName("input");
		for (var i = 0; i < genderArray.length; i++) {
		if(genderArray[i].checked) //test if radio button is selected
			genderName = genderArray[i].value; // assign the value attributes
		}	
	return genderName;

}

function getSkill() {
	var skillName="";
	var skillArray = document.getElementById("skills").getElementsByTagName("input");
		for (var i = 0; i < skillArray.length; i++) {
		if(skillArray[i].checked) //test if radio button is selected
			skillName = skillArray[i].value; // assign the value attributes
		}	
	return skillName;
}

//Check selected state match first digit of postcode
function checkPost() {
	
	var errMsg = "";	
		
	// var strUser = e.options[e.selectedIndex].text;
	var postCode = document.getElementById("postcode").value;
	var firstNum = postCode.charAt(0);
	
	switch(getState()) {
		case "VIC": 
			if (!(firstNum == 3 || firstNum == 8)) {
				errMsg = "VIC postcode starts wiht 3 or 8\n";
			}
			break;
		case "NSW":
			if (!(firstNum == 1 || firstNum == 2)) {
				errMsg = "NSW postcode starts wiht 1 or 2\n";
			}
			break;
		case "QLD":
			if (!(firstNum == 4 || firstNum == 9)) {
				errMsg = "QLD postcode starts with 4 or 9\n";
			}
			break;
		case "NT":
			if (firstNum != 0) {
				errMsg = "NT postcode starts with 0\n";
			}
			break;
		case "WA":
			if (firstNum != 6) {
				errMsg = "WA postcode starts with 6\n";
			}
			break;
		case "SA":
			if (firstNum != 5) {
				errMsg = "SA postcode starts with 5\n";
			}
			break;
		case "TAS":
			if (firstNum != 7) {
				errMsg = "TAS postcode starts with 7\n";
			}
			break;
		case "ACT":
			if (firstNum != 0) {
				errMsg = "ACT postcode starts with 0\n";
			}
			break;
	}
	
	return errMsg;
}
// Validates that the input string is a valid date formatted as "dd/mm/yyyy"
function isDobOK() 
{
    var validDOB = true;
	var now = new Date();
	var dob = document.getElementById("date").value;
	var dateMsg="";
	var dmy = dob.split("/");
	for (var i = 0; i < dmy.length; i++) {
		if (isNaN(dmy[i])) {
			dateMsg = "You must enter only numbers into the date" + "\n";
			validDOB = false;
		}
	}
	
	if (dmy[0].length != 2 || dmy[1].length != 2 || dmy[2].length != 4) {
		dateMsg = dateMsg + "You must enter dd/mm/yyyy type" + "\n";
		validDOB = false;
	}
	
	if (validDOB == false)
		document.getElementById("span_birth").innerHTML = dateMsg;
	
	return dateMsg;
}

function getAgeinYear(dobStr) {
	var age = -1;
	const YEAR_IN_MILLISECS = 365*24*60*60*1000;
	var now = new Date();
	var dmy = dobStr.split("/");
	var dob = new Date(dmy[2],dmy[1],dmy[0],0,0,0);
	return age = (now.valueOf() - dob.valueOf())/YEAR_IN_MILLISECS;
}

function storeInfo(job, firstname, lastname, date, StAdress, sub, postcode, email, phonenum) {
	//get values and assign them to a sessionStorage attribute.
	//we use the same name for the attribute and the element id to avoid confusion
	  var state = getState();
	  var gender = getGender();
	  var skill = getSkill();
	  
	sessionStorage.job = job;
	sessionStorage.firstname = firstname;
	sessionStorage.lastname = lastname;
	sessionStorage.date = date;
	sessionStorage.gender = gender;
	sessionStorage.StAdress = StAdress;
	sessionStorage.sub = sub; 
	sessionStorage.postcode = postcode; 
	sessionStorage.email = email; 
	sessionStorage.phonenum = phonenum; 
	sessionStorage.state = state; 
	sessionStorage.gender = gender; 
	sessionStorage.skill = skill; 
}

/* check if session data on user exists and if so prefill the form*/
function prefill_form() {
	if (sessionStorage.firstname != undefined) { //if storage for username is not empty
	var jobref = localStorage.getItem('jobrefnumber')
    if (jobref != null){
    document.getElementById("jobrefnum").value = localStorage.getItem('jobrefnumber');}
    else{
      document.getElementById("jobrefnum").value = sessionStorage.job;
    }
		document.getElementById("firstname").value = sessionStorage.firstname;
		document.getElementById("lastname").value = sessionStorage.lastname;
		document.getElementById("date").value = sessionStorage.date;
		
		switch(sessionStorage.gender) {
			case "Male":
			document.getElementById("male").checked = true;
			break;
			case "Female":
			document.getElementById("female").checked = true;
			break;
		}
		document.getElementById("StAdress").value = sessionStorage.StAdress;
		document.getElementById("sub").value = sessionStorage.sub;
		
		switch(sessionStorage.state) {
			case "VIC":
			document.getElementById("VIC").selected = true;
			break;
			case "NSW":
			document.getElementById("NSW").selected = true;
			break;
			case "QLD":
			document.getElementById("QLD").selected = true;
			break;
			case "NT":
			document.getElementById("NT").selected = true;
			break;
			case "WA":
			document.getElementById("WA").selected = true;
			break;
			case "SA":
			document.getElementById("SA").selected = true;
			break;
			case "TAS":
			document.getElementById("TAS").selected = true;
			break;
			case "ACT":
			document.getElementById("ACT").selected = true;
			break;
		}
		
		switch(sessionStorage.skill) {
			case "skill1":
			document.getElementById("skill1").checked = true;
			break;
			case "skill2":
			document.getElementById("skill2").checked = true;
			break;
			case "skill3":
			document.getElementById("skill3").checked = true;
			break;
			case "skill4":
			document.getElementById("skill4").checked = true;
			break;
			case "skill5":
			document.getElementById("other").checked = true;
			break;
		}
	}
		document.getElementById("postcode").value = sessionStorage.postcode;
		 
		if (sessionStorage.postcode == undefined)
			document.getElementById("postcode").value = "";
		
		document.getElementById("email").value = sessionStorage.email;
		
		if (sessionStorage.email == undefined)
			document.getElementById("email").value = "";
		
		document.getElementById("phonenum").value = sessionStorage.phonenum;
		
		if (sessionStorage.phonenum == undefined)
			document.getElementById("phonenum").value = "";
		
}

//this function is called when the browser window loads
//it will register functions that will respond to browser events

function setJob1() {
			var jobrefNum = "IT001";
			localStorage.jobrefnumber = jobrefNum;
}
function setJob2() {
			var jobrefNum = "IT002";
			localStorage.jobrefnumber = jobrefNum;
}
function init() {
	
	// var debug = false;
	if (document.getElementById("jobs") != null) {
		// get id
		var job1 = document.getElementById("job1");
		job1.onclick =setJob1;
		var job1 = document.getElementById("job2");
		job1.onclick =setJob2;

	} 
	
	if (document.getElementById("apply") != null) {
		//set id
		//alert(localStorage.jobrefnumber);
		var regForm = document.getElementById("regform");//get ref to the HTML element
		// regForm.onsubmit = validate;//register the event listener
		document.getElementById("jobrefnum").value = localStorage.jobrefnumber;
		document.getElementById("jobrefnum").readOnly = true;
		prefill_form();
	}
}

window.onload = init;