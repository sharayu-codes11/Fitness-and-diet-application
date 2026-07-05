<?php
include 'Dbcon.php';

// Handle form submission for workout video
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['w_video'])) {
    $w_name = $_POST['w_name'];
    $w_type = $_POST['w_type'];
    $w_duration = $_POST['w_duration'];
    $videos = $_FILES['w_video'];

    // Loop through each video file
    for ($i = 0; $i < count($videos['name']); $i++) {
        $video_name = $videos['name'][$i];
        $video_tmp_name = $videos['tmp_name'][$i];

        // Move the uploaded video to the appropriate folder
        $upload_path = 'assets/vids/' . basename($video_name);
        move_uploaded_file($video_tmp_name, $upload_path);

        // Insert the video info into the database
        $query = "INSERT INTO workout_videos (w_id, video_name) VALUES ('$w_id', '$video_name')";
        mysql_query($query);
    }

    // Insert workout info into the workout table
    $insert_workout = "INSERT INTO workout (w_name, w_type, w_duration) VALUES ('$w_name', '$w_type', '$w_duration')";
    mysql_query($insert_workout);

    header('Location: admin_dashboard.php'); // Redirect back to admin dashboard
}
?>
