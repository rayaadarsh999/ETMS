<?php
session_start();
include('includes/dbconnection.php');

if (strlen($_SESSION['etmsaid']) == 0) {
    header('location:logout.php');
    exit();
} else {

if(isset($_POST['submit'])) {

$deptid=$_POST['deptid'];
$emplist=$_POST['emplist'];
$tpriority=$_POST['tpriority'];
$ttitle=$_POST['ttitle'];
$tdesc=$_POST['tdesc'];
$tsdate=$_POST['tsdate'];
$tedate=$_POST['tedate'];
$eid=$_GET['editid'];

$sql="UPDATE tbltask 
      SET DeptID=:deptid,
          AssignTaskto=:emplist,
          TaskPriority=:tpriority,
          TaskTitle=:ttitle,
          TaskDescription=:tdesc,
          StartDate=:tsdate,
          EndDate=:tedate
      WHERE ID=:eid";

$query=$dbh->prepare($sql);
$query->bindParam(':deptid',$deptid,PDO::PARAM_STR);
$query->bindParam(':emplist',$emplist,PDO::PARAM_STR);
$query->bindParam(':tpriority',$tpriority,PDO::PARAM_STR);
$query->bindParam(':ttitle',$ttitle,PDO::PARAM_STR);
$query->bindParam(':tdesc',$tdesc,PDO::PARAM_STR);
$query->bindParam(':tsdate',$tsdate,PDO::PARAM_STR);
$query->bindParam(':tedate',$tedate,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();

echo '<script>alert("Task detail has been updated")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Employee Task Management System || Update Task</title>
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
<h2>Update Task</h2>
</div>
</div>
</div>

<div class="row column8 graph">
<div class="col-md-12">
<div class="white_shd full margin_bottom_30">
<div class="full graph_head">
<div class="heading1 margin_0">
<h2>Update Task</h2>
</div>
</div>

<div class="full progress_bar_inner">
<div class="row">
<div class="col-md-12">
<div class="full">
<div class="padding_infor_info">
<div class="alert alert-primary">

<form method="post">
<?php
$eid=$_GET['editid'];

$sql="SELECT tbltask.ID as tid,
             tbltask.TaskTitle,
             tbltask.DeptID,
             tbltask.TaskPriority,
             tbltask.AssignTaskto,
             tbltask.TaskDescription,
             tbltask.StartDate,
             tbltask.EndDate,
             tbldepartment.DepartmentName,
             tbldepartment.ID as did,
             tblemployee.EmpName,
             tblemployee.EmpId
      FROM tbltask
      JOIN tbldepartment ON tbldepartment.ID=tbltask.DeptID
      JOIN tblemployee ON tblemployee.ID=tbltask.AssignTaskto
      WHERE tbltask.ID=:eid";

$query = $dbh->prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0) {
foreach($results as $row) {

$today = date('Y-m-d'); // ✅ Today Date
?>

<fieldset>

<div class="field">
<label class="label_field">Department Name</label>
<select name="deptid" class="form-control" required>
<option value="<?php echo htmlentities($row->DeptID);?>">
<?php echo htmlentities($row->DepartmentName);?>
</option>
<?php 
$sql2 = "SELECT * FROM tbldepartment";
$query2 = $dbh->prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);
foreach($result2 as $row2){ ?>
<option value="<?php echo htmlentities($row2->ID);?>">
<?php echo htmlentities($row2->DepartmentName);?>
</option>
<?php } ?>
</select>
</div>

<br>

<div class="field">
<label class="label_field">Employee List</label>
<select name="emplist" class="form-control" required>
<option value="<?php echo htmlentities($row->AssignTaskto);?>">
<?php echo htmlentities($row->EmpName);?>
</option>
<?php 
$sql3 = "SELECT * FROM tblemployee";
$query3 = $dbh->prepare($sql3);
$query3->execute();
$result3=$query3->fetchAll(PDO::FETCH_OBJ);
foreach($result3 as $row3){ ?>
<option value="<?php echo htmlentities($row3->ID);?>">
<?php echo htmlentities($row3->EmpName);?>
</option>
<?php } ?>
</select>
</div>

<br>

<div class="field">
<label class="label_field">Task Priority</label>
<select name="tpriority" class="form-control" required>
<option value="<?php echo htmlentities($row->TaskPriority);?>">
<?php echo htmlentities($row->TaskPriority);?>
</option>
<option value="Normal">Normal</option>
<option value="Medium">Medium</option>
<option value="Urgent">Urgent</option>
<option value="Most Urgent">Most Urgent</option>
</select>
</div>

<br>

<div class="field">
<label class="label_field">Task Title</label>
<input type="text" name="ttitle" value="<?php echo htmlentities($row->TaskTitle);?>" class="form-control" required>
</div>

<br>

<div class="field">
<label class="label_field">Task Description</label>
<textarea name="tdesc" class="form-control" required><?php echo htmlentities($row->TaskDescription);?></textarea>
</div>

<br>

<!-- ✅ START DATE RESTRICTION -->
<div class="field">
<label class="label_field">Task Start Date</label>
<input type="date" 
       name="tsdate" 
       id="startDate"
       value="<?php echo htmlentities($row->StartDate);?>" 
       min="<?php echo $today; ?>" 
       class="form-control" required>
</div>

<br>

<!-- ✅ END DATE RESTRICTION -->
<div class="field">
<label class="label_field">Task End Date</label>
<input type="date" 
       name="tedate" 
       id="endDate"
       value="<?php echo htmlentities($row->EndDate);?>" 
       class="form-control" required>
</div>

<br>

<div class="field margin_0 text-center">
<button class="main_bt" type="submit" name="submit">Update</button>
</div>

</fieldset>

<?php } } ?>

</form>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include_once('includes/footer.php');?>

</div>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/perfect-scrollbar.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    var startDate = document.getElementById("startDate");
    var endDate = document.getElementById("endDate");

    // ✅ Page load hote hi End Date ka minimum = Start Date
    endDate.min = startDate.value;

    // ✅ Jab Start Date change ho
    startDate.addEventListener("change", function () {
        endDate.min = this.value;

        // Agar End Date chhota hai to clear kar do
        if (endDate.value < this.value) {
            endDate.value = this.value;
        }
    });

});
</script>


<script>
var ps = new PerfectScrollbar('#sidebar');
</script>

<script src="js/custom.js"></script>

</body>
</html>
<?php } ?>
