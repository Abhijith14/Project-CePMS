<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cpmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$mpmsaid=$_SESSION['cpmsaid'];
 $fname=$_POST['fname'];
  $uname=$_POST['username'];
   $email=$_POST['emailid'];
    $mno=$_POST['mobileno'];
     $upwd=md5($_POST['upassword']);
     $urole='0';
$ret="select ID from tbladmin where UserName=:uname";
 $query= $dbh -> prepare($ret);
$query->bindParam(':uname',$uname,PDO::PARAM_STR);

$query-> execute();
     $results = $query -> fetchAll(PDO::FETCH_OBJ);
     if($query -> rowCount() == 0)
{
$sql="insert into tbladmin(AdminName,UserName,MobileNumber,Email,Password,UserRole)values(:fname,:uname,:mno,:email,:upwd,:urole)";
$query=$dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':uname',$uname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mno',$mno,PDO::PARAM_STR);
$query->bindParam(':upwd',$upwd,PDO::PARAM_STR);
$query->bindParam(':urole',$urole,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Sub-admin has been created.")</script>';
echo "<script>window.location.href ='manage-subadmins.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

else
{

echo "<script>alert('UserName Already Exist. Please try again');</script>";
}
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
                    <h1 class="page-header">Add Sub-admin</h1>
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
                                    <form method="post" enctype="multipart/form-data"> 
                                    
    <div class="form-group"> <label for="exampleInputEmail1">Full Name</label> <input type="text" name="fname" value="" class="form-control" required='true'> </div>

<div class="form-group"> <label for="exampleInputEmail1">username (used for login)</label> 
    <input type="text" name="username" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" title="alphanumeric 6 to 12 chars" class="form-control" required='true'> </div>

    <div class="form-group"> <label for="exampleInputEmail1">Email id</label> 
    <input type="email" name="emailid" value="" class="form-control" required='true'> </div>

    <div class="form-group"> <label for="exampleInputEmail1">Mobile Number</label> 
    <input type="text" name="mobileno"  class="form-control" required='true' pattern="[0-9]{10}" title="10 numeric characters only"> </div>

    <div class="form-group"> <label for="exampleInputEmail1">Password</label> 
    <input type="text" name="upassword" value="" class="form-control" required='true'> </div>
   
     
     <p style="padding-left: 450px"><button type="submit" class="btn btn-primary" name="submit" id="submit">Add</button></p> </form>
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