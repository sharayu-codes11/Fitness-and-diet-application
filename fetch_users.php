<?php
include 'Dbcon.php';

// Ensure response is JSON
header("Content-Type: application/json");

// Query the users table
$query = "SELECT user_id, user_name, user_email FROM user";
$result = mysql_query($query, $con);

if (!$result) {
    echo json_encode(("error" "SQL Error: " . mysql_error()));
    exit;
}

// Fetch data
$users = [];
while ($row = mysql_fetch_assoc($result)) {
    $users[] = $row;
}

// Return JSON response
echo json_encode($users);
?>
