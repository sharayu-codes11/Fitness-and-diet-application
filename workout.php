<?php
include 'Dbcon.php';

$w_id = isset($_GET['w_id']) ? (int)$_GET['w_id'] : 0;
$result = mysql_query("SELECT * FROM workout_videos WHERE w_id = $w_id") or die(mysql_error());

if (mysql_num_rows($result) == 0) {
    echo "<h3>No videos available for this workout.</h3>";
} else {
    while ($video = mysql_fetch_assoc($result)) {
        echo "<video width='320' height='240' controls>";
        echo "<source src='" . htmlspecialchars($video['video_path']) . "' type='video/mp4'>";
        echo "Your browser does not support the video tag.";
        echo "</video><br>";
    }
}
?>
