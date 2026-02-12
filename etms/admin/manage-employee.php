<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['etmsaid']) == 0) {
    header('location:logout.php');
    exit();
}

/* DELETE EMPLOYEE */
if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);

    // Fetch profile image
    $sql = "SELECT ProfilePic FROM tblemployee WHERE ID=:rid";
    $q = $dbh->prepare($sql);
    $q->bindParam(':rid', $rid, PDO::PARAM_STR);
    $q->execute();
    $res = $q->fetch(PDO::FETCH_OBJ);

    if ($res && $res->ProfilePic != '') {
        @unlink("images/" . $res->ProfilePic);
    }

    // Delete record
    $sql = "DELETE FROM tblemployee WHERE ID=:rid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':rid', $rid, PDO::PARAM_STR);
    $query->execute();

    echo "<script>alert('Employee deleted successfully');</script>";
    echo "<script>window.location.href='manage-employee.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee Task Management System | Manage Employee</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/perfect-scrollbar.css">
    <link rel="stylesheet" href="css/custom.css">
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
        <div class="page_title text-center">
            <h2>Manage Employee</h2>
        </div>
    </div>
</div>

<!-- TABLE -->
<div class="row">
<div class="col-md-12">
<div class="white_shd full margin_bottom_30">

<div class="table_section padding_infor_info">
<div class="table-responsive-sm">

<table class="table table-bordered align-middle">
<thead class="thead-light">
<tr>
    <th>S.No</th>
    <th>Photo</th>
    <th>Department</th>
    <th>Name</th>
    <th>Email</th>
    <th>Contact</th>
    <th>Date of Joining</th>
    <th class="text-center">Action</th>
</tr>
</thead>

<tbody>
<?php
$sql = "SELECT d.DepartmentName,
        e.ID as eid, e.ProfilePic,
        e.EmpName, e.EmpEmail,
        e.EmpContactNumber, e.EmpDateofjoining
        FROM tblemployee e
        JOIN tbldepartment d ON d.ID = e.DepartmentID";

$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

$cnt = 1;
if ($query->rowCount() > 0) {
    foreach ($results as $row) {
?>
<tr>
    <td><?php echo $cnt; ?></td>

    <td class="text-center">
        <img src="images/<?php echo ($row->ProfilePic != '') ? $row->ProfilePic : 'user.png'; ?>"
             style="width:45px;height:45px;border-radius:50%;object-fit:cover;">
    </td>

    <td><?php echo htmlentities($row->DepartmentName); ?></td>
    <td><?php echo htmlentities($row->EmpName); ?></td>
    <td><?php echo htmlentities($row->EmpEmail); ?></td>
    <td><?php echo htmlentities($row->EmpContactNumber); ?></td>
    <td><?php echo htmlentities($row->EmpDateofjoining); ?></td>

    <td class="text-center">
        <a href="edit-employee.php?editid=<?php echo $row->eid; ?>"
           class="btn btn-sm btn-primary mb-1">
           Edit
        </a>

        <a href="manage-employee.php?delid=<?php echo $row->eid; ?>"
           onclick="return confirm('Do you really want to delete this employee?');"
           class="btn btn-sm btn-danger">
           Delete
        </a>
    </td>
</tr>
<?php
        $cnt++;
    }
}
?>
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
<script src="js/bootstrap.min.js"></script>
<script src="js/perfect-scrollbar.min.js"></script>
<script>
new PerfectScrollbar('#sidebar');
</script>

</body>
</html>
