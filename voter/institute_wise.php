
<?php
include('conn.php');

$sql1 = "SELECT count(Institute) From voter_master INNER JOIN voting on voter_master.Id=voting.V_id where Institute='Fashion, Arts & Design'";
	$q = mysqli_query($con, $sql1);
	if(mysqli_num_rows($q) > 0){
        while($row = mysqli_fetch_assoc($q)){
			$fashion=$row["count(Institute)"];
        }
    } 
$sql2 = "SELECT count(Institute) From voter_master INNER JOIN voting on voter_master.Id=voting.V_id where Institute='Business & Technologies'";
	$q2 = mysqli_query($con, $sql2);
	if(mysqli_num_rows($q2) > 0){
        while($row = mysqli_fetch_assoc($q2)){
			$business=$row["count(Institute)"];
        }
    } 
$sql3 = "SELECT count(Institute) From voter_master INNER JOIN voting on voter_master.Id=voting.V_id where Institute='Social Science & Education'";
	$q3 = mysqli_query($con, $sql3);
	if(mysqli_num_rows($q3) > 0){
        while($row = mysqli_fetch_assoc($q3)){
			$social=$row["count(Institute)"];
        }
    }  
$sql4 = "SELECT count(Institute) From voter_master INNER JOIN voting on voter_master.Id=voting.V_id where Institute='VFX & Game Design'";
	$q4 = mysqli_query($con, $sql4);
	if(mysqli_num_rows($q4) > 0){
        while($row = mysqli_fetch_assoc($q4)){
			$Game=$row["count(Institute)"];
        }
    }
    $sql5 = "SELECT count(Institute) From voter_master INNER JOIN voting on voter_master.Id=voting.V_id where Institute='Hoteml Management & Tourism'";
	$q5 = mysqli_query($con, $sql5);
	if(mysqli_num_rows($q5) > 0){
        while($row = mysqli_fetch_assoc($q5)){
			$Hotel=$row["count(Institute)"];
        }
    } 
 $rating_data1 = array(
 array('Type', 'Rating'),
 array('Fashion, Arts & Design',(int)$fashion),
 array('Business & Technologies',(int)$business),
 array('Social Science & Education',(int)$social),
 array('VFX & Game Design',(int)$Game),
 array('Hoteml Management & Tourism',(int)$Hotel),
);
 $encoded_data1 = json_encode($rating_data1);
?>

<html>
<head>
<title>Result | Field wise</title>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/grayscale.css" rel="stylesheet" type="text/css">

<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/grayscale.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jsapi.js"></script>
	<script type="text/javascript" src="js/jquerymin.js"></script>




<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() 
{
 var data = google.visualization.arrayToDataTable(
 <?php  echo $encoded_data1; ?>
 );
 var options = {
  title: "Field Wise voted report."
 };
 var chart = new google.visualization.PieChart(document.getElementById("vote_per"));
 chart.draw(data, options);
}
</script>
<style>
a{
text-decoration:none
}
a:hover{
	text-decoration:none
}
span{
	text-align:left;
}
.nav-link {
    display:inline;
    padding: 0.5rem 1rem;
}
li ul{
border:none;
box-border:none;
}
.result{
height:500px; 
float:left; 
margin:0;  
padding:0;
}


</style>
</head>



<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">LaSalle College Voting</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
			<li class="nav-item">
              <a href="voter.php"> HOME </a>
            </li>	
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Result <span class="caret"></span></a>
				<ul class="dropdown-menu" style="background-color:#333333;padding:2px;">
				  <li><a href="post_wise_result.php">Post Wise Result</a></li>
				  <li><a href="vote_per.php">Percentage Of Voting</a></li>
				  <li><a href="gender_wise.php">Gender Wise Report</a></li>
				  <li><a href="institute_wise.php">Field Wise Report</a></li>
				</ul>
			  </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../logout.php">Logout</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
	
	
	<header class="masthead">
      <div class="intro-body">
  		  <div class="row">
            <div class="col-lg-12 mx-auto">
             <!-- <h1>University Voting</h1> -->
				
				<h1>Field Wise Ratio</h1>
				<div class="container col-sm-6">
				 	<div id="vote_per" class="result col-sm-12" style="clear:both ; height:300px" align="center"></div>
				</div>
								

            </div>
          </div>
      </div>
    </header>

	



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