<?php
include("Dbcon.php");

if (isset($_GET['w_id'])) {
    $id = intval($_GET['w_id']);
    mysql_query("DELETE FROM workout WHERE w_id=$id", $con);
    echo "<script>alert('Workout Deleted Successfully!'); window.location.href='admin_dashboard.php';</script>";
}
?>
