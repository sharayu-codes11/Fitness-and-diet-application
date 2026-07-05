<?php
include("Dbcon.php");

if (isset($_GET['category'])) {
    $category = urldecode($_GET['category']);
    $query = "SELECT * FROM workout WHERE w_name='$category' AND w_video IS NOT NULL";
    $result = mysql_query($query, $con);
}
?>

<h2><?php echo strtoupper($category); ?></h2>
<div class="video-grid">
    <?php while ($row = mysql_fetch_assoc($result)) { ?>
        <video controls>
            <source src="<?php echo $row['w_video']; ?>" type="video/mp4">
        </video>
    <?php } ?>
</div>

