<?php
session_start();
if($_SESSION['loginstatus']=="")
{
	header("location:index.php");
}
if(isset($_SESSION["username"]))
	{
		//echo "welcome ".$_SESSION['username'];
include("conn.php");
if(isset($_POST['update']))
{
$Id=$_POST['Id']; 
$Name=$_POST['name'];
$C_id= $_POST['committy'];
$Post=$_POST['post']; 
$Bio=$_POST['bio'];


    //echo "UPDATE voter_master SET Type='c' where Id='" . $_POST["Id"] . "'";
	
	mysqli_query($con,"UPDATE voter_master SET Type='c',Name='$Name' where Id='" . $_POST["Id"] . "'")or die(mysqli_error($con));
	mysqli_query($con,"UPDATE login SET Type='c' where Id='" . $_POST["Id"] . "'")or die(mysqli_error($con));
//$msg=$sql;

	mysqli_query($con,"insert into candidate_info values('$Id','$C_id','$Post','$Bio')")or die(mysqli_error($con));
//echo "Updated data successfully\n";
header("location:manage_candidate.php");
}

	


//student details code
	$s1=$_GET["Id"];
	
	$result1=mysqli_query($con,"select * from voter_master where Id='$s1'") or die(mysqli_error($con));
	 while($row =mysqli_fetch_array($result1))
	 {
		 
			$Id=$row[0];
            $Name=$row[1];
			
	 }
	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Edit Voters</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
          <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
   <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
<?php include('includes/leftbar.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Add Candidate</</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                       
            							<li class="active">Add Candidate</li>
            						</ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">
								<div class="row">
                                    <div class="col-md-12">

                                          <div class="panel-body p-20">

                                                
<form method="post">
<?php 
 /*
//echo "Hello"; die;
//include("conn.php");
$sql = "SELECT * from voter_master where Id=".$_GET['id'];
$cnt=1;
if ($res = mysqli_query($con, $sql)) {
    if (mysqli_num_rows($res) > 0) {
 
  while ($row = mysqli_fetch_array($res)) {	  
$Id=$_POST['Id']; 
$Name=$_POST['Name'];
$Gender= $_POST['Gender'];
$Dob=$_POST['Dob']; 
$City=$_POST['City']; 
$Institute=$_POST['Institute']; 
$Program=$_POST['Program'];
$M_no=$_POST['M_no'];
$Email=$_POST['Email'];
$Type=$_POST['Type'];
$Voted=$_POST['Voted'];
}*/?>
        <div class="modal-body">
          
		  <div class="form-group">
   		 	<label class="control-label col-sm-3">UserID : </label>
    		<div class="col-sm-9">
      		<input type="text" class="form-control" name="Id" id="id" value="<?php echo htmlentities($Id)?>"  readonly>
    		</div>
  		  </div> 
  
		  <div class="form-group">
   		 	<label class="control-label col-sm-3" >Name : </label>
    		<div class="col-sm-9">
      		<input type="text" class="form-control" name="name" id="id" value="<?php echo htmlentities($Name)?>">
    		</div>
  		  </div>

		  <div class="form-group">
   		 	<label class="control-label col-sm-3">Committy : </label>
    		<div class="col-sm-9">
      		<!--<input type="text" class="form-control" name="post" value="" required>-->
			<select class="form-control" name="committy" value="" required>
			 <?php
				  include("conn.php");
                     $menu=" "; 
                   
                  $sql="SELECT C_id,C_name FROM committy"; //selection query
                  $rs = mysqli_query($con, $sql);//odbc_exec($conn,$sql);

                   
                   if (mysqli_num_rows($rs) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($rs)) {
                     $menu .= "<option value=".$row['C_id'].">" . $row['C_name']. "</option>";
    }
}

                  echo $menu;
                  
                  mysqli_close($con);

?> 

							<!--<option value="empty">Select Committy</option>
							<option value=""></option>
							<option value=""></option>-->
			</select>
			</div>
    	  </div>

		  <div class="form-group">
   		 	<label class="control-label col-sm-3">Post : </label>
    		<div class="col-sm-9">
      		<!--<input type="text" class="form-control" name="post" value="" required>-->
			<select class="form-control" name="post" value="" required>
							<option value="empty">Select Post</option>
							<option value="CR">CR</option>
							<option value="FR">FR</option>
							<option value="FGS">FGS</option>
			</select>
			</div>
    	  </div>
  		  
		  
		  <div class="form-group">
   		 	<label class="control-label col-sm-3">About : </label>
    		<div class="col-sm-9">
      		<textarea class="form-control" name="bio" value=""></textarea>
    		</div>
  		  </div>
		  
		  
  			<div class="form-group col-sm-12">
  			<button class="btn btn-info btn-block login" id="submit" type="submit" name="update">Add</button><br>
          	</div>
			
        </div>
		</form>
                                         
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
       <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/DataTables/datatables.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>
    </body>
</html>

	<?php /*}*/ ?>
	<?php /*}*/ ?>
	<?php /*}*/ ?>
	<?php
}
else
{
    header("location:index.php");
    //echo "problem";

}
?>