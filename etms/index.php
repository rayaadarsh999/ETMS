<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee Task Management System || Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<style>
		/* ===== NEW PROFESSIONAL SECTION ===== */
		.etms-solution{
			padding:90px 0;
			background:#fff;
		}
		.etms-solution h3{
			font-size:34px;
			font-weight:800;
			text-align:center;
		}
		.etms-solution h3 span{
			color:#23B684;
		}
		.etms-solution p{
			max-width:850px;
			margin:20px auto 60px;
			text-align:center;
			color:#666;
			font-size:15px;
			line-height:1.8;
		}
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
	min-height:48px;   /* title height fix */
		.etms-card p{
	font-size:14.5px;
	color:#666;
	line-height:1.7;
	flex-grow:1;       /* content balance */
}
	</style>
</head>
<body>
<?php include_once('includes/header.php'); ?>
<!-- ================= SLIDER ================= -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<div class="container">
				<div class="carousel-caption">
					<h3>Smart <span>Task Management</span></h3>
					<p>Organize tasks, employees and workflow efficiently</p>
					<div style="margin-top:40px;">
						<a class="btn btn-primary btn-lg" href="read-more.php">Learn More »</a>
					</div>
				</div>
			</div>
		</div>
		<div class="item item2">
			<div class="container">
				<div class="carousel-caption">
					<h3><span>Employee</span> Performance Tracking</h3>
					<p>Monitor progress and productivity in real time</p>
					<div style="margin-top:40px;">
						<a class="btn btn-primary btn-lg" href="read-more.php#performance">Learn More »</a>
					</div>
				</div>
			</div>
		</div>
		<div class="item item3">
			<div class="container">
				<div class="carousel-caption">
					<h3><span>Secure</span> Data & Reports</h3>
					<p>Role-based access with detailed reporting system</p>
					<div style="margin-top:40px;">
						<a class="btn btn-primary btn-lg" href="read-more.php#security">Learn More »</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="fa fa-chevron-left"></span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="fa fa-chevron-right"></span>
	</a>
</div>
<!-- ================= SLIDER END ================= -->
<!-- ================= NEW PROFESSIONAL CONTENT (BETWEEN IMAGES) ================= -->
<div class="etms-solution">
	<div class="container">
		<h3>Complete <span>Employee Task Management</span> Solution</h3>
		<p>
			Employee Task Management System is designed to digitally manage
			employees, tasks, performance, and reports in one centralized platform.
			It improves transparency, accountability, and overall organizational productivity.
		</p>
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
<!-- ================= NEW SECTION END ================= -->
<!-- ================= EXISTING IMAGE SECTION ================= -->
<div class="team_work_agile">
	<h4>
		Whether we play a large or small role, by working together
		we achieve our objectives.
	</h4>
</div>
<?php include_once('includes/footer.php'); ?>
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
