
var myAlarm;

function myFunction() {
  myAlarm = setTimeout(alarmFunc, 2000);
  setTimeout(function(){window.location.replace("index.html");}, 30000);
}

function alarmFunc() {
  alert("Hurry up!!!!! Finish the form in 30 seconds");
}

function myFunction2() {
	var x1 = performance.now();
	var div = document.getElementById("top");

	function x(e) {
		div.textContent = "DONE";
	}

	for (var v = 0; v < 1000000; v++) {
		// Use addEventListener.
		div.addEventListener("click", x);
	}

	var x2 = performance.now();
	alert((x2 - x1));
}