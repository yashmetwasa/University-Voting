<?php
include('conn.php');
$sql = "SELECT count(Cr) FROM voting WHERE Cr=(SELECT Id FROM candidate_info WHERE C_id=1 AND Post='CR')";
	$cr1 = mysqli_query($con, $sql);
	if(mysqli_num_rows($cr1) > 0){
        while($row = mysqli_fetch_assoc($cr1)){
            $id1=$row["count(Cr)"];
        }
    } 
	$sql11 = "SELECT Name FROM candidate_info INNER JOIN voter_master on candidate_info.Id=voter_master.Id WHERE C_id=1 AND Post='CR'";
	$cr11 = mysqli_query($con, $sql11);
	if(mysqli_num_rows($cr11) > 0){
        while($row = mysqli_fetch_assoc($cr11)){
            $name1=$row["Name"];
        }
    }

$sql2 = "SELECT count(Cr) FROM voting WHERE Cr=(SELECT Id FROM candidate_info WHERE C_id=2 AND Post='CR')";
	$cr2 = mysqli_query($con, $sql2);
	if(mysqli_num_rows($cr2) > 0){
        while($row = mysqli_fetch_assoc($cr2)){
            $id2=$row["count(Cr)"];
        }
    } 
	$sql22 = "SELECT Name FROM candidate_info INNER JOIN voter_master on candidate_info.Id=voter_master.Id WHERE C_id=2 AND Post='CR'";
	$cr22 = mysqli_query($con, $sql22);
	if(mysqli_num_rows($cr22) > 0){
        while($row = mysqli_fetch_assoc($cr22)){
            $name2=$row["Name"];
        }
    }

$sql3 = "SELECT count(Cr) FROM voting WHERE Cr=(SELECT Id FROM candidate_info WHERE C_id=3 AND Post='CR')";
	$cr3 = mysqli_query($con, $sql3);
	if(mysqli_num_rows($cr3) > 0){
        while($row = mysqli_fetch_assoc($cr3)){
            $id3=$row["count(Cr)"];
        }
    } 
	$sql33 = "SELECT Name FROM candidate_info INNER JOIN voter_master on candidate_info.Id=voter_master.Id WHERE C_id=3 AND Post='CR'";
	$cr33 = mysqli_query($con, $sql33);
	if(mysqli_num_rows($cr33) > 0){
        while($row = mysqli_fetch_assoc($cr33)){
            $name3=$row["Name"];
        }
    }
	
 $rating_data = array(
 array('CR', 'Rating'),
 array($name1,(int)$id1),
 array($name2,(int)$id2),
 array($name3,(int)$id3), 
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


<div class="modal fade" id="cr_chart" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		<h4 class="modal-title" style="text-align:left; font-size:20px; color:#000000">CR Result</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
			
				<div id="cr_result" ></div>
	
        </div>

      </div>
      
    </div>
  </div>



