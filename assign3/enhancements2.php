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
<body>
<?php 
	include_once 'header.inc';
	include_once 'menu.inc';
?>
<form action="apply.html">
	<ol>
	<li>
	<h1>Timer event</h1>
	<p>Implemented a timer in 'apply.html' page! So the user has to complete the form in limited seconds.
	After click the alert button in apply page, it starts to work!
	There will be a alert warning to hurry up and after fixed time the browser will automatically redirect to the first page of home page 'index.html'</p>
	<input type="submit" value="Go to apply page"/>
	</li>
	<li>
	<h1>Calculate page loading time, Changing text</h1>
	<div id="top" onclick="myFunction2()">Click</div><br/>
	When you load the page click the "Click" text. The method "x" will run and set the div's text to "DONE." The pages behave the same.
	Calculate the gap between 2 different time the number in the alert box! performance.now() is relative to page load.
	</li>
	</ol>
</form>
<hr>
<?php include 'footer.inc' ?>
</body>