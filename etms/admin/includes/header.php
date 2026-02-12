<?php
$aid = $_SESSION['etmsaid'];
$sql = "SELECT AdminName, ProfilePic FROM tbladmin WHERE ID=:aid";
$query = $dbh->prepare($sql);
$query->bindParam(':aid', $aid, PDO::PARAM_STR);
$query->execute();
$admin = $query->fetch(PDO::FETCH_OBJ);
?>

<div class="topbar">
  <nav class="navbar navbar-expand-lg navbar-dark" style="background:#102235;">
    <div class="full d-flex align-items-center justify-content-between">

      <!-- LEFT : SIDEBAR TOGGLE + TITLE -->
      <div class="d-flex align-items-center">
        <button id="sidebarCollapse" class="sidebar_toggle">
          <i class="fa fa-bars"></i>
        </button>

        <h3 style="color:#fff;margin:0 0 0 15px;font-size:18px;">
          EMPLOYEE TASK MANAGEMENT SYSTEM
        </h3>
      </div>

      <!-- RIGHT : SINGLE PROFILE DROPDOWN -->
      <ul class="navbar-nav">
        <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle d-flex align-items-center"
             href="#"
             id="adminDropdown"
             role="button"
             data-toggle="dropdown"
             aria-haspopup="true"
             aria-expanded="false">

            <img src="images/<?php echo ($admin->ProfilePic!='') ? $admin->ProfilePic : 'user.png'; ?>"
                 style="width:38px;height:38px;border-radius:50%;object-fit:cover;border:2px solid #ff5722;">

            <span style="margin-left:8px;color:#fff;font-weight:500;">
              <?php echo htmlentities($admin->AdminName); ?>
            </span>
          </a>

          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.php">My Profile</a>
            <a class="dropdown-item" href="change-password.php">Change Password</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger font-weight-bold" href="logout.php">Logout</a>
          </div>

        </li>
      </ul>

    </div>
  </nav>
</div>
