<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cpmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['update']))
  {

$adminid=intval($_GET['editid']);
 $fname=$_POST['fname'];
   $email=$_POST['emailid'];
    $mno=$_POST['mobileno'];

$sql="Update  tbladmin set AdminName=:fname,MobileNumber=:mno,Email=:email where UserRole='0' and ID=:adminid ";
$query=$dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':adminid',$adminid,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mno',$mno,PDO::PARAM_STR);

 $query->execute();

    echo '<script>alert("Sub-admin details has been updated.")</script>';
echo "<script>window.location.href ='manage-subadmins.php'</script>";


}

?>

<!DOCTYPE html>
<html>

<head>
    
    <title>Curfew Pass Management System | Add Sub-admin</title>
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
                    <h1 class="page-header">Edit Sub-admin</h1>
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

                                        <?php
$adminid=intval($_GET['editid']);
$sql="SELECT * from tbladmin where UserRole='0' and ID=:adminid";
$query = $dbh -> prepare($sql);
$query->bindParam(':adminid',$adminid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $row)
{               ?>

                                    <form method="post" enctype="multipart/form-data"> 
                                    
    <div class="form-group"> <label for="exampleInputEmail1">Full Name</label> <input type="text" name="fname" value="<?php  echo htmlentities($row->AdminName);?>" class="form-control" required='true'> </div>

<div class="form-group"> <label for="exampleInputEmail1">username (used for login)</label> 
    <input type="text" name="username" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" title="alphanumeric 6 to 12 chars" class="form-control" readonly='true' value="<?php  echo htmlentities($row->UserName);?>"> </div>

    <div class="form-group"> <label for="exampleInputEmail1">Email id</label> 
    <input type="email" name="emailid" value="<?php  echo htmlentities($row->Email);?>" class="form-control" required='true'> </div>

    <div class="form-group"> <label for="exampleInputEmail1">Mobile Number</label> 
    <input type="text" name="mobileno"  class="form-control" required='true' pattern="[0-9]{10}" title="10 numeric characters only" value="<?php  echo htmlentities($row->MobileNumber);?>"> </div>

    
   
     
     <p style="padding-left: 450px"><button type="submit" class="btn btn-primary" name="update" id="submit">Update</button></p> </form>
<?php } ?>


                                </div>
                                
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