
<?php
include('conn.php');

/*
(SELECT Name,
(SELECT count(Cr) FROM voting WHERE Cr=(SELECT Id FROM candidate_info WHERE C_id=1 AND Post='CR')) AS 'Count'
 FROM candidate_info INNER JOIN voter_master on candidate_info.Id=voter_master.Id WHERE C_id=1 AND Post='CR')
*/

/*  CR PART  */
$sql1 = "(SELECT Name,(SELECT count(Cr) FROM voting WHERE Cr=(SELECT Id FROM candidate_info WHERE C_id=1 AND Post='CR')) AS 'Count' FROM candidate_info INNER JOIN voter_master on candidate_info.Id=voter_master.Id WHERE C_id=1 AND Post='CR')";
	$cr1 = mysqli_query($con, $sql1);
	if(mysqli_num_rows($cr1) > 0){
        while($row = mysqli_fetch_assoc($cr1)){
			$cr1Name=$row["Name"];
			$cr1Count=$row["Count"];
        }
    } 
$sql2 = "(SELECT Name,(SELECT count(Cr) FROM voting WHERE Cr=(SELECT Id FROM candidate_info WHERE C_id=2 AND Post='CR')) AS 'Count' FROM candidate_info INNER JOIN voter_master on candidate_info.Id=voter_master.Id WHERE C_id=2 AND Post='CR')";
	$cr2 = mysqli_query($con, $sql2);
	if(mysqli_num_rows($cr2) > 0){
        while($row = mysqli_fetch_assoc($cr2)){
			$cr2Name=$row["Name"];
			$cr2Count=$row["Count"];
        }
    }
$sql3 = "(SELECT Name,(SELECT count(Cr) FROM voting WHERE Cr=(SELECT Id FROM candidate_info WHERE C_id=3 AND Post='CR')) AS 'Count' FROM candidate_info INNER JOIN voter_master on candidate_info.Id=voter_master.Id WHERE C_id=3 AND Post='CR')";
	$cr3 = mysqli_query($con, $sql3);
	if(mysqli_num_rows($cr3) > 0){
        while($row = mysqli_fetch_assoc($cr3)){
			$cr3Name=$row["Name"];
			$cr3Count=$row["Count"];
        }
    }
 $rating_data1 = array(
 array('CR', 'Rating'),
 array($cr1Name,(int)$cr1Count),
 array($cr2Name,(int)$cr2Count),
 array($cr3Name,(int)$cr3Count), 
);
 $encoded_data1 = json_encode($rating_data1);
?>

 <?php
include('conn.php');

/*  FR PART  */

$sql4 = "(SELECT Name,(SELECT count(Fr) FROM voting WHERE Fr=(SELECT Id FROM candidate_info WHERE C_id=1 AND Post='FR')) AS 'Count' FROM candidate_info INNER JOIN voter_master on candidate_info.Id=voter_master.Id WHERE C_id=1 AND Post='FR')";
	$fr1 = mysqli_query($con, $sql4);
	if(mysqli_num_rows($fr1) > 0){
        while($row = mysqli_fetch_assoc($fr1)){
			$fr1Name=$row["Name"];
			$fr1Count=$row["Count"];
        }
    } 
$sql5 = "(SELECT Name,(SELECT count(Fr) FROM voting WHERE Fr=(SELECT Id FROM candidate_info WHERE C_id=2 AND Post='FR')) AS 'Count' FROM candidate_info INNER JOIN voter_master on candidate_info.Id=voter_master.Id WHERE C_id=2 AND Post='FR')";
	$fr2 = mysqli_query($con, $sql5);
	if(mysqli_num_rows($fr2) > 0){
        while($row = mysqli_fetch_assoc($fr2)){
			$fr2Name=$row["Name"];
			$fr2Count=$row["Count"];
        }
    }
$sql6 = "(SELECT Name,(SELECT count(Fr) FROM voting WHERE Fr=(SELECT Id FROM candidate_info WHERE C_id=3 AND Post='FR')) AS 'Count' FROM candidate_info INNER JOIN voter_master on candidate_info.Id=voter_master.Id WHERE C_id=3 AND Post='FR')";
	$fr3 = mysqli_query($con, $sql6);
	if(mysqli_num_rows($fr3) > 0){
        while($row = mysqli_fetch_assoc($fr3)){
			$fr3Name=$row["Name"];
			$fr3Count=$row["Count"];
        }
    }
 $rating_data2 = array(
 array('FR', 'Rating'),
 array($fr1Name,(int)$fr1Count),
 array($fr2Name,(int)$fr2Count),
 array($fr3Name,(int)$fr3Count), 
);
 $encoded_data2 = json_encode($rating_data2);
 ?>
 
 <?php
