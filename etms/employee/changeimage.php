<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['etmsempid']) == 0) {
    header('location:logout.php');
} else {

if(isset($_POST['submit'])) {

    $etmseid = $_SESSION['etmsempid'];
    $pic = $_FILES["pic"]["name"];
    $extension = substr($pic, strlen($pic)-4, strlen($pic));
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");

    if(!in_array($extension, $allowed_extensions)) {

        echo "<script>alert('Pic has Invalid format. Only jpg / jpeg / png / gif allowed');</script>";

    } else {

        $pic = md5($pic).time().$extension;

        // ✅ FIXED PATH (VERY IMPORTANT)
        move_uploaded_file($_FILES["pic"]["tmp_name"], "../admin/images/".$pic);

        $sql = "update tblemployee set ProfilePic=:pic where ID=:eid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':pic',$pic,PDO::PARAM_STR);
        $query->bindParam(':eid',$etmseid,PDO::PARAM_STR);
        $query->execute();

        echo '<script>alert("Employee profile pic has been updated")</script>';
        echo "<script>window.location.href='profile.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Employee Task Management System || Update Employee Profile Pic</title>

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="css/responsive.css" />
<link rel="stylesheet" href="css/colors.css" />
<link rel="stylesheet" href="css/bootstrap-select.css" />
<link rel="stylesheet" href="css/perfect-scrollbar.css" />
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="js/semantic.min.css" />

</head>

<body class="inner_page general_elements">
<div class="full_container">
<div class="inner_container">

<?php include_once('includes/sidebar.php');?>
<div id="content">
<?php include_once('includes/header.php');?>

<div class="midde_cont">
<div class="container-fluid">

<div class="row column_title">
<div class="col-md-12">
<div class="page_title">
<h2>Update Employee Profile Pic</h2>
</div>
</div>
</div>

<div class="row column8 graph">
<div class="col-md-12">
<div class="white_shd full margin_bottom_30">
<div class="full graph_head">
<div class="heading1 margin_0">
<h2>Update Employee Profile Pic</h2>
</div>
</div>

<div class="full progress_bar_inner">
<div class="row">
<div class="col-md-12">
<div class="full">
<div class="padding_infor_info">
<div class="alert alert-primary" role="alert">

<form method="post" enctype="multipart/form-data">

<?php
$eid = $_GET['editid'];

$sql="SELECT tblemployee.EmpName,
             tblemployee.ProfilePic
      FROM tblemployee
      WHERE tblemployee.ID=:eid";

$query = $dbh->prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0) {
foreach($results as $row) {
?>

<fieldset>

<div class="field">
<label class="label_field">Employee Name</label>
<input type="text" value="<?php echo htmlentities($row->EmpName);?>" class="form-control" readonly="true">
</div>

<br>

<div class="field">

<br>
<div class="field text-center">
   <label class="label_field">Old Employee Pic</label>
   <br><br>

   <img src="../admin/images/<?php echo $row->ProfilePic;?>"
        style="width:110px;
               height:110px;
               border-radius:50%;
               object-fit:cover;
               border:4px solid #007bff;
               display:block;
               margin:0 auto;">
</div>


<br>

<div class="field">
<label class="label_field">New Employee Pic</label>
<input type="file" name="pic" class="form-control" required>
</div>

<br>

<?php }} ?>

<div class="field margin_0 text-center">
<button class="main_bt" type="submit" name="submit">Update</button>
</div>

</fieldset>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include_once('includes/footer');?>
</div>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/perfect-scrollbar.min.js"></script>
<script>
new PerfectScrollbar('#sidebar');
</script>
<script src="js/custom.js"></script>
<script src="js/semantic.min.js"></script>

</body>
</html>
<?php } ?>
