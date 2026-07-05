<?php
include 'Dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["videos"])) {
    $w_id = $_POST["w_id"];
    $targetDir = "assets/vids/";
    
    foreach ($_FILES["videos"]["tmp_name"] as $key => $tmp_name) {
        $fileName = basename($_FILES["videos"]["name"][$key]);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["videos"]["tmp_name"][$key], $targetFilePath)) {
            $query = "INSERT INTO workout_videos (w_id, video_path) VALUES ('$w_id', '$targetFilePath')";
            mysql_query($query) or die(mysql_error());
        }
    }

    echo "Videos uploaded successfully!";
    header("Location: admin_dashboard.php");
}
?>
