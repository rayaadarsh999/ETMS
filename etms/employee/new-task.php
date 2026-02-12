<?php
session_start();
include('includes/dbconnection.php');

if(strlen($_SESSION['etmsempid']==0)){
header('location:logout.php');
} else {

$eid = $_SESSION['etmsempid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Employee Task Management System | View New Task</title>

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="css/responsive.css" />
<link rel="stylesheet" href="css/colors.css" />
<link rel="stylesheet" href="css/custom.css" />

<style>

/* Black Heading Like Admin */
.black_heading{
background:#000;
color:#fff;
padding:12px;
font-weight:600;
}

/* View Button Style */
.viewbtn{
background:#007bff;
color:#fff;
padding:6px 14px;
border-radius:4px;
text-decoration:none;
}

.viewbtn:hover{
background:#0056b3;
color:#fff;
}

</style>

</head>

<body class="dashboard dashboard_1">
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
<h2>View New Task</h2>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="white_shd full margin_bottom_30">

<div class="black_heading">
New Task List
</div>

<div class="table_section padding_infor_info">
<div class="table-responsive-sm">

<table class="table table-bordered">
<thead>
<tr>
<th>S.No</th>
<th>Task Title</th>
<th>Priority</th>
<th>Start Date</th>
<th>End Date</th>
<th>Assign Date</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php
$sql="SELECT * FROM tbltask 
WHERE AssignTaskto=:eid AND Status IS NULL 
ORDER BY ID DESC";

$query=$dbh->prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;

if($query->rowCount()>0){
foreach($results as $row){
?>

<tr>
<td><?php echo $cnt;?></td>

<td><?php echo htmlentities($row->TaskTitle);?></td>

<td>
<?php 
if($row->TaskPriority=="Most Urgent"){
echo "<span class='badge badge-danger'>Most Urgent</span>";
}
elseif($row->TaskPriority=="Urgent"){
echo "<span class='badge badge-warning'>Urgent</span>";
}
else{
echo "<span class='badge badge-info'>Normal</span>";
}
?>
</td>

<td><?php echo htmlentities($row->StartDate);?></td>
<td><?php echo htmlentities($row->EndDate);?></td>
<td><?php echo htmlentities($row->TaskAssigndate);?></td>

<td>
<a href="view-task.php?viewid=<?php echo $row->ID;?>" class="viewbtn">
View
</a>
</td>

</tr>

<?php
$cnt++;
}} else { ?>

<tr>
<td colspan="7" style="text-align:center;">No New Task Found</td>
</tr>

<?php } ?>

</tbody>
</table>

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

</body>
</html>

<?php } ?>
