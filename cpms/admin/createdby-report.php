<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cpmsaid']==0)) {
  header('location:logout.php');
  } else{
    
?>
<!DOCTYPE html>
<html>

<head>
    
    <title>Curfew Pass Management System |Pass Reports</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />



</head>

<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
      <?php include_once('includes/header.php');?>
        <!-- end navbar top -->

        <!-- navbar side -->
        <?php include_once('includes/sidebar.php');?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Created By Reports</h1>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="post" name="sbadminreport" > 
                                    
    <div class="form-group"> <label for="exampleInputEmail1">From Date</label><input type="date" id="fromdate" name="fromdate" value="" class="form-control" required="true"> </div>
    <div class="form-group"> <label for="exampleInputEmail1">To Date</label><input type="date" id="todate" name="todate" value="" class="form-control" required="true"> </div>
   
     <p style="padding-left: 450px"><button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button></p> </form>
                                </div>

<?php

if(isset($_POST['submit'])){
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$_SESSION['fdate']=$fdate;
$_SESSION['tdate']=$tdate;
    ?>
   <div class="col-lg-12">
    <hr />
                                <h3 align="center" style="color:blue">Pass Created by Report from <?php echo $fdate?> to <?php echo $tdate?></h3>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                       <tr>
                                            <th>S.NO</th>
                                           <th>Created By</th>
                                            <th>Total Pass Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$sql="SELECT CreatedBy,count(ID) as total from tblpass where date(PasscreationDate) between '$fdate' and '$tdate' group by CreatedBy";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                                                          <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <td><?php  echo htmlentities($row->CreatedBy);?></td>
                  <td><a href="createdby-detailed-report.php?cby=<?php echo htmlentities ($row->CreatedBy);?>" target="_blank"><?php echo htmlentities($row->total); ?></a>  </td>
                </tr>
                 <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="3"> No record found  between these dates</td>

  </tr>
   
<?php } ?> 
                                       
                                        
                                    </tbody>
                                </table>
                                </div>
<?php } ?>


                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>

</body>

</html>
<?php }  ?>