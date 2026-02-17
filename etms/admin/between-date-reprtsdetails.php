<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(strlen($_SESSION['etmsaid'])==0){
    header('location:logout.php');
} else {

if(isset($_GET['delid'])){
    $rid=intval($_GET['delid']);
    $sql="DELETE FROM tbltask WHERE ID=:rid";
    $query=$dbh->prepare($sql);
    $query->bindParam(':rid',$rid,PDO::PARAM_INT);
    $query->execute();
    echo "<script>alert('Data deleted successfully');</script>";
    echo "<script>window.location.href='manage-task.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Employee Task Management System || Task Reports</title>

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="css/responsive.css" />
<link rel="stylesheet" href="css/colors.css" />
<link rel="stylesheet" href="css/bootstrap-select.css" />
<link rel="stylesheet" href="css/perfect-scrollbar.css" />
<link rel="stylesheet" href="css/custom.css" />

<style>
.report-title{
    text-align:center;
    font-weight:600;
    font-size:18px;
    color:#0d6efd;
    margin-bottom:20px;
}

.custom-table thead{
    background:#1f2937;
    color:#fff;
}

.custom-table th,
.custom-table td{
    text-align:center;
    vertical-align:middle !important;
}

.custom-table tbody tr:hover{
    background:#f1f5f9;
}

.btn-sm{
    padding:5px 12px;
    font-size:13px;
}
</style>
</head>

<body class="inner_page tables_page">
<div class="full_container">
<div class="inner_container">

<?php include_once('includes/sidebar.php'); ?>

<div id="content">
<?php include_once('includes/header.php'); ?>

<div class="midde_cont">
<div class="container-fluid">

<div class="row column_title">
<div class="col-md-12">
<div class="page_title">
<h2>Task Reports</h2>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="white_shd full margin_bottom_30">

<div class="table_section padding_infor_info">
<div class="table-responsive">

<?php
$fdate = isset($_POST['fromdate']) ? $_POST['fromdate'] : '';
$tdate = isset($_POST['todate']) ? $_POST['todate'] : '';
?>

<div class="report-title">
Report From <?php echo htmlentities($fdate); ?> To <?php echo htmlentities($tdate); ?>
</div>

<table class="table table-bordered custom-table">
<thead>
<tr>
<th>S.No</th>
<th>Task Title</th>
<th>Department</th>
<th>Assign To</th>
<th>Start Date</th>
<th>End Date</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php
if($fdate != '' && $tdate != ''){

$sql="SELECT 
tbltask.ID as tid,
tbltask.TaskTitle,
tbltask.StartDate,
tbltask.EndDate,
tbldepartment.DepartmentName,
tblemployee.EmpName,
tblemployee.EmpId
FROM tbltask
JOIN tbldepartment ON tbldepartment.ID = tbltask.DeptID
JOIN tblemployee ON tblemployee.ID = tbltask.AssignTaskto
WHERE tbltask.StartDate BETWEEN :fdate AND :tdate
ORDER BY tbltask.StartDate DESC";

$query = $dbh->prepare($sql);
$query->bindParam(':fdate',$fdate,PDO::PARAM_STR);
$query->bindParam(':tdate',$tdate,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;

if($query->rowCount() > 0){
foreach($results as $row){
?>

<tr>
<td><?php echo $cnt;?></td>
<td><?php echo htmlentities($row->TaskTitle);?></td>
<td><?php echo htmlentities($row->DepartmentName);?></td>
<td><?php echo htmlentities($row->EmpName);?> (<?php echo htmlentities($row->EmpId);?>)</td>
<td><?php echo htmlentities($row->StartDate);?></td>
<td><?php echo htmlentities($row->EndDate);?></td>
<td>
<a href="edit-task.php?editid=<?php echo htmlentities($row->tid);?>" class="btn btn-primary btn-sm">Edit</a>
<a href="manage-task.php?delid=<?php echo htmlentities($row->tid);?>" onclick="return confirm('Do you really want to delete?');" class="btn btn-danger btn-sm">Delete</a>
</td>
</tr>

<?php
$cnt++;
}} else {
?>

<tr>
<td colspan="7" class="text-center text-danger font-weight-bold">
No record found between selected dates
</td>
</tr>

<?php } } ?>

</tbody>
</table>

</div>
</div>
</div>
</div>
</div>

</div>

<?php include_once('includes/footer.php'); ?>
</div>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/perfect-scrollbar.min.js"></script>
<script>
var ps = new PerfectScrollbar('#sidebar');
</script>

</body>
</html>
<?php } ?>
