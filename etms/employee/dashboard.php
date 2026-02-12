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
<title>Employee Task Management System||Dashboard</title>

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="css/responsive.css" />
<link rel="stylesheet" href="css/colors.css" />
<link rel="stylesheet" href="css/bootstrap-select.css" />
<link rel="stylesheet" href="css/perfect-scrollbar.css" />
<link rel="stylesheet" href="css/custom.css" />

<style>
.counter_section {
    min-height: 220px;
    display: flex;
    align-items: center;
    justify-content: center;
}
html, body {
    height: 100%;
    margin: 0;
}
.full_container {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}
.inner_container {
    flex: 1;
    display: flex;
}
#content {
    flex: 1;
    display: flex;
    flex-direction: column;
}
.midde_cont {
    flex: 1;
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
<h2>Dashboard</h2>
</div>
</div>
</div>

<?php
$eid=$_SESSION['etmsempid']; 

$sql2 ="SELECT * from tbltask where Status is null && AssignTaskto=:eid";
$query2 = $dbh->prepare($sql2);
$query2->bindParam(':eid', $eid, PDO::PARAM_STR);
$query2->execute();
$newtask=$query2->rowCount();

$sql3 ="SELECT * from tbltask where Status='Inprogress' && AssignTaskto=:eid";
$query3 = $dbh->prepare($sql3);
$query3->bindParam(':eid', $eid, PDO::PARAM_STR);
$query3->execute();
$inprotask=$query3->rowCount();

$sql4 ="SELECT * from tbltask where Status='Completed' && AssignTaskto=:eid";
$query4 = $dbh->prepare($sql4);
$query4->bindParam(':eid', $eid, PDO::PARAM_STR);
$query4->execute();
$comptask=$query4->rowCount();

$sql5 ="SELECT * from tbltask where AssignTaskto=:eid";
$query5 = $dbh->prepare($sql5);
$query5->bindParam(':eid', $eid, PDO::PARAM_STR);
$query5->execute();
$alltasks=$query5->rowCount();

/* Performance Calculation */
$totalAssigned = $alltasks;
$totalCompleted = $comptask;
$pendingTasks = $totalAssigned - $totalCompleted;

if($totalAssigned > 0){
    $completionPercent = round(($totalCompleted / $totalAssigned) * 100);
}else{
    $completionPercent = 0;
}
?>

<div class="row column1">

<div class="col-md-6 col-lg-3">
<div class="full counter_section margin_bottom_30 red_bg">
<div class="counter_no text-center">
<a href="new-task.php">
<p class="total_no"><?php echo $newtask;?></p>
<p class="head_couter" style="color:#000">New Tasks</p>
</a>
</div>
</div>
</div>

<div class="col-md-6 col-lg-3">
<div class="full counter_section margin_bottom_30 yellow_bg">
<div class="counter_no text-center">
<a href="inprogress-task.php">
<p class="total_no"><?php echo $inprotask;?></p>
<p class="head_couter" style="color:#000">Inprogress Task</p>
</a>
</div>
</div>
</div>

<div class="col-md-6 col-lg-3">
<div class="full counter_section margin_bottom_30 green_bg">
<div class="counter_no text-center">
<a href="completed-task.php">
<p class="total_no"><?php echo $comptask;?></p>
<p class="head_couter" style="color:#000">Completed Task</p>
</a>
</div>
</div>
</div>

<div class="col-md-6 col-lg-3">
<div class="full counter_section margin_bottom_30 blue1_bg">
<div class="counter_no text-center">
<a href="all-task.php">
<p class="total_no"><?php echo $alltasks;?></p>
<p class="head_couter" style="color:#000">All Tasks</p>
</a>
</div>
</div>
</div>

</div>

<!-- Performance Section -->
<div class="row">
<div class="col-md-12">
<div class="full margin_bottom_30" style="background:#ffffff; padding:25px; border-radius:10px;">
<h4>Task Completion Overview</h4>
<p><strong>Total Assigned:</strong> <?php echo $totalAssigned; ?></p>
<p><strong>Total Completed:</strong> <?php echo $totalCompleted; ?></p>
<p><strong>Pending Tasks:</strong> <?php echo $pendingTasks; ?></p>

<div class="progress" style="height:20px;">
<div class="progress-bar bg-success" role="progressbar" 
style="width: <?php echo $completionPercent; ?>%;" 
aria-valuenow="<?php echo $completionPercent; ?>" 
aria-valuemin="0" aria-valuemax="100">
<?php echo $completionPercent; ?>%
</div>
</div>
</div>
</div>
</div>

<!-- Chart Section -->
<div class="row">
<div class="col-md-12">
<div class="full margin_bottom_30" style="background:#ffffff; padding:25px; border-radius:10px;">
<h4>Task Status Chart</h4>
<canvas id="taskChart" height="100"></canvas>
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
<script src="js/Chart.bundle.min.js"></script>
<script src="js/perfect-scrollbar.min.js"></script>


<script>
var ctx = document.getElementById('taskChart').getContext('2d');
var taskChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['New Tasks', 'Inprogress Tasks', 'Completed Tasks'],
        datasets: [{
            data: [
                <?php echo $newtask; ?>,
                <?php echo $inprotask; ?>,
                <?php echo $comptask; ?>
            ],
            backgroundColor: [
                '#ff4d4d',
                '#ff9800',
                '#28a745'
            ]
        }]
    },
    options: {
        responsive: true
    }
});

</script>

</body>
</html>
<?php } ?>
