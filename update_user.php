<?php
include 'Dbcon.php';

if (isset($_GET['user_id']) && isset($_GET['new_name']) && isset($_GET['new_email'])) {
    $user_id = $_GET['user_id'];
    $new_name = $_GET['new_name'];
    $new_email = $_GET['new_email'];

    $query = "UPDATE user SET user_name = '$new_name', user_email = '$new_email' WHERE user_id = '$user_id'";
    if (mysql_query($query, $con)) {
        echo "<script>alert('User updated successfully!'); window.history.back();</script>";
    } else {
        echo "<script>alert('Update failed: " . mysql_error() . "'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid Request!'); window.history.back();</script>";
}
?>
