<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['etmsempid']==0)) {
  header('location:logout.php');
  } else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Employee Task Management System || View Inprogress Task</title>

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="css/responsive.css" />
<link rel="stylesheet" href="css/colors.css" />
<link rel="stylesheet" href="css/bootstrap-select.css" />
<link rel="stylesheet" href="css/perfect-scrollbar.css" />
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="js/semantic.min.css" />
<link rel="stylesheet" href="css/jquery.fancybox.css" />
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

<div class="row">
<div class="col-md-12">

<div class="white_shd full margin_bottom_30">

<!-- 🔵 DARK BLUE HEADER LIKE ADMIN -->
<div class="full graph_head" style="background:#1f3f60; padding:15px;">
<div class="heading1 margin_0">
<h2 style="color:#fff;">View Inprogress Task</h2>
</div>
</div>

<div class="table_section padding_infor_info">
<div class="table-responsive-sm">

<table class="table table-bordered">

<thead style="background:#1f3f60; color:white;">
<tr>
<th>S.No</th>
<th>Task Title</th>
<th>Department</th>
<th>Assign To</th>
<th>Assign Date</th>
<th>End Date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php
$empid=$_SESSION['etmsempid'];

$sql="SELECT tbltask.ID as tid,
tbltask.TaskTitle,
tbltask.Status,
tbltask.DeptID,
tbltask.AssignTaskto,
tbltask.EndDate,
tbltask.TaskAssigndate,
tbldepartment.DepartmentName,
tbldepartment.ID as did,
tblemployee.EmpName,
tblemployee.EmpId 
from tbltask 
join tbldepartment on tbldepartment.ID=tbltask.DeptID 
join tblemployee on tblemployee.ID=tbltask.AssignTaskto 
where tbltask.AssignTaskto=:empid AND tbltask.Status='Inprogress' ";

$query = $dbh->prepare($sql);
$query->bindParam(':empid', $empid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{
?>
<tr>
<td><?php echo htmlentities($cnt);?></td>
<td><?php echo htmlentities($row->TaskTitle);?></td>
<td><?php echo htmlentities($row->DepartmentName);?></td>
<td><?php echo htmlentities($row->EmpName);?>(<?php echo htmlentities($row->EmpId);?>)</td>
<td><?php echo htmlentities($row->TaskAssigndate);?></td>
<td><?php echo htmlentities($row->EndDate);?></td>

<td>
<span class="badge badge-warning"><?php echo $row->Status;?></span>
</td>

<td>
<a href="view-task.php?viewid=<?php echo htmlentities ($row->tid);?>" class="btn btn-primary btn-sm">View</a>
</td>
</tr>
<?php 
$cnt=$cnt+1;
}} 
?>
</tbody>

</table>

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
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/animate.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/owl.carousel.js"></script> 
<script src="js/Chart.min.js"></script>
<script src="js/Chart.bundle.min.js"></script>
<script src="js/utils.js"></script>
<script src="js/analyser.js"></script>
<script src="js/perfect-scrollbar.min.js"></script>
<script>
var ps = new PerfectScrollbar('#sidebar');
</script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/semantic.min.js"></script>

</body>
</html>
<?php } ?>
