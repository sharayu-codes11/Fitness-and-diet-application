<?php
include 'Dbcon.php';

if (isset($_GET['d_id'])) {
    $d_id = $_GET['d_id'];
    $query = "DELETE FROM diet_plan WHERE d_id=$d_id";
    if (mysql_query($query)) {
        echo "<script>alert('Diet Plan deleted successfully!'); window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "Error: " . mysql_error();
    }
}
?>
