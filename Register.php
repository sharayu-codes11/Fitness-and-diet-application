<?php
include("Dbcon.php"); // Ensure this file contains a valid MySQL connection
session_start();

$errors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $age = trim($_POST['age']);
    $height = trim($_POST['height']);
    $weight = trim($_POST['weight']);

    // Validation
    if (empty($name)) {
        $errors['name'] = "Name is required.";
    }
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    }
    if (empty($age)) {
        $errors['age'] = "Age is required.";
    }
    if (empty($height)) {
        $errors['height'] = "Height is required.";
    }
    if (empty($weight)) {
        $errors['weight'] = "Weight is required.";
    }

    // Check if email already exists
    $checkQuery = "SELECT user_email FROM user WHERE user_email = '$email'";
    $checkResult = mysql_query($checkQuery, $con);

    if (mysql_num_rows($checkResult) > 0) {
        $errors['general'] = "You are already registered. Please login.";
    }

    // If there are errors, store them in session storage and redirect back to Register.html
    if (!empty($errors)) {
        echo "<script>
            sessionStorage.setItem('register_errors', JSON.stringify(" . json_encode($errors) . "));
            window.location.href = 'Register.html';
        </script>";
        exit();
    }

    // Insert user into database
    $query = "INSERT INTO user (user_name, user_email, user_password, user_age, user_height, user_weight) 
              VALUES ('$name', '$email', '$password', '$age', '$height', '$weight')";
    $result = mysql_query($query, $con);

    if ($result) {
        $_SESSION['user_id'] = mysql_insert_id();
        $_SESSION['user_name'] = $name;
        header("Location: Dashboard.html");
        exit();
    } else {
        echo "<script>
            sessionStorage.setItem('register_errors', JSON.stringify({'general': 'Registration failed. Please try again.'}));
            window.location.href = 'Register.html';
        </script>";
        exit();
    }
}
?>
