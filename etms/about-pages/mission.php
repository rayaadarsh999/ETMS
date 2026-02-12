<?php
session_start();
include('../includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Our Mission | Employee Task Management System</title>

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
.mission-box{
    background:#fff;
    padding:55px;
    border-radius:18px;
    box-shadow:0 25px 60px rgba(0,0,0,.12);
}
.mission-box h3{
    font-weight:800;
    color:#23B684;
    margin-bottom:20px;
}
.mission-box ul li{
    font-size:16px;
    margin-bottom:14px;
    color:#555;
}
.mission-box i{color:#23B684;margin-right:8px;}
</style>
</head>

<body>
<?php include('../includes/header.php'); ?>

<section class="page-hero">
<div class="container">
<h1>Our <span>Mission</span></h1>
<p>Driving efficiency through smart systems</p>
</div>
</section>

<section class="section">
<div class="container">
<div class="mission-box">
    <h3>Our Mission</h3>

    <p>
        Our mission is to simplify workplace task management by providing a
        centralized, secure, and user-friendly platform that bridges the gap
        between employees and management.
    </p>

    <ul>
        <li><i class="fa fa-check-circle"></i>
            Enable organizations to plan, assign, and track tasks with complete clarity.
        </li>

        <li><i class="fa fa-check-circle"></i>
            Reduce dependency on spreadsheets, emails, and manual follow-ups.
        </li>

        <li><i class="fa fa-check-circle"></i>
            Improve employee accountability through transparent task ownership.
        </li>

        <li><i class="fa fa-check-circle"></i>
            Provide managers with actionable insights using performance reports.
        </li>

        <li><i class="fa fa-check-circle"></i>
            Ensure secure access control using role-based authentication.
        </li>
    </ul>

    <p style="margin-top:20px;">
        Through continuous innovation and system scalability, our mission is to
        help organizations adapt to evolving work environments and maintain
        operational excellence.
    </p>
</div>

</div>
</section>

<?php include('../includes/footer.php'); ?>
</body>
</html>
