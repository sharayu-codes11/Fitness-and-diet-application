<?php
include("Dbcon.php");

// Check if category is set in URL
if (!isset($_GET['category'])) {
    echo "<h2>Please select a workout category from the Dashboard.</h2>";
    exit;
}

$category = mysql_real_escape_string($_GET['category']);

// Fetch workout videos for the selected category
$result = mysql_query("SELECT video_urls FROM workout WHERE w_name='$category'", $con);

// If no videos found, show a message
if (mysql_num_rows($result) == 0) {
    echo "<h2>No videos found for " . htmlspecialchars($category) . ".</h2>";
    exit;
}

echo "<h2>" . htmlspecialchars($category) . " Workout Videos</h2>";

// Display videos
while ($row = mysql_fetch_assoc($result)) {
    $video_links = explode(',', $row['video_urls']);
    foreach ($video_links as $link) {
        echo "<iframe width='300' height='200' src='$link' allowfullscreen></iframe>";
    }
}
?>
