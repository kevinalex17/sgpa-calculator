<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>KTU CGPA CALCULATOR</title>
<link href="mainstyles.css" rel="stylesheet" type="text/css">
<link href="favicon.ico" rel="icon" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="style1.css">
<meta name="description" content="Calculate your KTU GPA and Grade point">
<basefont size="10"/>
<style>
hr {
  color: white;
}
</style>
<script src="javascriptmain.js">
  </script>
  <script src="percentagecalc.js"></script>
  </head>
<body>

<div class="header">

</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
<hr>
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p align ="middle" style="font-size: 46px;color: white;">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
  <hr>
    	<p align ="middle" style="font-size: 35px;"> <a href="index.php?logout='1'" style="color: white;">Click to logout</a> </p>
  <br>
  <hr>
  <br>
    <?php endif ?>
</div>
	<center>
<table border="0" width="90%" bgcolor="white">
<tr><td>
	 <form>
		<!--Main Heading-->

		
		<div id='cssmenu'>
<ul>
   <li class='active'><a href='http://www.cgpacalculator.ml/index.php#'><b>&nbsp;&nbsp;&nbsp;CGPA Calculator&nbsp;&nbsp;</b></a></li>
  <!-- <li><a href='#'><b>&nbsp;&nbsp;CGPA Calculator&nbsp;</b>&nbsp;&nbsp;</a></li>
    <li><a href='#'><b>&nbsp;&nbsp;% Calculator&nbsp;</b>&nbsp;&nbsp;</a></li> -->
	

</ul>	
</div>

		<!--Drop Down list for selecting the semester--> 
		<br><br><br>
		<div id="topads" align="center" width="100%">
<!-- Responsive Square -->

		</div><br><br><br>
		
				<h1 align="center"><u><b>KTU GPA CALCULATOR</b></u></h1>
		<br>
		<table width="90%">

			<tr>
				<th class="left">
				<p class="mainhead" style="display:inline"> Select Semester : </p>				
				</th>			
				<th class="right">
					<select name="sem" id="sem" onchange="ifchanged()">
						<option value="s1">S1</option>
						<option value="s2">S2</option>
						<option value="s3">S3</option>
						<option value="s4">S4</option>
						<option value="s5">S5</option>
						<option value="s6">S6</option>
						<option value="s7" disabled="">S7</option>
						<option value="s8" disabled="">S8</option>
					</select>
				</th>				
			</tr>
			<tr>
				<th class="left">
					<p class="mainhead" style="display:inline">Enter Branch: </p>
				</th>
				<th class="right">
					<select name="branch" id="branch" onchange="ifchanged()">
						<option value="cs">Computer Science</option>
						<option value="eee">Electrical</option>
						<option value="ec">Electronics</option>
						<option value="me">Mechanical</option>
						<option value="ce">Civil</option>			
					 </select>				
				</th>
			</tr>
			<tr>
				<th class="left">
				<p class="mainhead" style="display:inline">Select Subject (Only for S1 and S2) :</p>
				</th>
				<th class="right">
					<select name="gmchoice" id="gmchoice" onchange="ifchanged()">
						<option value="gs">X</option>
						<option value="ms">Y</option>
					</select>
				</th>			
			</tr>	<br>
	
		</table>
		 <br><br>
		 <div id="topads" align="center" width="100%">

		</div>
