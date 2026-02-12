<?php
include('includes/dbconnection.php');

if (!empty($_POST['deptid'])) {

    $deptid = intval($_POST['deptid']);

    echo '<option value="">Select Employee</option>';

    // ✅ Correct Column Name: DepartmentID
    $sql = "SELECT ID, EmpName FROM tblemployee WHERE DepartmentID = :deptid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':deptid', $deptid, PDO::PARAM_INT);
    $query->execute();

    if ($query->rowCount() > 0) {
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="'.$row['ID'].'">'.$row['EmpName'].'</option>';
        }
    } else {
        echo '<option value="">No Employee Found</option>';
    }
}
?>
