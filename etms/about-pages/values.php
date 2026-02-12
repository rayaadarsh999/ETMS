<?php
session_start();
include('../includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Core Values | Employee Task Management System</title>

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

.section{padding:90px 0;background:#f4f7fb;}
.value-card{
    background:#fff;
    padding:40px;
    border-radius:16px;
    text-align:center;
    box-shadow:0 18px 45px rgba(0,0,0,.12);
}
.value-card i{
    font-size:46px;
    color:#23B684;
    margin-bottom:15px;
}
.value-card h4{
    font-weight:800;
    margin-bottom:10px;
}
</style>
</head>

<body>
<?php include('../includes/header.php'); ?>

<section class="page-hero">
<div class="container">
<h1>Core <span>Values</span></h1>
<p>Principles that guide our system design</p>
</div>
</section>

<section class="section">
<div class="container">
<div class="row">

<div class="col-md-4">
    <div class="value-card">
        <i class="fa fa-shield"></i>
        <h4>Security & Trust</h4>
        <p>
            We prioritize data protection and system reliability.
            Our platform follows secure authentication practices
            to ensure sensitive organizational data remains safe.
        </p>
    </div>
</div>

<div class="col-md-4">
    <div class="value-card">
        <i class="fa fa-line-chart"></i>
        <h4>Performance Excellence</h4>
        <p>
            We believe productivity improves when processes are
            structured and measurable. Our system focuses on
            efficiency, accuracy, and performance optimization.
        </p>
    </div>
</div>

<div class="col-md-4">
    <div class="value-card">
        <i class="fa fa-users"></i>
        <h4>Accountability</h4>
        <p>
            Clear task ownership creates responsibility.
            Our platform ensures transparency so every task
            has a defined owner, deadline, and progress status.
        </p>
    </div>
</div>

</div>

<div class="row" style="margin-top:40px;">
<div class="col-md-12 text-center">
    <p style="max-width:900px;margin:auto;font-size:16px;color:#555;">
        These values guide every feature we build and every improvement
        we introduce. They ensure that Employee Task Management System
        remains reliable, scalable, and aligned with real-world
        organizational needs.
    </p>
</div>
</div>

</div>
</section>


<?php include('../includes/footer.php'); ?>
</body>
</html>
