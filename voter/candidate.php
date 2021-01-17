<?php
session_start();

if($_SESSION['loginstatus']=="")
{
	header("location:../index.php");
}

include('conn.php');
if(isset($_SESSION["username"]))
	{
		
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Univeresity Voting | Voter</title>
	<!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type="text/css">

    <!-- Custom styles for this template -->
	<link href="css/menu.css" rel="stylesheet" type="text/css">
    <link href="css/grayscale.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jsapi.js"></script>
	<script type="text/javascript" src="js/jquerymin.js"></script>
		
<style>
a{
text-decoration:none;
background:transparent;
}
a:hover{
	text-decoration:none
}
	</style>
	
</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Univeresity Voting</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#candidates">Candidates</a>
            </li>
			<?php
			include("conn.php");
			$sql1 = "SELECT Election from election";
			$cr1 = mysqli_query($con, $sql1);
				while($row = mysqli_fetch_assoc($cr1)){
					$el=$row["Election"];
				}
				
			if($el=='start'){?>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#voting">Voting</a>
            </li>
	
			<?php } ?>	
			
			<?php
			include("conn.php");
			$sql1 = "SELECT Election from election";
			$cr1 = mysqli_query($con, $sql1);
				while($row = mysqli_fetch_assoc($cr1)){
					$el=$row["Election"];
				}
			if($el=='stop'){?>		
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Result <span class="caret"></span></a>
				<ul class="dropdown-menu" style="background-color:#333333;padding:2px;">
				  <li><a href="post_wise_result.php">Post Wise Result</a></li>
				  <li><a href="vote_per.php">Percentage Of Voting</a></li>
				  <li><a href="gender_wise.php">Gender Wise Report</a></li>
				  <li><a href="institute_wise.php">Institute Wise Report</a></li>
				  <li><a href="#">Candidate Wise Result</a></li>
				</ul>
			  </li>
			 <?php } ?>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../logout.php">Logout</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

    <!-- Intro Header -->
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
             <!-- <h1>University Voting</h1> -->
				
				<div class="sub-main-w3 col-sm-6">
				<div class="col-sm-12">
				<?php
					$num = $_SESSION['username'];
				//print $num."<br />";
				echo '<img src="../images/Upload/'.$num.'.jpg" style="border:1px solid black;border-radius:100px;height:100px;width:100px;"/>'."<br /><br />";
					//<img src="img/2.png" style="border:2px solid black;border-radius:100px;">
				?>
				</div>
				<div class="col-sm-12">
					<?php
							include("conn.php");
							$sql = "SELECT Name FROM voter_master WHERE Id='" . $_SESSION["username"] . "' ";
							$result = $con->query($sql);

							if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<h1> " . $row["Name"]. "</h1><br>";
								}
							} else {
								echo "0 results";
							}
									//<h1 style="margin-top:15px;margin-bottom:10px;">USER NAME</h1>
				?>
				</div>
				<p><button type="button" class="btn btn-default" data-toggle="modal" data-target="#Edit_Profile">Edit Profile</button></p>
				<?php 
						require "D:/xamp/htdocs/University_Voting/voter/Modal/Edit_CProfile.php";
					?>
				</div>
				
              <a href="#candidates" class="btn btn-default btn-circle js-scroll-trigger">
                <i class="fa fa-angle-double-down animated"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>


 <section class="container content-section text-center" id="candidates">
	
	<div class="row">
		<h1 class="mx-auto"> List Of Candidates </h1>
	</div>
