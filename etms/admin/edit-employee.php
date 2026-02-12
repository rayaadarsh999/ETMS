<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['etmsaid']) == 0) {
    header('location:logout.php');
    exit();
}

$eid = $_GET['editid'];

/* UPDATE EMPLOYEE */
if (isset($_POST['submit'])) {

    $sql = "UPDATE tblemployee SET
            DepartmentID=:deptname,
            EmpId=:empid,
            EmpName=:empname,
            EmpEmail=:empemail,
            EmpContactNumber=:empcontno,
            Designation=:designation,
            EmpDateofbirth=:empdob,
            EmpAddress=:empadd,
            EmpDateofjoining=:empdoj,
            Description=:descr
            WHERE ID=:eid";

    $query = $dbh->prepare($sql);
    $query->bindParam(':deptname', $_POST['deptname']);
    $query->bindParam(':empid', $_POST['empid']);
    $query->bindParam(':empname', $_POST['empname']);
    $query->bindParam(':empemail', $_POST['empemail']);
    $query->bindParam(':empcontno', $_POST['empcontno']);
    $query->bindParam(':designation', $_POST['designation']);
    $query->bindParam(':empdob', $_POST['empdob']);
    $query->bindParam(':empadd', $_POST['empadd']);
    $query->bindParam(':empdoj', $_POST['empdoj']);
    $query->bindParam(':descr', $_POST['desc']);
    $query->bindParam(':eid', $eid);
    $query->execute();

    echo "<script>alert('Employee updated successfully');</script>";
}

/* FETCH EMPLOYEE DATA */
$sql = "SELECT e.*, d.DepartmentName 
        FROM tblemployee e 
        JOIN tbldepartment d ON d.ID = e.DepartmentID 
        WHERE e.ID=:eid";
$q = $dbh->prepare($sql);
$q->bindParam(':eid', $eid);
$q->execute();
$emp = $q->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Update Employee</title>
<link rel="stylesheet" href="css/custom.css">

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

<!-- PAGE TITLE (CENTERED) -->
<div class="row column_title">
<div class="col-md-12">
<div class="page_title text-center">
<h2>Update Employee</h2>
</div>
</div>
</div>

<!-- EMPLOYEE PROFILE CARD -->
<div class="row">
<div class="col-md-12">
<div class="white_shd full margin_bottom_30 text-center p-4">

<img src="images/<?php echo ($emp->ProfilePic!='') ? $emp->ProfilePic : 'user.png'; ?>"
     style="width:110px;height:110px;border-radius:50%;
     border:3px solid #0d6efd;object-fit:cover;">

<h4 style="margin-top:10px;margin-bottom:2px;font-weight:600;color:#0d6efd;">
<?php echo htmlentities($emp->EmpName); ?>
</h4>

<span style="font-size:14px;color:#6c757d;">
<?php echo htmlentities($emp->Designation); ?>
</span>

<br>

<a href="changeimage.php?editid=<?php echo $emp->ID; ?>"
   class="btn btn-sm btn-outline-primary mt-3 px-3">
<i class="fa fa-camera"></i> Change Profile Image
</a>

</div>
</div>
</div>

<!-- UPDATE FORM -->
<div class="row">
<div class="col-md-12">
<div class="white_shd full margin_bottom_30">
<div class="padding_infor_info">

<form method="post">

<label>Department</label>
<select name="deptname" class="form-control mb-2" required>
<option value="<?php echo $emp->DepartmentID; ?>">
<?php echo $emp->DepartmentName; ?>
</option>
<?php
$q2 = $dbh->prepare("SELECT * FROM tbldepartment");
$q2->execute();
$deps = $q2->fetchAll(PDO::FETCH_OBJ);
foreach ($deps as $d) {
?>
<option value="<?php echo $d->ID; ?>"><?php echo $d->DepartmentName; ?></option>
<?php } ?>
</select>

<input class="form-control mb-2" name="empid" value="<?php echo $emp->EmpId; ?>" placeholder="Employee ID" required>
<input class="form-control mb-2" name="empname" value="<?php echo $emp->EmpName; ?>" placeholder="Employee Name" required>
<input class="form-control mb-2" name="empemail" value="<?php echo $emp->EmpEmail; ?>" placeholder="Email" required>
<input class="form-control mb-2" name="empcontno" value="<?php echo $emp->EmpContactNumber; ?>" placeholder="Contact Number" required>
<input class="form-control mb-2" name="designation" value="<?php echo $emp->Designation; ?>" placeholder="Designation" required>

<label>Date of Birth</label>
<input class="form-control mb-2" type="date" name="empdob" value="<?php echo $emp->EmpDateofbirth; ?>" required>

<label>Address</label>
<textarea class="form-control mb-2" name="empadd"><?php echo $emp->EmpAddress; ?></textarea>

<label>Date of Joining</label>
<input class="form-control mb-2" type="date" name="empdoj" value="<?php echo $emp->EmpDateofjoining; ?>" required>

<label>Description</label>
<textarea class="form-control mb-3" name="desc"><?php echo $emp->Description; ?></textarea>

<div class="text-center mt-3">
   <button class="btn btn-success px-4" type="submit" name="submit">
      Update Employee
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
