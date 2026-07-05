<?php
include("Dbcon.php");

// Get workout ID from URL
if (isset($_GET['w_id'])) {
    $id = intval($_GET['w_id']);
    $query = mysql_query("SELECT * FROM workout WHERE w_id = $id", $con);
    $workout = mysql_fetch_assoc($query);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $w_name = mysql_real_escape_string($_POST['w_name']);
    $w_type = mysql_real_escape_string($_POST['w_type']);
    $w_duration = intval($_POST['w_duration']);
    $video_urls = mysql_real_escape_string($_POST['video_urls']);
    $image_path = mysql_real_escape_string($_POST['image_path']);

    // Update query
    mysql_query("UPDATE workout SET w_name='$w_name', w_type='$w_type', w_duration='$w_duration', video_urls='$video_urls', image_path='$image_path' WHERE w_id=$id", $con);

    echo "<script>alert('Workout Updated Successfully!'); window.location.href='admin_dashboard.php';</script>";
}
?>

<!-- UPDATE WORKOUT FORM -->
<form method="POST">
    <label>Workout Name:</label>
    <input type="text" name="w_name" value="<?php echo $workout['w_name']; ?>" required><br>

    <label>Workout Type:</label>
    <input type="text" name="w_type" value="<?php echo $workout['w_type']; ?>" required><br>

    <label>Workout Duration (in minutes):</label>
    <input type="number" name="w_duration" value="<?php echo $workout['w_duration']; ?>" required><br>

    <label>Video Links (comma-separated):</label>
    <input type="text" name="video_urls" value="<?php echo $workout['video_urls']; ?>" required><br>

    <label>Image Path:</label>
    <input type="text" name="image_path" value="<?php echo $workout['image_path']; ?>" required><br>

    <input type="submit" value="Update Workout">
</form>
