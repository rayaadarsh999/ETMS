<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['etmsaid']) == 0) {
    header('location:logout.php');
    exit();
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Employee Task Management System || View Task</title>

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="css/responsive.css" />
<link rel="stylesheet" href="css/colors.css" />
<link rel="stylesheet" href="css/bootstrap-select.css" />
<link rel="stylesheet" href="css/perfect-scrollbar.css" />
<link rel="stylesheet" href="css/custom.css" />

<style>
.white_shd {
    background: #fff;
    padding: 25px;
    margin-top: 30px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0,0,0,0.08);
}

.table-custom {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    border: 1px solid #dee2e6;
}

.table-custom th {
    background-color: #212529;
    color: #fff;
    padding: 12px;
    font-weight: 500;
    border: 1px solid #32383e;
    font-size: 14px;
}

.table-custom td {
    padding: 12px;
    border: 1px solid #dee2e6;
    font-size: 14px;
    vertical-align: middle;
}

.label-bold {
    background-color: #f8f9fa;
    font-weight: 600;
    width: 20%;
}

.badge-ss {
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 600;
    color: #fff;
}

.bg-completed { background:#28a745; }
.bg-inprogress { background:#ffc107; color:#000; }
.bg-pending { background:#6c757d; }
.bg-urgent { background:#dc3545; }
.bg-normal { background:#17a2b8; }

.sub-header {
    background:#f1f1f1;
    font-weight:bold;
    text-align:center;
}

.page_title {
    border-bottom: 1px solid #eee;
    margin-bottom: 20px;
    padding-bottom: 10px;
}
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
<div class="white_shd full">

<div class="page_title">
<h2>Task Details</h2>
</div>

<div class="table_section padding_infor_info">
<div class="table-responsive">

<?php
$vid=$_GET['viewid'];

$sql="SELECT tbltask.*, 
             tbldepartment.DepartmentName, 
             tblemployee.EmpName, 
             tblemployee.EmpId 
      FROM tbltask 
      JOIN tbldepartment ON tbldepartment.ID=tbltask.DeptID 
      JOIN tblemployee ON tblemployee.ID=tbltask.AssignTaskto 
      WHERE tbltask.ID=:vid";

$query = $dbh->prepare($sql);
$query->bindParam(':vid',$vid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0) {
foreach($results as $row) {

$status=$row->Status;

/* Priority Dynamic */
$priorityClass="bg-normal";
if($row->TaskPriority=="Most Urgent" || $row->TaskPriority=="Urgent") $priorityClass="bg-urgent";
elseif($row->TaskPriority=="Medium") $priorityClass="bg-inprogress";
elseif($row->TaskPriority=="Normal") $priorityClass="bg-normal";

/* Status Dynamic */
$statusClass="bg-pending";
if($status=="Completed") $statusClass="bg-completed";
elseif($status=="Inprogress") $statusClass="bg-inprogress";
?>

<table class="table-custom">
<thead>
<tr>
<th colspan="4" style="text-align:center;">TASK MAIN INFORMATION</th>
</tr>
</thead>

<tbody>

<!-- Row 1 -->
<tr>
<td class="label-bold">Employee</td>
<td><?php echo $row->EmpName;?> (<?php echo $row->EmpId;?>)</td>

<td class="label-bold">Department</td>
<td><?php echo $row->DepartmentName;?></td>
</tr>

<!-- Row 2 -->
<tr>
<td class="label-bold">Task Title</td>
<td><?php echo $row->TaskTitle;?></td>

<td class="label-bold">Assign Date</td>
<td><?php echo $row->TaskAssigndate;?></td>
</tr>

<!-- Row 3 -->
<tr>
<td class="label-bold">Start Date</td>
<td><?php echo $row->StartDate;?></td>

<td class="label-bold">End Date</td>
<td><?php echo $row->EndDate;?></td>
</tr>

<!-- Row 4 Description Full Width -->
<tr>
<td class="label-bold">Description</td>
<td colspan="3"><?php echo $row->TaskDescription;?></td>
</tr>

<!-- Row 5 (Sabse Niche) -->
<tr>
<td class="label-bold">Priority</td>
<td>
<span class="badge-ss <?php echo $priorityClass; ?>">
<?php echo $row->TaskPriority;?>
</span>
</td>

<td class="label-bold">Final Status</td>
<td>
<span class="badge-ss <?php echo $statusClass; ?>">
<?php
if($status=="Completed") echo "Completed";
elseif($status=="Inprogress") echo "In Progress";
else echo "Pending";
?>
</span>
</td>
</tr>

</tbody>

</table>

<?php }} ?>

<?php
if(isset($status) && $status!=""){
$ret="SELECT * FROM tbltasktracking WHERE TaskID=:vid";
$query = $dbh->prepare($ret);
$query->bindParam(':vid',$vid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0){
?>

<table class="table-custom" style="margin-top:30px;">
<thead>
<tr>
<th colspan="5" class="sub-header">TASK HISTORY / TRACKING</th>
</tr>
<tr>
<th>S.No</th>
<th>Remark</th>
<th>Status</th>
<th>Progress</th>
<th>Date</th>
</tr>
</thead>

<tbody>
<?php
$cnt=1;
foreach($results as $track){

$histClass="bg-pending";
if($track->Status=="Completed") $histClass="bg-completed";
elseif($track->Status=="Inprogress") $histClass="bg-inprogress";
?>

<tr>
<td><?php echo $cnt;?></td>
<td><?php echo $track->Remark;?></td>
<td>
<span class="badge-ss <?php echo $histClass; ?>">
<?php echo $track->Status;?>
</span>
</td>
<td>
<?php echo $track->WorkCompleted;?>%
<div class="progress" style="height:6px;">
<div class="progress-bar bg-success" style="width:<?php echo $track->WorkCompleted;?>%"></div>
</div>
</td>
<td><?php echo $track->UpdationDate;?></td>
</tr>

<?php $cnt++; } ?>

</tbody>
</table>

<?php }} ?>

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
<script>var ps = new PerfectScrollbar('#sidebar');</script>
<script src="js/custom.js"></script>

</body>
</html>
<?php } ?>
