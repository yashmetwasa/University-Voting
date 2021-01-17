<!DOCTYPE html>
<html lang="en">
<head>
  <title>Result</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link href="css/result.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="js/jsapi.js"></script>
<script type="text/javascript" src="js/jquerymin.js"></script>

	<style>
	rect{
	
	clear:both;
	float:left;
    width:100px;
    height: 98;

    fill: rgb(255, 255, 255);
}
	}
	
	</style>
	
<?php
include('conn.php');

/*
(SELECT Name,
(SELECT count(Cr) FROM voting WHERE Cr=(SELECT Id FROM candidate_info WHERE C_id=1 AND Post='CR')) AS 'Count'
 FROM candidate_info INNER JOIN voter_master on candidate_info.Id=voter_master.Id WHERE C_id=1 AND Post='CR')
*/



$sql1 = "(SELECT Name,(SELECT count(Cr) FROM voting WHERE Cr=(SELECT Id FROM candidate_info WHERE C_id=1 AND Post='CR')) AS 'Count' FROM candidate_info INNER JOIN voter_master on candidate_info.Id=voter_master.Id WHERE C_id=1 AND Post='CR')";
	$cr1 = mysqli_query($con, $sql1);
	if(mysqli_num_rows($cr1) > 0){
        while($row = mysqli_fetch_assoc($cr1)){
			$cr1Name=$row["Name"];
			$cr1Count=$row["Count"];
        }
    } 
$sql2 = "(SELECT Name,(SELECT count(Fr) FROM voting WHERE Fr=(SELECT Id FROM candidate_info WHERE C_id= AND Post='FR')) AS 'Count1' FROM candidate_info INNER JOIN voter_master on candidate_info.Id=voter_master.Id WHERE C_id=1 AND Post='FR')";
	$fr = mysqli_query($con, $sql2);
	if(mysqli_num_rows($fr) > 0){
        while($row = mysqli_fetch_assoc($fr)){
			$fr1Name=$row["Name"];
			$fr1Count=$row["Count1"];
        }
    }
$sql3 = "(SELECT Name,(SELECT count(Fgs) FROM voting WHERE Fgs=(SELECT Id FROM candidate_info WHERE C_id=1 AND Post='FGS')) AS 'Count2' FROM candidate_info INNER JOIN voter_master on candidate_info.Id=voter_master.Id WHERE C_id=1 AND Post='FGS')";
	$fgs1 = mysqli_query($con, $sql3);
	if(mysqli_num_rows($fgs1) > 0){
        while($row = mysqli_fetch_assoc($fgs1)){
			$fgs1Name=$row["Name"];
			$fgs1Count=$row["Count2"];
        }
    }
 $rating_data = array(
 array('CR', 'Rating'),
 array($cr1Name,(int)$cr1Count),
 array($fr1Name,(int)$fr1Count),
 array($fgs1Name,(int)$fgs1Count), 
);
 $encoded_data = json_encode($rating_data);
?>

<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() 
{
 var data = google.visualization.arrayToDataTable(
 <?php  echo $encoded_data; ?>
 );
 var options = {
  title: "CR Ratings"
 };
 var chart = new google.visualization.PieChart(document.getElementById("cr_result"));
 chart.draw(data, options);
}

</script>

</head>

<body>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <div id="piechart" style="width: 500px; height: 500px;"></div>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
	  function drawChart() {
        var data = google.visualization.arrayToDataTable([
                  ['Account Number', 'Account Balance'],
        <?php while ($row = mysqli_fetch_array($result)) {
                            $acc_type = $row ['account_type'];
                            $acc_num = $row ['account_number'];  
                            $acc_bal = $row ['account_balance']; 

                            ?>  
                  ['<?php echo $acc_num ?>',<?php echo $acc_bal ?>],
        <?php } ?>      
                ]);
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data);
}
    </script>

<div class="container-fluid">
 	<div  id="cr_result" style="height:400px" ></div>

</div>


</body>
</html>