<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task Management | Employee Task Management System</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SAME CSS AS HOME -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">

    <style>
        body{
            background:#f4f7fb;
            font-family:'Work Sans',sans-serif;
        }

        /* ===== HERO ===== */
        .hero{
            background:
            linear-gradient(rgba(15,15,16,0.9),rgba(15,15,16,0.9)),
            url(images/banner1.jpg) center/cover no-repeat;
            padding:120px 0;
            text-align:center;
            color:#fff;
        }
        .hero h1{
            font-size:46px;
            font-weight:800;
        }
        .hero h1 span{
            color:#23B684;
        }
        .hero p{
            max-width:850px;
            margin:20px auto 0;
            font-size:17px;
            color:#d6d6d6;
            line-height:1.9;
        }

        /* ===== CONTENT SECTION ===== */
        .section{
            padding:90px 0;
            background:#fff;
        }
        .section-title{
            text-align:center;
            margin-bottom:60px;
        }
        .section-title h2{
            font-size:34px;
            font-weight:800;
        }
        .section-title h2 span{
            color:#23B684;
        }
        .section-title p{
            max-width:800px;
            margin:15px auto 0;
            color:#666;
            font-size:15px;
            line-height:1.8;
            font-weight:500;
        }

        /* ===== FEATURE BOX ===== */
        .feature-box{
            background:#fff;
            padding:40px 35px;
            border-radius:10px;
            box-shadow:0 14px 35px rgba(0,0,0,0.08);
            height:100%;
            transition:.3s;
        }
        .feature-box:hover{
            transform:translateY(-8px);
            box-shadow:0 20px 45px rgba(0,0,0,0.12);
        }
        .feature-box i{
            font-size:42px;
            color:#23B684;
            margin-bottom:20px;
        }
        .feature-box h4{
            font-weight:700;
            margin-bottom:12px;
        }
        .feature-box p{
            color:#666;
            font-size:14.8px;
            line-height:1.7;
        }

        /* ===== PROCESS ===== */
        .process-step{
            background:#fff;
            padding:28px 35px;
            margin-bottom:20px;
            border-left:5px solid #23B684;
            box-shadow:0 10px 25px rgba(0,0,0,0.07);
            font-weight:600;
            color:#555;
            border-radius:5px;
        }
    </style>
</head>

<body>

<?php include('includes/header.php'); ?>

<!-- ================= HERO ================= -->
<div class="hero">
    <div class="container">
        <h1><span>Task</span> Management Module</h1>
        <p>
            The Task Management module is the core component of the Employee Task Management System.
            It enables organizations to create, assign, monitor, and complete tasks
            in a structured and efficient manner.
        </p>
    </div>
</div>

<!-- ================= INTRO ================= -->
<div class="section">
    <div class="container">
        <div class="section-title">
            <h2>About <span>Task Management</span></h2>
            <p>
                This module provides administrators with complete control,
                allowing them to distribute tasks properly among employees
                and ensure work is completed within defined deadlines.
            </p>
        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fa fa-plus-circle"></i>
                    <h4>Create Tasks</h4>
                    <p>
                        Administrators can create new tasks with clear descriptions,
                        deadlines, and priority levels.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fa fa-user"></i>
                    <h4>Assign to Employees</h4>
                    <p>
                        Tasks are assigned to specific employees,
                        clearly defining responsibility and accountability.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fa fa-clock-o"></i>
                    <h4>Deadline Tracking</h4>
                    <p>
                        The system automatically tracks deadlines
                        and helps reduce delays in task completion.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ================= WORKFLOW ================= -->
<div class="section" style="background:#f4f7fb;">
    <div class="container">
        <div class="section-title">
            <h2>Task <span>Workflow</span></h2>
        </div>

        <div class="process-step">
            The administrator creates a task and sets its priority and deadline.
        </div>
        <div class="process-step">
            The assigned task appears on the employee’s dashboard.
        </div>
        <div class="process-step">
            The employee continuously updates task progress.
        </div>
        <div class="process-step">
            After task completion, the administrator reviews the work.
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
