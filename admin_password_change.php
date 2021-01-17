<?php
session_start();
//echo $_SESSION["user"];
//error_reporting(0);
if($_SESSION['loginstatus']=="")
{
	header("location:index.php");
}

//include('conn.php');
if(isset($_SESSION["username"]))
	{
		//echo "welcome ".$_SESSION['username'];
include("conn.php");
if(isset($_POST['cp']))
{
	$op=$_POST["pwd1"];
	$sql = "SELECT Password FROM login where Type='a'";
    $typ = mysqli_query($con, $sql);
	if(mysqli_num_rows($typ) > 0){
            while($row = mysqli_fetch_assoc($typ)){
               $p=$row["Password"];
            }
         }
			if($p==$op)
			{
				if($_POST["pwd2"]==$_POST["pwd3"])
				{
					mysqli_query($con,"update login set Password='" . $_POST["pwd2"] . "' where Type='a'")or die(mysqli_error($con));
					header("location:index.php");
				}
				else
				{
					echo "<script>alert('New & conform password not matched');</script>";
				}
			}
			else
			{
				echo "<script>alert('Incorrect current password');</script>";
			}
	
	mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin - LaSalle College Voting</title>
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
.center{
	margin:50px 250px auto auto;
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
                                    <h2 class="title">Dashboard</</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                       
            							<li class="active"> Dashboard</li>
            						</ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                                <div class="row">
                                    <div class="col-sm-6">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Add Election </h5>
                                                </div>
                                            </div>


                                            <div class="panel-body p-20">
											




			<form  method="post">
					<div class="form-group row" style="padding-left:100px auto">
						<label class="col-sm-12 col-form-label">Current Password :</label>
							<div class="col-sm-12">
								<input class="form-control"  title="Password must contain at least 6 characters, including UPPER/lowercase and numbers" type="password" name="pwd1" id="pwd1" placeholder="Enter Current password" required  onChange="
  this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
  if(this.checkValidity()) form.pwd2.pattern = RegExp.escape(this.value);">
							</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-12 col-form-label">New Password :</label>
							<div class="col-sm-12">
								<input class="form-control"  title="Password must contain at least 6 characters, including UPPER/lowercase and numbers" type="password" name="pwd2" id="pwd1" placeholder="Enter New password" required  onChange="
  this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
  if(this.checkValidity()) form.pwd2.pattern = RegExp.escape(this.value);">
							</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-12 col-form-label">Repeat :</label>
							<div class="col-sm-12">
								<input class="form-control" title="Please enter the same Password as above" type="password" name="pwd3" id="pwd2" placeholder="Confirm New password" required  onChange="
  this.setCustomValidity(this.validity.patternMismatch ? this.title : '');">
							</div>
					</div>
					
					
					<div class="form-group row"> 
    <div class="col-sm-12">
	  <button class="btn btn-info btn-block register" id="submit" type="submit" name="cp" onClick="f1()">Change Password</button>
    </div>
  </div>
					
					
		</form>
											

                
                                                             
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

	
<?php
}
else
{
    header("location:index.php");
    //echo "problem";

}
?>