<br><br>
		<p id="selectgrades" align="center"><strong><u>Select Grades:<br></u></strong></p><br>
		<br>


		<!--Contains the 9 subjects-->
		<!--For S1 s2 there are 9 but only 8 for higher semesters. so last para is hidden is sem is s3 or above-->	
		<!--Each subjects has ids sub1,sub2 ... and the drop down lists having the grades as grade1,grade2...-->
		<table width="75%">

			<tr>
				<th class="left">
					<p id="sub1" style="display:inline" class="mainhead">Calculus</p>
				</th>
				<th class="right">
					<select name="grade1" id="grade1">
						<option value="os">OS</option>
						<option value="a+">A+</option>
						<option value="a">A</option>
						<option value="b+">B+</option>
						<option value="b">B</option>
						<option value="c">C</option>
						<option value="p">P</option>
						<option value="f">F</option>
					</select>
				</th>
			</tr>
			
			
			<tr>
				<th class="left"> 
					<p id="sub2" style="display:inline" class="mainhead">Engineering Phy/Chem:</p>
				</th>
				<th class="right">
						 <select name="grade2" id="grade2">
							<option value="os">OS</option>
							<option value="a+">A+</option>
							<option value="a">A</option>
							<option value="b+">B+</option>
							<option value="b">B</option>
							<option value="c">C</option>
							<option value="p">P</option>
							<option value="f">F</option>			
						</select>
				</th>
			</tr>
			
			
			
			<tr>
				<th class="left"> 
					<p id="sub3" style="display:inline" class="mainhead">Engineering Graphics:</p>
				</th>
				<th class="right">
						 <select name="grade3" id="grade3">
							<option value="os">OS</option>
							<option value="a+">A+</option>
							<option value="a">A</option>
							<option value="b+">B+</option>
							<option value="b">B</option>
							<option value="c">C</option>
							<option value="p">P</option>
							<option value="f">F</option>			
						</select>
				</th>
			</tr>				
				
				
				
				
				
				<tr>
				<th class="left"> 
					<p id="sub4" style="display:inline" class="mainhead">Introduction to your subject: </p>
				</th>
				<th class="right">
						 <select name="grade4" id="grade4">
							<option value="os">OS</option>
							<option value="a+">A+</option>
							<option value="a">A</option>
							<option value="b+">B+</option>
							<option value="b">B</option>
							<option value="c">C</option>
							<option value="p">P</option>
							<option value="f">F</option>			
						</select>
				</th>
			</tr>
			
			
			<tr>
				<th class="left"> 
					<p id="sub5" style="display:inline" class="mainhead">Basics of X Engineering: </p>
				</th>
				<th class="right">
						 <select name="grade5" id="grade5">
							<option value="os">OS</option>
							<option value="a+">A+</option>
							<option value="a">A</option>
							<option value="b+">B+</option>
							<option value="b">B</option>
							<option value="c">C</option>
							<option value="p">P</option>
							<option value="f">F</option>			
						</select>
				</th>
			</tr>
				
			<tr>
				<th class="left"> 
					<p id="sub6" style="display:inline" class="mainhead">Introduction to Sustainable Engineering</p>
				</th>
				<th class="right">
						 <select name="grade6" id="grade6">
							<option value="os">OS</option>
							<option value="a+">A+</option>
							<option value="a">A</option>
							<option value="b+">B+</option>
							<option value="b">B</option>
							<option value="c">C</option>
							<option value="p">P</option>
							<option value="f">F</option>			
						</select>
				</th>
			</tr>
			
			<tr>
				<th class="left"> 
					<p id="sub7" style="display:inline" class="mainhead">Phy/Chem Lab</p>
				</th>
				<th class="right">
						 <select name="grade7" id="grade7">
							<option value="os">OS</option>
							<option value="a+">A+</option>
							<option value="a">A</option>
							<option value="b+">B+</option>
							<option value="b">B</option>
							<option value="c">C</option>
							<option value="p">P</option>
							<option value="f">F</option>			
						</select>
				</th>
			</tr>
			
			<tr>
				<th class="left"> 
					<p id="sub8" style="display:inline" class="mainhead">Basic Engineering Workshop I</p>
				</th>
				<th class="right">
						 <select name="grade8" id="grade8">
							<option value="os">OS</option>
							<option value="a+">A+</option>
							<option value="a">A</option>
							<option value="b+">B+</option>
							<option value="b">B</option>
							<option value="c">C</option>
							<option value="p">P</option>
							<option value="f">F</option>			
						</select>
				</th>
			</tr>			
			
				<tr>
				<th class="left"> 
					<p id="sub9" style="display:inline" class="mainhead">Basic Engineering Workshop II</p>
				</th>
				<th class="right">
						 <select name="grade9" id="grade9">
							<option value="os">OS</option>
							<option value="a+">A+</option>
							<option value="a">A</option>
							<option value="b+">B+</option>
							<option value="b">B</option>
							<option value="c">C</option>
							<option value="p">P</option>
							<option value="f">F</option>			
						</select>
				</th>
			</tr>			
			
				
		</table>
				


		<!--where is the cgpa is finally displayed<-->
		<br><br>
				 
		 <br>
		<br><br>
		
			  
		<span style="">
		<!--Claculate CGPA button-->
		<center>
		<button class="btn btn-3 btn-3e icon-arrow-right" type="button" onclick="getOption()" id="gpabutton2">CALCULATE GPA</button>
		<br style=""><br><br>
		</center></span>
		
		<div id="cgpadecor"><b>
			<p align ="middle" style="display:inline;font-size: 46px;" class="gpa1"><b>YOUR GPA : </b></p>
			<p id="cgpa" class="gpa2" style="display:inline;font-size: 46px;"></b>
			<br><br><br>
			</div>
			<br>
<footer class="footer-basic-centered">

<p class="footer-company-motto">Developed by</p>
			<br>
<ul>
  <li style=" color : white;font-size: 20px">Kavya</li>
  <li style=" color : white;font-size: 20px">Kevin Alex</li>
  <li style=" color : white;font-size: 20px">Kency</li>
  <li style=" color : white;font-size: 20px">Kevin T T</li>
   <li style=" color : white;font-size: 20px">Kiran</li>
   <li style=" color : white;font-size: 20px">Sairaj</li>
  </ul>

		</footer>
		
		
</form>
<script type="text/javascript">
var infolinks_pid = 3016164;
var infolinks_wsid = 0;
</script>
<script type="text/javascript" src="http://resources.infolinks.com/js/infolinks_main.js"></script>
</td></tr></table></center></body>
</html>