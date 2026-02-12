<?php
$eid=$_SESSION['etmsempid'];
$sql="SELECT EmpName,EmpId,ProfilePic from tblemployee where ID=:eid";
$query = $dbh->prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$emp=$query->fetch(PDO::FETCH_OBJ);

/* ================= NOTIFICATION COUNT ================= */

$sql = "SELECT ID FROM tbltask 
        WHERE AssignTaskto=:eid AND Status IS NULL";
$query = $dbh->prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$newTaskCount = $query->rowCount();
?>

<div class="topbar">
<nav class="navbar navbar-expand-lg navbar-dark" style="background:#102235;">
<div class="full d-flex align-items-center justify-content-between">

<div class="d-flex align-items-center">
<button id="sidebarCollapse" class="sidebar_toggle">
<i class="fa fa-bars"></i>
</button>

<h3 style="color:#fff;margin:0 0 0 15px;font-size:18px;">
EMPLOYEE TASK MANAGEMENT SYSTEM
</h3>
</div>

<ul class="navbar-nav align-items-center">

<!-- ================= NOTIFICATION BELL ================= -->

<li class="nav-item dropdown" style="margin-right:20px; position:relative;">
    
    <a class="nav-link dropdown-toggle" href="#" 
       data-toggle="dropdown">

        <i class="fa fa-bell" style="font-size:20px;color:#fff;"></i>

        <?php if($newTaskCount > 0){ ?>
        <span style="
            position:absolute;
            top:0px;
            right:0px;
            background:#ff3b3b;
            color:white;
            border-radius:50%;
            padding:3px 7px;
            font-size:11px;">
            <?php echo $newTaskCount; ?>
        </span>
        <?php } ?>

    </a>

    <div class="dropdown-menu dropdown-menu-right"
         style="width:280px; max-height:300px; overflow:auto;">

        <h6 class="dropdown-header">New Tasks</h6>

        <?php
        if($newTaskCount > 0){

            $sql = "SELECT ID, TaskTitle 
                    FROM tbltask 
                    WHERE AssignTaskto=:eid 
                    AND Status IS NULL
                    ORDER BY ID DESC";

            $query = $dbh->prepare($sql);
            $query->bindParam(':eid',$eid,PDO::PARAM_STR);
            $query->execute();
            $tasks = $query->fetchAll(PDO::FETCH_OBJ);

            foreach($tasks as $task){
        ?>

        <a class="dropdown-item"
           href="view-task.php?viewid=<?php echo $task->ID; ?>">
           <?php echo htmlentities($task->TaskTitle); ?>
        </a>

        <?php }} else { ?>

        <span class="dropdown-item text-muted">
            No New Task
        </span>

        <?php } ?>

    </div>
</li>

<!-- ================= USER DROPDOWN ================= -->

<li class="nav-item dropdown">

<a class="nav-link dropdown-toggle d-flex align-items-center"
href="#"
data-toggle="dropdown">

<img src="../admin/images/<?php echo ($emp->ProfilePic!='')?$emp->ProfilePic:'user.png'; ?>"
style="width:38px;height:38px;border-radius:50%;object-fit:cover;border:2px solid #ff5722;">

<span style="margin-left:8px;color:#fff;font-weight:500;">
<?php echo htmlentities($emp->EmpName); ?>
(<?php echo htmlentities($emp->EmpId); ?>)
</span>
</a>

<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="profile.php">My Profile</a>
<a class="dropdown-item" href="change-password.php">Change Password</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item text-danger font-weight-bold" href="logout.php">
   <span>Log Out</span> <i class="fa fa-sign-out"></i>
</a>
</div>

</li>
</ul>

</div>
</nav>
</div>
