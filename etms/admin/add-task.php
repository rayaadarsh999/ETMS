<?php
session_start();
include('includes/dbconnection.php');

if (strlen($_SESSION['etmsaid']) == 0) {
    header('location:logout.php');
    exit();
}

if (isset($_POST['submit'])) {

    $deptid     = $_POST['deptid'];
    $emplist    = $_POST['emplist'];
    $tpriority  = $_POST['tpriority'];
    $ttitle     = $_POST['ttitle'];
    $startdate  = $_POST['startdate'];
    $enddate    = $_POST['enddate'];
    $tdesc      = $_POST['tdesc'];

    $sql = "INSERT INTO tbltask
            (DeptID, AssignTaskto, TaskPriority, TaskTitle, StartDate, EndDate, TaskDescription)
            VALUES
            (:deptid, :emplist, :tpriority, :ttitle, :startdate, :enddate, :tdesc)";

    $query = $dbh->prepare($sql);
    $query->bindParam(':deptid', $deptid, PDO::PARAM_INT);
    $query->bindParam(':emplist', $emplist, PDO::PARAM_INT);
    $query->bindParam(':tpriority', $tpriority, PDO::PARAM_STR);
    $query->bindParam(':ttitle', $ttitle, PDO::PARAM_STR);
    $query->bindParam(':startdate', $startdate, PDO::PARAM_STR);
    $query->bindParam(':enddate', $enddate, PDO::PARAM_STR);
    $query->bindParam(':tdesc', $tdesc, PDO::PARAM_STR);

    $query->execute();

    if ($dbh->lastInsertId()) {
        echo "<script>alert('Task has been added successfully');</script>";
        echo "<script>window.location.href='add-task.php'</script>";
    } else {
        echo "<script>alert('Something went wrong');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Employee Task Management System || Add Task</title>

<!-- 🔴 IMPORTANT: jQuery MUST be here -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="css/responsive.css" />
<link rel="stylesheet" href="css/colors.css" />
<link rel="stylesheet" href="css/bootstrap-select.css" />
<link rel="stylesheet" href="css/perfect-scrollbar.css" />
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="js/semantic.min.css" />

<script>
function getemp(deptid) {
    if(deptid === "") {
        $("#emplist").html('<option value="">Select Employee</option>');
        return;
    }

    $.ajax({
        type: "POST",
        url: "get_emp.php",
        data: { deptid: deptid },
        success: function(data) {
            $("#emplist").html(data);
        }
    });
}
</script>
</head>

<body class="inner_page general_elements">
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
<h2>Add Task</h2>
</div>
</div>
</div>

<div class="row column8 graph">
<div class="col-md-12">
<div class="white_shd full margin_bottom_30">

<div class="padding_infor_info">
<div class="alert alert-primary">

<form method="post">
<fieldset>

<!-- Department -->
<div class="field">
<label>Department Name</label>
<select name="deptid" id="deptid" class="form-control" required onchange="getemp(this.value)">
<option value="">Select Department</option>
<?php
$sql2 = "SELECT * FROM tbldepartment";
$query2 = $dbh->prepare($sql2);
$query2->execute();
$depts = $query2->fetchAll(PDO::FETCH_OBJ);
foreach($depts as $d){
?>
<option value="<?php echo $d->ID; ?>">
<?php echo htmlentities($d->DepartmentName); ?>
</option>
<?php } ?>
</select>
</div>

<br>

<!-- Employee -->
<div class="field">
<label>Employee List</label>
<select name="emplist" id="emplist" class="form-control" required>
<option value="">Select Employee</option>
</select>
</div>

<br>

<!-- Priority -->
<div class="field">
<label>Task Priority</label>
<select name="tpriority" class="form-control" required>
<option value="">Select Priority</option>
<option value="Normal">Normal</option>
<option value="Medium">Medium</option>
<option value="Urgent">Urgent</option>
<option value="Most Urgent">Most Urgent</option>
</select>
</div>

<br>

<!-- Title -->
<div class="field">
<label>Task Title</label>
<input type="text" name="ttitle" class="form-control" required>
</div>

<br>

<!-- Dates -->
<div class="field">
<label>Start Date</label>
<input type="date" name="startdate" id="startdate" class="form-control" min="<?php echo date('Y-m-d'); ?>" required>
</div>

<br>

<div class="field">
<label>End Date</label>
<input type="date" name="enddate" id="enddate" class="form-control" required>
</div>

<br>

<!-- Description -->
<div class="field">
<label>Task Description</label>
<textarea name="tdesc" class="form-control" required></textarea>
</div>

<br>

<div class="text-center">
<button type="submit" name="submit" class="btn btn-success btn-lg">
Add Task
</button>
</div>

</fieldset>
</form>

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

<script src="js/bootstrap.min.js"></script>
<script src="js/perfect-scrollbar.min.js"></script>
<script>
new PerfectScrollbar('#sidebar');
</script>
<script src="js/custom.js"></script>
<script>
document.getElementById("startdate").addEventListener("change", function() {
    document.getElementById("enddate").min = this.value;
});
</script>

</body>
</html>