<!--//////CR PART//////-->	
	    <div class="row">
		<div class="row col-sm-12 mx-auto"><h2 class="mx-auto">CR</h2></div>
        
		 <div class="col-sm-4">
            <div class="card">
                <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                <div class="avatar">
				
				<?php
					include("conn.php");
				
					$sql = "SELECT Id,C_id FROM candidate_info WHERE C_id='1' AND Post='CR' ";
					$result = $con->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$cmt=$row["C_id"];
						$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
					$sql2 = "SELECT C_name FROM committy WHERE C_id=$cmt";
					$result2 = $con->query($sql2);
					if ($result2->num_rows > 0) {
					// output data of each row
					while($row = $result2->fetch_assoc()) {
						$cmtnm=$row["C_name"];
						//$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
			
					$sql1 = "SELECT Name,M_no FROM voter_master  WHERE Id='$id'";
					$result1 = $con->query($sql1);
					if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						$name=$row1["Name"];
						$no=$row1["M_no"];
						//$c1=$row1["Id"];
						}
					} else {
						echo "0 results";
					}
					echo '<img src="../images/Upload/'.$id.'.jpg" style="border:1px solid black;border-radius:100px;height:100px;width:100px;"/>
				</div>
				
					
				<table class="col-sm-10" style="padding:0px; margin:0px; text-align:center; clear:both; float:left; ">
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Committy : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">'.$cmtnm.'</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Candidate : </th>
						<td class="col-sm-6" style="text-align:left ;margin:0px; padding:0px;">' .$name. '</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Contact : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">' .$no. '</td>
					</tr>
				</table>
				';
                  
				?>	
				
               
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                <div class="avatar">
				
				<?php
					include("conn.php");
				
					$sql = "SELECT Id,C_id FROM candidate_info WHERE C_id='2' AND Post='CR' ";
					$result = $con->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$cmt=$row["C_id"];
						$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
					$sql2 = "SELECT C_name FROM committy WHERE C_id=$cmt";
					$result2 = $con->query($sql2);
					if ($result2->num_rows > 0) {
					// output data of each row
					while($row = $result2->fetch_assoc()) {
						$cmtnm=$row["C_name"];
						//$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
			
					$sql1 = "SELECT Name,M_no FROM voter_master  WHERE Id='$id'";
					$result1 = $con->query($sql1);
					if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						$name=$row1["Name"];
						$no=$row1["M_no"];
						//$c1=$row1["Id"];
						}
					} else {
						echo "0 results";
					}
					echo '<img src="../images/Upload/'.$id.'.jpg" style="border:1px solid black;border-radius:100px;height:100px;width:100px;"/>
				</div>
				
					
				<table class="col-sm-10" style="padding:0px; margin:0px; text-align:center; clear:both; float:left; ">
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Committy : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">'.$cmtnm.'</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Candidate : </th>
						<td class="col-sm-6" style="text-align:left ;margin:0px; padding:0px;">' .$name. '</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Contact : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">' .$no. '</td>
					</tr>
				</table>
				';
                  
				?>	
                
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                <div class="avatar">
				
				<?php
					include("conn.php");
				
					$sql = "SELECT Id,C_id FROM candidate_info WHERE C_id='3' AND Post='CR' ";
					$result = $con->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$cmt=$row["C_id"];
						$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
					$sql2 = "SELECT C_name FROM committy WHERE C_id=$cmt";
					$result2 = $con->query($sql2);
					if ($result2->num_rows > 0) {
					// output data of each row
					while($row = $result2->fetch_assoc()) {
						$cmtnm=$row["C_name"];
						//$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
			
					$sql1 = "SELECT Name,M_no FROM voter_master  WHERE Id='$id'";
					$result1 = $con->query($sql1);
					if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						$name=$row1["Name"];
						$no=$row1["M_no"];
						//$c1=$row1["Id"];
						}
					} else {
						echo "0 results";
					}
					echo '<img src="../images/Upload/'.$id.'.jpg" style="border:1px solid black;border-radius:100px;height:100px;width:100px;"/>
				</div>
				
					
				<table class="col-sm-10" style="padding:0px; margin:0px; text-align:center; clear:both; float:left; ">
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Committy : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">'.$cmtnm.'</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Candidate : </th>
						<td class="col-sm-6" style="text-align:left ;margin:0px; padding:0px;">' .$name. '</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Contact : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">' .$no. '</td>
					</tr>
				</table>
				';
                  
				?>	
            </div>
        </div>
	</div>
	
	<!--FR Part-//////-->
	<div class="row">
		<div class="row col-sm-12 mx-auto"><h2 class="mx-auto">FR</h2></div>
        <div class="col-sm-4">
            <div class="card">
                <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                <div class="avatar">
                    <?php
					include("conn.php");
				
					$sql = "SELECT Id,C_id FROM candidate_info WHERE C_id='1' AND Post='FR' ";
					$result = $con->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$cmt=$row["C_id"];
						$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
					$sql2 = "SELECT C_name FROM committy WHERE C_id=$cmt";
					$result2 = $con->query($sql2);
					if ($result2->num_rows > 0) {
					// output data of each row
					while($row = $result2->fetch_assoc()) {
						$cmtnm=$row["C_name"];
						//$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
			
					$sql1 = "SELECT Name,M_no FROM voter_master  WHERE Id='$id'";
					$result1 = $con->query($sql1);
					if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						$name=$row1["Name"];
						$no=$row1["M_no"];
						//$c1=$row1["Id"];
						}
					} else {
						echo "0 results";
					}
					echo '<img src="../images/Upload/'.$id.'.jpg" style="border:1px solid black;border-radius:100px;height:100px;width:100px;"/>
				</div>
				
					
				<table class="col-sm-10" style="padding:0px; margin:0px; text-align:center; clear:both; float:left; ">
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Committy : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">'.$cmtnm.'</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Candidate : </th>
						<td class="col-sm-6" style="text-align:left ;margin:0px; padding:0px;">' .$name. '</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Contact : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">' .$no. '</td>
					</tr>
				</table>
				';
                  
				?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                <div class="avatar">
                    <?php
					include("conn.php");
				
					$sql = "SELECT Id,C_id FROM candidate_info WHERE C_id='2' AND Post='FR' ";
					$result = $con->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$cmt=$row["C_id"];
						$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
					$sql2 = "SELECT C_name FROM committy WHERE C_id=$cmt";
					$result2 = $con->query($sql2);
					if ($result2->num_rows > 0) {
					// output data of each row
					while($row = $result2->fetch_assoc()) {
						$cmtnm=$row["C_name"];
						//$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
			
					$sql1 = "SELECT Name,M_no FROM voter_master  WHERE Id='$id'";
					$result1 = $con->query($sql1);
					if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						$name=$row1["Name"];
						$no=$row1["M_no"];
						//$c1=$row1["Id"];
						}
					} else {
						echo "0 results";
					}
					echo '<img src="../images/Upload/'.$id.'.jpg" style="border:1px solid black;border-radius:100px;height:100px;width:100px;"/>
				</div>
				
					
				<table class="col-sm-10" style="padding:0px; margin:0px; text-align:center; clear:both; float:left; ">
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Committy : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">'.$cmtnm.'</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Candidate : </th>
						<td class="col-sm-6" style="text-align:left ;margin:0px; padding:0px;">' .$name. '</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Contact : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">' .$no. '</td>
					</tr>
				</table>
				';
                  
				?>	
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                <div class="avatar">
                    <?php
					include("conn.php");
				
					$sql = "SELECT Id,C_id FROM candidate_info WHERE C_id='3' AND Post='FR' ";
					$result = $con->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$cmt=$row["C_id"];
						$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
					$sql2 = "SELECT C_name FROM committy WHERE C_id=$cmt";
					$result2 = $con->query($sql2);
					if ($result2->num_rows > 0) {
					// output data of each row
					while($row = $result2->fetch_assoc()) {
						$cmtnm=$row["C_name"];
						//$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
			
					$sql1 = "SELECT Name,M_no FROM voter_master  WHERE Id='$id'";
					$result1 = $con->query($sql1);
					if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						$name=$row1["Name"];
						$no=$row1["M_no"];
						//$c1=$row1["Id"];
						}
					} else {
						echo "0 results";
					}
					echo '<img src="../images/Upload/'.$id.'.jpg" style="border:1px solid black;border-radius:100px;height:100px;width:100px;"/>
				</div>
				
					
				<table class="col-sm-10" style="padding:0px; margin:0px; text-align:center; clear:both; float:left; ">
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Committy : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">'.$cmtnm.'</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Candidate : </th>
						<td class="col-sm-6" style="text-align:left ;margin:0px; padding:0px;">' .$name. '</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Contact : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">' .$no. '</td>
					</tr>
				</table>
				';
                  
				?>	
            </div>
        </div>
	</div>
	
	<!--////FGS Part////-->
	<div class="row">
		<div class="row col-sm-12 mx-auto"><h2 class="mx-auto">FGS</h2></div>
        <div class="col-sm-4">
            <div class="card">
                <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                <div class="avatar">
                    <?php
					include("conn.php");
				
					$sql = "SELECT Id,C_id FROM candidate_info WHERE C_id='1' AND Post='FGS' ";
					$result = $con->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$cmt=$row["C_id"];
						$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
					$sql2 = "SELECT C_name FROM committy WHERE C_id=$cmt";
					$result2 = $con->query($sql2);
					if ($result2->num_rows > 0) {
					// output data of each row
					while($row = $result2->fetch_assoc()) {
						$cmtnm=$row["C_name"];
						//$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
			
					$sql1 = "SELECT Name,M_no FROM voter_master  WHERE Id='$id'";
					$result1 = $con->query($sql1);
					if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						$name=$row1["Name"];
						$no=$row1["M_no"];
						//$c1=$row1["Id"];
						}
					} else {
						echo "0 results";
					}
					echo '<img src="../images/Upload/'.$id.'.jpg" style="border:1px solid black;border-radius:100px;height:100px;width:100px;"/>
				</div>
				
					
				<table class="col-sm-10" style="padding:0px; margin:0px; text-align:center; clear:both; float:left; ">
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Committy : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">'.$cmtnm.'</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Candidate : </th>
						<td class="col-sm-6" style="text-align:left ;margin:0px; padding:0px;">' .$name. '</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Contact : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">' .$no. '</td>
					</tr>
				</table>
				';
                  
				?>	
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                <div class="avatar">
                   <?php
					include("conn.php");
				
					$sql = "SELECT Id,C_id FROM candidate_info WHERE C_id='2' AND Post='FGS' ";
					$result = $con->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$cmt=$row["C_id"];
						$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
					$sql2 = "SELECT C_name FROM committy WHERE C_id=$cmt";
					$result2 = $con->query($sql2);
					if ($result2->num_rows > 0) {
					// output data of each row
					while($row = $result2->fetch_assoc()) {
						$cmtnm=$row["C_name"];
						//$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
			
					$sql1 = "SELECT Name,M_no FROM voter_master  WHERE Id='$id'";
					$result1 = $con->query($sql1);
					if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						$name=$row1["Name"];
						$no=$row1["M_no"];
						//$c1=$row1["Id"];
						}
					} else {
						echo "0 results";
					}
					echo '<img src="../images/Upload/'.$id.'.jpg" style="border:1px solid black;border-radius:100px;height:100px;width:100px;"/>
				</div>
				
					
				<table class="col-sm-10" style="padding:0px; margin:0px; text-align:center; clear:both; float:left; ">
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Committy : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">'.$cmtnm.'</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Candidate : </th>
						<td class="col-sm-6" style="text-align:left ;margin:0px; padding:0px;">' .$name. '</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Contact : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">' .$no. '</td>
					</tr>
				</table>
				';
                  
				?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                <div class="avatar">
                    <?php
					include("conn.php");
				
					$sql = "SELECT Id,C_id FROM candidate_info WHERE C_id='3' AND Post='FGS' ";
					$result = $con->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$cmt=$row["C_id"];
						$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
					$sql2 = "SELECT C_name FROM committy WHERE C_id=$cmt";
					$result2 = $con->query($sql2);
					if ($result2->num_rows > 0) {
					// output data of each row
					while($row = $result2->fetch_assoc()) {
						$cmtnm=$row["C_name"];
						//$id=$row["Id"];
						}
					} else {
						echo "0 results";
					}
			
					$sql1 = "SELECT Name,M_no FROM voter_master  WHERE Id='$id'";
					$result1 = $con->query($sql1);
					if ($result1->num_rows > 0) {
					// output data of each row
					while($row1 = $result1->fetch_assoc()) {
						$name=$row1["Name"];
						$no=$row1["M_no"];
						//$c1=$row1["Id"];
						}
					} else {
						echo "0 results";
					}
					echo '<img src="../images/Upload/'.$id.'.jpg" style="border:1px solid black;border-radius:100px;height:100px;width:100px;"/>
				</div>
				
					
				<table class="col-sm-10" style="padding:0px; margin:0px; text-align:center; clear:both; float:left; ">
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Committy : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">'.$cmtnm.'</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Candidate : </th>
						<td class="col-sm-6" style="text-align:left ;margin:0px; padding:0px;">' .$name. '</td>
					</tr>
					<tr>
						<th class="col-sm-6" style="text-align:right; margin:0px;">Contact : </th>
						<td class="col-sm-6" style="text-align:left; margin:0px; padding:0px;">' .$no. '</td>
					</tr>
				</table>
				';
                  
				?>
            </div>
        </div>
	</div>
    </div>
