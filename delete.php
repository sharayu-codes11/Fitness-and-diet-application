<?php
include 'Dbcon.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    echo "<script>
        if (confirm('Are you sure you want to delete this user?')) {
            window.location.href = 'delete_user.php?user_id=$user_id';
        } else {
            alert('Deletion canceled!');
            window.history.back();
        }
    </script>";
} else {
    echo "<script>alert('Invalid Request!'); window.history.back();</script>";
}
?>
