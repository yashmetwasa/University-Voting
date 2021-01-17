<?php
include("conn.php");
//$s1=$c;
//echo $c;	
	$result1=mysqli_query($con,"select candidate_info.Id,Name,C_id,Post,M_no from voter_master INNER JOIN candidate_info on voter_master.Id=candidate_info.Id where candidate_info.Id='$cr'") or die(mysqli_error($con));
	 while($row =mysqli_fetch_array($result1))
	 {
		 
		$Id=$row[0];
        $Name=$row[1];	
		$C_id=$row[2];
		$Post=$row[3];
		$M_no=$row[4];	
			
	 }
?>
<div class="modal fade" id="Candidate_Info" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		<h4 class="modal-title" style="text-align:left; font-size:20px; color:#000000">Candidate Bio</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        
        <div class="modal-body">
          
          
          	<div class="form-group col-sm-12">
   		 	<label class="control-label col-sm-3" for="id">ID : </label>
      		<input type="text" class="form-control col-sm-8" name="id" value="<?php echo htmlentities($Id)?>" readonly="yes">
  			</div> 
  
  			<div class="form-group col-sm-12">
   		 	<label class="control-label col-sm-3" for="id">Name : </label>
      		<input type="text" class="form-control col-sm-8" name="name" value="<?php echo htmlentities($Name)?>" readonly="yes">
  			</div>
			
			<div class="form-group col-sm-12">
   		 	<label class="control-label col-sm-3" for="id">Committy: </label>
      		<input type="text" class="form-control col-sm-8" name="committy" value="<?php echo htmlentities($C_id)?>" readonly="yes">
  			</div>
			
			<div class="form-group col-sm-12">
   		 	<label class="control-label col-sm-3" for="id">Post : </label>
      		<input type="text" class="form-control col-sm-8" name="post" value="<?php echo htmlentities($Post)?>" readonly="yes">
  			</div>
			
			<div class="form-group col-sm-12">
   		 	<label class="control-label col-sm-3" for="id">Contact : </label>
      		<input type="text" class="form-control col-sm-8" name="no" value="<?php echo htmlentities($M_no)?>" readonly="yes">
  			</div>
          
        </div>

      </div>
      
    </div>
	<?php
	$cr=0; ?>
  </div>