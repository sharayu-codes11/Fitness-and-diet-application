<?php
include 'Dbcon.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    
    // Fetch existing user details
    $query = "SELECT user_name, user_email FROM user WHERE user_id = '$user_id'";
    $result = mysql_query($query, $con);

    if ($row = mysql_fetch_assoc($result)) {
        echo "<script>
            var newName = prompt('Enter new name:', '{$row['user_name']}');
            var newEmail = prompt('Enter new email:', '{$row['user_email']}');

            if (newName !== null && newEmail !== null) {
                window.location.href = 'update_user.php?user_id={$user_id}&new_name=' + encodeURIComponent(newName) + '&new_email=' + encodeURIComponent(newEmail);
            } else {
                alert('Update canceled!');
                window.history.back();
            }
        </script>";
    } else {
        echo "<script>alert('User not found!'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid Request!'); window.history.back();</script>";
}
?>
