<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['etmsaid']) == 0) {
  header('location:logout.php');
  exit();
}

if(isset($_POST['submit'])) {
    $adminid = $_SESSION['etmsaid'];
    $AName   = $_POST['adminname'];
    $mobno   = $_POST['mobilenumber'];
    $email   = $_POST['email'];

    $sql = "UPDATE tbladmin 
            SET AdminName=:adminname,
                MobileNumber=:mobilenumber,
                Email=:email 
            WHERE ID=:aid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':adminname',$AName,PDO::PARAM_STR);
    $query->bindParam(':mobilenumber',$mobno,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':aid',$adminid,PDO::PARAM_STR);
    $query->execute();

    echo "<script>alert('Profile updated successfully');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Profile</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/colors.css">
<link rel="stylesheet" href="css/custom.css">
</head>

<body class="inner_page general_elements">
<div class="full_container">
<div class="inner_container">

<?php include_once('includes/sidebar.php'); ?>
<div id="content">
<?php include_once('includes/header.php'); ?>

<div class="midde_cont">
<div class="container-fluid">

<!-- PAGE TITLE -->
<div class="row column_title">
<div class="col-md-12">
<div class="page_title text-center">
<h2>Admin Profile</h2>
</div>
</div>
</div>

<?php
$aid = $_SESSION['etmsaid'];
$sql = "SELECT * FROM tbladmin WHERE ID=:aid";
$query = $dbh->prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$admin = $query->fetch(PDO::FETCH_OBJ);
?>

<!-- PROFILE CARD -->
<div class="row">
<div class="col-md-12">
<div class="white_shd full margin_bottom_30 text-center p-4">

<img src="images/<?php echo ($admin->ProfilePic!='') ? $admin->ProfilePic : 'user.png'; ?>"
     style="width:120px;height:120px;border-radius:50%;
     border:3px solid #0d6efd;object-fit:cover;">

<h4 class="mt-3" style="color:#0d6efd;"><?php echo $admin->AdminName; ?></h4>
<p><?php echo $admin->Email; ?></p>

<a href="change-admin-image.php"
   class="btn btn-outline-primary btn-sm mt-2">
<i class="fa fa-camera"></i> Change Profile Image
</a>

</div>
</div>
</div>

<!-- PROFILE UPDATE FORM -->
<div class="row">
<div class="col-md-12">
<div class="white_shd full margin_bottom_30">
<div class="padding_infor_info">

<form method="post">

<label>Admin Name</label>
<input type="text" name="adminname"
       value="<?php echo $admin->AdminName; ?>"
       class="form-control mb-2" required>

<label>Username</label>
<input type="text" value="<?php echo $admin->UserName; ?>"
       class="form-control mb-2" readonly>

<label>Mobile Number</label>
<input type="text" name="mobilenumber"
       value="<?php echo $admin->MobileNumber; ?>"
       class="form-control mb-2" required>

<label>Email</label>
<input type="email" name="email"
       value="<?php echo $admin->Email; ?>"
       class="form-control mb-3" required>

<div class="text-center">
<button type="submit" name="submit" class="btn btn-success px-4">
Update Profile
</button>
</div>

</form>

</div>
</div>
</div>
</div>

<?php include_once('includes/footer.php'); ?>

</div>
</div>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/perfect-scrollbar.min.js"></script>
<script>
new PerfectScrollbar('#sidebar');
</script>

</body>
</html>
