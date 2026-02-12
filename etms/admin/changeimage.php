<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['etmsaid']) == 0) {
    header('location:logout.php');
    exit();
}

$eid = $_GET['editid'];   // IMPORTANT: Employee ID

if(isset($_POST['submit'])) {

    $profilepic = $_FILES["profilepic"]["name"];
    $extension = substr($profilepic,strlen($profilepic)-4,strlen($profilepic));
    $allowed_extensions = array(".jpg",".jpeg",".png",".gif");

    if(!in_array($extension,$allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg / png / gif allowed');</script>";
    } else {

        $newprofilepic = md5($profilepic).time().$extension;
        move_uploaded_file($_FILES["profilepic"]["tmp_name"],"images/".$newprofilepic);

        // ✅ VERY IMPORTANT FIX
        // Admin table nahi, EMPLOYEE table update hoga

        $sql="UPDATE tblemployee SET ProfilePic=:profilepic WHERE ID=:eid";
        $query=$dbh->prepare($sql);
        $query->bindParam(':profilepic',$newprofilepic,PDO::PARAM_STR);
        $query->bindParam(':eid',$eid,PDO::PARAM_STR);
        $query->execute();

        echo "<script>alert('Profile Image Updated Successfully');</script>";
        echo "<script>window.location.href='edit-employee.php?editid=$eid'</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Change Profile Image</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
<div class="card p-4">

<h4 class="mb-3 text-center">Change Employee Profile Image</h4>

<form method="post" enctype="multipart/form-data">

<div class="form-group mb-3">
<input type="file" name="profilepic" class="form-control" required>
</div>

<div class="text-center">
<button type="submit" name="submit" class="btn btn-primary">
Upload Image
</button>
</div>

</form>

</div>
</div>

</body>
</html>
