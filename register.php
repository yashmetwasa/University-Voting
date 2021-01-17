	<?php
	include("conn.php");
	if(isset($_POST["submit"]))
	{
		$newfilename = $_POST['id'];
		$dir="D:/xamp/htdocs/University_Voting/images/Upload/";
		$Image=$dir.$newfilename;//.basename($_FILES['img']['name']);
		
		$Id=$_POST['id'];
		$Name=$_POST['name'];
		$Gender=$_POST['gender'];
		$Dob=$_POST['dob'];
		$City=$_POST['city'];
		$Institute=$_POST['institute'];
		$Program=$_POST['course'];
		$M_no=$_POST['phone'];
		$Email=$_POST['email'];
		//$Image=$_POST['img'];
		$Password=$_POST['password'];
		$Type='v';
		$Voted='No';
		if(move_uploaded_file($_FILES['img']['tmp_name'],"D:/xamp/htdocs/University_Voting/images/Upload/".$newfilename.'.jpg'))
		{
			mysqli_query($con,"insert into voter_master values('$Id','$Name','$Gender','$Dob','$City','$Institute','$Program','$M_no','$Email','$Image','$Password','$Type','$Voted')")or die(mysqli_error($con));
			mysqli_query($con,"insert into login values('$Id','$Password','$Type')")or die(mysqli_error($con));
			$message = "Registered successfully";
			echo "<script type='text/javascript'>alert('$message');</script>";
			//echo "<script>alert('Registered successfully ');</script>";
			header("location:index.php");
		}
		else
		{
			echo "File is not image.";
		}
	}
	//sss
?>
<!DOCTYPE HTML>
<html lang="en">

<head>

	<title>LaSalle College Voting | Register</title>

	<meta charset="utf-8">

  <link rel="stylesheet" href="CSS/bootstrap.min.css">
  
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<script type="application/x-javascript">
	// function f1() {
  	// 		alert("Hello! I am an alert box!");
	// 	}
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="CSS/register.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="CSS/font.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	
	


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">
<head>
  <title>University Voting | Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="CSS/register.css" type="text/css" />
  
  
  <script type="text/javascript">
 //<![CDATA[ 
 // array of possible countries in the same order as they appear in the country selection list 
 var programLists = new Array(4) 
 programLists["empty"] =["department"];
 programLists["Fashion, Arts & Design"] =[" Arts, Literature and Communication","Event Planning","Fashion Design","Fashion Marketing","Fashion Styling","Graphic Design","Hairdressing"];  
 programLists["Business & Technologies"] =["Accounting and Management Technology","Business Management","Cisco Network Management","E-business","Information Technology Programmer-Analyst","International Commerce Import-Export","Mobile and Web Application Development","Project Management","Transportation Logistics"]; 
 programLists["Social Science & Education"] =["Early Childhood Education","Social Sciences - Civilization and Citizenship","Social Sciences - Individual and Society","Social Sciences - International Studies","Special Care Counselling"];  
 programLists["VFX & Game Design"]=["3D Animation for Television and Cinema","3D Creation for Video Games","Video Game Programming","Game and Level Design","Game 3D Modeling"];
 programLists["Hoteml Management & Tourism"]=["Food Service Management","Hotel Management Technique","Hotel Lodging Management","Professional Cooking","Travel Creation"]; 
 /* CountryChange() is called from the onchange event of a select element. 
 * param selectObj - the select object which fired the on change event. 
 */ 
 function programChange(selectObj) { 
 // get the index of the selected option 
 var idx = selectObj.selectedIndex; 
 // get the value of the selected option 
 var which = selectObj.options[idx].value; 
 // use the selected option value to retrieve the list of items from the countryLists array 
 cList = programLists[which]; 
 // get the country select element via its known id 
 var cSelect = document.getElementById("program"); 
 // remove the current options from the country select 
 var len=cSelect.options.length; 
 while (cSelect.options.length > 0) { 
 cSelect.remove(0); 
 } 
 var newOption; 
 // create new options 
 for (var i=0; i<cList.length; i++) { 
 newOption = document.createElement("option"); 
 newOption.value = cList[i];  // assumes option string and value are the same 
 newOption.text=cList[i]; 
 // add the new option 
 try { 
 cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE 
 } 
 catch (e) { 
 cSelect.appendChild(newOption); 
 } 
 } 
 } 
//]]>
</script>
	
</head>

<body style="background-image:url(images/lasalle1.jpg)">
	<!--header-->
	<div class="header-w3l">
		<h1>
			<span><!--U-->L</span>a<span>S</span>alle 
			<span><!-V-->C</span>ollege
			<span><!-S-->V</span>oting
		</h1>
	</div>
	<!---728x90--->
	<!--//header-->
	
		<div class="sub-main-w3"  id="section">
			<h2 id="reg">Registration Form</h2>
			
