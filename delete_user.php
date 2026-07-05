<?php
include 'Dbcon.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $query = "DELETE FROM user WHERE user_id = '$user_id'";
    
    if (mysql_query($query, $con)) {
        echo "<script>alert('User deleted successfully!'); window.history.back();</script>";
    } else {
        echo "<script>alert('Deletion failed: " . mysql_error() . "'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid Request!'); window.history.back();</script>";
}
?>
