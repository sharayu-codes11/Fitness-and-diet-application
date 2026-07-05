<?php
include 'Dbcon.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $query = "SELECT user_name, user_email FROM user WHERE user_id = '$user_id'";
    $result = mysql_query($query, $con);

    if ($row = mysql_fetch_assoc($result)) {
        echo "<script>alert('User Details:\\nName: {$row['user_name']}\\nEmail: {$row['user_email']}'); window.history.back();</script>";
    } else {
        echo "<script>alert('User not found!'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid Request!'); window.history.back();</script>";
}
?>
