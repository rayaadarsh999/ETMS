<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee Management | Employee Task Management System</title>

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

        /* ================= HERO ================= */
        .hero{
            background:
            linear-gradient(rgba(15,15,16,0.75),rgba(15,15,16,0.75)),
            url(images/banner2.jpg) center/cover no-repeat;
            min-height:520px;
            display:flex;
            align-items:center;
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

        /* ================= FEATURE BOX ================= */
        .feature-box{
    background:#fff;
    padding:40px 35px;
    border-radius:10px;
    box-shadow:0 14px 35px rgba(0,0,0,0.08);
    transition:.3s;

    height:100%;              /* important */
    min-height:320px;         /* same height */
    
    display:flex;
    flex-direction:column;
    justify-content:flex-start;
    text-align:center;
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
    min-height:50px; 
        }
        .feature-box p{
            color:#666;
    font-size:14.8px;
    line-height:1.7;
    flex-grow:1;
        }

        /* ================= PROCESS ================= */
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
        <h1><span>Employee</span> Management Module</h1>
        <p>
            The Employee Management module allows organizations to manage employee
            records, roles, and responsibilities efficiently through a centralized system.
        </p>
    </div>
</div>

<!-- ================= INTRO ================= -->
<div class="section">
    <div class="container">
        <div class="section-title">
            <h2>About <span>Employee Management</span></h2>
            <p>
                This module provides complete control over employee information,
                ensuring proper task allocation, role management, and performance tracking
                within the organization.
            </p>
        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fa fa-user-plus"></i>
                    <h4>Add Employees</h4>
                    <p>
                        Administrators can add new employees with complete profile
                        details including designation and department.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fa fa-id-badge"></i>
                    <h4>Manage Roles</h4>
                    <p>
                        Define employee roles and responsibilities clearly
                        to maintain organizational structure.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fa fa-exchange"></i>
                    <h4>Task Assignment</h4>
                    <p>
                        Employees are assigned tasks based on their role,
                        workload, and skill set.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ================= WORKFLOW ================= -->
<div class="section gray">
    <div class="container">
        <div class="section-title">
            <h2>Employee <span>Workflow</span></h2>
        </div>

        <div class="process-step">
            The administrator adds employee profiles into the system.
        </div>
        <div class="process-step">
            Roles and access permissions are assigned accordingly.
        </div>
        <div class="process-step">
            Tasks are allocated based on employee responsibility.
        </div>
        <div class="process-step">
            Employee activity and performance are monitored continuously.
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
