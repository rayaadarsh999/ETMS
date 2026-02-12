<?php
session_start();
include('includes/dbconnection.php');

if (strlen($_SESSION['etmsaid']) == 0) {
    header('location:logout.php');
    exit();
}

// DELETE TASK
if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = "DELETE FROM tbltask WHERE ID=:rid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':rid', $rid, PDO::PARAM_INT);
    $query->execute();
    echo "<script>alert('Task deleted successfully');</script>";
    echo "<script>window.location.href='manage-task.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee Task Management System || Manage Task</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/colors.css" />
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <link rel="stylesheet" href="css/custom.css" />
</head>

<body class="inner_page tables_page">
<div class="full_container">
<div class="inner_container">

<?php include_once('includes/sidebar.php'); ?>

<div id="content">
<?php include_once('includes/header.php'); ?>

<div class="midde_cont">
<div class="container-fluid">

<!-- PAGE TITLE -->
<div class="row column_title">
<div class="col-md-12">
<div class="page_title">
<h2>Manage Task</h2>
</div>
</div>
</div>

<!-- TABLE -->
<div class="row">
<div class="col-md-12">
<div class="white_shd full margin_bottom_30">
<div class="table_section padding_infor_info">
<div class="table-responsive">

<table class="table table-bordered table-striped">
<thead class="thead-dark">
<tr>
    <th style="width:60px;">S.No</th>
    <th>Task Title</th>
    <th>Department</th>
    <th>Assigned To</th>
    <th>Priority</th>
    <th style="width:110px;">Start Date</th>
    <th style="width:110px;">End Date</th>
    <th>Status</th>
    <th style="width:180px;">Action</th>
</tr>
</thead>

<tbody>
<?php
$sql = "SELECT 
            t.ID,
            t.TaskTitle,
            t.TaskPriority,
            t.StartDate,
            t.EndDate,
            t.Status,
            d.DepartmentName,
            e.EmpName
        FROM tbltask t
        JOIN tbldepartment d ON d.ID = t.DeptID
        JOIN tblemployee e ON e.ID = t.AssignTaskto
        ORDER BY t.ID DESC";

$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

$cnt = 1;
if ($query->rowCount() > 0) {
    foreach ($results as $row) {
?>
<tr>
    <td><?php echo $cnt; ?></td>
    <td><?php echo htmlentities($row->TaskTitle); ?></td>
    <td><?php echo htmlentities($row->DepartmentName); ?></td>
    <td><?php echo htmlentities($row->EmpName); ?></td>
    <td>
        <span class="badge badge-info">
            <?php echo htmlentities($row->TaskPriority); ?>
        </span>
    </td>
    <td><?php echo htmlentities($row->StartDate); ?></td>
    <td><?php echo htmlentities($row->EndDate); ?></td>
    <td>
        <?php
        if ($row->Status == "Completed") {
            echo '<span class="badge badge-success">Completed</span>';
        } elseif ($row->Status == "Inprogress") {
            echo '<span class="badge badge-warning">Inprogress</span>';
        } else {
            echo '<span class="badge badge-secondary">Pending</span>';
        }
        ?>
    </td>
    <td class="text-center">
        <a href="view-task.php?viewid=<?php echo $row->ID; ?>" 
           class="btn btn-sm btn-info mb-1">View</a>

        <a href="edit-task.php?editid=<?php echo $row->ID; ?>" 
           class="btn btn-sm btn-primary mb-1">Edit</a>

        <a href="manage-task.php?delid=<?php echo $row->ID; ?>" 
           onclick="return confirm('Are you sure you want to delete this task?');"
           class="btn btn-sm btn-danger mb-1">Delete</a>
    </td>
</tr>
<?php
$cnt++;
    }
} else {
?>
<tr>
<td colspan="9" class="text-center text-danger">
    No task found
</td>
</tr>
<?php } ?>
</tbody>
</table>

</div>
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
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/perfect-scrollbar.min.js"></script>
<script>
new PerfectScrollbar('#sidebar');
</script>
<script src="js/custom.js"></script>

</body>
</html>
