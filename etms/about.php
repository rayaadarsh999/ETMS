<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us | Employee Task Management System</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- COMMON CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">

    <style>
        body{
            font-family:'Work Sans',sans-serif;
            background:#f4f7fb;
        }

        .about-hero{
            background:
            linear-gradient(rgba(15,15,16,0.65),rgba(15,15,16,0.65)),
            url(images/banner4.jpg) center/cover no-repeat;
            min-height:520px;
            display:flex;
            align-items:center;
            text-align:center;
            color:#fff;
        }
        .about-hero h1{
            font-size:50px;
            font-weight:800;
        }
        .about-hero h1 span{ color:#23B684; }
        .about-hero p{
            max-width:900px;
            margin:25px auto 0;
            font-size:17px;
            line-height:1.9;
            color:#e0e0e0;
        }

        .section{
            padding:90px 0;
            background:#fff;
        }
        .section.gray{ background:#f4f7fb; }

        .section-title{
            text-align:center;
            margin-bottom:60px;
        }
        .section-title h2{
            font-size:36px;
            font-weight:800;
        }
        .section-title h2 span{ color:#23B684; }
        .section-title p{
            max-width:850px;
            margin:18px auto 0;
            font-size:15px;
            color:#666;
            line-height:1.8;
            font-weight:500;
        }

        .about-box{
            background:#fff;
            padding:45px;
            border-radius:12px;
            box-shadow:0 15px 40px rgba(0,0,0,0.08);
        }
        .about-box h4{
            font-weight:800;
            color:#23B684;
            margin-bottom:15px;
        }
        .about-box p{
            font-size:15px;
            line-height:1.9;
            color:#555;
            font-weight:500;
            margin-bottom:15px;
        }

        .about-img{
            border-radius:14px;
            box-shadow:0 18px 45px rgba(0,0,0,0.15);
            max-width:100%;
        }

        .feature-card{
            background:#fff;
            padding:45px 35px;
            border-radius:12px;
            text-align:center;
            box-shadow:0 14px 35px rgba(0,0,0,0.08);
            transition:.35s;
            height:100%;
            border-top:4px solid #23B684;
        }
        .feature-card:hover{
            transform:translateY(-8px);
            box-shadow:0 20px 45px rgba(0,0,0,0.12);
        }
        .feature-card i{
            font-size:44px;
            color:#23B684;
            margin-bottom:20px;
        }
        .feature-card h4{
            font-weight:800;
            margin-bottom:12px;
        }
        .feature-card p{
            font-size:14.5px;
            color:#666;
            line-height:1.7;
        }
    </style>
</head>

<body>

<?php include('includes/header.php'); ?>

<!-- HERO -->
<div class="about-hero">
    <div class="container">
        <h1>About <span>Our System</span></h1>
        <p>
            Employee Task Management System is a modern web-based platform
            created to simplify workforce management and improve organizational efficiency.
        </p>
    </div>
</div>

<!-- WHO WE ARE -->
<div class="section">
    <div class="container">
        <div class="section-title">
            <h2>Who <span>We Are</span></h2>
            <p>
                A professional system built to bring clarity, accountability,
                and structure into daily organizational operations.
            </p>
        </div>

        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="about-box">
                    <h4>About the Platform</h4>
                    <p>
                        Employee Task Management System is a complete enterprise-ready
                        solution designed to digitally manage employees, tasks, workflows,
                        deadlines, and performance metrics from a single centralized platform.
                    
                        The system replaces traditional manual methods and spreadsheets
                        with a structured, transparent, and real-time task monitoring
                        environment that improves productivity and accountability
                        across all organizational levels.
                    </p>

                    <h4 style="margin-top:25px;">Real-World Use</h4>
                    <p>
                        From startups and educational institutions to corporate offices
                        and large enterprises, the platform adapts seamlessly to
                        different organizational structures.
                        Managers can assign priorities, monitor deadlines,
                        and evaluate employee performance, while employees
                        gain clarity on responsibilities and expectations,
                        resulting in smoother workflows and higher efficiency.
                    </p>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <img src="images/about.png" class="about-img" alt="Professional Team">
            </div>
        </div>
    </div>
</div>

<!-- PURPOSE CARDS -->
<div class="section gray">
    <div class="container">
        <div class="section-title">
            <h2>Our <span>Purpose</span></h2>
            <p>
                The system is designed with a clear vision, mission,
                and value-driven approach.
            </p>
        </div>

        <div class="row">
            <a href="about-pages/vision.php" style="text-decoration:none;">
            <div class="col-md-4">
                <div class="feature-card">
                    <i class="fa fa-eye"></i>
                    <h4>Our Vision</h4>
                    <p>
                        To build a smart digital workplace solution that enhances
                        transparency, accountability, and organizational growth.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <a href="about-pages/mission.php" style="text-decoration:none;">
                <div class="feature-card">
                    <i class="fa fa-bullseye"></i>
                    <h4>Our Mission</h4>
                    <p>
                        To simplify employee and task management through
                        secure, scalable, and user-friendly technology.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <a href="about-pages/values.php" style="text-decoration:none;">
                <div class="feature-card">
                    <i class="fa fa-diamond"></i>
                    <h4>Core Values</h4>
                    <p>
                        Simplicity, reliability, data security,
                        and performance-driven decision making.
                    </p>
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
