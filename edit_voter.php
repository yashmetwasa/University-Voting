
<?php
session_start();
/*error_reporting(0);
include('includes/conn.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
*/
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

    echo "UPDATE voter_master SET Id='$Id',Name='$Name',Gender='$Gender',Dob='$Dob',City='$City',Institute='$Institute',Program='$Program',M_no='$M_no',Email='$Email',Type='$Type',Voted='$Voted' where Id='" . $_POST["Id"] . "'";
$sql = mysqli_query($con,"UPDATE voter_master SET Id='$Id',Name='$Name',Gender='$Gender',Dob='$Dob',City='$City',Institute='$Institute',Program='$Program',M_no='$M_no',Email='$Email',Type='$Type',Voted='$Voted' where Id='" . $_POST["Id"] . "'")or die(mysqli_error($con));
$msg=$sql;
echo "Updated data successfully\n";

}
if(isset($_POST['delete']))
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
$Type=$_POST['Type'];
$Voted=$_POST['Voted'];

    echo "DELETE FROM `voter_master` WHERE Id=$_GET[Id]";
$sql = mysqli_query($con,"DELETE FROM voter_master where Id='" . $_POST["Id"] . "'")or die(mysqli_error($con));
$msg1=$sql;
echo "delete data successfully\n";
	header("location:voter_list.php");
}

//student details code
	$s1=$_GET["Id"];
	
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
                                    <h2 class="title">Edit Voter</</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                       
            							<li class="active">Edit Voter</li>
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
   		 	<label class="control-label col-sm-3" for="id">UserID : </label>
    		<div class="col-sm-9">
      		<input type="text" class="form-control" name="Id" id="id" value="<?php echo htmlentities($Id)?>"  readonly>
    		</div>
  		  </div> 
  
		  <div class="form-group">
   		 	<label class="control-label col-sm-3" >Name : </label>
    		<div class="col-sm-9">
      		<input type="text" class="form-control" name="Name" id="id" value="<?php echo htmlentities($Name)?>"  readonly>
    		</div>
  		  </div>

		  <div class="form-group">
   		 	<label class="control-label col-sm-3">Gender : </label>
    		<div class="col-sm-9">
      		<input type="text" class="form-control" name="Gender" id="id" value="<?php echo htmlentities($Gender)?>"  readonly>
    		</div>
  		  </div>

		  <div class="form-group">
   		 	<label class="control-label col-sm-3" for="id">DOB : </label>
    		<div class="col-sm-9">
      		<input type="text" class="form-control" name="Dob" id="id" value="<?php echo htmlentities($Dob)?>"  readonly>
    		</div>
  		  </div>
		  <div class="form-group">
   		 	<label class="control-label col-sm-3" for="id">City : </label>
    		<div class="col-sm-9">
      		<input type="text" class="form-control" name="City" id="id" value="<?php echo htmlentities($City)?>"  readonly>
    		</div>
  		  </div>
		  <div class="form-group">
   		 	<label class="control-label col-sm-3" for="id">Institute : </label>
    		<div class="col-sm-9">
      		<input type="text" class="form-control" name="Institute" id="id" value="<?php echo htmlentities($Institute)?>"  readonly>
    		</div>
  		  </div>
		  <div class="form-group">
   		 	<label class="control-label col-sm-3" for="id">Program : </label>
    		<div class="col-sm-9">
      		<input type="text" class="form-control" name="Program" id="id" value="<?php echo htmlentities($Program)?>"  readonly>
    		</div>
  		  </div>
		  <div class="form-group">
   		 	<label class="control-label col-sm-3" for="id">M_no : </label>
    		<div class="col-sm-9">
      		<input type="text" class="form-control" name="M_no" id="id" value="<?php echo htmlentities($M_no)?>"  readonly>
    		</div>
  		  </div>
		  <div class="form-group">
   		 	<label class="control-label col-sm-3" for="id">Email : </label>
    		<div class="col-sm-9">
      		<input type="text" class="form-control" name="Email" id="id" value="<?php echo htmlentities($Email)?>"  readonly>
    		</div>
  		  </div>
		  <div class="form-group">
   		 	<label class="control-label col-sm-3" for="id">Voted : </label>
    		<div class="col-sm-9">
      		<input type="text" class="form-control" name="Voted" id="id" value="<?php echo htmlentities($Voted)?>" readonly>
    		</div>
  		  </div>

            <div class="form-group col-sm-12">
  			<button class="btn btn-info btn-block login" id="submit" type="submit" name="delete">Delete</button><br>
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