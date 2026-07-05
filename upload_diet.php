<?php
include 'Dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $plan_name = mysql_real_escape_string($_POST['plan_name']);
    $recommended_for = mysql_real_escape_string($_POST['recommended_for']);

    $query = "INSERT INTO diet_plan (plan_name, recommended_for, admin_id) VALUES ('$plan_name', '$recommended_for', 1)";
    if (mysql_query($query)) {
        echo "<script>alert('Diet Plan added successfully!'); window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "Error: " . mysql_error();
    }
}
?>
