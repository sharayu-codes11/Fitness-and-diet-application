<?php
include 'Dbcon.php';

if (isset($_GET['d_id'])) {
    $d_id = $_GET['d_id'];
    $query = "SELECT * FROM diet_plan WHERE d_id = $d_id";
    $result = mysql_query($query);
    $diet = mysql_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $d_id = $_POST['d_id'];
    $plan_name = mysql_real_escape_string($_POST['plan_name']);
    $recommended_for = mysql_real_escape_string($_POST['recommended_for']);

    $query = "UPDATE diet_plan SET plan_name='$plan_name', recommended_for='$recommended_for' WHERE d_id=$d_id";
    if (mysql_query($query)) {
        echo "<script>alert('Diet Plan updated successfully!'); window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "Error: " . mysql_error();
    }
}
?>

<form method="POST">
    <input type="hidden" name="d_id" value="<?= $diet['d_id'] ?>">
    <input type="text" name="plan_name" value="<?= $diet['plan_name'] ?>" required><br>
    <input type="text" name="recommended_for" value="<?= $diet['recommended_for'] ?>" required><br>
    <button type="submit">Update Diet Plan</button>
</form>
