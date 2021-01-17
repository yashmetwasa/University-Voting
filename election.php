<?php
session_start();
if($_SESSION['loginstatus']=="")
{
	header("location:index.php");
}
if(isset($_SESSION["username"]))
	{
		
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
                                       
            							<li class="active">Election</li>
            						</ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
						<form method="post">
						<?php
	include("conn.php");
	if(isset($_POST["add"]))
	{
			mysqli_query($con,"update election set Election='start'")or die(mysqli_error($con));
			echo "<script>alert('Voting Started.');</script>";
		
		
	}
	
	if(isset($_POST["stop"]))
	{
			mysqli_query($con,"update election set Election='stop'")or die(mysqli_error($con));
			echo "<script>alert('Voting Stopped.');</script>";
		
		
	}
	//sss
?>
                            <div class="container-fluid">

                             

                                <div class="row">
                                    <div class="col-sm-6">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Start Election</h5>
                                                </div>
                                            </div>
											<div class="panel-body p-20">
												<div class="form-group">
												<label> </label>
												<button class="btn btn-info btn-block login" type="submit" name="add"  style="margin-top:15px;">Start Election</button><br>
												</div>
											</div>
                                            </div>
                                        </div>
										
									<div class="col-sm-6">
									<div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Stop Election</h5>
                                                </div>
                                            </div>
											<div class="panel-body p-20">
												<div class="form-group">
												<label> </label>
												<button class="btn btn-info btn-block login" type="submit" name="stop"  style="margin-top:15px;">Stop Election</button><br>
												</div>
											</div>
                                            </div>
                                        </div>
										
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                </div>
                                <!-- /.row -->
								<?php 
							include("conn.php");
							$sql1 = "SELECT Election from election";
							$cr1 = mysqli_query($con, $sql1);
								while($row = mysqli_fetch_assoc($cr1)){
									$el=$row["Election"];
								}
			
							if($el=='start'){
								echo '<h3 align="center"> Election Is Running.</h3>';
							}
							else{
								echo '<h3 align="center"> Election Is Not Running.</h3>';
							}
						?>
								
								
                            </div>
                            <!-- /.container-fluid -->
							</form>
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

	<?php/* } */?>
	<?php
}
else
{
    header("location:index.php");
    //echo "problem";

}
?>