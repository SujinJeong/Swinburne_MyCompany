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
</head>
<body>
<?php 
	include_once 'header.inc';
	include_once 'menu.inc';
?>
<article>
	<section id="about_sec1">
	<h1>About Me</h1>
	<dl>
		<dt><strong>Name</strong></dt>
		<dd>Sujin Jeong</dd>
		<dt><strong>Student Number</strong></dt>
		<dd>102442426</dd>
		<dt><strong>My tutor</strong></dt>
		<dd>Sharon Stratsianis</dd>
		<dt><strong>My course</strong></dt>
		<dd>Computer science</dd>
	</dl>
	</section>
	<figure><img src="images/sujin.jpg"  alt="my selfie" id="about_img1"/></figure>
	<section id="about_sec2">
	<h2>My Swinburne timetable</h2>
   <table id="tables2">
	<thead>
    <tr> 
	 <th></th>
     <th>MON</th> 
     <th>TUES</th> 
	 <th>WED</th>
	 <th>THUR</th>
	 <th>FRI</th>
    </tr> 
	</thead>
	<tbody> 
    <tr> 
     <td>1</td> 
     <td>TNE1006 PRACTICAL</td> 
	 <td></td>
	 <td></td>
	 <td></td>
	 <td></td>
    </tr> 
	<tr> 
     <td>2</td> 
     <td>TNE1006 PRACTICAL</td> 
	 <td></td>
	 <td></td>
	 <td>COS10009 LAB</td>
	 <td>TNE10006 LECTURE</td>
    </tr> 
	<tr> 
     <td>3</td> 
     <td></td> 
	 <td>COS10009 LECTURE</td>
	 <td></td>
	 <td></td>
	 <td>COS10009 WORKSHOP</td>
    </tr> 
	<tr> 
     <td>4</td> 
     <td>COS10011 LECTURE</td> 
	 <td></td>
	 <td></td>
	 <td>COS10011 LAB</td>
	 <td></td>
    </tr> 
   </tbody> 
  </table> 
  
  <h2>My favourite Movie</h2>
  	<a href="https://www.flicks.com.au/movie/green-book/"><img src="images/greenbook.jpg"  alt="movie greenbook poster" id="about_img2"/></a>
	<h3>Click the image to know more about Movie 'Greenbook'!!!!!!!</h3>
   <h2>My email</h2>
  	<a href="mailto:102442426@student.swin.edu.au">####Click here to mail me####</a>
  </section>
</article>
<hr>
<?php include 'footer.inc' ?>
</body>