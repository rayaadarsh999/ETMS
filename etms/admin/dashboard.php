<?php
session_start();
error_reporting(0);
include('includes/checklogin.php');
include('includes/dbconnection.php');

if (strlen($_SESSION['etmsaid']) == 0) {
    header('location:logout.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Employee Task Management System | Dashboard</title>

    <!-- CSS FILES -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/perfect-scrollbar.css">
    <link rel="stylesheet" href="css/custom.css">

</head>

<body class="dashboard dashboard_1">

<div class="full_container">
<div class="inner_container">

    <!-- SIDEBAR -->
    <?php include_once('includes/sidebar.php'); ?>

    <!-- CONTENT -->
    <div id="content">

        <!-- HEADER -->
        <?php include_once('includes/header.php'); ?>

        <!-- PAGE CONTENT -->
        <div class="midde_cont">
        <div class="container-fluid">

            <!-- PAGE TITLE -->
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Dashboard</h2>
                    </div>
                </div>
            </div>

            <!-- DASHBOARD CARDS -->
            <div class="row column1">

                <!-- TOTAL DEPARTMENT -->
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30 yellow_bg">
                        <div class="couter_icon">
                            <i class="fa fa-files-o white_color"></i>
                        </div>
                        <div class="counter_no">
                            <?php
                            $q1 = $dbh->prepare("SELECT ID FROM tbldepartment");
                            $q1->execute();
                            ?>
                            <a href="manage-dept.php">
                                <p class="total_no"><?php echo $q1->rowCount(); ?></p>
                                <p class="head_couter white_color">Total Department</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- TOTAL EMPLOYEES -->
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30 blue1_bg">
                        <div class="couter_icon">
                            <i class="fa fa-users white_color"></i>
                        </div>
                        <div class="counter_no">
                            <?php
                            $q2 = $dbh->prepare("SELECT ID FROM tblemployee");
                            $q2->execute();
                            ?>
                            <a href="manage-employee.php">
                                <p class="total_no"><?php echo $q2->rowCount(); ?></p>
                                <p class="head_couter white_color">Total Employees</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- INPROGRESS TASK -->
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30 red_bg">
                        <div class="couter_icon">
                            <i class="fa fa-file white_color"></i>
                        </div>
                        <div class="counter_no">
                            <?php
                            $q3 = $dbh->prepare("SELECT ID FROM tbltask WHERE Status='Inprogress'");
                            $q3->execute();
                            ?>
                            <a href="inprogress-task.php">
                                <p class="total_no"><?php echo $q3->rowCount(); ?></p>
                                <p class="head_couter white_color">Inprogress Task</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- COMPLETED TASK -->
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30 green_bg">
                        <div class="couter_icon">
                            <i class="fa fa-file white_color"></i>
                        </div>
                        <div class="counter_no">
                            <?php
                            $q4 = $dbh->prepare("SELECT ID FROM tbltask WHERE Status='Completed'");
                            $q4->execute();
                            ?>
                            <a href="completed-task.php">
                                <p class="total_no"><?php echo $q4->rowCount(); ?></p>
                                <p class="head_couter white_color">Completed Task</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- ALL TASK -->
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30 blue1_bg">
                        <div class="couter_icon">
                            <i class="fa fa-files-o white_color"></i>
                        </div>
                        <div class="counter_no">
                            <?php
                            $q5 = $dbh->prepare("SELECT ID FROM tbltask");
                            $q5->execute();
                            ?>
                            <a href="manage-task.php">
                                <p class="total_no"><?php echo $q5->rowCount(); ?></p>
                                <p class="head_couter white_color">All Tasks</p>
                            </a>
                        </div>
                    </div>
                </div>

            </div><!-- row -->

        </div><!-- container-fluid -->

        <?php include_once('includes/footer.php'); ?>

        </div><!-- midde_cont -->

    </div><!-- content -->

</div>
</div>

<!-- JS FILES -->
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
