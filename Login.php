<?php
include("Dbcon.php"); // Ensure this file contains a valid MySQL connection
session_start();

$emailError = "";
$passwordError = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
        $emailError = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format.";
    }

    if (empty($password)) {
        $passwordError = "Password is required.";
    }

    if (empty($emailError) && empty($passwordError)) {
        if ($email == 'admin.2@gmail.com') {
            $query = "SELECT admin_id, admin_name, admin_password FROM admin1 WHERE admin_email = '$email'";
            $result = mysql_query($query, $con);

            if ($result && mysql_num_rows($result) > 0) {
                $row = mysql_fetch_assoc($result);
                if ($row['admin_password'] === $password) { // Insecure: Plain-text check
                    $_SESSION['admin_id'] = $row['admin_id'];
                    $_SESSION['admin_name'] = $row['admin_name'];
                    $_SESSION['is_admin'] = true;
                    header("Location: admin_dashboard.php");
                    exit();
                } else {
                    $passwordError = "Invalid password.";
                }
            } else {
                $emailError = "Invalid email.";
            }
        } else {
            $query = "SELECT user_id, user_name, user_password FROM user WHERE user_email = '$email'";
            $result = mysql_query($query, $con);

            if ($result && mysql_num_rows($result) > 0) {
                $row = mysql_fetch_assoc($result);
                if ($row['user_password'] === $password) { // Insecure: Plain-text check
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['is_admin'] = false;
                    header("Location: Dashboard.php");
                    exit();
                } else {
                    $passwordError = "Invalid password.";
                }
            } else {
                $emailError = "Invalid email.";
            }
        }
    }

    // Redirect back to login.html with error messages
    header("Location: Login.html?emailError=" . urlencode($emailError) . "&passwordError=" . urlencode($passwordError));
    exit();
}
?>
