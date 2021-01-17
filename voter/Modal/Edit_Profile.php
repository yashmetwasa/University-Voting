<?php
include("conn.php");
//voters details code
	$s1=$_SESSION['username'];
	
	$result1=mysqli_query($con,"select * from voter_master where Id='$s1'") or die(mysqli_error($con));
	 while($row =mysqli_fetch_array($result1))
	 {
			$Id=$row[0];
            $Name=$row[1];
			$Gender=$row[2];
			$Dob=$row[3];
			$City=$row[4];
			$Institute=$row[5];
			$Program = $row[6];
			$M_no=$row[7];
			$Email=$row[8];	
			$Type=$row[11];
			$Voted=$row[12];
			
	 }
if(isset($_POST['update']))
{
$Id=$_POST['Id']; 
$Name=$_POST['Name'];
$Gender= $_POST['Gender'];
$Dob=$_POST['Dob']; 
$City=$_POST['City']; 
$Institute=$_POST['Institute']; 
$Program=$_POST['Program'];
$M_no=$_POST['M_no'];
$Email=$_POST['Email'];

	
	mysqli_query($con,"UPDATE voter_master SET Id='$Id',Name='$Name',Gender='$Gender',Dob='$Dob',City='$City',Institute='$Institute',Program='$Program',M_no='$M_no',Email='$Email',Type='$Type',Voted='$Voted' where Id='" . $_POST["Id"] . "'")or die(mysqli_error($con));
	header("location:voter.php");
}


		 
	 
	
?>
<div class="modal fade" id="Edit_Profile" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		<h4 class="modal-title" style="text-align:left; font-size:20px; color:#000000">Edit your Profile</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
		<form method="post">
        
          	<div class="form-group col-sm-12">
   		 	<label class="control-label col-sm-3">ID : </label>
      		<input type="text" class="form-control col-sm-8" name="Id" value="<?php echo htmlentities($Id)?>" readonly="yes">
  			</div> 
  
  			<div class="form-group col-sm-12">
   		 	<label class="control-label col-sm-3">Name : </label>
      		<input type="text" class="form-control col-sm-8" name="Name" value="<?php echo htmlentities($Name)?>">
  			</div>
			
			<div class="form-group col-sm-12">
   		 	<label class="control-label col-sm-3">Gender : </label>
  			<input type="text" class="form-control col-sm-8" name="Gender" value="<?php echo htmlentities($Gender)?>">
			</div>
			
			<div class="form-group col-sm-12">
   		 	<label class="control-label col-sm-3">Birth Date: </label>
      		<input type="text" class="form-control col-sm-8" name="Dob" value="<?php echo htmlentities($Dob)?>">
  			</div>
			
			<div class="form-group col-sm-12">
   		 	<label class="control-label col-sm-3">City : </label>
      		<input type="text" class="form-control col-sm-8" name="City" value="<?php echo htmlentities($City)?>">
  			</div>
			
			<div class="form-group col-sm-12">
   		 	<label class="control-label col-sm-3">Field : </label>
      		<input type="text" class="form-control col-sm-8" name="Institute" value="<?php echo htmlentities($Institute)?>" readonly="yes">
  			</div>
			
			<div class="form-group col-sm-12">
   		 	<label class="control-label col-sm-3">Program : </label>
      		<input type="text" class="form-control col-sm-8" name="Program" value="<?php echo htmlentities($Program)?>">
  			</div>
			
			<div class="form-group col-sm-12">
   		 	<label class="control-label col-sm-3" for="id">Contact No : </label>
      		<input type="text" class="form-control col-sm-8" name="M_no" value="<?php echo htmlentities($M_no)?>">
  			</div>
			
			<div class="form-group col-sm-12">
   		 	<label class="control-label col-sm-3">Email Id: </label>
      		<input type="email" class="form-control col-sm-8" name="Email" value="<?php echo htmlentities($Email)?>">
  			</div>
			
			<div class="form-group col-sm-12">
			<button type="submit" name="update"  class="edit col-sm-12">Update</button>
			</div>
		</form>
        </div>

      </div>
      
    </div>
  </div>
  <?php
//}

?>