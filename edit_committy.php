
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
	$newfilename = $_POST['name'];
	$dir="D:/xamp/htdocs/University_Voting/images/committy/";
	$C_image=$dir.$newfilename;//.basename($_FILES['img']['name']);
	
	$C_id=$_POST['id']; 
	$C_name=$_POST['name'];

   // echo "UPDATE committy SET C_id='$C_id',C_name='$C_name',C_image='$C_image' where C_id='" . $_POST["id"] . "'";
	mysqli_query($con,"UPDATE committy SET C_id='$C_id',C_name='$C_name',C_image='$C_image' where C_id='" . $_POST["id"] . "'" . $_POST["id"] . "'")or die(mysqli_error($con));
//$msg=$sql;
//echo "Updated data successfully\n";

}
if(isset($_POST['delete']))
{
$C_id=$_POST['id']; 



	mysqli_query($con,"DELETE FROM committy where C_id='" . $_POST["id"] . "'")or die(mysqli_error($con));
	
	echo "<script>alert('committy deleted ');</script>";

	header("location:committy_list.php");
}

//student details code
	$s1=$_GET["C_id"];
	
	$result1=mysqli_query($con,"select * from committy where C_id='$s1'") or die(mysqli_error($con));
	 while($row =mysqli_fetch_array($result1))
	 {
		 
			$C_id=$row[0];
            $C_name=$row[1];
			//$C_image=$row[2];
            
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
                                    <h2 class="title">Edit Committy</</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                       
            							<li class="active">Edit Committy</li>
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

                                                
<form method="post" enctype="multipart/form-data">

        <div class="modal-body">
          
		  <div class="form-group">
   		 	<label class="control-label col-sm-3" for="id">CommittyID : </label>
    		<div class="col-sm-9">
      		<input type="text" class="form-control" name="id" id="id" value="<?php echo htmlentities($C_id)?>">
    		</div>
  		  </div> 
  
		  <div class="form-group">
   		 	<label class="control-label col-sm-3" >Name : </label>
    		<div class="col-sm-9">
      		<input type="text" class="form-control" name="name" id="id" value="<?php echo htmlentities($C_name)?>">
    		</div>
  		  </div>
		  
		  <!--<div class="form-group">
		    <label class="control-label col-sm-3">Image :</label>
			<div class="pom-agile col-md-9">
			<input class="form-control" type="file" name="img" id="img" required >
			</div>
		  </div>-->

            <div class="form-group col-sm-12" style="margin-top:15px">
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