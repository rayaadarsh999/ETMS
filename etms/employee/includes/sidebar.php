<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$taskPages = ['new-task.php','inprogress-task.php','completed-task.php','all-task.php'];
$taskActive = in_array($currentPage,$taskPages);

$eid = $_SESSION['etmsempid'];
$sql = "SELECT EmpName, EmpEmail, ProfilePic FROM tblemployee WHERE ID=:eid";
$q = $dbh->prepare($sql);
$q->bindParam(':eid',$eid,PDO::PARAM_STR);
$q->execute();
$emp = $q->fetch(PDO::FETCH_OBJ);
?>

<nav id="sidebar">

<div style="padding:20px 10px;background:#102235;text-align:center;">

<img src="../admin/images/<?php echo ($emp->ProfilePic!='')?$emp->ProfilePic:'user.png'; ?>"
style="width:70px;height:70px;border-radius:50%;object-fit:cover;border:3px solid #ff5722;">

<h6 style="color:#fff;margin-top:10px;">
<?php echo htmlentities($emp->EmpName); ?>
</h6>

<p style="color:#9ecbff;font-size:12px;word-break:break-all;margin:0;">
<?php echo htmlentities($emp->EmpEmail); ?>
</p>

</div>

<div class="sidebar_blog_2">
<h4>General</h4>

<ul class="list-unstyled components">

<li class="<?php echo ($currentPage=='dashboard.php')?'active':''; ?>">
<a href="dashboard.php">
<i class="fa fa-dashboard yellow_color"></i> Dashboard
</a>
</li>

<li class="<?php echo $taskActive?'active':''; ?>">
<a href="#taskMenu" data-toggle="collapse" class="dropdown-toggle">
<i class="fa fa-files-o orange_color"></i> Task
</a>
<ul class="collapse <?php echo $taskActive?'show':''; ?>" id="taskMenu">
<li><a href="new-task.php">New Task</a></li>
<li><a href="inprogress-task.php">Inprogress</a></li>
<li><a href="completed-task.php">Completed</a></li>
<li><a href="all-task.php">All Task</a></li>
</ul>
</li>

</ul>
</div>

</nav>
