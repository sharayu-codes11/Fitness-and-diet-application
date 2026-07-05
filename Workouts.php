<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/icon.jpg" rel="icon">
    <link rel="stylesheet" href="assets/css/Final.css">
    <style>
        body {
            background-image: url('assets/img/Lbg2.jpg');
            backdrop-filter: blur(10px);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            overflow-x: hidden;
            padding: 60px;
        }


        </style>
        </head>
        <body>

        <div class="header">
        <div class="logo">
            <img src="assets/img/icon.jpg" alt="Logo">
        </div>
        <div class="header-left">FitLife</div>
        <ul class="nav-links">
            <li><a href='Dashboard.php'>Dashboard</a></li>
        </ul>
    </div>

<?php
include("Dbcon.php");

if (isset($_GET['category'])) {
    $category = mysql_real_escape_string($_GET['category']);

    $query = "SELECT video_urls FROM workout WHERE w_name='$category'";
    $result = mysql_query($query, $con);

    if (mysql_num_rows($result) > 0) {
        echo "<h2 style='color:white; text-align: center;'>$category Workout Videos</h2>";
        echo "<div class='video-container'>";

        while ($row = mysql_fetch_assoc($result)) {
            $video_links = explode(',', $row['video_urls']);

            foreach ($video_links as $link) {
                // Convert YouTube short links to embed format
                if (strpos($link, 'youtu.be') !== false) {
                    $parts = explode('youtu.be/', $link);
                    if (count($parts) > 1) {
                        $videoID = $parts[1];
                        $link = "https://www.youtube.com/embed/$videoID";
                    }
                } elseif (strpos($link, 'watch?v=') !== false) {
                    $parts = explode('watch?v=', $link);
                    if (count($parts) > 1) {
                        $videoParts = explode('&', $parts[1]); // Store explode result first
                        $videoID = $videoParts[0]; // Get first part
                        $link = "https://www.youtube.com/embed/$videoID";
                    }
                }

                echo "<iframe width='300' height='200' src='$link' allowfullscreen></iframe>";
            }
        }
        echo "</div>";
    } else {
        echo "<h2 style='color:white; text-align: center;'>No Videos Found for $category</h2>";
    }
} else {
    echo "<h2 style='color:white; text-align: center;'>Invalid Category</h2>";
}
?>
</body>
</html>