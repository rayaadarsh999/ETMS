<?php
session_start();
include('../includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Our Vision | Employee Task Management System</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/font-awesome.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">

<style>
.page-hero{
    background:linear-gradient(rgba(15,15,16,.75),rgba(15,15,16,.75)),
    url('../images/banner4.jpg') center/cover no-repeat;
    height:380px;
    display:flex;
    align-items:center;
    text-align:center;
    color:#fff;
}
.page-hero h1{font-size:48px;font-weight:800;}
.page-hero span{color:#23B684;}

.section{padding:90px 0;background:#fff;}
.vision-box{
    background:#fff;
    padding:55px;
    border-radius:18px;
    box-shadow:0 25px 60px rgba(0,0,0,.12);
}
.vision-box h3{
    font-weight:800;
    color:#23B684;
    margin-bottom:20px;
}
.vision-box p{
    font-size:16px;
    line-height:1.9;
    color:#555;
}
</style>
</head>

<body>
<?php include('../includes/header.php'); ?>

<section class="page-hero">
<div class="container">
<h1>Our <span>Vision</span></h1>
<p>Building future-ready digital workplaces</p>
</div>
</section>

<section class="section">
<div class="container">
<div class="vision-box">
    <h3>Our Vision</h3>

    <p>
        Our vision is to become a trusted digital backbone for organizations by
        delivering a robust and intelligent Employee Task Management System that
        simplifies daily operations while ensuring accountability and transparency
        across all levels of the organization.
    </p>

    <p>
        In modern workplaces, lack of clarity, poor task ownership, and manual
        tracking methods often lead to missed deadlines and reduced productivity.
        Our system is designed to eliminate these challenges by introducing
        structured workflows, real-time visibility, and centralized task control.
    </p>

    <p>
        We envision a future where teams collaborate efficiently, managers make
        informed decisions using real-time data, and organizations grow faster
        through optimized task execution and performance monitoring.
    </p>

    <p>
        By continuously improving our platform, we aim to support organizations
        of all sizes—from startups to enterprises—in building disciplined,
        transparent, and performance-driven work cultures.
    </p>
</div>

</div>
</section>

<?php include('../includes/footer.php'); ?>
</body>
</html>
