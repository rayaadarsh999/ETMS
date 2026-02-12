<?php
session_start();
include('includes/dbconnection.php');

if (strlen($_SESSION['etmsaid']) == 0) {
    header('location:logout.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Employee Task Management System || Inprogress Task</title>

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="css/responsive.css" />
<link rel="stylesheet" href="css/colors.css" />
<link rel="stylesheet" href="css/bootstrap-select.css" />
<link rel="stylesheet" href="css/perfect-scrollbar.css" />
<link rel="stylesheet" href="css/custom.css" />

<style>
.table-custom th{
    background:#212529;
    color:#fff;
    text-align:center;
}
.badge-progress{
    background:#ffc107;
    padding:4px 8px;
    border-radius:4px;
    font-size:12px;
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

<div class="row column_title">
<div class="col-md-12">
<div class="page_title">
<h2>View Inprogress Task</h2>
</div>
</div>
</div>

<div class="white_shd full margin_bottom_30">
<div class="table-responsive">

<table class="table table-bordered table-custom">
<thead>
<tr>
<th>S.No</th>
<th>Task Title</th>
<th>Department</th>
<th>Assign To</th>
<th>Starting Date</th>
<th>Ending Date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php
$sql="SELECT tbltask.ID,
             tbltask.TaskTitle,
             tbltask.TaskAssigndate,
             tbltask.EndDate,
             tbltask.Status,
             tbldepartment.DepartmentName,
             tblemployee.EmpName
      FROM tbltask
      JOIN tbldepartment ON tbldepartment.ID=tbltask.DeptID
      JOIN tblemployee ON tblemployee.ID=tbltask.AssignTaskto
      WHERE tbltask.Status='Inprogress'
      ORDER BY tbltask.ID DESC";

$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;

if($query->rowCount() > 0){
foreach($results as $row){
?>

<tr>
<td><?php echo $cnt;?></td>
<td><?php echo $row->TaskTitle;?></td>
<td><?php echo $row->DepartmentName;?></td>
<td><?php echo $row->EmpName;?></td>
<td><?php echo $row->TaskAssigndate;?></td>
<td><?php echo $row->EndDate;?></td>
<td><span class="badge-progress">In Progress</span></td>
<td>
<a href="view-task.php?viewid=<?php echo $row->ID;?>" class="btn btn-sm btn-primary">View</a>
</td>
</tr>

<?php $cnt++; }} else { ?>

<tr>
<td colspan="8" class="text-center">No Inprogress Task Found</td>
</tr>

<?php } ?>

</tbody>
</table>

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
