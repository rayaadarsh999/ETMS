<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>System Overview | Employee Task Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SAME AS HOME -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">

    <style>
        body{
            background:#f4f7fb;
            font-family:'Work Sans',sans-serif;
        }

        /* ================= HERO ================= */
        .hero{
            background:
            linear-gradient(rgba(15,15,16,0.65),rgba(15,15,16,0.65)),
            url(images/banner4.jpg) center/cover no-repeat;
            min-height:520px;
            display:flex;
            align-items:center;
            text-align:center;
            color:#fff;
        }
        .hero h1{
            font-size:48px;
            font-weight:800;
        }
        .hero h1 span{
            color:#23B684;
        }
        .hero p{
            max-width:900px;
            margin:25px auto 0;
            font-size:17px;
            line-height:1.9;
            color:#e0e0e0;
        }

        /* ================= SECTION ================= */
        .section{
            padding:90px 0;
            background:#fff;
        }
        .section.gray{
            background:#f4f7fb;
        }
        .section-title{
            text-align:center;
            margin-bottom:60px;
        }
        .section-title h2{
            font-size:36px;
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

        /* ================= FEATURE CARDS ================= */
        .etms-card{
            background:#fff;
            padding:40px 30px;
            text-align:center;
            border-radius:10px;
            box-shadow:0 12px 30px rgba(0,0,0,0.08);
            transition:.35s;
            border-top:4px solid #23B684;
            height:100%;
            min-height:280px;
            display:flex;
            flex-direction:column;
            justify-content:center;
        }
        .etms-card:hover{
            transform:translateY(-10px);
            box-shadow:0 20px 40px rgba(0,0,0,0.12);
        }
        .etms-card i{
            font-size:44px;
            color:#23B684;
            margin-bottom:20px;
        }
        .etms-card h4{
            font-weight:700;
            margin-bottom:12px;
            min-height:48px;
        }
        .etms-card p{
            font-size:14.5px;
            color:#666;
            line-height:1.7;
            flex-grow:1;
        }

        /* ================= WORKFLOW ================= */
        .workflow-step{
            background:#fff;
            padding:32px 38px;
            margin-bottom:20px;
            border-left:5px solid #23B684;
            box-shadow:0 10px 25px rgba(0,0,0,0.07);
            font-weight:600;
            color:#555;
            border-radius:5px;
        }

        /* ================= USER ROLES ================= */
        .role-box{
            background:#fff;
            padding:45px;
            border-radius:12px;
            box-shadow:0 14px 35px rgba(0,0,0,0.08);
            height:100%;
        }
        .role-box h4{
            font-weight:800;
            margin-bottom:20px;
            color:#23B684;
        }
    </style>
</head>

<body>

<?php include('includes/header.php'); ?>

<!-- HERO -->
<div class="hero">
    <div class="container">
        <h1>Smart <span>Task Management</span> Platform</h1>
        <p>
            Employee Task Management System is a professional web-based solution
            that helps organizations manage employees, tasks, and performance efficiently.
        </p>
    </div>
</div>

<!-- WHY SYSTEM -->
<div class="section">
    <div class="container">
        <div class="section-title">
            <h2>Why Choose <span>Our System</span></h2>
            <p>
                Traditional spreadsheets and manual tracking systems are inefficient.
                This platform offers real-time visibility, accountability, and improved productivity.
            </p>
        </div>
    </div>
</div>

<!-- ================= SAME CARDS AS HOME (FUNCTIONAL) ================= -->
<div class="section gray">
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <a href="task-management.php" style="text-decoration:none;">
                    <div class="etms-card">
                        <i class="fa fa-tasks"></i>
                        <h4>Task Management</h4>
                        <p>Assign tasks, set deadlines and track progress efficiently.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="employee-management.php" style="text-decoration:none;">
                    <div class="etms-card">
                        <i class="fa fa-users"></i>
                        <h4>Employee Management</h4>
                        <p>Manage employee profiles, roles and task assignments.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="performance-reports.php" style="text-decoration:none;">
                    <div class="etms-card">
                        <i class="fa fa-line-chart"></i>
                        <h4>Performance Reports</h4>
                        <p>Analyze productivity and task completion reports.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="security.php" style="text-decoration:none;">
                    <div class="etms-card">
                        <i class="fa fa-lock"></i>
                        <h4>Secure Access</h4>
                        <p>Role-based access ensures data security and privacy.</p>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>

<!-- WORKFLOW -->
<div class="section">
    <div class="container">
        <div class="section-title">
            <h2>System <span>Workflow</span></h2>
        </div>

        <div class="workflow-step">The administrator sets up the system and adds employees.</div>
        <div class="workflow-step">Tasks are assigned with deadlines and priorities.</div>
        <div class="workflow-step">Employees update task progress regularly.</div>
        <div class="workflow-step">Management analyzes performance using reports.</div>
    </div>
</div>

<!-- USER ROLES -->
<div class="section gray">
    <div class="container">
        <div class="section-title">
            <h2>User <span>Roles</span></h2>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="role-box">
                    <h4>Administrator</h4>
                    <ul>
                        <li>Employee and task management</li>
                        <li>Reports and analytics</li>
                        <li>System control</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="role-box">
                    <h4>Employee</h4>
                    <ul>
                        <li>View assigned tasks</li>
                        <li>Update task status</li>
                        <li>Track productivity</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
