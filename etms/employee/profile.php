<?php
session_start();
include('includes/dbconnection.php');

if (strlen($_SESSION['etmsempid'])==0) {
  header('location:logout.php');
  exit();
}

if(isset($_POST['submit']))
{
    $etmseid=$_SESSION['etmsempid'];
    $empname=$_POST['empname'];
    $designation=$_POST['designation'];
    $empdob=$_POST['empdob'];
    $empadd=$_POST['empadd'];
    $desc=$_POST['desc'];

    $sql="update tblemployee set 
    EmpName=:empname,
    Designation=:designation,
    EmpDateofbirth=:empdob,
    EmpAddress=:empadd,
    Description=:desc
    where ID=:eid";

    $query = $dbh->prepare($sql);
    $query->bindParam(':empname',$empname,PDO::PARAM_STR);
    $query->bindParam(':designation',$designation,PDO::PARAM_STR);
    $query->bindParam(':empdob',$empdob,PDO::PARAM_STR);
    $query->bindParam(':empadd',$empadd,PDO::PARAM_STR);
    $query->bindParam(':desc',$desc,PDO::PARAM_STR);
    $query->bindParam(':eid',$etmseid,PDO::PARAM_STR);
    $query->execute();

    echo '<script>alert("Profile Updated Successfully")</script>';
    echo "<script>window.location.href ='profile.php'</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Employee Profile</title>

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="css/responsive.css" />
<link rel="stylesheet" href="css/colors.css" />
<link rel="stylesheet" href="css/custom.css" />

<style>
.page_title {
    text-align:center;
    margin-top:25px;
    margin-bottom:25px;
}

.profile-card {
    background:#fff;
    padding:30px;
    border-radius:12px;
    text-align:center;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
    margin-bottom:30px;
}

.profile-card img {
    width:140px;
    height:140px;
    border-radius:50%;
    object-fit:cover;
    border:4px solid #0d6efd;
}

.profile-form {
    background:#fff;
    padding:30px;
    border-radius:12px;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
}
</style>

</head>

<body class="dashboard dashboard_1">

<div class="full_container">
<div class="inner_container">

<?php include_once('includes/sidebar.php'); ?>

<div id="content">
<?php include_once('includes/header.php'); ?>

<div class="midde_cont">
<div class="container-fluid">

<!-- HEADING -->
<div class="row">
<div class="col-md-12">
<div class="page_title">
<h2>Employee Profile</h2>
</div>
</div>
</div>

<?php
$etmseid=$_SESSION['etmsempid'];
$sql="SELECT tbldepartment.DepartmentName,
tblemployee.* 
from tblemployee 
join tbldepartment on tbldepartment.ID=tblemployee.DepartmentID 
where tblemployee.ID=:eid";

$query = $dbh->prepare($sql);
$query->bindParam(':eid',$etmseid,PDO::PARAM_STR);
$query->execute();
$row=$query->fetch(PDO::FETCH_OBJ);
?>

<!-- PROFILE CARD -->
<div class="row">
<div class="col-md-12">
<div class="profile-card">

<img src="../admin/images/<?php echo ($row->ProfilePic!='')?$row->ProfilePic:'user.png'; ?>">

<h3 class="mt-3"><?php echo htmlentities($row->EmpName); ?></h3>
<p>Employee ID: <?php echo htmlentities($row->EmpId); ?></p>

<a href="changeimage.php?editid=<?php echo $row->ID;?>"
class="btn btn-primary mt-2">
<i class="fa fa-camera"></i> Change Profile Image
</a>

</div>
</div>
</div>

<!-- PROFILE FORM -->
<div class="row">
<div class="col-md-12">
<div class="profile-form">

<form method="post">

<div class="form-group">
<label>Department</label>
<input type="text" class="form-control"
value="<?php echo htmlentities($row->DepartmentName);?>" readonly>
</div>

<div class="form-group">
<label>Email</label>
<input type="email" class="form-control"
value="<?php echo htmlentities($row->EmpEmail);?>" readonly>
</div>

<div class="form-group">
<label>Contact Number</label>
<input type="text" class="form-control"
value="<?php echo htmlentities($row->EmpContactNumber);?>" readonly>
</div>

<div class="form-group">
<label>Name</label>
<input type="text" name="empname"
class="form-control"
value="<?php echo htmlentities($row->EmpName);?>" required>
</div>

<div class="form-group">
<label>Designation</label>
<input type="text" name="designation"
class="form-control"
value="<?php echo htmlentities($row->Designation);?>" required>
</div>

<div class="form-group">
<label>Date of Birth</label>
<input type="date" name="empdob"
class="form-control"
value="<?php echo htmlentities($row->EmpDateofbirth);?>" required>
</div>

<div class="form-group">
<label>Address</label>
<textarea name="empadd"
class="form-control"
required><?php echo htmlentities($row->EmpAddress);?></textarea>
</div>

<div class="form-group">
<label>Description</label>
<textarea name="desc"
class="form-control"><?php echo htmlentities($row->Description);?></textarea>
</div>

<div class="text-center mt-3">
<button type="submit" name="submit"
class="btn btn-success px-4">
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

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
