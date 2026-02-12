<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(strlen($_SESSION['etmsempid']==0)){
    header('location:logout.php');
} else {

$vid = intval($_GET['viewid']);
$status = "";
$expired = false;

/* ================= UPDATE SECTION ================= */

if(isset($_POST['submit'])){

    $status = $_POST['status'];
    $remark = $_POST['remark'];
    $workcom = $_POST['workcom'];

    $sql="INSERT INTO tbltasktracking(TaskID,Remark,Status,WorkCompleted) 
          VALUES(:vid,:remark,:status,:workcom)";
    $query=$dbh->prepare($sql);
    $query->bindParam(':vid',$vid,PDO::PARAM_INT);
    $query->bindParam(':remark',$remark,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->bindParam(':workcom',$workcom,PDO::PARAM_STR);
    $query->execute();

    $sql="UPDATE tbltask 
          SET Status=:status,Remark=:remark,WorkCompleted=:workcom 
          WHERE ID=:vid";
    $query=$dbh->prepare($sql);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->bindParam(':remark',$remark,PDO::PARAM_STR);
    $query->bindParam(':workcom',$workcom,PDO::PARAM_STR);
    $query->bindParam(':vid',$vid,PDO::PARAM_INT);
    $query->execute();

    echo "<script>alert('Task Updated Successfully');</script>";
    echo "<script>window.location.href='all-task.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Employee Task Management System | Task Details</title>

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="css/responsive.css" />
<link rel="stylesheet" href="css/colors.css" />
<link rel="stylesheet" href="css/custom.css" />

<style>
.main_heading{
    background:#1f2937;
    color:#fff;
    padding:15px;
    font-weight:600;
    text-transform:uppercase;
}
.badge-custom{
    padding:6px 12px;
    border-radius:4px;
    color:#fff;
    font-size:13px;
}
.normal{background:#17a2b8;}
.urgent{background:#ffc107;color:#000;}
.mosturgent{background:#dc3545;}
.completed{background:#28a745;}
.pending{background:#6c757d;}
</style>
</head>

<body class="inner_page tables_page">
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
<h2>Task Details</h2>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="white_shd full margin_bottom_30">

<div class="main_heading">
TASK MAIN INFORMATION
</div>

<div class="padding_infor_info">

<?php
$sql="SELECT tbltask.*,tbldepartment.DepartmentName,
      tblemployee.EmpName,tblemployee.EmpId
      FROM tbltask
      JOIN tbldepartment ON tbldepartment.ID=tbltask.DeptID
      JOIN tblemployee ON tblemployee.ID=tbltask.AssignTaskto
      WHERE tbltask.ID=:vid";

$query=$dbh->prepare($sql);
$query->bindParam(':vid',$vid,PDO::PARAM_INT);
$query->execute();
$row=$query->fetch(PDO::FETCH_OBJ);

if($query->rowCount()>0){

$status = $row->Status;

/* ===== FINAL CORRECT DEADLINE LOGIC ===== */

$today = date("Y-m-d");
$endDate = date("Y-m-d", strtotime($row->EndDate));

$todayTime = strtotime($today);
$endTime = strtotime($endDate);

$diffDays = floor(($endTime - $todayTime) / (60 * 60 * 24));

if($diffDays <= 1 && $status != "Completed"){
    $expired = true;
}
?>

<?php if($expired){ ?>
<div class="alert alert-danger">
⚠ Task deadline over! Only final submit allowed.
</div>
<?php } ?>

<table class="table table-bordered" style="color:#000;">

<tr>
<th>Employee</th>
<td><?php echo htmlentities($row->EmpName);?> (<?php echo htmlentities($row->EmpId);?>)</td>
<th>Department</th>
<td><?php echo htmlentities($row->DepartmentName);?></td>
</tr>

<tr>
<th>Task Title</th>
<td><?php echo htmlentities($row->TaskTitle);?></td>
<th>Assign Date</th>
<td><?php echo htmlentities($row->TaskAssigndate);?></td>
</tr>

<tr>
<th>Start Date</th>
<td><?php echo date("Y-m-d", strtotime($row->StartDate));?></td>
<th>End Date</th>
<td><?php echo date("Y-m-d", strtotime($row->EndDate));?></td>
</tr>

<tr>
<th>Description</th>
<td colspan="3"><?php echo htmlentities($row->TaskDescription);?></td>
</tr>

<tr>
<th>Priority</th>
<td>
<?php
if($row->TaskPriority=="Most Urgent"){
echo "<span class='badge-custom mosturgent'>Most Urgent</span>";
}
elseif($row->TaskPriority=="Urgent"){
echo "<span class='badge-custom urgent'>Urgent</span>";
}
else{
echo "<span class='badge-custom normal'>Normal</span>";
}
?>
</td>

<th>Final Status</th>
<td>
<?php
if($status=="Completed"){
echo "<span class='badge-custom completed'>Completed</span>";
}
elseif($status=="Inprogress"){
echo "<span class='badge-custom urgent'>In Progress</span>";
}
else{
echo "<span class='badge-custom pending'>Pending</span>";
}
?>
</td>
</tr>

</table>

<?php } ?>

</div>
</div>
</div>
</div>

<?php if(($status=="" || $status=="Inprogress") && !$expired){ ?>
<p align="center">
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
Take Action
</button>
</p>
<?php } ?>

<?php if($expired && $status!="Completed"){ ?>
<p align="center">
<button class="btn btn-danger" data-toggle="modal" data-target="#myModal">
Submit Final Work
</button>
</p>
<?php } ?>

<div class="modal fade" id="myModal">
<div class="modal-dialog">
<div class="modal-content">

<form method="post">

<div class="modal-header">
<h5 class="modal-title">Take Action</h5>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<div class="modal-body">

<div class="form-group">
<label>Remark</label>
<textarea name="remark" class="form-control" required></textarea>
</div>

<div class="form-group">
<label>Work Completion (%)</label>
<input type="number" name="workcom" class="form-control" required>
</div>

<div class="form-group">
<label>Status</label>
<select name="status" class="form-control" required>
<option value="Inprogress">Inprogress</option>
<option value="Completed">Completed</option>
</select>
</div>

</div>

<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="submit" class="btn btn-primary">Update</button>
</div>

</form>

</div>
</div>
</div>

<?php include_once('includes/footer.php');?>

</div>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>

<?php } ?>