</section>
	
	
    <!-- VOTING SECTION -->
<?php
	include("conn.php");
	$sql1 = "SELECT Election from election";
	$cr1 = mysqli_query($con, $sql1);
        while($row = mysqli_fetch_assoc($cr1)){
			$el=$row["Election"];
        }
    
	
	if($el=='start'){?>	
<section id="voting" class="download-section content-section text-center">
     
	 <div class="sub-main-w3 col-sm-6">
	 <form method="post">
	 <?php
	 include('conn.php');
	 $sql = "SELECT Voted FROM voter_master WHERE Id='" . $_SESSION["username"] . "' ";
					$result = $con->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$voted=$row["Voted"];
						}
					} else {
						echo "0 results";
					}

		if(isset($_POST["vote"]))
			{
				if($voted=='No')
				{
					$V_id = $_SESSION["username"];
					$Cr = $_POST['cr'];	
					$Fr = $_POST['fr'];	
					$Fgs = $_POST['fgs'];	
					
					mysqli_query($con,"insert into voting values('$V_id','$Cr','$Fr','$Fgs')")or die(mysqli_error($con));
					mysqli_query($con,"UPDATE voter_master SET Voted='Yes' where Id='" .$_SESSION["username"]. "'")or die(mysqli_error($con));
						echo "<script>alert('You Voted Successfully');</script>";
				}
				else{
				echo '<script>
				var btn=document.getElementById("vote");
				btn.disabled=false;
				</script>';
				echo "<script>alert('You already voted');</script>";
			}

			}
			
		
