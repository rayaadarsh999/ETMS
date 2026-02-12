<?php
$currentPage = basename($_SERVER['PHP_SELF']);

$deptPages   = ['add-dept.php','manage-dept.php'];
$empPages    = ['add-employee.php','manage-employee.php'];
$taskPages   = ['add-task.php','manage-task.php'];
$statusPages = ['inprogress-task.php','completed-task.php'];

$deptActive   = in_array($currentPage,$deptPages);
$empActive    = in_array($currentPage,$empPages);
$taskActive   = in_array($currentPage,$taskPages);
$statusActive = in_array($currentPage,$statusPages);

/* ADMIN DATA */
$aid = $_SESSION['etmsaid'];
$sql = "SELECT AdminName, Email, ProfilePic FROM tbladmin WHERE ID=:aid";
$q = $dbh->prepare($sql);
$q->bindParam(':aid',$aid,PDO::PARAM_STR);
$q->execute();
$admin = $q->fetch(PDO::FETCH_OBJ);
?>

<nav id="sidebar">

   <!-- ADMIN PROFILE (TOP FIXED) -->
   <div style="padding:20px 10px;background:#102235;text-align:center;">
      <img src="images/<?php echo ($admin->ProfilePic!='')?$admin->ProfilePic:'user.png'; ?>"
           style="width:70px;height:70px;border-radius:50%;object-fit:cover;border:3px solid #ff5722;">

      <h6 style="color:#fff;margin-top:10px;">
         <?php echo htmlentities($admin->AdminName); ?>
      </h6>

      <p style="color:#9ecbff;font-size:12px;word-break:break-all;margin:0;">
         <?php echo htmlentities($admin->Email); ?>
      </p>
   </div>

   <!-- MENU -->
   <div class="sidebar_blog_2">
      <h4>General</h4>

      <ul class="list-unstyled components">

         <li class="<?php echo ($currentPage=='dashboard.php')?'active':''; ?>">
            <a href="dashboard.php">
               <i class="fa fa-dashboard yellow_color"></i> Dashboard
            </a>
         </li>

         <li class="<?php echo $deptActive?'active':''; ?>">
            <a href="#deptMenu" data-toggle="collapse" class="dropdown-toggle">
               <i class="fa fa-files-o orange_color"></i> Department
            </a>
            <ul class="collapse <?php echo $deptActive?'show':''; ?>" id="deptMenu">
               <li><a href="add-dept.php">Add</a></li>
               <li><a href="manage-dept.php">Manage</a></li>
            </ul>
         </li>

         <li class="<?php echo $empActive?'active':''; ?>">
            <a href="#empMenu" data-toggle="collapse" class="dropdown-toggle">
               <i class="fa fa-users purple_color"></i> Employee
            </a>
            <ul class="collapse <?php echo $empActive?'show':''; ?>" id="empMenu">
               <li><a href="add-employee.php">Add</a></li>
               <li><a href="manage-employee.php">Manage</a></li>
            </ul>
         </li>

         <li class="<?php echo $taskActive?'active':''; ?>">
            <a href="#taskMenu" data-toggle="collapse" class="dropdown-toggle">
               <i class="fa fa-object-group blue2_color"></i> Task
            </a>
            <ul class="collapse <?php echo $taskActive?'show':''; ?>" id="taskMenu">
               <li><a href="add-task.php">Add</a></li>
               <li><a href="manage-task.php">Manage</a></li>
            </ul>
         </li>

         <li class="<?php echo $statusActive?'active':''; ?>">
            <a href="#statusMenu" data-toggle="collapse" class="dropdown-toggle">
               <i class="fa fa-briefcase blue1_color"></i> Task Status
            </a>
            <ul class="collapse <?php echo $statusActive?'show':''; ?>" id="statusMenu">
               <li><a href="inprogress-task.php">Inprogress</a></li>
               <li><a href="completed-task.php">Completed</a></li>
            </ul>
         </li>

         <li>
            <a href="betweendates-task-report.php">
               <i class="fa fa-bar-chart-o green_color"></i> Task Reports
            </a>
         </li>

      </ul>
   </div>

</nav>
