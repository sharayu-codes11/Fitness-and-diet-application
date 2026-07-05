<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: Login.html");
    exit();
}

include("Dbcon.php");

$email = $_SESSION['user_email'];
$query = "SELECT * FROM diet_plan WHERE user_email = '$email'";
$result = mysql_query($query, $con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Diet Plan</title>
    <link rel="stylesheet" href="assets/css/Final.css">
</head>
<body>
    <h2>Your Diet Plan</h2>
    <table border="1">
        <tr><th>Meal</th><th>Time</th><th>Food Items</th></tr>
        <?php while ($row = mysql_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['meal_type']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['food_items']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php mysql_close($con); ?>
