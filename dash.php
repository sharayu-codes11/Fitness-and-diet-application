<?php
include 'Dbcon.php';

$result = mysql_query("SELECT * FROM workout") or die(mysql_error());
?>

<h2>Choose Type of Exercise</h2>
<div class="workout-list">
    <?php while ($row = mysql_fetch_assoc($result)) { ?>
        <div class="workout-box">
            <img src="<?php echo htmlspecialchars($row['image_path']); ?>" width="100">
            <h3><?php echo htmlspecialchars($row['w_name']); ?></h3>
            <a href="workout.php?w_id=<?php echo $row['w_id']; ?>">View Videos</a>
        </div>
    <?php } ?>
</div>
