<?php
include 'Dbcon.php';

if (isset($_GET['video_id'])) {
    $video_id = mysql_real_escape_string($_GET['video_id']);

    // Get video file path
    $query = "SELECT video_path FROM videos WHERE video_id = '$video_id'";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
    
    if ($row) {
        $file_path = "assets/vids/" . $row['video_path'];

        // Delete from database
        mysql_query("DELETE FROM videos WHERE video_id = '$video_id'");

        // Delete file if exists
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }
}

// Redirect back to admin dashboard
header("Location: admin_dashboard.php");
exit();
?>