include('conn.php');
 
/*  FGS PART  */
$sql7 = "(SELECT Name,(SELECT count(Fgs) FROM voting WHERE Fgs=(SELECT Id FROM candidate_info WHERE C_id=1 AND Post='FGS')) AS 'Count' FROM candidate_info INNER JOIN voter_master on candidate_info.Id=voter_master.Id WHERE C_id=1 AND Post='FGS')";
	$fgs1 = mysqli_query($con, $sql7);
	if(mysqli_num_rows($fgs1) > 0){
        while($row = mysqli_fetch_assoc($fgs1)){
			$fgs1Name=$row["Name"];
			$fgs1Count=$row["Count"];
        }
    } 
$sql8 = "(SELECT Name,(SELECT count(Fgs) FROM voting WHERE Fgs=(SELECT Id FROM candidate_info WHERE C_id=2 AND Post='FGS')) AS 'Count' FROM candidate_info INNER JOIN voter_master on candidate_info.Id=voter_master.Id WHERE C_id=2 AND Post='FGS')";
	$fgs2 = mysqli_query($con, $sql8);
	if(mysqli_num_rows($fgs2) > 0){
        while($row = mysqli_fetch_assoc($fgs2)){
			$fgs2Name=$row["Name"];
			$fgs2Count=$row["Count"];
        }
    }
$sql9 = "(SELECT Name,(SELECT count(Fgs) FROM voting WHERE Fgs=(SELECT Id FROM candidate_info WHERE C_id=3 AND Post='FGS')) AS 'Count' FROM candidate_info INNER JOIN voter_master on candidate_info.Id=voter_master.Id WHERE C_id=3 AND Post='FGS')";
	$fgs3 = mysqli_query($con, $sql9);
	if(mysqli_num_rows($fgs3) > 0){
        while($row = mysqli_fetch_assoc($fgs3)){
			$fgs3Name=$row["Name"];
			$fgs3Count=$row["Count"];
        }
    }
 $rating_data3 = array(
 array('FGS', 'Rating'),
 array($fgs1Name,(int)$fgs1Count),
 array($fgs2Name,(int)$fgs2Count),
 array($fgs3Name,(int)$fgs3Count), 
);
 $encoded_data3 = json_encode($rating_data3);
?>

<html>
<head>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() 
{
 var data = google.visualization.arrayToDataTable(
 <?php  echo $encoded_data1; ?>
 );
 var options = {
  title: "CR Result"
 };
 var chart = new google.visualization.PieChart(document.getElementById("cr_result"));
 chart.draw(data, options);
}
</script>

<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() 
{
 var data = google.visualization.arrayToDataTable(
 <?php  echo $encoded_data2; ?>
 );
 var options = {
  title: "FR Result"
 };
 var chart = new google.visualization.PieChart(document.getElementById("fr_result"));
 chart.draw(data, options);
}
</script>

<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() 
{
 var data = google.visualization.arrayToDataTable(
 <?php  echo $encoded_data3; ?>
 );
 var options = {
  title: "FGS Result"
 };
 var chart = new google.visualization.PieChart(document.getElementById("fgs_result"));
 chart.draw(data, options);
}
</script>
<style>
body
{
 margin:0;
 padding:0px;
 text-align:center;
 width:100%;
 font-family: "Myriad Pro","Helvetica Neue",Helvetica,Arial,Sans-Serif;
 background-color:#FAFAFA;
}
#wrapper
{
 margin:0 auto;
 padding:0px;
 text-align:center;
 width:995px;
}
#wrapper h1
{
 margin-top:50px;
 font-size:45px;
 color:#585858;
}
#wrapper h1 p
{
 font-size:18px;
}
#cr_result
{
 padding:0px;
 width:600px;
 height:400px;
 margin-left:190px;
}
</style>
</head>
<body style="margin:0; padding:0">
<h1 class="col-sm-12">Post Wise Result</h1>
<div class="container col-sm-12" style="margin:0; padding:0">
 <div id="cr_result" style="width: 400px; height: 500px; clear:both; float:left; margin:0; padding:0"></div>
  <div id="fr_result" style="width: 400px; height: 500px;  float:left; margin:0; padding:0"></div>
 <div id="fgs_result" style="width: 400px; height: 500px; float:left; margin:0; padding:0"></div>
</div>
</body>
</html>