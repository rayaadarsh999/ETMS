<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['etmsaid']) == 0) {
    header('location:logout.php');
    exit();
}

$aid = $_SESSION['etmsaid'];

if(isset($_POST['submit'])) {

    $pic = $_FILES["profilepic"]["name"];
    $ext = pathinfo($pic, PATHINFO_EXTENSION);

    $allowed = ['jpg','jpeg','png'];
    if(!in_array(strtolower($ext), $allowed)){
        echo "<script>alert('Only JPG, JPEG, PNG allowed');</script>";
    } else {

        $newname = "admin_".$aid."_".time().".".$ext;
        move_uploaded_file($_FILES["profilepic"]["tmp_name"], "images/".$newname);

        $sql = "UPDATE tbladmin SET ProfilePic=:pic WHERE ID=:aid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':pic',$newname,PDO::PARAM_STR);
        $query->bindParam(':aid',$aid,PDO::PARAM_STR);
        $query->execute();

        echo "<script>alert('Profile image updated');</script>";
        echo "<script>window.location.href='profile.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Change Profile Image</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
</head>

<body class="inner_page">
<div class="container mt-5">

<div class="row justify-content-center">
<div class="col-md-6">

<div class="card p-4 text-center">
<h4 class="mb-3">Change Admin Profile Image</h4>

<form method="post" enctype="multipart/form-data">
<input type="file" name="profilepic" class="form-control mb-3" required>

<button type="submit" name="submit" class="btn btn-primary">
Upload Image
</button>
</form>

</div>
</div>
</div>

</div>
</body>
</html>