?>
		<div class="col-sm-12">
		<h1 style="margin-bottom:10px;margin-top:10px">CR</h1></div>
		<div class="col-sm-12">
		<select class="col-sm-12" name="cr">
			<option value="empty">Select CR</option>
			<?php
				  include("conn.php");
                     $menu=" "; 
                  					
                  $sql="SELECT candidate_info.Id,Name FROM voter_master inner join candidate_info on voter_master.Id=candidate_info.Id where Post='CR'"; //selection query
                  $rs = mysqli_query($con, $sql);//odbc_exec($conn,$sql);

                   
                   if (mysqli_num_rows($rs) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($rs)) {
                     $menu .= "<option value=".$row['Id'].">" . $row['Name']. "</option>";
    }
}

                  echo $menu;
                  
                  mysqli_close($con);

?> 
		
			
		</select>
		</div>
		<div class="col-sm-12">
		<h1 style="margin-bottom:10px;margin-top:10px">FR</h1></div>
		<div class="col-sm-12">
		<select class="col-sm-12" name="fr">
		<option value="empty">Select FR</option>
			<?php
				  include("conn.php");
                     $menu=" "; 
                  					
                  $sql="SELECT candidate_info.Id,Name FROM voter_master inner join candidate_info on voter_master.Id=candidate_info.Id where Post='FR'"; //selection query
                  $rs = mysqli_query($con, $sql);//odbc_exec($conn,$sql);

                   
                   if (mysqli_num_rows($rs) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($rs)) {
                     $menu .= "<option value=".$row['Id'].">" . $row['Name']. "</option>";
    }
}

                  echo $menu;
                  
                  mysqli_close($con);