<form action="#" method="post" enctype="multipart/form-data">			
  <div class="row">
    <label class="control-label col-md-4" for="id">UserID :</label>
    <div class="pom-agile col-md-8">
		<span class="fa fa-user-o" aria-hidden="true"></span>
      <input type="text" class="form-control col-md-6" name="id" id="id" onfocusout="f1()" placeholder="Enter Your ID." required data-message="Please Enter your ID">
    </div>
  </div>  
		

  <div class="row">
    <label class="control-label col-md-4">Name :</label>
    <div class="pom-agile col-md-8">
	  <span class="fa fa-user-o" aria-hidden="true"></span>
      <input title="Enter your Name" class="form-control" type="text" name="name" id="name" placeholder="Enter Your Name." required >
    </div>
  </div>
		
				
   <div class="row">
    <label class="control-label col-md-4">Gender :</label>
    <div class="pom-agile col-md-8">
      		<select class="form-control" name="gender" id="gender" required>
							<option value="empty">Select Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
			</select>
    </div>
  </div>	
				

  <div class="row">
    <label class="control-label col-sm-4">Date Of Birth :</label>
    <div class="pom-agile col-sm-8">
      	<input class="form-control" type="date" name="dob" id="date" required>
    </div>
  </div>

  <div class="row">
    <label class="control-label col-sm-4">City :</label>
    <div class="pom-agile col-md-8">
      	<input class="form-control" type="text" name="city" id="city" type="text" placeholder="Enter Your City." required>
    </div>
  </div>

<div class="row">
    <label class="control-label col-sm-4">Field :</label>
    <div class="pom-agile col-md-8">
      	<select class="form-control" name="institute" id="institute" onchange="programChange(this);" required>
				<option value="empty">select field</option>
				<option value="Fashion, Arts & Design">Fashion, Arts & Design</option>
				<option value="Business & Technologies">Business & Technologies</option>
				<option value="Social Science & Education">Social Science & Education</option>
				<option value="VFX & Game Design">VFX & Game Design</option>
				<option value="Hoteml Management & Tourism">Hoteml Management & Tourism</option>
		</select>
    </div>
  </div>

<div class="row">
    <label class="control-label col-sm-4">Program :</label>
    <div class="pom-agile col-md-8">
      	<select class="form-control" name="course" id="program" required>
			<option value="0">select program</option>
		</select>
    </div>
  	</div>

<div class="row">
    <label class="control-label col-sm-4">Mobile No :</label>
	<div class="pom-agile col-md-8">
	  <span class="fa fa-user-o" aria-hidden="true"></span>
      	<input class="form-control" title="Enter valid phone Number." type="text" id="phone" name="phone"  pattern="[438][0-9]{9}" placeholder="Enter Your Phone Number." required onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');">
					
    </div>
  	</div>
	
<div class="row">
    <label class="control-label col-sm-4">Email Id:</label>
    <div class="pom-agile col-md-8">
	  <span class="fa fa-user-o" aria-hidden="true"></span>
      	<input class="form-control" type="email" id="email" name="email" placeholder="Enter Your Email." required data-message="That email doesn&#39;t seem right. &lt;br/&gt;&lt;strong&gt;We&#39;ll never share or sell your email address.&lt;/strong&gt;">
    </div>
  	</div>

<div class="row">
    <label class="control-label col-sm-4">User Image :</label>
    <div class="pom-agile col-md-8">
      	<input class="form-control" type="file" name="img" id="img" placeholder="Choose your photo." required >
    </div>
  	</div>

<div class="row">
    <label class="control-label col-sm-4">Password :</label>
    <div class="pom-agile col-md-8">
	  <span class="fa fa-key" aria-hidden="true"></span>
      	<input class="form-control"  title="Password must contain at least 6 characters, including UPPER/lowercase and numbers" type="password" name="password" id="pwd1" placeholder="Enter password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onChange="
  this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
  if(this.checkValidity()) form.pwd2.pattern = RegExp.escape(this.value);">
    </div>
  	</div>
	
	<div class="row">
    <label class="control-label col-sm-4">Confirm Password :</label>
    <div class="pom-agile col-md-8">
	  <span class="fa fa-key" aria-hidden="true"></span>
      	<input class="form-control" title="Please enter the same Password as above" type="password" name="pwd2" id="pwd2" placeholder="Confirm password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onChange="
  this.setCustomValidity(this.validity.patternMismatch ? this.title : '');">
    </div>
  	</div>

	  <a href="index.php" style="color:#ffffff">Already Registered? Login here</a>

				<div class="row">
				<div class="right-w3l col-md-12">
					<input id="submit" type="submit" name="submit" value="Register" onClick="f1()">
				</div>
			</form>
		</div><!--//Sub main-->
	</div>
	<!--//main-->
	<!---728x90--->
	<!--footer-->
	<div class="footer col-sm-12">
		<p>&copy; All rights reserved | Design by Yash Metwasa</p>
	</div>
	<!--//footer-->
	<!---728x90--->
</body>

</html>
 