?> 
		
		</select>
		</div>
		<div class="col-sm-12">
		<h1 style="margin-bottom:10px;margin-top:10px">FGS</h1></div>
		<div class="col-sm-12">
		<select class="col-sm-12" name="fgs">
		<option value="empty">Select FGS</option>
			<?php
				  include("conn.php");
                     $menu=" "; 
                  					
                  $sql="SELECT candidate_info.Id,Name FROM voter_master inner join candidate_info on voter_master.Id=candidate_info.Id where Post='FGS'"; //selection query
                  $rs = mysqli_query($con, $sql);//odbc_exec($conn,$sql);

                   
                   if (mysqli_num_rows($rs) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($rs)) {
                     $menu .= "<option value=".$row['Id'].">" . $row['Name']. "</option>";
    }
}

                  echo $menu;
                  
                  mysqli_close($con);

?> 
		</select>
		</div>
		<button type="submit" Id="vote" name="vote" class="btn btn-default">Submit Vote</button>
	 </div>
	  
	</form>
      </div>
    </section>
<?php } ?>


    <!-- Footer -->
    <footer >
      <div class="container text-center">
        <p>Copyright &copy; Yash Metwasa January-2021</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.js"></script>
	<script src="js/candi.js"></script>

  </body>

</html>
<?php
}
else
{
    header("location:../index.php");
    //echo "problem";

}
?>